<?php
session_start();
if(session_destroy()){
  echo "<script>
        alert('Logout success');
        window.location.href='../../index.php';
        </script>";
}
?>
