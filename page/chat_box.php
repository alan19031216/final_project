<?php
  session_start();
  $message_code = $_GET['message_code'];
  $receiver = $_GET['receiver'];
  $sender = $_GET['sender'];
 ?>
<div class="chatbox" style="">
  <script type="text/javascript">
    $('.chatbox').scrollTop($('.chatbox')[0].scrollHeight);
  </script>
  <?php
    $username_message = $_SESSION['username'];
    //echo $username_message;
    require 'php/config.php';

    $sql = $conn->query("SELECT * FROM chat WHERE message_code = '$message_code'");
    foreach ($sql as $row) {
      $right = '';
      $color = '';
      $css = '';
      if($row['sender'] == $username_message){
        $right = 'right-align';
        $name = $row['sender'];
        $color = 'green';
        $css = 'darker';
      }
      else{
        $name = $row['sender'];
        $color = 'blue';
      }
  ?>

  <div class="col l12 m12 s12 <?php echo  $right?> containers <?php echo $css; ?>">
    <h5 style="color:<?php echo $color; ?>"><?php echo $name ?></h5>
    <?php echo $row['textarea_message']; ?> <br>
    <?php echo $row['chat_date']; ?>
  </div>

  <?php
    } // foreach
   ?>
</div>
