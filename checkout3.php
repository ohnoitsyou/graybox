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
    </div>
    <div class="statusbar">
      <div class="statusboxes">
           <?php displayUserbox(); ?>
        <?php displayCartbox(); ?>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="title"><h1>Guest Checkout<h1></div>
    <div class="checkout_page">
      <div class="movie_cover"><img src="img/gonein60seconds_dvd_frontcover.jpg" /></div>
      <div class="location_picker">
        <form action="checkout-reciept.html">
          <select name="location">
            <option>Pick a location</option>
            <option>Location 1</option>
            <option>Location 2</option>
            <option>Location 3</option>
            <option>Location 4</option>
          </select>
          <br />
          <input type="submit" value="submit">
        </form>
      </div>
    </div>
  </div>
  <div class="footer">
    <span>&copy; 2015 Team Zero Two Point Oh</span>
  </div>
         <?php functionFooter(); ?>
</body>
</html>
