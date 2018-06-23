<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Recipe</title>
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--rating-->
    <script src="page/js/rate.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
  </head>
  <body>
      <nav>
        <div class="navbar-fixed orange">
        <!--  <a href="#!" class="brand-logo">Logo</a> -->
          <!--<a href="index.php"><img class="responsive-img brand-logo hide-on-small-only" src="img/logo.jpg" alt="" width="13%"></a>-->
          <a href="index.php" class="brand-logo">Let's Cook</a>
          <a href="index.php" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="login_register.php">Login/Register</a></li>
            <li><a href="badges.html">Components</a></li>
          </ul>
        </div>
      </nav>

      <style media="screen">
          html, body, .block {
            height: 100%;
          }

          // Class for when element is above threshold
          .pin-top {
            position: relative;
          }

          // Class for when element is below threshold
          .pin-bottom {
            position: relative;
          }

          // Class for when element is pinned
          .pinned {
            position: fixed !important;
          }
      </style>

      <?php
        require 'php/config.php';
        $code = $_GET['code'];
        $page = 1;
        $sql_recipe = $conn->query("SELECT * FROM recipe WHERE code = '$code'");
        foreach ($sql_recipe as $row_recipe) {
          $title = $row_recipe['name'];
          $cover_img = $row_recipe['cover_img'];
          $author = $row_recipe['username'];
          $product_code = $row_recipe['code'];
          $simple_description = $row_recipe['simple_description'];
        }
       ?>
      <!-- Modal Structure -->
      <div id="modal1" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h2 class="center-align">Introduction</h2>
          <hr>
          <h4>Author: <b><?php echo $author; ?></b></h4>
          <h4>Recipe code: <?php echo $product_code; ?></h4>
          <h4>Description: </h4> <?php echo $simple_description; ?>
        </div>
        <div class="modal-footer">
          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
        </div>
      </div>

          <div id="blue" class="block blue">
            <nav class="pushpin-demo-nav pinned" data-target="blue" style="top: 0px;">
              <div class="nav-wrapper light-blue">
                <div class="container">
                  <a href="#" class="brand-logo">Ingredients</a>
                  <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="http://materializecss.com/pushpin.html">Blue Link 1</a></li>
                    <li><a href="http://materializecss.com/pushpin.html">Blue Link 2</a></li>
                    <li><a href="http://materializecss.com/pushpin.html">Blue Link 3</a></li>
                  </ul>
                </div>
              </div>
            </nav>

            <div class="row">
              <div class="col s12 l2"> <br> </div>
              <div class="col s12 l8">
                <table class="highlight center">

                  <thead>
                    <tr>
                      <th class="center">No</th>
                      <th class="center">Name</th>
                      <th class="center"></th>
                    </tr>
                  </thead>

                <?php
                  $sql_ingredients = $conn->query("SELECT * FROM ingredients WHERE code = '$code'");
                  $count = 1;
                  foreach ($sql_ingredients as $row_ingredients) {
                    $num = $row_ingredients['num'];
                    $unit = $row_ingredients['unit'];
                    print '<p>';
                    print '<tr>';
                    print  '<td class="center">'. $count++.'</td>';
                    print  '<td class="center">'. $row_ingredients['name'].'</td>';
                    print  '<td class="center">'.''.$num.' '.$unit.'</td>';
                    print '</tr>';
                  }
                ?>
                </table>
              </div>
              <div class="col s12 l2"> <br> </div>
            </div>
          </div>

          <div id="red" class="block red lighten-1">
            <nav class="pushpin-demo-nav pin-top" data-target="red" style="top: 0px;">
              <div class="nav-wrapper red">
                <div class="container">
                  <a href="#" class="brand-logo">Step</a>
                  <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="http://materializecss.com/pushpin.html">Red Link 1</a></li>
                    <li><a href="http://materializecss.com/pushpin.html">Red Link 2</a></li>
                    <li><a href="http://materializecss.com/pushpin.html">Red Link 3</a></li>
                  </ul>
                </div>
              </div>
            </nav>

            <div class="row">
              <div class="col s12 l2"> <br> </div>
              <div class="col s12 l8">
                <table>
                  <?php
                    $sql_food_step = $conn->query("SELECT * FROM food_step WHERE code = '$code'");
                    foreach ($sql_food_step as $row_food_step) {
                      $img = $row_food_step['pic'];
                      $description = $row_food_step['description'];
                      print '<tr>';
                      print '<td><img src="page/php/'.$img.'" style="width:100%;height:40%;"></td>';
                      print '<td><h5>'.$description.'</h5></td>';
                      print '</tr>';
                    }
                   ?>
                </table>
              </div>
              <div class="col s12 l2"> <br></div>
            </div>
          </div>

      <script type="text/javascript">
      $(document).ready(function(){
        $('.target').pushpin({
          top: 0,
          bottom: 1000,
          offset: 0
        });
      });
      </script>

      <script type="text/javascript">
      $(document).ready(function(){
        //window.location.href = "index.html";
        var w = window.innerWidth;
        var h = window.innerHeight;

        //document.getElementById("demo").innerHTML = "Width: " + w + "<br>Height: " + h;
      });
      $(window).resize(function() {
        var w = window.innerWidth;
        var h = window.innerHeight;
        if(w >= 993){
          //alert("Jump");
        }
        if(h >=615){
          //alert("Jump");
        }
      });
      </script>

      <script type="text/javascript">
      $(document).ready(function(){
        $('.modal').modal();
        $('#modal1').modal('open');
        });

        $(window).resize(function() {
          var w = window.innerWidth;
          var h = window.innerHeight;
          if(w >= 993 || h <=615){
            window.location.href = "recipe.php?code=<?php echo $_GET['code']; ?>";
          }
        });

      </script>
    </body>
    <script type="text/javascript">
        $('.carousel.carousel-slider').carousel({fullWidth: true});
        // side nav (mobile)
        $(".button-collapse").sideNav();
    </script>
  </head>
