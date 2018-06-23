<?php
require 'html_php/header.php';
require 'php/config.php';
require 'html_php/navbar_html.php';
//echo $code;
 ?>
   <title>Recipe</title>
   <link rel="stylesheet" href="css/materialize-stepper.min.css">
   <script src="https://js.leapmotion.com/leap-0.6.4.js"></script>
   <script type="text/javascript" src="extras/modernizr.2.5.3.min.js"></script>
  </head>
    <body>
      <?php
      $name_history = $_SESSION['username'];
      $code_history = $_GET['code'];
      $check_history = $conn->query("SELECT * FROM history WHERE username = '$name_history'");
      $temp_history = array(3);
      $code_array = array(3);
      for($i = 0; $i < 3; $i++){
        $code_array[$i] = '';
        $temp_history[$i] = '';
      }
      $count_code = 0;
      foreach ($check_history as $row_code) {
        $code_array[$count_code] = $row_code['code'];
        $temp_history[$count_code] = $row_code['id'];
        $count_code++;
        //echo $count_code;
      }
      //echo $code_history;
      $count_history = $check_history->rowCount();
      //echo $count_history;

      if($count_history < 3){
          //echo "12313213";
          if($code_array[0] == $code_history || $code_array[1] == $code_history || $code_array[2] == $code_history){
          //if($code_array[0] == '0X740'){
            //echo "asdsdsadsadaa";
          }
          else {
            $history_insert = $conn->query("INSERT INTO history(username , code)VALUES('$name_history' , '$code_history')");
          }
      }
      else{
        if($code_array[0] == $code_history || $code_array[1] == $code_history || $code_array[2] == $code_history){
        //if($code_array[0] == '0X740'){
          //echo "asdsdsadsadaa";
        }
        else {

          /*echo "1: " .$temp_history[0];
          echo " 2: " .$temp_history[1];
          echo " 3: " .$temp_history[2];*/
          $delect_history = ("DELETE FROM history WHERE id = '$temp_history[0]'");
          //$delect_history->execute();
          if($conn->query($delect_history)){
            $history_insert = $conn->query("INSERT INTO history(username , code)VALUES('$name_history' , '$code_history')");
          }
          else {
            echo "error";
          }

        }

      }

       ?>

        <div class="flipbook-viewport">
      	<div class="container">
      		<div class="flipbook">
            <div class="hard next-button" style="background-image:url(img/logo-ConvertImage.png);">sada</div>
            <?php
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
            <div class="hard next-button" style="background-color:gray">
              <h1 class="center-align" style="position: absolute;top:30%"><?php echo $title; ?></h1>
              <p class="center-align" align="center" style="position: absolute;bottom:0%;color:white;right:3%"><?php echo $page++; ?></p>
            </div>
      		  <div>
              <img src="php/<?php echo $cover_img; ?>" style="height:40%;width:100%">
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
                print '<img src="php/'.$img.'" style="width:100%;height:40%;">';
                print '<h5 align="center">'.$description.'</h5>';
                print '<p class="center-align" style="position: absolute;bottom:0%;right:3%">'.$page++.'</p>';
                print '</div>';
              }
             ?>
             <div>
               <h1 style="position: absolute;top:30%;left:40%;">END</h1>
               <div class="row">
                 <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <div id="favorite" class="col s6 waves-effect waves-light btn-large"  onclick="addFavorite()">
                </div>
                <input type="hidden" id="code" value="<?php echo $code;?>">
                <input type="hidden" id="username" value="<?php echo $_SESSION['username'];?>">
                <a class="modal-trigger" href="#modal1"><div class="col s6 green waves-effect waves-light btn-large">
                  Comment
                </div></a>

                <a onclick="myFunctionPrint()"><div class="col s6 green waves-effect waves-light btn-large">
                  Print
                </div></a>
              </div>
             </div>
             <div class="hard" style="background-color:gray"00></div>
      		</div>
      	</div>
      </div>

      <div id="modal1" class="modal modal-fixed-footer">
        <?php
          require 'html_php/comment.php';
         ?>
      </div>

      <div class="print" id="print" hidden>
        <table border="1">
          <tr>
            <td align="center" colspan="3" style="border:none"> <img src="img/logo.jpg" alt="" width="50%">  <hr> </td>
          </tr>
          <tr>
            <td colspan="3" align="center"><h2>Ingredients</h2></td>
          </tr>

          <tr align="center">
            <td> <b>Name</b> </td>
            <td> <b>Number</b> </td>
            <td> <b>Unit</b> </td>
          </tr>
          <?php
            $sql_ingredients_print = $conn->query("SELECT * FROM ingredients WHERE code = '$code'");
            foreach ($sql_ingredients_print as $row_ingredients_print) {
              $num = $row_ingredients['num'];
              $unit = $row_ingredients['unit'];
           ?>
          <tr align="center">
            <td width="30%;"><?php echo $row_ingredients_print['name']; ?></td>
            <td><?php echo $num; ?></td>
            <td><?php echo $unit; ?></td>
          </tr>
          <?php
            }
           ?>
           <tr>

           </tr>
           <tr>
             <td colspan="3" align="center"><h2>Step</h2></td>
           </tr>

           <tr>
             <td align="center"> <b>Step</b> </td>
             <td colspan="2"> <b>Description</b> </td>
           </tr>
         </tr>
         <?php
         $sql_food_step_print = $conn->query("SELECT * FROM food_step WHERE code = '$code'");
         $count = 1;
         foreach ($sql_food_step_print as $row_food_step_print) {
           $img = $row_food_step_print['pic'];
           $description = $row_food_step_print['description'];
          ?>
         <tr align="">
           <td align="center"><?php echo $count ?></td>
           <td colspan="2"><?php echo $description; ?></td>
         </tr>
         <?php
         $count++;
           }
          ?>
        </table>
        <hr>
      </div>

      <script type="text/javascript">
         function myFunctionPrint() {
            var mywindow = window.open('', 'PRINT', 'height=400,width=600');
            mywindow.document.write('<html><head><body>');
            mywindow.document.write(document.getElementById("print").innerHTML);
            mywindow.document.write('</body></html>');
            mywindow.document.close(); // necessary for IE >= 10
            mywindow.focus(); // necessary for IE >= 10*/

            mywindow.print();
            mywindow.close();
         }
      </script>

      <script>
      function addFavorite() {
        var change;
        var code = document.getElementById('code').value;
        var username = document.getElementById('username').value;

        $.post('php/getChange.php' , {postcode:code , postusername:username} ,
        function(data){
          if(data == "1"){
            //alert("Data1: " + data);
            //change = data;
            if (confirm("Do want to unfavorite it??")) {
              $.post('php/getUNFavorite.php' , {postcode:code , postusername:username} ,
              function(data){
                if(data == "1"){
                  alert("Remove successfully");
                  //alert(data);
                  //window.location.href = "login_Register_Admin.php";
                  document.getElementById("favorite").style.backgroundColor = "red";
                  document.getElementById("favorite").innerHTML = "Add to Favorite";
                }
                else {
                  alert("Got something wrong");
                }
              });
            }else {

              }
          }
          else {
            //alert("Data2: " + data);
          //  change = data;

            $.post('php/getFavorite.php' , {postcode:code , postusername:username} ,
            function(data){
              if(data == "1"){
                alert("Got something wrong");
              }
              else {
                alert("Add successfully~");
                //window.location.href = "login_Register_Admin.php";
                document.getElementById("favorite").style.backgroundColor = "lightblue";
                document.getElementById("favorite").innerHTML = "Added";

              }
            });
          }
        });

        }
      </script>

      <script type="text/javascript">
      $(document).ready(function(){
        //$('#modal1').modal('open');

        var code = document.getElementById('code').value;
        var username = document.getElementById('username').value;
        $.post('php/getChange.php' , {postcode:code , postusername:username} ,
        function(data){
          if(data == "1"){
            document.getElementById("favorite").style.backgroundColor = "lightblue";
            document.getElementById("favorite").innerHTML = "Added";
          }
          else {
            document.getElementById("favorite").style.backgroundColor = "red";
            document.getElementById("favorite").innerHTML = "Add to Favorite";
          }
        });

        $('.modal').modal();
        $('#modal1').modal('open');
      }); //ready END
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
    <script type="text/javascript" src="js/home.js"></script>
  </head>
