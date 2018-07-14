<?php
include 'html_php/new_hearder.php';
 ?>
    <title>Upload Video</title>

    <br>
    <div class="row" style="margin-left:100px;margin-right:100px" id="row">
      <script type="text/javascript">
        // get window width and update margin
        $(document).ready(function(){
          var w = window.innerWidth;
          if(w > 600 && w < 992 || w < 600){
            document.getElementById("row").style.marginLeft = "20px";
            document.getElementById("row").style.marginRight = "20px";
          }
        });
        var width = $(window).width();
        $(window).on('resize', function(){
         if($(this).width() != width){
            width = $(this).width();
            //alert(width);
            if(width > 600 && width < 992 || width < 600){
              //alert("resize");
              document.getElementById("row").style.marginLeft = "20px";
              document.getElementById("row").style.marginRight = "20px";
            }
             // console.log(width);
         }
        });
      </script>
      <form class="" action="upload_video_preview.php" method="post" enctype="multipart/form-data">
        <div class="col l4 m12 s12">
          <h4 class="center">Recipe image</h4>
          <div class="file-field input-field">
            <div class="btn">
              <span>Image</span>
              <input type="file" id="my_file" name="image" onchange="previewFile()">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" id="my_file" name="image" required>
            </div>
          </div>

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
          <br><br><br>
          <div class="row">
            <div class="input-field col l6 m12 s12">
              <input id="" type="number" class="validate" name="pre_time" required>
              <label for="">Prepare time (Minutes)</label>
            </div>
            <div class="input-field col l6 m12 s12">
              <input id="" type="number" class="validate" name="cooking_time" required>
              <label for="">Cooking time (Minutes)</label>
            </div>

            <div class="input-field col l12 m12 s12">
              <input id="" type="number" class="validate" name="number_of_serve" required>
              <label for="">Number of serve</label>
            </div>

            <div class="input-field col l12 m12 s12">
              <select name="type">
                 <option disabled selected>Choose your type</option>
                 <option value="Appetizers and Snacks">Appetizers and Snacks</option>
                 <option value="Breakfast and Brunch">Breakfast and Brunch</option>
                 <option value="Desserts">Desserts</option>
                 <option value="Dinners">Dinners</option>
                 <option value="Teaspoon">Drink</option>
                 <option value="Lunch">Lunch</option>
               </select>
            </div>
            <script type="text/javascript">
            $(document).ready(function(){
              $('select').material_select();
            });
            </script>
          </div>
        </div>
        <div class="col l8 m12 s12">
          <h4 class="center">Recipe details</h4>
          <div class="row">
            <div class="input-field col s12">
              <input id="" type="text" class="validate" name="recipe_name" required>
              <label for="">Recipe name</label>
            </div>

            <div class="input-field col s12">
              <textarea id="textarea1" class="materialize-textarea" data-length="300" name="simple_description" required></textarea>
              <label for="textarea1">Simple description</label>
            </div>

            <br class="hide-on-med-and-up">
            <br><br>

            <script type="text/javascript">
            $(document).ready(function() {
              $('textarea1').characterCounter();
            });
              // $('#textarea1').val('New Text');
            </script>

            <h4 class="center">Video</h4>
            <div class="file-field input-field" id="video_file">
               <div class="btn">
                 <span>Video</span>
                 <input type="file" class="file_multi_video" name="video" onchange="checkVideo()" id="video">
               </div>
               <div class="file-path-wrapper">
                 <input class="file-path validate" type="text" id="video">
               </div>
             </div>

            <video width="100%"  height="400px" controls >
              <source src="" id="video_here">
                Your browser does not support HTML5 video.
            </video>

            <script type="text/javascript">
            function checkVideo(){
              var allowedExtension = ['mkv' , 'mp4' , 'ogg' , 'webm' , 'mov' , '3gp' , 'm4v' , 'mpg' , 'jpeg'];
              var fileExtension = document.getElementById('video').value.split('.').pop().toLowerCase();
              var isValidFile = false;
              // alert(fileExtension);
                  for(var index in allowedExtension) {
                      if(fileExtension === allowedExtension[index]) {
                          isValidFile = true;
                          $(document).on("change", ".file_multi_video", function(evt) {
                            var $source = $('#video_here');
                            $source[0].src = URL.createObjectURL(this.files[0]);
                            $source.parent()[0].load();
                          });
                          break;
                      }
                  }// for

                  if(!isValidFile) {
                      alert('Allowed Extensions are : *.' + allowedExtension.join(', *.'));
                      document.getElementById('video').value = "";
                  }
                  return isValidFile;
            }// checkvideo
            </script>
          </div>
        </div>

        <div class="row center">
          <div class="col l12 ">
            <br><br>
            <br><br>
            <hr>
            <button class="waves-effect waves-light btn" type="submit">
              <i class="material-icons right">pageview</i>Preview
            </button>
            <button class="waves-effect waves-light btn red" type="reset" onclick="return confirm_reset();">
              <i class="material-icons right">cloud</i>Reset
            </button>
            <script type="text/javascript">
            // Confirm reset
            function confirm_reset() {
              var r = confirm("Are you sure you want to reset all text?");
                if (r == true) {
                   $('#video_file').hide();
                   return true;
                } else {
                  return false;
                }
                return r;
            }
            </script>
          </div>
        </div>
      </form>
    </div><!--  row margin-->

    <br><br><br><br><br><br><br>
  </body>
</html>
