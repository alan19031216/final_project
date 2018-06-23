  <?php
  require '../html_php/header.php';
  require '../php/config.php';
  $name_history = $_SESSION['username'];
  $code_comment = $_GET['code'];
  $select_comment = $conn->query("SELECT a.* , b.* FROM user a LEFT JOIN comment b on a.username = b.username WHERE b.code = '$code_comment' ORDER BY b.date DESC");
  foreach ($select_comment as $row_comment) {
    $image = $row_comment['img'];
    if($image == "" || $image == " " || $image == "img/"){
      $image = "img/user_icon.png";
    }
   ?>
  <div class="col s12">
    <div class="card-panel grey lighten-5 z-depth-1">
      <div class="row valign-wrapper">
        <div class="col s2 center-align">
          <img src="<?php echo $image ?>" alt="" class="circle responsive-img" style="width:50%;height:50%;"> <!-- notice the "circle" class -->
          <p class=""><?php echo $row_comment['username']; ?></p>
        </div>
        <div class="col s10">
          <span class="black-text">
            <?php echo $row_comment['comment']; ?>
          </span>
        </div>
      </div>
    </div>
  </div>
  <?php
     }
   ?>
