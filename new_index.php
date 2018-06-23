<?php
include 'header.php';
 ?>

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
          <nav class="blue">
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

            <a href="login_register.php"><div class="col l12 waves-effect waves-light btn" style="width:200px;">
              <i class="material-icons left">account_circle</i>login / Register
            </div></a>

          </div>
        </center>
      </div>
    </div>

    <div class="" id="test">
      <nav>
        <div class="nav-wrapper">
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
          <img src="https://lorempixel.com/580/250/nature/1"> <!-- random image -->
          <div class="caption center-align">
            <h3>This is our big Tagline!</h3>
            <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
          </div>
        </li>
        <li>
          <img src="https://lorempixel.com/580/250/nature/2"> <!-- random image -->
          <div class="caption left-align">
            <h3>Left Aligned Caption</h3>
            <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
          </div>
        </li>
        <li>
          <img src="https://lorempixel.com/580/250/nature/3"> <!-- random image -->
          <div class="caption right-align">
            <h3>Right Aligned Caption</h3>
            <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
          </div>
        </li>
        <li>
          <img src="https://lorempixel.com/580/250/nature/4"> <!-- random image -->
          <div class="caption center-align">
            <h3>This is our big Tagline!</h3>
            <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
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
          <div class="card-panel grey lighten-5 z-depth-1">
            <div class="row valign-wrapper">
              <div class="">
                <img src="https://image.flaticon.com/teams/slug/freepik.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
              </div>
              <div class="">
                <span class="black-text">
                  This is a square image. .
                </span>
              </div>
            </div>
          </div>
        </div>
       </div>

       <div class="col l2 m6">
         <div class="">
           <div class="card-panel grey lighten-5 z-depth-1">
             <div class="row valign-wrapper">
               <div class="">
                 <img src="https://image.flaticon.com/teams/slug/freepik.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
               </div>
               <div class="">
                 <span class="black-text">
                   This is a square image. .
                 </span>
               </div>
             </div>
           </div>
         </div>
        </div>

        <div class="col l2 m6">
          <div class="">
            <div class="card-panel grey lighten-5 z-depth-1">
              <div class="row valign-wrapper">
                <div class="">
                  <img src="https://image.flaticon.com/teams/slug/freepik.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                </div>
                <div class="">
                  <span class="black-text">
                    This is a square image. .
                  </span>
                </div>
              </div>
            </div>
          </div>
         </div>

         <div class="col l2 m6">
           <div class="">
             <div class="card-panel grey lighten-5 z-depth-1">
               <div class="row valign-wrapper">
                 <div class="">
                   <img src="https://image.flaticon.com/teams/slug/freepik.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                 </div>
                 <div class="">
                   <span class="black-text">
                     This is a square image. .
                   </span>
                 </div>
               </div>
             </div>
           </div>
          </div>

          <div class="col l2 m6">
            <div class="">
              <div class="card-panel grey lighten-5 z-depth-1">
                <div class="row valign-wrapper">
                  <div class="">
                    <img src="https://image.flaticon.com/teams/slug/freepik.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                  </div>
                  <div class="">
                    <span class="black-text">
                      This is a square image. .
                    </span>
                  </div>
                </div>
              </div>
            </div>
           </div>

           <div class="col l2 m6">
             <div class="">
               <div class="card-panel grey lighten-5 z-depth-1">
                 <div class="row valign-wrapper">
                   <div class="">
                     <img src="https://image.flaticon.com/teams/slug/freepik.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                   </div>
                   <div class="">
                     <span class="black-text">
                       This is a square image. .
                     </span>
                   </div>
                 </div>
               </div>
             </div>
            </div>
        </div>

        <h2>Recommend</h2>

        <div class="content">
          <?php
            require 'html_php/content_html.php';
           ?>
        </div> <!--content END-->

  </body>
</html>
