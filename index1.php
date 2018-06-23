<?php
include "config.php";
?>
<!doctype html>
<html>
    <head>
        <title>Load more data using jQuery,AJAX, and PHP</title>
        <link href="style.css" type="text/css" rel="stylesheet">
        <script src="jquery-1.12.0.min.js" type="text/javascript"></script>
        <script src="script.js"></script>
    </head>
    <body>
        <div class="container">

            <?php
            $rowperpage = 3;
            // counting total number of posts
            $allcount_query = "SELECT count(*) as allcount FROM testing";
            $allcount_result = mysqli_query($con,$allcount_query);
            $allcount_fetch = mysqli_fetch_array($allcount_result);
            $allcount = $allcount_fetch['allcount'];
            //echo $allcount;

            // select first 3 posts
            $query = "select * from testing order by id asc limit 0 , $rowperpage ";
            $result = mysqli_query($con,$query);
            //echo $id;
            ?>
            <div class="post" id="post_<?php echo $id; ?>">
                <table>
                  <tr>
            <?php
            while($row = mysqli_fetch_array($result)){
                $id = $row['id'];
                //title = $row['title'];
                //$content = $row['content'];
                //$shortcontent = substr($content, 0, 160)."...";
                $name = $row['name'];

            ?>
                <!-- Post -->
                        <td> <?php echo $name; ?></td>

            <?php
            }
            ?>
                      </tr>
                    </table>
                </div>

            <h1 class="load-more">Load More</h1>
            <input type="hidden" id="row" value="0">
            <input type="hidden" id="all" value="<?php echo $allcount; ?>">

        </div>
    </body>
</html>
