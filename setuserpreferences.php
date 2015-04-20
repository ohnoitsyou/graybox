<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

  </head>
<body>

<?php
session_start();
include('api/common.php');

$action = $_POST["action"];
$children = $_POST["children"];
$comedies = $_POST["comedies"];
$documentaries = $_POST["documentaries"];
$dramas = $_POST["dramas"];
$foreign = $_POST["foreign"];
$horror = $_POST["horror"];
$sci_fi = $_POST["sci_fi"];
$tv = $_POST["tv"];
$thrillers = $_POST["thrillers"];

echo "Your preferences are saved! <br/>";
echo "They have been recorded.";

//Connect to database server
dbLogin();

//Select database
dbSelect();

//execute the query to insert the above PHP variables into the preferences table
$sql = executeQuery("INSERT INTO preferences (pref1,pref2,pref3,pref4,pref5,pref6,pref7,pref8,pref9,pref10) VALUES ('$action','$children','$comedies','$documentaries','$dramas','$foreign','$horror','$sci_fi','$tv','$thrillers');");

$result = mysql_query($query);
if(! $result){
	print("Error - query could not be executed");
	$error = mysql_error();
	print "<p> . $error . </p>";
	exit;
}
?>

</body>
</html>