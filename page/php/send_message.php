<?php
include 'config.php';

$sender = $_POST['sender'];
$receiver = $_POST['receiver'];
$textarea_message = $_POST['textarea_message'];
$message_code = $_POST['message_code'];

try {
  //echo $textarea_message;
  $sql = $conn->query("INSERT INTO chat (sender , textarea_message , receiver , message_code) VALUES
    ('$sender' , '$textarea_message' , '$receiver' , '$message_code')") ;
  if($sql){
    echo "1";
  }
  else{
    echo "3";
  }
} catch (PDOException $e) {
  print $e;
}
$conn = null;
?>
