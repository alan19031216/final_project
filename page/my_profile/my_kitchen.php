<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<h3 class="center">My Kitchen</h3>
<br>
<a class="waves-effect waves-light btn" id="edit_recipe">Edit</a>
<a class="waves-effect waves-light btn red" id="delete1">Delete</a>
<!-- <a class="btn tooltipped" data-position="top" data-tooltip="I am a tooltip"> Top</a> -->

<hr>
<script type="text/javascript">
var count_shake = 0;
$(document).ready(function(){
  $(".a-shake").hide();
  $(".a-edit").hide();
    $("#delete1").click(function(){
      if(count_shake == 0){
        $("#edit_recipe").hide();
        $("div .card-shake").addClass("shake");
        $(".a-shake").show();
        $(".a-view_recipe").hide();
        $(".a-save_to_draft").hide();
        $("#delete1").removeClass("red");
        $("#delete1").addClass("blue");
        $("#delete1").text("Done");
        count_shake = 1;
      }
      else if (count_shake == 1) {
        $("#edit_recipe").show();
        $("div .card-shake").removeClass("shake");
        $("#delete1").removeClass("blue");
        $(".a-shake").hide();
        $(".a-view_recipe").show();
        $(".a-save_to_draft").show();
        $("#delete1").addClass("red");
        $("#delete1").text("Delete");
        count_shake = 0;
      }
        //alert("a");
    });

    $("#edit_recipe").click(function(){
      if(count_shake == 0){
        $("#delete1").hide();
        $(".a-view_recipe").hide();
        $(".a-save_to_draft").hide();
        $(".a-edit").show();
        $("#edit_recipe").removeClass("green");
        $("#edit_recipe").addClass("pink");
        $("#edit_recipe").text("Done");
        count_shake = 1;
      }
      else if (count_shake == 1) {
        $("#delete1").show();
        $(".a-edit").hide();
        $(".a-view_recipe").show();
        $(".a-save_to_draft").show();
        $("#edit_recipe").removeClass("pink");
        $("#edit_recipe").addClass("green");
        $("#edit_recipe").text("Edit");
        count_shake = 0;
      }
        //alert("a");
    });
});
</script>
<style media="screen">
  @-webkit-keyframes spaceboots {
  0% {
    -webkit-transform: translate(2px, 1px) rotate(0deg);
  }
  10% {
    -webkit-transform: translate(-1px, -2px) rotate(-1deg);
  }
  20% {
    -webkit-transform: translate(-3px, 0px) rotate(1deg);
  }
  30% {
    -webkit-transform: translate(0px, 2px) rotate(0deg);
  }
  40% {
    -webkit-transform: translate(1px, -1px) rotate(1deg);
  }
  50% {
    -webkit-transform: translate(-1px, 2px) rotate(-1deg);
  }
  60% {
    -webkit-transform: translate(-3px, 1px) rotate(0deg);
  }
  70% {
    -webkit-transform: translate(2px, 1px) rotate(-1deg);
  }
  80% {
    -webkit-transform: translate(-1px, -1px) rotate(1deg);
  }
  90% {
    -webkit-transform: translate(2px, 2px) rotate(0deg);
  }
  100% {
    -webkit-transform: translate(1px, -2px) rotate(-1deg);
  }
  }

  .shake {
  -webkit-animation-name: spaceboots;
  -webkit-animation-duration: 0.8s;
  -webkit-transform-origin: 50% 50%;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-timing-function: linear;
  }
</style>
<?php
  $username = $_SESSION['username'];
  $sql_my_recipe = $conn->query("SELECT * FROM recipe WHERE username = '$username'");
  $count_my_recipe = $sql_my_recipe->rowCount();
  if ($count_my_recipe == 0) {
    echo "<h3>You doesn't has post any recipe yet</h3>";
  }
  else {
    foreach ($sql_my_recipe as $row_my_recipe) {
      $code = $row_my_recipe['code'];
?>

  <div class="col l4 m6 s12">
    <div class="card sticky-action card-shake" style="height:500px">
      <div class="card-image waves-effect waves-block waves-light">
        <img class="activator" src="<?php echo $row_my_recipe['cover_img'];?>" style="width:100%;height:200px;%;">
      </div>

      <div class="card-content">
        <span class="card-title activator grey-text text-darken-4"><?php echo $row_my_recipe['name']; ?><i class="material-icons right">more_vert</i></span>
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
        Type: <?php echo $row_my_recipe['type']; ?>
        <a class="btn-floating waves-effect waves-light red right btn tooltipped a-view_recipe" data-position="right" data-tooltip="View Recipe" href="recipe/<?php echo $row_my_recipe['code']; ?>"><i class="material-icons">book</i></a>
        <!-- <a id="<?php echo $row_my_recipe['code']; ?>" class="btn-floating waves-effect waves-light right tooltipped"  data-position="top" data-tooltip="Add to favorite" onclick="addFavorite('<?php echo $row_my_recipe['code']; ?>')"><i class="material-icons">stars</i></a> -->
        <a id="draft_<?php echo $row_my_recipe['code']; ?>" class="btn-floating waves-effect waves-light yellow darken-3 right btn tooltipped a-save_to_draft" data-position="top" data-tooltip="Save to draft" onclick="save_to_draft('<?php echo $row_my_recipe['id']; ?>')"><i class="material-icons">file_download</i></a>
        <a class="btn-floating waves-effect waves-light red darken-3 right btn tooltipped a-shake" data-position="left" data-tooltip="Delete recipe" onclick="delete_1('<?php echo $row_my_recipe['id']; ?>')">
          <i class="material-icons">delete_forever</i>
        </a>
        <a class="btn-floating waves-effect waves-light green darken-3 right btn tooltipped a-edit" data-position="top" data-tooltip="Edit recipe">
          <div class='recipe_code2 display-none' hidden><?php echo $row_my_recipe['code']; ?></div>
          <i class="material-icons">edit</i>
        </a>
        <br><br>
      </div>

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
<script type="text/javascript">

$(document).on('click', '.a-edit', function(){
  var recipe_code = $(this).find('.recipe_code2').text();
  //alert(recipe_code);

  // hide create product button
  $('#row_card').hide();

  //fade out effect first
  $('#all_row').fadeOut('slow', function(){
      $('#page-content_message').load('edit_recipe.php?recipe_code=' + recipe_code , function(){
      //$('#page-content').load('question_question.php', function(){
          // hide loader image
          //$('#loader-image').hide();

          // fade in effect
          $('#page-content_message').fadeIn('slow');
      });
  });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
$('.tooltipped').tooltip({delay: 50});
});
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

<script type="text/javascript">
  function delete_1(a){
    //alert(a);
    var r = confirm("Do you want to delete this recipe?");
    if (r == true) {
      $.ajax({
        type:"POST",
        url:"php/delete_recipe.php",
        data: 'draft_id=' + a,
        success: function(data){
          if(data == 1){
            //alert(data);
            alert("Delete success");
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
