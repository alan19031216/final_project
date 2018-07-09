<?php
include 'config.php';

$username = $_POST['username'];
$modal2_question_TA = $_POST['modal2_question_TA'];
$id = $_POST['id'];
$modal2_check = $_POST['modal2_check'];

$myArray = explode(',', $modal2_check);
//print_r($myArray);
$a = implode(" <br>",$myArray);
$code = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXZY", 5)), 0, 5);
//echo $a;

try {
  $sql =$conn->query("INSERT INTO report (username , comment_id , code , reason , reason_2) VALUES
    ('$username' , '$id' , '$code' , '$a' , '$modal2_question_TA')");

    $sql_notification = $conn->query("INSERT INTO report_history (username , code , status , admin_response) VALUES
    ('$username' , '$code' , 'Reported' , '-')");
  if($sql){
    echo "1";
  }
  else {
    echo "2";
  }
}
catch (PDOException  $e) {
 echo $e->getMessage();
}// catch\
 ?>
