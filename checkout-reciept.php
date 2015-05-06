<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="header">
    <div class="navbar">
      <span class="logo">Graybox powered by RentalVideo&copy;</span>
      <div class="quick_links">
     <span><a href="login.html">Home</a></span><span><a href="new_releases.php">New Releases</a></span><span><a href="displayall.php">Available titles to rent</a></span>
    </div>
    <div class="statusbar">
      <div class="statusboxes">
          <?php displayUserbox(); ?>
        <?php displayCartbox(); ?>
        <div class="userbox">
          <span class="username"><a href="login.html">Login</a></span>
        </div>
        <div class="cartbox">
          <img src="img/shopping_cart.png" height="16px" width="16px"/> My Cart&nbsp;
          <span class="items_in_cart">1</span>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="title"><h1>Guest Checkout<h1></div>
    <div class="checkout_page">
      <div class="movie_cover"><img src="img/gonein60seconds_dvd_frontcover.jpg" /></div>
      <div class="reciept_display">
        <h3>Please bring this with you to &lt;location&gt;</h3>
        <div class="barcode">
          <img src="img/barcode.png">
        </div>
      </div>
    </div>
  </div>
  <div class="footer">
    <span>&copy; 2015 Team Zero Two Point Oh</span>
  </div>
         <?php functionFooter(); ?>
</body>
</html>


