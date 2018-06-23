<div class="row hide-on-small-only">
   <div class="col s8">
     <div class="card blue-grey darken-1">
       <div class="card-content white-text">
         <span class="card-title center-align">User Profile</span>
         <?php
         $username = $_SESSION['username'];
         $stmt = $conn->query("SELECT * FROM user WHERE username = '$username'");

          foreach ($stmt as $row) {
            $username = $row['username'];
            $email = $row['email'];
          }
          ?>
          <form action="php/user.php" method="post" enctype="multipart/form-data">
            <div class="row">
               <div class="input-field col s12">
                 <input readonly name="" type="text" class="validate" value="<?php echo $username ?>" required>
                 <label>Username</label>
               </div>
             </div>
            <input type="hidden" name="username" value="<?php echo $username ?>">
             <div class="row">
                <div class="input-field col s12">
                  <input disabled name="Email" type="email" class="validate" value="<?php echo $email ?>" required>
                  <label>Email</label>
                </div>
              </div>

              <div class="file-field input-field">
                <div class="btn">
                  <span>Image</span>
                  <input type="file" name="image" accept="image/*" onchange="preview_image(event)">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
                </div>
              </div>

              <center>
                <button class="waves-effect waves-light btn red" type="submit" name="button">Update<i class="material-icons right">send</i></button>
              </center>
          </form>
       </div>
     </div>
   </div>
   <div class="col s4">
     <center><img class="circle responsive-img" id="output_image" alt="" style="width:70%"></center>
   </div>
 </div>

<!------------------------------------------------------------------------------------------------------->

<div class="row hide-on-large-only hide-on-med-only show-on-small">
   <div class="col s12">
     <div class="card blue-grey darken-1">
       <div class="card-content white-text">
         <span class="card-title center-align">User Profile</span>
         <?php
         $username = $_SESSION['username'];
         $stmt = $conn->query("SELECT * FROM user WHERE username = '$username'");

          foreach ($stmt as $row) {
            $username = $row['username'];
            $email = $row['email'];
          }
          ?>
          <form class="" action="php/user.php" method="post" enctype="multipart/form-data">
            <div class="row">
               <div class="input-field col s12">
                 <input disabled name="" type="text" class="validate" value="<?php echo $username ?>" required>
                 <label>Username</label>
               </div>
             </div>
            <input type="hidden" name="username" value="<?php echo $username ?>">
             <div class="row">
                <div class="input-field col s12">
                  <input disabled name="Email" type="email" class="validate" value="<?php echo $email ?>" required>
                  <label>Email</label>
                </div>
              </div>

              <div class="file-field input-field">
                <div class="btn">
                  <span>Image</span>
                  <input type="file" name="image">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" required>
                </div>
              </div>

              <center>
                <button class="waves-effect waves-light btn red" type="submit" name="button">Update<i class="material-icons right">send</i></button>
              </center>
          </form>
       </div>
     </div>
   </div>
 </div>
