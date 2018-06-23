<?php
  require 'html_php/header.php';
 ?>
    <title>User Profile</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>
  <body>

    <?php
    require 'html_php/navbar_html.php';
     ?>
     <div class="row hide-on-small-only">

      <div class="col red s3">
        <?php
        require 'php/config.php';

        $username = $_SESSION['username'];
        $stmt = $conn->query("SELECT * FROM user WHERE username = '$username'");

         foreach ($stmt as $row) {
           $image = $row['img'];
         }

         if($image == "" || $image == " " || $image == "img/"){
           $image = "img/user_icon.png";
         }
         ?>

        <center> <img class="circle responsive-img" src="php/<?php echo $image; ?>" alt="" style="width:80%"></center>
        <br><br>
        <div class="w3-bar-block w3-light-grey w3-card">
          <button class="w3-bar-item w3-button tablink w3-center" onclick="openCity(event, 'first')">User profile</button>
          <button class="w3-bar-item w3-button tablink w3-center" onclick="openCity(event, 'second')">Change Password</button>
          <button class="w3-bar-item w3-button tablink w3-center" onclick="openCity(event, 'third')">Tokyo</button>
        </div>
        <br><br><br><br><br><br><br><br><br>
      </div>

      <div class="col green s9">
        <div style="margin-left:150px">
          <div id="first" class="w3-container city w3-animate-opacity" style="display:none">
            <?php
              require 'html_php/user_profile_first_html.php';
             ?>

           </div> <!--first END (change password)-->

          <div id="second" class="w3-container city w3-animate-zoom" style="display:none">
            <?php
              require 'html_php/user_profile_second_html.php';
             ?>
          </div> <!--Second END (change password)-->

          <div id="third" class="w3-container city" style="display:none">
            <h2>Tokyo</h2>
            <p>Tokyo is the capital of Japan.</p>
            <p>It is the center of the Greater Tokyo Area, and the most populous metropolitan area in the world.</p>
          </div>

        </div>
      </div>
    </div> <!--web view-->

    <!------------------------------------------------------------------------------------------------------------>

    <div class="row hide-on-large-only hide-on-med-only show-on-small ">
      <ul id="tabs-swipe-demo" class="tabs">
        <li class="tab col s3"><a class="active" href="#test-swipe-1">User</a></li>
        <li class="tab col s3"><a href="#test-swipe-2">User profile</a></li>
        <li class="tab col s3"><a href="#test-swipe-3">Change Password</a></li>
      </ul>

      <div id="test-swipe-1" class="col s12 blue">
        <center> <img class="circle responsive-img" src="php/<?php echo $image; ?>" alt="" style="width:80%"></center>
        <h2 class="center-align">Username: <?php echo $username; ?></h2>
      </div>
      <div id="test-swipe-2" class="col s12 red">
        <?php
          require 'html_php/user_profile_first_html.php';
         ?>
      </div>
      <div id="test-swipe-3" class="col s12 green">
        <?php
          require 'html_php/user_profile_second_html_mobile.php';
         ?>
      </div>
    </div> <!--mobile view-->
   </body>

    <script type="text/javascript" src="js/home.js"></script>
    <script type="text/javascript" src="js/user_profile.js"></script>
</html>
