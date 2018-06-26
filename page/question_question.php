<?php
  $product_id=isset($_GET['product_id']) ? $_GET['product_id'] : die('ERROR: Product ID not found.');
  $username=isset($_GET['username']) ? $_GET['username'] : die('ERROR: user not found.');
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

 <br>
  <div class="row">
    <div class="col l12">
      <div class="card-panel">
        <a href="<?php echo $a; ?>">back to question</a>
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
            <a class="waves-effect waves-light btn right red" onclick="report_question(<?php echo $product_id; ?>)"><i class="material-icons left">report_problem</i>Report</a>
          </div>
        </div>
        <br><br>

        <!-- **************************************modal 1 ********************************************** -->
        <script type="text/javascript">
          function report_question(a){
            var id = a;
            $('#modal1_question').modal('open');
          }

          $(document).on('click', '.modal1_question_submit', function(){
            var modal1_question_check1 = document.getElementById('modal1_question_check1').checked;
            var modal1_question_check2 = document.getElementById('modal1_question_check2').checked;
            var modal1_question_check3 = document.getElementById('modal1_question_check3').checked;
            var modal1_question_check4 = document.getElementById('modal1_question_check4').checked;
            var username = document.getElementById('modal1_question_username').value;
            var modal1_question_TA = document.getElementById('modal1_question_TA').value;
            var product_id = document.getElementById('modal1_question_product_id').value;
            var check = new Array();
            var count_check = 0;
            if(modal1_question_check1 == false && modal1_question_check2 == false && modal1_question_check3 == false && modal1_question_check1 == false){
              alert("At least select one");
            }
            else{
              if(modal1_question_check1 == true){
                check[count_check++] = document.getElementById('modal1_question_check1').value;
              }
              if(modal1_question_check2 == true){
                check[count_check++] = document.getElementById('modal1_question_check2').value;
              }
              if(modal1_question_check3 == true){
                check[count_check++] = document.getElementById('modal1_question_check3').value;
              }
              if(modal1_question_check4 == true){
                check[count_check++] = document.getElementById('modal1_question_check4').value;
              }

              $.ajax({
                type:"POST",
                url:"php/modal1_report.php",
                data: 'username=' + username +
                      '&modal1_question_TA=' + modal1_question_TA +
                      '&check=' + check +
                      '&product_id=' + product_id,
                success: function(data){
                  if(data == 1){
                    alert('Report successful');
                    $('#modal1_question').modal('close');
                  }
                  else {
                    alert("Got some problem");
                    location.reload();
                  }
                }
              });
            }
          });
        </script>

        <div id="modal1_question" class="modal modal-fixed-footer">
          <h2 class="center">Report a question</h2>
          <hr>
          <div class="row" style="padding:15px;">
            <div class="col l3 m3 s6">
              <input type="hidden" id="modal1_question_username" value="<?php echo $_GET['username']; ?>">
              <input type="hidden" id="modal1_question_product_id" value="<?php echo $_GET['product_id']; ?>">
              <input type="checkbox" id="modal1_question_check1" value="Got a problems or garbled characters">
              <label for="modal1_question_check1">Got a problems or garbled characters</label>
            </div>
            <div class="col l3 m3 s6">
              <input type="checkbox" id="modal1_question_check2" value="Use inappropriate publication and language"/>
              <label for="modal1_question_check2">Use inappropriate publication and language</label>
            </div>
            <div class="col l3 m3 s6">
              <input type="checkbox" id="modal1_question_check3" value="3"/>
              <label for="modal1_question_check3">Red</label>
            </div>
            <div class="col l3 m3 s6">
              <input type="checkbox" id="modal1_question_check4" value="4"/>
              <label for="modal1_question_check4">Red</label>
            </div>

            <div class="input-field col s12">
              <textarea id="modal1_question_TA" class="materialize-textarea"></textarea>
              <label for="modal1_question_TA">Other</label>
              <br><br>
              <center>
                <button class="modal1_question_submit waves-effect waves-light btn" type="button" name="button">Submit</button>
              </center>
            </div>
          </div>
        </div>

        <script type="text/javascript">
          $(document).ready(function(){
            $('#modal1_question_TA').val();
            $('#modal2_question_TA').val();
            // mobile slide
            //$(".button-collapse").sideNav();
            $('.modal').modal();
            //$('#modal1').modal('open');
          });
        </script>

        <div class="">
          <h5>Answer</h5>
          <hr>
          <br>

          <div class="" id="reload_answer_comment_row"></div>

          <div class="row" id="answer_comment_row">
            <input type="hidden" id="product_id_TA" value="<?php echo $_GET['product_id']; ?>">
            <input type="hidden" id="username_comment" name="" value="<?php echo $_GET['username']; ?>">
            <?php
              include 'html_php/comment_row.php';
             ?>

          <script type="text/javascript">
            function submit_comment(){
              var product_id_TA = document.getElementById("product_id_TA").value;
              var username_comment = document.getElementById("username_comment").value;
              var comment_TA = document.getElementById("comment_TA").value;
              if(comment_TA.length < 5){
                alert("At least five words");
                return false;
              }
             else{
               $.ajax({
                 type:"POST",
                 url:"php/comment.php",
                 data: 'username=' + username_comment +
                       '&product_id=' + product_id_TA +
                       '&comment=' + comment_TA,
                 success: function(data){
                   if(data == 1){
                     $('#answer_comment_row').hide();
                     $('#reload_answer_comment_row').load('reload_answer_comment_row.php?product_id=' + product_id_TA, function(){
                        // hide loader image
                        //$('#loader-image').hide();

                        // fade in effect
                        $('#reload_answer_comment_row').fadeIn('slow');
                    });
                     //alert(data);
                   }
                   else{
                     alert("Got some problem! Please try again");
                     location.reload();
                   }
                 }
               });
                //alert("A");
              }
            }
          </script>
          </div>

          <div class="row">
            <div class="comment">
              <div class="card" id="comment_row">
                <?php
                  //echo $username ;
                  $img = "";
                  $sql_comment= $conn->query("SELECT a.* , b.* FROM user as a LEFT JOIN comment as b ON a.username = b.username WHERE b.question_id = '$product_id' ORDER BY date DESC");

                  foreach ($sql_comment as $row_comment) {
                    $id = $row_comment['id'];
                    $img = $row_comment['img'];
                    if($img == "" || $img == " " || $img == "img/"){
                      $img = "img/user_icon.png";

                    }
                    $sql_lik = $conn->query("SELECT * FROM liked WHERE comment_id = '$id'")->rowCount();
                    $like = '';
                    if($sql_lik == 0){
                      $like = 'Like';
                      $like_color = 'white';
                    }
                    else{
                      $like = 'Liked';
                      $like_color = 'black';
                    }
                ?>

                <div class="card">
                  <div class="card-content">
                    <div class="row">
                      <div class="col l3 m3 s12">
                         <center><img src="php/<?php echo $img; ?>" alt="" class="circle responsive-img " width="50%" >
                           <p><?php echo $row_comment['username']; ?></p>
                         </center>
                      </div>
                      <div class="col l9 m9 s12">
                        <?php echo $row_comment['comment']; ?>
                        <br><br><br>
                        <p class="right"><?php echo $row_comment['date']; ?></p>
                      </div>
                      <div class="col l12 m12 s12">
                        <a class="waves-effect waves-light btn red right" onclick="report_comment('<?php echo $row_comment['id']; ?>')"><i class="material-icons left">flag</i>Report</a>
                        <a class="right" href="#" style="visibility:hidden">daas</a>
                        <a class="waves-effect waves-light btn right" id="like_comment_<?php echo $row_comment['id']; ?>" onclick="like_comment('<?php echo $row_comment['id']; ?>')" >  <i class="material-icons left" style='color:<?php echo $like_color; ?>'>thumb_up</i><?php echo $like; ?></a>
                      </div>
                    </div>
                </div>
              </div>
                <?php
                  }
                 ?>
              </div><!-- comment_row -->

              <script type="text/javascript">
                function like_comment(a){
                  var username = document.getElementById('modal2_question_username').value;
                  $.ajax({
                    type:"POST",
                    url:"php/like_comment.php",
                    data: 'username=' + username +
                          '&id=' + a,
                    success: function(data){
                      if(data == 1){
                        document.getElementById("like_comment_"+a).innerHTML = "<i class='material-icons left' style='color:black'>thumb_up</i>Liked";
                        //alert(data);
                      }
                      else if (data == 3) {
                        document.getElementById("like_comment_"+a).innerHTML = "<i class='material-icons left'>thumb_up</i>Like";
                      }
                      else {
                        //alert(data);
                        alert("Got some problem");
                        location.reload();
                      }
                    }
                  });
                }
              </script>
              <!-- **************************************modal 2 ********************************************** -->
              <script type="text/javascript">
                var id;
                function report_comment(a){
                  id = a;
                  //alert(a);
                  $('#modal2_question').modal('open');
                }

                $(document).on('click', '.modal2_question_submit', function(){
                  var modal2_question_check1 = document.getElementById('modal2_question_check1').checked;
                  var modal2_question_check2 = document.getElementById('modal2_question_check2').checked;
                  var modal2_question_check3 = document.getElementById('modal2_question_check3').checked;
                  var modal2_question_check4 = document.getElementById('modal2_question_check4').checked;
                  var username = document.getElementById('modal2_question_username').value;
                  var modal2_question_TA = document.getElementById('modal2_question_TA').value;
                  var modal2_check = new Array();
                  var modal2_count_check = 0;
                  if(modal2_question_check1 == false && modal2_question_check2 == false && modal2_question_check3 == false && modal2_question_check1 == false){
                    alert("At least select one");
                  }
                  else{
                    if(modal2_question_check1 == true){
                      modal2_check[modal2_count_check++] = document.getElementById('modal2_question_check1').value;
                    }
                    if(modal2_question_check2 == true){
                      modal2_check[modal2_count_check++] = document.getElementById('modal2_question_check2').value;
                    }
                    if(modal2_question_check3 == true){
                      modal2_check[modal2_count_check++] = document.getElementById('modal2_question_check3').value;
                    }
                    if(modal2_question_check4 == true){
                      modal2_check[modal2_count_check++] = document.getElementById('modal2_question_check4').value;
                    }

                    $.ajax({
                      type:"POST",
                      url:"php/modal2_report.php",
                      data: 'username=' + username +
                            '&modal2_question_TA=' + modal2_question_TA +
                            '&modal2_check=' + modal2_check +
                            '&id=' + id,
                      success: function(data){
                        if(data == 1){
                          alert('Report successful');
                          $('#modal2_question').modal('close');
                        }
                        else {
                          alert("Got some problem");
                          location.reload();
                        }
                      }
                    });
                  }
                });
              </script>

              <div id="modal2_question" class="modal modal-fixed-footer">
                <h2 class="center">Report a Comment</h2>
                <hr>
                <div class="row" style="padding:15px;">
                  <div class="col l3 m3 s6">
                    <input type="hidden" id="modal2_question_username" value="<?php echo $_GET['username']; ?>">
                    <input type="checkbox" id="modal2_question_check1" value="Got a problems or garbled characters">
                    <label for="modal2_question_check1">Got a problems or garbled characters</label>
                  </div>
                  <div class="col l3 m3 s6">
                    <input type="checkbox" id="modal2_question_check2" value="Use inappropriate publication and language"/>
                    <label for="modal2_question_check2">Use inappropriate publication and language</label>
                  </div>
                  <div class="col l3 m3 s6">
                    <input type="checkbox" id="modal2_question_check3" value="3"/>
                    <label for="modal2_question_check3">Red</label>
                  </div>
                  <div class="col l3 m3 s6">
                    <input type="checkbox" id="modal2_question_check4" value="4"/>
                    <label for="modal2_question_check4">Red</label>
                  </div>

                  <div class="input-field col s12">
                    <textarea id="modal2_question_TA" class="materialize-textarea"></textarea>
                    <label for="modal2_question_TA">Other</label>
                    <br><br>
                    <center>
                      <button class="modal2_question_submit waves-effect waves-light btn" type="button" name="button">Submit</button>
                    </center>
                  </div>
                </div>
              </div><!-- modal2_question-->
          </div> <!-- answer_comment_row -->
          </div>
        </div>
      </div>
    </div>
  </div>
