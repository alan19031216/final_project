<?php
include 'html_php/new_hearder.php';
include 'php/config.php';
$username = $_SESSION['username'];
 ?>
 <style>
    /* Style the tab content */
    .tabcontent {
       display: none;
       padding: 6px 12px;
       -webkit-animation: fadeEffect 1s;
       animation: fadeEffect 1s;
    }

    /* Fade in tabs */
    @-webkit-keyframes fadeEffect {
       from {opacity: 0;}
       to {opacity: 1;}
    }
    </style>
  <br>

  <div class="row">
    <div class="col l2 m4 tab">
      <br>
      <a href="#" onclick="openCity(event, 'My Favorite')"><div class="col l12 waves-effect waves-light btn">
        My Favorite
      </div></a>
      <br><br>
      <a href="#" onclick="openCity(event, 'Paris')"><div class="col l12 waves-effect waves-light btn">
        My kitchen
      </div></a>
      <br><br>
      <a href="#" onclick="openCity(event, 'Tokyo')"><div class="col l12 waves-effect waves-light btn">
        My question
      </div></a>
      <br><br>
      <a href="#" ><div class="col l12 waves-effect waves-light btn">
        Message
      </div></a>
      <br><br>
      <a href="#" ><div class="col l12 waves-effect waves-light btn">
        Upload recipe
      </div></a>
      <br><br>
      <a href="#" ><div class="col l12 waves-effect waves-light btn">
        My fraft
      </div></a>
      <br><br>
      <a href="#" onclick="openCity(event, 'My subscription')"><div class="col l12 waves-effect waves-light btn">
        My subscription
      </div></a>
      <br><br>
        <a href="#" ><div class="col l12 waves-effect waves-light btn">
        My profile
      </div></a>
      <br>
    </div><!-- tab -->
    <br>
    <div class="col l10 m8 grey lighten-3">
      <div id="My Favorite" class="tabcontent">
        <h3>London</h3>
        <p>London is the capital city of England.</p>
      </div>

      <div id="My subscription" class="tabcontent">
        <h3>My subscription</h3>
        <?php
          $sql_scription = $conn->query("SELECT * FROM subscript WHERE username = '$username'");
          foreach ($sql_scription as $row_scription) {
             $times = $row_scription['times'];
             $subscript_date = $row_scription['subscript_date'];
             $expired_date = $row_scription['expired_date'];
          }
          $subscript_date = date("d-m-y", strtotime($subscript_date));
          $expired_date = date("d-m-y", strtotime($expired_date));

          $sql_history = $conn->query("SELECT * FROM subs_history WHERE username = '$username'");
          foreach ($sql_history as $row_history) {
             $times_history = $row_history['times'];
             $subscript_date_history = $row_history['subscript_date'];
             $expired_date_history = $row_history['expired_date'];
             $status = $row_history['status'];
          }

         ?>
         <input type="hidden" id="subscript_date" name="" value="<?php echo $subscript_date; ?>">
         <input type="hidden" id="expired_date" name="" value="<?php echo $expired_date; ?>">
         <script type="text/javascript">
         $(document).ready(function(){
           var subscript_date = document.getElementById('subscript_date').value;
           var expired_date = document.getElementById('expired_date').value;
           subscript_date = new Date(subscript_date);
           expired_date = new Date(expired_date);
           var diff = Math.round((expired_date - subscript_date)/(1000*60*60*24));
           document.getElementById("lifetime").innerHTML = diff + " day(s)";
          // var a = diff.getDay();
           //alert(diff);
          });

         </script>
        <table>
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
              <td id="lifetime"></td>
              <td><a href="#modal1" class="waves-effect waves-light btn red modal-trigger"><i class="material-icons right">cancel</i>Cancel</a></td>
            </tr>
          </tbody>
        </table>

        <div id="modal1" class="modal modal-fixed-footer">
          <div class="content" id="content">
            <h3 class="center">Do you want to unsubscript recipe?</h3>
            <hr>
              <br><br><br><br><br>
              <div class="row">
                <div class="col l2">
                  <img class="center" src="img/warning-icon.png" alt="" style="width:90%">
                </div>
                <div class="col l10">
                  <ol>
                    <li><b>We will not provide any refund</b></li>
                    <li>Any </li>
                    <li>Milk</li>
                  </ol>
                </div>
              </div>
            </div> <!-- content -->
            <div class="modal-footer">
              <a class="modal-close waves-effect waves-green btn-flat" onclick="agree()">Agree</a>
              <a href="#!" class="modal-close waves-effect waves-green btn-flat">Disagree</a>
            </div>
          </div>
          <script type="text/javascript">
            function agree(){
              var r = confirm("Are you sure want to unsubscript it!");
                if (r == true) {
                    $("#content").hide();
                } else {

                }
            }
          </script>

          <br><br>
            <a class="waves-effect waves-light btn right" onclick="history()">View history</a>
        </div>

        <br><br>
        <div id="subscript_history" hidden>
          <h3>History</h3>
          <table>
            <thead>
              <tr>
                <th>Monthly</th>
                <th>Order date</th>
                <th>Expired date</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $times_history; ?></td>
                <td><?php echo $subscript_date_history; ?></td>
                <td><?php echo $expired_date_history; ?></td>
                <td><?php echo $status; ?></td>
              </tr>
            </tbody>
          </table>
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
      </div> <!-- my subscription-->

      <div id="Tokyo" class="tabcontent">
        <h3>Tokyo</h3>
        <p>Tokyo is the capital of Japan.</p>
      </div>
    </div>
    <script>
      function openCity(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
              tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
              tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
      }
      $(document).ready(function(){
        // mobile slide
        $(".button-collapse").sideNav();
        $('.modal').modal();
        //$('#modal1').modal('open');
      });
      </script>
  </div> <!-- row -->

  </body>
</html>
