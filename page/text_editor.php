<?php
include 'html_php/new_hearder.php';
//require 'html_php/navbar_html.php';
include 'php/config.php';
//session_start();
$username = $_SESSION['username'];
// echo $username;
//echo $username;
$product_id=isset($_GET['product_id']) ? $_GET['product_id'] : die('ERROR: Product ID not found.');
// echo $product_id;
$product_id = preg_replace('/[^\p{L}\p{N}\s]/u', '', $product_id);
$sql_count = $conn->query("SELECT * FROM comment WHERE question_id like '$product_id'");
$number_of_rows = $sql_count->rowCount();
$sql = $conn->query("SELECT * FROM question WHERE id = '$product_id'");
foreach ($sql as $row) {
  $title = $row['title'] ;
  $description = $row['description'];
  $ask_user = $row['username'];
}
?>
  <br>
  <div class="container">
    <div class="row">
      <div class="col l12 m12 s12">
        <div class="card-panel">
          <a href="question.php">Back to question</a>
          <h3><?php echo $title; ?></h3>
          <p><?php echo $description; ?></p>
          <br><br><br>
          <div class="row">
            <div class="col l3 m3 s3">
              <a class="waves-effect waves-light btn"><i class="material-icons left">people</i>Ask by: <?php echo $ask_user;?></a>
            </div>
            <!-- <div class="col l3 m3 s3">
              <a class="waves-effect waves-light btn"><i class="material-icons left">question_answer</i><?php echo $number_of_rows ?> answer(s)</a>
            </div> -->
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col l12 m12 s12">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>

        <form id="postForm" action="php/comment.php" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
          <input type="hidden" name="username" value="<?php echo $username; ?>">
          <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
          <textarea id="summernote" name="comment"></textarea>
          <center><button class="waves-effect waves-light btn" name="button" type="submit">submit</button></center>
        </form>
        </div>

        <script>
          $(document).ready(function() {
            $("#summernote").summernote({
              placeholder: 'Your comment',
                    height: 300,
                     callbacks: {
                    onImageUpload : function(files, editor, welEditable) {
                         for(var i = files.length - 1; i >= 0; i--) {
                                 sendFile(files[i], this);
                        }
                    }
                }
              });
          });
          function sendFile(file, el) {
            var form_data = new FormData();
            form_data.append('file', file);
            $.ajax({
                data: form_data,
                type: "POST",
                url: 'php/editor-upload.php',
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    $(el).summernote('editor.insertImage', 'php/'+url);
                }
            });
          }

          function postForm() {
            $('textarea[name="comment"]').html($('#summernote').code());
          }
        </script>
      </div>
    </div>
  </div>


<?php
  include 'html_php/footer.php'
?>
