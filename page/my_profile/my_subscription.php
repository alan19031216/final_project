<h3>My subscription</h3>
<h4 id="subscript_h4">You haven't subscript any book</h4>
<?php
  $sql_scription = $conn->query("SELECT * FROM subscript WHERE username = '$username'");
  foreach ($sql_scription as $row_scription) {
     $times = $row_scription['times'];
     $subscript_date = $row_scription['subscript_date'];
     $expired_date = $row_scription['expired_date'];
  }
  if($sql_scription){
  }
  $sql_count = $conn->query("SELECT * FROM subscript WHERE username = '$username'");
  $number_of_rows = $sql_count->fetchColumn();
  if($number_of_rows > 0){
    $subscript_date = date("d-m-y", strtotime($subscript_date));
    date_default_timezone_set("Asia/Kuala_Lumpur");
        //echo date('d-m-Y H:i:s'); //Returns IST
    $current_time = date('y/m/d', time());
    //$expired_date = date("y/m/d", strtotime($expired_date));
    $date = strtotime("now");
    $date1 = strtotime("$expired_date");
    //$date=floor((strtotime($expired_date)-strtotime($current_time))/86400);
    //$t = floor(($date1-$date)/86400);
    $t = floor(($date1-$date)/86400);

    //$t = date('d h:i:s', $diff);
  }

 ?>
 <input type="hidden" id="subscript_date" name="" value="<?php echo $subscript_date; ?>">
 <input type="hidden" id="expired_date" name="" value="<?php echo $expired_date; ?>">
 <script type="text/javascript">
 $(document).ready(function(){
   var number_of_row = '<?php echo $number_of_rows;  ?>';
   //alert(number_of_row);
   if(number_of_row == 0){
     document.getElementById("subscript_table").style.visibility = "hidden";
     document.getElementById("subscript_h4").style.visibility = "visible";
   }
   else{
     document.getElementById("subscript_h4").style.visibility = "hidden";
   }
   var subscript_date = document.getElementById('subscript_date').value;
   var expired_date = document.getElementById('expired_date').value;
   // //alert(subscript_date);
   // //subscript_date = new Date(subscript_date);
   // var d = new Date();
   // //expired_date = new Date(expired_date);
   // //var diff = Math.abs(expired_date-d);
   // //alert(expired_date);
   // var diff = Math.round((expired_date - subscript_date)/(1000*60*60*24));
   // document.getElementById("lifetime").innerHTML = diff + " day(s)";
  // var a = diff.getDay();
   //alert(diff);
  });
 </script>
<table id="subscript_table">
  <thead>
    <tr>
      <th>Monthly</th>
      <th>Order date</th>
      <th>Expired date</th>
      <th>Life times</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $times; ?></td>
      <td><?php echo $subscript_date; ?></td>
      <td><?php echo $expired_date; ?></td>
      <td id="lifetime"><?php echo $t; ?>day(s)</td>
      <td><a href="#modal1" class="waves-effect waves-light btn red modal-trigger"><i class="material-icons right">cancel</i>Cancel</a></td>
    </tr>
  </tbody>
</table>

