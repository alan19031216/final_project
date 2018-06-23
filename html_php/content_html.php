
<?php
  require 'php/config.php';
  $count_row = $conn->query("SELECT * FROM recipe");
  $count = 0;
    foreach ($count_row as $row) {
      $count++;
    }
 ?>

<div class="row hide-on-small-only post" id="post_<?php echo $id; ?>">
  <?php
  $select = $conn->query("SELECT * FROM recipe LIMIT 4");
  foreach ($select as $row) {
    $code = $row['code'];
   ?>
  <div class="col l3 m6 s12">
    <div class="card medium sticky-action" style="height:450px">
      <div class="card-image waves-effect waves-block waves-light">

        <img loop class="activator" src="page/php/<?php  echo $row['cover_img'];?>">
      </div>

      <div class="card-content">
        <span class="card-title activator grey-text text-darken-4"><?php echo $row['name']; ?><i class="material-icons right">more_vert</i></span>

        <style>
           ul{margin:0;padding:0;}
           li{cursor:pointer;list-style-type: none;display: inline-block;color: #F0F0F0;text-shadow: 0 0 1px #666666;font-size:25px;}
           .highlight, .selected {color:#F4B30A;text-shadow: 0 0 1px #F48F0A;}
        </style>

        <?php
          $select_rate = $conn->query("SELECT * FROM tutorial WHERE code = '$code'");
          foreach ($select_rate as $tutorial) {
        ?>

              <div id="tutorial-<?php echo $tutorial["id"]; ?>">
                <ul onMouseOut="resetRating(<?php echo $tutorial["id"]; ?>);">
                  <?php
                  for($i=1;$i<=5;$i++) {
                  $selected = "";
                  if(!empty($tutorial["rating"]) && $i<=$tutorial["rating"]) {
                  $selected = "selected";
                  }
                  ?>
                  <li class='<?php echo $selected; ?>'>
                     &#9733;
                   </li>
                  <?php
                    } // , <?php echo $tutorial['code'];  ?>
                </ul>
                </div>
          <?php
            }
          ?>
      </div>

      <div class="card-action">
        Type: <?php echo $row['type']; ?>
        <a class="btn-floating waves-effect waves-light red right" href="recipe.php?code=<?php echo $row['code']; ?>"><i class="material-icons">book</i></a>
      </div>


      <div class="card-reveal">
        <span class="card-title grey-text text-darken-4"><?php echo $row['name']; ?><i class="material-icons right">close</i></span>
        <!--<p>author: <?php //echo $row['usern']; ?></p>-->
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
   <br><br>
   <h4 class="center-align">You may also like</h4>
   <br>
   <div class="">
     <table>
       <?php
       $count_row = $conn->query("SELECT * FROM recipe");
       $allcount = $count_row->rowCount();
       //echo $allcount;
       $temp = $count/4;
       $total = ceil($temp);
       if($total > 5){
         $total = 4;
       }
       //echo $total;
       $a = 1;
       $b = 5;
       $c = 0;
        for($i = 0; $i < $total; $i++){
          //echo $c;
        ?>
       <tr>
         <?php
         $select_all = $conn->query("SELECT * FROM recipe LIMIT $a , $b");
         foreach ($select_all as $row) {
           $name = $row['name'];
           print '<td>';
           ?>
           <div class="">
             <div class="card medium sticky-action">
               <div class="card-image waves-effect waves-block waves-light">
                 <img loop class="activator" src="page/php/<?php  echo $row['cover_img'];?>">
               </div>

               <div class="card-content">
                 <span class="card-title activator grey-text text-darken-4"><?php echo $row['name']; ?><i class="material-icons right">more_vert</i></span>
                 <?php
                   $select_rate1 = $conn->query("SELECT * FROM tutorial WHERE code = '$code'");
                   foreach ($select_rate1 as $tutorial1) {
                 ?>

                       <div id="tutorial-<?php echo $tutorial1["id"]; ?>">
                         <ul onMouseOut="resetRating(<?php echo $tutorial1["id"]; ?>);">
                           <?php
                           for($i=1;$i<=5;$i++) {
                           $selected = "";
                           if(!empty($tutorial1["rating"]) && $i<=$tutorial1["rating"]) {
                           $selected = "selected";
                           }
                           ?>
                           <li class='<?php echo $selected; ?>'>
                              &#9733;
                            </li>
                           <?php
                             } // , <?php echo $tutorial['code'];  ?>
                         </ul>
                         </div>
                   <?php
                     }
                   ?>

               </div>

               <div class="card-action">
                 Type: <?php echo $row['type']; ?>
                 <a class="btn-floating waves-effect waves-light red right" href="recipe.php?code=<?php echo $row['code']; ?>"><i class="material-icons">book</i></a>
               </div>


               <div class="card-reveal">
                 <span class="card-title grey-text text-darken-4"><?php echo $row['name']; ?><i class="material-icons right">close</i></span>
                 <!--<p>author: <?php //echo $row['usern']; ?></p>-->
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
           print '</td>';
           //echo $c++;
         }
         $a+=5;
          ?>
       </tr>
      <?php } ?>
     </table>
   </div>
</div> <!--row END-->
<center>
  <div class="hide-on-small-only">
    <h1 class="load-more">Load More</h1>
    <input type="hidden" id="row" value="0">
    <input type="hidden" id="all" value="<?php echo $allcount; ?>">
  </div>

</center>


<div class="hide-on-med-and-up show-on-small">
  <?php
    include 'html_php/content_html_phone.php';
   ?>
</div>
