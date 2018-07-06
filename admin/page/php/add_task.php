<?php
require 'config.php';

$username = $_POST['username'];
$task = $_POST['task'];

try {

  $sql = $conn->query("INSERT INTO todolist(username , task) VALUES ('$username' , '$task')");
  echo "1";

} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;

 ?>
