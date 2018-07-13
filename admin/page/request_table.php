<div class="" style="padding:30px">
  <form class="" id="request_form" method="post">
    <button class="btn" id="check-all" type="button" name="button">Check all</button>
    <button class="btn red" id="uncheck-all" type="button" name="button">Uncheck all</button>
    <script type="text/javascript">
    $(document).ready(function() {
      $("#uncheck-all").hide();
      $('#check-all').click(function(){
        $("input:checkbox").attr('checked', true);
        $("#check-all").hide();
        $("#uncheck-all").show();
        if (($("input:checkbox:checked").length) > 1) {
          var btn = document.getElementsByName("approve");
          for (var i = 0; i < btn.length; i++) {
            btn[i].style.visibility = 'hidden';
          }
          var btn_r = document.getElementsByName("reject");
          for (var i = 0; i < btn_r.length; i++) {
            btn_r[i].style.visibility = 'hidden';
          }
          document.getElementById("all").style.display = "block";
        }
      });
      $('#uncheck-all').click(function(){
        $("input:checkbox").attr('checked', false);
        $("#check-all").show();
        $("#uncheck-all").hide();
        if (($("input:checkbox:checked").length) < 1) {
          var btn = document.getElementsByName("approve");
          for (var i = 0; i < btn.length; i++) {
            btn[i].style.visibility = 'visible';
          }
          var btn_r = document.getElementsByName("reject");
          for (var i = 0; i < btn_r.length; i++) {
            btn_r[i].style.visibility = 'visible';
          }
          document.getElementById("all").style.display = "none";
        }
      });
    });
    </script>
    <table>
      <thead>
      <tr>
          <th></th>
          <th>Name</th>
          <th>Request date</th>
          <th>Action</th>
      </tr>
      </thead>

      <?php
        session_start();
        require 'php/config.php';
        $sql_category = $conn->query("SELECT * FROM request");
        $count = 1;
        foreach ($sql_category as $row_category) {
          $count++;
      ?>
        <tr>
          <td>
            <input name="check[]" id="checkbox_<?php echo $count; ?>" type="checkbox" value="<?php echo $row_category['name'] ?>" onclick="check_change()">
            <label for="checkbox_<?php echo $count; ?>">&nbsp;</label>
          </td>
          <td><?php echo $row_category['name']; ?></td>
          <td><?php echo $row_category['request_date']; ?></td>
          <td>
            <button class="btn" type="button" name="approve" id="btn_approve" onclick="approve('<?php echo $row_category['id'] ?>')">Approve</button>
            <button class="btn red" type="button" name="reject" onclick="reject('<?php echo $row_category['id'] ?>')">Reject</button>
          </td>
        </tr>
      <?php
        }
      ?>
    </table>
    <input type="hidden" name="type" value="0">
    <input type="hidden" name="approver" id="approver" value="<?php echo $_SESSION['username']; ?>">
    <div class="center" id="all" hidden>
      <hr>
      <button class="btn" type="submit" name="submit_all" onclick="submit_all_1()">Approve</button>
      <button class="btn red" type="submit" name="reject_all" onclick="reject_all_1()">Reject</button>
    </div>
  </form>
</div>

<script type="text/javascript">
function submit_all_1(){
  //alert("a");
  var r = confirm("Do you confirm approve all?");
  if (r == true) {
    document.getElementById('request_form').action = 'php/approve_request.php';
    return true;
  } else {
      //break;
      return false;
  }
}

function reject_all_1(){
  var r = confirm("Do you confirm reject all?");
  if (r == true) {
    document.getElementById('request_form').action = 'php/reject_request.php'
    return true;
  } else {
      return false;
  }
  //alert("a");
}
</script>
