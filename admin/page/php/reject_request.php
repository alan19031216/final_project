<?php
require 'config.php';

$approver = $_POST['approver'];
$type = $_POST['type'];
if($type != 1){
  $check = $_POST['check'];
}
else{
  $id = $_POST['id'];
}

try {
  if($type != 1){
    for($i = 0; $i < count($check); $i++){
      $sql_delete = $conn->query("DELETE FROM request WHERE name = '$check[$i]'");
    }
    echo "1";
  }
  else{
    $sql_delete = $conn->query("DELETE FROM request WHERE id = '$id'");
    echo "1";
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>
