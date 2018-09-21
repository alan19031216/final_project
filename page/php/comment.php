<?php
include 'config.php';
$username = $_POST['username'];
$id = $_POST['product_id'];
$comment = $_POST['comment'];

try {
  $sql = $conn->query("INSERT INTO comment (question_id , username , comment)
  VALUES ('$id' , '$username' , '$comment')");
  if($sql){
    echo "1";
    // echo '<script language="javascript">';
    // echo 'alert("Thank for your answer")';
    // echo '</script>';
    // header( "refresh:0.1; url= ../question.php" );
  }
  else{
    echo "2";
    // echo '<script language="javascript">';
    // echo 'alert("Got some problem! Please try again")';
    // echo '</script>';
    // header( "refresh:0.1; url= ../question.php" );
  }
}
catch (PDOException  $e) {
    echo $e->getMessage();
}// catch\

// $stmt = $conn->prepare("INSERT INTO comment (question_id , username , comment) VALUES (:product_id_TA , :username_comment ,:comment)");
// $stmt->bindParam(':comment', $comment);
// $stmt->bindParam(':product_id_TA', $product_id_TA);
// $stmt->bindParam(':username_comment', $username_comment);
//
// // insert one row
// $comment = $_POST['comment'];
// $product_id_TA = $_POST['product_id_TA'];
// $username_comment = $_POST['username_comment'];
// // echo $comment;
// if($stmt->execute()){
//   echo "S";
// }
// else {
//   echo "f";
// }
?>
