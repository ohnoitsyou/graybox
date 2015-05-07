<?php
session_start();
require_once("api/common.php");
loggedInCheck();
if(!isset($_GET['itemID'])) {
  // they didn't provide an itemID, send them back from wence they came!
  header("Location: displayall.php");
}
dbLogin();
dbSelect();
$itemID = mysql_real_escape_string($_GET['itemID']);
$sql = "Select * from inventory where inventoryID = $itemID;";
$results = executeQuery($sql);
if(count($results) <= 0) {
  // the itemID was bad, send them back from wence they came!
  header("Location: displayall.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="http://ajax.googleapis.com/ajax/libs/prototype/1.6.0.3/prototype.js" type="text/javascript"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/scriptaculous/1.8.2/scriptaculous.js" type="text/javascript"></script>
  <script src="js/script.js" type="text/javascript"></script>
</head>
<body>
  <div class="header">
    <div class="navbar">
      <span class="logo">Graybox powered by RentalVideo&copy;</span>
      <div class="quick_links">
        <span><a href="login.php">Home</a></span><span><a href="new_releases.php">New Releases</a></span><span><a href="displayall.php">Available titles to rent</a></span><span><a href="preferences.php">Preferences</a></span>
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
    <div class="title"><h1>Details about: <?php echo $results[0]['iName']; ?><h1></div>
    <div class="itemDetails_page">
      <div class="movie_cover"><img src="img/<?php echo $results[0]['inventoryID']; ?>.jpg" /></div>
      <div class="movie_description"><?php echo $results[0]['iDescription']; ?></div>
      <?php echo addToCartButton($results[0]['inventoryID']); ?> 
    </div>
    <div style="clear:both"></div>
  </div>
  <div class="footer">
    <span>&copy; 2015 Team Zero Two Point Oh</span>
  </div>
  <?php functionFooter(); ?>
</body>
</html>
