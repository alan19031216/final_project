<?php

// configuration
include 'config.php';

$row = $_POST['row'];
//echo $row;
$rowperpage = 5;

// selecting posts
$query = 'SELECT * FROM recipe limit '.$row.','.$rowperpage;
$result = mysqli_query($con,$query);

$html = '';
$count = 0;
$a = array(5 , 6);

$cover_img = array(5);
$code = array(5);
$name = array(5);
$rating = array(5);
$type = array(5);
$simple_description = array(5);

while($row = mysqli_fetch_array($result)){
    $id = $row['id'];

    $cover_img[$count] = $row['cover_img'];
    $name[$count] = $row['name'];
    $code[$count] = $row['code'];
    $rating[$count] = $row['rating'];
    $type[$count] = $row['type'];
    $simple_description[$count] = $row['simple_description'];
    // Creating HTML structure
    $count++;
}

$a = array(
           array($cover_img[0] , $code[0] , $name[0] , $rating[0] , $type[0] , $simple_description[0]),
           array($cover_img[1] , $code[1] , $name[1] , $rating[1] , $type[1] , $simple_description[1]),
           array($cover_img[2] , $code[2] , $name[2] , $rating[2] , $type[2] , $simple_description[2]),
           array($cover_img[3] , $code[3] , $name[3] , $rating[3] , $type[3] , $simple_description[3]),
           array($cover_img[4] , $code[4] , $name[4] , $rating[4] , $type[4] , $simple_description[4])
   );

$last = $con->query("SELECT id FROM testing ORDER BY id DESC LIMIT 1");
//$last_query = mysqli_query($con,$last);
while($row = mysqli_fetch_array($last)){
    $id1 = $row['id'];
    //echo $id1;
}

if($id >= $id1){
  echo "End";
}
else{
  $html .= '<div id="post_'.$id.'" class="post">';
    $html .= '<table>';
      $html .= '<tr>';
      for($i = 0; $i < 5; $i++){
        $html .= '<td>';
          $html .= '<div class="">';
            $html .= '<div class="card medium sticky-action">';
              $html .= '<div class="card-image waves-effect waves-block waves-light">';
                $html .= '<img loop class="activator" src="page/php/'. $a[$i][0] .'">';
              $html .= '</div>';
              $html .= '<div class="card-content">';
                $html .= '<span class="card-title activator grey-text text-darken-4">'.$a[$i][2].'<i class="material-icons right">more_vert</i></span>';
                $html .= '<p>';
                  $html .= '<script>rate(<?php echo $a[$i][3]; ?>);</script>';
                $html .= '</p>';
              $html .= '</div>';

              $html .= '<div class="card-action">';
                $html .= 'Type:'.$a[$i][4].'';
                $html .= '<a class="btn-floating waves-effect waves-light red right" href="recipe.php?code='.$a[$i][2].'"><i class="material-icons">book</i></a>';
              $html .= '</div>';

              $html .= '<div class="card-reveal">';
                $html .= '<span class="card-title grey-text text-darken-4">'.$a[$i][2].'<i class="material-icons right">close</i></span>';
                /*<!--<p>author: <?php //echo $row['usern']; ?></p>-->*/

                $simple_description = $a[$i][5];
                if($simple_description == '' || $simple_description == ' '){
                  $simple_description = 'He/She is very lazy...Nothings to show';
                }

              $html .= '<p> '.$simple_description.'</p>';
            $html .= '</div>';
            $html .= '</div>';
          $html .= '</div> <!--div col s3 END-->';

        $html .= '</td>';
      }
      $html .= '</tr>';
    $html .= '</table>';
  $html .= '</div>';

  echo $html;
}
