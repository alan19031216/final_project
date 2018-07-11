<?php
require 'config.php';

$code = $_POST['code'];
$password = $_POST['new_password'];
$salt = '}#f4ga~g%7hjg4&j(7mk?/!bj30ab-wi=6^7-$^R9F|GK5J#E6WT;IO[JN'; // random string
$password = sha1(md5($salt.$password)); // sha1 hash with salt & md5 #6

try {
  $sql = $conn->query("UPDATE login SET code = '' , password = '$password' WHERE code = '$code'");
  if($sql){
    echo '<script language="javascript">';
    echo 'alert("Insert success")';
    echo '</script>';
    header( "refresh:0.1; url=../../../login_register.php" );
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;


 ?>
