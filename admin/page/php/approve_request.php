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
      $sql = $conn->query("INSERT INTO category (name , approve_admin) VALUES ('$check[$i]' , '$approver')");
      $sql_delete = $conn->query("DELETE FROM request WHERE name = '$check[$i]'");
    }
    echo "<script>
          alert('Approve success');
          window.location.href='../home.php';
          </script>";
  }
  else{
    $sql = $conn->query("SELECT * FROM request WHERE id = '$id'");
    foreach ($sql as $row) {
      $name = $row['name'];
    }
    $sql_delete = $conn->query("DELETE FROM request WHERE id = '$id'");
    $sql_insert = $conn->query("INSERT INTO category (name , approve_admin) VALUES ('$name' , '$approver')");
    echo "1";
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>
