<?php

include 'config.php';

$draft_id = $_POST['draft_id'];
$sql_select = $conn->query("SELECT * FROM recipe WHERE id = '$draft_id'");
foreach ($sql_select as $row) {
  $name = $row['name'];
  $code = $row['code'];
}

try {
  $sql_delete = $conn->query("DELETE FROM recipe WHERE code = '$code'");
  $sql_delete_i = $conn->query("DELETE FROM ingredients WHERE code = '$code'");
  $sql_delete_s = $conn->query("DELETE FROM food_step WHERE code = '$code'");
  if($sql_delete == true || $sql_delete_i == true || $sql_delete_s == true){
    $sql_select_f = $conn->query("SELECT * FROM favorite WHERE code = '$code'");
    foreach ($sql_select_f as $row_F) {
      $username = $row_F['username'];
      $sql_notification = $conn->query("INSERT INTO notification (username , title , reason) VALUES ('$username' ,  'Remove favorite' , '$name has been remove from your favorite because the author has remove it.')");
    }
    $sql_delete_f = $conn->query("DELETE FROM favorite WHERE code = '$code'");
    echo "1";
  }
  else{
    echo "2";
  }

} catch (PDOException $e) {
  print $e;
}

 ?>
