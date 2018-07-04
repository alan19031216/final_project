<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/open_book_effect_login_register.css"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <title></title>
  </head>
  <body>
    <div class="component">
				<ul class="align">
					<li>
						<figure class='book'>

							<!-- Front -->

							<ul class='hardcover_front'>
								<li>
									<div class="coverDesign blue">
										<h1>CSS</h1>
										<p>BOOK</p>
									</div>
								</li>
								<li></li>
							</ul>

							<!-- Pages -->

							<ul class='page'>
								<li></li>
								<li>
									<a class="btn modal-trigger" href="#modal1">Login</a> <br>
                  <a class="btn red modal-trigger" href="#modal2">Register</a>
								</li>
								<li></li>
								<li></li>
								<li></li>
							<!-- Back -->

							<ul class='hardcover_back'>
								<li></li>
								<li></li>
							</ul>
							<ul class='book_spine'>
								<li></li>
								<li></li>
							</ul>
							<figcaption>
                <br><br><br><br>
								<a href="new_index.php"><h2>Let's cook</h2></a>
							</figcaption>
						</figure>
					</li>
				</ul>
			</div>

      <!-- Modal Structure -->
      <?php
      require 'html_php/login_html.php';
       ?>

      <?php
      require 'html_php/register_html.php';
       ?>

  </body>
  <script type="text/javascript" src="js/login_register.js"></script>
</html>
<!--Fivera.net |||||| By Nikola Petrovic ||||||| Website dedicated to sharing resources-->
