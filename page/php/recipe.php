<?php
require 'config.php';

$username = $_POST['username'];
$code = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXZY", 5)), 0, 5);

//step 1
$food_name = $_POST['food_name'];
$label = $_POST['label'];
$food_type = $_POST['food_type'];
if($food_type == '' || $food_type = ' '){
  $food_type = ' ';
}
$simple_description = $_POST['simple_description'];

$target_dir = "cover/";
$cover_image = $target_dir.$_FILES['cover_img']['name'];
$tmp_name = $_FILES['cover_img']['tmp_name'];
$location_cover = "$cover_image";
move_uploaded_file($tmp_name , $location_cover);

// step 2
$name_ingredients = $_POST['name_ingredients'];
$num = $_POST['num'];
$unit = $_POST['unit'];

// step 3
$description = $_POST['description'];

$uploaded_images = array();
foreach($_FILES['pic']['name'] as $key=>$val){
  $upload_dir = "food/";
  $upload_file = $upload_dir.$_FILES['pic']['name'][$key];
  $filename = $_FILES['pic']['name'][$key];
  if(move_uploaded_file($_FILES['pic']['tmp_name'][$key],$upload_file)){
  $uploaded_images[] = $upload_file;
  }
} // upload img END

$location = '';
$name = $_FILES['video']['name'];
if($name != ''){
  $target_dir = "video/";
  $name = $target_dir.$_FILES['video']['name'];
  $tmp_name = $_FILES['video']['tmp_name'];
  $location ="$name";
  ini_set("upload_max_filesize", "3200000000");
  move_uploaded_file($tmp_name , $location);
  //move_uploaded_file($tmp_name, $location);

  }// video END


try {
  // step 1
  $sql_step1 = "INSERT INTO recipe (username , name , label , type , simple_description , cover_img , code , video , rating) VALUES('$username' , '$food_name' , '$label', '$food_type', '$simple_description' , '$location_cover' , '$code' , '$location' , '0')";

  if($sql_step1 == TRUE){
    $conn->exec($sql_step1);
  }
  else {
    echo '<script language="javascript">';
    echo 'alert("Insert fail!! Step1 got some empty")';
    echo '</script>';
    header( "refresh:0.1; url= ../home.php" );
  }

  // step 2
for($i = 0; $i < count($name_ingredients); $i++){
   if($name_ingredients[$i] != "" && $num[$i] != "" && $unit[$i] != ""){
     $sql_step2 = "INSERT INTO ingredients (code , name , num, unit) VALUES('$code' , '$name_ingredients[$i]', '$num[$i]', '$unit[$i]')";
     $conn->exec($sql_step2);
     //mysql_query("insert into employee_table values('$name[$i]','$age[$i]','$job[$i]')");
   }
   else {
     for($i = 0; $i < count($name_ingredients); $i++){
      $sql_step2_delete = "DELETE  FORM ingredients WHERE code = '$code'";
      $conn->exec($sql_step2_delete);
     }
     $sql_step1_delete = "DELETE FORM ingredients WHERE code = '$code'";
     $conn->exec($sql_step1_delete);

     echo '<script language="javascript">';
     echo 'alert("Insert fail!! Step2 got some empty")';
     echo '</script>';
     header( "refresh:0.1; url= ../home.php" );
   }
 } // for END (step 2)

 // step 3
 for($i = 0; $i < count($description); $i++){
  if($description[$i] != "" && $uploaded_images[$i] != "")  {
    $sql_step3 = "INSERT INTO food_step (code , pic , description) VALUES('$code' , '$uploaded_images[$i]', '$description[$i]' )";
    $conn->exec($sql_step3);
    //mysql_query("insert into employee_table values('$name[$i]','$age[$i]','$job[$i]')");
  }
  else {
    for($i = 0; $i < count($description); $i++){
      $sql_step3_delete = "DELETE  FORM food_step WHERE code = '$code'";
      $conn->exec($sql_step3_delete);
    }
    for($i = 0; $i < count($name_ingredients); $i++){
     $sql_step2_delete = "DELETE  FORM ingredients WHERE code = '$code'";
     $conn->exec($sql_step2_delete);
    }
    $sql_step1_delete = "DELETE FORM ingredients WHERE code = '$code'";
    $conn->exec($sql_step1_delete);

    echo '<script language="javascript">';
    echo 'alert("Insert fail!! step3 got some empty")';
    echo '</script>';
    header( "refresh:0.1; url= ../home.php" );
 }
} // for END (step 3)*/

// rating
 $sql_rating = "INSERT INTO rating(username , product_id , vote) VALUES ('$username' , '$code' , '0')";
 if($sql_rating == TRUE){
   $conn->exec($sql_rating);
 }
 else{
   for($i = 0; $i < count($description); $i++){
     $sql_step3_delete = "DELETE  FORM food_step WHERE code = '$code'";
     $conn->exec($sql_step3_delete);
   }
   for($i = 0; $i < count($name_ingredients); $i++){
    $sql_step2_delete = "DELETE  FORM ingredients WHERE code = '$code'";
    $conn->exec($sql_step2_delete);
   }
   $sql_step1_delete = "DELETE FORM ingredients WHERE code = '$code'";
   $conn->exec($sql_step1_delete);
   echo '<script language="javascript">';
   echo 'alert("Insert fail!!")';
   echo '</script>';
   header( "refresh:0.1; url= ../home.php" );
 }
  echo '<script language="javascript">';
  echo 'alert("Insert successful!!")';
  echo '</script>';
  //header( "refresh:0.1; url= ../home.php" );
}

catch(PDOException $e){
  echo "Connection failed: " . $e->getMessage();
}

?>
