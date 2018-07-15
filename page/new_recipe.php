<?php
session_start();
$username = $_SESSION['username'];
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">

     <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
     <link type="text/css" rel="stylesheet" href="../css/style_bookshelf.css"  media="screen,projection"/>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> <script type="text/javascript" src="../js/materialize.min.js"></script>
     <script type="text/javascript" src="../js/home.js"></script>
     <!-- <script type="text/javascript" src="js/materialize.min.js"></script> -->
     <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css"> -->
     <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
     <!-- Compiled and minified JavaScript -->
     <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script> -->
   </header>
   <!-- Dropdown Structure -->
   <ul id="dropdown1" class="dropdown-content">
     <li class="divider"></li>
     <li><a href="user_profile.php"><i class="material-icons">account_box</i>User profile</a></li>
     <li><a href="../php/logout.php">Logout</a></li>
     <li class="divider"></li>
   </ul>

   <div class="navbar-fixed">
     <nav class="orange">
     <!--  <a href="#!" class="brand-logo">Logo</a> -->
     <a href="../new_home.php" class="brand-logo">Let's Cook</a>
       <!--<a href="home.php">
         <img class="responsive-img brand-logo hide-on-small-only" src="img/logo.jpg" alt="" width="13%">
       </a>-->
       <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
       <ul class="right hide-on-med-and-down">
         <li><a href="sell.php">Book of recipe</a></li>
         <li>
           <a class="dropdown-button" href="#!" data-activates="dropdown1">
             Welcome back, <b><?php echo $_SESSION['username']; ?></b>
             <i class="material-icons right">arrow_drop_down</i>
           </a>
         </li>
       </ul>
     </nav>
   </div>

   <!--Moblie slide bar-->
   <ul class="side-nav" id="mobile-demo">
     <center> <li><a href="new_home.php" style="pointer-events: none;cursor: default;"><b style="color:red;font-size:30px">Lest's Cook</b></a></li> </center>
     <li><a href="sell.php">Book of recipe</a></li>
     <li>
       <ul class="collapsible collapsible-accordion">
         <li>
           <a class="collapsible-header waves-effect waves-teal">
             Welcome back, <b style="color:blue"><?php echo $_SESSION['username'];; ?></b>
             <i class="material-icons right">arrow_drop_down</i>
           </a>
           <div class="collapsible-body">
             <ul>
               <li class="divider"></li>
               <li><a href="user_profile.php"><i class="material-icons">account_box</i>User profile</a></li>
               <li><a href="php/logout.php">Logout</a></li>
               <li class="divider"></li>
             </ul>
           </div>
         </li>
       </ul>
     </li>
   </ul>

   <script type="text/javascript">
     $(document).ready(function(){
       // mobile slide
       $(".button-collapse").sideNav();
     });
   </script>


 <script type="text/javascript" src="../new_recipe.js"></script>
      <br>
      <?php
        require 'php/config.php';
        $code = $_GET['code'];
        //echo $code;
        $page = 1;
        $sql_make = $conn->query("SELECT * FROM make_it WHERE code = '$code'");
        $count_row = $sql_make->rowCount();
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
          $post_username = $row_recipe['username'];
        }
       ?>
      <div class="container">
        <div class="top">
          <div class="row">
            <div class="col l4 m6 s12 center">
              <img src="../<?php echo $cover_img; ?>" style="height:50%;width:100%">
              <div class="col l6 m6 s12">
                <style>
                  .demo-table {width: 100%;border-spacing: initial;margin: 10px 0px;word-break: break-word;table-layout: auto;line-height:4.8em;color:#333;}
                  .demo-table td {border-bottom: #f0f0f0 1px solid;background-color: #ffffff;padding: 5px;}
                  .demo-table ul{margin:0;padding:0;}
                  .demo-table li{cursor:pointer;list-style-type: none;display: inline-block;color: #F0F0F0;text-shadow: 0 0 1px #666666;font-size:23px;}
                  .demo-table .highlight, .demo-table .selected {color:#F4B30A;text-shadow: 0 0 1px #F48F0A;}
                </style>
                <table class="demo-table centered">
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
              <style media="screen">
                .blink{
                animation: blink 1s linear infinite;
                }
                @keyframes blink{
                0%{opacity: 0;}
                50%{opacity: .5;}
                100%{opacity: 1;}
                }
              </style>
              <div class="col l6 m6 s12">
                <br>
                <?php echo $count_row; ?> people made <br>
                <a class="modal-trigger blink tooltipped" data-position="bottom" data-tooltip="Message to author" href="#modal2"> <i class="material-icons tiny">message</i> <?php echo $post_username; ?> post</a>
              </div>
            </div>
            <!-- upload user detail -->
            <div id="modal2" class="modal modal-fixed-footer">
              <?php
                $sql_post_how_many_recipe = $conn->query("SELECT * FROM recipe WHERE username = '$post_username'");
                $count_how_many = $sql_post_how_many_recipe->rowCount();
                $sql_post_user = $conn->query("SELECT * FROM user WHERE username = '$post_username'");
                foreach ($sql_post_user as $post_user) {
                  $post_user_name = $post_user['username'];
                  $post_img = $post_user['img'];
                  $post_join_time = $post_user['join_time'];
                }
               ?>

               <br>
               <div class="row" style="padding:10px">
                 <div class="col l4 m6">
                   <img class="circle responsive-img" src="../<?php echo $post_img; ?>" alt="" style="width:100%;height:200px">
                 </div>
                 <div class="col l8 m6">
                   <p>Name: <?php echo $post_user_name;?></p>
                   <p>Join days: <?php echo $post_join_time; ?></p>
                   <p>Uploaded recipe: <?php echo $count_how_many; ?></p>
                 </div>
               </div>
               <hr>
               <div class="message" style="padding-left:10%;padding-right:10%">
                 <h5>Message</h5>
                 <div class="input-field col s12">
                  <label for="textarea1">Message</label>
                  <input type="hidden" id="sender" value="<?php echo $_SESSION['username']; ?>">
                  <input type="hidden" id="receiver" value="<?php echo $post_user_name; ?>">
                  <textarea class="browser-default" id="message_TA" class="materialize-textarea" placeholder="You can leave message or ask he or she about this recipe's question" style="height:200px;"></textarea>
                </div>

                <center><a class="waves-effect waves-light btn" onclick="send_message()"><i class="material-icons right">send</i>Send</a></center>
               </div>
               <script type="text/javascript">
               function send_message(){
                 var receiver = document.getElementById('receiver').value;
                 var sender = document.getElementById('sender').value;
                 var message_TA = document.getElementById('message_TA').value;
                 $.ajax({
                   type:"POST",
                   url:"php/message.php",
                   data: 'sender=' + sender +
                         '&message_TA=' + message_TA +
                         '&receiver=' + receiver ,
                   success: function(data){
                     if(data == 1){
                       //alert(data);
                       alert('Send success');
                       $('#modal1_question').modal('close');
                     }
                     else {
                       //alert(data);
                       alert("Got some problem");
                       location.reload();
                     }
                   }
                 });
               }// send message
               </script>
            </div><!--modal2 END-->
            <div class="col l8 m6 s12 center">
              <h3><?php echo $title; ?></h3>
              <p><?php echo $simple_description; ?></p>
            </div>
          </div>
        </div> <!-- top END-->
        <input type="hidden" id="code" value="<?php echo $code;?>">
        <input type="hidden" id="username" value="<?php echo $_SESSION['username'];?>">
        <div class="taps">
          <div class="row">
            <div class="col l3 m6 s6" style="height:50px;">
              <a id="favorite" onclick="addFavorite()" style="width:100%;height:100%;" class="waves-effect waves-light btn red">
                <i class="large material-icons left">favorite</i>add favorite
              </a>
            </div>
            <script>
            function addFavorite() {
              var change;
              var code = document.getElementById('code').value;
              var username = document.getElementById('username').value;

              $.post('../php/getChange.php' , {postcode:code , postusername:username} ,
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
                        document.getElementById("favorite").innerHTML = "<i class='large material-icons left'>favorite</i>add favorite";
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

                  $.post('../php/getFavorite.php' , {postcode:code , postusername:username} ,
                  function(data){
                    if(data == "1"){
                      alert("Got something wrong");
                    }
                    else {
                      alert("Add successfully~");
                      //window.location.href = "login_Register_Admin.php";
                      document.getElementById("favorite").classList.remove('red');
                      document.getElementById("favorite").classList.add = "lightblue";
                      document.getElementById("favorite").style.backgroundColor = "lightblue";
                      document.getElementById("favorite").innerHTML = "<i class='large material-icons left'>favorite_border</i>added";

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
              $.post('../php/getChange.php' , {postcode:code , postusername:username} ,
              function(data){
                if(data == "1"){
                  document.getElementById("favorite").classList.remove('red');
                  document.getElementById("favorite").classList.add = "lightblue";
                  document.getElementById("favorite").style.backgroundColor = "lightblue";
                  document.getElementById("favorite").innerHTML = "<i class='large material-icons left'>favorite_border</i>added";
                }
                else {
                  document.getElementById("favorite").style.backgroundColor = "red";
                  document.getElementById("favorite").innerHTML = "<i class='large material-icons left'>favorite</i>add favorite";
                }
              });
            }); //ready END
            </script>
            <div class="col l3 m6 s6"  style="height:50px;">
              <a style="width:100%;height:100%;" class="waves-effect waves-light btn amber lighten-1" onclick="make_it('<?php echo $_SESSION['username'];?>' , '<?php echo $_GET['code']; ?>')">
                <i class="large material-icons left">done</i>I make it
              </a>
            </div>
            <div class="col l3 m6 s6"  style="height:50px;"> <br class="hide-on-large-only">
              <a style="width:100%;height:100%;" class="waves-effect waves-light btn orange lighten-2 modal-trigger" href="#modal1">
                <i class="large material-icons left">star</i>Rating
              </a>
            </div>
            <?php
              $sql_count_i = $conn->query("SELECT * FROM ingredients WHERE code = '$code'");
              $sql_count_ingredients = $sql_count_i->rowCount();
              $sql_count_s = $conn->query("SELECT * FROM food_step WHERE code = '$code'");
              $sql_count_step = $sql_count_s->rowCount();
              $disable = "";
              $hidden = "";
              if($sql_count_ingredients == 0 || $sql_count_step == 0){
                $disable = 'disabled';
                $hidden = "hidden";
              }
             ?>
            <div class="col l3 m6 s6"  style="height:50px;"> <br class="hide-on-large-only">
              <a style="width:100%;height:100%;" onclick="myFunctionPrint()" class="waves-effect waves-light btn orange darken-1 <?php echo $disable; ?>">
                <i class="large material-icons left">print</i>print
              </a>
            </div>
          </div>
        </div>
        <!-- Make it-->
        <script type="text/javascript">
          function make_it(username , code){
            if(confirm("Have you make it?") == true){
              $.ajax({
                  url: "../php/make_it.php",
                  data:'user=' +username +
                       '&code='+code,
                  type: "POST",
                success: function(a){
                  //alert(a);
                  if(a == 'exist'){
                    if(confirm("Do you want to unmake it?") == true){
                      $.ajax({
                          url: "../php/update_make_it.php",
                          data:'user=' +username +
                               '&code='+code,
                          type: "POST",
                        success: function(a){
                          alert(a);
                        },
                        error: function(a){
                          alert(a);
                        }
                      }); // update
                    }
                  }
                  //alert($('#code').val());
                },
                error: function(a){
                  alert(a);
                }
              }); // first
            }
          }
        </script>

        <!-- Rate -->
        <div id="modal1" class="modal modal-fixed-footer">
          <style>
            .demo-table {width: 100%;border-spacing: initial;margin: 20px 0px;word-break: break-word;table-layout: auto;line-height:4.8em;color:#333;}
            .demo-table td {border-bottom: #f0f0f0 1px solid;background-color: #ffffff;padding: 5px;}
            .demo-table ul{margin:0;padding:0;}
            .demo-table li{cursor:pointer;list-style-type: none;display: inline-block;color: #F0F0F0;text-shadow: 0 0 1px #666666;font-size:120px;}
            .demo-table .highlight, .demo-table .selected {color:#F4B30A;text-shadow: 0 0 1px #F48F0A;}
          </style>

          <script>
            function highlightStar(obj,id) {
            	removeHighlight(id);
            	$('.demo-table #tutorial-'+id+' li').each(function(index) {
            		$(this).addClass('highlight');
            		if(index == $('.demo-table #tutorial-'+id+' li').index(obj)) {
            			return false;
            		}
            	});
            }

            function removeHighlight(id) {
            	$('.demo-table #tutorial-'+id+' li').removeClass('selected');
            	$('.demo-table #tutorial-'+id+' li').removeClass('highlight');
            }

            function addRating(obj , id , user) {
            	$('.demo-table #tutorial-'+id+' li').each(function(index) {
            		$(this).addClass('selected');
            		$('#tutorial-'+id+' #rating').val((index+1));
            		if(index == $('.demo-table #tutorial-'+id+' li').index(obj)) {
            			return false;
            		}
            	});
            	$.ajax({

            	url: "../php/add_rating.php",
            	data:'id=' + id +
                   '&user=' + user +
                   '&code='+$('#code').val() +
                   '&rating='+$('#tutorial-'+id+' #rating').val(),
            	type: "POST",
            	success: function(a){
                if(a == '1' || a == '2' || a == '3' || a == '4' || a == '5'){
                  if (confirm("You already give a rate - " + a + ".\nDo you want make a rate again?")) {
                        var rate = prompt("Give a rate - (1 , 2 , 3 , 4 , 5)");
                        if(rate > 6 || rate < 0){
                          alert("Number cannot smaller than 1 and bigger than 5!");
                        }else {
                          $.ajax({
                            url: "../php/update_add_rating.php",
                            data:'user=' +$('#username').val() +
                                 '&code='+$('#code').val() +
                                 '&rating='+ rate,
                            type: "POST",
                          success: function(a){
                            alert("Rate success");
                            //alert(a);
                            //alert($('#code').val());
                          },
                          error: function(){
                            alert('failure');
                          }
                        }); // update
                        }
                    } else {
                      //alert("success");
                    }
                  //alert(a);
                }
                else{
                  alert(a);
                }
                //alert(a);
                //alert($('#code').val());
            	},
            	error: function(){
            		alert('failure');
            	}
            	});

            	//alert('addRating');
            }

            function resetRating(id) {
            	if($('#tutorial-'+id+' #rating').val() != 0) {
            		$('.demo-table #tutorial-'+id+' li').each(function(index) {
            			$(this).addClass('selected');
            			if((index+1) == $('#tutorial-'+id+' #rating').val()) {
            				return false;
            			}
            		});
            	}

            	//alert('resetRating');
            }
          </script>
            <!-- Rate -->

          <h1 class="center-align">Rating</h1>
          <br><br><br>
          <hr>
          <table class="demo-table">
            <tbody>

            <?php
              $select_rate = $conn->query("SELECT * FROM tutorial WHERE code = '$code'");
              foreach ($select_rate as $tutorial) {
            ?>
            <tr>
              <td valign="top">
                  <div id="tutorial-<?php echo $tutorial["id"]; ?>">
                    <input type="hidden" name="rating" id="rating" value="<?php echo $tutorial["rating"]; ?>" />
                    <input type="hidden" name="code" id="code" value="<?php echo $tutorial['code'];?>" />
                    <input type="hidden" name="username" id="username" value="<?php echo $_SESSION['username'];?>" />
                    <ul onMouseOut="resetRating(<?php echo $tutorial["id"]; ?>);">
                      <?php
                      for($i=1;$i<=5;$i++) {
                      $selected = "";
                      if(!empty($tutorial["rating"]) && $i<=$tutorial["rating"]) {
                    	$selected = "selected";
                      }
                      ?>
                      <li class='<?php echo $selected; ?>' onmouseover="highlightStar(this,<?php echo $tutorial["id"]; ?>);"
                    		 onmouseout="removeHighlight(<?php echo $tutorial["id"]; ?>);"
                    		 onClick="addRating(this , <?php echo $tutorial["id"]; ?> ,
                         <?php echo $_SESSION['username']; ?>);">
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
          <hr>
        </div><!--modal1 END-->

        <div class="print" id="print" hidden>
          <table border="1">
            <tr>
              <td align="center" colspan="3" style="border:none"> <img src="../img/logo.jpg" alt="" width="50%">  <hr> </td>
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
                $num = $row_ingredients_print['num'];
                $unit = $row_ingredients_print['unit'];
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
             //$img = $row_food_step_print['pic'];
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

        <div class="ingredients">
          <h4 <?php echo $hidden;?>>Ingredients</h4>
          <hr <?php echo $hidden;?>>
          <ul style="list-style-type: none;margin: 0; padding: 0; overflow: hidden;" <?php echo $hidden;?>>
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


        <div class="directions" <?php echo $hidden;?>>
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

        <div class="row" <?php echo $hidden;?>>
          <div class="col l8">
            <table>
            <?php
            $count_step = 1;
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
        <center <?php echo $hidden;?>>
          <div class="col l3 m3 s12">
            <a style="width:50%;" onclick="make_it()" class="waves-effect waves-light btn blue">
              <i class="large material-icons left">done</i>I make it
            </a>
          </div>
        </center>
        <?php
        if($video == 'php/video/' || $video == ''){

        }
        else{
          print '<br>';
           print'<h4>Video</h4>';
           print '<hr>';
           print '<div>';
           print '<center><video src="../'.$video.'" height="30%" width = "50%" controls></video></center>';
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
            <div class="card sticky-action card-shake hoverable" style="height:500px">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="../<?php echo $row_same['cover_img'];?>" style="width:100%;height:200px;%;">
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
         <div class="" id="reload_all_comment"></div>
         <div class="all_comment" id="all_comment">
           <div class="row">
             <input type="hidden" id="product_id_TA" value="<?php echo $_GET['code']; ?>">
             <input type="hidden" id="username_comment" name="" value="<?php echo $_SESSION['username']; ?>">
             <div class="" id="comment_row">
               <?php
                 //session_start();
                 $username_comment = $_SESSION['username'];
                 //echo $username_comment;
                 $img_read = "";
                 $sql_user = $conn->query("SELECT * FROM user WHERE username = '$username_comment'");
                 foreach ($sql_user as $row) {
                   $img_read = $row['img'];
                 }
                 //echo $img_read;
                 if($img_read == "" || $img_read == " "){
                   $img_read = "../page/php/img/user_image/user_icon.png";
                 }
                ?>
               <div class="col l3 m3 s12">
                  <img src="../<?php echo $img_read; ?>" alt="" class="circle responsive-img hide-on-small-only right" width="50%">
                  <center><img src="../<?php echo $img_read; ?>" alt="" class="circle responsive-img hide-on-med-and-up " width="30%"></center>
               </div>

               <div class="col l9 m9 s12">
                 <form class="" method="post">
                   <label for="textarea1">Comment</label>
                   <textarea required class="browser-default" placeholder="Write your comment" name="description" id="comment_TA" class="materialize-textarea" style="width: 100%;height: 100px;padding: 12px 20px;margin: 8px 0;box-sizing: border-box;"></textarea>
                   <a class="waves-effect waves-light btn" id="" onclick="submit_comment()">Comment</a>
                 </form>
               </div>
             </div><!-- comment_row -->

              <script type="text/javascript">
                function submit_comment(){
                  var product_id_TA = document.getElementById("product_id_TA").value;
                  var username_comment = document.getElementById("username_comment").value;
                  var comment_TA = document.getElementById("comment_TA").value;
                  if(comment_TA.length < 5){
                    alert("At least five words");
                    return false;
                  }
                 else{
                   $.ajax({
                     type:"POST",
                     url:"../php/comment_recipe.php",
                     data: 'username=' + username_comment +
                           '&product_id=' + product_id_TA +
                           '&comment=' + comment_TA,
                     success: function(data){
                       if(data == 1){
                         $('#all_comment').hide();
                         $('#reload_all_comment').load('../reload_all_comment.php?product_id=' + product_id_TA, function(){
                            // hide loader image
                            //$('#loader-image').hide();

                            // fade in effect
                            $('#reload_answer_comment_row').fadeIn('slow');
                        });
                         //alert(data);
                       }
                       else{
                          //alert(data);
                         alert("Got some problem! Please try again");
                         location.reload();
                       }
                     }
                   });
                    //alert("A");
                  }
                }
              </script>
           </div> <!-- comment row -->

           <div class="row">
             <div class="comment">
               <div class="card" id="comment_row">
                 <?php
                   $code = $_GET['code'];
                   //echo $username ;
                   $img_comment = "";
                   $sql_comment= $conn->query("SELECT a.* , b.* FROM user as a LEFT JOIN comment_recipe as b ON a.username = b.username WHERE b.recipe_code = '$code' ORDER BY comment_date DESC");

                   foreach ($sql_comment as $row_comment) {
                     $id = $row_comment['id'];
                     $img_comment = $row_comment['img'];

                     if($img_comment == "" || $img_comment == ' '){
                       $img_comment = "img/user_icon.png";
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
                          <center><img src="../<?php echo $img_comment; ?>" alt="" class="circle responsive-img " width="50%" >
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
                        url:"../php/modal2__recipe_report.php",
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
                      url:"../php/like_comment_recipe.php",
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


         <script type="text/javascript">
           $(document).ready(function(){
             $('#modal2_question_TA').val();
             // mobile slide
             //$(".button-collapse").sideNav();
             $('.modal').modal();
             //$('#modal1').modal('open');
           });
         </script>

      </div><!-- container -->
    </div>
      <?php
        require 'html_php/footer.php';
       ?>
    </body>
</html>
