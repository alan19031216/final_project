  <?php

include('config.php');

// Passkey that got from link
$passkey=$_GET['passkey'];

$tbl_name1="temp_members_db";

// Retrieve data from table where row that match this passkey
$sql1 = $conn->query("SELECT * FROM $tbl_name1 WHERE confirm_code ='$passkey'");

// If successfully queried
if($sql1){

// Count how many row has this passkey
//$count = mysqli_num_rows($sql1);

foreach ($sql1 as $rows) {
$name = $rows['name'];
$password = $rows['password'];
$email = $rows['email'];
}
date_default_timezone_set("Asia/Kuala_Lumpur");
    //echo date('d-m-Y H:i:s'); //Returns IST
$current_time = date('Y-m-d', time());

// Insert data that retrieves from "temp_members_db" into table "registered_members"
$sql2 = $conn->query("INSERT INTO login(username, password)VALUES('$name', '$password')");

// if not found passkey, display message "Wrong Confirmation code"


// if successfully moved data from table"temp_members_db" to table "registered_members" displays message "Your account has been activated" and don't forget to delete confirmation code from table "temp_members_db"
if($sql2){

$sql4 = $conn->query("INSERT INTO user(username, email , img , join_time)VALUES('$name', '$email' , ' ' , '$current_time')");
echo '<script language="javascript">';
echo 'alert("Your account has been activated!!")';
echo '</script>';
header( "refresh:0.1; url= ../login_register.php" );


// Delete information of this user from table "temp_members_db" that has this passkey
$sql3 = $conn->query("DELETE FROM $tbl_name1 WHERE confirm_code = '$passkey'");

}

}
?>
