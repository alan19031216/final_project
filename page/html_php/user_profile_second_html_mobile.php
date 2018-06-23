<div class="row hide-on-large-only hide-on-med-only show-on-small">
  <div class="col s12">
    <div class="card blue-grey darken-1">
      <div class="card-content white-text">
        <span class="card-title center-align">Change Password</span>
        <form action="php/update_password.php" method="post">
        <div class="row">
           <div class="input-field col s12">
             <input name="old_password" type="password" class="validate" required>
             <label>Old password</label>
           </div>
         </div>

         <div class="row">
          <div class="input-field col s12">
            <input name="new_password" id="new_password_mobile" type="password" onChange="checkPasswordMatch_mobile();" class="validate" required>
            <label>New password</label>
          </div>
        </div>

        <div class="row">
         <div class="input-field col s12">
           <input type="password" id="password_mobile" class="validate" onChange="checkPasswordMatch_mobile();" required>
           <label>Confirm password</label>
           <span id="divCheckPasswordMatch_mobile"></span>
         </div>
       </div>

       <input name="username" type="hidden" class="validate" value="<?php echo $username ?>" required>

       <center>
         <button class="waves-effect waves-light btn" id="button_update_mobile" type="submit" name="button">Update<i class="material-icons right">send</i></button>
       </center>
      </form>
      </div>
    </div>
  </div>
</div> <!--card END-->
