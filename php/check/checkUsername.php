<?php
require_once('../config.php');
session_start();

$username = ($_POST["username"]);

try {
  $num = 0;
  $sql = $conn->prepare("SELECT * FROM login WHERE username ='$username'");
  $sql->execute();
  $count = $sql->rowCount();
  if($count > 0){
    $num = 1;
    echo $num;
  }
  else{
    $num = 2;
    echo $num;
  }

  $sql_1 = $conn->prepare("SELECT * FROM temp_members_db WHERE name ='$username'");
  $sql_1->execute();
  $count1 = $sql_1->rowCount();
  if($count1 > 0){
    $num = 3;
    echo $num;
  }
}

catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

?>
