<?php
require 'config.php';
$username = $_POST['username'];
$code = $_POST['code'];
$quantity = $_POST['quantity'];

	try {
			$update = $conn->prepare("UPDATE cart SET quantity = '$quantity' WHERE code = '$code' AND username = '$username'");

	}
	catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
	}
 ?>
