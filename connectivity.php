<?php
session_start();  
include('api/common.php');
//Connect to database server
dbLogin();

//Select database
dbSelect();

$username = $_POST['username'];
$password = $_POST['password'];

//Protect from MySQL injection
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$password_hash = md5($password);


//Execute query
$results = executeQuery("SELECT * FROM users WHERE username='$username' and pword='$password_hash';");

//Mysql_num_row is counting table row
//print(var_dump($results));
if($results[0]['username'] == $username) {
  $_SESSION['username'] = $username;
  $_SESSION['logged_in'] = true;
  header("location:login_success.php");
} else {
    $string = "Wrong username or password";
}
?>

<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
<body>
  <div class="header">
    <div class="navbar">
      <span class="logo">Graybox powered by RentalVideo&trade;</span>
      <div class="quick_links">
           <span><a href="login.php">Home</a></span>
      </div>
    </div>
  </div>
  <div class="content">
      <?php print($string); ?>
      <br>
      <br>
      <a href="http://userpages.umbc.edu/~dayoung1/is448/graybox/"><img src="http://theterramarproject.org/images/parcels/try-again.png" alt="Go back home"></a>
  </div>
  <div class="footer">
    <span>&copy; 2015 Team Zero Two Point Oh</span>
  </div>
</body>
</html>

