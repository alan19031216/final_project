<?php
require 'html_php/header.php';
require 'php/config.php';
//echo $code;
 ?>

   </head>
   <body style="background-color:#f5f5f5">
     <ul id="dropdown1" class="dropdown-content">
       <li class="divider"></li>
       <li><a href="user_profile.php"><i class="material-icons">account_box</i>User profile</a></li>
       <li><a href="php/logout.php">Logout</a></li>
       <li class="divider"></li>
     </ul>

     <nav>
       <div class="navbar-fixed orange">
       <!--  <a href="#!" class="brand-logo">Logo</a> -->
       <a href="home.php" class="brand-logo">Let's Cook</a>
       <!--<a href="index.php"><img class="responsive-img brand-logo hide-on-small-only" src="img/logo.jpg" alt="" width="13%"></a>-->
       <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
         <ul class="right hide-on-med-and-down">
           <li><a href="cart.php"><i class="material-icons">shopping_cart</i></a> </li>
           <li><a href="sell.php">Book of recipe</a></li>
           <li>
             <a class="dropdown-button" href="#!" data-activates="dropdown1">
               Welcome back, <b style="color:blue"><?php echo $_SESSION['username']; ?></b>
               <i class="material-icons right">arrow_drop_down</i>
             </a>
           </li>
         </ul>
       </div>
     </nav>

     <!--Moblie slide bar-->
     <ul class="side-nav" id="mobile-demo">
       <center> <li><a href="home.php" style="pointer-events: none;cursor: default;"><b style="color:red;font-size:30px">Lest's Cook</b></a></li> </center>
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
           <li><a href="cart.php"><i class="material-icons">shopping_cart</i></a> </li>
           <li><a href="sell.php">Sell Recipe</a></li>
         </ul>
       </li>
     </ul>

     <?php
      require 'html_php/html_cart.php';
      ?>

   </body>
  </html>
