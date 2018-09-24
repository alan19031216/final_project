<?php
include 'config.php';
$username = $_POST["username"];
$room_name = $_POST["room_name"];
$nature = $_POST["nature"];
$target_dir = "img/";
//echo $target_dir;
$image = $_FILES['image']['name'];
$cover_image = $target_dir.$_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];
$location_cover = "$cover_image";
move_uploaded_file($tmp_name , $location_cover);

try {
  $sql = $conn->query("INSERT INTO live (username , room_name , nature , image)
  VALUES ('$username' , '$room_name' , '$nature' , '$location_cover')");
  if($sql){
    $_SESSION['username'] = $username;
    echo "1";
    header('Location: ../ajax-chat.php?username='.$username);
  }
  else{
    echo "Something wrong";
    header('Location: ../ajax-chat.php?username='.$username);
  }
}
catch (PDOException  $e) {
    echo $e->getMessage();
}// catch\

 ?>
