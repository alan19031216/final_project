<?php
  session_start();
$message_code=isset($_GET['message_code']) ? $_GET['message_code'] : die('ERROR: message_code not found.');
$sender=isset($_GET['sender']) ? $_GET['sender'] : die('ERROR: sender not found.');
$receiver=isset($_GET['receiver']) ? $_GET['receiver'] : die('ERROR: receiver not found.');

 //echo $message_code;
 ?>
 <style>
 div .chatbox {
     border: 1px solid black;
     width: 100%;
     height: 300px;
     /* padding-left:10px;
     padding-right:10px; */
     overflow: scroll;
 }
 </style>
<div class="container row">
  <div class="new_chatbox" id="new_chatbox"></div>
  <div class="chatbox card" style="" id="chatbox">
    <?php
      $username_message = $_SESSION['username'];
      //echo $username_message;
      require 'php/config.php';

      $sql = $conn->query("SELECT * FROM chat WHERE message_code = '$message_code'");
      foreach ($sql as $row) {
        $right = '';
        $color = '';
        if($row['sender'] == $username_message){
          $right = 'right-align';
          $name = $row['sender'];
          $color = 'green';
        }
        else{
          $name = $row['sender'];
          $color = 'blue';
        }
    ?>

    <div class="col l12 <?php echo  $right?>">
      <h5 style="color:<?php echo $color; ?>"><?php echo $name ?></h5>
      <?php echo $row['textarea_message']; ?> <br>
      <?php echo $row['chat_date']; ?>
    </div>

    <?php
      } // foreach
     ?>
  </div>
</div>

<input type="hidden" id="message_code" value="<?php echo $message_code; ?>">
<input type="hidden" id="sender" value="<?php echo $receiver; ?>">
<input type="hidden" id="receiver" value="<?php echo $sender; ?>">
<div class="row">
  <div class="col l12">
    <div class="card blue-grey darken-1">
      <div class="card-content white-text">
        <span class="card-title">Send message</span>
        <br>
        <textarea id="textarea_message" class="materialize-textarea"></textarea>
        <br>
        <button class="waves-effect waves-green btn" type="button" name="button" onclick="send_message()"><i class="material-icons right">send</i>send</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#textarea_message').val('');
  });

  function send_message(){
    //alert("a");
    var message_code = document.getElementById('message_code').value;
    var sender = document.getElementById('sender').value;
    var receiver = document.getElementById('receiver').value;
    var textarea_message = document.getElementById('textarea_message').value;
    if(textarea_message == "" || textarea_message == " "){
      alert("cannot be empty");
    }
    else{
      $.ajax({
        type:"POST",
        url:"php/send_message.php",
        data: 'sender=' + sender +
              '&receiver=' + receiver +
              '&textarea_message=' + textarea_message +
              '&message_code=' + message_code ,
        success: function(data){
          if(data == 1){
            $('#textarea_message').val('');
            $("#chatbox").hide();
            $('#new_chatbox').load('chat_box.php?message_code=' + message_code + '&sender=' + sender + '&receiver=' + receiver, function(){
            //$('#page-content').load('question_question.php', function(){
                // hide loader image
                //$('#loader-image').hide();

                // fade in effect
                $('#new_chatbox').fadeIn('slow');
            });
            //alert('Report successful');
            //alert(data);
          }
          else {
            //alert(data);
            alert("Got some problem");
            location.reload();
          }
        }
      });
    }
  }
</script>
