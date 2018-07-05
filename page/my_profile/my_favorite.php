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
    $code = $row_my_favorite['code'];
?>
<div class="col l4 m6 s12">
  <div class="card sticky-action">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="<?php echo $row_my_favorite['cover_img'];?>">
    </div>

    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4"><?php echo $row_my_favorite['name']; ?><i class="material-icons right">more_vert</i></span>
      <style>
        .demo-table {width: 100%;border-spacing: initial;margin: 10px 0px;word-break: break-word;table-layout: auto;line-height:4.8em;color:#333;}
        .demo-table td {border-bottom: #f0f0f0 1px solid;background-color: #ffffff;padding: 5px;}
        .demo-table ul{margin:0;padding:0;}
        .demo-table li{cursor:pointer;list-style-type: none;display: inline-block;color: #F0F0F0;text-shadow: 0 0 1px #666666;font-size:23px;}
        .demo-table .highlight, .demo-table .selected {color:#F4B30A;text-shadow: 0 0 1px #F48F0A;}
      </style>
      <table class="demo-table">
        <tbody>
        <?php
          //$code = $_GET['code'];
          $select_rate = $conn->query("SELECT * FROM tutorial WHERE code = '$code'");
          foreach ($select_rate as $tutorial) {
        ?>
        <tr>
          <td valign="top">
              <div>
                <ul >
                  <?php
                  for($i=1;$i<=5;$i++) {
                  $selected = "";
                  if(!empty($tutorial["rating"]) && $i<=$tutorial["rating"]) {
                  $selected = "selected";
                  }
                  ?>
                  <li class="<?php echo $selected; ?> hide-on-small-only" id="rate_view_<?php echo $i; ?>" style="font-size:20px">
                     &#9733;
                   </li>
                   <li class="<?php echo $selected; ?> hide-on-med-and-up" id="rate_view_<?php echo $i; ?>" style="font-size:45px">
                      &#9733;
                    </li>
                  <?php } // , <?php echo $tutorial['code'];  ?>
                </ul>
              </div>
            </td>
        </tr>
        <?php
          }
        ?>
        </tbody>
      </table>
    </div>

    <div class="card-action">
      Type: <?php echo $row_my_favorite['type']; ?>
      <input type="hidden" id="username" value="<?php echo $_SESSION['username'];?>">
      <a class="btn-floating waves-effect waves-light red right tooltipped" data-position="right" data-tooltip="View recipe" href="recipe/<?php echo $row_my_favorite['code']; ?>"><i class="material-icons">book</i></a>
      <a id="<?php echo $row_my_favorite['code']; ?>" class="btn-floating waves-effect waves-light right tooltipped"  data-position="top" data-tooltip="Unfavorite" onclick="Unfavorite('<?php echo $row_my_favorite['code']; ?>')"><i class="material-icons">stars</i></a>
      <br><br>
    </div>

    <script type="text/javascript">
      function Unfavorite(code){
        var username = document.getElementById('username').value;
        if (confirm("Do want to unfavorite it??")) {
          $.post('php/getUNFavorite.php' , {postcode:code , postusername:username} ,
          function(data){
            if(data == "1"){
              alert("Remove successfully");
              location.reload();
              //alert(data);
              //window.location.href = "login_Register_Admin.php";
            }
            else {
              alert("Got something wrong");
            }
          });
        }else {

          }
      }// unfavorite function
    </script>
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
