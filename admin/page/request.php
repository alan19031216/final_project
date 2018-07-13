<div class="" >

<div id="page-content">
    <?php
        require 'request_table.php';
     ?>
</div>


  <script type="text/javascript">
  function check_change(){
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
    else{
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
  }

  function approve(a){
    var r = confirm("Do you want to add this into category");
    if (r == true) {
      var approver = document.getElementById('approver').value;
      //alert(approver);
      $.ajax({
        type:"POST",
        url:"php/approve_request.php",
        data: 'approver=' + approver +
              '&id=' + a +
              '&type=1',
        success: function(data){
          if(data == 1){
            //alert(data);
            alert('Add successful');
            $('#page-content').fadeOut('slow', function(){
                $('#page-content').load('request_table.php', function(){
                    // fade in effect
                    $('#page-content').fadeIn('slow');
                });
            });

          }
          else {
            //alert(data);
            alert("Got some problem");
            location.reload();
          }
        }
      }); // ajax
    }
  }// approve

  function reject(b){
    var r = confirm("Do you want to reject this request");
    if (r == true) {
      var approver = document.getElementById('approver').value;
      //alert(approver);
      $.ajax({
        type:"POST",
        url:"php/reject_request.php",
        data: 'approver=' + approver +
              '&id=' + b +
              '&type=1',
        success: function(data){
          if(data == 1){
            //alert(data);
            alert('Reject successful');
            $('#page-content').fadeOut('slow', function(){
                $('#page-content').load('request_table.php', function(){
                    // fade in effect
                    $('#page-content').fadeIn('slow');
                });
            });

          }
          else {
            //alert(data);
            alert("Got some problem");
            location.reload();
          }
        }
      }); // ajax
    }
  } // reject


  </script>
</div>
