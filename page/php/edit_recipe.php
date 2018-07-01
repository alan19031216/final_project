<?php
  include 'config.php';
  $recipe_code = $_POST['recipe_code'];
  $check_img = $_POST['check_img'];
  $location_cover;
  //echo $check_img;
  if($check_img == 1){
    $image_hidden = $_POST['image_hidden'];
    //echo $image_hidden;
    $target_dir = "php/img/";
    $image = $_FILES['image']['name'];
    //echo $image;
    $cover_image = $target_dir.$_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location_cover = "$cover_image";
    move_uploaded_file($tmp_name , "$location_cover");
    if (file_exists($location_cover)){
      unlink("../".$image_hidden);
    }
  }else{
    $image_hidden = $_POST['image_hidden'];
    $location_cover = $image_hidden;
    //echo $location_cover;
  }

  $pre_time = $_POST['pre_time'];
  $cooking_time = $_POST['cooking_time'];
  $number_of_serve = $_POST['number_of_serve'];

  // recipe detail
  $recipe_name = $_POST['recipe_name'];
  $simple_description = $_POST['simple_description'];

  //ingredients
  $name_ingredients = $_POST['name_ingredients'];
  $num = $_POST['num'];
  $unit = $_POST['unit'];
  //echo count($name_ingredients);

  //step 3
  $description = $_POST['description'];

  $location_video;
  //echo $location_video;
  //video
  $video_check = $_POST['video_check'];
  echo $video_check;
  if($video_check == "1"){
    $video_hidden = $_POST['video_hidden'];
    $target_dir = "php/video/";
    $video = $_FILES['video']['name'];
    // echo $video;
    $name = $target_dir.$_FILES['video']['name'];
    $tmp_name_video = $_FILES['video']['tmp_name'];
    $location_video ="$name";
    move_uploaded_file($tmp_name_video, $location_video);
    if (file_exists($location_video)){
      unlink("../".$video_hidden);
    }
  }
  else{
    $location_video = $_POST['video_hidden'];
    $location_video = $location_video;
    //echo $location_video;
  }

  try {
    $sql_recipe = $conn->query("UPDATE recipe SET name = '$recipe_name' , pre_time = '$pre_time' ,
       cooking_time = '$cooking_time' , number_of_serve = '$number_of_serve' ,
       simple_description = '$simple_description' , cover_img = '$location_cover' ,
       video = '$location_video' WHERE code = '$recipe_code'");

    $sql_recipe_delete_ingredients = $conn->query("DELETE FROM ingredients WHERE code = '$recipe_code'");
    $sql_recipe_delete_step = $conn->query("DELETE FROM food_step WHERE code = '$recipe_code'");

    for($i = 0; $i < count($name_ingredients); $i++){
       if($name_ingredients[$i] != "" && $num[$i] != "" && $unit[$i] != ""){
         $sql_step2 = $conn->query("INSERT INTO ingredients (code , name , num, unit)
         VALUES('$recipe_code' , '$name_ingredients[$i]', '$num[$i]', '$unit[$i]')");
         //mysql_query("insert into employee_table values('$name[$i]','$age[$i]','$job[$i]')");
       }
     }// ingredients

     for($i = 0; $i < count($description); $i++){
       if($description[$i] != "")  {
         $sql_step3 = $conn->query("INSERT INTO food_step (code , description)
         VALUES('$recipe_code' , '$description[$i]' )");
       }
     }// for step3

     if($sql_recipe == true && $sql_recipe_delete_ingredients == true && $sql_recipe_delete_step == true && $sql_step2 == true && $sql_step3 == true){

       echo '<script language="javascript">';
       echo 'alert("Update successful!!")';
       echo '</script>';
       header( "refresh:0.1; url= ../my_profile.php?city='My_kitchen'" );
     }
     else{
       echo '<script language="javascript">';
       echo 'alert("Update fail!!")';
       echo '</script>';
       header( "refresh:0.1; url= ../my_profile.php?city='My_kitchen'" );
     }

  }// try
   catch (PDOException  $e) {
    echo $e->getMessage();
  }// catch\
  $conn = null;
?>
