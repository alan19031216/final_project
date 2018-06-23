<?php
require 'html_php/header.php';
require 'php/config.php';
$code = $_GET['code'];
//echo $code;
 ?>

   </head>
   <body>
     <ul id="dropdown1" class="dropdown-content">
       <li class="divider"></li>
       <li><a href="user_profile.php"><i class="material-icons">account_box</i>User profile</a></li>
       <li><a href="php/logout.php">Logout</a></li>
       <li class="divider"></li>
     </ul>

     <nav>
       <div class="navbar-fixed orange">
       <!--  <a href="#!" class="brand-logo">Logo</a> -->
       <a href="home.php" class="brand-logo">Let's Cook</a>
       <!--<a href="index.php"><img class="responsive-img brand-logo hide-on-small-only" src="img/logo.jpg" alt="" width="13%"></a>-->
       <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
         <ul class="right hide-on-med-and-down">
           <li><a href="cart.php"><i class="material-icons">shopping_cart</i></a> </li>
           <li><a href="sell.php">Book of recipe</a></li>
           <li>
             <a class="dropdown-button" href="#!" data-activates="dropdown1">
               Welcome back, <b style="color:blue"><?php echo $_SESSION['username']; ?></b>
               <i class="material-icons right">arrow_drop_down</i>
             </a>
           </li>
         </ul>
       </div>
     </nav>

     <!--Moblie slide bar-->
     <ul class="side-nav" id="mobile-demo">
       <center> <li><a href="home.php" style="pointer-events: none;cursor: default;"><b style="color:red;font-size:30px">Lest's Cook</b></a></li> </center>
       <li>
         <ul class="collapsible collapsible-accordion">
           <li>
             <a class="collapsible-header waves-effect waves-teal">
               Welcome back, <b style="color:blue"><?php echo $_SESSION['username']; ?></b>
               <i class="material-icons right">arrow_drop_down</i>
             </a>
             <div class="collapsible-body">
               <ul>
                 <li class="divider"></li>
                 <li><a href="user_profile.php"><i class="material-icons">account_box</i>User profile</a></li>
                 <li><a href="php/logout.php">Logout</a></li>
                 <li class="divider"></li>
               </ul>
             </div>
           </li>
           <li><a href="cart.php"><i class="material-icons">shopping_cart</i></a> </li>
           <li><a href="sell.php">Sell Recipe</a></li>
         </ul>
       </li>
     </ul>
<br>
<?php
  $book = $conn->query("SELECT a.* , b.* FROM book a LEFT JOIN book_detail b on a.code = b.code WHERE a.code = '$code' AND b.code = '$code'");
  foreach ($book as $row_book) {
  }
 ?>
 <style media="screen">
 .body{
   background-color: gray;
 }
 .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px;
  width: 100%;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button4 {border-radius: 12px;}
 </style>
<div class="hide-on-med-and-up show-on-small">
  <div class="row">
    <div class="col s12 card center">
      <img src="<?php echo $row_book['img']; ?>" alt="">
      <h4 style="color:pink;">RM <?php echo $row_book['price']; ?></h4>
      <p> <del>a</del> || Save:</p>
      <hr style="width:95%;color:blue;">
      <!--<form class="" action="#" method="post">-->
        <div class="container row">
          <div class="col s6">
            <input type="number" id="quantity_phone" name="" value="" placeholder="How many that you want to buy">
          </div>
          <div class="col s6">
            <button class="button button4" onclick="addCart_phone()">Add to cart</button>
          </div>
          <div class="col s12">
            <button class="button button3" style="background-color:gray">Add to wishlist</button>
          </div>
        </div>
      <!--</form>-->
    </div>
    <br><br>
    <div class="col s12 card">
      <p style="font-size:18px;"><b>Description:</b></p>
      <hr>
      <p><?php echo $row_book['description']; ?></p>
    </div>
    <br><br>
    <div class="col s12 card">
      <p style="font-size:18px;"><b>Product Detail:</b></p>
      <hr>
      <p><b>Author: </b><?php echo $row_book['author']; ?></p>
      <p><b>Langauge: </b><?php echo $row_book['language']; ?></p>
      <p><b>Publication date: </b><?php echo $row_book['publication_date']; ?></p>
      <p><b>Publisher: </b><?php echo $row_book['publisher']; ?></p>
      <p><b>ISBN: </b><?php echo $row_book['ISBN']; ?></p>
    </div>
  </div>
</div>

<script type="text/javascript">
  function addCart_phone(){
      var quantity = document.getElementById('quantity_phone').value;
      var code = '<?php echo $code; ?>';
      var username = '123'
      //alert(username);
      if(quantity < 0 || quantity == '' || quantity == ' '){
        alert("Quantity must be 1 or bigger than 1.");
      }
      else{
        $.post('php/addCart.php' , {postQuantity:quantity,postCode:code,postUsername:username} ,
          function(data){
            if(data == "1"){
              alert("Add cart successfully");
            }
            else if (data == '2') {
              alert("Already add to cart");
            }
            else {
              alert(data);
            }
          });
      }
  }
