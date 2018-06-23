<script type="text/javascript">
  function addFavorite(code){
    var username = '<?php echo $_SESSION['username']; ?>';
    $.post('php/getChange.php' , {postcode:code , postusername:username} ,
    function(data){
      if(data == "1"){
        //alert("Data1: " + data);
        //change = data;
        if (confirm("Do want to unfavorite it??")) {
          $.post('php/getUNFavorite.php' , {postcode:code , postusername:username} ,
          function(data){
            if(data == "1"){
              alert("Remove successfully");
              //alert(data);
              //window.location.href = "login_Register_Admin.php";
              document.getElementById(code).className = "btn-floating waves-effect waves-light right tooltipped green";
            }
            else {
              alert("Got something wrong");
            }
          });
        }else {

          }
      }
      else {
        //alert("Data2: " + data);
      //  change = data;

        $.post('php/getFavorite.php' , {postcode:code , postusername:username} ,
        function(data){
          if(data == "1"){
            alert("Got something wrong");
          }
          else {
            alert("Add successfully~");
            //window.location.href = "login_Register_Admin.php";
            document.getElementById(code).className  = "btn-floating waves-effect waves-light right tooltipped yellow";

          }
        });
      }
    });
  }
</script>
<div class="row">
  <?php
  require 'php/config.php';
  $select = $conn->query("SELECT * FROM recipe");
  $count = 1;
  foreach ($select as $row) {
    $count++;
   ?>
  <div class="col s3">
    <div class="card sticky-action">
      <div class="card-image waves-effect waves-block waves-light">
        <img class="activator" src="<?php  echo $row['cover_img'];?>">
      </div>

      <div class="card-content">
        <span class="card-title activator grey-text text-darken-4"><?php echo $row['name']; ?><i class="material-icons right">more_vert</i></span>
        <script>rate(<?php echo $row['rating']; ?>);</script>
      </div>

      <div class="card-action">
        Type: <?php echo $row['type']; ?>
        <a class="btn-floating waves-effect waves-light red right" href="recipe.php?code=<?php echo $row['code']; ?>"><i class="material-icons">book</i></a>
        <a id="<?php echo $row['code']; ?>" class="btn-floating waves-effect waves-light right tooltipped"  data-position="top" data-tooltip="Add to favorite" onclick="addFavorite('<?php echo $row['code']; ?>')"><i class="material-icons">stars</i></a>
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
  </div> <!--div col s3 END-->
  <?php
    } // foreach END
   ?>
</div> <!--row END-->
