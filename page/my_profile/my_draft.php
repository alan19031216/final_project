<h3 class="center">My draft</h3>
<?php
  $username = $_SESSION['username'];
  $sql_my_draft = $conn->query("SELECT * FROM draft WHERE username = '$username'");
  $count_my_draft = $sql_my_draft->rowCount();
  if ($count_my_draft == 0) {
    echo "<h3>You doesn't has save any draft yet</h3>";
  }
  else {
    foreach ($sql_my_draft as $row_my_draft) {
?>
  <div class="col l4 m6 s12">
    <div class="card sticky-action">
      <div class="card-image waves-effect waves-block waves-light">
        <img class="activator" src="<?php echo $row_my_draft['cover_img'];?>" style="width:100%;height:200px;%;">
      </div>

      <div class="card-content">
        <span class="card-title activator grey-text text-darken-4"><?php echo $row_my_draft['name']; ?><i class="material-icons right">more_vert</i></span>
        <script>rate(<?php echo $row_my_draft['rating']; ?>);</script>
      </div>

      <div class="card-action">
        Type: <?php echo $row_my_draft['type']; ?>
        <a class="btn-floating waves-effect waves-light red right" href="recipe_draft/<?php echo $row_my_draft['code']; ?>"><i class="material-icons">book</i></a>
        <a id="<?php echo $row_my_draft['code']; ?>" class="btn-floating waves-effect waves-light right tooltipped"  data-position="top" data-tooltip="Add to favorite" onclick="addFavorite('<?php echo $row_my_draft['code']; ?>')"><i class="material-icons">stars</i></a>
        <a id="post_<?php echo $row_my_draft['code']; ?>" class="btn-floating waves-effect waves-light yellow darken-3 right tooltipped"  data-position="top" data-tooltip="Post to pulic" onclick="post_to_public('<?php echo $row_my_draft['id']; ?>')"><i class="material-icons">file_upload</i></a>
        <br><br>
      </div>

      <script type="text/javascript">
        function post_to_public(a){
          var draft_id = a;
          var r = confirm("You want upload to public?");
          if (r == true) {
            $.ajax({
              type:"POST",
              url:"php/draft_post_to_public.php",
              data: 'draft_id=' + draft_id,
              success: function(data){
                if(data == 1){
                  alert("Public success");
                  location.reload();
                }
                else{
                  alert(data);
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
        <span class="card-title grey-text text-darken-4"><?php echo $row_my_draft['name']; ?><i class="material-icons right">close</i></span>
        <?php
          $simple_description = $row_my_draft['simple_description'];

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
