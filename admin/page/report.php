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
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> <script type="text/javascript" src="js/materialize.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
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
    <script type="text/javascript">
    // clicking the edit button
    $(document).on('click', '.add_admin_b', function(){
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
    });

    // clicking the edit button
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
    </script>
    <main>
      <section class="content">
        <div class="page-announce valign-wrapper">
          <a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only">
            <i class="material-icons">menu</i></a><h1 class="page-announce-text valign" id="text_h1">Subscript details </h1>
         </div>

         <div class="">
           <?php
              require 'php/config.php';
              $code = $_GET['code'];
              $id = $_GET['id'];
              $txt = $_GET['txt'];
              $report_username = $_GET['report_username'];
              if($txt == "comment_id"){
                $sql = $conn->query("SELECT * FROM comment WHERE id = '$id'");
              }
              elseif ($txt == "recipe_comment_id") {
                $sql = $conn->query("SELECT * FROM comment_recipe WHERE id = '$id'");
                //echo "1";
              }
              else{
                $sql = $conn->query("SELECT * FROM question WHERE id = '$id'");
              }
              foreach ($sql as $row) {
                $username = $row['username'];
                //echo $username;
                $comment = $row['comment'];
                $comment_date = $row['comment_date'];
              }
            ?>
            <div class="row">
              <div class="col l12 m12 s12">
                <div class="card">
                  <div class="card-content">
                    <span class="card-title center">Situtation</span>
                      <div class="row">
                        <div class="col l12 m12 s12">
                          <div class="card">
                            <div class="card-content">
                              <div class="row">
                                <div class="col l3 m3 s12">
                                  <center><img src="php/img/user_icon.png" alt="" class="circle responsive-img " width="50%" >
                                    <p><?php echo $username ; ?></p>
                                  </center>
                                </div>
                                <div class="col l9 m9 s12">
                                  <?php echo $comment; ?>
                                  <br><br><br>
                                  <p class="right"><?php echo $comment_date; ?></p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="card-action center">
                    <h3 class="">Action</h3>
                    <a class="waves-effect waves-light btn red" href="#" onclick="delete_comment('<?php echo $id; ?>' , '<?php echo $txt ?>' , <?php echo $report_username; ?> , '<?php echo $code; ?>' , <?php echo $username; ?>)">Delete this comment and warning user</a>
                    <!-- <a href="#">This is a link</a> -->
                    <a class="waves-effect waves-light btn" href="#" onclick="not_problem_comment('<?php echo $id; ?>' , '<?php echo $txt ?>' , <?php echo $report_username; ?> , '<?php echo $code; ?>')">No problem</a>
                  </div>
                </div>
              </div>
            </div>
         </div>
      </section>
    </main>

    <script type="text/javascript">
      function delete_comment(a , b , c , d , e){
        //alert(c);
        var r = confirm("Confirm delete!");
        if (r == true) {
          $.ajax({
            type:"POST",
            url:"php/report.php",
            data: 'report_username=' + c +
                  '&id=' + a +
                  '&code=' + d +
                  '&username=' + e +
                  '&txt=' + b,
            success: function(data){
              if(data == 1){
                window.location.href = 'view_report.php';
                //alert(data);
              }
              else{
                //alert(data);
                alert("Got some problem! Please try again");
                location.reload();
              }
            }
          });
        } else {
        }
      }

      function not_problem_comment(a , b , c , d){
        var r = confirm("Is that ok!");
        if (r == true) {
          $.ajax({
            type:"POST",
            url:"php/report_ok.php",
            data: 'report_username=' + c +
                  '&id=' + a +
                  '&code=' + d +
                  '&txt=' + b,
            success: function(data){
              if(data == 1){
                window.location.href = 'view_report.php';
                //alert(data);
              }
              else{
                //alert(data);
                alert("Got some problem! Please try again");
                location.reload();
              }
            }
          });
        }

      }
    </script>
