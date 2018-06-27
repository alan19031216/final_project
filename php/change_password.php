<?php
include 'config.php';
$username = $_POST['username'];
$password = $_POST['password'];
$salt = '}#f4ga~g%7hjg4&j(7mk?/!bj30ab-wi=6^7-$^R9F|GK5J#E6WT;IO[JN'; // random string
$password = sha1(md5($salt.$password)); // sha1 hash with salt & md5 #6
//$password = md5($password);
$code = $_POST['code'];

try {
  $sql = $conn->query("SELECT * FROM user where username = '$username' AND forgot_code = '$code'");
  $number_of_rows = $sql->rowCount();
  if($number_of_rows > 0){
    $update = $conn->query("UPDATE login SET password = '$password' WHERE username = '$username'");
    $update_user = $conn->query("UPDATE user SET forgot_code = ' ' WHERE username = '$username'");
    print 'Success';
  }
  //print "aa";
} catch (Exception $e) {
  print $e;
}

 ?>
