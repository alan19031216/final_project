<?php
  $product_id=isset($_GET['product_id']) ? $_GET['product_id'] : die('ERROR: Product ID not found.');
  $a;
  $my_profile = isset($_GET['my_profile']) ? $a = "my_profile.php?city='My_question'" : $a ='question.php';
  // $product_id = $_GET['product_id'];
  // if($product_id == " " || $product_id = ''){
  //   $product_id = "Product ID not found";
  // }
  //echo $product_id;
  include 'php/config.php';
  $sql_count = $conn->query("SELECT * FROM comment WHERE question_id like '$product_id'");
  $number_of_rows = $sql_count->rowCount();
  $sql = $conn->query("SELECT * FROM question WHERE id = '$product_id'");
  foreach ($sql as $row) {
    $title = $row['title'] ;
    $description =$row['description'];
    $ask_user = $row['username'];
  }
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
     <link type="text/css" rel="stylesheet" href="css/style.css"  media="screen,projection"/>
     <link type="text/css" rel="stylesheet" href="css/style_bookshelf.css"  media="screen,projection"/>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="https://js.leapmotion.com/leap-0.6.4.js"></script>
     <!--rating-->
     <script src="js/rate.js"></script>
     <script type="text/javascript" src="js/modernizr.2.5.3.min.js"></script>
     <script type="text/javascript" src="js/materialize.min.js"></script>

     <script type="text/javascript" src="../script.js"></script>

   </head>
   <body>

     <nav>
       <div class="navbar-fixed orange">
       <!--  <a href="#!" class="brand-logo">Logo</a> -->
       <a href="../../final/" class="brand-logo">Let's Cook</a>
       <!--<a href="index.php"><img class="responsive-img brand-logo hide-on-small-only" src="img/logo.jpg" alt="" width="13%"></a>-->
       <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
         <ul class="right hide-on-med-and-down">
           <!-- <li><a href="sell.php">Book of recipe</a></li> -->
           <li><a href="../login_register/">Login/Register</a></li>
         </ul>
       </div>
     </nav>

     <!--Moblie slide bar-->
     <ul class="side-nav" id="mobile-demo">
       <center><li><a href="../final/" style="pointer-events: none;cursor: default;"><b style="color:red;font-size:30px">Lest's Cook</b></a></li> </center>
       <li><a href="../category.php"><i class="material-icons">featured_play_list</i>Category</a></li>
       <li><a href="../question.php"><i class="material-icons">question_answer</i>Question</a></li>
       <li><a href="../login_register/"><i class="material-icons">account_circle</i>Login/Register</a></li>
     </ul>

     <script type="text/javascript">
       $(document).ready(function(){
         // mobile slide
         $(".button-collapse").sideNav();
         // button dropdown
         $('.dropdown-trigger').dropdown();
       });
     </script>

 <br>
  <div class="container row">
    <div class="col l12">
      <div class="card-panel">
        <a href="../question.php">back to question</a>
        <h3><?php echo $title; ?></h3>
        <p><?php echo $description; ?></p>
        <br><br><br>
        <div class="row">
          <div class="col l3 m3 s3">
            <a class="waves-effect waves-light btn"><i class="material-icons left">people</i>Ask by: <?php echo $ask_user;?></a>
          </div>
          <div class="col l3 m3 s3">
            <a class="waves-effect waves-light btn"><i class="material-icons left">question_answer</i><?php echo $number_of_rows ?> answer(s)</a>
          </div>
          <div class="col l3 m3 s3 right">
          </div>
        </div>
        <br><br>

        <h5>Answer</h5>
        <hr>
        <br>
        <div class="" id="reload_answer_comment_row"></div>

        <div id="answer_comment_row">
        </div>

          <div class="row">
            <div class="comment">
              <div class="card" id="comment_row">
                <?php
                  //echo $username ;
                  $img = "";
                  $sql_comment= $conn->query("SELECT a.* , b.* FROM user as a LEFT JOIN comment as b ON a.username = b.username WHERE b.question_id = '$product_id' ORDER BY comment_date DESC");
                  $number_of_rows = $sql_comment->rowCount();
                  if($number_of_rows == 0){
                  ?>
                  <div class="col l12 m12 s12">
                    <div class="card blue-grey darken-1">
                      <div class="card-content white-text">
                        <span class="card-title">Dont has any related recipe</span>
                      </div>
                    </div>
                  </div>
                  <?php
                    }// if ($number_of_rows == 0)
                    else{
                      foreach ($sql_comment as $row_comment) {
                        $id = $row_comment['id'];
                        $img = $row_comment['img'];
                        if($img == "" || $img == " " || $img == "img/"){
                          $img = "img/user_icon.png";
                        }
                ?>

                <div class="card">
                  <div class="card-content">
                    <div class="row">
                      <div class="col l3 m3 s12">
                         <center><img src="<?php echo $img; ?>" alt="" class="circle responsive-img " width="50%" >
                           <p><?php echo $row_comment['username']; ?></p>
                         </center>
                      </div>
                      <div class="col l9 m9 s12">
                        <?php echo $row_comment['comment']; ?>
                        <br><br><br>
                        <p class="right"><?php echo $row_comment['comment_date']; ?></p>
                      </div>
                    </div>
                </div>
              </div>
                <?php
                  }
                  }
                 ?>
              </div><!-- comment_row -->
            </div> <!-- answer_comment_row -->
          </div>
        </div>
      </div>
    </div>
  </div>
