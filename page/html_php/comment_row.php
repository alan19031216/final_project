<div class="" id="comment_row">
  <?php
    include 'php/config.php';
    //session_start();
    $username_comment = $_GET['username'];
    //echo $username_comment;
    $img_read = "";
    $sql_user = $conn->query("SELECT * FROM user WHERE username = '$username_comment'");
    foreach ($sql_user as $row) {
      $img_read = $row['img'];
    }
    //echo $img_read;
    if($img_read == "" || $img_read == " "){
      $img_read = "page/php/img/user_image/user_icon.png";
    }
   ?>
  <div class="col l3 m3 s12">
     <img src="<?php echo $img_read; ?>" alt="" class="circle responsive-img hide-on-small-only right" width="50%">
     <center><img src="<?php echo $img_read; ?>" alt="" class="circle responsive-img hide-on-med-and-up " width="30%"></center>
  </div>

  <div class="col l9 m9 s12">
    <form class="" method="post">
      <label for="textarea1">Comment</label>
      <!-- <textarea required class="browser-default" placeholder="Write your comment" name="description" id="comment_TA" class="materialize-textarea" style="width: 100%;height: 100px;padding: 12px 20px;margin: 8px 0;box-sizing: border-box;"></textarea> -->
      <?php
        include 'test.php';
       ?>
      <a class="waves-effect waves-light btn" id="" onclick="submit_comment()">Comment</a>
    </form>
  </div>
</div><!-- comment_row -->
