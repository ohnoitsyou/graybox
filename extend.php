<?php
session_start();
include('api/common.php');

$username = $_SESSION['username'];

#login to database
dbLogin();
dbSelect();


$dueDate = executeQuery("update transactions set dueDate = date_add(dueDate,interval 5 day));");

#if result object is not returned, then print an error and exit the PHP program
if(! $write_result){
	echo("Error - query could not be executed");
	$error = mysql_error();
	echo "<p> . $error . </p>";
else{
	echo $dueDate;
}
?>
