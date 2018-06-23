<?php
if(!empty($_POST["rating"]) && !empty($_POST["user"])) {
  $rating = $_POST["rating"];
  $code = $_POST["code"];
  $username1 = $_POST["user"];
  //print $code;
include 'config.php';
  try {
    $sql_select_rate = $conn->query("SELECT * FROM rating_user WHERE username = '$username1'
                       AND code = '$code'");
    foreach ($sql_select_rate as $select_row) {
      $rate_select = $select_row['rate'];
    }

    $sql_update_rate = $conn->query("UPDATE rating_user SET rate = '$rating'");

    if($sql_update_rate){
      $sql_select = $conn->query("SELECT * FROM tutorial WHERE code = '$code'");
      foreach ($sql_select as $row) {
        $raing_row = $row['rating'];
        $number_of_people_row = $row['number_of_people'];
        $total_rating_rate = $row['total_rating'];
      }

      $total_rating_rate = $total_rating_rate - $rate_select + $rating;
      $total = $total_rating_rate / $number_of_people_row;

      $sql_update_tutorial = $conn->query("UPDATE tutorial SET total_rating = '$total_rating_rate' ,
                              rating ='$total'");

      print "Update Success";
    }
  }
  catch (Exception $e) {
    print $e;
  } // catch END
}
else{
  print 'error';
}
?>
