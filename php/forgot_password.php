
<?php
include 'config.php';
$email = $_POST['email'];
try {
  $sql = $conn->query("SELECT * FROM user WHERE email = '$email'");
  foreach ($sql as $row) {
    $data = $row['update_date'];
    $username = $row['username'];
  }
  date_default_timezone_set("Asia/Kuala_Lumpur");
  $datetime1 = new DateTime();
  $datetime2 = new DateTime($data);
  $interval = $datetime1->diff($datetime2);
  $elapsed = $interval->format('%i');
  //echo $elapsed;

  $code = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXZY", 5)), 0, 5);
  $number_of_rows = $sql->rowCount();
  if ($elapsed < 5) {
    echo "Please wait more 5 minutes. Now already - " .$elapsed. "mint(s)";
  }
  elseif($number_of_rows > 0){
    $sql = $conn->query("UPDATE user SET update_date=now() , forgot_code = '$code' WHERE email = '$email'");
    // ---------------- SEND MAIL FORM ----------------

    // send e-mail to ...
    $to=$email;

    // Your subject
    $subject = "=?GBK?B?".base64_encode('邮件主题')."?=";
    $subject="Let cook - Forgot password";


    // From
    $header="from: Let's Cook";
    $header .= " Return-Path: <username@domain.com>\n";	 //防止被当做垃圾邮件，但在sina邮箱里不起作用
    $header .= "MIME-Version: 1.0\n";
    $header .= "Content-type: text/html; charset=utf-8\n";    //邮件内容为utf-8编码
    $header .= "Content-Transfer-Encoding: 8bit\r\n";
    //$header = "From: $noreply@intaxfin.com\nMIME-Version: 1.0\nContent-Type: text/html; charset=utf-8\n";


    // Your message
    $message ="
    <!DOCTYPE html>
      <head>
        <meta charset='utf-8'>
        <link type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css'  media='screen,projection'/>
        <script type='text/javascript' src=''../js/materialize.min.js'></script>
        <title>Hello</title>
      </head>
      <body>
      <style media='screen'>

      .button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: red;
        padding: 16px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        -webkit-transition-duration: 0.4s; /* Safari */
        transition-duration: 0.4s;
        cursor: pointer;
      }

      .button1 {
            background-color: white;
            color: black;
            border: 2px solid #4CAF50;
        }
      </style>
        <div class='row card'>
          <div class='col s12 m6'>
            <div class='card blue-grey darken-1'>
              <div class='card-content white-text center-align'>
                <img src='data:image/png;base64,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' width='100%'>
                <center>
                <span class='card-title'><h2>Welcome to Lets cook</h2></span>
                <p>Hello, your're almoest ready to change your password.</p>
                <p>Simply click the big green button blew to change your password</p>
                <br>
                <a class='button button1' href='http://localhost/final%20project/final/change_password.php?username=$username&code=$code'>Click here to Change Password</a>
                <br><br>
                </center>
              </div>
            </div>
          </div>
        </div>
      </body>
    </html>
    ";

    //$message.="Click on this link to activate your account \r\n";
    //$message.="http://localhost/final%20project/final/php/confirmation.php?passkey=$confirm_code";


    // send email
    $sentmail = mail($to,$subject,$message,$header);

    print "success";
  }
  else {
    print "This user is not exist.";
  }
} catch (Exception $e) {
  print $e;
} // catch END
?>
