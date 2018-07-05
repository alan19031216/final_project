<input type="hidden" name="username" id="username" value="<?php echo $_SESSION['username']; ?>">
<h3 class="center">My Favorite</h3>
<?php
$username = $_SESSION['username'];
  $sql_my_favorite = $conn->query("SELECT a.* , b.* FROM favorite as a LEFT JOIN recipe as b ON a.code = b.code WHERE a.username = '$username'");
  $count = $sql_my_favorite->rowCount();
  if($count == 0){
    echo "<h4>You haven't add any favorite</h4>";
  }
  else{
  foreach ($sql_my_favorite as $row_my_favorite) {
?>
<div class="col l4 m6 s12">
  <div class="card sticky-action">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="<?php echo $row_my_favorite['cover_img'];?>">
    </div>

    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4"><?php echo $row_my_favorite['name']; ?><i class="material-icons right">more_vert</i></span>
      <script>rate(<?php echo $row_my_favorite['rating']; ?>);</script>
    </div>

    <div class="card-action">
      Type: <?php echo $row_my_favorite['type']; ?>
      <a class="btn-floating waves-effect waves-light red right" href="new_recipe.php?code=<?php echo $row_my_favorite['code']; ?>"><i class="material-icons">book</i></a>
      <a id="<?php echo $row_my_favorite['code']; ?>" class="btn-floating waves-effect waves-light right tooltipped"  data-position="top" data-tooltip="Add to favorite" onclick="addFavorite('<?php echo $row_my_favorite['code']; ?>')"><i class="material-icons">stars</i></a>
      <br><br>
    </div>

    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4"><?php echo $row_my_favorite['name']; ?><i class="material-icons right">close</i></span>
      <?php
        $simple_description = $row_my_favorite['simple_description'];

        if($simple_description == '' || $simple_description == ' '){
          $simple_description = 'He/She is very lazy...Nothings to show';
        }
      ?>
      <p> <?php echo $simple_description ?> </p>
    </div>
  </div>
</div> <!--div col s3 END-->
<?php
  }
 ?>
<?php
  } // else
?>
