<head>
  <meta charset="utf-8">
  <title>Update</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/style.css"  media="screen,projection"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>

  <script type="text/javascript" src="script.js"></script>

</head>
<div class="container">

<form id='update-product-form' action='#' method='post' border='0'>
    <table class="card centered">
<?php
  require 'php/config.php';
  $code=isset($_GET['code']) ? $_GET['code'] : die('ERROR: Product ID not found.');
  //$code = $_GET['code'];
  //echo $code;
  $username = '123';
  //echo $username;
  $update = $conn->query("SELECT * FROM book a LEFT JOIN book_detail b ON a.code = b.code LEFT JOIN cart c ON a.code = c.code WHERE c.username = '$username' AND c.code ='$code'");
  foreach ($update as $row) {
 ?>
<!--we have our html form here where new product information will be entered-->
        <tr>
            <input type="hidden" name="username" value="<?php echo $username; ?>">
            <input type="hidden" name="code" value="<?php echo $code; ?>">
            <td colspan="2"> <h4> <?php echo $row['name']; ?></h4></td>
        </tr>

        <tr>
          <td colspan="2">
            <img src="<?php echo $row['img']; ?>" alt="<?php echo $row['name']; ?>">
          </td>
        </tr>

        <tr>
          <td colspan="2"><?php $row['price']; ?></td>
        </tr>

        <tr>
          <td>
            <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>">
          </td>
          <td>
            <button style="width:100%;" type="submit" class="waves-effect waves-light btn ">Update</button>
          </td>
        </tr>

        <tr>
          <td colspan="2"><a class="waves-effect waves-light btn back-btn">Back</a></td>
        </tr>
        <?php
          }
         ?>
    </table>
</form>
</div>

<script type="text/javascript">
// clicking the edit button
$(document).on('click', '.back-btn', function(){
  // hide create product button
  $('#page-content_computer').fadeOut('slow');

  // show read products button
  $('#table_computer').fadeIn('slow');
  $('#total_computer').fadeIn('slow');
});

// will run if update product form was submitted
$(document).on('submit', '#update-product-form', function() {

    // post the data from the form
    $.post("php/update_cart.php", $(this).serialize())
        .done(function(data) {

          // hide create product button
          $('#page-content_computer').fadeOut('slow');

          // show read products button
          $('#page-content_computer').fadeOut('slow', function(){
            $('#page-content_computer').load('cart_show.php', function(){

                // fade in effect
                $('#page-content_computer').fadeIn('slow');
            });
          });
        });

    return false;
});
</script>
