<?php
  include 'html_php/new_hearder.php';
?>
<br>
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

  <!-- Recommended shim for cross-browser WebRTC support. -->
  <script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
  <!-- Default Red5 Pro Playback Control styles. -->
  <link href="lib/red5pro/red5pro-media.css" rel="stylesheet">
  <!-- Fullscreen shim. -->
  <script src="lib/screenfull/screenfull.min.js"></script>
<div class="row">
  <div class="col l7 m12 s12">
    <video id="red5pro-subscriber"
           class="red5pro-media red5pro-media-background"
           autoplay controls height="500px">
    </video>
    <!-- Exposes `red5prosdk` on the window global. -->
    <script src="lib/red5pro/red5pro-sdk.min.js"></script>
    <!-- Example script below. -->
    <script type="text/javascript">
    (function (red5prosdk) {
      // Create a new instance of the WebRTC subcriber.
      var subscriber = new red5prosdk.RTCSubscriber();

      // Initialize
      subscriber.init({
        protocol: 'ws',
        port: 8081,
        host: 'localhost',
        app: 'live',
        streamName: 'mystream',
        iceServers: [{urls: 'stun:stun2.l.google.com:19302'}],
        bandwidth: {
          audio: 56,
          video: 512
        },
        mediaElementId: 'red5pro-subscriber',
        subscriptionId: 'mystream' + Math.floor(Math.random() * 0x10000).toString(16),
        videoEncoding: 'NONE',
        audioEncoding: 'NONE'
      })
      .then(function(subscriber) {
        // `subcriber` is the WebRTC Subscriber instance.
        return subscriber.subscribe();
      })
      .then(function(subscriber) {
        // subscription is complete.
        // playback should begin immediately due to
        //   declaration of `autoplay` on the `video` element.
      })
      .catch(function(error) {
        // A fault occurred while trying to initialize and playback the stream.
        console.error(error)
      });

      })(window.red5prosdk);
    </script>
  </div>
  <div class="col l4 m12 s12">
    <div id="chatContainer">
        <!-- <div id="chatTopBar" class="rounded"></div> -->
        <div> <br><br><br> </div>
        <div id="chatLineHolder"></div>

        <div id="chatUsers" class="rounded"></div>
        <div id="chatBottomBar" class="rounded">
        	<div class="tip"></div>

          <?php
            // $username = '123';
            // $username = $_SESSION['username'];
            $username = $_GET['username'];
            $email = "example@exp.com";
           ?>

            <form id="loginForm" method="post" action="">
                <input id="name" name="name" value="<?php echo $username; ?>" class="rounded" maxlength="16" />
                <input id="email" name="email" class="rounded" />
                <input type="submit" id="clickButton" class="blueButton" value="Submit" />
            </form>

            <script type="text/javascript">
             var username = '<?php echo $username; ?>';
             document.getElementById("name").value = username;

             var email = '<?php echo $email; ?>';
             document.getElementById('email').value = email;
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

<?php
  include 'html_php/footer.php';
 ?>
