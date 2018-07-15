<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
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
      <div class="col l12 m12 s12">
        <div class="card">
          <div class="card-content">
            <form class="" action="php/edit_recipe.php" method="post" enctype="multipart/form-data">
            <span class="card-title center">Edit recipe</span>
            <?php
              include 'php/config.php';
              $recipe_code = $_GET['recipe_code'];
              $sql_select_recipe = $conn->query("SELECT * FROM recipe WHERE code = '$recipe_code'");
              foreach ($sql_select_recipe as $row_recipe) {
                $name = $row_recipe['name'];
                $pre_time = $row_recipe['pre_time'];
                $cooking_time = $row_recipe['cooking_time'];
                $number_of_serve = $row_recipe['number_of_serve'];
                $simple_description = $row_recipe['simple_description'];
                $cover_image = $row_recipe['cover_img'];
                $video = $row_recipe['video'];
                $type = $row_recipe['type'];
              }
              //echo $recipe_code;
             ?>
             <input type="hidden" name="recipe_code" value="<?php echo $recipe_code ?>">
           <div class="row">
             <div class="col l4 m12 s12">
               <h4 class="center">Recipe image</h4>
               <div class="file-field input-field">
                 <div class="btn">
                   <span>Image</span>
                   <input type="file" id="my_file" name="image" onchange="previewFile()">
                 </div>
                 <div class="file-path-wrapper">
                   <input class="file-path validate" type="text" value="<?php echo $cover_image; ?>" id="my_file" name="image" required>
                 </div>
               </div>
               <input type="hidden" id="check_img" name="check_img" value="">
               <input type="hidden" name="image_hidden" value="<?php echo $cover_image; ?>">
               <img src="<?php echo $cover_image; ?>" id="img" height="200" width="100%" alt="Image preview...">
               <!-- <input type="image" src="img/image_preview.png" id="img" height="200" width="100%" alt="Image preview..."> -->
               <script type="text/javascript">
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
                   Prepare time (Minutes)
                   <input id="pre_time" type="number" class="validate" name="pre_time" value="<?php echo $pre_time; ?>" required>
                 </div>
                 <div class="input-field col l6 m12 s12">
                   Cooking time (Minutes)
                   <input id="cooking_time" type="number" class="validate" name="cooking_time" value="<?php echo $cooking_time; ?>" required>
                 </div>

                 <div class="input-field col l12 m12 s12">
                   Number of serve
                   <input id="number_of_serve" type="number" class="validate" name="number_of_serve" value="<?php echo $number_of_serve; ?>" required>
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
                 <script type="text/javascript">
                   $(document).ready(function(){
                     $('select').material_select();
                   });
                 </script>
               </div>
             </div> <!-- <div class="col l4 m12 s12"> - recipe image , pre time ....-->
             <div class="col l8 m12 s12 ">
               <h4 class="center">Recipe details</h4>
               <div class="row">
                 <div class="input-field col s12">
                   Recipe name
                   <input  id="recipe_name" type="text" class="validate" name="recipe_name" value="<?php echo $name; ?>" required>
                 </div>

                 <div class="input-field col s12">
                   Simple description
                   <textarea  id="textarea1" class="materialize-textarea" data-length="300" name="simple_description" required></textarea>
                 </div>
                 <script type="text/javascript">
                   $('#textarea1').val("<?php echo $simple_description; ?>");
                   $(document).ready(function() {
                     $('textarea1').characterCounter();
                     document.getElementById("button1").style.visibility = "hidden";
                     document.getElementById("button_step1").style.visibility = "hidden";
                   });
                 </script>

                 <br class="hide-on-med-and-up">
                 <br><br>
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
                       $i = 0;
                       $sql_ingredients = $conn->query("SELECT * FROM ingredients WHERE code = '$recipe_code'");
                        foreach ($sql_ingredients as $row_ingredients) {
                          $i++;
                          $count_ingredients++;
                       ?>
                           <tr id="row<?php echo $i+1 ?>">
                              <td><input  id="name_ingredients<?php echo $i; ?>" type="text" name="name_ingredients[]" value="<?php echo $row_ingredients['name']; ?>" placeholder="Enter Iingredients" required></td>
                              <td><input  id="num<?php echo $i; ?>" type="number" name="num[]" value="<?php echo $row_ingredients['num']; ?>" placeholder="How many G/KG/ML/L...." required></td>
                              <td><input hidden type="text" name="unit[]" id="unit_hidden<?php echo $i ?>" placeholder="Unit" value="<?php echo $unit[$i]; ?>" required></td>
                              <td id="row<?php echo $i ?>">
                                <select class="browser-default" id="change<?php echo $i ?>" onclick="select_onchange('<?php echo $i ?>');">
                                  <option disabled>Choose your type</option>
                                <?php
                                  foreach ($options_i as $option_i) {
                                ?>
                                <?php
                                   if($option_i == $row_ingredients['unit']){
                               ?>
                                 <option value="<?php echo $option_i; ?>" selected ><?php echo $option_i;?></option>
                               <?php
                                   }
                                   elseif(!in_array($row_ingredients['unit'], $options_i)){
                               ?>
                                 <option value="<?php echo $row_ingredients['unit']; ?>" selected ><?php echo $row_ingredients['unit'];?></option>
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
                   $i = 0;
                   $sql_step = $conn->query("SELECT * FROM food_step WHERE code = '$recipe_code'");
                    foreach ($sql_step as $row_step) {
                     $i++;
                   ?>
                   <tr id="row1">
                      <td>
                        <div class="input-field col s12">
                          Description
                          <textarea id="textarea_step<?php echo $i;?>" class="materialize-textarea" name="description[]" value="<?php echo $description[$i]; ?>" required></textarea>
                        </div>

                        <script type="text/javascript">
                           //var a_string = escape("");
                          $('#textarea_step<?php echo $i;?>').val("<?php echo $row_step['description']; ?>");
                        </script>

                      </td>
                      <td>
                        <button id="button_step<?php echo $i ?>" class='btn-floating waves-effect waves-light red' type='button' value='DELETE' name='button' onclick=delete_row('row"+$rowno+"')>
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
                     }// for
                    ?>
                    <script type="text/javascript">
                    $(document).ready(function(){
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
                  </div>
               </div>

               <h4 class="center">Video</h4>
                <script type="text/javascript">
                $(document).ready(function(){
                  var video = '<?php echo $video; ?>';
                  // alert (video);
                  if(video == " " || video == '' || video == 'php/video/'){
                    //$video = ' ';
                    document.getElementById("video_video").style.visibility = "visible";
                    document.getElementById("video_text").style.visibility = "visible";
                    // document.getElementById("video_file").style.visibility = "hidden";
                    document.getElementById("player").style.visibility = "hidden";
                  }
                  else{
                    document.getElementById("video_video").style.visibility = "visible";
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
                      <input type="file" name="video" id="video" onchange="videoCheck()">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text" name="video" value="<?php echo $video; ?>" >
                    </div>
                  </div>
                  <input type="hidden" id="video_check" name="video_check" value="">
                  <input type="hidden" name="video_hidden" value="<?php echo $video; ?>">
                  <script type="text/javascript">
                    function videoCheck(){
                      var allowedExtension = ['mkv' , 'mp4' , 'ogg' , 'webm' , 'mov' , '3gp' , 'm4v' , 'mpg' , 'jpeg'];
                      var fileExtension = document.getElementById('video').value.split('.').pop().toLowerCase();
                      var isValidFile = false;
                      // alert(fileExtension);
                          for(var index in allowedExtension) {
                              if(fileExtension === allowedExtension[index]) {
                                  $('#player').hide();
                                  document.getElementById('video_check').value = '1';
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

                  </script>

               </div>
               <video width="100%" height="240" controls id="player">
                 <source src="<?php echo $video; ?>" type="video/mp4" >
               </video>

             </div><!-- <div class="col l8 m12 s12"> - recipe name, vide , step ....-->
           </div> <!-- recipe detail -- >
          </div><!-- card-content -->
          <div class="card-action center">
            <button class="btn" class="center" href="#" type="submit">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div> <!-- row -->
  </body>
</html>
