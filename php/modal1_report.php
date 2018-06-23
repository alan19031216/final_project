<?php

include 'config.php';

$username = $_POST['username'];
$report_question_TA = $_POST['report_question_TA'];
$modal_check_array = $_POST['modal_check_array'];
$check = implode(" <br> ", $modal_check_array);
echo $check;

try {

  //$sql = $conn->query($)

} catch (PDOException $e) {
  echo $e;
}


 ?>
