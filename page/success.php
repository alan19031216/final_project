<?php
include 'php/config.php';
include 'html_php/new_hearder.php';
//session_start();
 $username = $_SESSION['username'];
// $time = $_SESSION['$times'] ;
// $current_time = $_SESSION['$current_time'];
// $expired_date = $_SESSION['$expired_date'];
//
// //echo $expired_date;
// try {
// 	$sql = $conn->query("INSERT INTO subscript(username , times , subscript_date , expired_date)
// 	VALUES ('$username' , '$time' , '$current_time' , '$expired_date')");
//
// 	$sql_history = $conn->query("INSERT INTO subs_history
// 		(username , times , subscript_date , expired_date ,status) VALUES
// 		('$username' , '$time', '$current_time' , '$expired_date' , 'active')");
//     //echo "Success";
// }
// catch(PDOException $e) {
// 		echo "Error: " . $e->getMessage();
// }

?>
 		<title>Order success</title>

		<br>
		<div class="container">
			<div class="card green">
				<br>
				<div class="white" style="margin-left:30px; margin-right:30px">
					<br>
					<h1 class="center">You order has been success</h1>
					<div class="center">
						<?php
							$sql_select = $conn->query("SELECT * FROM subscript WHERE username = '$username'");
							foreach ($sql_select as $row_select) {
								$times = $row_select['times'];
								$current_time = $row_select['subscript_date'];
								$expired_date = $row_select['expired_date'];
							}
						 ?>
						 <br>
						 Order type   : <?php echo $times; ?>
						 <br><br>
						 Order date   : <?php echo $current_time; ?>
						 <br><br>
						 Expired date : <?php echo $expired_date; ?>
					</div>
					<br><br>
					<center><a href="new_home.php"class="waves-effect waves-light btn center">Back to index</a></center>
					<br><br>
				</div>
				<br>
			</div>
		</div>

 	</body>
 </html>
