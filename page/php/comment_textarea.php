<?php
//error_reporting(0);
require 'config.php';

$textarea1 = $_POST['textarea1'];
$username = $_POST['username'];
$code = $_POST['code'];
	try {
			$stmt = $conn->query("INSERT INTO comment(code , username , comment) VALUES ('$code' , '$username' , '$textarea1')");
			//$stmt->execute();
			//echo "Right";
		  echo 'Successfully';

	}
	catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
	}

?>
