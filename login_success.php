<?php
session_start();
if($_SESSION['logged_in']) {
  header("location:new_releases.php");
} else {
  header("location:login.html");
}
?>
<html>
<head>
  <title>Login</title>
</head>
<body>
  <p>Login Successful</p>
     <?php functionFooter(); ?>
</body>
</html>
