<?php 
/* David Young */
$dbhostname = 'studentdb.gl.umbc.edu';
$dbusername = 'dayoung1';
$dbpassword = 'dayoung1';
$dbdatabase = 'dayoung1';
$con;
$db;
function dbLogin() {
  global $dbhostname, $dbusername, $dbpassword, $con;
  $con = mysql_connect($dbhostname , $dbusername, $dbpassword);
  return $con;
}
function dbSelect() {
  global $dbdatabase, $db;
  $db = mysql_select_db($dbdatabase);
  return $db;
}
function executeQuery($query) {
  global $con;
  global $db;
  if(!$con) { die("You must login first"); }
  if(!$db)  { die("You must select the database first"); }
  $query_exp = explode(' ',trim($query));
  $queryType = $query_exp[0];
  $results = mysql_query($query);
  $resultsArray = array();
  $queryTypes = array("INSERT", "UPDATE", "DELETE", "DROP");
  if(in_array($queryType, $queryTypes)) {
    return $results;
  } else {
    if(mysql_num_rows($results) > 0) {
      for($i = 0; $i < mysql_num_rows($results); $i++) {
        $resultsArray[] =  mysql_fetch_assoc($results);
      }
    }
  }
  return $resultsArray;
}

function loggedInCheck() {
  if(!$_SESSION['logged_in']) {
    header('Location: login.php');
  }
}

function getLocations($zipcode) {
  $query = "";
  if($zipcode = "00000" || $zipcode = "") {
    $query = "select * from locations;";
  } else {
    $query = sprintf("select * from locations where zip = '%s';",
              mysql_real_escape_string($zipcode));
  }
  return executeQuery($query);
}
function getUserInfo($userid) {
  $query = sprintf("select * from users where userID = '%s';",
            mysql_real_escape_string($userid));
  return executeQuery($query);
}
function addToCartButton($id) {
  return "<input type=\"button\" value=\"Add To Cart\" onclick=\"addToCart($id)\" />";
}

function removeFromCartButton($id) {
  return "<input type=\"button\" value=\"Remove From Cart\" onclick=\"removeFromCart($id)\" />";
}

function displayUserbox() {
  print "<div class=\"userbox\">";
  print "  <span class=\"username\">Welcome " . $_SESSION['username'] . "</span> <span><a href=\"logout.php\">Logout?</a></span>";
  print "</div>";
}

function displayCartbox() {
  print "<div class=\"cartbox\">";
  print "  <img src=\"img/shopping_cart.png\" height=\"16px\" width=\"16px\" /> <a href=\"cart2.php\">My Cart</a>&nbsp";
  print "  <span class=\"items_in_cart\"></span>";
  print "</div>";
}

function functionFooter() {
  print "<script>(function() { updateCartCount(); })();</script>";
}
?>
