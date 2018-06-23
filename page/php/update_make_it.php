<?php
include 'config.php';
$code = $_POST["code"];
$username1 = $_POST["user"];
try {
    $sql = $conn->query("DELETE FROM make_it WHERE username = '$username1' AND code = '$code' ");
    print 'Unmake it success';
}
catch (Exception $e) {
  print $e;
} // catch END
 ?>
