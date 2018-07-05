<?php
  include 'html_php/new_hearder.php';
  include 'php/config.php';
  $user = $_SESSION['username'];
  $user_image = $conn->query("SELECT * FROM user WHERE username = '$user'");
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
   <div class="col l9 m6 s12">

   </div>
 </div>

 <hr>
 <h2>Today recommendtation</h2>
 <br><br><br><br>

   </body>
 </html>
