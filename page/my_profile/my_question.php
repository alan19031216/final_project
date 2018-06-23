<h3 class="center">My question</h3>
<div class="" id="page-content"></div>
<?php
  $username = $_SESSION['username'];
  $sql_my_question = $conn->query("SELECT * FROM question WHERE username = '$username'");
  $count_my_question = $sql_my_question->rowCount();
  if ($count_my_question == 0) {
    echo "<h3>You haven't ask any question yet</h3>";
  }
  else {
    foreach ($sql_my_question as $row_my_question) {
      $date = strtotime("now");
      $ask_time = $row_my_question['ask_time'];
      $date1 = strtotime("$ask_time");
      $t = floor(($date-$date1)/86400);
      //echo $t;
      if($t == 0){
        $t = "Today";
      }
      else if($t == 1){
        $t = $t." day ago";
      }
      else if($t > 1){
        $t = $t." days ago";
      }
      else if( $t > 31){
        $t = date('d-m-y h:i', $date1);
      }
?>
<a class="edit-btn">
  <div class="col l12 m12 s12">
    <div class="card-panel">
      <h3 class="center"><?php echo $row_my_question['title']; ?></h3>
      <td >
      <div class='product-id display-none' hidden><?php echo $row_my_question['id']; ?></div>
      </td>
      <span class="more">
      <?php echo $row_my_question['description']; ?>
      </span>
      <br><br>
      <div class="row">
        <div class="col l4 m4 s4">
        Ask by: <?php echo $row_my_question['username']; ?>
        </div>
        <div class="col l4 m4 s4">
        <?php echo $count_my_question; ?> answer(s)
        </div>
        <div class="col l4 m4 s4 right-align">
        Date: <?php echo $t; ?>
        </div>
      </div>
    </div>
  </div>
</a>
<?php
    }
  }// else
 ?>

 <script type="text/javascript">
 // clicking the edit button
 $(document).on('click', '.edit-btn', function(){

   // change page title
   //changePageTitle('Update Product');

   // var product_id = $(this).closest('td').find('.product-id').text();
   var product_id = $(this).find('.product-id').text();
   //alert(product_id);

   // show a loader image
   //$('#loader-image').show();

   // hide create product button
   $('#row_card').hide();

   // fade out effect first
   $('#page-content').fadeOut('slow', function(){
       $('#page-content').load('question_question.php?product_id=' + product_id + '&username=' + <?php echo $_SESSION['username']; ?> + '&my_profile=1', function(){
       //$('#page-content').load('question_question.php', function(){
           // hide loader image
           //$('#loader-image').hide();

           // fade in effect
           $('#page-content').fadeIn('slow');
       });
   });
 });
 </script>
