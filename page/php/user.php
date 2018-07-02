<?php
require 'config.php';

$username = $_POST['username'];
$target_dir = "php/img/user_image/";
$name = $target_dir.$_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];
$location = "$name";
//echo $location;
move_uploaded_file($tmp_name,$location);


try {
  $sql = $conn->query("UPDATE user SET img = '$location' WHERE username = '$username'");
  echo '<script language="javascript">';
  echo 'alert("Update successful!!")';
  echo '</script>';
  header( "refresh:0.1; url= ../my_profile.php?city='My_profile'" );
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>
