<h3 class="center">Notification</h3>
<a href="#" class="waves-effect waves-light btn" onclick="view_report()">View report status</a>
<a href="#" class="waves-effect waves-light btn" onclick="other_notification()">Other Notification</a>

<div id="report_table" hidden>
  <table>
    <tr>
      <th>Report code</th>
      <th>Status</th>
      <th>Admin response</th>
      <th>Date</th>
    </tr>
  <?php
    $username_notification = $_SESSION['username'];
    $sql_report = $conn->query("SELECT * FROM report_history WHERE username = '$username_notification'");
    foreach ($sql_report as $row_report) {
  ?>
  <tr>
    <td><?php echo $row_report['code']; ?></td>
    <td><?php echo $row_report['status']; ?></td>
    <td><?php echo $row_report['admin_response']; ?></td>
    <td><?php echo $row_report['response_time']; ?></td>
  </tr>
  <?php
    }
   ?>
   </table>
 </div>
 <script type="text/javascript">
   function view_report(){
     var x_report_table = document.getElementById("report_table");
     var x_other_notification = document.getElementById("other_notification");
     x_other_notification.style.display = "none";
       if (x_report_table.style.display === "none") {
           x_report_table.style.display = "block";
       } else {
           x_report_table.style.display = "none";
       }
   }
 </script>

 <div id="other_notification" hidden>
   <?php
      //$username_notification = $_SESSION['username'];
      $sql_notification = $conn->query("SELECT * FROM notification WHERE username = '$username_notification'");
      $count_notification = $sql_notification->rowCount();
      if($count_notification == 0){
        echo "You don't have receive any notification";
      }
      else{
        foreach ($sql_notification as $row_notification) {
    ?>
    <div class="row">
      <div class="col l12 m12 s12">
        <div class="card ">
          <div class="card-content">
            <span class="card-title"><?php echo $row_notification['title'];?></span>
            <p><?php echo $row_notification['reason']; ?></p>
          </div>
        </div>
      </div>
      </div>
  <?php
        } // foreach
      }
   ?>
 </div>
 <script type="text/javascript">
   function other_notification(){
     var x_report_table = document.getElementById("report_table");
     x_report_table.style.display = "none";
     var x_other_notification = document.getElementById("other_notification");
       if (x_other_notification.style.display === "none") {
           x_other_notification.style.display = "block";
       } else {
           x_other_notification.style.display = "none";
       }
   }
 </script>
 <br><br>
