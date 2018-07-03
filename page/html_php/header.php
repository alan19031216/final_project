<?php
  session_start();
  $username = $_SESSION['username'];
  //echo $username;

  if($username == '' || $username == ' '){
    echo '<script language="javascript">';
    echo 'alert("Please login!!")';
    echo '</script>';
    header( "refresh:0.1; url= ../login_register.php" );
  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/style_bookshelf.css"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/home.js"></script>
    <!-- <script type="text/javascript" src="js/materialize.min.js"></script> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css"> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <!-- Compiled and minified JavaScript -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script> -->
  </header>
