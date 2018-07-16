<?php
  include 'html_php/new_hearder.php';
  include 'php/config.php';
  $user = $_SESSION['username'];
  $user_image = $conn->query("SELECT * FROM user WHERE username = '$user'");
  $image = "";
  foreach ($user_image as $row_image) {
    $image = $row_image['img'];
  }
  if($image == "" || $image == " " || $image == "img/"){
    $image = "img/user_icon.png";
  }

   // gets the user IP Address
   $user_ip=$_SERVER['REMOTE_ADDR'];

   $check_ip = $conn->query("select userip from pageview where page='yourpage' and userip='$user_ip'");
   $countRow = $check_ip->rowCount();
   if($countRow>=1)
   {
   }
   else
   {
     $insertview = $conn->query("insert into pageview values('','yourpage','$user_ip')");
   }
  ?>


 <style media="screen">
 .td , .td1{
     border-bottom: 1px solid #ddd;
   }
  .td1{
     border-left : 1px solid #ddd;
   }
   .td1:hover{
      /* background-color: red; */
    }
    table a {
      display:block;
      /* background-color:red; */
      color: black;
      padding:5px;
    }
    table a:hover {
      color:orange;
    }

 </style>
 <div class="row">
   <div class="col l3 m6 s12 card" style="margin:10px">
     <table class="centered striped" border="1">
       <thead>
         <tr>
           <td colspan="2" class="center">
             <img class="circle" src="<?php echo $image; ?>" style="width:100%;height:250px;">
           </td>
         </tr>
         <tr>
           <td colspan="2" class="center"><?php echo $_SESSION['username']; ?></td>
         </tr>
       </thead>
       <tbody style="border : 1px solid #ddd;">
         <tr>
           <td class="td">
              <a href="my_profile.php?city='My Favorite'">Favorite</a>
           </td>
           <td class="td1">
             <a href="my_profile.php?city='My_kitchen'">My Kitchen</a>
           </td>
         </tr>
         <tr>
           <td class="td">
             <a href="my_profile.php?city='My_question'">My question</a>
           </td>
           <td class="td1">
             <a href="my_profile.php?city='message'">Message</a>
            </td>
         </tr>
         <tr>
           <td class="td">
             <a href="#modal1" class="modal-trigger">Upload recipe</a>
           </td>
           <td class="td1">
             <a href="my_profile.php?city='My_draft'">My draft</a>
           </td>
         </tr>
         <tr>
           <td class="td">
             <a href="my_profile.php?city='My_subscription'">My subscription</a>
           </td>
           <td class="td1">
             <a href="my_profile.php?city='notification'">Notification</a>
           </td>
         </tr>
         <tr>
           <td colspan="2">
             <a href="my_profile.php?city='My_profile'">Edit profile</a>
           </td>
         </tr>
       </tbody>
     </table>
     <br>

     <div id="modal1" class="modal modal-fixed-footer">
       <h2 class="center">Choose a method</h2>
       <hr>
       <div class="row center">
         <div class="col l6 m6 s12">
           <a href="upload_img.php"><img src="img/upload_img.png" alt="">
           <br><br>
           <p>In this method can upload image and video</p></a>
         </div>
         <hr class="hide-on-med-and-up">
          <div class="col l6 m6 s12">
           <a href="upload_video.php"><img src="img/upload_video.png" alt="">
           <p>In this method can upload video only</p></a>
         </div>
       </div>
     </div>

     <script type="text/javascript">
       $(document).ready(function(){
         // mobile slide
         //$(".button-collapse").sideNav();
         $('.modal').modal();
         //$('#modal1').modal('open');
       });
     </script>

   </div>
   <div class="col l8 m6 s12 grey lighten-4">
     <h2>Special for Today</h2>
      <div class="card horizontal">
        <div class="card-image">
          <img src="img/8.jpg">
        </div>
        <div class="card-stacked">
          <div class="card-content">
            <p>A special Chicken/Mutton curry for the special occasions or for a change?!!! You all would be bored with the routine recipes right!!! Then this is the recipe for a break.</p>
          </div>
          <div class="card-action">
            <a href="#">This is a link</a>
          </div>
        </div>
      </div>
      <br><br>
      <div class="card horizontal">
        <div class="card-image">
          <img src="img/7.jpg">
        </div>
        <div class="card-stacked">
          <div class="card-content">
            <p>This is a great idea but 3-5 minutes for the eggs will be too long. Try this-spray pan with Pam, heat pan as suggested, put egg in the pan, salt and pepper, cover and cook for one minute-no peeking. Take the pan off the heat, leave covered for one more minute-still no peeking. You will have a perfect fried egg with nice runny yolk.</p>
          </div>
          <div class="card-action">
            <a href="#">This is a link</a>
          </div>
        </div>
      </div>
   </div>
 </div>

 <div class="parallax-container" style="height:300px">
   <div class="parallax"><img src="img/home_parallax.jpg"></div>
 </div>

 <script type="text/javascript">
  $(document).ready(function(){
    $('.parallax').parallax();
     $('.slider').slider();
  });
 </script>

 <style>
   .demo-table {width: 100%;border-spacing: initial;margin: 10px 0px;word-break: break-word;table-layout: auto;line-height:4.8em;color:#333;}
   .demo-table td {border-bottom: #f0f0f0 1px solid;background-color: #ffffff;padding: 5px;}
   .demo-table ul{margin:0;padding:0;}
   .demo-table li{cursor:pointer;list-style-type: none;display: inline-block;color: #F0F0F0;text-shadow: 0 0 1px #666666;font-size:23px;}
   .demo-table .highlight, .demo-table .selected {color:#F4B30A;text-shadow: 0 0 1px #F48F0A;}
 </style>

    <div class="container row">
      <h2 class="center">Recommendation</h2>
      <script>
        var count = 0;
        $(document).ready(function(){
            $(window).scroll(function(){
                var position = $(window).scrollTop();
                var bottom = $(document).height() - $(window).height();
                //alert(position);
                //alert(bottom);
                if(position > (bottom - 5) ){

                    var row = Number($('#row').val());
                    var allcount = Number($('#all').val());
                    var rowperpage = 3;
                    row = row + rowperpage;
                    count = count + 6;
                    //alert(row);
                    if(row <= allcount){
                      //alert(row);
                        $('#row').val(row);
                        $.ajax({
                            url: 'php/fetch_data.php',
                            type: 'post',
                            data: {row:row, count:count},
                            success: function(response){
                                //alert(response);
                                $('.parallax').parallax();
                                $(".post:last").after(response).show().fadeIn("slow");
                            },
                            error: function(a){
                              alert(a);
                            }
                        });
                    }
                }
            });
        });
        </script>
        <?php
          require 'php/config.php';
          $rowperpage = 6;
          $sql = $conn->query("SELECT * FROM recipe LIMIT 0 , $rowperpage");
          $count_recipe = $sql->rowCount();
          //echo $count_recipe;
          foreach ($sql as $row_my_recipe) {
            $code = $row_my_recipe['code'];
        ?>
      <div class="post" id="post_<?php echo $row_my_recipe['id']; ?>">
        <div class="col l4 m6 s12">
          <div class="card sticky-action card-shake hoverable" style="height:500px">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="<?php echo $row_my_recipe['cover_img'];?>" style="width:100%;height:200px;%;">
            </div>

            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4"><?php echo $row_my_recipe['name']; ?><i class="material-icons right">more_vert</i></span>

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
              Type: <?php echo $row_my_recipe['type']; ?>
              <a class="btn-floating waves-effect waves-light red right btn tooltipped a-view_recipe" data-position="right" data-tooltip="View Recipe" href="recipe/<?php echo $row_my_recipe['code']; ?>"><i class="material-icons">book</i></a>
              <!-- <a id="<?php echo $row_my_recipe['code']; ?>" class="btn-floating waves-effect waves-light right tooltipped"  data-position="top" data-tooltip="Add to favorite" onclick="addFavorite('<?php echo $row_my_recipe['code']; ?>')"><i class="material-icons">stars</i></a> -->
              <br><br>
            </div>

            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4"><?php echo $row_my_recipe['name']; ?><i class="material-icons right">close</i></span>
              <?php
                $simple_description = $row_my_recipe['simple_description'];

                if($simple_description == '' || $simple_description == ' '){
                  $simple_description = 'He/She is very lazy...Nothings to show';
                }
              ?>
              <p> <?php echo $simple_description ?> </p>
            </div>
          </div>
          </div>
        </div> <!--div col s3 END-->
        <?php
          }
         ?>
         <input type="hidden" id="row" value="0">
         <input type="hidden" id="all" value="<?php echo $count_recipe; ?>">
    </div> <!-- row -->
    <?php
      require 'html_php/footer.php';
     ?>
   </body>
 </html>
