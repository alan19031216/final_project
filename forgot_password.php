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
              <h3 class="center">Forgot Password?</h3>
              <p class="center">You can reset your password here.</p>
                <div class="row">
                  <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input id="email_id" type="email" class="validate" required>
                    <label for="icon_telephone">Your email</label>
                  </div>
                </div>
            </div>
            <div class="card-action">
              <center>
                <button class="waves-effect waves-light btn" onclick="forgot()">Send<i class="material-icons right" >send</i></button>
              </center>
            </div>
          </div>
        </div>
        <div class="col l3 m3"></div>
      </div>
    </div>

    <script type="text/javascript">
      var num = 0;
      function forgot(){
        var email = document.getElementById('email_id').value;
        //alert(email);
        if(email == '' || email == ' '){
          alert("Please insert your email.");
        }
        else if (num > 0 ) {
          alert("please wait a whole.");
        }
        else{
          num++;
          $.ajax({
              url: "php/forgot_password.php",
              data:'email='+email,
              type: "POST",
            success: function(a){
              if(a == 'success'){
                alert(a);
                num = 0;
              }
              else{
                alert(a);
                num = 0;
              }
            },
            error: function(a){
              alert(a);
              num = 0;
            }
          }); // first
        }
      }
    </script>

    <script type="text/javascript">
        // side nav (mobile)
        $(".button-collapse").sideNav();
    </script>
  </body>
</html>
