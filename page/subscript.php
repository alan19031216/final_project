<?php
include 'html_php/new_hearder.php';
 ?>

 <div class="row" style="margin-left:100px;margin-right:100px" id="row">
   <script type="text/javascript">
   // get window width and update margin
   $(document).ready(function(){
     var w = window.innerWidth;
     if(w > 600 && w < 992 || w < 600){
       document.getElementById("row").style.marginLeft = "20px";
       document.getElementById("row").style.marginRight = "20px";
     }
   });
   var width = $(window).width();
   $(window).on('resize', function(){
    if($(this).width() != width){
       width = $(this).width();
       //alert(width);
       if(width > 600 && width < 992 || width < 600){
         //alert("resize");
         document.getElementById("row").style.marginLeft = "20px";
         document.getElementById("row").style.marginRight = "20px";
       }
        // console.log(width);
    }
   });

   </script>

   <style media="screen">
   #container {
    overflow: auto;
    }

    #left-column {
    width: 70%;
    float: right;
    }

    #right-column {
    width: 30%;
    float: right;
    }
   </style>

     <h1 class="center">Book of recipe</h1>
     <div class="col l4 m6 s12">
       <img src="img/book/1.jpg" alt="" width="100%" height="500px">
     </div>

     <div class="col l5 m6 s12">
       <table>
         <tr id="first">
           <td>
             <p>
               <input class="with-gap" name="group1" type="radio" id="first_radio" onClick="changeColour('a')">
               <label for="first_radio"> </label>
             </p>
           </td>
           <td>
             <a onClick="changeColour('a')"><h4>RM235</h4>
             <p>1 year of the book of recipe(1 month 1 book)</p>
             <p></p></a>
           </td>
         </tr>
         <tr id="second">
           <td>
             <p>
               <input class="with-gap" name="group1" type="radio" id="second_radio" onClick="changeColour('b')">
               <label for="second_radio"> </label>
             </p>
           </td>
           <td>
             <a onClick="changeColour('b')"><h4>RM115</h4>
             <p>6 month of the book of recipe(1 month 1 book)</p>
             <p></p>
           </td></a>
         </tr>
         <tr id="third">
           <td>
             <p>
               <input class="with-gap" name="group1" type="radio" id="info" onClick="changeColour('c')">
               <label for="info" style=""> </label>
             </p>
           </td>
           <td>
             <a onClick="changeColour('c')"><h4>RM55</h4>
             <p>3 month of the book of recipe(1 month 1 book)</p>
             <p></p></a>
           </td>
         </tr>
         <tr id="four">
           <td>
             <p>
               <input class="with-gap" name="group1" type="radio" id="info1" onClick="changeColour('d')">
               <label for="info1" style=""> </label>
             </p>
           </td>
           <td>
             <a onClick="changeColour('d')"> <h4>RM15</h4>
             <p>1 month of the book of recipe(1 month 1 book)</p>
             <p></p></a>
           </td>
         </tr>
       </table>
     </div>



     <script type="text/javascript">
     function changeColour(value){
       var color;
       var id;
       switch(value){
           case 'a':
               color = "#D3D3D3";
               document.getElementById("first").style.backgroundColor = color;
               document.getElementById("second").style.backgroundColor = "white";
               document.getElementById("third").style.backgroundColor = "white";
               document.getElementById("four").style.backgroundColor = "white";
               document.getElementById("first_radio").checked = true;
               document.getElementById("text_summary").innerHTML="1 year of the book of recipe(1 month 1 book)";
               document.getElementById("book_price").innerHTML="RM20 * 12";
               document.getElementById("price_text").innerHTML="RM235";
               document.getElementById("price_text_2").innerHTML="RM235";
               document.getElementById("price").value = "235";
           break;
           case 'b':
               color = "#D3D3D3";
               document.getElementById("first").style.backgroundColor = "white";
               document.getElementById("second").style.backgroundColor = color;
               document.getElementById("third").style.backgroundColor = "white";
               document.getElementById("four").style.backgroundColor = "white";
               document.getElementById("second_radio").checked = true;
               document.getElementById("text_summary").innerHTML="6 month of the book of recipe(1 month 1 book)";
               document.getElementById("price_text").innerHTML="RM115";
               document.getElementById("price_text_2").innerHTML="RM115";
               document.getElementById("book_price").innerHTML="RM20 * 6";
               document.getElementById("price").value = "115";
           break;
           case 'c':
               color = "#D3D3D3";
               document.getElementById("first").style.backgroundColor = "white";
               document.getElementById("second").style.backgroundColor = "white";
               document.getElementById("third").style.backgroundColor = color;
               document.getElementById("four").style.backgroundColor = "white";
               document.getElementById("info").checked = true;
               document.getElementById("text_summary").innerHTML="3 month of the book of recipe(1 month 1 book)";
               document.getElementById("price_text").innerHTML="RM55";
               document.getElementById("price_text_2").innerHTML="RM55";
               document.getElementById("book_price").innerHTML="RM20 * 3";
               document.getElementById("price").value = "55";
           break;
           case 'd':
               color = "#D3D3D3";
               document.getElementById("first").style.backgroundColor = "white";
               document.getElementById("second").style.backgroundColor = "white";
               document.getElementById("third").style.backgroundColor = "white";
               document.getElementById("four").style.backgroundColor = color;
               document.getElementById("info1").checked = true;
               document.getElementById("text_summary").innerHTML="1 month of the book of recipe(1 month 1 book)";
               document.getElementById("price_text").innerHTML="RM15";
               document.getElementById("price_text_2").innerHTML="RM15";
               document.getElementById("book_price").innerHTML="RM20 * 1";
               document.getElementById("price").value = "15";
           break;
       }


      }
     </script>

     <span id="fooBar"></span>
     <div class="col l3 m12 s12 grey lighten-4" id="sticker">
       <form onSubmit="return check_payment()" action="payments.php" method="post" id="paypal_form" target="_blank" class="paypal">
         <input type="hidden" name="cmd" value="_xclick"/>
         <h4>Booking summary</h4>
         <p id="text_summary"></p>
         <h4>Total Price: <b id="price_text"></b> </h4>
         <hr>
         <h5><b>Book price , teaxes and discount</b></h5>
         <div class="white">
           Book price  : <span class="right" id="book_price"></span>
           <br>
           GST (0%)    : <span class="right" id="book_price">RM0.00</span>
           <br>
           Discount    : <span class="right" id="book_price">RM5.00</span>
           <br>
           Total price : <b><span class="right" id="price_text_2"></span></b>
         </div>
         <hr>

         <input type="hidden" id="username" name="username" value="<?php echo $_SESSION['username']; ?>">
         <input type="hidden" required name="price" id="price" value="">
         <button  id="payment_button" class="waves-effect waves-light btn" style="width:100%" value="" onClick="button();">Process to checkout</button>
         <br><br>
      </form>
     </div>
     <script type="text/javascript">
       function check_payment(){
         var price = document.getElementById('price').value;
         var result;
         if(price == '' || price == ' '){
           alert("Please select one of the price")
           result = false;
         }
         else{
           result = true;
         }//else
         return result;
       } // function
     </script>

     <script type="text/javascript">

     $(document).ready(function(){
       var username = document.getElementById('username').value;
       $.ajax({
         type:"POST",
         url:"check/check_scubscrpt.php",
         data: 'username=' + username,
         success: function(data){
           if(data == 1){
             //alert("a");
             document.getElementById("payment_button").disabled = false;
             result = true;
           }
           else {
             document.getElementById("payment_button").disabled = true;
             alert("You already puchase this item");
             result = false;
           }
         }
       });
      });
     </script>

     <!-- <span id="demo">0</span> -->
     <script>
      var lastScrollPosition = 0;
      var num = 90;
      var a = 0;
       window.onscroll = function() {myFunction()};

       function myFunction() {
           if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
               document.getElementById("test").classList.add('navbar-fixed');
               $('#narbar').hide();
           }
           else {
               document.getElementById("test").classList.remove('navbar-fixed');
               $('#narbar').show();
           }

          if (document.body.scrollTop > 180 || document.documentElement.scrollTop > 180) {

                // var br = document.createElement("br");
                // var foo = document.getElementById("fooBar");
                // foo.appendChild(br);
                //alert("a");
           }
           else{

           }

           var newScrollPosition = window.scrollY;
           //
           // if (newScrollPosition < lastScrollPosition){
           //   //alert("a");
           //   document.getElementById("demo").innerHTML = lastScrollPosition;
           //
           //
           //
           //     // if(a == 0){
           //     //   var inputs = document.getElementsByTagName("br");
           //     //     for (var i = 0; i < ; i++) {
           //     //       inputs[i].style.display = "none";
           //     //     }
           //     // }
           //
           //   num = 90;
           // }else{
           //      if(lastScrollPosition > num){
           //        var br = document.createElement("br");
           //        var foo = document.getElementById("fooBar");
           //        foo.appendChild(br);
           //        num+=28;
           //      }
           //      document.getElementById("demo").innerHTML = lastScrollPosition;
           //
           // }
           // lastScrollPosition = newScrollPosition;
       }
       </script>
  </div><!-- row -->

  <div class="parallax-container" style="height:400px;">
   <div class="parallax"><img src="img/recipe_book.jpg"></div>
  </div>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.parallax').parallax();
    });
  </script>
  <br><br>
  <div class="container">
    <div class="card">
      <h3 class="center">The Ultimate Recipe Magazine</h3>
      <div class="" style="padding:20px">
        Recipes is a cooking and food magazine that covers every kind of recipe imaginable.
        Learn how to make desserts, snacks for the kids, dinner recipes, lunch ideas, breakfast recipes,
        quick and easy meals, slow cooker recipes, holiday meal ideas and so much more. Plan your weeknight
        dinners and find yummy weekend brunch recipes with the help of recipes magazine. Make meals
        using seasonal ingredients year-round with recipes magazine's spring, summer, fall and winter
        recipe ideas. Anyone who loves to cook and find new recipe ideas would enjoy a recipes magazine
        subscription from Magazine.Store!
        <br><br>
        Frequency of all magazines subject to change without notice. Double issues may be published,
        which count as 2 issues. We reserve the right to substitute gifts of equal or greater value.
        Applicable sales tax will be added. RM. orders only.
      </div>

    </div>
  </div>

  <br><br><br><br><br><br><br><br><br><br><br>
  </body>
</html>
