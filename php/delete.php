<?php
require 'config.php';

try {
	$code = $_POST['code'];
	$stmt=$conn->prepare("DELETE FROM cart WHERE code = '$code'");
	$stmt->execute();
  echo "1";
  //header( "refresh:0.1; url= ../view_product.php" );
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
