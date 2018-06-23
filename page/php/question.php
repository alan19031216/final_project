<?php
include 'config.php';

$username = $_POST['username'];
$title = $_POST['title'];
$description = $_POST['description'];

try {

  $sql = $conn->query("INSERT INTO question (username , title , description)
  VALUES ('$username' , '$title' , '$description')");
  
} catch (PDOException $e) {
  print $e;
}

 ?>
