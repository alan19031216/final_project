<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Live chat</title>

<link rel="stylesheet" type="text/css" href="js/jScrollPane/jScrollPane.css" />
<!-- <link rel="stylesheet" type="text/css" href="css/page.css" /> -->
<link rel="stylesheet" type="text/css" href="css/chat.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Open+Sans:400,700'>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css" media="screen">
<!--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/emojione/1.5.2/assets/sprites/emojione.sprites.css" media="screen">-->
<!-- <link rel="stylesheet" type="text/css" href="stylesheet.css" media="screen"> -->

<link rel="stylesheet" type="text/css" href="dist/emojionearea.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="http://mervick.github.io/lib/google-code-prettify/skins/tomorrow.css" media="screen">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/emojione/1.5.2/lib/js/emojione.min.js"></script>-->
<!--<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emojione@3.1.2/lib/js/emojione.min.js"></script>-->
<!--<script type="text/javascript" src="../node_modules/emojione/lib/js/emojione.js"></script>-->
<script type="text/javascript" src="http://mervick.github.io/lib/google-code-prettify/prettify.js"></script>
<!--<script>
  window.emojioneVersion = "3.1";
</script>-->
<script type="text/javascript" src="dist/emojionearea.js"></script>
<script src="//twemoji.maxcdn.com/2/twemoji.min.js?2.2"></script>
<script src="//twemoji.maxcdn.com/2/twemoji.min.js?11.0"></script>

<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
</head>

<body>
<script src="http://webrtc.github.io/adapter/adapter-latest.js"></script>
<div class="row">
  <div class="col l7 m12 s12">
    <div>
      <video id="red5pro-publisher" width="100%;" height="480" muted autoplay></video>
    </div>
      <script src="lib/red5pro/red5pro-sdk.min.js"></script>
    <script>
      (function(red5prosdk) {
        'use strict';

        var rtcPublisher = new red5prosdk.RTCPublisher();
        var rtcSubscriber = new red5prosdk.RTCSubscriber();
        var config = {
          protocol: 'ws',
          host: 'localhost',
          port: 8081,
          app: 'live',
          streamName: 'mystream',
          iceServers: [{urls: 'stun:stun2.l.google.com:19302'}]
        };

        function subscribe () {
          rtcSubscriber.init(config)
            .then(function () {
              return rtcSubscriber.subscribe();
            })
            .then(function () {
              console.log('Playing!');
            })
            .catch(function (err) {
              console.log('Could not play: ' + err);
            });
        }

        rtcPublisher.init(config)
          .then(function () {
            // On broadcast started, subscribe.
            rtcPublisher.on(red5prosdk.PublisherEventTypes.PUBLISH_START, subscribe);
            return rtcPublisher.publish();
          })
          .then(function () {
            console.log('Publishing!');
          })
          .catch(function (err) {
            console.error('Could not publish: ' + err);
          });

      }(window.red5prosdk));
    </script>
  </div>
  <div class="col l5 m12 s12">
    <div id="chatContainer">
        <!-- <div id="chatTopBar" class="rounded"></div> -->
        <div> <br><br><br> </div>
        <div id="chatLineHolder"></div>

        <div id="chatUsers" class="rounded"></div>
        <div id="chatBottomBar" class="rounded">
        	<div class="tip"></div>

          <?php
            // $username = '123';
            $username = $_GET['username'];
            $email = "example@exp.com";
           ?>

            <form id="loginForm" method="post" action="">
                <input id="name" name="name" class="rounded" maxlength="16" />
                <input id="email" name="email" class="rounded" />
                <input type="submit" id="clickButton" class="blueButton" value="Submit" />
            </form>

            <script type="text/javascript">
             var username = '<?php echo $username; ?>';
             document.getElementById("name").value = username;

             var email = '<?php echo $email; ?>';
             document.getElementById('email').value = email;
             alert("a");
             // var count = 0;
             // if(count == 1){
             //   var button = document.getElementById('clickButton');
             //    setInterval(function(){
             //        button.click();
             //    },1000);
             // }else{
             //   count = 1;
             // }

             window.onload = function()
             {
             if(window.name==""){
             window.name = "0";
             }
             else{
             window.name = eval(window.name) + 1;
             //alert("已经刷新"+ window.name+'次');
             }

             if(window.name == 0){

                 var button = document.getElementById('clickButton');
                  setInterval(function(){
                    //location.reload();
                      button.click();
                      window.location.href = window.location.pathname + window.location.search + window.location.hash;
                  },1000);


             }
             }
            </script>

            <form id="submitForm" method="post" action="">
                <input id="chatText" name="chatText" class="rounded" maxlength="255" />
                <input type="submit" class="blueButton" value="Submit"/>
            </form>

            <script type="text/javascript">
              $(document).ready(function() {
                // $("#chatText").emojioneArea();
                //$("#chatText").val(" ");
              });
            </script>
        </div>
    </div>
  </div>
</div>

<script src="js/jScrollPane/jquery.mousewheel.js"></script>
<script src="js/jScrollPane/jScrollPane.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
