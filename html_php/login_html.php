<div id="modal1" class="modal">
  <div class="modal-content">
    <h4 class="center-align">Login</h4>
    <form class="" action="php/login.php" method="post">
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <input id="username_login" name="username" type="text" class="validate"
          onkeyup="checkUsername_login(this.value)" required>
          <label>Username</label>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <span id="usernameExist_login"></span>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">lock</i>
          <input name="password" type="password" class="validate" required>
          <label for="password">Password</label>
        </div>
      </div>

  </div>
  <div class="modal-footer">
    <center>
      <button class="waves-effect waves-light btn" id="button_login" class="register">Login<i class="material-icons right">vpn_key</i></button>
      <a href="forgot_password.php" class="waves-effect waves-light btn red">Forgot Password<i class="material-icons right">update</i></a>
    </center>
  </div>
  </form>
</div>

<!-- check username exist or not -->
<script type="text/javascript">
  function checkUsername_login(val){
    var notConfirm = 'Please confirm email'
    var notConfirm_result = notConfirm.fontcolor("blue");
    $.ajax({
      type:"POST",
      url:"php/check/checkUsername.php",
      data: 'username=' + val,
      success: function(data){
        if (data == 3 || data == 23) {
          $("#usernameExist_login").html(notConfirm_result);
          document.getElementById("button_login").disabled = true;
        }
        else {
          $("#usernameExist_login").html(' ');
          document.getElementById("button_login").disabled = false;
        }
      }
    });
  }
</script>
