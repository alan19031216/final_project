<?php
include 'config.php';

$username = $_POST['username'];
$id = $_POST['id'];

try {

  $sql_like_search = $conn->query("SELECT * FROM liked WHERE username = '$username' AND comment_id = '$id'");
  $number_of_rows = $sql_like_search->rowCount();
  if($number_of_rows == 0){
    $sql_like_insert = $conn->query("INSERT INTO liked (username , comment_id) VALUES ('$username' , '$id')");

    $sql_comment = $conn->query("UPDATE comment SET liked = liked + 1 WHERE id = '$id'");
    if($sql_like_insert == true && $sql_comment == true){
      echo "1";
    }
    else {
      echo "2";
    }
  }
  else{
    $sql_unlike = $conn->query("DELETE FROM liked WHERE username = '$username' AND comment_id = '$id'");

    $sql_comment_unlike = $conn->query("UPDATE comment SET liked = liked - 1 WHERE id = '$id'");

    if($sql_unlike == true && $sql_comment_unlike == true){
      echo "3";
    }
    else {
      echo "4";
    }

  }
}
catch (PDOException $e) {
  print $e;
}

 ?>
