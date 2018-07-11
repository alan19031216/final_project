<?php
include 'html_php/new_hearder.php';
 ?>
    <title>Upload recipe</title>

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
    <form action="upload_img_preview.php" method="post" enctype="multipart/form-data">
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
        </div>
      </div>
      <div class="col l8 m12 s12 ">
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

          <!-- **************************************ingredients************************************************ -->
          <div class="col l12 m12 s12">
            <br>
            <h4 class="center">Ingredients</h4>
            <div id="form_div">
               <table id="employee_table" align=center>
                <tr id="row1">
                   <td><input type="text" name="name_ingredients[]" placeholder="Enter Iingredients" required></td>
                   <td><input type="number" name="num[]" placeholder="How many G/KG/ML/L...." required></td>
                   <!-- <td><input type="text" name="unit[]" id="autocomplete-input" class="autocomplete" placeholder="Unit" required></td> -->
                   <td>
                     <select name="unit[]">
                        <option disabled selected>Choose your option</option>
                        <option value="KG(Kilogram)">KG(Kilogram)</option>
                        <option value="L(Liters)">L(Liters)</option>
                        <option value="ML(Milliliters)">ML(Milliliters)</option>
                        <option value="Grain">Grain</option>
                        <option value="Teaspoon">Teaspoon</option>
                      </select>
                   </td>
                   <td></td>
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
                   <!-- <td><input class="btn-floating" type="button"  class="move up" onclick=get_id(1)></td> -->
                   <!-- <td><input class="btn-floating" type="button" value='move down' class='move down' onclick=get_id(1)></td> -->
                </tr>

               </table>
               <input class="btn" type="button" onclick="add_row();" value="ADD ROW">
             </div>
             <script type="text/javascript">
             // step 2
             function add_row()
             {
              $rowno=$("#employee_table tr").length;
              $rowno=$rowno+1;
              //$("#employee_table tr:last").after("<tr id='row"+$rowno+"'><td><input required type='text' name='name_ingredients[]' placeholder='Enter ingredients'></td><td><input type='number' name='num[]' placeholder='How many G/KG/ML/L....' required></td><td><input type='text' name='unit[]' class='autocomplete' placeholder='Unit' required></td><td><input type='button' value='DELETE' onclick=delete_row('row"+$rowno+"')></td><td><input type='button' value='move up' class='move up' onclick=move_up('row"+$rowno+"')></td><td><input type='button' value='move down' class='move down' onclick=move_down('row"+$rowno+"')></td></tr>");

              // $("#employee_table tr:last").after("<tr id='row"+$rowno+"'><td><input required type='text' name='name_ingredients[]' placeholder='Enter ingredients'></td><td><input type='number' name='num[]' placeholder='How many G/KG/ML/L....' required></td><td><input type='text' name='unit[]' class='autocomplete' placeholder='Unit' required></td><td><input type='button' value='DELETE' onclick=delete_row('row"+$rowno+"')></td><td><input type='button' value='move up' class='move up' onclick=get_id('"+$rowno+"')></td><td><input class='btn' type='button' value='move down' class='move down' onclick=get_id('"+$rowno+"')></td></tr>");
              // $("#employee_table tr:last").after("<tr id='row"+$rowno+"'><td><input required type='text' name='name_ingredients[]' placeholder='Enter ingredients'></td><td><input type='number' name='num[]' placeholder='How many G/KG/ML/L....' required></td><td><input type='text' name='unit[]' class='autocomplete' placeholder='Unit' required></td><td><button class='btn-floating waves-effect waves-light red' type='button' value='DELETE' name='button' onclick=delete_row('row"+$rowno+"')><i class='material-icons'>delete_forever</i></button></td><td><button class='btn-floating waves-effect waves-light tooltipped move up blue' data-position='top' data-tooltip='Move up' type='button' value='move up' name='button'onclick=get_id('"+$rowno+"')><i class='material-icons'>arrow_drop_up</i></button></td><td><button class='btn-floating waves-effect waves-light tooltipped move down' data-position='bottom' data-tooltip='Move down' type='button' value='move down' name='button' onclick=get_id('"+$rowno+"')><i class='material-icons'>arrow_drop_down</i></button></td></tr>");

              $("#employee_table tr:last").after("<tr id='row"+$rowno+"'><td><input required type='text' name='name_ingredients[]' placeholder='Enter ingredients'></td><td><input type='number' name='num[]' placeholder='How many G/KG/ML/L....' required></td><td><select name='unit[]''><option disabled selected>Choose your option</option><option value='KG(Kilogram)'>KG(Kilogram)</option><option value='L(Liters)'>L(Liters)</option><option value='ML(Milliliters)'>ML(Milliliters)</option><option value='Grain'>Grain</option><option value='Teaspoon'>Teaspoon</option></select></td><td><button class='btn-floating waves-effect waves-light red' type='button' value='DELETE' name='button' onclick=delete_row('row"+$rowno+"')><i class='material-icons'>delete_forever</i></button></td><td><button class='btn-floating waves-effect waves-light tooltipped move up blue' data-position='top' data-tooltip='Move up' type='button' value='move up' name='button'onclick=get_id('"+$rowno+"')><i class='material-icons'>arrow_drop_up</i></button></td><td><button class='btn-floating waves-effect waves-light tooltipped move down' data-position='bottom' data-tooltip='Move down' type='button' value='move down' name='button' onclick=get_id('"+$rowno+"')><i class='material-icons'>arrow_drop_down</i></button></td></tr>");

               $('input.autocomplete').autocomplete({
                 data: {
                   "KG(Kilogram)": null,
                   "G(Gram)": null,
                   "L(Liters)": null,
                   "ML(Milliliters)": null,
                   "Grain": null,
                   "Teaspoon": null
                 },
                 limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
                 onAutocomplete: function(val) {
                   // Callback function when value is autcompleted.
                 },
                 minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
               });
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
             $(document).ready(function(){
               $('select').material_select();
             // $('input.autocomplete').autocomplete({
             //   data: {
             //     "KG(Kilogram)": null,
             //     "G(Gram)": null,
             //     "L(Liters)": null,
             //     "ML(Milliliters)": null,
             //     "Grain": null,
             //     "Teaspoon": null
             //   },
             //   limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
             //   onAutocomplete: function(val) {
             //     // Callback function when value is autcompleted.
             //   },
             //   minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
             // });
             });
             </script>
          </div>

          <div class="col l12 m12 s12">
            <!-- **************************************step************************************************ -->
            <h4 class="center">Description</h4>
            <div id="form_div">
               <table id="employee_table_step3" align=center>
                <tr id="row1">
                  <!-- <td style='width:10px'></td> -->
                   <!-- <td>
                     <br>
                     <div class="file-field input-field">
                       <div class="btn">
                         <span>Image</span>
                         <input type="file" name="pic[]">
                       </div>
                       <div class="file-path-wrapper">
                         <input class="file-path validate"  type="text">
                       </div>
                     </div>
                   </td> -->
                   <td style="width:70%">
                     <div class="input-field col s12">
                       <textarea id="textarea1" class="materialize-textarea" name="description[]" required></textarea>
                       <label for="textarea1">Description</label>
                     </div>
                   </td>
                   <td style="width:10%"></td>
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
               </table>

               <input class="btn" type="button" onclick="add_row_step3();" value="ADD ROW">

               <br><br>

               <h4 class="center">Video</h4>
               <input type="checkbox" id="test5" name="checkbox"/>
               <label for="test5">Do you want provide a video</label>
               <br>
               <div class="file-field input-field" id="video_file">
                  <div class="btn">
                    <span>Video</span>
                    <input type="file" name="video" onchange="checkVideo()" id="video">
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" id="video">
                  </div>
                </div>

             <script type="text/javascript">
             function checkVideo(){
               var allowedExtension = ['mkv' , 'mp4' , 'ogg' , 'webm' , 'mov' , '3gp' , 'm4v' , 'mpg' , 'jpeg'];
               var fileExtension = document.getElementById('video').value.split('.').pop().toLowerCase();
               var isValidFile = false;
               // alert(fileExtension);
                   for(var index in allowedExtension) {
                       if(fileExtension === allowedExtension[index]) {
                           isValidFile = true;
                           break;
                       }
                   }// for

                   if(!isValidFile) {
                       alert('Allowed Extensions are : *.' + allowedExtension.join(', *.'));
                       document.getElementById('video').value = "";
                   }
                   return isValidFile;
             }// checkvideo

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
             </script>

             <script type="text/javascript">
             function add_row_step3()
             {
              $rowno=$("#employee_table_step3 tr").length;
              $rowno=$rowno+1;
              $("#employee_table_step3 tr:last").after("<tr id='row"+$rowno+"'><td style='width:70%'><div class='input-field col s12'><textarea id='textarea1' name='description[]' class='materialize-textarea' required></textarea><label for='textarea1'>Description</label></div></td><td style='width:10%'><button class='btn-floating waves-effect waves-light red' type='button' value='DELETE' onclick=delete_row('row"+$rowno+"')><i class='material-icons'>delete_forever</i></button></td><td><button class='btn-floating waves-effect waves-light tooltipped move up blue' data-position='top' data-tooltip='Move up' type='button' value='move up' onclick=get_id_step3('"+$rowno+"')><i class='material-icons'>arrow_drop_up</i></button></td><td><button class='btn-floating waves-effect waves-light tooltipped move down' data-position='bottom' data-tooltip='Move down' type='button' value='move down' onclick=get_id('"+$rowno+"')><i class='material-icons'>arrow_drop_down</i></button></td></tr>");

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

          </div>
        </div>
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
</div>

<br><br><br><br><br><br><br><br><br><br><br><br>
    </body>
  </html>
