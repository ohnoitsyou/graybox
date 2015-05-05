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
        <span>Home</span><span>New Releases</span><span>Movies</span><span>TV Shows</span>
      </div>
    </div>
    <div class="statusbar">
      <div class="locationbox">
        <span>Locations</span>
      </div>
      <div class="statusboxes">
        <div class="userbox">
          <span class="username"></span>
        </div>
        <div class="cartbox">
          <img src="img/shopping_cart.png" height="16px" width="16px"/> My Cart&nbsp;
          <span class="items_in_cart">1</span>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
  
    <div class="title"><h1>Thank You<h1></div>
    <div class="registration_page"> 
    <?php
    include('api/common.php');
    //Database Connection
    dbLogin();
    //Select Database
    dbSelect();
    //User Information 
    $fname = htmlspecialchars($_POST['fname']);
    $fname = mysql_real_escape_string($fname);
    $lname = htmlspecialchars($_POST['lname']);
    $lname = mysql_real_escape_string($lname);
    $email = mysql_real_escape_string($_POST["email"]);
    $username = mysql_real_escape_string($_POST["username"]);
    $pword = mysql_real_escape_string($_POST["pword"]);
    $pwordcheck = mysql_real_escape_string($_POST["pwordcheck"]); //will use javascript along with ajax to handle password check

    //Delivery Information
    $address = mysql_real_escape_string($_POST["address"]);
    $suite = mysql_real_escape_string($_POST["suite"]);
    $city = mysql_real_escape_string($_POST["city"]);
    $state = mysql_real_escape_string($_POST["state"]);
    $zip = mysql_real_escape_string($_POST["zip"]);

    //Payment Information
    $card_type = mysql_real_escape_string($_POST["card_type"]);
    $card_NUM = mysql_real_escape_string($_POST["card_NUM"]);
    $card_EXP = mysql_real_escape_string($_POST["card_EXP"]);
    $card_name = mysql_real_escape_string($_POST["card_name"]);
    $card_ccv = mysql_real_escape_string($_POST["card_ccv"]);
    $card_zip = mysql_real_escape_string($_POST["card_zip"]);


 if ($pword == $pwordcheck){
        echo "Thank you $fname $lname for registering with Greybox, your convienient movie rental kiosk. <br />";
        echo "We appreciate you buisiness.";

        //Insert Statement: Contructed Query 1: User Info & Delivery Info
        $constructed_query1 = "INSERT INTO users (fname, lname, email, username, pword, address, suite, city, state, zip, registration) 
            VALUES ( 
                '$fname', '$lname', '$email', '$username', MD5('$pword'), 
                '$address', '$suite', '$city', '$state', '$zip', CURDATE() 
            );"//to end insert statement
        ;//to end constructed query
        //Insert Statement: Contructed Query 2: Payment Info
        $last_id = mysql_insert_id();
        $constructed_query2 = "INSERT INTO payment_info (card_owner, card_type, card_NUM, card_EXP, card_name, card_ccv, card_zip) 
            VALUES ($last_id,'$card_type', '$card_NUM', '$card_EXP', '$card_name', '$card_ccv', '$card_zip');"//to end insert statement
        ;//to end constructed query

        executeQuery($constructed_query1);
        executeQuery($constructed_query2);

        echo "You are now a registered user. Rent away! <br /> <a href='new_releases.html'>Click here to view new releases.</a>  ";

    }
    ?>
    </div>
        
        
  </div>
  <div class="footer">
    <span>&copy; 2015 Team Zero Two Point Oh</span>
  </div>
</body>
</html>


