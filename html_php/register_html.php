<div id="modal2" class="modal">
  <div class="modal-content">
    <h4 class="center-align">Register</h4>
    <form class="" action="php/register.php" method="post">
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <input id="username" name="username" type="text" class="validate"
          onkeyup="checkUsername(this.value)" required>
          <label>Username</label>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <span id="usernameExist"></span>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">email</i>
          <input id="email" name="email" type="email" class="validate"
          onkeyup="checkEmail(this.value)" required>
          <label for="password">Email</label>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <span id="emailExist"></span>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">lock</i>
          <input id="password" name="password" type="password"
          onChange="checkPasswordMatch();" class="validate" required>
          <label for="password">Password</label>
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

      <!--google recaptcha-->
      <div class="g-recaptcha" align="center" data-callback="enableBtn"
      data-sitekey="6Lc6lTcUAAAAAOyoAMiYzXlH_PVZbNXR0il8OvzN"></div><br>

  <div class="modal-footer">
    <center><button class="waves-effect waves-light btn red" id="button_register" class="register">Register</button></center>
  </div>
</div> <!--modal END (register[modal2])-->
</form>

<!-- check username exist or not -->
<script type="text/javascript">
  function checkUsername(val){
    var exists = 'User already exists'
    var exists_result = exists.fontcolor("red");

    var notExists = 'Username available'
    var notExists_result = notExists.fontcolor("green");

    var notConfirm = 'Please confirm email'
    var notConfirm_result = notConfirm.fontcolor("blue");
    $.ajax({
      type:"POST",
      url:"php/check/checkUsername.php",
      data: 'username=' + val,
      success: function(data){
        if(data == 1){
            $("#usernameExist").html(exists_result);
            //alert(val);
            document.getElementById("button_register").disabled = true;
        }
        else if (data == 3 || data == 23) {
          $("#usernameExist").html(notConfirm_result);
          document.getElementById("button_register").disabled = true;
        }
        else {
          $("#usernameExist").html(notExists_result);
          //alert(val);
          document.getElementById("button_register").disabled = false;
        }
      }
    });
  }
</script>

<!-- check email exist or not -->
<script type="text/javascript">
  function checkEmail(val){
    var exists = 'Email has been used'
    var exists_result = exists.fontcolor("red");

    var notExists = 'Email available'
    var notExists_result = notExists.fontcolor("green");

    var notConfirm = 'Please confirm email'
    var notConfirm_result = notConfirm.fontcolor("blue");
    $.ajax({
      type:"POST",
      url:"php/check/checkEmail.php",
      data: 'email=' + val,
      success: function(data){
        if(data == 1){
            $("#emailExist").html(exists_result);
            document.getElementById("button_register").disabled = true;
        }
        else if (data == 3 || data == 13) {
          $("#emailExist").html(notConfirm_result);
          document.getElementById("button_register").disabled = true;
        }
        else {
          $("#emailExist").html(notExists_result);
          document.getElementById("button_register").disabled = false;
        }
      }
    });
  }
</script>

<!-- Check Passwords match or not -->
<script type="text/javascript">
function checkPasswordMatch() {
    var password = $("#password").val();
    var confirmPassword = $("#comfirm_password").val();
    var match = 'Passwords match';
    var notMatch = 'Passwords do not match!';
    var empty = 'Password cannot be empty';
    var result;

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
        document.getElementById("button_register").disabled = true;
    }
    else if (password == "" || confirmPassword == "") {
      $("#divCheckPasswordMatch").html(result);
        document.getElementById("button_register").disabled = true;
    }
    else{
      $("#divCheckPasswordMatch").html(result);
      document.getElementById("button_register").disabled = false;
    }
}
</script>

<!--google recaptcha javascript-->
<script type="text/javascript">
  document.getElementById("button_register").disabled = true;

  function enableBtn(){
     document.getElementById("button_register").disabled = false;
    }
</script>
