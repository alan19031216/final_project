<?php

include('config.php');

// values sent from form
$username = $_POST['postUsername'];
$quantity = $_POST['postQuantity'];
$code = $_POST['postCode'];

try {
  $check = $conn->prepare("SELECT * FROM cart WHERE code = '$code' AND username = '$username'");
  $check->execute();
  $count = $check->fetchColumn();
  if($count >= 1){
    echo '2';
  }else {
    // Insert data into database
    $stmt = $conn->prepare("INSERT INTO cart(code , username , quantity)VALUES('$code' , '$username' , '$quantity')");
    $stmt->execute();
    if($stmt){
      echo '1';
    }
  }
}

catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}


?>
