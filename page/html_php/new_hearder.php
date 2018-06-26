<?php
include 'html_php/header.php';
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
       <nav class="orange">
         <div class="nav-wrapper">
           <form>
             <div class="input-field">
               <input id="search" type="search" required>
               <label class="label-icon" for="search"><i class="material-icons">search</i></label>
               <i class="material-icons">close</i>
             </div>
           </form>
         </div>
       </nav>
       <div id="search-results" class="search-results">
           <div class="row">
             <div class=""> <div class="card ">
               <div class="collection">
                 <a class="collection-item" href="#">Ali Baba</a>
                 <a class="collection-item" href="#">JamesWS</a>
                 <a class="collection-item" href="#">ChuckEngine</a>
               </div>
             </div>
           </div>
         </div>
       </div>
     </nav>
   </div>

   <script type="text/javascript">
   $('#search')
     .focus(function() {
         //$('#search-results').addClass('show');
     })
     .blur(function() {
         //$('#search-results').removeClass('show');
     });
   //TODO: turn search box into an expanding button on mobile
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

         <a href="#"><div class="col l12 waves-effect waves-light btn" style="width:300px;">
           <i class="material-icons left">account_circle</i>Welcome back <?php echo $_SESSION['username']; ?>
         </div></a>
       </div>
     </center>
   </div>
 </div>

 <div class="" id="test">
   <nav>
     <div class="nav-wrapper orange">
       <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
       <a class="brand-logo hide-on-large-only" href="new_home.php" class="brand-logo">Let's Cook</a>
       <ul id="nav-mobile" class="hide-on-med-and-down">
         <li><a href="#">Recipe</a></li>
         <li><a href="#">Live video</a></li>
         <li><a href="#">Online chat</a></li>
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
  });
</script>
