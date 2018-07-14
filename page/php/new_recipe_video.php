<?php
  include 'config.php';

  $username = $_POST['username'];
  $code = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXZY", 5)), 0, 5);

  $check_img = $_POST['check_img'];
  $location_cover;
  // echo $check_img;
  if($check_img == 1){
    $image_hidden = $_POST['image_hidden'];
    //echo $image_hidden;
    $target_dir = "img/";
    $image = $_FILES['image']['name'];
    //echo $image;
    $cover_image = $target_dir.$_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location_cover = "$cover_image";
    move_uploaded_file($tmp_name , "$location_cover");
    if (file_exists($location_cover)){
      unlink("img/".$image_hidden);
    }
  }else{
    $image_hidden = $_POST['image_hidden'];
    $location_cover = "php/img/".$image_hidden;
    //echo $location_cover;
  }

  $pre_time = $_POST['pre_time'];
  $cooking_time = $_POST['cooking_time'];
  $number_of_serve = $_POST['number_of_serve'];

  // recipe detail
  $recipe_name = $_POST['recipe_name'];
  $simple_description = $_POST['simple_description'];
  $type = $_POST['type'];

  $location_video;
  //echo $description[0];
  //video
  $video_check = $_POST['video_check'];
  if($video_check == "1"){
    $video_hidden = $_POST['video_hidden'];
    $target_dir = "video/";
    $video = $_FILES['video']['name'];
    // echo $video;
    $name = $target_dir.$_FILES['video']['name'];
    $tmp_name_video = $_FILES['video']['tmp_name'];
    $location_video ="$name";
    move_uploaded_file($tmp_name_video, $location_video);
    if (file_exists($location_video)){
      unlink("video/".$video_hidden);
    }
  }
  else{
    $location_video = $_POST['video_hidden'];
    $location_video = "php/video/".$location_video;
    //echo $location_video;
  }

  try {
    $sql_first = ("INSERT INTO recipe
      (username , name , simple_description , type , cover_img , rating , code , video , pre_time , cooking_time , number_of_serve  ) VALUES
      ('$username' , '$recipe_name' , '$simple_description' , '$type' , '$location_cover' , '0' , '$code' , '$location_video' , '$pre_time' , '$cooking_time' , '$number_of_serve')");

    // rating
    $sql_rating = ("INSERT INTO tutorial (name , code)
    VALUES ('$recipe_name' , '$code')");

    if($sql_first == true && $sql_rating == true){
      $conn->query($sql_first);
      $conn->query($sql_rating);
    }
  }// try
   catch (PDOException  $e) {
    echo $e->getMessage();
  }// catch\
  $conn = null;
?>
