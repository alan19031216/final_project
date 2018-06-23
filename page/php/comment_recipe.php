<?php
include 'config.php';
$username = $_POST['username'];
$id = $_POST['product_id'];
$comment = $_POST['comment'];

try {
  $sql = $conn->query("INSERT INTO comment_recipe (recipe_code , username , comment)
  VALUES ('$id' , '$username' , '$comment')");
  if($sql){
    echo "1";
  }
  else{
    echo "2";
  }
}
catch (PDOException  $e) {
    echo $e->getMessage();
}// catch\

 ?>
