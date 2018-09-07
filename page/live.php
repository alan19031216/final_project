<?php
  include 'html_php/new_hearder.php';
?>
<br>
<div class="container">
  <div class="right">
    <a href="#modal1" class="waves-effect waves-light btn modal-trigger"><i class="material-icons right">live_tv</i>Open Live stream</a>
  </div>

  <!-- modal -->
  <div id="modal1" class="modal modal-fixed-footer center">
    <h2 class="center">Insert detail</h2>
    <hr>
    <form action="php/live.php" method="post" enctype="multipart/form-data">
      <div class="row" style="padding:10px">
        <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
        <div class="input-field col s6">
          <input id="room_name" type="text" name="room_name" class="validate" required>
          <label for="first_name">Room name</label>
        </div>
        <div class="input-field col s6">
          <select class="icons" name="nature" required>
            <option value="" disabled selected>Choose your option</option>
            <option value="Chinese food" data-icon="img\food\Chinese food.jpg">Chinese food</option>
            <option value="Western food" data-icon="img\food\Western food.jpg">Western food</option>
            <option value="Other" data-icon="img\food\other.png">Other</option>
          </select>
          <label>Nature</label>
        </div>

        <div class="input-field col l6">
          <div class="file-field input-field">
            <div class="btn">
              <span>Image</span>
              <input type="file" id="my_file" name="image" onchange="previewFile()">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" id="my_file" name="image" required>
            </div>
          </div>
        </div>

        <div class="input-field col l6">
          <img src="img/image_preview.png" id="img" height="200" width="100%" alt="Image preview...">
          <!-- <input type="image" src="img/image_preview.png" id="img" height="200" width="100%" alt="Image preview..."> -->
          <script type="text/javascript">
          $("input[type='image']").click(function() {
              //$("input[id='my_file']").click();
          });

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
          </script>
        </div>
        <br><br>
        <button type="submit" class="btn" name="button">Submit</button>
      </div>
    </form>
  </div>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.modal').modal();
      $('select').material_select();
    });
  </script>
  <!-- modal -->
  <br><br>
  <div class="row">
    <div class="l12">

    </div>
  </div>
</div>
<script type="text/javascript">
  // window.onbeforeunload = function(e) {
  //   return '';
  // };
</script>
