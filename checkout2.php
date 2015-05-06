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
      <form id="card_information" action="checkout3.html">
        <table>
          <tr>
            <td><label>Name on Card:</label></td>
            <td><input type="text" name="name_on_card"></td>
          </tr>
          <tr>
            <td><label>Card Number:</label></td>
            <td><input type="text" name="card_number" inputmode="numeric" maxlength="16"></td>
          </tr>
          <tr>
            <td><label>Expiration:</label></td>
            <td><input type="text" size="4" maxlength="2" placeholder="Month">&nbsp;<input type="text" size="4" maxlength="4" placeholder="Year"></td>
          </tr>
          <tr>
            <td><label>CVV:</label></td>
            <td><input type="text" name="CVV" maxlength="4" size="4"></td>
          </tr>
          <tr>
            <td><input type="submit" value="submit"></td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </form>
    </div>
  </div>
  <div class="footer">
    <span>&copy; 2015 Team Zero Two Point Oh</span>
  </div>
         <?php functionFooter(); ?>
</body>
</html>
