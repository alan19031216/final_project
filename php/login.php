<?php
require 'config.php';
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$conn->quote($username);
$salt = '}#f4ga~g%7hjg4&j(7mk?/!bj30ab-wi=6^7-$^R9F|GK5J#E6WT;IO[JN'; // random string
$password = sha1(md5($salt.$password)); // sha1 hash with salt & md5 #6
$type = '';
try {
    $stmt = $conn->prepare("SELECT * FROM login WHERE username = '$username' AND password = '$password' LIMIT 1");
    $stmt->execute();
    foreach ($stmt as $row) {
      $type = $row['type'];
    }
    $count = $stmt->rowCount();
    if($count == 1 & $type == 'u' ){
      $_SESSION['username'] = $username;
      header('Location: ../page/new_home.php');
    }
    elseif($count == 1 & $type == 'a' ){
      $_SESSION['username'] = $username;
      header('Location: ../admin/page/home.php');
    }
    else {
      echo '<script language="javascript">';
      echo 'alert("Wrong password or username")';
      echo '</script>';
      header( "refresh:0.1; url= ../login_register/" );
    }
  }
  catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
?>
