<?php
require 'config.php';

$report_username = $_POST['report_username'];
$username = $_POST['username'];
$code = $_POST['code'];
$id = $_POST['id'];
$txt = $_POST['txt'];
try {
  if($txt == "comment_id"){
    $sql = $conn->query("DELETE FROM comment WHERE id = '$id'");
  }
  elseif ($txt == "recipe_comment_id") {
    $sql = $conn->query("DELETE FROM comment_recipe WHERE id = '$id'");
    //echo "1";
  }
  else{
    $sql = $conn->query("DELETE FROM question WHERE id = '$id'");
  }
  $sql_notification = $conn->query("INSERT INTO notification (username , title , reason) VALUES ('$username' , 'Warning' , 'Please pay attention that the words you are using in comment.')");
  $sql_update_report = $conn->query("UPDATE report_history set status = 'Report success' , admin_response = 'This comment has been delete. Thank you report!' WHERE code = '$code'");
  $sql_report = $conn->query("DELETE FROM report WHERE code = '$code'");
  echo "1";
}
catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>
