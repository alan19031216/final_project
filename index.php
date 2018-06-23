<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index</title>
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/style.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/style_button.css"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.leapmotion.com/leap-0.6.4.js"></script>
    <!--rating-->
    <script src="page/js/rate.js"></script>
    <script type="text/javascript" src="page/extras/modernizr.2.5.3.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>

    <script type="text/javascript" src="script.js"></script>

  </head>
  <body>

    <nav>
      <div class="navbar-fixed orange">
      <!--  <a href="#!" class="brand-logo">Logo</a> -->
      <a href="index.php" class="brand-logo">Let's Cook</a>
      <!--<a href="index.php"><img class="responsive-img brand-logo hide-on-small-only" src="img/logo.jpg" alt="" width="13%"></a>-->
      <a href="index.php" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="sell.php">Sell Recipe</a></li>
          <li><a href="login_register.php">Login/Register</a></li>
        </ul>
      </div>
    </nav>

    <!--Moblie slide bar-->
    <ul class="side-nav" id="mobile-demo">
      <center> <li><a style="pointer-events: none;cursor: default;"><b style="color:red;font-size:30px">Lest's Cook</b></a></li> </center>
      <li><a href="sell.php">Sell Recipe</a></li>
      <li><a href="login_register.php">Login/Register</a></li>
    </ul>

    <script type="text/javascript">
    $(document).ready(function(){
        $('.search-box input[type="text"]').on("keyup input", function(){
            /* Get input value on change */
            var inputVal = $(this).val();
            var resultDropdown = $(this).siblings(".result");
            if(inputVal.length){
                $.get("php/search.php", {term: inputVal}).done(function(data){
                    // Display the returned data in browser
                    resultDropdown.html(data);
                });
            } else{
                resultDropdown.empty();
            }
        });

        // Set search input value on click of result item
        $(document).on("click", ".result p", function(){
            $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
            $(this).parent(".result").empty();
        });
    });
    </script>

    <div class="carousel carousel-slider center" data-indicators="true">
      <div class="carousel-fixed-item center">
      </div>
      <div class="carousel-item orange white-text" href="#one!">
        <h2>First Panel</h2>
        <p class="white-text">This is your first panel</p>
        <br><br><br>
        <div class="search-box">
            <!--<input class="blue-text" type="text" autocomplete="off" placeholder="Search country..." style="width:50%;background-color:white;"/>-->
            <a class="waves-effect waves-light btn-large modal-trigger" href="#modal1"><i class="material-icons left">cloud</i>Search</a>

        </div>
      </div>
    </div>

    <div id="modal1" class="modal bottom-sheet">
      <div class="modal-content">
        <h4 class="center-align">Search</h4>
        <div class="row">
          <div class="col s6">
            <div class="row">
              <div class="chips chips-autocomplete chips-initial" id="chips-autocomplete_id"></div>
            </div>
            <!--<div class="search-box">
              <input class="blue-text" type="text" autocomplete="off" placeholder="Search country..." style="background-color:white;"/>
              <div class="result"></div>
            </div>-->
          </div>
          <script type="text/javascript">
          $( document ).ready(function() {
            $('.chips-autocomplete').material_chip({
              secondaryPlaceholder: '+maximun three tags',
        		  placeholder: 'Search what you want and press ENTER',
              autocompleteOptions: {
                data: {
                  'Apple': null,
                  'Microsoft': null,
                  'Google': null
                },
                limit: 1,
                minLength: 1
              }
            });
          });
          </script>

          <div class="col s6">
            <div class="row">
              <div class="col s12 m6 l3" >
                <center> <button type="button" class="button button1" name="button">Vegetables</button></center>
              </div>

              <div class="col s12 m6 l3" align="center">
                <center><button class="button button2">Meat</button></center>
              </div>
              <div class="col s12 m6 l3" align="center">
                <center><button class="button button3">Soup</button></center>
              </div>
              <div class="col s12 m6 l3" align="center">
                <center><button class="button button4">Dessert</button></center>
              </div>
            </div>

            <div class="row">
              <div class="col s12" id="vegetables">
                <hr>
                <div class="col s12 m6 l3">
                  <button type="button" class="button button5" name="button">Beans</button>
                </div>

                <div class="col s12 m6 l3">
                  <button class="button button6">Mushrooms</button>
                </div>
                <div class="col s12 m6 l3">
                  <button class="button button7">Vegetables</button>
                </div>
                <div class="col s12 m6 l3">
                  <button class="button button8">Tofu</button>
                </div>
              </div>

              <div class="col s12" id="meat">
                <hr>
                <div class="col s12 m6 l3">
                  <button type="button" class="button button9" name="button">Beef</button>
                </div>

                <div class="col s12 m6 l3">
                  <button class="button button10">Chicken</button>
                </div>
                <div class="col s12 m6 l3">
                  <button class="button button11">Fish</button>
                </div>
                <div class="col s12 m6 l3">
                  <button class="button button12">Pork</button>
                </div>
                <div class="col s12 m6 l3">
                  <button class="button button13">Seafood</button>
                </div>
              </div>
            </div>
          </div>
        </div><!--first row-->
      </div>
      <div class="modal-footer">
        <center><button type="button" class="modal-action modal-close waves-effect waves-light btn" onclick="search()">Search</button></center>
      </div>
    </div>
    <script type="text/javascript">
      function search() {
        var data = $('#chips-autocomplete_id').material_chip('data');
        var data1 , data2 , data3;
        if(data.length == 0){
          alert('Connot be empty');
        }
        if(data.length == 1){
          data1 = data[0].tag;
        }
        else if (data.length == 2) {
          data1 = data[0].tag;
          data2 = data[1].tag;
        }
        else {
          data1 = data[0].tag;
          data2 = data[1].tag;
          data3 = data[2].tag;
        }
        //alert(data1);
        if(data[0] == ' ' || data[0] == ''){
          data1 = null;
        }
        if(data[1] == ' ' || data[1] == ''){
          data2 = null;
        }
        if(data[2] == ' ' || data[2] == ''){
          data3 = null;
        }

        window.location.href = "search.php?data1="+data1+"&data2="+data2+"&data3="+data3+"";
      }
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
      // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
      $('select').material_select();
      $('.modal').modal();

      $('#vegetables').hide();
      $('#meat').hide();

      //alert(data[0].tag);
    });
    </script>

    <div class="content">
      <?php
        require 'html_php/content_html.php';
       ?>
    </div> <!--content END-->

    <footer class="page-footer">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text">Footer Content</h5>
            <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
          </div>
          <div class="col l4 offset-l2 s12">
            <h5 class="white-text">Links</h5>
            <ul>
              <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
              <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
              <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
              <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
        © 2014 Copyright Text
        <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
      </div>
    </footer>
  </body>

  <script type="text/javascript">
      $('.carousel.carousel-slider').carousel({fullWidth: true});
      // side nav (mobile)
      $(".button-collapse").sideNav();
  </script>

  <script type="text/javascript">
        $(".button1").on("click",function(e){
          var data= $('#chips-autocomplete_id').material_chip('data');
          if(data.length < 3){
            var text = $(this).text();
            var e = jQuery.Event("keydown");
            e.which = 13; // # Some key code value
            $(".chips-initial input").val(text);
            $(".chips-initial input").trigger(e);
            $('#vegetables').fadeIn('slow');
            $('#meat').hide();
          }
          else{
            alert("Maximum three!!")
          }
          //instance.deleteChip(3);
        });

          $(".button2").on("click",function(e){
            var data= $('#chips-autocomplete_id').material_chip('data');
            if(data.length < 3){
              var text = $(this).text();
              var e = jQuery.Event("keydown");
              e.which = 13; // # Some key code value
              $(".chips-initial input").val(text);
              $(".chips-initial input").trigger(e);
              $('#meat').fadeIn('slow');
              $('#vegetables').hide();
            }
            else{
              alert("Maximum three!!")
            }
          });

          $(".button3").on("click",function(e){
            var data= $('#chips-autocomplete_id').material_chip('data');
            if(data.length < 3){
              var text = $(this).text();
              var e = jQuery.Event("keydown");
              e.which = 13; // # Some key code value
              $(".chips-initial input").val(text);
              $(".chips-initial input").trigger(e);
              $('#vegetables').hide();
              $('#meat').hide();
            }
            else{
              alert("Maximum three!!")
            }
          });

          $(".button4").on("click",function(e){
            var data= $('#chips-autocomplete_id').material_chip('data');
            if(data.length < 3){
              var text = $(this).text();
              var e = jQuery.Event("keydown");
              e.which = 13; // # Some key code value
              $(".chips-initial input").val(text);
              $(".chips-initial input").trigger(e);
              $('#vegetables').hide();
              $('#meat').hide();
            }
            else{
              alert("Maximum three!!")
            }
          });

          $(".button5").on("click",function(e){
            var data= $('#chips-autocomplete_id').material_chip('data');
            if(data.length < 3){
              var text = $(this).text();
              var e = jQuery.Event("keydown");
              e.which = 13; // # Some key code value
              $(".chips-initial input").val(text);
              $(".chips-initial input").trigger(e);
              $('#vegetables').hide();
              $('#meat').hide();
            }
            else{
              alert("Maximum three!!")
            }
          });

          $(".button6").on("click",function(e){
            var data= $('#chips-autocomplete_id').material_chip('data');
            if(data.length < 3){
              var text = $(this).text();
              var e = jQuery.Event("keydown");
              e.which = 13; // # Some key code value
              $(".chips-initial input").val(text);
              $(".chips-initial input").trigger(e);
              $('#vegetables').hide();
              $('#meat').hide();
            }
            else{
              alert("Maximum three!!")
            }
          });

          $(".button7").on("click",function(e){
            var data= $('#chips-autocomplete_id').material_chip('data');
            if(data.length < 3){
              var text = $(this).text();
              var e = jQuery.Event("keydown");
              e.which = 13; // # Some key code value
              $(".chips-initial input").val(text);
              $(".chips-initial input").trigger(e);
              $('#vegetables').hide();
              $('#meat').hide();
            }
            else{
              alert("Maximum three!!")
            }
          });

          $(".button8").on("click",function(e){
            var data= $('#chips-autocomplete_id').material_chip('data');
            if(data.length < 3){
              var text = $(this).text();
              var e = jQuery.Event("keydown");
              e.which = 13; // # Some key code value
              $(".chips-initial input").val(text);
              $(".chips-initial input").trigger(e);
              $('#vegetables').hide();
              $('#meat').hide();
            }
            else{
              alert("Maximum three!!")
            }
          });

          $(".button9").on("click",function(e){
            var data= $('#chips-autocomplete_id').material_chip('data');
            if(data.length < 3){
              var text = $(this).text();
              var e = jQuery.Event("keydown");
              e.which = 13; // # Some key code value
              $(".chips-initial input").val(text);
              $(".chips-initial input").trigger(e);
              $('#vegetables').hide();
              $('#meat').hide();
            }
            else{
              alert("Maximum three!!")
            }
          });

          $(".button10").on("click",function(e){
            var data= $('#chips-autocomplete_id').material_chip('data');
            if(data.length < 3){
              var text = $(this).text();
              var e = jQuery.Event("keydown");
              e.which = 13; // # Some key code value
              $(".chips-initial input").val(text);
              $(".chips-initial input").trigger(e);
              $('#vegetables').hide();
              $('#meat').hide();
            }
            else{
              alert("Maximum three!!")
            }
          });

          $(".button11").on("click",function(e){
            var data= $('#chips-autocomplete_id').material_chip('data');
            if(data.length < 3){
              var text = $(this).text();
              var e = jQuery.Event("keydown");
              e.which = 13; // # Some key code value
              $(".chips-initial input").val(text);
              $(".chips-initial input").trigger(e);
              $('#vegetables').hide();
              $('#meat').hide();
            }
            else{
              alert("Maximum three!!")
            }
          });

          $(".button12").on("click",function(e){
            var data= $('#chips-autocomplete_id').material_chip('data');
            if(data.length < 3){
              var text = $(this).text();
              var e = jQuery.Event("keydown");
              e.which = 13; // # Some key code value
              $(".chips-initial input").val(text);
              $(".chips-initial input").trigger(e);
              $('#vegetables').hide();
              $('#meat').hide();
            }
            else{
              alert("Maximum three!!")
            }
          });

          $(".button13").on("click",function(e){
            var data= $('#chips-autocomplete_id').material_chip('data');
            if(data.length < 3){
              var text = $(this).text();
              var e = jQuery.Event("keydown");
              e.which = 13; // # Some key code value
              $(".chips-initial input").val(text);
              $(".chips-initial input").trigger(e);
              $('#vegetables').hide();
              $('#meat').hide();
            }
            else{
              alert("Maximum three!!")
            }
          });
  </script>

</html>
