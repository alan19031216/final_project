<?php

// configuration
include 'config.php';

$row = $_POST['row'];
$rowperpage = 6;

try {
  // selecting posts
  $query = $conn->query('SELECT * FROM recipe limit 6,'.$rowperpage);

  //$result = mysqli_query($con,$query);

  $html = '';
  $html.= '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">';
  $html.= '<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>';
  //$html .= '<div class="row">';
  foreach ($query as $row_my_recipe) {
    $code = $row_my_recipe['code'];
    $html .= '<div id="post_'.$row_my_recipe['id'].'" class="post">';
    $html .= '<div class="col l4 m6 s12">';
    $html .= '<div class="card sticky-action card-shake hoverable" style="height:500px">';
    $html .= '<div class="card-image waves-effect waves-block waves-light">';
    $html .= '<img class="activator" src="page/'.$row_my_recipe['cover_img'].'" style="width:100%;height:200px;">';
    $html .= '</div>';
    $html .= '<div class="card-content">';
    $html .= '<span class="card-title activator grey-text text-darken-4">'.$row_my_recipe['name'].'<i class="material-icons right">more_vert</i></span>';
    $html .= '<table class="demo-table">';
    $html .= '<tbody>';
    $select_rate = $conn->query("SELECT * FROM tutorial WHERE code = '$code'");
    foreach ($select_rate as $tutorial) {
      $html .= '<tr>';
      $html .= '<td valign="top">';
      $html .= '<div>';
      $html .= '<ul>';
      for($i=1;$i<=5;$i++) {
      $selected = "";
      if(!empty($tutorial["rating"]) && $i<=$tutorial["rating"]) {
      $selected = "selected";
      }
      $html .= '<li class="'.$selected.' hide-on-small-only" id="rate_view_'.$i.'" style="font-size:20px">&#9733;</li>';
      $html .= '<li class="'.$selected.' hide-on-med-and-up" id="rate_view_'.$i.'" style="font-size:45px">&#9733;</li>';
    } // rating - for
    $html .= '</ul>';
    $html .= '</div>';
    $html .= '</td>';
    $html .= '</tr>';
  }// rating - foreach
    $html .= '</tbody>';
    $html .= '</table>';
    $html .= '</div>';
    $html .= '<div class="card-action">';
    $html .= 'Type:'.$row_my_recipe['type'];
    $html .= '<a class="btn-floating waves-effect waves-light red right btn tooltipped a-view_recipe" data-position="right" data-tooltip="View Recipe" href="recipe/'.$row_my_recipe['code'].'"><i class="material-icons">book</i></a>';
    $html .= '<br><br>';
    $html .= '</div>';
    $html .= '<div class="card-reveal">';
    $html .= '<span class="card-title grey-text text-darken-4">'.$row_my_recipe['name'].'<i class="material-icons right">close</i></span>';
    $simple_description = $row_my_recipe['simple_description'];
    if($simple_description == '' || $simple_description == ' '){
      $simple_description = 'He/She is very lazy...Nothings to show';
    }
    $html .= '<p> '.$simple_description.' </p>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    }// recipe
    //$html .= '</div>';
  echo $html;
}
catch (PDOException $e) {
  echo $e;
}
$conn = null;

?>
