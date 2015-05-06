<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!--
   <link rel="stylesheet/less" type="tet/css" href="css/style.less">
  <script src="js/less.js" type="text/javascript"></script>
  -->
</head>
<body>
  <div class="header">
    <div class="navbar">
      <span class="logo">Graybox powered by RentalVideo&copy;</span>
      <div class="quick_links">
        <span><a href="login.php">Home</a></span>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="title"><h1><!-- add a title here --><h1></div>
    <div class="_page"> <!-- change to <your_page_name>_page -->
    <!-- Insert your content here -->
    </div>
  </div>
  <div class="footer">
    <span>&copy; 2015 Team Zero Two Point Oh</span>
  </div>
</body>
</html>
