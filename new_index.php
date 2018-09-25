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
 <script src="js/leapcursor-with-dependencies.min.js?gestureColor=#6DCC44"></script>

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
                      window.location.href = "search.php?code="+code+"&num=0";
                  }
                  else{
                      //alert(second);
                      window.location.href = "search.php?search="+second+"&num=1";
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
            <li><a href="category.php">Category</a></li>
            <li><a href="#">Live video</a></li>
            <li><a href="question.php">Question</a></li>
            <!-- <li><a href="#">Online chat</a></li> -->
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

    <style media="screen">
    @import url(https://fonts.googleapis.com/css?family=Raleway);

    .main-title{
    color: #2d2d2d;
    text-align: center;
    text-transform: capitalize;
    padding: 0.7em 0;
    }

    .content {
    position: relative;
    width: 90%;
    max-width: 400px;
    margin: auto;
    overflow: hidden;
    }

    .content .content-overlay {
    background: rgba(0,0,0,0.7);
    position: absolute;
    height: 99%;
    width: 100%;
    left: 0;
    top: 0;
    bottom: 0;
    right: 0;
    opacity: 0;
    -webkit-transition: all 0.4s ease-in-out 0s;
    -moz-transition: all 0.4s ease-in-out 0s;
    transition: all 0.4s ease-in-out 0s;
    }

    .content:hover .content-overlay{
    opacity: 1;
    }

    .content-image{
    width: 100%;
    }

    .content-details {
    position: absolute;
    text-align: center;
    padding-left: 1em;
    padding-right: 1em;
    width: 100%;
    top: 50%;
    left: 50%;
    opacity: 0;
    -webkit-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    -webkit-transition: all 0.3s ease-in-out 0s;
    -moz-transition: all 0.3s ease-in-out 0s;
    transition: all 0.3s ease-in-out 0s;
    }

    .content:hover .content-details{
    top: 50%;
    left: 50%;
    opacity: 1;
    }

    .content-details h4{
    color: #fff;
    font-weight: 200;
    letter-spacing: 0.15em;
    /* margin-bottom: 0.5em; */
    text-transform: uppercase;
    font-size: 23px;
    }

    .fadeIn-bottom{
    top: 80%;
    }

    .fadeIn-top{
    top: 20%;
    }

    .fadeIn-left{
      left: 20%;
    }

    .fadeIn-right{
      left: 80%;
    }
    </style>

    <div class="row hide-on-med-and-down">
      <div class="col l2 m6">
        <div class="content">
          <!-- <a href="https://unsplash.com/photos/HkTMcmlMOUQ" target="_blank"> -->
            <div class="content-overlay"></div>
            <img src="img/1.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
            <div class="content-details fadeIn-bottom">
              <h4 class="content-title">Appetizers and Snacks</h4>
            </div>
          </a>
        </div>
      </div>

      <div class="col l2 m6">
        <div class="content">
          <!-- <a href="https://unsplash.com/photos/HkTMcmlMOUQ" target="_blank"> -->
            <div class="content-overlay"></div>
            <img src="img/2.jpg" alt="" class="circle responsive-img content-image"> <!-- notice the "circle" class -->
            <div class="content-details fadeIn-top">
              <h4 class="content-title">Breakfast and Brunch</h4>
            </div>
          </a>
        </div>
      </div>

      <div class="col l2 m6">
        <div class="content">
            <div class="content-overlay"></div>
            <img src="img/3.jpg" alt="" class="circle responsive-img content-image"> <!-- notice the "circle" class -->
            <div class="content-details fadeIn-left">
              <h4>Desserts</h4>
            </div>
          </a>
        </div>
      </div>

      <div class="col l2 m6">
        <div class="content">
            <div class="content-overlay"></div>
            <img src="img/4.jpg" alt="" class="circle responsive-img content-image"> <!-- notice the "circle" class -->
            <div class="content-details fadeIn-right">
              <h4>Dinners</h4>
            </div>
          </a>
        </div>
      </div>

       <div class="col l2 m6">
         <div class="content">
            <div class="content-overlay"></div>
            <img src="img/5.jpg" alt="" class="circle responsive-img content-image"> <!-- notice the "circle" class -->
            <div class="content-details fadeIn-top fadeIn-left">
              <h4>Drink</h4>
            </div>
          </a>
        </div>
       </div>

       <div class="col l2 m6">
         <div class="content">
            <div class="content-overlay"></div>
            <img src="img/6.jpg" alt="" class="circle responsive-img content-image"> <!-- notice the "circle" class -->
            <div class="content-details fadeIn-top">
              <h4>Lunch</h4>
            </div>
          </a>
        </div>
        </div>
      </div>

        <div class="contents">
          <?php
            require 'html_php/content_html.php';
            require 'html_php/footer.php';
           ?>
        </div> <!--content END-->
  </body>
</html>
