<select class="browser-default" id="change1" onclick="select_onchange('1');">
  <option disabled selected>Choose your option</option>
  <?php
     require 'php/config.php';
     $sql_category = $conn->query("SELECT * FROM category ORDER BY name ASC");
     foreach ($sql_category as $row_category) {
 ?>
   <option value="<?php echo $row_category['name']; ?>"><?php echo $row_category['name']; ?></option>
 <?php
   }
 ?>
<option value="Request">Request</option></select>
