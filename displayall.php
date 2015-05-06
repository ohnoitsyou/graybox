<?php
session_start();
require_once('api/common.php');
loggedInCheck();

dbLogin();
dbSelect();

$sql = executeQuery("SELECT DISTINCT * FROM inventory where releaseDate < NOW();");
?>

<!--
	Christian Nieva
	5/6/15
	IS448
	Dr. Sampath
	Display all products
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
    <div class="title"><h1>New Releases<h1></div>
    <div class="new_releases_page">
      <table id='display' border="1" style="width:100%"> 
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Release Dare</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    <?php 
      foreach($sql as $row) {
    ?>
       <tr>
           <td><?php echo $row["iName"]; ?></td>
           <td><?php echo $row["iDescription"]; ?></td>
           <td><?php echo $row["releaseDate"]; ?></td>
           <td><?php echo $row["price"]; ?></td>
           <td><?php echo addToCartButton($row["inventoryID"]) ?></td>
      </tr>
     <?php   
        } 
     ?> 
     </table>
    <p>
      <a href="checkout1.html">Ready to checkout?</a>
    </p>
    <p>
      <a href="return.html">Ready to return your movie?</a>
    </p>
  </div>
  <div class="footer">
    <span>&copy; 2015 Team Zero Two Point Oh</span>
  </div>
  <?php functionFooter(); ?>
</body>
</html>