<div id="modal1" class="modal modal-fixed-footer">
  <!-- <form> -->
  <ul class="stepper horizontal" id="horizontal">
     <li class="step active">
        <div data-step-label="Confirm!" class="step-title waves-effect waves-dark">Step 1</div>
        <div class="step-content">
           <div class="row">
             <h3>Do you comfirm to unsubscript it?</h3>
              <input type="checkbox" id="check" onclick="check1()">
              <label for="check">Accpet all the team of condition</label>
           </div>
           <div class="step-actions">
              <!-- <a href="#!" class="modal-close waves-effect waves-green btn red">Cancel</a> -->
              <button class="waves-effect waves-dark btn blue next-step" id="button1" disabled onclick="code()">CONTINUE</button>
              <button class="modal-close waves-effect waves-dark btn-flat previous-step">Cancel</button>
           </div>
        </div>
     </li>
     <script type="text/javascript">
     var cancel_code = "";
       function check1(){
         var check = document.getElementById("check").checked;
         if(check == true){
           document.getElementById("button1").disabled = false;
         }
         else {
          document.getElementById("button1").disabled = true;
         }
       }

       function code(){
         var username = document.getElementById("username").value;
         //alert(username);
         $.ajax({
          type:"POST",
          url:"php/cancel_subscript.php",
          data: 'username=' + username,
          success: function(data){
            if(data == "1"){
              //var data1 = 180 - parseInt(data);
              //alert(data);
              alert("please wait 180s");
              $('.stepper').prevStep();
            }
            else if(data == "fail"){
              //alert(data);
              alert("Got some problem, please try again");
              location.reload();
            }
            else{
               cancel_code = data;
              // alert(cancel_code);
              //alert(data);
            }
          }
        });
       }
     </script>
     <li class="step">
        <div class="step-title waves-effect waves-dark">Step 2</div>
        <div class="step-content">
           <div class="row">
             <p>YOu can go to check you mail box and the code.</p>
             <style media="screen">
             input.browser-default{
                padding: 10px;
                border: 1px solid #ddd;
                width: 50px;
                height: 50px;
                text-align: center;
                font-size: 30px;
                text-transform:uppercase;
              }
             </style>
              <div class="input-field col s12">
                <input class="browser-default" type="text" maxlength=1 id="1" required onkeyup="moveOnMax(this,'a')" />
                <input class="browser-default" type="text" maxlength=1 id="a" required onkeyup="moveOnMax(this,'b')" />
                <input class="browser-default" type="text" maxlength=1 id="b" required onkeyup="moveOnMax(this,'c')" />
                <input class="browser-default" type="text" maxlength=1 id="c" required onkeyup="moveOnMax(this,'d')"/>
                <input class="browser-default" type="text" maxlength=1 id="d" required onkeyup="moveOnMax(this,'e')" />
                <input class="browser-default" type="text" maxlength=1 id="e" required onkeyup="moveOnMax(this,'g')"/>
                <input class="browser-default" type="hidden" maxlength=1 id="g"/>
                <br>
                <span id="result"></span>
              </div>
              <script type="text/javascript">
                moveOnMax = function (field, nextFieldID) {
                  if (field.value.length == 1) {
                      document.getElementById(nextFieldID).focus();
                  }
                  $(document).ready(function(){
                    var a = document.getElementById("1").value;
                    var b = document.getElementById("a").value;
                    var c = document.getElementById("b").value;
                    var d = document.getElementById("c").value;
                    var e = document.getElementById("d").value;
                    var f = document.getElementById("e").value;
                    //alert(f);
                    var final = a.concat(b,c,d,e,f).toUpperCase().toString();

                   if(cancel_code == final){
                    //if(final == "123123"){
                      document.getElementById("result").innerHTML = "t";
                      document.getElementById("step2_button").disabled = false;
                    }
                    else {
                      document.getElementById("result").innerHTML = "Code incorrect or incomplete!";
                      document.getElementById("step2_button").disabled = true;
                    }
                  });
                }
              </script>
           </div>
           <div class="step-actions">
              <button onclick="succes_cancel()" class="waves-effect waves-dark btn blue next-step" id="step2_button" disabled >CONTINUE</button>
              <button class="modal-close waves-effect waves-dark btn-flat previous-step">BACK</button>
           </div>
        </div>
        <script type="text/javascript">
        var username = document.getElementById("username").value;
          function succes_cancel(){
            $.ajax({
             type:"POST",
             url:"php/cancel_subscript_2.php",
             data: 'username=' + username + '&code=' + cancel_code,
             success: function(data){
               if(data == "1"){
                 //alert();
               }
               else {
                 alert("Your cancel has not been success!Please try again");
                 //alert(data);
               }
             }
           });
          }
        </script>
     </li>
     <li class="step">
        <div class="step-title waves-effect waves-dark">Step 3</div>
        <div class="step-content">
           Finish!
           <div class="step-actions">
             <a href="my_profile.php?city='My_subscription'" class="modal-close waves-effect waves-dark btn blue">SUBMIT</a>
             <!-- <button class="modal-close waves-effect waves-dark btn blue" type="" onclick="submit()"></button> -->
           </div>
        </div>
     </li>
  </ul>
  <!-- </form> -->
  <script type="text/javascript">
    function submit(){
      alert('1');
      //window.location.href = "my_profile.php?city='My_subscription'";
      //location.reload();
    }
  </script>
</div> <!-- modal -->

<script type="text/javascript">
$(document).ready(function(){
   $('.stepper').activateStepper();
});
</script>
  <br><br>
    <a class="waves-effect waves-light btn right" onclick="history()">View history</a>


<br><br>
<div id="subscript_history" hidden>
  <h3>History</h3>
  <table class="centered">
    <thead>
      <tr>
        <th></th>
        <th>Monthly</th>
        <th>Order date</th>
        <th>Expired date</th>
        <th>Cancel date</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $count_history = 1;
      $sql_history = $conn->query("SELECT * FROM subs_history WHERE username = '$username'");
      foreach ($sql_history as $row_history) {
         // $times_history = $row_history['times'];
         // $subscript_date_history = $row_history['subscript_date'];
         // $expired_date_history = $row_history['expired_date'];
         // $status = $row_history['status'];
        $cancel_date = $row_history['cancel_date'];
         // //echo $times_history;
         if($cancel_date == "0000-00-00"){
           $cancel_date = " - ";
         }
      ?>
      <tr>
        <td><?php echo $count_history++; ?>)</td>
        <td><?php echo $row_history['times']; ?></td>
        <td><?php echo $row_history['subscript_date']; ?></td>
        <td><?php echo $row_history['expired_date']; ?></td>
        <td><?php echo $cancel_date; ?></td>
        <td><?php echo $row_history['status']; ?></td>
      </tr>
     <?php
        } // foreach $sql_history
      ?>
    </tbody>
  </table>
  <br><br><br>
</div>
<script type="text/javascript">
  function history(){
    var x = document.getElementById("subscript_history");
      if (x.style.display === "none") {
          x.style.display = "block";
      } else {
          x.style.display = "none";
      }
  }
</script>
