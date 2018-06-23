<?php
include 'php/config.php';
session_start();
$username = $_SESSION['username'];
$time = $_SESSION['$times'] ;
$current_time = $_SESSION['$current_time'];
$expired_date = $_SESSION['$expired_date'];

//echo $expired_date;
try {
	$sql = $conn->query("INSERT INTO subscript(username , times , subscript_date , expired_date)
	VALUES ('$username' , '$time' , '$current_time' , '$expired_date')");

	$sql_history = $conn->query("INSERT INTO subs_history
		(username , times , subscript_date , expired_date ,status) VALUES
		('$username' , '$time', '$current_time' , '$expired_date' , 'active')");
    //echo "Success";
}
catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
}
 ?>
