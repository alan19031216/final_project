<?php
include 'config.php';

$sender = $_POST['sender'];
$receiver = $_POST['receiver'];
$message = $_POST['message_TA'];
$message_code = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXZY", 5)), 0, 5);


try {
  $sql = $conn->query("INSERT INTO message_sender (sender , message , receiver , message_code) VALUES
    ('$sender' , '$message' , '$receiver' , '$message_code')") ;

  if($sql){
    echo "1";
  }
  else {
    echo "2";
  }

}
catch(PDOException $e){
  echo $sql . "<br>" . $e->getMessage();
  //echo 2;
}

 ?>
