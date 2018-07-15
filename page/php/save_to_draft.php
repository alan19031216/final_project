<?php
include 'config.php';

$draft_id = $_POST['draft_id'];

try {

  $sql_draft = $conn->query("SELECT * FROM recipe WHERE id = '$draft_id'");
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
    $sql_favorite = $conn->query("SELECT * FROM favorite WHERE code = '$code'");
    foreach ($sql_favorite as $sql_favorite) {
      $username_notification = $sql_favorite['username'];
      $sql_notification = $conn->query("INSERT INTO notification (username , title , reason) VALUES ('$username_notification' ,  'Remove favorite' , '$name has been remove from your favorite because the author has remove it.')");
    }
    $sql_draft_delete = $conn->query("DELETE FROM recipe WHERE id = '$draft_id'");
    $sql_favorite_delete = $conn->query("DELETE FROM favorite WHERE code = '$code'");
    if($sql_draft_delete){
      $sql_insert = $conn->query("INSERT INTO draft (username , name , simple_description , type , cover_img , rating , code , video , recipe_type , pre_time , cooking_time , number_of_serve ) VALUES
      ('$username' , '$name' , '$simple_description' , '$type' , '$cover_image' , '$rating' , '$code' , '$video' ,'$recipe_type' , '$pre_time' , '$cooking_time' , '$number_of_serve')");
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
