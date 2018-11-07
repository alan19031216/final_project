<?php
  session_start();
$message_code=isset($_GET['message_code']) ? $_GET['message_code'] : die('ERROR: message_code not found.');
$sender=isset($_GET['sender']) ? $_GET['sender'] : die('ERROR: sender not found.');
$receiver=isset($_GET['receiver']) ? $_GET['receiver'] : die('ERROR: receiver not found.');
 //echo $message_code;
 ?>
 <link rel="stylesheet" type="text/css" href="dist/emojionearea.min.css" media="screen">
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" media="screen">
 <link rel="stylesheet" type="text/css" href="http://mervick.github.io/lib/google-code-prettify/skins/tomorrow.css" media="screen">
 <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->
 <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/emojione/1.5.2/lib/js/emojione.min.js"></script>-->
 <!--<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emojione@3.1.2/lib/js/emojione.min.js"></script>-->
 <!--<script type="text/javascript" src="../node_modules/emojione/lib/js/emojione.js"></script>-->
 <!-- <script type="text/javascript" src="http://mervick.github.io/lib/google-code-prettify/prettify.js"></script> -->
 <!--<script>
   window.emojioneVersion = "3.1";
 </script>-->
 <script type="text/javascript" src="dist/emojionearea.js"></script>
 <style>
 div .chatbox {
     border: 1px solid black;
     width: 100%;
     height: 300px;
     /* padding-left:10px;
     padding-right:10px; */
     overflow: scroll;
 }

 .containers {
    border: 2px solid #dedede;
    background-color: #f1f1f1;
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
}

/* Darker chat container */
.darker {
    border-color: #ccc;
    background-color: #ddd;
}
 </style>
<div class="container row">
  <div class="new_chatbox" id="new_chatbox"></div>
  <div class="chatbox card" style="" id="chatbox">
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
</div>

<style media="screen">
  textarea.materialize-textarea{height: 6rem;}
</style>

<input type="hidden" id="message_code" value="<?php echo $message_code; ?>">
<input type="hidden" id="receiver" value="<?php echo $receiver; ?>">
<input type="hidden" id="sender" value="<?php echo $username_message; ?>">
<div class="row">
  <div class="col l12 m12 s12">
    <div class="card blue-grey darken-1">
      <div class="card-content white-text">
        <span class="card-title">Send message</span>
        <br>
        <textarea id="textarea_message" onfocus="this.value=''"></textarea>
        <br>
        <button class="waves-effect waves-green btn" type="button" name="button" onclick="send_message()"><i class="material-icons right">send</i>send</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $("#textarea_message").emojioneArea();
  });
</script>

<script type="text/javascript">

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
            //document.getElementById('textarea_message').value = '';
            document.getElementsByClassName("emojionearea-editor").innerHTML = "";
            $(".emojionearea-editor").html("");
            $('.emojionearea-editor').trigger(':reset');
            $("#textarea_message").val('');
            $('#textarea_message').trigger(':reset');
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

  function refreshData()
  {
      x = 5;  // 5 Seconds
      var message_code = document.getElementById('message_code').value;
      var sender = document.getElementById('sender').value;
      var receiver = document.getElementById('receiver').value;
      $("#chatbox").hide();
      $('#new_chatbox').load('chat_box.php?message_code=' + message_code + '&sender=' + sender + '&receiver=' + receiver, function(){
          $('#new_chatbox').fadeIn('slow');
      });

      setTimeout(refreshData, x*1000);
  }

  refreshData(); // execute function
</script>
