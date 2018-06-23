<?php
require 'php/config.php';
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Book</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
     <link type="text/css" rel="stylesheet" href="css/style.css"  media="screen,projection"/>
     <link type="text/css" rel="stylesheet" href="css/style_bookshelf.css"  media="screen,projection"/>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="https://js.leapmotion.com/leap-0.6.4.js"></script>
     <!--rating-->
     <script src="page/js/rate.js"></script>
     <script type="text/javascript" src="page/extras/modernizr.2.5.3.min.js"></script>
     <script type="text/javascript" src="js/materialize.min.js"></script>

     <script type="text/javascript" src="script.js"></script>

   </head>
   <body style="background-color:#f5f5f5">
     <div class="hide-on-med-and-up	show-on-small">
       <table class="highlight centered" id="table_phone" style="background-color:white">
         <thead>
           <tr>
             <th>No</th>
             <th>Image / Name</th>
             <th>Quantity</th>
             <th>Price</th>
           </tr>
           </thead>
           <tbody>
           <?php
           $username = '123';
           $count = 1;
           $total = 0;
           $cart_phone = $conn->query("SELECT * FROM book a LEFT JOIN book_detail b ON a.code = b.code LEFT JOIN cart c ON a.code = c.code WHERE c.username = '$username'");
           foreach ($cart_phone as $row_cart_phone) {
             $sub_price = 0;
             $price = $row_cart_phone['price'];
             $quantity = $row_cart_phone['quantity'];
             $sub_price = $price * $quantity;
             $total = $total + $sub_price;
            ?>
            <tr>
              <td style="display: none"><?php echo $row_cart_phone['code']; ?></td>
            </tr>

            <tr>
              <td class="center" style="width:10%;"><?php echo $count; ?></td>
              <td class="center" style="width:20%;height:10%;">
                <img src="<?php echo $row_cart_phone['img'] ?>"  alt="<?php echo $row_cart_phone['name']; ?>" style="width: 100%;height:50%;"> <br><br>
                <?php echo $row_cart_phone['name']; ?>
              </td>
              <td class="center" style="width:10%;"><?php echo $quantity; ?></td>
              <td class="center" style="width:10%;"><?php echo $sub_price; ?></td>
            </tr>
            <tr>
              <td colspan="2">
                <button style="width:80%;" class="waves-effect waves-light btn edit-btn" onclick="update(<?php echo $count; ?>)">Update</button>
              </td>
              <td colspan="2">
                <button style="width:100%;" class="waves-effect waves-light red btn delete-btn" onclick="delete_phone(<?php echo $count; ?>)">Delete</button>
              </td>
            </tr>
            <?php
            $count++;
              }
             ?>
           </tbody>
       </table>


       <div class="card-panel hoverable z-depth-5" id="total_phone">
         <div class="row center">
           <div class="col s6">
             <h3>Total:</h3>
             <br>
             <b>RM<?php echo $total; ?></b>
           </div>
           <div class="col s6">
             <br><br>
             <a class="modal-trigger" href="#modal1"><button class="waves-effect waves-light btn">Purchases</button></a>
           </div>
         </div>
       </div>

       <div id='page-content'></div>
       <br><br>
     </div>
     <script type="text/javascript">
     function update(number) {
       //alert(number);
       if(number != 1){
         number += 2;
       }
       //alert(number);
       // clicking the edit button
        $(document).on('click', '.edit-btn', function(){
         var code = document.getElementById("table_phone").rows[number].cells.item(0).innerHTML;
         //alert(code);
         //var username = $(this).closest('td').find('.product-id').text();
          $('#table_phone').fadeOut('slow');
          $('#total_phone').fadeOut('slow');
         // fade out effect first
         $('#page-content').fadeOut('slow', function(){
             $('#page-content').load('update_cart.php?code=' + code, function(){

                 // fade in effect
                 $('#page-content').fadeIn('slow');
             });
         });
       });
     }

     function delete_phone(number) {
       if(number != 1){
         number += 2;
       }

       $(document).on('click', '.delete-btn', function(){
         if(confirm('Are you sure?')){

           // get the id
          var code = document.getElementById("table_phone").rows[number].cells.item(0).innerHTML;

          // trigger the delete file
          $.post("php/delete.php", { code: code })
              .done(function(data){
                  console.log(data);

                  $('#table_phone').fadeOut('slow');
                  $('#total_phone').fadeOut('slow');
                  // reload the product list
                  $('#page-content').fadeOut('slow', function(){
                      $('#page-content').load('cart.php', function(){

                          // fade in effect
                          $('#page-content').fadeIn('slow');
                      });
                  });
              });
            }
        });
     }
     </script>
     <!-- ***************************************************************************************8*-->
     <div class="hide-on-small-only show-on-large">
       <div class="row">
         <div class="col l8 m12">
           <table class="highlight centered" id="table_computer">
             <thead>
               <tr>
                 <th>No</th>
                 <th>Image</th>
                 <th>Name</th>
                 <th>Quantity</th>
                 <th>Price</th>
                 <th></th>
               </tr>
            </thead>
            <tbody>
           <?php
            $username = '123';
            $count = 1;
            $total1 = 0;
            $cart = $conn->query("SELECT * FROM book a LEFT JOIN book_detail b ON a.code = b.code LEFT JOIN cart c ON a.code = c.code WHERE c.username = '$username'");
            foreach ($cart as $row) {
              $sub_price1 = 0;
              $price = $row['price'];
              $quantity = $row['quantity'];
              $sub_price1 = $price * $quantity;
              $total1 = $total1 + $sub_price1;
            ?>
            <tr>
              <td style="display: none"><?php echo $row['code']; ?></td>
            </tr>
              <tr>
                <td><?php echo $count; ?></td>
                <td style="height:10%;"><img src="<?php echo $row['img'] ?>"  alt="<?php echo $row['name']; ?>" style="width: 100%;height:50%;"></td>
                <td style="width:40%;"><?php echo $row['name']; ?></td>
                <td style="width:10%;"><?php echo $quantity; ?></td>
                <td style="width:10%;"><?php echo $sub_price1; ?></td>
                <td style="width:20%;">
                  <button style="width:100%;" class="waves-effect waves-light btn edit-btn_computer" onclick="update_computer(<?php echo $count; ?>)">Update</button>
                  <br> <br>
                  <button style="width:100%;" class="waves-effect waves-light red btn delete-btn_computer" onclick="delete_computer(<?php echo $count; ?>)">Delete</button>
                </td>
              </tr>
            <?php
              $count++;
              }
             ?>
            </tbody>
          </table>
         </div>
         <div class="col l4 m12 blue" id="total_computer">
           <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Total</span>
              <table>
                <tr>
                  <td>RM <?php echo $total1; ?></td>
                  <td>
                    <a class="modal-trigger" href="#modal1"><button class="waves-effect waves-light btn">Purchases</button></a>
                  </td>
                </tr>
              </table>
            </div>
          </div>
         </div>
       </div>

       <div id="page-content_computer"></div>
     </div>

     <div id="modal1" class="modal modal-fixed-footer">
       <h2 class="center">Payment</h2>
       <div class="row card">
          <form action="payments.php" method="post" id="paypal_form" target="_blank" class="paypal">
            <div class="row">
              <div class="input-field col s6">
                <input name="first_name" id="first_name" type="text" class="validate" required>
                <label for="first_name">First Name</label>
              </div>
              <div class="input-field col s6">
                <input  name="last_name"  id="last_name" type="text" class="validate" required>
                <label for="last_name">Last Name</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s6">
                <input name="phone" id="phone" type="number" class="validate" required>
                <label for="phone">Phone</label>
              </div>
              <div class="input-field col s6">
                <input  name="email"  id="email" type="email" class="validate" required>
                <label for="last_name">Email</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                 <textarea id="address" name="address" class="materialize-textarea" required></textarea>
                 <label for="textarea1">Address</label>
               </div>
            </div>
            <input type="hidden" name="cmd" value="_xclick"/>
            <input type="hidden" name="username" value="123">
            <input type="hidden" name="total" value="<?php echo $total1; ?>">
            <center><button type="submit" class="waves-effect waves-light btn">Confirm</button></center>
            <br><br>
          </form>
        </div>

     </div><!--modal1 END-->

     <script type="text/javascript">
     function update_computer(number) {
       //alert(number);
       if(number != 1){
         number +=1;
       }
       //alert(number);
       // clicking the edit button
        $(document).on('click', '.edit-btn_computer', function(){
         var code = document.getElementById("table_computer").rows[number].cells.item(0).innerHTML;
         //alert(code);
         //var username = $(this).closest('td').find('.product-id').text();
          $('#table_computer').fadeOut('slow');
          $('#total_computer').fadeOut('slow');
          //$('#total_phone').fadeOut('slow');
         // fade out effect first
         $('#page-content_computer').fadeOut('slow', function(){
             $('#page-content_computer').load('update_cart_computer.php?code=' + code, function(){

                 // fade in effect
                 $('#page-content_computer').fadeIn('slow');
             });
         });
       });
     }

     function delete_computer(number) {
       if(number != 1){
         number += 1;
       }

       $(document).on('click', '.delete-btn_computer', function(){
         if(confirm('Are you sure?')){
           // get the id
          var code = document.getElementById("table_computer").rows[number].cells.item(0).innerHTML;

          // trigger the delete file
          $.post("php/delete.php", { code: code })
              .done(function(data){
                  console.log(data);

                  $('#table_computer').fadeOut('slow');
                  $('#total_computer').fadeOut('slow');
                  // reload the product list
                  $('#page-content_computer').fadeOut('slow', function(){
                      $('#page-content_computer').load('cart.php', function(){

                          // fade in effect
                          $('#page-content_computer').fadeIn('slow');
                      });
                  });
              });
            }
        });
     }

     $(document).ready(function(){
       // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
       $('.modal').modal();
       $('#textarea1').val();
       //$('#modal1').modal('open');
     });
     </script>

   </body>
  </html>
