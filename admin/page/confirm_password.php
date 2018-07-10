<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--rating-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
  </head>
  <body>

    <nav>
      <div class="navbar-fixed orange">
      <!--  <a href="#!" class="brand-logo">Logo</a> -->
      <a href="" class="brand-logo">Let's Cook</a>
      <!--<a href="index.php"><img class="responsive-img brand-logo hide-on-small-only" src="img/logo.jpg" alt="" width="13%"></a>-->
      <a href="" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
        </ul>
      </div>
    </nav>

    <div class="container">
      <div class="col l12 m12 s12">
        <div class="card">
          <div class="card-content">
            <form class="" action="php/confirm_password.php" method="post">
              <span class="card-title center">Confirm password</span>
              <?php
                $code = $_GET['code'];
               ?>
               <input type="hidden" name="code" value="<?php echo $code; ?>">
              <div class="row">
              <div class="input-field col l12 m12 s12">
                <input name="new_password" id="new_password" type="password" onChange="checkPasswordMatch();" class="validate" required>
                <label>Password</label>
              </div>
              <div class="input-field col l12 m12 s12">
                <input type="password" id="confirmPassword" class="validate" onChange="checkPasswordMatch();" required>
                <label>Confirm password</label>
                <span id="divCheckPasswordMatch_new_passsword" style="color:blue;"></span>
               <span id="divCheckPasswordMatch"></span>
              </div>
          </div>
          <div class="card-action center">
            <button class="waves-effect waves-light btn" id="button_update" disabled type="submit" name="button">Update<i class="material-icons right">send</i></button>
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>

    <script type="text/javascript">
    // Check Passwords match or not -->
    function checkPasswordMatch() {
        var new_password = $("#new_password").val();
        var confirmPassword = $("#confirmPassword").val();
        var match = 'Passwords match';
        var notMatch = 'Passwords do not match!';
        var empty = 'Password cannot be empty';
        var same = 'Password cannot same as old password';
        var result;
        var regex = /^(?=.*?[a-z])(?=.*?[0-9]).{8,}$/;

        if (new_password != confirmPassword){
          result = notMatch.fontcolor("red");
        }
        else if (new_password == "" || confirmPassword == "") {
          result = empty.fontcolor("blue");
        }
        else {
          result = match.fontcolor("#64dd17");
        }

        if (new_password != confirmPassword){
          $("#divCheckPasswordMatch").html(result);
            document.getElementById("button_update").disabled = true;
        }
        else if(regex.test(new_password) == false){
          //alert(regex.test(new_password));
          $("#divCheckPasswordMatch").hide();
          $("#divCheckPasswordMatch_new_passsword").html("New password shuold include: Minimum eight in length and At least one lower case English letter");
          document.getElementById("button_update").disabled = true;
        }
        else if(regex.test(new_password) == false && new_password != confirmPassword){
          //alert(regex.test(new_password));
          $("#divCheckPasswordMatch").hide();
          $("#divCheckPasswordMatch_new_passsword").html("New password shuold include: Minimum eight in length and At least one lower case English letter");
          document.getElementById("button_update").disabled = true;
        }
        else if (new_password == "" || confirmPassword == "") {
          $("#divCheckPasswordMatch").html(result);
          document.getElementById("button_update").disabled = true;
        }
        else{
          $("#divCheckPasswordMatch").html(result);
          $("#divCheckPasswordMatch_new_passsword").hide();
          document.getElementById("divCheckPasswordMatch_new_passsword").style.visibility = "hidden";
          document.getElementById("button_update").disabled = false;
        }
    }
    </script>

  </body>
</html>
