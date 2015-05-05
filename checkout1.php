<?php
  session_start();
  include('api/common.php');
  $_SESSION['username'] = 'cnieva';
  $username = $_SESSION['username'];
  $num_items_in_cart = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script type="text/javascript">
    function filterZips() {
      return false;
      alert('filtering');
      var zipcode = document.getElementById('zipcode');
      var XHR = new XMLHttpRequest();
      XHR.onLoad = zipResp;
      XHR.open("GET","api/narrowLocations.php");
      XHR.send();
    }
    function zipResp(data) {
      console.log('RT:',this.responseText); 
      console.log('data:',data); 
    }
  </script>
</head>
<body>
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
          <span class="username">Welcome <?php echo $username; ?></span>
        </div>
        <div class="cartbox">
          <img src="img/shopping_cart.png" height="16px" width="16px"/> My Cart&nbsp;
          <span class="items_in_cart"><?php echo $num_items_in_cart; ?></span>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="title"><h1>Checkout<h1></div>
    <div class="checkout_page">
      <div class="movie_cover"><img src="img/gonein60seconds_dvd_frontcover.jpg" /></div>
      <div class="move_title"><h1>Gone in 60 Seconds</h1></div>
      <hr />
      <div class="checkout_form">
        <form action="checkout2.html"> 
          <h3>Pickup Location</h3>
          <input type="text" value="#####" id="zipcode" size="5"><input type="button" value="filter locations" onclick="filterZips()">
          <br />
          <select name="pickup">
            <option value="loc_1">Location 1</option>
            <option value="loc_2">Location 2</option>
            <option value="loc_3">Location 3</option>
          </select>
          <h3>Payment Method</h3>
          <select name="payment">
            <option value="dummy">Chose a method</option>
            <option value="stored">Saved ...</option>
            <option value="new">Enter a new card</option>
          </select>
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
<!-- David Young -->
