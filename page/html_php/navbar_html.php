<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
  <li class="divider"></li>
  <li><a href="user_profile.php"><i class="material-icons">account_box</i>User profile</a></li>
  <li><a href="php/logout.php">Logout</a></li>
  <li class="divider"></li>
</ul>

<div class="navbar-fixed">
  <nav class="orange">
  <!--  <a href="#!" class="brand-logo">Logo</a> -->
  <a href="new_home.php" class="brand-logo">Let's Cook</a>
    <!--<a href="home.php">
      <img class="responsive-img brand-logo hide-on-small-only" src="img/logo.jpg" alt="" width="13%">
    </a>-->
    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
    <ul class="right hide-on-med-and-down">
      <li><a href="sell.php">Book of recipe</a></li>
      <li>
        <a class="dropdown-button" href="#!" data-activates="dropdown1">
          Welcome back, <b><?php echo $_SESSION['username']; ?></b>
          <i class="material-icons right">arrow_drop_down</i>
        </a>
      </li>
    </ul>
  </nav>
</div>

<!--Moblie slide bar-->
<ul class="side-nav" id="mobile-demo">
  <center> <li><a href="new_home.php" style="pointer-events: none;cursor: default;"><b style="color:red;font-size:30px">Lest's Cook</b></a></li> </center>
  <li><a href="sell.php">Book of recipe</a></li>
  <li>
    <ul class="collapsible collapsible-accordion">
      <li>
        <a class="collapsible-header waves-effect waves-teal">
          Welcome back, <b style="color:blue"><?php echo $_SESSION['username'];; ?></b>
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
    </ul>
  </li>
</ul>

<script type="text/javascript">
  $(document).ready(function(){
    // mobile slide
    $(".button-collapse").sideNav();
  });
</script>
