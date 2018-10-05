<?php
include 'html_php/header.php';

$DS = DIRECTORY_SEPARATOR;
file_exists(__DIR__ . $DS . 'core' . $DS . 'Handler.php') ? require_once __DIR__ . $DS . 'core' . $DS . 'Handler.php' : die('Handler.php not found');
file_exists(__DIR__ . $DS . 'core' . $DS . 'Config.php') ? require_once __DIR__ . $DS . 'core' . $DS . 'Config.php' : die('Config.php not found');

use AjaxLiveSearch\core\Config;
use AjaxLiveSearch\core\Handler;

$handler = new Handler();
$handler->getJavascriptAntiBot();
 ?>
<body>
 <div class="row hide-on-med-and-down" id="narbar">
   <div class="col l4 m4 s6">
     <br>
     <a href="new_home.php"><img src="img/logo.png" alt="" width="60%"></a>
   </div>

   <style media="screen">
   input[type="search"] {
     height: 64px !important; /* or height of nav */
     margin: 0;
   }

   #fixedBar {
     position: fixed;
     z-index: 900; //TODO: import from _colors and bind to variable, see cool webpack loader thing.
     background: #ee6e73; // border: 2px solid green;
     width: 30%;
     // margin-left: -150px;
     form {
       //new
       margin: 0;
       padding: 0;
       height: 100%;
     }
     .row {
       //new
       margin-bottom: 0px !important;
       padding: 0px !important;
     }
     transition: box-shadow .5s;
   }
   .search-results {
     display:none;
     position: ;
     width: 100%;
     z-index: 30;
   }

     .search-results.show{
     display:block;
   }

   .side-nav {
     -webkit-overflow-scrolling: touch;
   }

   .pp {
     position: absolute;
     left: 30px;
     display: inline-block;
     vertical-align: middle;
   }
   </style>

    <div class="col l4 m4 s6">
      <br>
      <div class="input-field" style="clear: both">
          <input type="text" class='mySearch' id="ls_query" placeholder="Type to start searching ...">
      </div>
    </div>

   <script type="text/javascript" src="js/ajaxlivesearch.js"></script>
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
         <a href='#'>
          <div class="col l12 waves-effect waves-light btn dropdown-button" data-activates="dropdown1" style="width:300px;">
           <i class="material-icons left">account_circle</i>Welcome back <?php echo $_SESSION['username']; ?>
          </div>
         </a>
       </div>
     </center>
   </div>
 </div>

   <!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content'>
    <!-- <li class="divider" tabindex="-1"></li> -->
    <li><a href="php/logout.php"><i class="material-icons">beach_access</i>Logout</a></li>
    <!-- <li><a href="#!"><i class="material-icons">cloud</i>five</a></li> -->
  </ul>

 <div class="" id="test">
   <nav>
     <div class="nav-wrapper orange">
       <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
       <a class="brand-logo hide-on-large-only" href="new_home.php" class="brand-logo">Let's Cook</a>
       <ul id="nav-mobile" class="hide-on-med-and-down">
         <li><a href="live.php">Live video</a></li>
         <li><a href="category.php">Category</a></li>
         <li><a href="subscript.php">Subscription</a></li>
         <li><a href="question.php">Question</a></li>
       </ul>
     </div>
   </nav>
 </div>
 <!--Moblie slide bar-->
 <ul class="side-nav" id="mobile-demo">
   <center> <li><a href="home.php" style="pointer-events: none;cursor: default;"><b style="color:red;font-size:30px">Lest's Cook</b></a></li> </center>
   <li><a href="sell.php">Book of recipe</a></li>
   <li>
     <ul class="collapsible collapsible-accordion">
       <li>
         <a class="collapsible-header waves-effect waves-teal">
           Welcome back, <b style="color:blue"><?php echo $_SESSION['username']; ?></b>
           <i class="material-icons right">arrow_drop_down</i>
         </a>
         <div class="collapsible-body">
           <ul>
             <li class="divider"></li>
             <li><a href="user_profile.php"><i class="material-icons">account_box</i>User profile</a></li>
             <li><a href="php/logout.php">Logout</a></li>
             <li class="divider"></li>
           </ul>
         </div>
       </li>
     </ul>
   </li>
 </ul>

<script type="text/javascript">
  $(document).ready(function(){
    // mobile slide
    $(".button-collapse").sideNav();
    // button dropdown
    $('.dropdown-trigger').dropdown();
  });
</script>
