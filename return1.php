<?php
session_start();
include('api/common.php');
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
	<?php
		$username = $_SESSION['username'];
		$cartItems = $_SESSION['cartItems'];
		
		#login to database
		dbLogin();
		dbSelect();
		
		#construct query
		$query ='SELECT inventory.inventoryID, inventory.iName, transaction.date FROM inventory, users, transactions WHERE
		$username = users.username and
		users.username = users.userID and
		transactions.userID = users.userID and
		transactions.statusReturn ='N';'/*single or double quote around the "N"?*/
		
		executeQuery($query);
		
		$inventoryID = $resultsArray[inventoryID]; /*specify tables? inventory table*/
		$iName = $resultsArray[iName];             /*inventory table */
		$dateRented = $$resultsArray[date]         /*transactions table /////       reserved word?*/
		$dateDue = date_add($dateRented, date_interval_create_from_date_string('7 days')); 
		
		
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
        <form method="post" action="return2.php"> 
          <input type="checkbox" name="return" value="<?php echo $iName; ?>" checked>Return this movie
          <br />
		  Due postmarked by <?php echo $dueDate;?>
          <br />
		  <br />
          <input type="submit" value="Submit" />
        </form>
      </div>
    </div>
  </div>
  <div class="footer">
    <span>&copy; 2015 Team Zero Two Point Oh</span>
  </div>
</body>
</html>
