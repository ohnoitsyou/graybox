<?php
session_start();
if($_SESSION['logged_in']) {
  header('Location: new_releases.php');
}
?>
<!--
	Christian Nieva
	5/6/15
	IS448
	Dr. Sampath
	Login - Ajax, check if user is registered
          - PHP, connect to database
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript"  src="js/verify.js"></script>
    <script type="text/javascript">
        $("#username").keyup(function (e) { //user types username on input field, once user stops typing, AJAX retrieves and matches username
            var username = $(this).val(); //get the string typed by user
        $.post('check.php', {'username':username}, function(data) { //makes ajax call to check.php
        $("#result").html(data); //dump the data received from PHP page
        });
    });
    </script>
    
</head>
<body>
  <div class="header">
    <div class="navbar">
      <span class="logo">Graybox powered by RentalVideo&trade;</span>
      <div class="quick_links">
          <span>Home</span>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="login_page"> 
         <script type="text/javascript">displayWelcome(); //Display welcome message
      </script>
        
         <form name="login" action="connectivity.php" method="post" onsubmit="return checkInfo();">
            <h2>Sign In</h2>
            <label>Username :</label>
            <input type="text" name="username" id="username"/>
            <br/>
            <label>Password :</label>
            <input type="password" name="password" id="password"/>
        <span id="result"></span> <!--check username-->
            <br/>
            <input type="checkbox" id="remember"/>
            Remember me
            <br/>
            <input type="submit" value="Sign In" id="send"/>
            <br/>
            <a href="registration.html">Register</a>
		</form>
    </div>
  </div>
  <div class="footer">
    <span>&copy; 2015 Team Zero Two Point Oh</span>
  </div>
</body>
</html>
