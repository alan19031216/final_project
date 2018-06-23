<?php
include 'config.php';

$username = $_POST['username'];

try {
  $sql = $conn->query("SELECT * FROM subscript WHERE username = '$username'");
  $number_of_rows = $sql->fetchColumn();
  if($number_of_rows == 0){
    echo "1";
  }
  else{
    echo "2";
  }
} catch (PDOException $e) {
  print $e;
}

 ?>
