<?php
require_once('config.php');
session_start();

$username = $_POST['postusername'];
$code = $_POST['postcode'];

$sql = "INSERT INTO favorite(username , code) VALUES('$username' , '$code')";
//$result = $conn->query($sql);

if($conn->query($sql) === true){
  echo "1";
}
else{
  echo "2";
}

?>
