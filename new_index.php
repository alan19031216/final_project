<?php
include 'header.php';
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
           ?>
        </div> <!--content END-->

        <footer class="page-footer">
               <div class="container">
                 <div class="row">
                   <div class="col l6 s12">
                     <h5 class="white-text">Let's cook</h5>
                     <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
                   </div>
                   <div class="col l4 offset-l2 s12">
                     <h5 class="white-text">Links</h5>
                     <ul>
                       <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li> <br>
                       <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li> <br>
                       <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li> <br>
                       <li><a class="grey-text text-lighten-3" href="admin/login.php">Admin</a></li>
                     </ul>
                   </div>
                 </div>
               </div>
               <div class="footer-copyright">
                 <div class="container">
                 © 2018 Copyright Text
                 <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
                 </div>
               </div>
             </footer>

  </body>
</html>
