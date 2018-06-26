<?php
session_start();
if(session_destroy()){
  echo "<script>
        alert('Logout success');
        window.location.href='../../new_index.php';
        </script>";
}
?>
