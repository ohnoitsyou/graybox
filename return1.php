<?php
session_start();
include('api/common.php');
loggedInCheck();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  
  <script src=" http://ajax.googleapis.com/ajax/libs/prototype/1.6.0.3/prototype.js" type="text/javascript"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/scriptaculous/1.8.2/scriptaculous.js" type="text/javascript"></script>
  <script src"js/return.js" type="text/javascript"></script>
</head>
<body>
	<?php
		$username = $_SESSION['username'];
		$cartItems = $_SESSION['cartItems'];
		
		#login to database
		dbLogin();
		dbSelect();
		
		#construct query
		$query ="SELECT transactions.transactionID, transactions.inventoryID, transactions.dueDate, inventory.iName FROM inventory, users, transactions WHERE
		\"$username\" = users.username and
		users.userID = transactions.userID and
		transactions.statusReturn ='N' and
		transactions.inventoryID = inventory.inventoryID;";
		
		$resultsArray=executeQuery($query);

		if(count($resultsArray) > 0){
			$MoviesOut = true;
		}
		else{			
			$MoviesOut = false;
		}
	?>
  <div class="header">
    <div class="navbar">
      <span class="logo">Graybox powered by RentalVideo&copy;</span>
      <div class="quick_links">
        <span>Home</span><span>New Releases</span><span>Movies</span><span>TV Shows</span>
      </div>
    </div>
    <div class="statusbar">
      <div class="locationbox">
        <span>Locations</span>
      </div>
      <div class="statusboxes">
        <div class="userbox">
          <span class="username">Welcome <?php $username ?></span>
        </div>
        <div class="cartbox">
          <img src="img/shopping_cart.png" height="16px" width="16px"/> My Cart&nbsp;
          <span class="items_in_cart"><?php $cartItems ?></span>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="title"><h1>Return Movies<h1></div>
	<h1>Movies Currently Out:</h1>
	<div class="return_page">
	  
	  <?php
	    if ($moviesOut){
			print "<table>";
			for ($i=0; $i<count($resultsArray); $i++) {
			  print "<form method=\"post\" action=\"return2.php\">"; /*return form*/
		      print "<div class=\"return_form\">";
			  print "<div class=\"movie_cover\"><tr><td><img id=\"img1\" src=\"img/" . $resultsArray[$i]["inventoryID"] . ".jpg\" class=\"center\" onHover=\"coverHover()\" /></td></tr></div>";/*close movie_cover div*/
			  print "<tr><td><input type=\"submit\" name=\" value=\"" . $iName . "\" />Return this movie</td></tr>";
			  print "<input type=\"hidden\" name=\"txid\" value=\"" . $resultsArray[$i]["transactionID"] . "\" />";
              print "<tr><td><input type=\"button\" value=\"Extend Rental\" onclick=\"extendRental(\"$transactionID\",\"$inventoryID\")\" /></td></tr>";
              print "</form></div>";/*close return_form div */
			  print "<tr></tr>";
			}
			print "</table>";
	    }
	    else{
	      print "<p id=\"para1\" onhover=\"paraHover()\">";
	      print "You must rent something before you can return it.";
	      print "</p>";
 	    }
	  ?>
    </div> <!--close return_page div-->
  </div> <!--close content div-->
  <div class="footer">
    <span>&copy; 2015 Team Zero Two Point Oh</span>
  </div>
</body>
</html>
