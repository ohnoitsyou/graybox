<?php
session_start();  
include('api/common.php');

<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

  </head>
<body>

<?php
    
$username = $_POST['username'];
$password = $_POST['password'];

//Protect from MySQL injection
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$password_hash = md5($password)

//Connect to database server
dbLogin();

//Select database
dbSelect();

//Execute query
$sql = executeQuery("SELECT * FROM users WHERE username='$username' and password='$password'";

$results=mysql_query($sql));

//Mysql_num_row is counting table row
$count=mysql_num_rows($result);

//If result matched $username and $password, table row must be 1 row
if($count==1){

//Register $username, $password and redirect to file "login_success.php"
    session_register("username");
    session_register("password"); 
    header("location:login_success.php");
    }
    
    else {
        echo "Wrong username or password";
    }
?>
    
</body>
</html>
