<?php
$username = $_GET['username'];
$code = $_GET['code'];
//echo $code;
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Forgot Password</title>
     <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
     <link type="text/css" rel="stylesheet" href="css/style.css"  media="screen,projection"/>
     <link type="text/css" rel="stylesheet" href="css/style_button.css"  media="screen,projection"/>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="https://js.leapmotion.com/leap-0.6.4.js"></script>
     <!--rating-->
     <script src="page/js/rate.js"></script>
     <script type="text/javascript" src="page/extras/modernizr.2.5.3.min.js"></script>
     <script type="text/javascript" src="js/materialize.min.js"></script>

     <script type="text/javascript" src="script.js"></script>

   </head>
   <body>

     <nav>
       <div class="navbar-fixed orange">
       <!--  <a href="#!" class="brand-logo">Logo</a> -->
       <a href="index.php" class="brand-logo">Let's Cook</a>
       <!--<a href="index.php"><img class="responsive-img brand-logo hide-on-small-only" src="img/logo.jpg" alt="" width="13%"></a>-->
       <a href="index.php" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
         <ul class="right hide-on-med-and-down">
           <li><a href="sell.php">Sell Recipe</a></li>
           <li><a href="login_register.php">Login/Register</a></li>
         </ul>
       </div>
     </nav>

     <!--Moblie slide bar-->
     <ul class="side-nav" id="mobile-demo">
       <center> <li><a style="pointer-events: none;cursor: default;"><b style="color:red;font-size:30px">Lest's Cook</b></a></li> </center>
       <li><a href="sell.php">Sell Recipe</a></li>
       <li><a href="login_register.php">Login/Register</a></li>
     </ul>

     <div class="container">
       <br>
       <div class="row">
         <div class="col l3 m3"></div>
         <div class="col l6 m6">
           <div class="card">
             <div class="card-image">
               <center><i class="material-icons" style="font-size:150px">lock</i></center>
               <!--<span class="card-title">Card Title</span>-->
             </div>
             <div class="card-content">
               <h3 class="center">Change your password</h3>
               <p class="center">You can reset your password now.</p>
               <input type="hidden" id="username" value="<?php echo $_GET['username'] ?>">
               <input type="hidden" id="code" value="<?php echo $_GET['code'] ?>">

               <div class="row">
                 <div class="input-field col s12">
                   <i class="material-icons prefix">lock</i>
                   <input id="password" name="password" type="password"
                   onChange="checkPasswordMatch();" class="validate" required>
                   <label for="password">Password</label>
                   <span id="divCheckPasswordMatch_new_passsword" class="blue"></span>
                 </div>
               </div>
               <div class="row">
                 <div class="input-field col s12">
                   <i class="material-icons prefix">lock_outline</i>
                   <input id="comfirm_password" name="comfirm_password" type="password"
                   onChange="checkPasswordMatch();" class="validate" required>
                   <label for="password">Comfirm Password</label>
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <span id="divCheckPasswordMatch"></span>
                 </div>
               </div>
             </div>
             <div class="card-action">
               <center>
                 <button id="update_password" class="waves-effect waves-light btn" onclick="update()" disabled>Update Password<i class="material-icons right" >send</i></button>
               </center>
             </div>
           </div>
         </div>
         <div class="col l3 m3"></div>
       </div>
     </div>

     <!-- Check Passwords match or not -->
     <script type="text/javascript">
     function checkPasswordMatch() {
         var password = $("#password").val();
         var confirmPassword = $("#comfirm_password").val();
         var match = 'Passwords match';
         var notMatch = 'Passwords do not match!';
         var empty = 'Password cannot be empty';
         var result;
         var regex = /^(?=.*?[a-z])(?=.*?[0-9]).{8,}$/;

         if (password != confirmPassword){
           result = notMatch.fontcolor("red");
         }
         else if (password == "" || confirmPassword == "") {
           result = empty.fontcolor("blue");
         }
         else {
           result = match.fontcolor("green");
         }

         if (password != confirmPassword){
           $("#divCheckPasswordMatch").html(result);
             document.getElementById("update_password").disabled = true;
         }
         else if (password == "" || confirmPassword == "") {
           $("#divCheckPasswordMatch").html(result);
             document.getElementById("update_password").disabled = true;
         }
         else if(regex.test(password) == false){
           //alert(regex.test(new_password));
           $("#divCheckPasswordMatch").hide();
           $("#divCheckPasswordMatch_new_passsword").html("New password shuold include: Minimum eight in length and At least one lower case English letter");
           document.getElementById("update_password").disabled = true;
         }
         else if(regex.test(password) == false && password == confirmPassword){
           //alert(regex.test(new_password));
           $("#divCheckPasswordMatch").hide();
           $("#divCheckPasswordMatch_new_passsword").html("New password shuold include: Minimum eight in length and At least one lower case English letter");
           document.getElementById("update_password").disabled = true;
         }
         else if (password == "" || confirmPassword == "") {
           $("#divCheckPasswordMatch").html(result);
           document.getElementById("update_password").disabled = true;
         }
         else{
           $("#divCheckPasswordMatch").html(result);
           document.getElementById("divCheckPasswordMatch_new_passsword").style.visibility = "hidden";
           document.getElementById("update_password").disabled = false;
         }
     }
     </script>

     <script type="text/javascript">
     var num = 0;
      function update(){
        var password = document.getElementById('password').value;
        var username = document.getElementById('username').value;
        var code = document.getElementById('code').value;
        if(num == 0){
          num++;
          $.ajax({
              url: "php/change_password.php",
              data:'password='+password +
                   '&username='+username +
                   '&code='+code,
              type: "POST",
            success: function(a){
              if(a == 'Success'){
                alert(a);
                num = 0;
                window.location.href = 'http://localhost/final%20project/final/new_index.php';
              }
              else{
                //alert(a);
                num = 0;
              }
            },
            error: function(a){
              alert(a);
              num = 0;
            }
          }); // first
        }
        else {
          alert("Please wait a while");
        }

        //alert(password);
      }
     </script>

   <script type="text/javascript">
       // side nav (mobile)
       $(".button-collapse").sideNav();
   </script>
 </body>
</html>
