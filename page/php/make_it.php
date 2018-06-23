<?php
include 'config.php';
$code = $_POST["code"];
$username1 = $_POST["user"];
try {
  $sql_count = $conn->query("SELECT * FROM make_it WHERE username = '$username1' AND code = '$code'");
  $number_of_rows = $sql_count->rowCount();
  if ($number_of_rows == 0) {
    $sql = $conn->query("INSERT INTO make_it (username , code) VALUES ('$username1' , '$code')");
    print "Success";
  }
  else{
    print "exist";
  }



}
catch (Exception $e) {
  print $e;
} // catch END
 ?>
