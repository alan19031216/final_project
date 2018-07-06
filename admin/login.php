<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <title>Login</title>
</head>

<body>
  <div class="container">
    <br><br><br><br><br>
    <div class="row">
      <div class="col l3 m2 s12" class="hide-on-small-only"> <br> </div>
      <div class="col l6 m8 s12">
        <div class="card">
          <div class="card-content">
            <span class="card-title center">Admin Login</span>
            <div class="row">
              <div class="row">
                <form id="login_form" action="php/login.php" method="post">
                  <div class="input-field col l12 m12 s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input type="text" class="validate" name="username">
                    <label for="">Username</label>
                  </div>
                  <div class="input-field col l12 m12 s12">
                    <i class="material-icons prefix">vpn_key</i>
                    <input type="password" class="validate" name="password">
                    <label for="">Password</label>
                  </div>
              </div>
            </div>
          </div>
          <div class="card-action">
            <center> <button class="btn" name="button" type="submit">Submit</button> </center>
          </div>
          </form>
        </div>
      </div>
      <div class="col l3 m2 s12" class="hide-on-small-only"> <br> </div>
    </div>
  </div>


  <script>
    var password = prompt("Please enter your admin password:");
    $.post('php/admin_password.php' , {postpassword:password} ,
    function(data){
      if(data == "1"){
        alert("Welcome! Admin");
      }
      else {
        //alert(data);
        alert("Wrong Password! Just for ADMIN!!!");
        location.reload();
      }
    });

  </script>
</body>
</html>
