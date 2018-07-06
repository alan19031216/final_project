<?php
session_start();
include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];
$salt = '}#f4ga~g%7hjg4&j(7mk?/!bj30ab-wi=6^7-$^R9F|GK5J#E6WT;IO[JN'; // random string
$password = sha1(md5($salt.$password)); // sha1 hash with salt & md5 #6

try {
  $sql = $conn->query("SELECT * FROM admin_login WHERE username = '$username' AND password = '$password'");
  if($sql){
    $_SESSION['username'] = $username;
    header('Location: ../page/home.php');
  }else {
    echo "2";
  }

} catch (PDOEXCEPTION $e) {
  echo $e;
}
$conn = null;

?>
