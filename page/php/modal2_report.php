<?php
include 'config.php';

$username = $_POST['username'];
$modal2_question_TA = $_POST['modal2_question_TA'];
$id = $_POST['id'];
$modal2_check = $_POST['modal2_check'];

$myArray = explode(',', $modal2_check);
//print_r($myArray);
$a = implode(" <br>",$myArray);
//echo $a;

try {
  $sql =$conn->query("INSERT INTO report (username , comment_id , reason , reason_2) VALUES
    ('$username' , '$id' , '$a' , '$modal2_question_TA')");
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
