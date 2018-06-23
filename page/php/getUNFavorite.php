<?php
require_once('config.php');
session_start();

$username = $_POST['postusername'];
$code = $_POST['postcode'];
try {

    // sql to delete a record
    $sql = "DELETE FROM favorite WHERE code = '$code' AND username = '$username'";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "1";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    //echo 2;
    }
//$conn = null;
?>
