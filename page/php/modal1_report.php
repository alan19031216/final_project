<?php
include 'config.php';

$username = $_POST['username'];
$modal1_question_TA = $_POST['modal1_question_TA'];
$product_id = $_POST['product_id'];
$check = $_POST['check'];

$myArray = explode(',', $check);
//print_r($myArray);
$a = implode(" <br>",$myArray);
//echo $a;
$code = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXZY", 5)), 0, 5);

try {
  $sql =$conn->query("INSERT INTO report (username , question_id , code , reason , reason_2 , status) VALUES
    ('$username' , '$product_id' , '$code' , '$a' , '$modal1_question_TA' , 'Reported')");
  if($sql){
    $sql_notification = $conn->query("INSERT INTO report_history (username , code , status , admin_response) VALUES
    ('$username' , '$code' , 'Reported' , '-')");
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
