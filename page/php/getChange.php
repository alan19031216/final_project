<?php
require_once('config.php');
session_start();

$username = $_POST['postusername'];
$code = $_POST['postcode'];
try {

    // sql to delete a record
    $sql = $conn->query("SELECT * FROM favorite WHERE code = '$code' AND username = '$username'");

    // use exec() because no results are returned
    $allcount = $sql->rowCount();
    //echo $allcount;
    $change = '';
    if($allcount == 1){
      $change = 1;
    }
    else {
      $change = 2;
    }

    echo $change;
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    //echo 2;
    }
//$conn = null;
?>
