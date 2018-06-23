<div class="row hide-on-small-only">
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
            <input name="new_password" id="new_password" type="password" onChange="checkPasswordMatch();" class="validate" required>
            <label>New password</label>
          </div>
        </div>

        <div class="row">
         <div class="input-field col s12">
           <input type="password" id="password" class="validate" onChange="checkPasswordMatch();" required>
           <label>Confirm password</label>
           <span id="divCheckPasswordMatch"></span>
         </div>
       </div>

       <input name="username" type="hidden" class="validate" value="<?php echo $username ?>" required>

       <center>
         <button class="waves-effect waves-light btn" id="button_update" type="submit" name="button">Update<i class="material-icons right">send</i></button>
       </center>
      </form>
      </div>
    </div>
  </div>
</div> <!--card END-->

<!------------------------------------------------------------------------------------------------------------>
