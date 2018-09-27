<?php
include 'config.php';
$username = $_POST['username'];

try {
  $sql = $conn->query("DELETE FROM live where username = '$username'");
  if($sql){
    echo "1";
  }
  else{
    echo "2";
  }
}
catch (PDOException  $e) {
    echo $e->getMessage();
}// catch\

 ?>
