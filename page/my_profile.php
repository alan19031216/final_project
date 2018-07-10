<?php
include 'html_php/new_hearder.php';
include 'php/config.php';
$username = $_SESSION['username'];

$city = $_GET['city'];
 ?>

 <script type="text/javascript">
 $(document).ready(function(){
     var i, tabcontent, tablinks;
     tabcontent = document.getElementsByClassName("tabcontent");
     for (i = 0; i < tabcontent.length; i++) {
         tabcontent[i].style.display = "none";
     }
     tablinks = document.getElementsByClassName("tablinks");
     for (i = 0; i < tablinks.length; i++) {
         tablinks[i].className = tablinks[i].className.replace(" active", "");
     }
     document.getElementById(<?php echo $city ?>).style.display = "block";
     //currentTarget.className += " active";
 });
 </script>

 <script src="../page/js/rate.js"></script>
 <link rel="stylesheet" href="css/materialize-stepper.min.css">
 <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css"  media="screen,projection"/>
 <link type="text/css" rel="stylesheet" href="https://rawgit.com/Kinark/Materialize-stepper/master/materialize-stepper.min.css"  media="screen,projection"/>

 <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
 <script src="https://rawgit.com/Kinark/Materialize-stepper/master/materialize-stepper.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
 <!-- Compiled and minified JavaScript -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>

 <script src="js/materialize-stepper.min.js"></script>

 <style>
    /* Style the tab content */
    .tabcontent {
       display: none;
       padding: 6px 12px;
       -webkit-animation: fadeEffect 1s;
       animation: fadeEffect 1s;
    }

    /* Fade in tabs */
    @-webkit-keyframes fadeEffect {
       from {opacity: 0;}
       to {opacity: 1;}
    }
    </style>
  <br>
  <div class="page-content" id="page-content"></div>
  <div class="page-content_message" id="page-content_message"></div>
  <div class="row all_row" id="all_row">
    <div class="col l2 m4 s12 tab">
      <br>
      <a href="#" onclick="openCity(event, 'My Favorite')">
        <div class="col l12 m12 s12 waves-effect waves-light btn">
          My Favorite
        </div>
      </a>
      <br><br>
      <a href="#" onclick="openCity(event, 'My_kitchen')">
        <div class="col l12 m12 s12 waves-effect waves-light btn">
            My kitchen
        </div>
      </a>
      <br><br>
      <a href="#" onclick="openCity(event, 'My_question')">
        <div class="col l12 m12 s12 waves-effect waves-light btn">
          My question
        </div>
      </a>
      <br><br>
      <a href="#" onclick="openCity(event, 'message')">
        <div class="col l12 m12 s12 waves-effect waves-light btn">
          Message
        </div>
      </a>
      <br><br>
      <a href="#" onclick="openCity(event, 'notification')">
        <div class="col l12 m12 s12 waves-effect waves-light btn">
          Notification
        </div>
      </a>
      <br><br>
      <a href="#" onclick="openCity(event, 'My_draft')">
        <div class="col l12 m12 s12 waves-effect waves-light btn">
          My draft
        </div>
      </a>
      <br><br>
      <a href="#" onclick="openCity(event, 'My_subscription')">
        <div class="col l12 m12 s12 waves-effect waves-light btn">
          My subscription
        </div>
      </a>
      <br><br>
      <a href="#" onclick="openCity(event, 'My_book')">
        <div class="col l12 m12 s12 waves-effect waves-light btn">
          My book
        </div>
      </a>
      <br><br>
      <a href="#" onclick="openCity(event, 'My_profile')">
        <div class="col l12 m12 s12 waves-effect waves-light btn">
          My profile
        </div>
      </a>
      <br>
    </div><!-- tab -->
    <br>

    <div class="col l10 m8 s12 grey lighten-3">
      <div id="My Favorite" class="tabcontent col l12 m12 s12">
        <?php
          include 'my_profile/my_favorite.php';
         ?>
      </div><!-- My Favorite -->

      <div id="My_kitchen" class="tabcontent">
        <?php
          include 'my_profile/my_kitchen.php';
         ?>
      </div><!-- My kitchen-->

      <div id="My_question" class="tabcontent">
        <?php
          include 'my_profile/my_question.php';
         ?>
      </div> <!-- My_question-->

      <div id="message" class="tabcontent">
        <div class="row">
          <?php
            date_default_timezone_set("Asia/Kuala_Lumpur");
            $message_user = $_SESSION['username'];
            $sql_message_user = $conn->query("SELECT a.* , b.* FROM user as a LEFT JOIN message_sender as b on a.username = b.sender WHERE b.receiver = '$message_user'");
            foreach ($sql_message_user as $row_message_user) {
              $date = strtotime("now");
              $time = $row_message_user['send_date'];
              $date1 = strtotime("$time");
              $t = floor(($date-$date1)/86400);
              if($t == 0){
                $t = date('H:i', $date1);
              }
              else if($t == 1){
                $t = "Yesterday";
              }
              else if($t == 2){
                $t = "2 days ago";
              }
              else if($t == 3){
                $t = "3 days ago";
              }
              else{
                //$t;
                $t = date('d-m-y', $date1);
              }

              $message_img = $row_message_user['img'];
              if($message_img == '' || $message_img == ' ' || $message_img == 'img/'){
                $message_img = "img/user_icon.png";
              }
              else{
                $message_img = $row_message_user['img'];
              }
           ?>
          <a class="edit-btn_message">
            <div class="col l6 m12 s12">
              <div class="card horizontal">
                <div class="card-image">
                  <img src="<?php echo $message_img; ?>" style="width:100%;height:200px;">
                </div>
                <div class="card-stacked">
                  <div class="card-content">
                    <div class='message_code display-none' hidden><?php echo $row_message_user['message_code']; ?></div>
                    <div class='sender display-none' hidden><?php echo $row_message_user['sender']; ?></div>
                    <div class='receiver display-none' hidden><?php echo $row_message_user['receiver']; ?></div>
                    <h4><?php echo $row_message_user['sender'] ?></h4>
                    <p>&nbsp;&nbsp;<?php echo $row_message_user['message']; ?></p>
                    <p class="right"><?php echo $t; ?></p>
                  </div>
                </div>
              </div>
            </div>
          </a>
          <?php
            } // $row_message_user
           ?>
        </div>

        <script type="text/javascript">

        $(document).on('click', '.edit-btn_message', function(){

          var message_code = $(this).find('.message_code').text();
          var sender = $(this).find('.sender').text();
          var receiver = $(this).find('.receiver').text();
          //alert(receiver);

          // hide create product button
          //$('#row_card').hide();

          // fade out effect first
          $('#all_row').fadeOut('slow', function(){
              $('#page-content_message').load('chat_room.php?message_code=' + message_code + '&sender=' + sender + '&receiver=' + receiver, function(){
              //$('#page-content').load('question_question.php', function(){
                  // hide loader image
                  //$('#loader-image').hide();

                  // fade in effect
                  $('#page-content_message').fadeIn('slow');
              });
          });
        });
        </script>

      </div> <!-- message-->

      <div id="notification" class="tabcontent">
        <?php
        include 'my_profile/notification.php';
         ?>
      </div> <!-- my subscription-->

      <div id="My_subscription" class="tabcontent">
        <?php
        include 'my_profile/my_subscription.php';
         ?>
      </div> <!-- my subscription-->

      <div id="My_book" class="tabcontent">
        <h4 class="center">Your bookshelf </h4>

        <div id="bookshelf">
          <?php
            require 'php/config.php';
            $username = $_SESSION['username'];
            $sql_user_subscript = $conn->query("SELECT * FROM subs_history WHERE username = '$username'");
            $count_sub = $sql_user_subscript->rowCount();
            if($count_sub > 0){}
            $top = $conn->query("SELECT * FROM book");
            foreach ($top as $row_top) {
           ?>
          <a href="../book/<?php echo $row_top['path']; ?>#toolbar=0&navpanes=0&scrollbar=0" target="_blank">
            <p><?php echo $row_top['name']; ?></p>
            <img src="../book/img/<?php echo $row_top['img']; ?>" height="200px">
          </a>
          <?php
            }
           ?>
        </div>
      </div> <!-- My_book-->

      <div id="My_draft" class="tabcontent">
        <?php
          include 'my_profile/my_draft.php';
         ?>
      </div> <!-- My_draft -->

      <div id="My_profile" class="tabcontent">
        <?php
          include 'my_profile/my_profile.php';
         ?>
      </div> <!-- My_profile -->


    </div>

    <script>
      function openCity(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
              tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
              tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
      }

      $(document).ready(function(){
        // mobile slide
        $(".button-collapse").sideNav();
        $('.modal').modal();
        //$('#modal1').modal('open');
      });
      </script>
  </div> <!-- row -->
    <br><br><br><br>  <br><br><br><br>  <br><br><br><br>  <br><br><br><br>  <br><br><br><br>
  </body>
</html>
