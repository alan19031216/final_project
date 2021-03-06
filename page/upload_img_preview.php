<?php
  include 'html_php/new_hearder.php';
  //error_reporting(0);
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
  $type = $_POST['type'];

  // recipe detail
  $recipe_name = $_POST['recipe_name'];
  $simple_description = $_POST['simple_description'];

  //ingredients
  $name_ingredients = $_POST['name_ingredients'];
  $num = $_POST['num'];
  $unit = $_POST['unit'];

  //step
  $description = $_POST['description'];

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

      <div class="input-field col l12 m12 s12">
        <input type="hidden" name="type" value="<?php echo $type ?>">
        <select>
          <option disabled>Choose your type</option>
          <?php
            $options = array();
            $options['Appetizers and Snacks'] = 'Appetizers and Snacks';
            $options['Breakfast and Brunch'] = 'Breakfast and Brunch';
            $options['Desserts'] = 'Desserts';
            $options['Dinners'] = 'Dinners';
            $options['Drink'] = 'Drink';
            $options['Lunch'] = 'Lunch';

            foreach ($options as $option) {
          ?>
          <option value="<?php echo $option; ?>" <?php if($option==$type) { echo "selected";} ?> ><?php echo $option;?></option>
          <?php
              }
           ?>
         </select>
      </div>
    </div>
  </div>
  <script type="text/javascript">
  $(document).ready(function(){
    $('select').material_select();
  });
  </script>
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
        $('#textarea1').val("<?php echo $simple_description; ?>");
      </script>

      <br class="hide-on-med-and-up">
      <br><br>

      <script type="text/javascript">
      $(document).ready(function() {
        $('textarea1').characterCounter();
      });
        // $('#textarea1').val('New Text');
      </script>

      <!-- **************************************ingredients************************************************ -->

      <div class="col l12 m12 s12">
        <br>
        <h4 class="center">Ingredients</h4>
        <div id="form_div">
          <table id="employee_table" align=center>
            <?php
            $options_i = array();
            $options_i['KG(Kilogram)'] = 'KG(Kilogram)';
            $options_i['L(Liters)'] = 'L(Liters)';
            $options_i['ML(Milliliters)'] = 'ML(Milliliters)';
            $options_i['Grain'] = 'Grain';
            $options_i['Teaspoon'] = 'Teaspoon';
            $select = "";
            $count_ingredients = 0;
              for($i = 0; $i < count($name_ingredients); $i++){
                if($name_ingredients[$i] != "" && $num[$i] != "" && $unit[$i] != ""){
                  //echo $unit[3];
                  $count_ingredients++;
                  $unit_1 = $unit[$i];
            ?>
                <tr id="row<?php echo $i+1 ?>">
                   <td><input  id="name_ingredients<?php echo $i; ?>" type="text" name="name_ingredients[]" value="<?php echo $name_ingredients[$i]; ?>" placeholder="Enter Iingredients" required></td>
                   <td><input  id="num<?php echo $i; ?>" type="number" name="num[]" value="<?php echo $num[$i]; ?>" placeholder="How many G/KG/ML/L...." required></td>
                   <td><input hidden type="text" name="unit[]" id="unit_hidden<?php echo $i ?>" placeholder="Unit" value="<?php echo $unit[$i]; ?>" required></td>
                   <td id="row<?php echo $i ?>">
                     <select class="browser-default" id="change<?php echo $i ?>" onclick="select_onchange('<?php echo $i ?>');">
                       <option disabled>Choose your type</option>
                     <?php
                       foreach ($options_i as $option_i) {
                     ?>
                     <?php
                        if($option_i == $unit_1){
                    ?>
                      <option value="<?php echo $option_i; ?>" selected ><?php echo $option_i;?></option>
                    <?php
                        }
                        elseif(!in_array($unit_1, $options_i)){
                    ?>
                      <option value="<?php echo $unit_1; ?>" selected ><?php echo $unit_1;?></option>
                    <?php
                        }
                        else{
                      ?>
                      <option value="<?php echo $option_i; ?>" ><?php echo $option_i;?></option>
                     <?php
                          }
                        }
                      ?>
                      <option value="Request">Request</option>
                    </select>
                   </td>

                   <td>
                     <button id="button<?php echo $i+1 ?>" class='btn-floating waves-effect waves-light red' type='button' value='DELETE' name='button' onclick=delete_row('row"+$rowno+"')>
                       <i class='material-icons'>delete_forever</i>
                     </button>
                   </td>
                   <td>
                     <button class="btn-floating waves-effect waves-light tooltipped move up blue" data-position="top" data-tooltip="Move up" type="button" value='move up' name="move up" onclick=get_id(1)>
                       <i class="material-icons">arrow_drop_up</i>
                     </button>
                   </td>
                   <td>
                     <button class="btn-floating waves-effect waves-light tooltipped move down" data-position="bottom" data-tooltip="Move down" type="button" value='move down' name="move down" onclick=get_id(1)>
                       <i class="material-icons">arrow_drop_down</i>
                     </button>
                   </td>
                </tr>
            <?php
                }
              }// for
             ?>
             <script type="text/javascript">
             $(document).ready(function(){
               document.getElementById("button1").style.visibility = "hidden";
              });
             </script>

           </table>
           <input class="btn" type="button" onclick="add_row();" value="ADD ROW" id="add_row1">
         </div>

         <script type="text/javascript">
         // step 2
         function add_row()
         {
          $rowno=$("#employee_table tr").length;
          $rowno=$rowno+1;
          // $("#employee_table tr:last").after("<tr id='row"+$rowno+"'><td><input required type='text' name='name_ingredients[]' placeholder='Enter ingredients'></td><td><input type='number' name='num[]' placeholder='How many G/KG/ML/L....' required></td><td><input type='text' hidden name='unit[]' id='unit_hidden"+$rowno+"' placeholder='Unit' required></td><td><select class='browser-default' id='change"+$rowno+"' onclick=select_onchange('"+$rowno+"')><option disabled selected>Choose your option</option><option value='KG(Kilogram)'>KG(Kilogram)</option><option value='L(Liters)'>L(Liters)</option><option value='ML(Milliliters)'>ML(Milliliters)</option><option value='Grain'>Grain</option><option value='Teaspoon'>Teaspoon</option><option value='Request'>Request</option></select></td><td><button class='btn-floating waves-effect waves-light red' type='button' value='DELETE' name='button' onclick=delete_row('row"+$rowno+"')><i class='material-icons'>delete_forever</i></button></td><td><button class='btn-floating waves-effect waves-light tooltipped move up blue' data-position='top' data-tooltip='Move up' type='button' value='move up' name='button'onclick=get_id('"+$rowno+"')><i class='material-icons'>arrow_drop_up</i></button></td><td><button class='btn-floating waves-effect waves-light tooltipped move down' data-position='bottom' data-tooltip='Move down' type='button' value='move down' name='button' onclick=get_id('"+$rowno+"')><i class='material-icons'>arrow_drop_down</i></button></td></tr>");

          $("#employee_table tr:last").after("<tr id='row"+$rowno+"'><td><input required type='text' name='name_ingredients[]' placeholder='Enter ingredients'></td><td><input type='number' name='num[]' placeholder='How many G/KG/ML/L....' required></td><td><input type='text' hidden name='unit[]' id='unit_hidden"+$rowno+"' placeholder='Unit' required></td><td><select class='browser-default' id='change"+$rowno+"' onclick=select_onchange('"+$rowno+"')> <option disabled selected>Choose your option</option> <?php require 'php/config.php'; $sql_category = $conn->query('SELECT * FROM category'); foreach ($sql_category as $row_category) { ?> <option value='<?php echo $row_category['name']; ?>'><?php echo $row_category['name']; ?></option> <?php }?><option value='Request'>Request</option></select></td><td><button class='btn-floating waves-effect waves-light red' type='button' value='DELETE' name='button' onclick=delete_row('row"+$rowno+"')><i class='material-icons'>delete_forever</i></button></td><td><button class='btn-floating waves-effect waves-light tooltipped move up blue' data-position='top' data-tooltip='Move up' type='button' value='move up' name='button'onclick=get_id('"+$rowno+"')><i class='material-icons'>arrow_drop_up</i></button></td><td><button class='btn-floating waves-effect waves-light tooltipped move down' data-position='bottom' data-tooltip='Move down' type='button' value='move down' name='button' onclick=get_id('"+$rowno+"')><i class='material-icons'>arrow_drop_down</i></button></td></tr>");

           $('select').material_select();
         }
         function delete_row(rowno)
         {
          $('#'+rowno).remove();
         }

         function get_id(rowno)
         {
           $('#employee_table button.move').click(function() {
             var row = $(this).closest('#row'+rowno);
             //alert(row);
             if ($(this).hasClass('up'))
                 row.prev().before(row);
             else
                 row.next().after(row);
           });
         }
         </script>

         <div id="modal1" class="modal modal-fixed-footer">
           <h2 class="center">New request</h2>
           <div class="row">
             <div class="col l12 m12 s12" style="padding:40px;">
               <label>Unit</label>
               <input id="request_unit" name="request_unit" class="validate">
             </div>
             <center><button class="btn" type="button" name="button" onclick="addSelect()">Submit</button></center>
           </div>
         </div>

         <script type="text/javascript">
         //Use the id of the form instead of #change
         var id = "";
         function select_onchange(a){
           $('#change'+a).change(function(){
             id = a;
             //this is just getting the value that is selected
             var title = $(this).val();
             //alert(title);
             if(title == 'Request'){
               $('#modal1').modal('open');
               //document.getElementById("request_unit").value = " ";
             }
             document.getElementById('unit_hidden'+id).value = title;
           });
         }

          function addSelect(){
            var unit = document.getElementById('request_unit').value;
            //alert(a);
            //alert(unit);
            if(unit == '' || unit == ' '){
              alert("Cannot be empty");
            }
            else{
              var x = document.getElementById("change"+id);
              var option = document.createElement("option");
              option.text = unit;
              x.add(option , x[1]);
              document.getElementById("change"+id).value = unit;
              document.getElementById('unit_hidden'+id).value = unit;
              $('#modal1').modal('close');
              // /alert(unit);
            }
          }
         </script>
      </div>

      <div class="col l12 m12 s12">
        <!-- **************************************step************************************************ -->
        <h4 class="center">Description</h4>
        <table id="employee_table_step3" align=center>
        <?php
          for($i = 0; $i < count($description); $i++){
            if($description[$i] != "" )  {
        ?>
        <tr id="row1">
           <td>
             <div class="input-field col s12">
               <textarea id="textarea_step<?php echo $i;?>" class="materialize-textarea" name="description[]" value="<?php echo $description[$i]; ?>" required></textarea>
               <label>Description</label>
             </div>

             <script type="text/javascript">
                //var a_string = escape("");
               $('#textarea_step<?php echo $i;?>').val("<?php echo $description[$i]; ?>");
             </script>

           </td>
           <td>
             <button id="button_step<?php echo $i+1 ?>" class='btn-floating waves-effect waves-light red' type='button' value='DELETE' name='button' onclick=delete_row('row"+$rowno+"')>
               <i class='material-icons'>delete_forever</i>
             </button>
           </td>
           <td>
             <button class="btn-floating waves-effect waves-light tooltipped move up blue" data-position="top" data-tooltip="Move up" type="button" value='move up' name="move up" onclick=get_id_step3(1)>
               <i class="material-icons">arrow_drop_up</i>
             </button>
           </td>
           <td>
             <button class="btn-floating waves-effect waves-light tooltipped move down" data-position="bottom" data-tooltip="Move down" type="button" value='move down' name="move down" onclick=get_id_step3(1)>
               <i class="material-icons">arrow_drop_down</i>
             </button>
           </td>
         </tr>
        <?php
            }
          }// for
         ?>
         <script type="text/javascript">
         $(document).ready(function(){
           $('.modal').modal();
           document.getElementById("button_step1").style.visibility = "hidden";
          });
         </script>

           <br><br>
         </table>

         <input class="btn" type="button" onclick="add_row_step3();" value="ADD ROW" id="add_row2">

         <script type="text/javascript">
         function add_row_step3()
         {
          $rowno=$("#employee_table_step3 tr").length;
          $rowno=$rowno+1;
          $("#employee_table_step3 tr:last").after("<tr id='row"+$rowno+"'><td style='width:70%'><div class='input-field col s12'><textarea  id='textarea1' name='description[]' class='materialize-textarea' required></textarea><label for='textarea1'>Description</label></div></td><td style='width:10%'><button class='btn-floating waves-effect waves-light red' type='button' value='DELETE' onclick=delete_row('row"+$rowno+"')><i class='material-icons'>delete_forever</i></button></td><td><button class='btn-floating waves-effect waves-light tooltipped move up blue' data-position='top' data-tooltip='Move up' type='button' value='move up' onclick=get_id_step3('"+$rowno+"')><i class='material-icons'>arrow_drop_up</i></button></td><td><button class='btn-floating waves-effect waves-light tooltipped move down' data-position='bottom' data-tooltip='Move down' type='button' value='move down' onclick=get_id('"+$rowno+"')><i class='material-icons'>arrow_drop_down</i></button></td></tr>");

          // $("#employee_table_step3 tr:last").after("<tr id='row"+$rowno+"'><td style='width:10px'>"+$rowno +")</td><td><br><div class='file-field input-field'><div class='btn'><span>File</span><input type='file' name='pic[]'></div><div class='file-path-wrapper'><input class='file-path validate' type='text'></div></div></td><td><div class='input-field col s12'><textarea id='textarea1' name='description[]' class='materialize-textarea'></textarea><label for='textarea1'>Textarea</label></div></td><td><input type='button' value='DELETE' onclick=delete_row('row"+$rowno+"')></td></tr>");
          $('#textarea1').trigger('autoresize');
         }
         function delete_row(rowno)
         {
          $('#'+rowno).remove();
         }

         function get_id_step3(rowno)
         {
           $('#employee_table_step3 button.move').click(function() {
             var row = $(this).closest('#row'+rowno);
             if ($(this).hasClass('up'))
                 row.prev().before(row);
             else
                 row.next().after(row);
           });
         }
         </script>

         <h4 class="center">Video</h4>
         <?php
           if($video == "" || $video == " "){
             $video = "not";
           }
           else{
             $video = "yes";
           }
          ?>
          <script type="text/javascript">
          $(document).ready(function(){
            var video = '<?php echo $video; ?>';
            // alert (video);
            if(video == "not"){
              document.getElementById("video_video").style.visibility = "hidden";
              document.getElementById("video_text").style.visibility = "visible";
              // document.getElementById("video_file").style.visibility = "hidden";
              document.getElementById("player").style.visibility = "hidden";
              document.getElementById('video_path').value = " ";
            }
            else{
              document.getElementById("video_video").style.visibility = "hidden";
              document.getElementById("video_text").style.visibility = "hidden";
              //document.getElementById("video_file").style.visibility = "hidden";
              document.getElementById("player").style.visibility = "visible";
            }
          });
          </script>

         <h5 id="video_text" style="visibility:hidden;">Doesn't has provide any video</h5>
         <!-- video -->
         <div class="" id="video_video">
           <div class="file-field input-field" id="video_file">
              <div class="btn">
                <span>Video</span>
                <input type="file" name="video" id="" onchange="videoCheck()">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" id="video_path" value="<?php echo $location_video; ?>" >
              </div>
            </div>
            <input type="hidden" id="video_check" name="video_check" value="">
            <input type="hidden" name="video_hidden" value="<?php echo $video_hidden ?>">
            <script type="text/javascript">
              function videoCheck(){
                document.getElementById('video_check').value = '1';
              }
            </script>

            <!-- <script type="text/javascript">
            $(function () {
              $('#video_file').hide();

              //show it when the checkbox is clicked
              $('input[name="checkbox"]').on('click', function () {
                  if ($(this).prop('checked')) {
                      $('#video_file').fadeIn();
                  } else {
                      $('#video_file').hide();
                  }
              });
            });
            </script> -->
            <script type="text/javascript">
            // $(document).ready(function(){
            //   var fileInput = document.getElementById('file_type').files;
            //   var filePath = fileInput.value;
            //   var files = filePath.files;
            //   alert(fileInput[0].type);
            //   });
              document.getElementById("add_row1").disabled = true;
              document.getElementById("add_row2").disabled = true;
            </script>
         </div>
         <video width="100%" height="240" controls id="player">
           <source src="<?php echo $location_video; ?>" type="video/mp4" >
         </video>
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

        var select = document.getElementsByTagName("select");
          for (var i = 0; i < select.length; i++) {
            select[i].disabled = false;
            select[i].readOnly = true;
        }

        document.getElementById('form_id').action = 'php/new_recipe.php'
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

        var select = document.getElementsByTagName("select");
          for (var i = 0; i < select.length; i++) {
            select[i].disabled = false;
            select[i].readOnly = true;
        }

        document.getElementById('form_id').action = 'php/draft.php'
        return true;
    }
  </script>
  <button class="waves-effect waves-light btn red" type="button" id="edit" onclick="return confirm_edit();">
    <i class="material-icons right">edit</i>Edit
  </button>
  <script type="text/javascript">
  $(document).ready(function() {
    var inputs = document.getElementsByTagName("INPUT");
      for (var i = 0; i < inputs.length; i++) {
          inputs[i].disabled = true;
      }
      var textarea = document.getElementsByTagName("textarea");
        for (var i = 0; i < textarea.length; i++) {
          textarea[i].disabled = true;
      }

      var select = document.getElementsByTagName("select");
        for (var i = 0; i < select.length; i++) {
            select[i].disabled = true;
        }
  });
  // Confirm reset
  var count = 0;
  function confirm_edit() {
    if(count == 0){
      var r = confirm("Are you sure you want edit?");
        if (r == true) {
          var count_ingredients = '<?php echo $count_ingredients; ?>';
          count = 1;
          document.getElementById("submit").disabled = true;
          document.getElementById("draft").disabled = true;
          document.getElementById("edit").classList.remove('red');
          document.getElementById("edit").style.backgroundColor = "lightblue";
          document.getElementById("edit").innerHTML = "<i class='large material-icons right'>done</i>Finsih";
          document.getElementById("my_file").disabled = false;
          document.getElementById("pre_time").disabled = false;
          document.getElementById("player").style.visibility = "hidden";
          document.getElementById("video_video").style.visibility = "visible";

          var inputs = document.getElementsByTagName("input");
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].disabled = false;
            }
          var textarea = document.getElementsByTagName("textarea");
            for (var i = 0; i < textarea.length; i++) {
              textarea[i].disabled = false;
          }

          var select = document.getElementsByTagName("select");
            for (var i = 0; i < select.length; i++) {
                select[i].disabled = false;
            }
        }
        else{

        }
    }
    else{
      count = 0;
      document.getElementById("edit").classList.add('red');
      document.getElementById("edit").style.backgroundColor = "red";
      document.getElementById("edit").innerHTML = "<i class='material-icons right'>edit</i>Edit";
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
    }
  }// function
  </script>
</div>
</div>
</form>
</div>

  </body>
</html>
