<?php
require 'php/config.php';
$username = $_GET['username'];

$sql = $conn->query("SELECT * FROM todolist WHERE username = '$username'");
$sql_count = $sql->rowCount();
if($sql_count == 0){
  print "<h5 class='center'>You haven't add any task yet</h5>";
}else{
?>
<table class="striped">
  <thead>
    <tr>
      <th></th>
      <th>Task</th>
      <th>Complete / Delete</th>
    </tr>
  </thead>

<?php

  $count = 1;
  foreach ($sql as $row) {
    $id = $row['id'];
?>

  <tr>
    <td><?php echo $count++; ?></td>
    <td><?php echo $row['task']; ?></td>
    <td><a onclick="delete1(<?php echo $id; ?>)"><i class="material-icons">all_inclusive</i></a></td>
  </tr>
<?php
} // foreach
}// else
 ?>
</table>
