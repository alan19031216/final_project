<?php
include 'php/config.php';
$product_id=isset($_GET['product_id']) ? $_GET['product_id'] : die('ERROR: Product ID not found.');
 ?>
 <div class="row" id="answer_comment_row">
   <div class="col l12 m12 s12" id="comment_row">

      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">You already write a comment</span>
        </div>

       <!-- <form class="" method="post">
         <input type="hidden" id="product_id_TA" value="<?php echo $_GET['product_id']; ?>">
         <input type="hidden" id="username_comment" name="" value="<?php echo $_GET['username']; ?>">
         <label for="textarea1">Comment</label>
         <textarea required class="browser-default" placeholder="Write your comment" name="description" id="comment_TA" class="materialize-textarea" style="width: 100%;height: 100px;padding: 12px 20px;margin: 8px 0;box-sizing: border-box;"></textarea>
         <a class="waves-effect waves-light btn" id="" onclick="submit_comment()">button</a>
       </form> -->
     </div>
   </div><!-- comment_row -->

   <div  class="col l12 m12 s12" id="show_all_comment">
     <br><br>
     <?php
       $results3 = (" category as b on a.Categoryid = b.id");
       $sql_show_all_comment = $conn->query("SELECT a.* , b.* FROM user as a LEFT JOIN comment as b
         ON a.username = b.username WHERE b.question_id = '$product_id' ORDER BY comment_date DESC");
       foreach ($sql_show_all_comment as $row_sql_show_all_comment) {
         $img = $row_sql_show_all_comment['img'];
         if($img == "" || $img == " " || $img == "img/"){
           $img = "img/user_icon.png";
         }
         $sql_lik = $conn->query("SELECT * FROM liked WHERE comment_id = '$product_id'")->rowCount();
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
                <center>
                  <img src="<?php echo $img; ?>" alt="" class="circle responsive-img " width="50%">
                  <p><?php echo $row_sql_show_all_comment['username']; ?></p>
                </center>
             </div>
             <div class="col l9 m9 s12">
               <p><?php echo $row_sql_show_all_comment['comment']; ?></p>
               <br><br><br>
               <p class="right"><?php echo $row_sql_show_all_comment['comment_date']; ?></p>
             </div>
             <div class="col l12 m12 s12">
               <a class="waves-effect waves-light btn red right" onclick="report_comment1('<?php echo $row_sql_show_all_comment['id']; ?>')"><i class="material-icons left">flag</i>Report</a>
               <a class="right" href="#" style="visibility:hidden">daas</a>
               <a class="waves-effect waves-light btn right" id="like_comment_<?php echo $row_sql_show_all_comment['id']; ?>" onclick="like_comment('<?php echo $row_sql_show_all_comment['id']; ?>')" >  <i class="material-icons left" style='color:<?php echo $like_color; ?>'>thumb_up</i><?php echo $like; ?></a>
              </div>
           </div>
         </div>
       </div>
     <?php
       }
      ?>
    </div> <!-- show_all_comment -->
 </div> <!-- answer_comment_row -->
