<h2 class="center-align">Write a Comment</h2>
<div class="row" >
   <div class="col s12" id="comment">
     <form id="create-product-form" action="#" method="post">
       <div class="input-field col s12 z-depth-1">
         <input type="hidden" name="code" value="<?php echo $_GET['code']; ?>">
         <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
        <textarea id="textarea1" class="materialize-textarea" data-length="10" name="textarea1"></textarea>
        <label for="textarea1">Write your comment</label>
        <button class="waves-effect waves-light btn center" type="submit">Post</button>
      </form>
    </div>
   </div>

   <script type="text/javascript">
   $(document).ready(function() {
     $('textarea#textarea1').characterCounter();
    });

    $(document).on('submit', '#create-product-form', function() {
      //alert("a");
    // show a loader img
    //$('#loader-image').show();
    // post the data from the form
    $.post("php/comment_textarea.php", $(this).serialize())
        .done(function(data) {
          //alert(data);
          $('#page-content').fadeOut('slow', function(){
              $('#page-content').load('html_php/load_newComment.php?code=<?php echo $_GET['code']; ?>', function(){

                  // hide loader image
                  $('#first').hide();
                  $('#comment').hide();
                  alert("Post Successfully");
                  // fade in effect
                  $('#page-content').fadeIn('slow');
              });
          });

        });

    return false;
    });
   </script>

   <div id="first">
     <?php
     $name_history = $_SESSION['username'];
     $code_comment = $_GET['code'];
     $select_comment = $conn->query("SELECT a.* , b.* FROM user a LEFT JOIN comment b on a.username = b.username WHERE b.code = '$code_comment' ORDER BY b.date DESC");
     foreach ($select_comment as $row_comment) {
       $image = $row_comment['img'];
       if($image == "" || $image == " " || $image == "img/"){
         $image = "img/user_icon.png";
       }
      ?>
     <div class="col s12">
       <div class="card-panel grey lighten-5 z-depth-1">
         <div class="row valign-wrapper">
           <div class="col s2 center-align">
             <img src="<?php echo $image ?>" alt="" class="circle responsive-img" style="width:50%;height:50%;"> <!-- notice the "circle" class -->
             <p class=""><?php echo $row_comment['username']; ?></p>
           </div>
           <div class="col s10">
             <span class="black-text">
               <?php echo $row_comment['comment']; ?>
             </span>

           </div>
         </div>
          <p class="right"><?php echo $row_comment['date']; ?></p>
       </div>
     </div>
     <?php
        }
      ?>
    </div>

    <div id='page-content'></div>
</div>
