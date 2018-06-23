<?php
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
     padding-left:10px;
     padding-right:10px;
     overflow: scroll;
 }
 </style>
<div class="row chatbox card" style="">
  <br><br><br><br><br><br><br><br><br><br><br><br>
  <br><br><br><br><br><br><br><br><br><br><br><br>
  <br><br><br><br><br><br><br><br><br><br><br><br>
  <br><br><br><br><br><br><br><br><br><br><br><br>
</div>

<div class="row">
  <div class="col l12">
    <div class="card">
      <div class="card-content">
        <div class="input-field col l6">
          <input type="text" class="validate">
        </div>
      </div>
    </div>
  </div>
</div>
