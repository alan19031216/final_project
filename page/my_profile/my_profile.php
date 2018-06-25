<div class="row">
  <div class="col l12">
    <div class="card-panel">
      <h3 class="center">User Profile</h3>
       <ul class="collapsible popout">
         <li class="active">
           <div class="collapsible-header active"><i class="material-icons">face</i>User detail</div>
           <div class="collapsible-body">
             <?php
             $username = $_SESSION['username'];
             $stmt = $conn->query("SELECT * FROM user WHERE username = '$username'");
              foreach ($stmt as $row) {
                $username = $row['username'];
                $email = $row['email'];
                $image = $row['img'];
              }
              if($image == "" || $image == " " || $image == "img/"){
                $image = "img/user_icon.png";
              }
              ?>
              <form action="php/user.php" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="input-field col l12">
                  Username
                  <input type="text" class="validate" name="username" value="<?php echo $username; ?>" readonly>
                </div>
                <div class="input-field col l12">
                  Email
                  <input type="text" class="validate" value="<?php echo $email; ?>" readonly>
                </div>
                <br><br>
                <div class="file-field input-field">
                  <div class="btn">
                    <span>Change your profile picture</span>
                    <input type="file" id="my_file" name="image" accept="image/*" onchange="previewFile()">
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                  </div>
                </div>
                <center><button class="waves-effect waves-light btn" type="submit" name="button">Submit</button></center>
              </div>
              </form>
              <center><img class="circle responsive-img" src="php/<?php echo $image; ?>" id="img" height="200" width="20%" alt="Image preview..."><br> (Current image)</center>
              <script type="text/javascript">
              // check image and preview image
              function previewFile() {
                var allowedExtension = ['jpeg', 'jpg', 'png', 'gif'];
                var fileExtension = document.getElementById('my_file').value.split('.').pop().toLowerCase();
                var isValidFile = false;

                    for(var index in allowedExtension) {
                        if(fileExtension === allowedExtension[index]) {
                            isValidFile = true;
                            var preview = document.querySelector('#img');
                            var file    = document.querySelector('input[type=file]').files[0];
                            var reader  = new FileReader();

                            reader.addEventListener("load", function () {
                              preview.src = reader.result;
                            }, false);

                            if (file) {
                              reader.readAsDataURL(file);
                            }
                            break;
                        }
                    }// for

                    if(!isValidFile) {
                        alert('Allowed Extensions are : *.' + allowedExtension.join(', *.'));
                        document.getElementById('my_file').value = "";
                    }
                    return isValidFile;
              }

              $( document ).ready(function() {
                $('.collapsible').collapsible();
              });
              </script>
           </div>
         </li> <!-- user detail -->
          <li  class="">
            <div class="collapsible-header "><i class="material-icons">lock_outline</i>Change password</div>
            <div class="collapsible-body">
              <form action="php/update_password.php" method="post">
              <div class="row">
                 <div class="input-field col l12 m12 s12">
                   Old password
                   <input name="old_password" type="password" class="validate" required>
                 </div>
               </div>

               <div class="row">
                <div class="input-field col l12 m12 s12">
                  New password
                  <input name="new_password" id="new_password" type="password" onChange="checkPasswordMatch();" class="validate" required>
                  <span id="divCheckPasswordMatch_new_passsword"></span>
                </div>
              </div>

              <div class="row">
               <div class="input-field col l12 m12 s12">
                 Confirm password
                 <input type="password" id="password" class="validate" onChange="checkPasswordMatch();" required>
                 <span id="divCheckPasswordMatch"></span>
               </div>
             </div>

             <input name="username" type="hidden" class="validate" value="<?php echo $username ?>" required>

             <center>
               <button class="waves-effect waves-light btn" id="button_update" type="submit" name="button">Update<i class="material-icons right">send</i></button>
             </center>
            </form>

            <script type="text/javascript">
            // Check Passwords match or not -->
            function checkPasswordMatch() {
                var new_password = $("#new_password").val();
                var confirmPassword = $("#password").val();
                var match = 'Passwords match';
                var notMatch = 'Passwords do not match!';
                var empty = 'Password cannot be empty';
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
                  $("#divCheckPasswordMatch_new_passsword").html("New password shuold include: Minimum eight in length and At least one lower case English letter");
                  document.getElementById("button_update").disabled = true;
                }
                else if(regex.test(password) == false && new_password == confirmPassword){
                  //alert(regex.test(new_password));
                  $("#divCheckPasswordMatch_new_passsword").html("New password shuold include: Minimum eight in length and At least one lower case English letter");
                  document.getElementById("button_update").disabled = true;
                }
                else if (new_password == "" || confirmPassword == "") {
                  $("#divCheckPasswordMatch").html(result);
                  document.getElementById("button_update").disabled = true;
                }
                else{
                  $("#divCheckPasswordMatch").html(result);
                  document.getElementById("divCheckPasswordMatch_new_passsword").style.visibility = "hidden";
                  document.getElementById("button_update").disabled = false;
                }
            }
            </script>
            </div>
          </li><!-- password -->
        </ul>
    </div>
  </div>
</div>