</script>

<div class="hide-on-large-only hide-on-small-only show-on-medium">
  <div class="row">
    <div class="col m12">
      <div class="row">
        <div class="m12 center">
          <h5><?php echo $row_book['name']; ?></h5>
          <hr style="width:95%;">
        </div>
        <div class="col m6 center">
          <img src="<?php echo $row_book['img']; ?>" alt="">
        </div>
        <div class="col m6">
          <b>Author: </b><?php echo $row_book['author']; ?> ||
          <b>Langauge: </b><?php echo $row_book['language']; ?>
          <br><br>
          <h4>RM: <?php echo $row_book['price'] ?></h4>
          <p> <del>a</del> || Save:</p>
          <br><br> <br>
          <hr>
            <br><br><br>
          <div class="container row">
            <div class="col s6">
              <input type="number" id="quantity_tablet" name="" value="" placeholder="Quantity">
            </div>
            <div class="col s6">
              <button class="button button4" onclick="addCart_tablet()">Add to cart</button>
            </div>
            <div class="col s12">
              <button class="button button3" style="background-color:gray">Add to wishlist</button>
            </div>
          </div>
        </div>
      </div>
    </div> <!--first-->
  </div> <!--row-->
  <br><br>
  <div class="row">
    <div class="col m12 card">
      <p style="font-size:18px;"><b>Description:</b></p>
      <hr>
      <p><?php echo $row_book['description']; ?></p>
    </div>

    <br><br>
    <div class="col m12 card">
      <p style="font-size:18px;"><b>Product Detail:</b></p>
      <hr>
      <p><b>Author: </b><?php echo $row_book['author']; ?></p>
      <p><b>Langauge: </b><?php echo $row_book['language']; ?></p>
      <p><b>Publication date: </b><?php echo $row_book['publication_date']; ?></p>
      <p><b>Publisher: </b><?php echo $row_book['publisher']; ?></p>
      <p><b>ISBN: </b><?php echo $row_book['ISBN']; ?></p>
    </div>
  </div>
</div> <!--medium-->

<script type="text/javascript">
  function addCart_tablet(){
      var quantity = document.getElementById('quantity_tablet').value;
      var code = '<?php echo $code; ?>';
      var username = '123'
      //alert(username);
      if(quantity < 0 || quantity == '' || quantity == ' '){
        alert("Quantity must be 1 or bigger than 1.");
      }
      else{
        $.post('php/addCart.php' , {postQuantity:quantity,postCode:code,postUsername:username} ,
          function(data){
            if(data == "1"){
              alert("Add cart successfully");
            }
            else if (data == '2') {
              alert("Already add to cart");
            }
            else {
              alert(data);
            }
          });
      }
  }
</script>

<div class="hide-on-med-and-down show-on-large">
  <div class="row">
    <div class="col l4 center">
      <img src="<?php echo $row_book['img']; ?>" alt="">
    </div>
    <div class="col l4">
      <p style="font-size:18px;"><b>Description:</b></p>
      <hr>
      <p><?php echo $row_book['description']; ?></p>
    </div>
    <div class="col l4">
      <h4>RM: <?php echo $row_book['price'] ?></h4>
      <p> <del>a</del> || Save:</p>
      <br><br> <br>
      <hr>
        <br><br><br>
      <div class="container row">
        <div class="col s6">
          <input type="number" id="quantity_computer" name="" value="" placeholder="Quantity">
        </div>
        <div class="col s6">
          <button class="button button4" onclick="addCart_computer()">Add to cart</button>
        </div>
        <div class="col s12">
          <button class="button button3" style="background-color:gray">Add to wishlist</button>
        </div>
      </div>
    </div>

    <div class="col l12 card">
      <p style="font-size:18px;"><b>Product Detail:</b></p>
      <hr>
      <p><b>Author: </b><?php echo $row_book['author']; ?></p>
      <p><b>Langauge: </b><?php echo $row_book['language']; ?></p>
      <p><b>Publication date: </b><?php echo $row_book['publication_date']; ?></p>
      <p><b>Publisher: </b><?php echo $row_book['publisher']; ?></p>
      <p><b>ISBN: </b><?php echo $row_book['ISBN']; ?></p>
    </div>
  </div>
</div>

<script type="text/javascript">
  function addCart_computer(){
      var quantity = document.getElementById('quantity_computer').value;
      var code = '<?php echo $code; ?>';
      var username = '<?php echo $_SESSION['username']; ?>'
      //alert(username);
      if(quantity < 0 || quantity == '' || quantity == ' '){
        alert("Quantity must be 1 or bigger than 1.");
      }
      else{
        $.post('php/addCart.php' , {postQuantity:quantity,postCode:code,postUsername:username} ,
          function(data){
            if(data == "1"){
              alert("Add cart successfully");
            }
            else if (data == '2') {
              alert("Already add to cart");
            }
            else {
              alert(data);
            }
          });
      }
  }
</script>

<script type="text/javascript">
    // side nav (mobile)
    $(".button-collapse").sideNav();
</script>


<?php
require 'html_php/footer.php';
 ?>
