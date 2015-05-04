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
</head>
<body>
	<?php
		$username = $_SESSION['username'];
		$cartItems = $_SESSION['cartItems'];
		
		#login to database
		dbLogin();
		dbSelect();
		
		#construct query
		$query ="SELECT transactions.inventoryID, inventory.iName, transaction.date FROM inventory, users, transactions WHERE
		$username = users.username and
		users.username = users.userID and
		users.userID = transactions.userID and
		transactions.statusReturn ='N' and
		transactions.inventoryID = inventory.inventoryID and
		inventory.inventoryID = inventory.iName;";
		
		executeQuery($query);

		if(sizeof($query) = 0){
			$MoviesOut = "false";
		}
		else{		
			$inventoryID = $resultsArray[0]["inventoryID"]; /*specify tables? inventory table*/
			$iName = $resultsArray[0]["iName"];             /*inventory table */
			$dateRented = $$resultsArray[0]["date"];         /*transactions table // reserved word?*/
			$dateDue = date_add($dateRented, date_interval_create_from_date_string('7 days'));
			$MoviesOut = "true";
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
	  <div class="movie_cover"><img src="img/<?php echo $inventoryID; ?>.jpg" class="center" /></div>
	  <div class="return_form">
	  <?php
	    if ($moviesOut = "true"){
          print "<form method="post" action="return2.php">";
            print "<input type="checkbox" name="return" value=$iName checked>Return this movie";
            print "<br />";
		    print "Due postmarked by $dueDate;"
            print "<br />";
		    print "<br />";
            print "<input type="submit" value="Submit" />";
          print "</form>";
		}
		else{
		  print "<p>";
		  print "You must rent something before you can return it.";
		  print "</p>";
		}
	  ?>
      </div>
    </div>
  </div>
  <div class="footer">
    <span>&copy; 2015 Team Zero Two Point Oh</span>
  </div>
</body>
</html>
