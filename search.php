<?php
require 'php/config.php';
$data1 = $_GET['data1'];
$data2 = $_GET['data2'];
$data3 = $_GET['data3'];

if($data1 == 'undefined'){
  $data1 = '';
}
if($data2 == 'undefined'){
  $data2 = '';
}
if($data3 == 'undefined'){
  $data3 = '';
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index</title>
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/style.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/style_button.css"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.leapmotion.com/leap-0.6.4.js"></script>
    <!--rating-->
    <script src="page/js/rate.js"></script>
    <script type="text/javascript" src="page/extras/modernizr.2.5.3.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>

    <script type="text/javascript" src="script.js"></script>

  </head>
  <body>
    <nav>
      <div class="navbar-fixed orange">
      <!--  <a href="#!" class="brand-logo">Logo</a> -->
      <a href="index.php" class="brand-logo">Let's Cook</a>
      <!--<a href="index.php"><img class="responsive-img brand-logo hide-on-small-only" src="img/logo.jpg" alt="" width="13%"></a>-->
      <a href="index.php" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="login_register.php">Login/Register</a></li>
          <li><a href="badges.html">Components</a></li>
        </ul>
      </div>
    </nav>

    <!--Moblie slide bar-->
    <ul class="side-nav" id="mobile-demo">
      <center> <li><a style="pointer-events: none;cursor: default;"><b style="color:red;font-size:30px">Lest's Cook</b></a></li> </center>
      <li><a href="login_register.php">Login/Register</a></li>
      <li><a href="badges.html">Components</a></li>
    </ul>

    <table border="1">
      <tr>
        <td>name</td>
        <td>type</td>
        <td>label</td>
      </tr>
    <?php
      //$data1
      $search = $conn->query("SELECT * FROM recipe WHERE (name LIKE '%$data1%')
       AND (label LIKE '%$data2%' OR type LIKE '%$data3%')
       OR (label LIKE '%$data3%' OR type LIKE '%$data2%')");
       foreach ($search as $row) {
     ?>
      <tr>
        <td><?php $row['name'] ?></td>
        <td><?php $row['type'] ?></td>
        <td><?php $row['label'] ?></td>
      </tr>
     <?php
        }
      ?>
      </table>
</body>
<script type="text/javascript">
    // side nav (mobile)
    $(".button-collapse").sideNav();
</script>
</html>
