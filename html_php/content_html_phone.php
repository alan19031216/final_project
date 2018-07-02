<?php
require 'php/config.php';
$select = $conn->query("SELECT * FROM recipe LIMIT 4");
foreach ($select as $row) {
 ?>
<div class="col s3">
  <div class="card medium sticky-action">
    <div class="card-image waves-effect waves-block waves-light">
      <img loop class="activator" src="page/<?php  echo $row['cover_img'];?>">
    </div>

    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4"><?php echo $row['name']; ?><i class="material-icons right">more_vert</i></span>
      <p>
        <script>rate(<?php echo $row['rating']; ?>);</script>
      </p>
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

 <div class="">
   <h4 class="center-align">You may also like</h4>
   <div class="">
     <table>
       <?php
       $select_all_phone = $conn->query("SELECT * FROM recipe");
       foreach ($select_all_phone as $row) {
         ?>
         <tr style="border-bottom:1pt solid black;">
           <td>
             <img loop class="activator" src="page/<?php  echo $row['cover_img'];?>" style="width:60%;height:40%;">
           </td>

           <td>
             <a href="recipe.php?code=<?php echo $row['code']; ?>"><b><span class="card-title activator grey-text text-darken-4"><?php echo $row['name']; ?></span></b> </a>
           </td>
         </tr>
         <?php
       }
        ?>
     </table>
   </div>
 </div>
