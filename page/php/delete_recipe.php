<?php

include 'config.php';

$draft_id = $_POST['draft_id'];
$sql_select = $conn->query("SELECT * FROM recipe WHERE id = '$draft_id'");
foreach ($sql_select as $row) {
  $code = $row['code'];
}

try {
  $sql_delete = $conn->query("DELETE FROM recipe WHERE code = '$code'");
  $sql_delete_i = $conn->query("DELETE FROM ingredients WHERE code = '$code'");
  $sql_delete_s = $conn->query("DELETE FROM food_step WHERE code = '$code'");
  if($sql_delete == true || $sql_delete_i == true || $sql_delete_s == true){
    echo "1";
  }
  else{
    echo "2";
  }

} catch (PDOException $e) {
  print $e;
}

 ?>
