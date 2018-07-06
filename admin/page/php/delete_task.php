<?php
require 'config.php';

$id = $_POST['id'];

try {

  $sql = $conn->query("DELETE FROM todolist WHERE id = '$id'");
  echo "1";

} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;

 ?>
