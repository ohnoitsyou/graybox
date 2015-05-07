<?php
session_start();
require_once('api/common.php');
dbLogin();
dbSelect();
$itemsInCart = false;
if(count($_SESSION['cart']) > 0) {
  $itemsInCart = true;
  $cartIDsString = implode(",",$_SESSION['cart']);
  $query = executeQuery("SELECT * FROM inventory WHERE inventoryID IN ($cartIDsString) order by iName ASC;");
  $userid = executeQuery("Select userid from users where username = '" . $_SESSION['username'] . "';");
  echo $_POST['location'];
  $location = executeQuery("select * from locations where locationID = '" . $_POST['pickup'] . "';");
  $txids = "";
  if(count($userid) > 0) {
    for($i = 0; $i < count($_SESSION['cart']); $i++) {
      $insertTX = "insert into transactions (userID, statusReturn, card_id, inventoryID, dueDate) values (" . $userid[0]['userid'] . ",'N'," . $_POST['payment'] . "," . $_SESSION['cart'][$i] . ", date_add(now(), INTERVAL 7 day));";
        $txids .= mysql_insert_id();
        if($i != count($query) - 1) {
          $txids .= ", ";
        } 
      $result = executeQuery($insertTX);
      $txids .= mysql_insert_id();
    }
  }
  unset($_SESSION['cart']);
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
    <div class="title"><h1>Checkout<h1></div>
    <div class="checkout_page">
      <div class="coverflow">
      <?php for($i = 0; $i < count($query); $i++) { ?>
          <div class="movie_cover"><img src="img/<?php echo $query[$i]['inventoryID'];?>.jpg" style="float:right;position:relative;left:-<?php echo 75 * $i;?>px;z-index:<?php echo $i; ?>;"/></div>
      <?php } ?>
      </div>
      <?php $movieTitles = "" ?>
      <?php for ($i = 0; $i < count($query); $i++) { 
        $movieTitles .= $query[$i]['iName'];
        if($i != count($query) - 1) {
          $movieTitles .= ", ";
        }
      } ?>
        <div class="move_title"><?php echo $movieTitles;?></div>
      <hr />
      <div class="reciept_display">
        <h3>Please bring this with you to <?php echo $location[0]['address'] . ", " . $location[0]['state'] . ", " . $location[0]['zipcode']; ?></h3>
        <div id="barcode" class="barcode">
          <img src="img/barcode.png">
        </div>
      </div>
    </div>
  </div>
  <div class="footer">
    <span>&copy; 2015 Team Zero Two Point Oh</span>
  </div>
         <?php functionFooter(); ?>
  <script>
    /* getQR("txids:'<?php echo $txids; ?>'") */
  </script>
</body>
</html>
