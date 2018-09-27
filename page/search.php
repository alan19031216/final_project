<?php
include 'html_php/new_hearder.php';

 ?>

  <?php
    require 'php/config.php';
    $num = $_GET['num'];
    if($num == '0'){
      $code = $_GET['code'];
      $sql = $conn->query("SELECT * FROM recipe WHERE code = '$code'");
      //$count = $sql->rowCount();
      foreach ($sql as $row) {
        $name =  $row['name'];
      }// foreach

      $sql_search = $conn->query("SELECT * FROM recipe WHERE name LIKE '%$name%'");
      $count = $sql_search->rowCount();
    } // if
    else{
      $name = $_GET['search'];
      $sql_search = $conn->query("SELECT name , code FROM recipe WHERE name LIKE '%$name%' UNION SELECT name , code FROM ingredients WHERE name LIKE '%$name%'");
      $count = $sql_search->rowCount();
    }
   ?>

   <div class="container">
     <h3>Search result: <?php echo $name;?></h3>
     <i class="material-icons grid">grid_on</i>
     <i class="material-icons list">view_list</i>
     <hr>
     <script type="text/javascript">
       $(document).ready(function() {
         //alert($('[id=search_result]').length);
       //$('#search_result').addClass('col s12 m6');
       $('i').click(function(e) {
         if ($(this).hasClass('grid')) {
           $('div .div').removeClass('col l12').addClass('col l4 m6 s12');
           // $('div div .card').removeClass('card horizontal').addClass('card');
         } else if ($(this).hasClass('list')) {
           $('div .div').removeClass('col l4 m6 s12').addClass('col l12');
           // $('div div div div .card').removeClass('card').addClass('card horizontal');
         }
       });
       })
     </script>
   <?php
    if($count == '0'){
   ?>
      <h3 style="color:green">Noting to show</h3>
   <?php
      }//if
      else{
    ?>

    <div class="row">
      <?php foreach ($sql_search as $row) {
        $code = $row['code'];
    ?>
      <div class="div col l4 m6 s12">
        <style>
          .demo-table {width: 100%;border-spacing: initial;margin: 10px 0px;word-break: break-word;table-layout: auto;line-height:4.8em;color:#333;}
          .demo-table td {border-bottom: #f0f0f0 1px solid;background-color: #ffffff;padding: 5px;}
          .demo-table ul{margin:0;padding:0;}
          .demo-table li{cursor:pointer;list-style-type: none;display: inline-block;color: #F0F0F0;text-shadow: 0 0 1px #666666;font-size:23px;}
          .demo-table .highlight, .demo-table .selected {color:#F4B30A;text-shadow: 0 0 1px #F48F0A;}
        </style>
            <?php
              $sql = $conn->query("SELECT * FROM recipe WHERE code = '$code'");
              foreach ($sql as $row_my_recipe) {
                $code = $row_my_recipe['code'];
            ?>
          <div class="post" id="post_<?php echo $row_my_recipe['id']; ?>">
            <div class="">
              <div class="card sticky-action card-shake hoverable" style="height:550px">
                <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="<?php echo $row_my_recipe['cover_img'];?>" style="width:100%;height:200px;%;">
                </div>

                <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4"><?php echo $row_my_recipe['name']; ?><i class="material-icons right">more_vert</i></span>

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
                  <br><br>
                  <a class="btn-floating waves-effect waves-light red right btn tooltipped a-view_recipe" data-position="right" data-tooltip="View Recipe" href="recipe/<?php echo $row_my_recipe['code']; ?>"><i class="material-icons">book</i></a>
                  <!-- <a id="<?php echo $row_my_recipe['code']; ?>" class="btn-floating waves-effect waves-light right tooltipped"  data-position="top" data-tooltip="Add to favorite" onclick="addFavorite('<?php echo $row_my_recipe['code']; ?>')"><i class="material-icons">stars</i></a> -->
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
              </div>
            </div> <!--div col s3 END-->
            <?php
              }
             ?>

      </div>
    <?php
      } // foreach
    } // else
   ?>
    </div>

   </div>
  </body>
</html>
