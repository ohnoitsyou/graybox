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
		$txID = $_POST['txid'];
		$iName = $_POST['iName'];
		
		#login to database
		dbLogin();
		dbSelect();
		
		#construct write: update statusReturn 
		$write = "UPDATE transactions, users SET transactions.statusReturn=1 WHERE
		users.username = '$username'  and
		users.userID = transactions.userID and
		'$txID' = transactions.transactionID;";
		#write to db
		$write_result = executeQuery($write);
		#if result object is not returned, then print an error and exit the PHP program
		if(! $write_result){
			print("Error - query could not be executed");
			$error = mysql_error();
			print "<p> . $error . </p>";
			exit;
		}
	?>
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
    <div class="title"><h1>Return Movies<h1></div>
	<h3>Please print this page to include with your movie.</h3>
	<div class="return_page">
	  <table id="t01">
	    <tr><td>Customer ID:</td><td><?php echo $username; ?></td></tr>
		<tr><td>Movie:</td><td><?php echo $iName; ?></td></tr>
	  </table>
	  <a href="return1.php"><h4>Have another movie to return?</a></h4>
    </div>
  </div>
  <div class="footer">
    <span>&copy; 2015 Team Zero Two Point Oh</span>
  </div>
  <?php functionFooter() ?>
</body>
</html>
