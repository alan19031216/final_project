<?php

include 'config.php';

$draft_id = $_POST['draft_id'];

try {

  $sql_draft = $conn->query("SELECT * FROM draft WHERE id = '$draft_id'");
  if($sql_draft){
    foreach ($sql_draft as $row_draft) {
      $username = $row_draft['username'];
      $name = $row_draft['name'];
      $pre_time = $row_draft['pre_time'];
      $cooking_time = $row_draft['cooking_time'];
      $number_of_serve = $row_draft['number_of_serve'];
      $simple_description = $row_draft['simple_description'];
      $cover_image = $row_draft['cover_img'];
      $rating = $row_draft['rating'];
      $code = $row_draft['code'];
      $video = $row_draft['video'];
      $recipe_type = $row_draft['recipe_type'];
      $type = $row_draft['type'];
    }

    $sql_draft_delete = $conn->query("DELETE FROM draft WHERE id = '$draft_id'");
    if($sql_draft_delete){
      $sql_insert = $conn->query("INSERT INTO recipe (username , name , pre_time , cooking_time , number_of_serve , simple_description , type , cover_img , rating , code , video , recipe_type) VALUES
      ('$username' , '$name' , '$pre_time' , '$cooking_time' , '$number_of_serve' , '$simple_description' , '$type' , '$cover_image' , '$rating' , '$code' , '$video'  , '$recipe_type')");

      echo "1";
    }
    else{
      echo "2";
    }

  }

} catch (PDOException $e) {
  print $e;
}

 ?>
