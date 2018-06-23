<?php
  require 'html_php/header.php';
 ?>
    <title>Home</title>
    <link rel="stylesheet" href="css/materialize-stepper.min.css">
    <script src="https://js.leapmotion.com/leap-0.6.4.js"></script>
    <script type="text/javascript" src="extras/modernizr.2.5.3.min.js"></script>
    <!--rating-->
    <script src="js/rate.js"></script>
    <!-- jQueryValidation Plugin (optional) -->
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
    <!--Import Materialize-Stepper JavaScript -->
    <script src="js/materialize-stepper.min.js"></script>

  </head>
  <body>

    <div class="carousel carousel-slider center" data-indicators="true">
      <div class="carousel-fixed-item center">

      </div>
      <div class="carousel-item orange white-text" href="#one!">
        <h2>First Panel</h2>
        <p class="white-text">This is your first panel</p>
        <br><br><br>
        <input class="blue-text" id="search" type="search" style="width:50%;background-color:white;">
      </div>
    </div>

    <div class="fixed-action-btn vertical">
      <a class="btn-floating btn-large red">
        <i class="large material-icons">mode_edit</i>
      </a>
      <ul>
        <li><a class="btn-floating waves-effect waves-light red btn modal-trigger" title="Add post" href="#modal1"><i class="material-icons">add</i></a></li>
        <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
        <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
        <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
      </ul>
    </div>

  <div class="content">

  </div> <!--content END-->

  <div class="row">
    <div class="col s12 m6 l3 blue">
    <h2>Your Favorite</h2>  <!-- Promo Content 2 goes here -->
    <hr>
    <div class="row">
      <a href="#">
        <div class="col s6 pink waves-effect waves-light btn-large">
            Add More
        </div>
      </a>
      <div class="col s6 green waves-effect waves-light btn-large">
        View More
      </div>
    </div>
    </div>

    <?php
      require 'php/config.php';
      $name = $_SESSION['username'];
      /*$results = $mysqli->query("SELECT b.id, b.product_code, b.product_name, b.product_desc, b.price , a.id , a.quantity
        from myorder a LEFT JOIN product b on a.productid=b.id");*/
      $select = $conn->query("SELECT a.* , b.* FROM recipe a LEFT JOIN favorite b on a.code = b.code
        WHERE b.username = '$name' LIMIT 3");
      //$select = $conn->query("SELECT * FROM favorite WHERE username = '$name' LIMIT 3");
      foreach ($select as $row) {
    ?>
    <div class="col s12 m6 l3">
      <div class="card sticky-action">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" src="php/<?php  echo $row['cover_img'];?>">
        </div>

        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4"><?php echo $row['name']; ?><i class="material-icons right">more_vert</i></span>
          <script>rate(<?php echo $row['rating']; ?>);</script>
        </div>

        <div class="card-action">
          Type: <?php echo $row['type']; ?>
          <a class="btn-floating waves-effect waves-light red right" href="recipe.php?code=<?php echo $row['code']; ?>"><i class="material-icons">book</i></a>
        </div>

        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4"><?php echo $row['name']; ?><i class="material-icons right">close</i></span>
          <?php
            $simple_description = $row['simple_description'];

            if($simple_description == '' || $simple_description == ' '){
              $simple_description = 'He/She is very lazy...Nothings to show';
            }
          ?>
          <p> <?php echo $simple_description ?> </p>
        </div>
      </div>
    </div>
    <?php
      }
     ?>
  </div>

  <div class="parallax-container">
    <?php
    $a = rand(1,5);
    $txt = '';
    if($a == 1){
      $txt = "1.jpeg";
    }
    elseif ($a == 2) {
      $txt = "2.jpg";
    }
    elseif ($a == 3) {
      $txt = "3.jpg";
    }
    elseif ($a == 4) {
      $txt = "4.jpg";
    }
    else{
      $txt = "5.jpg";
    }
     ?>
    <div class="parallax"><img src="img/parallax/<?php echo $txt; ?>" style="width:50%;"></div>
  </div>

  <br><br>

  <div class="row">
    <div class="col s12 m6 l3 blue">
    <h2>History</h2>  <!-- Promo Content 2 goes here -->
    <hr>
    <div class="row">
      <a href="#">
        <div class="col s6 pink waves-effect waves-light btn-large">
            Add More
        </div>
      </a>
      <div class="col s6 green waves-effect waves-light btn-large">
        View More
      </div>
    </div>
    </div>

    <?php
      require 'php/config.php';
      $name = $_SESSION['username'];
      /*$results = $mysqli->query("SELECT b.id, b.product_code, b.product_name, b.product_desc, b.price , a.id , a.quantity
        from myorder a LEFT JOIN product b on a.productid=b.id");*/
      $select_history = $conn->query("SELECT a.* , b.* FROM recipe a LEFT JOIN history b on a.code = b.code
        WHERE b.username = '$name' LIMIT 3");
      //$select = $conn->query("SELECT * FROM favorite WHERE username = '$name' LIMIT 3");
      foreach ($select_history as $row_historty) {
    ?>
    <div class="col s12 m6 l3">
      <div class="card sticky-action">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" src="php/<?php  echo $row_historty['cover_img'];?>">
        </div>

        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4"><?php echo $row_historty['name']; ?><i class="material-icons right">more_vert</i></span>
          <script>rate(<?php echo $row_historty['rating']; ?>);</script>
        </div>

        <div class="card-action">
          Type: <?php echo $row_historty['type']; ?>
          <a class="btn-floating waves-effect waves-light red right" href="recipe.php?code=<?php echo $row_historty['code']; ?>"><i class="material-icons">book</i></a>
        </div>

        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4"><?php echo $row_historty['name']; ?><i class="material-icons right">close</i></span>
          <?php
            $simple_description = $row_historty['simple_description'];

            if($simple_description == '' || $simple_description == ' '){
              $simple_description = 'He/She is very lazy...Nothings to show';
            }
          ?>
          <p> <?php echo $simple_description ?> </p>
        </div>
      </div>
    </div>
    <?php
      }
     ?>
  </div>

      <script type="text/javascript">

      $(document).ready(function(){
      $('.parallax').parallax();
      });
      </script>
      <br><br><br><br><br><br><br><br><br><br><br><br>
  </body>
</html>
