<?php
include 'html_php/new_hearder.php';
//require 'html_php/navbar_html.php';
include 'php/config.php';
//session_start();
$username = $_SESSION['username'];
//echo $username;
 ?>
  <div class="container ">
    <style media="screen">
    .morecontent span {
        display: none;
    }
    .morelink {
        display: block;
    }
    /* show more button css */
    .morelink {
      cursor: pointer;
      display: inline-block;
      padding: 0 .5em;
      color: #666;
      font-size: .9em;
      line-height: 2;
      border: 1px solid #ddd;
      border-radius: .25em;
    }
    </style>
    <div id='page-content'></div>

    <br>
    <div class="row card" id="row_card">
      <div class="row">
        <div class="col s12">
          <ul class="tabs tabs-fixed-width tab-demo z-depth-1">
            <li class="tab col s6"><a class="active" href="#test1">Answer a question</a></li>
            <li class="tab col s6"><a  href="#test2">Ask a question</a></li>
          </ul>
        </div>
        <div id="test1" class="col s12">
          <table class="centered highlight">
            <?php
            $record_per_page = 5; // show how many row
            $page = '';
            if(isset($_GET["page"]))
            {
             $page = $_GET["page"];
            }
            else
            {
             $page = 1;
            }

            $start_from = ($page - 1) * $record_per_page;

            $question = $conn->query("SELECT * FROM question order by ask_time DESC LIMIT $start_from, $record_per_page");
            foreach ($question as $row) {
              $id = $row['id'];
              $sql_count = $conn->query("SELECT * FROM comment WHERE question_id like '$id'");
              $number_of_rows = $sql_count->rowCount();

              $date = strtotime("now");
              $ask_time = $row['ask_time'];
              $date1 = strtotime("$ask_time");
              $t = floor(($date-$date1)/86400);
              //echo $t;
              if($t == -1 || $t == 0){
                $t = "Today";
              }
              else if($t == 1){
                $t = $t." day ago";
              }
              else if($t == 2){
                $t = $t." days ago";
              }
              else if( $t > 31){
                $t = date('d-m-y h:i', $date1);
              }
              else{
                $t = $t." days ago";
              }
            ?>
            <tr class="card">
             <td>
               <a class="edit-btn">
                 <div class="press">
                   <div class="">
                     <h3 class="center"><?php echo $row['title']; ?></h3>
                   </div>
                   <div class='product-id display-none' hidden><?php echo $row['id']; ?></div>
                   <span class="more" style="font-size:18px;color:black">
                     <?php echo $row['description']; ?>
                   </span>
                   <br><br>
                   <div class="row">
                     <div class="col l4 m4 s4">
                     Ask by: <?php echo $row['username']; ?>
                     </div>
                     <div class="col l4 m4 s4">
                     <?php echo $number_of_rows; ?> respond(s)
                     </div>
                     <div class="col l4 m4 s4 right-align">
                     Date: <?php echo $t; ?>
                     </div>
                   </div>
                 </div>
               </a>
             </td>
            </tr>
            <?php
            } // foreach
            ?>
            </table>
            <div align="center">
              <ul class="pagination">
            <br />
            <?php
            $page_query = $conn->query("SELECT * FROM question ORDER BY id DESC");
            $total_records = $page_query->rowCount();
            $total_pages = ceil($total_records / $record_per_page);
            // echo $total_pages;
            $start_loop = $page;
            $difference = $total_pages - $page;
            if($difference <= 5)
            {
             $start_loop = $total_pages - 5;
            }
            $end_loop = $start_loop + 4;
            // echo $page;
            if($page > 1)
            {
             echo "<li><a href='question.php?page=1'>First</a></li>";
             echo "<li><a href='question.php?page=".($page - 1)."'> <i class='material-icons'>chevron_left</i> </a></li>";
            }
            for($i = $start_loop; $i <= $end_loop; $i++)
            {
             echo "<li><a href='question.php?page=".$i."'>".$i."</a></li>";
            }
            if($page <= $end_loop)
            {
             echo "<li><a href='question.php?page=".($page + 1)."'> <i class='material-icons'>chevron_right</i></a></li>";
             echo "<li><a href='question.php?page=".$total_pages."'>Last</a></li>";
            }
            ?>
              </ul>
            </div>
        </div><!-- text 1 -question -->

        <script type="text/javascript">
        // clicking the edit button
        $(document).on('click', '.edit-btn', function(){

          // change page title
          //changePageTitle('Update Product');

          // var product_id = $(this).closest('td').find('.product-id').text();
          var product_id = $(this).find('.product-id').text();
          //alert(product_id);

          // show a loader image
          //$('#loader-image').show();

          // hide create product button
          $('#row_card').hide();

          // fade out effect first
          $('#page-content').fadeOut('slow', function(){
              $('#page-content').load('question_question.php?product_id=' + product_id + '&username=' + <?php echo $_SESSION['username']; ?>, function(){
              //$('#page-content').load('question_question.php', function(){
                  // hide loader image
                  //$('#loader-image').hide();

                  // fade in effect
                  $('#page-content').fadeIn('slow');
              });
          });
        });
        </script>

        <div id="test2" class="col s12">
          <h3 class="center">Ask a question</h3>
          <form class="" method="post" action="php/question.php">
            <div class="input-field col l12 m12 s12">
              <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
              <label for="first_name" >Question title</label>
              <input class="browser-default" placeholder="Title" name="title" id="title" type="text" class="validate" style="width: 100%;padding: 12px 20px;margin: 8px 0;box-sizing: border-box;" required>
              <span id="length" style="color:red"></span>
              <br><br>
            </div>

            <div class="input-field col s12">
              <textarea class="browser-default" placeholder="Description" name="description"id="description" class="materialize-textarea" style="width: 100%;height: 300px;padding: 12px 20px;margin: 8px 0;box-sizing: border-box;"></textarea>
              <label for="textarea1">Description(Option)</label>
            </div>

            <div class="center">
              <input class="waves-effect waves-light btn" type="submit" value="Submit" onClick="return length1()">
              <!-- <button onclick="return length()" type="submit" class="waves-effect waves-light btn" ><i class="material-icons left">cloud</i>button</button> -->
            </div>
          </form>
          <script type="text/javascript">
            function length1(){
              var value = document.getElementById('title').value;
              if(value.length < 5){
                //alert("a");
                document.getElementById("length").innerHTML = "Title lenght must more than 5 word!";
                return false;
              }
              else{
                return true;
              }
            }
          </script>

        </div><!-- text 2 -ask question -->
      </div><!-- row -->
    </div><!-- row card  -->

    <script type="text/javascript">
    $(document).ready(function() {
        $('#textarea1').val('');
        // Configure/customize these variables.
        var showChar = 100;  // How many characters are shown by default
        var ellipsestext = "...";
        var moretext = "Show more";
        var lesstext = "Show less";


        $('.more').each(function() {
            var content = $(this).html();

            if(content.length > showChar) {

                var c = content.substr(0, showChar);
                var h = content.substr(showChar, content.length - showChar);

                var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a class="morelink ">' + moretext + '</a></span>';

                $(this).html(html);
            }

        });

        $(".morelink").click(function(){
            if($(this).hasClass("less")) {
                $(this).removeClass("less");
                $(this).html(moretext);
            } else {
                $(this).addClass("less");
                $(this).html(lesstext);
            }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
        });
    });
    </script>

  </div><!-- container -->
  <?php
    require 'html_php/footer.php';
   ?>
  </body>
</html>
