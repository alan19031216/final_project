<?php
require_once('../config.php');
session_start();

$email = ($_POST["email"]);

try {
  $num = 0;
  $sql = $conn->prepare("SELECT * FROM user WHERE email ='$email'");
  $stmt->execute();
  $count = $sql->rowCount();
  if($count > 0){
    $num = 1;
    echo $num;
  }
  else{
    $num = 2;
    echo $num;
  }

  $sql_1 = $conn->prepare("SELECT * FROM temp_members_db WHERE email ='$email'");
  $sql_1->execute();
  $count1 = $sql->rowCount();
  if($count1 > 0){
    $num = 3;
    echo $num;
  }
}

catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

?>
