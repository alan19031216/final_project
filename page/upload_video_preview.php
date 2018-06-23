<?php
  include 'html_php/new_hearder.php';

  // image
  $target_dir = "php/img/";
  //echo $target_dir;
  $image = $_FILES['image']['name'];
  $cover_image = $target_dir.$_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];
  $location_cover = "$cover_image";
  move_uploaded_file($tmp_name , $location_cover);

  $pre_time = $_POST['pre_time'];
  $cooking_time = $_POST['cooking_time'];
  $number_of_serve = $_POST['number_of_serve'];

  // recipe detail
  $recipe_name = $_POST['recipe_name'];
  $simple_description = $_POST['simple_description'];

  //video
  $target_dir = "php/video/";
  $video = $_FILES['video']['name'];
  $video_hidden = $_FILES['video']['name'];
  // echo $video;
  $name = $target_dir.$_FILES['video']['name'];
  $tmp_name_video = $_FILES['video']['tmp_name'];
  $location_video ="$name";
  move_uploaded_file($tmp_name_video, $location_video);

?>
<title>Preview recipe</title>

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
<form id="form_id" method="post" enctype="multipart/form-data" >
  <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
  <div class="col l4 m12 s12">
    <h4 class="center">Recipe image</h4>
    <div class="file-field input-field">
      <div class="btn">
        <span>Image</span>
        <input type="file" id="my_file" name="image" onchange="previewFile()">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" value="<?php echo $image; ?>" id="my_file" name="image" required>
      </div>
    </div>
    <input type="hidden" id="check_img" name="check_img" value="">
    <input type="hidden" name="image_hidden" value="<?php echo $image; ?>">
    <input type="hidden" name="tmp_name" value="<?php echo $tmp_name; ?>">
    <img src="<?php echo $location_cover; ?>" id="img" height="200" width="100%" alt="Image preview...">
    <!-- <input type="image" src="img/image_preview.png" id="img" height="200" width="100%" alt="Image preview..."> -->
    <script type="text/javascript">
    $("input[type='image']").click(function() {
        //$("input[id='my_file']").click();
    });

    function previewFile() {
      var preview = document.querySelector('#img');
      var file    = document.querySelector('input[type=file]').files[0];
      var reader  = new FileReader();

      reader.addEventListener("load", function () {
        preview.src = reader.result;
      }, false);

      if (file) {
        document.getElementById('check_img').value = '1';
        reader.readAsDataURL(file);
      }
    }
    </script>
    <br><br><br>
    <div class="row">
      <div class="input-field col l6 m12 s12">
        <input id="pre_time" type="number" class="validate" name="pre_time" value="<?php echo $pre_time; ?>" required>
        <label for="">Prepare time (Minutes)</label>
      </div>
      <div class="input-field col l6 m12 s12">
        <input id="cooking_time" type="number" class="validate" name="cooking_time" value="<?php echo $cooking_time; ?>" required>
        <label for="">Cooking time (Minutes)</label>
      </div>

      <div class="input-field col l12 m12 s12">
        <input id="number_of_serve" type="number" class="validate" name="number_of_serve" value="<?php echo $number_of_serve; ?>" required>
        <label for="">Number of serve</label>
      </div>
    </div>
  </div>
  <div class="col l8 m12 s12 ">
    <h4 class="center">Recipe details</h4>
    <div class="row">
      <div class="input-field col s12">
        <input  id="recipe_name" type="text" class="validate" name="recipe_name" value="<?php echo $recipe_name; ?>" required>
        <label for="">Recipe name</label>
      </div>

      <div class="input-field col s12">
        <textarea  id="textarea1" class="materialize-textarea" data-length="300" name="simple_description" required></textarea>
        <label for="textarea1">Simple description</label>
      </div>
      <script type="text/javascript">
        $('#textarea1').val('<?php echo $simple_description; ?>');
      </script>

      <br class="hide-on-med-and-up">
      <br><br>

      <script type="text/javascript">
      $(document).ready(function() {
        $('textarea1').characterCounter();
      });
        // $('#textarea1').val('New Text');
      </script>

      <div class="col l12 m12 s12">
        <h4 class="center">Video</h4>
        <div class="file-field input-field" id="video_file">
           <div class="btn">
             <span>Video</span>
             <input type="file" class="file_multi_video" name="video" onchange="checkVideo()" id="video">
           </div>
           <div class="file-path-wrapper">
             <input class="file-path validate" type="text" id="video" value="<?php echo $location_video; ?>">
           </div>
         </div>
         <input type="hidden" id="video_check" name="video_check" value="">
         <input type="hidden" name="video_hidden" value="<?php echo $video_hidden ?>">

        <video width="100%"  height="400px" controls >
          <source src="<?php echo $location_video; ?>" id="video_here">
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
                      document.getElementById('video_check').value = '1';
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
  </div>

