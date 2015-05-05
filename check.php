<!--
	Christian Nieva
	5/6/15
	IS448
	Dr. Sampath
	Login
-->

<?php
 
if(isSet($_POST['username'])) {
$username = $_POST['username'];
 
$dbhostname = 'studentdb.gl.umbc.edu';
$dbusername = 'dayoung1';
$dbpassword = 'dayoung1';
$dbdatabase = 'dayoung1';
 
$db = mysql_connect($dbhostname , $dbusername, $dbpassword)
 or die ("Unable to connect to database.");
mysql_select_db ($dbdatabase, $db)
 or die ("Could not select database.");
    
    //trim and lowercase username
	$username =  strtolower(trim($_POST["username"])); 
 
$sql_check = mysql_query("SELECT userID FROM users WHERE username='".$username."'")
 or die(mysql_error());
 
if(mysql_num_rows($sql_check)) {
    echo '<font color="red">Welcome <strong>'.$username.'</strong>!</font>';
} else {
    echo 'OK';
}
}
?>