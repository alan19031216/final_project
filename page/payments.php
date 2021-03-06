<?php
// Database variables
require 'php/config.php';

session_start();

// PayPal settings
$paypal_email = 'terry970724@gmail.com';
$return_url = "http://localhost/final%20project/final/page/success.php";
$cancel_url = 'http://localhost/webDatadase/onlineShopping/page/user/cart.php';
$notify_url = 'http://domain.com/payments.php';

$price = $_POST['price'];
$username = $_POST['username'];
$sql_check = $conn->query("SELECT * FROM subscript WHERE username = '$username'");
$count_row = $sql_check->rowCount();
if($count_row == 0){
	$times;
	if($price == '235'){
		$times = '12 months';
	}
	else if($price == '115'){
		$times = '9 months';
	}
	else if($price == '55'){
		$times = '6 months';
	}
	else if($price == '15'){
		$times = '3 months';
	}

	date_default_timezone_set("Asia/Kuala_Lumpur");
	    //echo date('d-m-Y H:i:s'); //Returns IST

	$current_time = date("y-m-d", strtotime(date('m', strtotime('+1 month')).'/01/'.date('Y')));

	// $current_time = date('y-m-d', time());
	$expired_date = strtotime("+".$times, strtotime($current_time));
	$expired_date = date("y-m-d", $expired_date);
	// echo $expired_date;
	//echo $times;

	$_SESSION['username'] = $username;
	$_SESSION['times'] = $times;
	$_SESSION['current_time'] = $current_time;
	$_SESSION['expired_date'] = $expired_date;
	//echo $times;

	$item_name = 'Subscript book of recipe fee';
	$item_amount = $price;

	// Include Functions
	include("function.php");

	// Check if paypal request or response
	if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])){
		$querystring = '';

		// Firstly Append paypal account to querystring
		$querystring .= "?business=".urlencode($paypal_email)."&";

		// Append amount& currency (£) to quersytring so it cannot be edited in html

		//The item name and amount can be brought in dynamically by querying the $_POST['item_number'] variable.
		$querystring .= "item_name=".urlencode($item_name)."&";
		$querystring .= "amount=".urlencode($item_amount)."&";

		//loop for posted values and append to querystring
		foreach($_POST as $key => $value){
			$value = urlencode(stripslashes($value));
			$querystring .= "$key=$value&";
		}

		// Append paypal return addresses
		$querystring .= "return=".urlencode(stripslashes($return_url))."&";
		$querystring .= "cancel_return=".urlencode(stripslashes($cancel_url))."&";
		$querystring .= "notify_url=".urlencode($notify_url);

		// Append querystring with custom field
		//$querystring .= "&custom=".USERID;


		//include("paymentR.php");

		// Redirect to paypal IPN
		header('location:https://www.sandbox.paypal.com/cgi-bin/webscr'.$querystring);
		exit();
	} else {
		//Database Connection
		include("php/config.php");

		// Response from Paypal

		// read the post from PayPal system and add 'cmd'
		$req = 'cmd=_notify-validate';
		foreach ($_POST as $key => $value) {
			$value = urlencode(stripslashes($value));
			$value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i','${1}%0D%0A${3}',$value);// IPN fix
			$req .= "&$key=$value";
		}

		// assign posted variables to local variables
		$data['item_name']			= $_POST['item_name'];
		$data['item_number'] 		= $_POST['item_number'];
		$data['payment_status'] 	= $_POST['payment_status'];
		$data['payment_amount'] 	= $_POST['mc_gross'];
		$data['payment_currency']	= $_POST['mc_currency'];
		$data['txn_id']				= $_POST['txn_id'];
		$data['receiver_email'] 	= $_POST['receiver_email'];
		$data['payer_email'] 		= $_POST['payer_email'];
		$data['custom'] 			= $_POST['custom'];

		// post back to PayPal system to validate
		$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
		$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
		$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";

		$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);

		if (!$fp) {
			// HTTP ERROR

		} else {
			fputs($fp, $header . $req);
			while (!feof($fp)) {
				$res = fgets ($fp, 1024);
				if (strcmp($res, "VERIFIED") == 0) {

					// Used for debugging
					// mail('user@domain.com', 'PAYPAL POST - VERIFIED RESPONSE', print_r($post, true));

					// Validate payment (Check unique txnid & correct price)
					$valid_txnid = check_txnid($data['txn_id']);
					$valid_price = check_price($data['payment_amount'], $data['item_number']);
					// PAYMENT VALIDATED & VERIFIED!
					if ($valid_txnid && $valid_price) {

						$orderid = updatePayments($data);

						if ($orderid) {
							// Payment has been made & successfully inserted into the Database

						} else {
							// Error inserting into DB
							// E-mail admin or alert user
							// mail('user@domain.com', 'PAYPAL POST - INSERT INTO DB WENT WRONG', print_r($data, true));
						}
					} else {
						// Payment made but data has been changed
						// E-mail admin or alert user
					}

				} else if (strcmp ($res, "INVALID") == 0) {

					// PAYMENT INVALID & INVESTIGATE MANUALY!
					// E-mail admin or alert user

					// Used for debugging
					//@mail("user@domain.com", "PAYPAL DEBUGGING", "Invalid Response<br />data = <pre>".print_r($post, true)."</pre>");
				}
			}
		fclose ($fp);
		}
	}
}// if
else{
	echo '<script language="javascript">';
	echo 'alert("Got some problem")';
	echo '</script>';
	header( "refresh:0.1; url= new_home.php" );
}

?>
