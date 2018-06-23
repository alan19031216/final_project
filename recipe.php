<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Recipe</title>
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.leapmotion.com/leap-0.6.4.js"></script>
    <!--rating-->
    <script src="page/js/rate.js"></script>
    <script type="text/javascript" src="page/extras/modernizr.2.5.3.min.js"></script>
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

      <div class="hide-on-med-and-down">
        <div class="flipbook-viewport">
        	<div class="container">
        		<div class="flipbook">
              <div class="hard next-button" style="background-image:url(page/img/logo-ConvertImage.png);">sada</div>
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
                  $video = $row_recipe['video'];
                }
               ?>
              <div class="hard next-button" style="background-color:gray">
                <h1 class="center-align" style="position: absolute;top:30%"><?php echo $title; ?></h1>
                <p class="center-align" align="center" style="position: absolute;bottom:0%;color:white;right:3%"><?php echo $page++; ?></p>
              </div>
        		  <div>
                <img src="page/php/<?php echo $cover_img; ?>" style="height:40%;width:100%">
                <br>
                <h4>Author: <b><?php echo $author; ?></b></h4>
                <h4>Recipe code: <?php echo $product_code; ?></h4>
                <p>Description: <?php echo $simple_description; ?></p>
                <p class="center-align" style="position: absolute;bottom:0%;right:3%"><?php echo $page++; ?></p>
              </div>

              <div>
                <h1 class="center-align" style="position: absolute;top:30%">Ingredients</h1>
                <p class="center-align" style="position: absolute;bottom:0%;right:3%"><?php echo $page++; ?></p>
              </div>
              <div>
                <table class="striped center">
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th></th>
                  </tr>

                <?php
                  $sql_ingredients = $conn->query("SELECT * FROM ingredients WHERE code = '$code'");
                  $count = 1;
                  foreach ($sql_ingredients as $row_ingredients) {
                    $num = $row_ingredients['num'];
                    $unit = $row_ingredients['unit'];
                    print '<p>';
                    print '<tr>';
                    print  '<td>'. $count++.'</td>';
                    print  '<td>'. $row_ingredients['name'].'</td>';
                    print  '<td>'.''.$num.' '.$unit.'</td>';
                    print '</tr>';
                  }
                ?>
                </table>
                <p class="center-align" style="position: absolute;bottom:0%;right:3%"><?php echo $page++; ?></p>
              </div>

              <?php
                $sql_food_step = $conn->query("SELECT * FROM food_step WHERE code = '$code'");
                foreach ($sql_food_step as $row_food_step) {
                  $img = $row_food_step['pic'];
                  $description = $row_food_step['description'];
                  print '<div>';
                  print '<img src="page/php/'.$img.'" style="width:100%;height:40%;">';
                  print '<h5 align="center">'.$description.'</h5>';
                  print '<p class="center-align" style="position: absolute;bottom:0%;right:3%">'.$page++.'</p>';
                  print '</div>';
                }
               ?>

               <?php
                if($video != ''){
                  print '<div>';
                  print '<video src="page/php/'.$video.'" height="70%" width = "100%" controls></video>';
                  print '</div>';
                }
                ?>

               <div>
                 <h1 style="position: absolute;top:30%;left:40%;">EDN</h1>
               </div>


               <div class="hard" style="background-color:gray"00></div>
        		</div>
        	</div>
        </div>
      </div> <!--hide-->

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
      <div class="hide-on-med-and-up show-on-medium-and-down">
        <p id="demo"></p>
        <script type="text/javascript">
        $(document).ready(function(){
          //window.location.href = "index.html";
          var w = window.innerWidth;
          var h = window.innerHeight;

          document.getElementById("demo").innerHTML = "Width: " + w + "<br>Height: " + h;
        });
        $(window).resize(function() {
          var w = window.innerWidth;
          var h = window.innerHeight;
          if(w <= 993 || h >=615){
            window.location.href = "recipe_phone.php?code=<?php echo $_GET['code']; ?>";
          }
        });
        </script>

      </div><!--hide-->
      <br><br><br><br>
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
        function loadApp() {
        	// Create the flipbook
        	$('.flipbook').turn({
        			// Width
        			width:922,
        			// Height
        			height:600,
        			// Elevation
        			elevation: 50,
        			// Enable gradients
        			gradients: true,
        			// Auto center this flipbook
        			autoCenter: true
        	});
        }

        // Load the HTML4 version if there's not CSS transform
        yepnope({
        	test : Modernizr.csstransforms,
        	yep: ['lib/turn.js'],
        	nope: ['lib/turn.html4.js'],
        	both: ['css/basic.css'],
        	complete: loadApp
        });

        // keyboard
        $(document).keydown(function(e){
          var turnLock1 = false;
          var previous = 37, next = 39;
          function turn( direction )
          {
              if ( turnLock1 )
                  return;

              console.log( "flip to > " + direction );
              $(".flipbook").turn(direction);

              // prevents flipping all through the book at once
              turnLock1 = true;

              setTimeout( function()
              {
                  turnLock1 = false;
              }, 400 );
          }
          switch (e.keyCode) {
            case previous:
              turn('previous');
            break;
            case next:
              turn('next');
            break;
          }
        });
        </script>
        <script type="text/javascript">
        // leapmotion
        $(document).ready(function() {
          var ctl = new Leap.Controller({enableGestures: true});
          var swiper = ctl.gesture('swipe');
          var totalDistance = 0;
          var tolerance = 50;
          var cooloff = 300;

          var x = 2, y = 2;
          var turnLock = false;

          function turn( direction )
          {
              if ( turnLock )
                  return;

              console.log( "flip to > " + direction );
              $(".flipbook").turn(direction);

              // prevents flipping all through the book at once
              turnLock = true;

              setTimeout( function()
              {
                  turnLock = false;
              }, 400 );
          }

          swiper.update(function(g) {
              if (Math.abs(g.translation()[0]) > tolerance || Math.abs(g.translation()[1]) > tolerance) {

                  var xDir = Math.abs(g.translation()[0]) > tolerance ? (g.translation()[0] > 0 ? -1 : 1) : 0;
                  var yDir = Math.abs(g.translation()[1]) > tolerance ? (g.translation()[1] < 0 ? -1 : 1) : 0;

                  if (xDir===1 && yDir===0) {
                     turn('previous');
                     //alert("aa");
                   }
                  else if (xDir===-1 && yDir===0) { turn('next'); }
              }
          });
          ctl.connect();
        });
        </script>

    </body>
    <script type="text/javascript">
        $('.carousel.carousel-slider').carousel({fullWidth: true});
        // side nav (mobile)
        $(".button-collapse").sideNav();

    </script>
  </head>
