<?php
session_start();
include('api/common.php');
$username = $_SESSION['username'];
dbLogin();
dbSelect();
$itemsInCart = false;
if(count($_SESSION['cart']) > 0) {
  $itemsInCart = true;
  $cartIDsString = implode(",",$_SESSION['cart']);
  $query = executeQuery("SELECT * FROM inventory WHERE inventoryID IN ($cartIDsString) order by iName ASC;");
}
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
  <div style="clear:both"></div>
  <div class="content">
    <?php if($itemsInCart) { ?>
    <div class="title"><h1>Checkout<h1></div>
    <div class="checkout_page">
      <div class="coverflow">
      <?php for($i = 0; $i < count($query); $i++) { ?>
          <div class="movie_cover"><img src="img/<?php echo $query[$i]['inventoryID'];?>.jpg" style="float:right;position:relative;left:-<?php echo 75 * $i;?>px;z-index:<?php echo $i; ?>;"/></div>
      <?php } ?>
      </div>
      <?php for ($i = 0; $i < count($query); $i++) { ?>
        <div class="move_title"><?php echo $query[$i]['iName'];?></div>
      <?php } ?>
      <hr />
      <div class="checkout_form">
        <form method="post" action="checkout-reciept.php"> 
          <h3>Pickup Location</h3>
          <select id="locations" name="pickup">
          </select>
          <h3>Payment Method</h3>
          <select id="payment" name="payment">
          </select>
          <br />
          <br />
          <input type="submit" value="Submit" />
        </form>
      </div>
    </div>
    <?php } else { ?>
      <h1>No items in cart</h1>
      <h2>Return to <a href="displayall.php">a list of what is available</a></h2>
    <?php } ?>
  </div>
  <div class="footer">
    <span>&copy; 2015 Team Zero Two Point Oh</span>
  </div>
  <?php functionFooter(); ?>
  <script>
    (function() {
      getLocations();
      getPayment('<?php echo $username; ?>');
     })();
  </script>
</body>
</html>
<!-- David Young -->
