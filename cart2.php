<?php
session_start();
require_once("api/common.php");
loggedInCheck();

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
  <div class="content">
    <div class="title"><h1>View cart</h1></div>
    <div class="cart_page">
      <?php if($itemsInCart) { ?>
        <table id="cart"> 
          <tr> 
            <th>Name</th> 
            <th>Price</th> 
            <th></th> 
          </tr> 
          <?php 
            $totalprice=0; 
            foreach($query as $item) {
            $totalprice += $item['price'];
          ?>  
          <tr id="<?php echo "cart_" . $item['inventoryID']; ?>"> 
            <td><?php echo $item['iName'] ?></td> 
            <td><span class="price"><?php echo $item['price'] ?></span>$</td> 
            <td><?php echo removeFromCartButton($item['inventoryID']); ?></td>
          </tr> 
          <?php } ?>  
          <tr> 
            <td colspan="4">Total Price: <span id="totalCost"><?php echo sprintf('%01.2f',$totalprice) ?></span>$</td> 
          </tr> 
        </table> 
      <p><a href="checkout1.php">Ready to checkout?</a></p>
      <br /> 
      <?php } else { ?>
      <p><a href="displayall.php">Go rent something!</a></p>
      <?php } ?>
    </div>
  </div>
  <div class="footer">
    <span>&copy; 2015 Team Zero Two Point Oh</span>
  </div>
  <?php functionFooter(); ?>
</body>
</html>
