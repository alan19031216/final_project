<?php
require 'config.php';

$target_dir = "../../../book/img/";
$image = $_FILES['image']['name'];
//echo $image;
$cover_image = $target_dir.$_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];
$location_cover = "$cover_image";
move_uploaded_file($tmp_name , "$location_cover");

$target_dir_pdf = "../../../book/";
$pdf = $_FILES['pdf']['name'];
//echo $image;
$cover_pdf = $target_dir_pdf.$_FILES['pdf']['name'];
$tmp_name_pdf = $_FILES['pdf']['tmp_name'];
$location_cover_pdf = "$cover_pdf";
move_uploaded_file($tmp_name_pdf , "$location_cover_pdf");

//echo $location_cover_pdf;

$name = $_POST['name'];
//echo $name;

try {
  $sql = $conn->query("INSERT INTO book (name , img , path) VALUES ('$name' , '$image' , '$pdf')");
  echo "<script>
        alert('Add success');
        window.location.href='../home.php';
        </script>";
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

 ?>
