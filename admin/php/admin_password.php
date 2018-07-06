<?php
include 'config.php';

$password = $_POST['postpassword'];
$salt = '}#f4ga~g%7hjg4&j(7mk?/!bj30ab-wi=6^7-$^R9F|GK5J#E6WT;IO[JN'; // random string
$password = sha1(md5($salt.$password)); // sha1 hash with salt & md5 #6

try {
  $sql = $conn->query("SELECT * FROM admin_login_password");
  foreach ($sql as $row) {
    $password_sql = $row['password'];
  }
  if($password_sql == $password){
    echo "1";
  }
  else {
    echo "2";
  }
} catch (PDOEXCEPTION $e) {
  echo $e;
}
$conn = null;
?>
