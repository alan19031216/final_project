<div id="bookshelf">
  <?php
    require 'php/config.php';
    $username = $_SESSION['username'];
    $sql_scription = $conn->query("SELECT * FROM subscript WHERE username = '$username'");
    foreach ($sql_scription as $row_scription) {
       $times = $row_scription['times'];
       $subscript_date = $row_scription['subscript_date'];
       $expired_date = $row_scription['expired_date'];
    }

    $sql_count = $conn->query("SELECT * FROM subscript WHERE username = '$username'");
    $number_of_rows = $sql_count->fetchColumn();
    if($number_of_rows > 0){
      $subscript_date = date("Y-m-d", strtotime($subscript_date));
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $current_time = date('y/m/d', time());
      $sub_date = strtotime($subscript_date);
      $date = strtotime("now");
      $date1 = strtotime("$expired_date");
      $t = floor(($date1-$date)/86400);

      // echo $sub_date;
      // echo '<br>';
      // echo $date;
      // echo '<br>';
      // echo $date1;
      // echo '<br>';

      // $date = strtotime('2017/12/2');
      if($date < $sub_date){
        echo '<h4 class="centered">Please wait unit '. $subscript_date .'</h4>';
      }
      elseif ($date >= $sub_date && $date < $date1) {
        $top = $conn->query("SELECT * FROM book");
        foreach ($top as $row_top) {
      ?>
        <a href="../book/<?php echo $row_top['path']; ?>#toolbar=0&navpanes=0&scrollbar=0" target="_blank">
          <p><?php echo $row_top['name']; ?></p>
          <img src="../book/img/<?php echo $row_top['img']; ?>" height="200px">
        </a>
      <?php
        }
      }
      else {
        echo '<h4 class="center" id="txt">Your oder has been expired</h4>';
      }
    }
   ?>
</div>
