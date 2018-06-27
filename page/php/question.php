<?php
include 'config.php';

$username = $_POST['username'];
$title = $_POST['title'];
$description = $_POST['description'];

try {

  $sql = $conn->query("INSERT INTO question (username , title , description)
  VALUES ('$username' , '$title' , '$description')");
  echo "<script>
        alert('Post success');
        window.location.href='question.php';
        </script>";

} catch (PDOException $e) {
  print $e;
}

 ?>