</div>

<div class="row center">
<div class="col l12 m12 s12">
  <br><br>
  <br><br>
  <hr>
  <button class="waves-effect waves-light btn" type="submit" id="submit" onclick="submit1()">
    <i class="material-icons right">send</i>Upload to public
  </button>
  <button class="waves-effect waves-light btn indigo" type="submit" id="draft" onclick="submit2()">
    <i class="material-icons right">dashboard</i>Save to draft
  </button>
  <script type="text/javascript">
    function submit1(){
      var inputs = document.getElementsByTagName("INPUT");
        for (var i = 0; i < inputs.length; i++) {
          inputs[i].disabled = false;
          inputs[i].readOnly = true;
        }
        var textarea = document.getElementsByTagName("textarea");
          for (var i = 0; i < textarea.length; i++) {
            textarea[i].disabled = false;
            textarea[i].readOnly = true;
        }

        document.getElementById('form_id').action = 'php/new_recipe_video.php'
        return true;
    }
  </script>

  <script type="text/javascript">
    function submit2(){
      var inputs = document.getElementsByTagName("INPUT");
        for (var i = 0; i < inputs.length; i++) {
          inputs[i].disabled = false;
          inputs[i].readOnly = true;
        }
        var textarea = document.getElementsByTagName("textarea");
          for (var i = 0; i < textarea.length; i++) {
            textarea[i].disabled = false;
            textarea[i].readOnly = true;
        }

        document.getElementById('form_id').action = 'php/draft_video.php'
        return true;
    }
  </script>
  <button class="waves-effect waves-light btn red" type="button" id="edit" onclick="return confirm_edit();">
    <i class="material-icons right">edit</i>Edit
  </button>
  <script type="text/javascript">
  // Confirm reset
  var count = 0;
  function confirm_edit() {
    if(count == 0){
      var r = confirm("Are you sure you want edit?");
        if (r == true) {
          document.getElementById("submit").disabled = true;
          document.getElementById("draft").disabled = true;
          var inputs = document.getElementsByTagName("input");
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].disabled = false;
            }
          var textarea = document.getElementsByTagName("textarea");
            for (var i = 0; i < textarea.length; i++) {
              textarea[i].disabled = false;
          }
          count = 1;

        }
        else{

        }
    }
    else{
      document.getElementById("submit").disabled = false;
      document.getElementById("draft").disabled = false;
      var inputs = document.getElementsByTagName("INPUT");
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].disabled = true;
        }
      var textarea = document.getElementsByTagName("textarea");
        for (var i = 0; i < textarea.length; i++) {
          textarea[i].disabled = true;
      }
      count = 0;

    }
  }// function
  </script>

  <script type="text/javascript">
  $(document).ready(function() {
    //alert("Check");
    var inputs = document.getElementsByTagName("input");
      for (var i = 0; i < inputs.length; i++) {
          inputs[i].disabled = true;
      }
      var textarea = document.getElementsByTagName("textarea");
        for (var i = 0; i < textarea.length; i++) {
          textarea[i].disabled = true;
      }
  });
  </script>
</div>
</div>
</form>
</div>

  </body>
</html>
