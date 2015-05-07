<?php
session_start();
require_once('api/common.php');
loggedInCheck();

dbLogin();
dbSelect();

$sql = executeQuery("SELECT DISTINCT * FROM preferences;");
?>

<!--
	Christian Nieva
	5/6/15
	IS448
	Dr. Sampath
	Display Preferences
-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src=" http://ajax.googleapis.com/ajax/libs/prototype/1.6.0.3/prototype.js" type="text/javascript"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/scriptaculous/1.8.2/scriptaculous.js" type="text/javascript"></script>
  <script src="js/script.js" type="text/javascript"></script>
    <style>
        table {
            width:100%;
            }
            table, th, td {
            border-collapse: collapse;
            }
            th, td {
            padding: 5px;
            text-align: left;
            }
            table#t01 tr:nth-child(even) {
            background-color: #eee;
            }
            table#t01 tr:nth-child(odd) {
            background-color:#fff;
            }
            table#t01 th	{
            background-color: black;
            color: white;
            }
    </style>
</head>
<body>
  <div class="header">
    <div class="navbar">
      <span class="logo">Graybox powered by RentalVideo&copy;</span>
      <div class="quick_links">
        <span><a href="login.html">Home</a></span><span><a href="new_releases.php">New Releases</a></span><span><a href="displayall.php">Available titles to rent</a></span>
      </div>
    </div>
    <div class="statusbar">
      <div class="statusboxes">
        <?php displayUserbox(); ?>
        <?php displayCartbox(); ?>
      </div>
    </div>
  </div>
  <div class="content">
        <h1>Thank you for your preferences!</h1>
        <h3>Please review your submitted information.</h3>
      <table id='display_preferences' border="1" style="width:100%">
        <?php
      foreach($sql as $row) {
        ?>
          <tr><?php echo $row["pref1"]; ?></tr>
          <tr><?php echo $row["pref2"]; ?></tr>
          <tr><?php echo $row["pref3"]; ?></tr>
          <tr><?php echo $row["pref4"]; ?></tr>
          <tr><?php echo $row["pref5"]; ?></tr>
          <tr><?php echo $row["pref6"]; ?></tr>
          <tr><?php echo $row["pref7"]; ?></tr>
          <tr><?php echo $row["pref8"]; ?></tr>
          <tr><?php echo $row["pref9"]; ?></tr>
          <tr><?php echo $row["pref10"]; ?></tr>
     <?php
        }
     ?>
     </table>
    <p>
      <a href="displayall.php">Browse available titles!</a>
    </p>
  <div class="footer">
    <span>&copy; 2015 Team Zero Two Point Oh</span>
  </div>
  <?php functionFooter(); ?>
</body>
</html>
