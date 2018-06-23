<?php
if(!empty($_POST["rating"]) && !empty($_POST["id"]) && !empty($_POST["user"])) {
  $rating = $_POST["rating"];
  $code = $_POST["code"];
  $username1 = $_POST["user"];
  //print $code;
include 'config.php';
try {
  $sql = $conn->query("SELECT * FROM rating_user WHERE username = '$username1' AND code = '$code'");
  foreach($sql as $history){
    $rate_history = $history['rate'];
  }
  $number_of_rows = $sql->rowCount();
  if($number_of_rows == 0){
    $sql_insert_rate_user = $conn->query("INSERT INTO rating_user(username , code , rate)
                            VALUES ('$username1' , '$code' , '$rating')");

    $select_rate = $conn->query("SELECT * FROM tutorial WHERE code = '$code'");
    foreach ($select_rate as $row) {
      $number_of_people = $row['number_of_people'];
      $total_rate = $row['total_rating'];
      $rate = $row['rating'];
    }

    $number_of_people++;
    $total_rate = $total_rate + $rating;
    $rate = ($total_rate / $number_of_people);
    $update_rate = $conn->query("UPDATE tutorial SET rating = '$rate' ,
      number_of_people = '$number_of_people' , total_rating = '$total_rate' WHERE code = '$code'");

  }
  else {
    print $rate_history;
  }
} catch (Exception $e) {
  print $e;
} // catch END
}
else{
  print 'error';
}
?>
