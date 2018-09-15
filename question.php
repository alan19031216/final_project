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
    <div id='page-content'></div>

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
          <h1 class="center">Question</h1>
          <?php
            include 'php/config.php';
            $sql = $conn->query("SELECT * FROM question");
            foreach ($sql as $row) {
              $id = $row['id'];
              // echo $id;
              $sql_count = $conn->query("SELECT * FROM comment WHERE question_id like '$id'");
              $number_of_rows = $sql_count->rowCount();
              // if($number_of_rows == '' || $number_of_rows ==' ' ){
              //   $number_of_rows = 0;
              // }
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
              else{
                $t = $t . " days";
              }

          ?>
          <a class="edit-btn" href="page/question_question_index.php?product_id=<?php echo $row['id']; ?>">
            <div class="col l12 m12 s12">
              <div class="card-panel">
                <h3 class="center"><?php echo $row['title']; ?></h3>
                <td >
                <div class='product-id display-none' hidden><?php echo $row['id']; ?></div>
                </td>
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
              </div>
            </div>
          </a>
          <?php
            }
           ?>
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
