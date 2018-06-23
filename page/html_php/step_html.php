<div class="col s12">
   <div class="card">
      <div class="card-content">
        <form class="" action="php/recipe.php" method="post" enctype="multipart/form-data">
         <ul class="stepper horizontal" id="horizontal">
            <li class="step active">
               <div data-step-label="To step-title!" class="step-title waves-effect waves-dark">Step 1</div>
               <div class="step-content">
                  <div class="row">
                    <h2 class="center-align">Make a Post</h2>
                    <div class="row">
                      <div class="input-field col s12">
                        <input type="text" name="food_name" class="validate" required>
                        <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                        <label>Name of food</label>
                      </div>

                      <div class="input-field col s6">
                        <select class="icons" id="which_type" name="label" onchange="test()" required>
                        <option value="" disabled selected>Choose your option</option>
                        <option value="vegetables" data-icon="img/food/American food.jpg" class="left circle">Vegetable</option>
                        <option value="meat" data-icon="img/food/Chinese food.jpg" class="left circle">Meat</option>
                        <option value="dessert" data-icon="img/food/Chinese food.jpg" class="left circle">Dessert</option>
                        <option value="soup" data-icon="img/food/Chinese food.jpg" class="left circle">Soup</option>
                      </select>
                      <label>Type</label>
                      </div>

                      <div class="input-field col s6" id="type2">
                        <select class="icons" id="which_type2" name="food_type" required>
                        <option value="" disabled selected>Choose your option</option>
                        <option value="beans" data-icon="img/food/Chinese food.jpg" class="left circle">Beans</option>
                        <option value="mushrooms" data-icon="img/food/Chinese food.jpg" class="left circle">Mushrooms</option>
                        <option value="vegetable" data-icon="img/food/American food.jpg" class="left circle">Vegetables</option>
                        <option value="tofu" data-icon="img/food/Chinese food.jpg" class="left circle">Tofu</option>
                      </select>
                      <label>Vegetable</label>
                      </div>

                      <div class="input-field col s6" id="type3">
                        <select class="icons" id="which_type3" name="food_type"  required>
                        <option value="" disabled selected>Choose your option</option>
                        <option value="beef" data-icon="img/food/American food.jpg" class="left circle">Beef</option>
                        <option value="chicken" data-icon="img/food/American food.jpg" class="left circle">Chicken</option>
                        <option value="fish" data-icon="img/food/Chinese food.jpg" class="left circle">Fish</option>
                        <option value="pork" data-icon="img/food/Chinese food.jpg" class="left circle">Pork</option>
                        <option value="seafood" data-icon="img/food/Chinese food.jpg" class="left circle">Seafood</option>
                      </select>
                      <label>Meat</label>
                      </div>

                      <div id="type1"></div>

                      <script type="text/javascript">
                      $(document).ready(function(){
                        $('#type2').hide();
                        $('#type3').hide();
                      });
                        function test() {
                          var selectBox = document.getElementById("which_type");
                          var selectedValue = which_type.options[which_type.selectedIndex].value;
                          //alert(selectedValue);
                          if(selectedValue == 'vegetables'){
                            $('#type2').fadeIn('slow');
                            $('#type3').hide();
                          }
                          else if(selectedValue == 'meat'){
                            $('#type3').fadeIn('slow');
                            $('#type2').hide();
                          }
                          else if(selectedValue == 'dessert' || selectedValue == 'soup'){
                            $('#type3').fadeOut('slow');
                            $('#type2').fadeOut('slow');
                          }

                        }
                      </script>

                      <div class="input-field col s12">
                        <textarea id="textarea_simple_description" name="simple_description" class="materialize-textarea" data-length="200"></textarea>
                        <label>Simple Description</label>
                      </div>
                    </div>

                    <div class="input-filed col s12">
                      <div class="file-field input-field">
                        <div class="btn">
                          <span>Cover Image</span>
                          <input type="file" name="cover_img">
                        </div>
                        <div class="file-path-wrapper">
                          <input class="file-path validate"  type="text">
                        </div>
                      </div>
                    </div>

                  <div class="right-align">
                    <br>
                    <button class="waves-effect waves-dark btn blue next-step">CONTINUE</button>
                  </div>
                </div>
               </div>
            </li> <!--step 1 END-->
            <li class="step">
              <div class="step-title waves-effect waves-dark">Step 2</div>
              <div class="step-content">
                <h2 class="center-align">Ingredients</h2>
                <div id="form_div">
                   <table id="employee_table" align=center>
                    <tr id="row1">
                      <td style='width:10px'></td>
                       <td><input type="text" name="name_ingredients[]" placeholder="Enter Iingredients" required></td>
                       <td><input type="number" name="num[]" placeholder="How many G/KG/ML/L...." required></td>
                       <td><input type="text" name="unit[]" class="autocomplete" placeholder="Unit" required></td>
                    </tr>
                   </table>
                   <input type="button" onclick="add_row();" value="ADD ROW">
                 </div>

                 <br> <br><br><br>
                <div class="right-align">
                  <button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
                  <button class="waves-effect waves-dark btn blue next-step">CONTINUE</button>
                </div>
              </div>
            </li><!--step 2 END-->
            <li class="step">
               <div class="step-title waves-effect waves-dark">Step 3</div>
               <div class="step-content">
                 <h2 class="center-align">Step</h2>
                 <div id="form_div">
                    <table id="employee_table_step3" align=center>
                     <tr id="row1">
                       <td style='width:10px'></td>
                        <td>
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
                        </td>
                        <td>
                          <div class="input-field col s12">
                            <textarea id="textarea1" class="materialize-textarea" name="description[]"></textarea>
                            <label for="textarea1">Description</label>
                          </div>
                        </td>
                     </tr>
                    </table>

                    <input type="button" onclick="add_row_step3();" value="ADD ROW">
                    <br><br>
                    <input type="checkbox" id="test5" name="checkbox"/>
                    <label for="test5">Provide video</label>
                    <br>
                    <label for="file" name="file"><span>Filename:</span></label> <br>
                    <input type="file" name="video" id="file"/>
                  </div>

                  <br> <br>
                 <div class="right-align">
                   <button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
                   <button class="waves-effect waves-dark btn blue next-step">CONTINUE</button>
                 </div>
               </div>
            </li> <!--step 3 END-->

            <script type="text/javascript">
            $(function () {
              $('input[name="video"]').hide();
              $('label[name="file"]').hide();

              //show it when the checkbox is clicked
              $('input[name="checkbox"]').on('click', function () {
                  if ($(this).prop('checked')) {
                      $('input[name="video"]').fadeIn();
                      $('label[name="file"]').fadeIn();
                  } else {
                      $('input[name="video"]').hide();
                      $('label[name="file"]').hide();
                  }
              });
            });
            </script>
            <li class="step">
               <div class="step-title waves-effect waves-dark">Step 4</div>
               <div class="step-content">
                  Finish!
                  <div class="step-actions">
                     <button class="waves-effect waves-dark btn blue" type="submit">SUBMIT</button>
                  </div>
               </div>
            </li>
         </ul>
         </form>
      </div>
   </div>
</div>
</div>
