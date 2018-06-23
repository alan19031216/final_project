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

try {
  $sql =$conn->query("INSERT INTO report (username , question_id , reason , reason_2) VALUES
    ('$username' , '$product_id' , '$a' , '$modal1_question_TA')");
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
