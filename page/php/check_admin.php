<?php
//error_reporting(0);
require 'config.php';

$admin = $_POST['admin'];
	try {
			$stmt = $conn->query("SELECT * FROM admin WHERE username = '$admin'");
      $sql_count = $stmt->rowCount();
      if($sql_count == 1){
        echo '1';
      }
      else{
        echo '2';
      }
	}
	catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
	}
?>
