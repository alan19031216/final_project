<link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>

<div class="input-field col s6">
<select class="icons" required>
  <option value="" disabled selected>Choose your option</option>
  <option>a</option>
  <option>Mbeat</option>
  <option value="dessert" data-icon="img/food/Chinese food.jpg" class="left circle">Dessert</option>
</select>
<label>Type</label>
</div>

<script type="text/javascript">
$(document).ready(function() {
$('select').material_select();
}); 
</script>
