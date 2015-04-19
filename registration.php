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
          <span class="username">Welcome cnieva</span>
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
    //User Information 
    $fname = htmlspecialchars($_POST['fname']);
        $fname = mysql_real_escape_string($fname);
    $lname = htmlspecialchars($_POST['lname']);
        $lname = mysql_real_escape_string($lname);
    $email = mysql_real_escape_string($_POST["email"]);
    $pword = mysql_real_escape_string($_POST["pword"]);
    $pwordcheck = $_POST["pwordcheck"]; //will use javascript to handle password check

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

    

echo "Thank you $fname $lname for registering with Greybox, your convienient movie rental kiosk. <br />";
echo "We appreciate you buisiness.<br/> Please review your submitted user information below.";

//Database Connection
dbLogin();
//Select Database
dbSelect();

//Insert Statement: Contructed Query 1: User Info & Delivery Info
    $constructed_query1 = "INSERT INTO users (fname, lname, email, pword, address, suite, city, state, zip, registrationDate) 
        VALUES ( 
            '$fname', '$lname', '$email', '$email', MD5('$pword'), 
            '$address', '$suite', '$city', '$state', '$zip', CURDATE() 
        );"//to end insert statement
    ;//to end constructed query
//Insert Statement: Contructed Query 2: Payment Info
    $constructed_query2 = "INSERT INTO payment_info (card_owner, card_type, card_NUM, card_EXP, card_name, card_ccv, card_zip) 
        VALUES ('I DUNNO WHAT TO PUT HERE','$card_type', '$card_NUM', '$card_EXP', '$card_name', '$card_ccv', '$card_zip')
        );"//to end insert statement
    ;//to end constructed query

executeQuery($constructed_query1);
executeQuery($constructed_query2);

	$constructed_query_out ="SELECT fname, lname, email, address, suite, city, state, zip FROM users";
	$result=mysql_query($constructed_query_out);

/* I GUESS I DONT NEED THIS? i see you included results in the executeQuery function

if(! $result){
    print("<br /> Error - query could not be executed");
    $error = mysql_error();
    print "<p>$error</p>";
    exit;
  }

$num_rows = mysql_num_rows($result);

  for($row_num = 1; $row_num <= $num_rows; $row_num++){
      $row = mysql_fetch_array($result);
      print("<h2> $row[fname]  $row[lname]</h2>
              <p> Email: $row[email] <br/><br/><br/>
                  Address: $row[address] <br/> 
                  Suite: $row[suite] <br/> 
                  City: $row[city] <br/> 
                  State: $row[state] <br/> 
                  Zip: $row[zip] <br/><br/><br/>
              </p>");
}
  
mysql_close($db);
*/

echo "You are now a registered user. Rent away!";
?>

<a href="new_releases.html">Click here to view new releases.</a>
        
    </div>
  </div>
  <div class="footer">
    <span>&copy; 2015 Team Zero Two Point Oh</span>
  </div>
</body>
</html>


