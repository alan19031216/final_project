<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index</title>
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/style.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/style_bookshelf.css"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.leapmotion.com/leap-0.6.4.js"></script>
    <!--rating-->
    <script type="text/javascript" src="js/materialize.min.js"></script>


  </head>
  <body>

    <nav>
      <div class="navbar-fixed orange">
      <!--  <a href="#!" class="brand-logo">Logo</a> -->
      <a href="index.php" class="brand-logo">Let's Cook</a>
      <!--<a href="index.php"><img class="responsive-img brand-logo hide-on-small-only" src="img/logo.jpg" alt="" width="13%"></a>-->
      <a href="index.php" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="sell.php">Book of recipe</a></li>
          <li><a href="login_register.php">Login/Register</a></li>
        </ul>
      </div>
    </nav>

    <!--Moblie slide bar-->
    <ul class="side-nav" id="mobile-demo">
      <center> <li><a style="pointer-events: none;cursor: default;"><b style="color:red;font-size:30px">Lest's Cook</b></a></li> </center>
      <li><a href="sell.php">Book of recipe</a></li>
      <li><a href="login_register.php">Login/Register</a></li>
    </ul>

      <center><div id="bookshelf">
        <h2>Top sell</h2>
        <?php
          require 'php/config.php';
          $top = $conn->query("SELECT a.* , b.* FROM book a LEFT JOIN book_detail b on a.code = b.code");
          foreach ($top as $row_top) {
         ?>
        <a href="book_detail.php?code=<?php echo $row_top['code']; ?>">
          <p>asd</p>
          <img src="<?php echo $row_top['img']; ?>">
        </a>
        <?php
          }
         ?>
        <a href="">
          <p>dsad</p>
          <img src="http://image.jeuxvideo.com/images-sm/imd/a/arkham_knight_pc.jpg" alt="jacquette" />
        </a>
        <a href="">
          <img src="http://image.jeuxvideo.com/images-sm/imd/a/arkham_knight_pc.jpg" alt="jacquette" />
        </a>
      </div></center>

      <br>
      <div class="container">
        <div id="bookshelf">
          <a href="">
            <img src="http://image.jeuxvideo.com/images-sm/imd/a/arkham_knight_pc.jpg" alt="jacquette" />
          </a>
          <a href="">
            <img src="http://image.jeuxvideo.com/images-sm/imd/a/arkham_knight_pc.jpg" alt="jacquette" />
          </a>
          <a href="">
            <img src="http://image.jeuxvideo.com/images-sm/imd/a/arkham_knight_pc.jpg" alt="jacquette" />
          </a>
          <a href="">
            <img src="http://image.jeuxvideo.com/images-sm/imd/a/arkham_knight_pc.jpg" alt="jacquette" />
          </a>
          <a href="">
            <img src="http://image.jeuxvideo.com/images-sm/imd/a/arkham_knight_pc.jpg" alt="jacquette" />
          </a>
          <a href="">
            <img src="http://image.jeuxvideo.com/images-sm/imd/a/arkham_knight_pc.jpg" alt="jacquette" />
          </a>
        </div>
      </div>

  <p>
    fdxbgdxf
  </p>
  </body>

  <script type="text/javascript">
      // side nav (mobile)
      $(".button-collapse").sideNav();
  </script>
</html>
