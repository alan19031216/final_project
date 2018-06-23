<?php
  require 'html_php/header.php';
 ?>
    <title>Home</title>
    <link rel="stylesheet" href="css/materialize-stepper.min.css">
    <script src="https://js.leapmotion.com/leap-0.6.4.js"></script>
    <script type="text/javascript" src="extras/modernizr.2.5.3.min.js"></script>
    <!--rating-->
    <script src="js/rate.js"></script>
    <!-- jQueryValidation Plugin (optional) -->
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
    <!--Import Materialize-Stepper JavaScript -->
    <script src="js/materialize-stepper.min.js"></script>

  </head>
  <body>

    <?php
    require 'html_php/navbar_html.php';
     ?>

     <script type="text/javascript">
     // step 2
     function add_row()
     {
      $rowno=$("#employee_table tr").length;
      $rowno=$rowno+1;
      $("#employee_table tr:last").after("<tr id='row"+$rowno+"'><td style='width:10px'>"+$rowno +")</td><td><input required type='text' name='name_ingredients[]' placeholder='Enter ingredients'></td><td><input type='number' name='num[]' placeholder='How many G/KG/ML/L....' required></td><td><input type='text' name='unit[]' class='autocomplete' placeholder='Unit' required></td><td><input type='button' value='DELETE' onclick=delete_row('row"+$rowno+"')></td></tr>");
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
     }
     function delete_row(rowno)
     {
      $('#'+rowno).remove();
     }
     </script>

     <script type="text/javascript">
     function add_row_step3()
     {
      $rowno=$("#employee_table_step3 tr").length;
      $rowno=$rowno+1;
      $("#employee_table_step3 tr:last").after("<tr id='row"+$rowno+"'><td style='width:10px'>"+$rowno +")</td><td><br><div class='file-field input-field'><div class='btn'><span>File</span><input type='file' name='pic[]'></div><div class='file-path-wrapper'><input class='file-path validate' type='text'></div></div></td><td><div class='input-field col s12'><textarea id='textarea1' name='description[]' class='materialize-textarea'></textarea><label for='textarea1'>Textarea</label></div></td><td><input type='button' value='DELETE' onclick=delete_row('row"+$rowno+"')></td></tr>");
      $('#textarea1').trigger('autoresize');
     }
     function delete_row(rowno)
     {
      $('#'+rowno).remove();
     }
     </script>

    <div class="carousel carousel-slider center" data-indicators="true">
      <div class="carousel-fixed-item center">

      </div>
      <div class="carousel-item orange white-text" href="#one!">
        <h2>First Panel</h2>
        <p class="white-text">This is your first panel</p>
        <br><br><br>
        <input class="blue-text" id="search" type="search" style="width:50%;background-color:white;">
      </div>
    </div>

    <div class="fixed-action-btn vertical">
      <a class="btn-floating btn-large red">
        <i class="large material-icons">mode_edit</i>
      </a>
      <ul>
        <li><a class="btn-floating waves-effect waves-light red btn modal-trigger" title="Add post" href="#modal1"><i class="material-icons">add</i></a></li>
        <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
        <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
        <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
      </ul>
    </div>

  <div class="content">
    <?php
      require 'html_php/content_html.php';
     ?>
  </div> <!--content END-->

    <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <?php
      require 'html_php/step_html.php';
     ?>
  </div><!--modal1 END-->
      <br><br><br><br><br><br><br><br><br><br><br><br>
  </body>

  <script type="text/javascript">
    $(document).ready(function(){
      // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
      $('select').material_select();
      $('.modal').modal();
      $('#modal1').modal('open');
      $('.stepper').activateStepper();

      $('#textarea1').trigger('autoresize');

      $('textarea#textarea_simple_description').characterCounter();

      // autocomplete
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
    });
  </script>

<script type="text/javascript" src="js/home.js"></script>
</html>
