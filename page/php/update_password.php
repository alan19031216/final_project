<?php
//error_reporting(0);
require 'config.php';

	$salt = '}#f4ga~g%7hjg4&j(7mk?/!bj30ab-wi=6^7-$^R9F|GK5J#E6WT;IO[JN'; // random string
	$old_password = $_POST['old_password'];
	$old_password = sha1(md5($salt.$old_password)); // sha1 hash with salt & md5 #6
  //$old_password = md5($old_password);
	$new_password = $_POST['new_password'];
  //$new_password = md5($new_password);
	$new_password = sha1(md5($salt.$new_password)); // sha1 hash with salt & md5 #6
	$username = $_POST['username'];
	//echo $old_password;

	try {
      $select_password = $conn->query("SELECT * FROM login WHERE username = '$username'");
      $password = '';
      foreach ($select_password as $row) {
        $password = $row['password'];
      }
      // check password
      if($password == $old_password){
        if ($password != $new_password) {
          $stmt = $conn->query("UPDATE login SET password = '$new_password' WHERE username = '$username'");
          echo '<script language="javascript">';
          echo 'alert("Update successful!!")';
          echo '</script>';
          header( "refresh:0.1; url= ../my_profile.php?city='My_profile'" );
        }
        else {
          echo '<script language="javascript">';
          echo 'alert("Old password same as new password!!")';
          echo '</script>';
          header( "refresh:0.1; url= ../my_profile.php?city='My_profile'" );
        } // check password has same as new password or not
      }
      else {
        echo '<script language="javascript">';
        echo 'alert("Old password not match!!")';
        echo '</script>';
        header( "refresh:0.1; url= ../my_profile.php?city='My_profile'" );
      }


	}
	catch(PDOException $e) {
			echo "Error: " . $e;
	}

?>
