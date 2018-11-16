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
    $count_select_rate = $sql_select_rate->rowCount();
    if($count_select_rate == 0){
      $sql_insert_rate = $conn->query("INSERT INTO rating_user(username , code , rate) VALUES ('$username1' , '$code' , '$rating')");
    }
    elseif ($count_select_rate == 1) {
      foreach ($sql_select_rate as $select_row) {
        $rate_select = $select_row['rate'];
      }

      $sql_update_rate = $conn->query("UPDATE rating_user SET rate = '$rating' WHERE username = '$username1' AND code = '$code'");
    } // elseif

    $sql_select_rate_1 = $conn->query("SELECT * FROM rating_user WHERE code = '$code'");
    $count_select_rate_1 = $sql_select_rate_1->rowCount();

    $sql_select = $conn->query("SELECT * FROM tutorial WHERE code = '$code'");
    foreach ($sql_select as $row) {
      $raing_row = $row['rating'];
      $number_of_people_row = $row['number_of_people'];
      $total_rating_rate = $row['total_rating'];
    }

    $total_rating_rate = $total_rating_rate - $rate_select + $rating;
    $total = $total_rating_rate / $count_select_rate_1;

    $sql_update_tutorial = $conn->query("UPDATE tutorial SET total_rating = '$total_rating_rate' ,
                            rating ='$total' , number_of_people = '$count_select_rate_1' WHERE code = '$code'");

    print "Update Success";

  }
  catch (Exception $e) {
    print $e;
  } // catch END
}
else{
  print 'error';
}
?>
