<?php
session_start();
session_destroy();
echo "<script>window.open('user_login.php','_self')</script>"

 ?>
  <?php
include ('includes/footer.php');
?>