<?php
session_start();
$username = $_SESSION['username'];
if($username == '' || $username == ' '){
  echo '<script language="javascript">';
  echo 'alert("Please login!!")';
  echo '</script>';
  header( "refresh:0.1; url= ../login.php" );
}
//$url = new url_rewriter('example/');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Control Panel</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/jquery_animateNumber.min.js"></script>
    <link href="../css/custom.css" rel="stylesheet" type="text/css" />
  </head>

  <body>

    <ul id="slide-out" class="side-nav fixed z-depth-4">
      <li>
        <div class="userView">
          <div class="background">
            <img src="img/background.jpg">
          </div>
          <a href="#!user"><img class="circle" src="php/img/admin_icon.png"></a>
          <a href="#!name"><span class="white-text name">Welcome back, <?php echo $username ?></span></a>
        </div>
      </li>

      <li>
        <form class="sidebar-form">
          <div class="input-group">
            <input id="accounts" type="text" name="username" class="form-control" placeholder="Universal Search" autocomplete="off" />
          </div>
        </form>
      </li>

      <li><a class="active" href="home.php"><i class="material-icons pink-item">dashboard</i>Dashboard</a></li>
      <li><div class="divider"></div></li>
      <li><a class="subheader">Management</a></li>
      <li><a href="#" class="add_admin_b"><i class="material-icons pink-item">person_add</i>Add Admin</a></li>
      <li><a href="#" class="pull_book"><i class="material-icons pink-item">file_upload</i>Pull book</a></li>
      <li><a href="#" class="request"><i class="material-icons pink-item">gavel</i>Request</a></li>
      <li><a href="view_report.php" class="view_report"><i class="material-icons pink-item">report_problem</i>View report</a></li>
      <li><a href="logout.php"><i class="material-icons pink-item">remove_circle_outline</i>Logout</a></li>
    </ul>

    <?php
      $username = $_SESSION['username'];
      //echo $username;
      require 'php/config.php';
      $sql_check_admin = $conn->query("SELECT * FROM admin WHERE username = 'admin'");
      $count = $sql_check_admin->rowCount();
      //echo $count;
      $type_of_admin = "";
      foreach ($sql_check_admin as $row_check) {
        $type_of_admin = $row_check['type_of_admin'];
      }
      //echo $type_of_admin;
     ?>
    <script type="text/javascript">
    // clicking the edit button
    $(document).on('click', '.add_admin_b', function(){
      var type_of_admin = '<?php echo $type_of_admin; ?>';
      //alert(type_of_admin);
      if(type_of_admin == 's'){
        $("#text_h1").text("Add Admin");
        // hide create product button
        $('#content_up').hide();
        $('#content_down').hide();

        // fade out effect first
        $('#page-content').fadeOut('slow', function(){
            $('#page-content').load('add_admin.php', function(){
                // fade in effect
                $('#page-content').fadeIn('slow');
            });
        });
       }
      else{
        alert("You do not have permission!");
      }
    });


    $(document).on('click', '.pull_book', function(){
      $("#text_h1").text("Pull book");
      // hide create product button
      $('#content_up').hide();
      $('#content_down').hide();

      // fade out effect first
      $('#page-content').fadeOut('slow', function(){
          $('#page-content').load('pull_book.php', function(){
              // fade in effect
              $('#page-content').fadeIn('slow');
          });
      });
    });

    $(document).on('click', '.request', function(){
      $("#text_h1").text("User request");
      // hide create product button
      $('#content_up').hide();
      $('#content_down').hide();

      // fade out effect first
      $('#page-content').fadeOut('slow', function(){
          $('#page-content').load('request.php', function(){
              // fade in effect
              $('#page-content').fadeIn('slow');
          });
      });
    });
    </script>
    <main>
    <section class="content">
      <div class="page-announce valign-wrapper">
        <a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only">
          <i class="material-icons">menu</i></a><h1 class="page-announce-text valign" id="text_h1">Admin Dashboard </h1>
       </div>
       <div class="" id="page-content"></div>
      <!-- Stat Boxes -->
      <div class="row" id="content_up">
        <div class="col l3 s6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php
                include '../php/config.php';
                $sql_count_user = $conn->query("SELECT * FROM user");
                $count_user = $sql_count_user->rowCount();
               ?>
              <h3 id="lines_1">0</h3>
              <p>Accounts</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer " class="animsition-link">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
          </div><!-- ./col -->
          <div class="col l3 s6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <?php
                  $sql_recipe = $conn->query("SELECT * FROM recipe");
                  $count_recipe = $sql_recipe->rowCount();
                 ?>
                <h3 id="lines_2">0</h3>
                <p>Recipe</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="recipe_table.php" class="small-box-footer" class="animsition-link">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
            </div><!-- ./col -->
            <div class="col l3 s6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <?php
                    $sql_subscript = $conn->query("SELECT * FROM subscript");
                    $count_subscrpt = $sql_subscript->rowCount();
                   ?>
                  <h3 id="lines_3">0</h3>
                  <p>Subscription</p>
                </div>
                <div class="icon">
                  <i class="ion ion-email"></i>
                </div>
                <a href="subsript_table.php" class="small-box-footer" class="animsition-link">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>

              </div><!-- ./col -->
              <div class="col l3 s6">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <?php
                      $stmt = $conn->query("select * from pageview ");
                      $countRow1 = $stmt->rowCount();
                    ?>
                    <h3 id="lines_4">0</h3>
                    <p>Unique Visitors</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="https://analytics.google.com/analytics/web/#/report-home/a121742810w179727389p177974611" class="small-box-footer" class="animsition-link">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <script type="text/javascript">
                $('#lines_1').animateNumber({ number: <?php echo $count_user; ?> });
                $('#lines_2').animateNumber({ number: <?php echo $count_recipe; ?> });
                $('#lines_3').animateNumber({ number: <?php echo $count_subscrpt; ?> });
                $('#lines_4').animateNumber({ number: <?php echo $countRow1; ?> });
              </script>
          </div>

          <div class="row" id="content_down">
            <div class="col l6 m6">
              <br>
              <button data-target="modal1" class=" waves-effect waves-light red btn modal-trigger" style="width:100%;">To do list +</button>
              <br><br>
              <div class="first_table" id="first_table">
                <?php
                //require 'php/config.php';
                $username = $_SESSION['username'];
                $sql = $conn->query("SELECT * FROM todolist WHERE username = '$username'");
                $sql_count = $sql->rowCount();
                if($sql_count == 0){
                  print "<h5 class='center'>You haven't add any task yet</h5>";
                }else{
                ?>
                <table class="striped">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Task</th>
                      <th>Complete / Delete</th>
                    </tr>
                  </thead>

                <?php

                  $count = 1;
                  foreach ($sql as $row) {
                    $id = $row['id'];
                ?>

                  <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo $row['task']; ?></td>
                    <td><a onclick="delete1(<?php echo $id; ?>)"><i class="material-icons">all_inclusive</i></a></td>
                  </tr>
                <?php
                } // foreach
                }// else
                 ?>
                </table>
              </div>
              <div class="second_table" id="second_table"></div>


            </div>
            <script type="text/javascript">
            $(document).ready(function(){
              $('.modal').modal();
            });
            </script>
            <div id="modal1" class="modal bottom-sheet">
              <div class="modal-content">
                <h4 class="center">Add task</h4>
                <div class="input-field col l12">
                  <input type="hidden" id="username" value="<?php echo $_SESSION['username']; ?>">
                  <input id="task" type="text" class="validate">
                  <label for="last_name">Task</label>
                </div>
              </div>
              <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat" onclick="add_task()">Add</a>
              </div>
            </div>

            <script type="text/javascript">
              function add_task(){
                var username = document.getElementById('username').value;
                var task = document.getElementById('task').value;
                // alert(username);
                if (username != '' || username != 'root') {
                  $.ajax({
                    type:"POST",
                    url:"php/add_task.php",
                    data: 'username=' + username +
                          '&task=' + task,
                    success: function(data){
                      if(data == 1){
                        //alert(data);
                        $('#first_table').hide();
                        $('#second_table').hide();
                        $('#second_table').load('todolist_table.php?username=' + username, function(){
                           // hide loader image
                           //$('#loader-image').hide();

                           // fade in effect
                           $('#second_table').fadeIn('slow');
                       });
                      }
                      else{
                        alert(data);
                        // alert("Got some problem! Please try again");
                        // location.reload();
                      }
                    }
                 });
                }
              }

              function delete1(a){
                var username = document.getElementById('username').value;
                var r = confirm("Delete you want to delete this task!");
                  if (r == true) {
                    $.ajax({
                      type:"POST",
                      url:"php/delete_task.php",
                      data: 'id=' + a,
                      success: function(data){
                        if(data == 1){
                          //alert(data);
                          $('#first_table').hide();
                          $('#second_table').hide();
                          $('#second_table').load('todolist_table.php?username=' + username, function(){
                             // hide loader image
                             //$('#loader-image').hide();

                             // fade in effect
                             $('#second_table').fadeIn('slow');
                         });
                        }
                        else{
                          alert(data);
                          // alert("Got some problem! Please try again");
                          // location.reload();
                        }
                      }
                   });
                  }
              }
            </script>
            <div class="col l6 m6">
              <?php
                  require 'calendar.html';
               ?>
            </div>
          </div>
        </section>
        </main>
        <footer class="page-footer">
          <div class="footer-copyright">
            <div class="container">

            </div>
          </div>
        </footer>

        <!-- So this is basically a hack, until I come up with a better solution. autocomplete is overridden
        in the materialize js file & I don't want that.
        -->
        <!-- Yo dawg, I heard you like hacks. So I hacked your hack. (moved the sidenav js up so it actually works) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
        <script>
        // Hide sideNav
        $('.button-collapse').sideNav({
        menuWidth: 300, // Default is 300
        edge: 'left', // Choose the horizontal origin
        closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
          draggable: true // Choose whether you can drag to open on touch screens
          });
          $('select').material_select();
          $('.collapsible').collapsible();
          </script>

          <div class="fixed-action-btn horizontal tooltipped" data-position="top" dattooltipped" data-position="top" data-delay="50" data-tooltip="Quick Links">
            <a class="btn-floating btn-large red">
              <i class="large material-icons">mode_edit</i>
            </a>
            <ul>
              <li><a class="btn-floating red tooltipped" data-position="top" data-delay="50" data-tooltip="Handbook" href="#"><i class="material-icons">insert_chart</i></a></li>
              <li><a class="btn-floating yellow darken-1 tooltipped" data-position="top" data-delay="50" data-tooltip="Staff Applications" href="#"><i class="material-icons">format_quote</i></a></li>
              <li><a class="btn-floating green tooltipped" data-position="top" data-delay="50" data-tooltip="Name Guidelines" href="#"><i class="material-icons">publish</i></a></li>"
              <li><a class="btn-floating blue tooltipped" data-position="top" data-delay="50" data-tooltip="Issue Tracker" href="#"><i class="material-icons">attach_file</i></a></li>
              <li><a class="btn-floating orange tooltipped" data-position="top" data-delay="50" data-tooltip="Support" href="#"><i class="material-icons">person</i></a></li>
            </ul>
          </div>
        </div>
      </body>
    </html>
