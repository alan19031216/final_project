<?php
include 'html_php/header.php';
//require 'html_php/navbar_html.php';
include 'php/config.php';
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
    <br>
    <div class="row card" id="row_card">
      <div class="row">
        <div class="col s12">
          <ul class="tabs tabs-fixed-width tab-demo z-depth-1">
            <li class="tab col s12"><a class="active" href="#test1">Answer a question</a></li>
            <!-- <li class="tab col s6"><a  href="#test2">Ask a question</a></li> -->
          </ul>
        </div>
        <div id="test1" class="col s12">
        <table class="centered highlight">
          <?php
          $record_per_page = 3; // show how many row
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
              $t = $t."day ago";
            }
            else if($t == 2){
              $t = $t."days ago";
            }
            else if( $t > 31){
              $t = date('d-m-y h:i', $date1);
            }
          ?>
          <tr class="card">
           <td onclick="window.location.href = 'page/question_question_index.php?product_id=<?php echo $row['id']; ?>';">
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
               <?php echo $number_of_rows; ?> answer(s)
               </div>
               <div class="col l4 m4 s4 right-align">
               Date: <?php echo $t; ?>
               </div>
             </div>
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
          if($difference <= 3)
          {
           $start_loop = $total_pages - 1;
          }
          $end_loop = $start_loop;
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
