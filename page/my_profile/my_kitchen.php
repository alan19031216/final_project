<h3 class="center">My Kitchen</h3>
<?php
  $username = $_SESSION['username'];
  $sql_my_recipe = $conn->query("SELECT * FROM recipe WHERE username = '$username'");
  $count_my_recipe = $sql_my_recipe->rowCount();
  if ($count_my_recipe == 0) {
    echo "<h3>You doesn't has post any recipe yet</h3>";
  }
  else {
    foreach ($sql_my_recipe as $row_my_recipe) {
?>
  <div class="col l4 m6 s12">
    <div class="card sticky-action">
      <div class="card-image waves-effect waves-block waves-light">
        <img class="activator" src="<?php echo $row_my_recipe['cover_img'];?>" style="width:100%;height:200px;%;">
      </div>

      <div class="card-content">
        <span class="card-title activator grey-text text-darken-4"><?php echo $row_my_recipe['name']; ?><i class="material-icons right">more_vert</i></span>
        <script>rate(<?php echo $row_my_recipe['rating']; ?>);</script>
      </div>

      <div class="card-action">
        Type: <?php echo $row_my_recipe['type']; ?>
        <a class="btn-floating waves-effect waves-light red right" href="new_recipe.php?code=<?php echo $row_my_recipe['code']; ?>"><i class="material-icons">book</i></a>
        <a id="<?php echo $row_my_recipe['code']; ?>" class="btn-floating waves-effect waves-light right tooltipped"  data-position="top" data-tooltip="Add to favorite" onclick="addFavorite('<?php echo $row_my_recipe['code']; ?>')"><i class="material-icons">stars</i></a>
        <a id="draft_<?php echo $row_my_recipe['code']; ?>" class="btn-floating waves-effect waves-light yellow darken-3 right tooltipped"  data-position="top" data-tooltip="Save  to draft" onclick="save_to_draft('<?php echo $row_my_recipe['id']; ?>')"><i class="material-icons">file_download</i></a>
      </div>

      <script type="text/javascript">
        function save_to_draft(a){
          var draft_id = a;
          var r = confirm("You want save to draft and romove to public?");
          if (r == true) {
            $.ajax({
              type:"POST",
              url:"php/save_to_draft.php",
              data: 'draft_id=' + draft_id,
              success: function(data){
                if(data == 1){
                  alert("Save to draft success");
                  location.reload();
                }
                else{
                  //alert(data);
                  alert("Got some problem! Please try again");
                  location.reload();
                }
              }
            });
          } else {
              //txt = "You pressed Cancel!";
          }

        }
      </script>

      <div class="card-reveal">
        <span class="card-title grey-text text-darken-4"><?php echo $row_my_recipe['name']; ?><i class="material-icons right">close</i></span>
        <?php
          $simple_description = $row_my_recipe['simple_description'];

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
  }
?>
