<?php
include 'header.php';

$DS = DIRECTORY_SEPARATOR;
file_exists(__DIR__ . $DS . 'core' . $DS . 'Handler.php') ? require_once __DIR__ . $DS . 'core' . $DS . 'Handler.php' : die('Handler.php not found');
file_exists(__DIR__ . $DS . 'core' . $DS . 'Config.php') ? require_once __DIR__ . $DS . 'core' . $DS . 'Config.php' : die('Config.php not found');

use AjaxLiveSearch\core\Config;
use AjaxLiveSearch\core\Handler;

if (session_id() == '') {
    session_start();
}

    $handler = new Handler();
    $handler->getJavascriptAntiBot();
 ?>
 <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-121742810-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-121742810-1');
    </script>

    <div class="row hide-on-med-and-down" id="narbar">
      <div class="col l4 m4 s6">
        <br>
        <a href="new_index.php"><img src="img/logo.png" alt="" width="60%"></a>
      </div>


      <div class="col l4 m4 s6">
        <br>
        <div class="input-field" style="clear: both">
            <input type="text" class='mySearch' id="ls_query" placeholder="Type to start searching ...">
        </div>
      </div>

      <script type="text/javascript" src="js/ajaxlivesearch.min.js"></script>

      <script>
          var code = '';
          var input = document.getElementById("ls_query");
          var second  = '';
          input.addEventListener("keyup", function(event) {
              event.preventDefault();
              if (event.keyCode === 13) {
                  //alert(code);
                  if(code != ''){
                      window.location.href = "search.php?code="+code;
                  }
                  else{
                      //alert(second);
                      window.location.href = "search.php?search="+second;
                  }
              }
          });

          $("input#ls_query").keyup(function(e){
            var val = $(this).val();
            val = val.replace(/[^\w]+/g, "");
            second = val;
          });

      jQuery(".mySearch").ajaxlivesearch({
          loaded_at: <?php echo time(); ?>,
          token: <?php echo "'" . $handler->getToken() . "'"; ?>,
          max_input: <?php echo Config::getConfig('maxInputLength'); ?>,
          onResultClick: function(e, data) {
              // get the index 1 (second column) value
              code = jQuery(data.selected).find('td').eq('0').text();
              var selectedOne = jQuery(data.selected).find('td').eq('1').text();

              // set the input value
              jQuery('#ls_query').val(selectedOne);

              // hide the result
              jQuery("#ls_query").trigger('ajaxlivesearch:hide_result');
          },
          onResultEnter: function(e, data) {
              // do whatever you want
              // jQuery("#ls_query").trigger('ajaxlivesearch:search', {query: 'test'});
          },
          onAjaxComplete: function(e, data) {

          }
      });
      </script>
      <script>
        window.onscroll = function() {myFunction()};

        function myFunction() {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                document.getElementById("test").classList.add('navbar-fixed');
                $('#narbar').hide();
            } else {
                document.getElementById("test").classList.remove('navbar-fixed');
                $('#narbar').show();
            }
        }
        </script>

      <div class="col l4 m4 s6">
        <br>
        <center>
          <div class="#e0e0e0 grey lighten-2 card" style="width:50%;background-color:#ff0000;">

            <a href="login_register/"><div class="col l12 waves-effect waves-light btn" style="width:200px;">
              <i class="material-icons left">account_circle</i>login / Register
            </div></a>

          </div>
        </center>
      </div>
    </div>

    <div class="" id="test">
      <nav>
        <div class="nav-wrapper orange">
          <a class="brand-logo hide-on-large-only" href="index.php" data-activates="mobile-demo" class="brand-logo">Let's Cook</a>
          <a href="" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul id="nav-mobile" class="hide-on-med-and-down">
            <li><a href="#">Recipe</a></li>
            <li><a href="#">Live video</a></li>
            <li><a href="#">Online chat</a></li>
          </ul>
        </div>
      </nav>
    </div>

    <div class="slider">
      <ul class="slides">
        <li>
          <img src="img/slide 1.jpg"> <!-- random image -->
          <div class="caption center-align">
            <h3>This is Let cook!</h3>
            <h5 class="light grey-text text-lighten-3"></h5>
          </div>
        </li>
        <li>
          <img src="img/slide 2.jpg"> <!-- random image -->
          <div class="caption left-align">
            <h3>Share recipe</h3>
            <h5 class="light grey-text text-lighten-3"></h5>
          </div>
        </li>
        <li>
          <img src="img/slide 3.jpg"> <!-- random image -->
          <div class="caption right-align">
            <h3></h3>
            <h5 class="light grey-text text-lighten-3"></h5>
          </div>
        </li>
        <li>
          <img src="img/slide 4.jpg"> <!-- random image -->
          <div class="caption center-align">
            <h3></h3>
            <h5 class="light grey-text text-lighten-3"></h5>
          </div>
        </li>
      </ul>
    </div>

    <script type="text/javascript">
      $(document).ready(function(){
      $('.slider').slider();
      });
    </script>

    <div class="row">
      <div class="col l2 m6">
        <div class="">
          <div class="card-panel grey lighten-5 z-depth-1" style="height:150px">
            <div class="row valign-wrapper">
              <div class="">
                <img src="img/1.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
              </div>
              <div class="">
                <span class="black-text center" style="font-size:20px">
                  Appetizers and Snacks
                </span>
              </div>
            </div>
          </div>
        </div>
       </div>

       <div class="col l2 m6">
         <div class="">
           <div class="card-panel grey lighten-5 z-depth-1" style="height:150px">
             <div class="row valign-wrapper">
               <div class="">
                 <img src="img/2.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
               </div>
               <div class="">
                 <span class="black-text center" style="font-size:20px">
                   Breakfast and Brunch
                 </span>
               </div>
             </div>
           </div>
         </div>
        </div>

        <div class="col l2 m6">
          <div class="">
            <div class="card-panel grey lighten-5 z-depth-1" style="height:150px">
              <div class="row valign-wrapper">
                <div class="">
                  <img src="img/3.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                </div>
                <div class="">
                  <span class="black-text center" style="font-size:20px">
                    Desserts
                  </span>
                </div>
              </div>
            </div>
          </div>
         </div>

         <div class="col l2 m6">
           <div class="">
             <div class="card-panel grey lighten-5 z-depth-1" style="height:150px">
               <div class="row valign-wrapper">
                 <div class="">
                   <img src="img/4.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                 </div>
                 <div class="">
                   <span class="black-text center" style="font-size:20px">
                     Dinners
                   </span>
                 </div>
               </div>
             </div>
           </div>
          </div>

          <div class="col l2 m6">
            <div class="">
              <div class="card-panel grey lighten-5 z-depth-1" style="height:150px">
                <div class="row valign-wrapper">
                  <div class="">
                    <img src="img/5.jpg" alt="" class="circle responsive-img" style="width:80%"> <!-- notice the "circle" class -->
                  </div>
                  <div class="">
                    <span class="black-text center" style="font-size:20px">
                      Drink
                    </span>
                  </div>
                </div>
              </div>
            </div>
           </div>

           <div class="col l2 m6">
             <div class="">
               <div class="card-panel grey lighten-5 z-depth-1" style="height:150px">
                 <div class="row valign-wrapper">
                   <div class="">
                     <img src="img/6.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                   </div>
                   <div class="">
                     <span class="black-text center" style="font-size:20px">
                       Lunch
                     </span>
                   </div>
                 </div>
               </div>
             </div>
            </div>
        </div>

        <div class="content">
          <?php
            require 'html_php/content_html.php';
            require 'html_php/footer.php';
           ?>
        </div> <!--content END-->
  </body>
</html>
