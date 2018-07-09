<?php
require 'config.php';

$report_username = $_POST['report_username'];
$code = $_POST['code'];
$id = $_POST['id'];
$txt = $_POST['txt'];
try {

  $sql_update_report = $conn->query("UPDATE report_history set status = 'Report success' , admin_response = 'This comment is ok. Thank you report!' WHERE code = '$code'");
  $sql_report = $conn->query("DELETE FROM report WHERE code = '$code'");
  echo "1";
}
catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>
