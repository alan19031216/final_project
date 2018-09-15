<?php
  $product_id=isset($_GET['product_id']) ? $_GET['product_id'] : die('ERROR: Product ID not found.');
  $a;
  $my_profile = isset($_GET['my_profile']) ? $a = "my_profile.php?city='My_question'" : $a ='question.php';
  // $product_id = $_GET['product_id'];
  // if($product_id == " " || $product_id = ''){
  //   $product_id = "Product ID not found";
  // }
  //echo $product_id;
  include '../html_php/header.php';
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
                 ?>
              </div><!-- comment_row -->
            </div> <!-- answer_comment_row -->
          </div>
        </div>
      </div>
    </div>
  </div>
