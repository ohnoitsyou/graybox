<?php
session_start();
include('api/common.php');
loggedInCheck();
dbLogin();
dbSelect();
$movie_query = "SELECT DISTINCT inventoryID from inventory where releaseDate between DATE_SUB(Now(), INTERVAL 30 DAY) AND NOW() ORDER BY inventoryID DESC LIMIT 5;";
$results = executeQuery($movie_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="js/script.js" type="text/javascript"></script>
  <script src=" http://ajax.googleapis.com/ajax/libs/prototype/1.6.0.3/prototype.js" type="text/javascript"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/scriptaculous/1.8.2/scriptaculous.js" type="text/javascript"></script>
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
  
  <!-- ACTUAL CONTENT OF NEW_RELEASES!
  5/5/15: added @ onmouseover="bigImg(this)" onmouseout="normalImg(this)" @-->
  <div class="content">
    <div class="title"><h1>New Releases<h1></div>
    <div class="new_releases_page">
    <?php 
    if(count($results) > 0 ){
      foreach($results as $movie) {
    ?>
	<a href="itemDetail.php?itemID=<?php echo $movie['inventoryID'];?>">
        <img src="img/<?php echo $movie['inventoryID']; ?>.jpg" alt="<?php echo $movie['iName']; ?>" height="300px" width="250px" onmouseover="this.style.height='500px';this.style.width='300px';" onmouseout="this.style.height='300px';this.style.width='250px';">
	</a>
    <?php
      }
    } else {
    ?>
      <p>No new movies at this time. Check back later</p>
    <?php
    }
    ?> 
	</br>
    <p>
	  Upcoming Movie!
	  <div id="upcoming"> </div>
    </p>
    <p><a href="return1.php">Ready to return your movie?</a></p>
  </div>
  <div class="footer">
    <span>&copy; 2015 Team Zero Two Point Oh</span>
  </div>
  <script> (function(){grab_data()})(); </script>
   <?php functionFooter(); ?>
</body>
</html>
