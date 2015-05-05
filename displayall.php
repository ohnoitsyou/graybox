<?php
session_start();
require_once('api/common.php');
loggedInCheck();

dbLogin();
dbSelect();

$sql = executeQuery("SELECT DISTINCT * FROM inventory;");
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src=" http://ajax.googleapis.com/ajax/libs/prototype/1.6.0.3/prototype.js" type="text/javascript"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/scriptaculous/1.8.2/scriptaculous.js" type="text/javascript"></script>
  <script src="js/script.js" type="text/javascript"></script>
</head>
<body>
  <div class="header">
    <div class="navbar">
      <span class="logo">Graybox powered by RentalVideo&copy;</span>
      <div class="quick_links">
        <span>Home</span><span>New Releases</span><span>Movies</span><span>TV Shows</span>
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
</body>
</html>
