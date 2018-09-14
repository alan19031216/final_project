<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Recipe</title>
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.leapmotion.com/leap-0.6.4.js"></script>
    <script src="../js/leapcursor-with-dependencies.min.js?gestureColor=#6DCC44"></script>
    <!--rating-->
    <script src="../page/js/rate.js"></script>
    <script type="text/javascript" src="../page/extras/modernizr.2.5.3.min.js"></script>
    <script type="text/javascript" src="../new_recipe.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
  </head>
  <body>

      <nav>
        <div class="navbar-fixed orange">
        <!--  <a href="#!" class="brand-logo">Logo</a> -->
          <!--<a href="index.php"><img class="responsive-img brand-logo hide-on-small-only" src="img/logo.jpg" alt="" width="13%"></a>-->
          <a href="../new_index.php" class="brand-logo">Let's Cook</a>
          <a href="index.php" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="login_register.php">Login/Register</a></li>
            <li><a href="badges.html">Components</a></li>
          </ul>
        </div>
      </nav>

      <br>
      <?php
        require 'php/config.php';
        $code = $_GET['code'];
        $page = 1;
        $sql_recipe = $conn->query("SELECT * FROM recipe WHERE code = '$code'");
        foreach ($sql_recipe as $row_recipe) {
          $type = $row_recipe['type'];
          $pre_time = $row_recipe['pre_time'];
          $cooking_time = $row_recipe['cooking_time'];
          $number_of_serve = $row_recipe['number_of_serve'];
          $title = $row_recipe['name'];
          $cover_img = $row_recipe['cover_img'];
          $author = $row_recipe['username'];
          $product_code = $row_recipe['code'];
          $simple_description = $row_recipe['simple_description'];
          $video = $row_recipe['video'];
        }
       ?>
      <div class="container">
        <div class="top">
          <div class="row">
            <div class="col l4 m6 s12 center">
              <img src="../page/<?php echo $cover_img; ?>" style="height:50%;width:100%">
              <div class="col l6">
                <style>
                  .demo-table {width: 100%;border-spacing: initial;margin: 10px 0px;word-break: break-word;table-layout: auto;line-height:4.8em;color:#333;}
                  .demo-table td {border-bottom: #f0f0f0 1px solid;background-color: #ffffff;padding: 5px;}
                  .demo-table ul{margin:0;padding:0;}
                  .demo-table li{cursor:pointer;list-style-type: none;display: inline-block;color: #F0F0F0;text-shadow: 0 0 1px #666666;font-size:23px;}
                  .demo-table .highlight, .demo-table .selected {color:#F4B30A;text-shadow: 0 0 1px #F48F0A;}
                </style>
                <table class="demo-table">
                  <tbody>
                  <?php
                    $select_rate = $conn->query("SELECT * FROM tutorial WHERE code = '$code'");
                    foreach ($select_rate as $tutorial) {
                  ?>
                  <tr>
                    <td valign="top">
                        <div>
                          <ul>
                            <?php
                            for($i=1;$i<=5;$i++) {
                            $selected = "";
                            if(!empty($tutorial["rating"]) && $i<=$tutorial["rating"]) {
                            $selected = "selected";
                            }
                            ?>
                            <li id="rate_view" class='<?php echo $selected; ?>' style="font-size:23px">
                               &#9733;
                             </li>
                            <?php } // , <?php echo $tutorial['code'];  ?>

                          </ul>
                        </div>
                      </td>
                  </tr>
                  <?php
                    }

                  ?>
                  </tbody>
                </table>
              </div>
              <div class="col l6">
                <h4>made it | review</h4>
              </div>
            </div>
            <div class="col l8 m6 s12 center">
              <h3><?php echo $title; ?></h3>
              <p><?php echo $simple_description; ?></p>
            </div>
          </div>
        </div> <!-- top END-->

        <div class="taps">
          <div class="row">
            <div class="col l3" style="height:50px;">
              <a id="favorite" onclick="addFavorite()" href="login_register.php" style="width:100%;height:100%;" class="waves-effect waves-light btn red">
                <i class="large material-icons left">favorite</i>add favorite
              </a>
            </div>
            <div class="col l3 "  style="height:50px;">
              <a style="width:100%;height:100%;" onclick="make_it()" href="login_register.php" class="waves-effect waves-light btn blue">
                <i class="large material-icons left">done</i>I make it
              </a>
            </div>
            <div class="col l3 "  style="height:50px;">
              <a style="width:100%;height:100%;" onclick="rating()" href="login_register.php" class="waves-effect waves-light btn green">
                <i class="large material-icons left">star</i>Rating
              </a>
            </div>
            <div class="col l3 "  style="height:50px;">
              <a style="width:100%;height:100%;" onclick="myFunctionPrint()" href="login_register.php"class="waves-effect waves-light btn prink">
                <i class="large material-icons left">print</i>print
              </a>
            </div>
          </div>
        </div>

        <script type="text/javascript">
          function addFavorite(){
            alert("Please login!");
          }
          function make_it(){
            alert("Please login!");
          }
          function rating(){
            alert("Please login!");
          }

           function myFunctionPrint() {
             alert("Please login");
           }
        </script>

        <div class="ingredients">
          <h4>Ingredients</h4>
          <hr>
          <ul  style="list-style-type: none;margin: 0; padding: 0; overflow: hidden;">
            <li style=" display: inline;"><i class="material-icons">access_time</i> Prepaid time: <?php echo $pre_time?> minutes</li>
          </ul>
          <div class="row">
            <table id="table1" style="width:50%">
          <form action="#">
          <?php
            $sql_ingredients = $conn->query("SELECT * FROM ingredients WHERE code = '$code'");
            //$sql_ingredients->execute();
            $number_of_rows = $sql_ingredients->rowCount();
            //echo $number_of_rows;
            $count = 0;
            $class = '';
            foreach ($sql_ingredients as $row_ingredients) {
              $num = $row_ingredients['num'];
              $unit = $row_ingredients['unit'];
              if($count % 2 == 0){
                print '<tr>';
              }
          ?>
          <td>
            <p>
              <input type="checkbox" id="<?php echo $row_ingredients['id']; ?>" onclick="check('<?php echo $row_ingredients['id']; ?>')"/>
              <label for="<?php echo $row_ingredients['id']; ?>" id="label_<?php echo $row_ingredients['id']; ?>"><?php echo $row_ingredients['name']; ?> &nbsp;<?php echo $num; ?>&nbsp;<?php echo $unit; ?> </label>
            </p>
          </td>

          <?php
          $count++;
          if($count % 2 == 0){
            print '</tr>';
          }
            //echo $row_ingredients['id'];
          }

          ?>
          </div>
          </table>
          </form>

          <script type="text/javascript">
            function check(id){
              var lfckv = document.getElementById(id).checked;
              if(lfckv == true){
                document.getElementById("label_"+id).style.textDecoration = "line-through";
              }
              else{
                document.getElementById("label_"+id).style.textDecoration = "none";
              }
            }
          </script>
        </div>

        <div class="directions">
          <ul  style="list-style-type: none;margin: 0; padding: 0; overflow: hidden;">
            <li style=" display: inline;font-size:40px">Direction</li>
            <li  style="display: inline;float:right;"><input class="waves-effect waves-light btn amber accent-1 black-text" type="button" id="btnct" value="Timer" onclick="count1()"></li>
            <li  style="display: inline;float:right;visibility:hidden"><input class="waves-effect waves-light btn amber accent-1" type="button"></li>
            <li  style="display: inline;float:right;"><input class="waves-effect waves-light btn orange accent-1 black-text" type="button" id="btnct" value="Stopwatch" onclick="stopwatch()"></li>
          </ul>
          <script type="text/javascript">
          $(document).ready(function(){
            $("#timer").hide();
          });

          </script>
          <hr>
          <ul  style="list-style-type: none;margin: 0; padding: 0; overflow: hidden;">
            <li style=" display: inline;"> <i class="material-icons">access_time</i> Cooking times: <?php echo $cooking_time?> minutes</li>
          </ul>
          <script type="text/javascript">
          $(document).ready(function(){
            $("#stopwatch_div").hide();
          });

          var h1 = document.getElementsByTagName('h4')[2],
              start = document.getElementById('start'),
              stop = document.getElementById('stop'),
              clear = document.getElementById('clear'),
              seconds = 0, minutes = 0, hours = 0,
              t;
          </script>

          <!--timer sound-->
          <audio id="myAudio">
            <source src="../mp3/alarm.mp3" type="audio/mp3">
          </audio>
          <style media="screen">
          .numberCircle {
              border-radius: 50%;
              behavior: url(PIE.htc);
              /* remove if you don't care about IE8 */
              width: 50px;
              height: 50px;
              padding: 7px;
              background: #fff;
              border: 2px solid #666;
              color: #666;
              text-align: center;
              font: 32px Arial, sans-serif;
              }
          </style>
          <br>
        </div>

        <div class="row">
          <div class="col l8">
            <table>
            <?php
            $count_step = 0;
              $sql_food_step = $conn->query("SELECT * FROM food_step WHERE code = '$code'");
              foreach ($sql_food_step as $row_food_step) {
                $description = $row_food_step['description'];
                ?>
                <tr>
                  <td style="width:10%;"><div class="numberCircle"><?php echo $count_step++; ?></div></td>
                  <td><h5 align=""><?php echo $description; ?></h5></td>
                </tr>

                <?php
              }
             ?>
             </table>
          </div>
          <div class="col l4">
            <li  style="display: inline;float:right;">
              <div class="" style="background-color:red;border:1px solid black;" id="timer">
                <br>
                <center><span id="timespan" style="border:1px solid black;font-size:30px;background-color:white"></span></center>
                <br>
                <center><button class="waves-effect waves-light btn" type="button" value="Start" onclick="countdown()">Start</button>
                <button class="waves-effect waves-light btn blue" type="button" value="Stop" onclick="cdpause()">Stop</button>
                <br><br>
                <button class="waves-effect waves-light btn" type="button" value="Reset" onclick="cdreset()">Reset</button></center>
              </div>
            </li>
            <li  style="display: inline;float:right;">
              <div id="stopwatch_div" style="background-color:green;">
                <br>
                <center><h4 style="border:1px solid black;background-color:white;"><time>00:00:00</time></h4><center>
                <button class="waves-effect waves-light btn" id="start" onclick="start1()">start</button>
                <button class="waves-effect waves-light btn blue" id="stop">stop</button>
                <br><br>
                <button class="waves-effect waves-light btn" id="clear">clear</button>
              </div>
            </li>
          </div>
        </div>

        <center>
          <div class="col l3 "  style="height:50px;">
            <a style="width:50%;height:100%;" onclick="make_it()" href="login_register.php" class="waves-effect waves-light btn blue">
              <i class="large material-icons left">done</i>I make it
            </a>
          </div>
        </center>
        <?php
         if($video == 'php/video/'){

         }
         else{
           print '<br>';
            print'<h4>Video</h4>';
            print '<hr>';
            print '<div>';
            print '<center><video src="../page/'.$video.'" height="30%" width = "50%" controls></video></center>';
            print '</div>';
         }
         ?>
        <hr>
        <h4>Same as this type's recipe</h4>
        <div class="same">
          <?php
           $sql_same = $conn->query("SELECT * FROM recipe WHERE type = '$type' AND name != '$title' LIMIT 3");
           $sql_count_same = $sql_same->rowCount();
           if($sql_count_same == 0){
          ?>
          <div class="col l12 m12 s12">
            <div class="card blue-grey darken-1">
              <div class="card-content white-text">
                <span class="card-title">Dont has any related recipe</span>
              </div>
            </div>
          </div>
         <?php
           }
           else{
         ?>
         <div class="row">
         <?php
             foreach ($sql_same as $row_same) {
         ?>
         <div class="col l4 m6 s12">
           <div class="card sticky-action card-shake hoverable" style="height:550px">
             <div class="card-image waves-effect waves-block waves-light">
               <img class="activator" src="../page/<?php echo $row_same['cover_img'];?>" style="width:100%;height:200px;%;">
             </div>

             <div class="card-content">
               <span class="card-title activator grey-text text-darken-4"><?php echo $row_same['name']; ?><i class="material-icons right">more_vert</i></span>

               <table class="demo-table">
                 <tbody>
                 <?php
                   $select_rate = $conn->query("SELECT * FROM tutorial WHERE code = '$code'");
                   foreach ($select_rate as $tutorial) {
                 ?>
                 <tr>
                   <td valign="top">
                       <div>
                         <ul >
                           <?php
                           for($i=1;$i<=5;$i++) {
                           $selected = "";
                           if(!empty($tutorial["rating"]) && $i<=$tutorial["rating"]) {
                           $selected = "selected";
                           }
                           ?>
                           <li class="<?php echo $selected; ?> hide-on-small-only" id="rate_view_<?php echo $i; ?>" style="font-size:20px">
                              &#9733;
                            </li>
                            <li class="<?php echo $selected; ?> hide-on-med-and-up" id="rate_view_<?php echo $i; ?>" style="font-size:45px">
                               &#9733;
                             </li>
                           <?php } // , <?php echo $tutorial['code'];  ?>
                         </ul>
                       </div>
                     </td>
                 </tr>
                 <?php
                   }
                 ?>
                 </tbody>
               </table>
             </div>
             <div class="card-action">
               Type: <?php echo $row_same['type']; ?>
               <br><br>
               <a class="btn-floating waves-effect waves-light red right btn tooltipped a-view_recipe" data-position="right" data-tooltip="View Recipe" href="<?php echo $row_same['code']; ?>"><i class="material-icons">book</i></a>
               <!-- <a id="<?php echo $row_same['code']; ?>" class="btn-floating waves-effect waves-light right tooltipped"  data-position="top" data-tooltip="Add to favorite" onclick="addFavorite('<?php echo $row_same['code']; ?>')"><i class="material-icons">stars</i></a> -->
               <br><br>
             </div>

             <div class="card-reveal">
               <span class="card-title grey-text text-darken-4"><?php echo $row_same['name']; ?><i class="material-icons right">close</i></span>
               <?php
                 $simple_description = $row_same['simple_description'];

                 if($simple_description == '' || $simple_description == ' '){
                   $simple_description = 'He/She is very lazy...Nothings to show';
                 }
               ?>
               <p> <?php echo $simple_description ?> </p>
             </div>
           </div>
           </div>
         <?php
             }
           }//  same foreach
         ?>
        </div>
        </div>

        <hr>
        <h4>Comment</h4>
        <div class="row">
          <div class="comment">
            <div class="card" id="comment_row">
              <?php
                $code = $_GET['code'];
                //echo $username ;
                $img = "";
                $sql_comment= $conn->query("SELECT a.* , b.* FROM user as a LEFT JOIN comment_recipe as b ON a.username = b.username WHERE b.recipe_code = '$code' ORDER BY comment_date DESC");
                $sql_count_comment = $sql_comment->rowCount();
                if($sql_count_comment == 0){
               ?>
               <div class="col l12 m12 s12">
                 <div class="card blue-grey darken-1">
                   <div class="card-content white-text">
                     <span class="card-title">Dont has any related recipe</span>
                   </div>
                 </div>
               </div>
               <?php
                }
                else{
                  foreach ($sql_comment as $row_comment) {
                    $id = $row_comment['id'];
                    $img = $row_comment['img'];
                    if($img == "" || $img == " " || $img == "img/"){
                      $img = "img/user_icon.png";
                    }
                    $sql_lik = $conn->query("SELECT * FROM liked WHERE comment_id = '$id'")->rowCount();
                    $like = '';
                    if($sql_lik == 0){
                      $like = 'Like';
                      $like_color = 'white';
                    }
                    else{
                      $like = 'Liked';
                      $like_color = 'black';
                    }
                ?>
               <div class="card">
                 <div class="card-content">
                   <div class="row">
                     <div class="col l3 m3 s12">
                       <center><img src="../page/<?php echo $img; ?>" alt="" class="circle responsive-img " width="50%" >
                         <p><?php echo $row_comment['username']; ?></p>
                       </center>
                     </div>
                     <div class="col l9 m9 s12">
                       <?php echo $row_comment['comment']; ?>
                       <br><br><br>
                       <p class="right"><?php echo $row_comment['comment_date']; ?></p>
                     </div>
                     <div class="col l12 m12 s12">
                       <a class="waves-effect waves-light btn red right" onclick="report_comment('<?php echo $row_comment['id']; ?>')"><i class="material-icons left">flag</i>Report</a>
                       <a class="right" href="#" style="visibility:hidden">daas</a>
                       <a class="waves-effect waves-light btn right orange" id="like_comment_<?php echo $row_comment['id']; ?>" onclick="like_comment('<?php echo $row_comment['id']; ?>')" >  <i class="material-icons left" style='color:<?php echo $like_color; ?>'>thumb_up</i><?php echo $like; ?></a>
                     </div>
                   </div>
                 </div>
               </div>
               <?php
                    }
                  } // foreach
               ?>
             </div><!-- comment_row -->
             <script type="text/javascript">
               var id;
               function report_comment(a){
                 id = a;
                 //alert(a);
                 $('#modal2_question').modal('open');
               }

               $(document).on('click', '.modal2_question_submit', function(){
                 var modal2_question_check1 = document.getElementById('modal2_question_check1').checked;
                 var modal2_question_check2 = document.getElementById('modal2_question_check2').checked;
                 var modal2_question_check3 = document.getElementById('modal2_question_check3').checked;
                 var modal2_question_check4 = document.getElementById('modal2_question_check4').checked;
                 var username = document.getElementById('modal2_question_username').value;
                 var modal2_question_TA = document.getElementById('modal2_question_TA').value;
                 var modal2_check = new Array();
                 var modal2_count_check = 0;
                 if(modal2_question_check1 == false && modal2_question_check2 == false && modal2_question_check3 == false && modal2_question_check1 == false){
                   alert("At least select one");
                 }
                 else{
                   if(modal2_question_check1 == true){
                     modal2_check[modal2_count_check++] = document.getElementById('modal2_question_check1').value;
                   }
                   if(modal2_question_check2 == true){
                     modal2_check[modal2_count_check++] = document.getElementById('modal2_question_check2').value;
                   }
                   if(modal2_question_check3 == true){
                     modal2_check[modal2_count_check++] = document.getElementById('modal2_question_check3').value;
                   }
                   if(modal2_question_check4 == true){
                     modal2_check[modal2_count_check++] = document.getElementById('modal2_question_check4').value;
                   }

                   $.ajax({
                     type:"POST",
                     url:"php/modal2__recipe_report.php",
                     data: 'username=' + username +
                           '&modal2_question_TA=' + modal2_question_TA +
                           '&modal2_check=' + modal2_check +
                           '&id=' + id,
                     success: function(data){
                       if(data == 1){
                         alert('Report successful');
                         $('#modal2_question').modal('close');
                       }
                       else {
                         alert("Got some problem");
                         location.reload();
                       }
                     }
                   });
                 }
               });
             </script>

             <div id="modal2_question" class="modal modal-fixed-footer">
               <h2 class="center">Report a Comment</h2>
               <hr>
               <div class="row" style="padding:15px;">
                 <div class="col l3 m3 s6">
                   <input type="hidden" id="modal2_question_username" value="<?php echo $_SESSION['username']; ?>">
                   <input type="checkbox" id="modal2_question_check1" value="Got a problems or garbled characters">
                   <label for="modal2_question_check1">Got a problems or garbled characters</label>
                 </div>
                 <div class="col l3 m3 s6">
                   <input type="checkbox" id="modal2_question_check2" value="Use inappropriate publication and language"/>
                   <label for="modal2_question_check2">Use inappropriate publication and language</label>
                 </div>
                 <div class="col l3 m3 s6">
                   <input type="checkbox" id="modal2_question_check3" value="3"/>
                   <label for="modal2_question_check3">Red</label>
                 </div>
                 <div class="col l3 m3 s6">
                   <input type="checkbox" id="modal2_question_check4" value="4"/>
                   <label for="modal2_question_check4">Red</label>
                 </div>

                 <div class="input-field col s12">
                   <textarea id="modal2_question_TA" class="materialize-textarea"></textarea>
                   <label for="modal2_question_TA">Other</label>
                   <br><br>
                   <center>
                     <button class="modal2_question_submit waves-effect waves-light btn" type="button" name="button">Submit</button>
                   </center>
                 </div>
               </div>
             </div><!-- modal2_question-->

             <script type="text/javascript">
               function like_comment(a){
                 var username = document.getElementById('username_comment').value;
                 $.ajax({
                   type:"POST",
                   url:"php/like_comment_recipe.php",
                   data: 'username=' + username +
                         '&id=' + a,
                   success: function(data){
                     if(data == 1){
                       document.getElementById("like_comment_"+a).innerHTML = "<i class='material-icons left' style='color:black'>thumb_up</i>Liked";
                       //alert(data);
                     }
                     else if (data == 3) {
                       document.getElementById("like_comment_"+a).innerHTML = "<i class='material-icons left'>thumb_up</i>Like";
                     }
                     else {
                       //alert(data);
                       alert("Got some problem");
                       location.reload();
                     }
                   }
                 });
               }
             </script>
           </div> <!-- all user comment-->
         </div>
      </div>
    </div><!-- container -->
    <?php
      include 'html_php/footer.php';
     ?>
