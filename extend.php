<?php
session_start();
include('api/common.php');

$username = $_SESSION['username'];

#login to database
dbLogin();
dbSelect();

#construct query
/*$query = "UPDATE transactions SET dueDate /*add a week * / WHERE $transactionID = transactions.transactionsID;";*/


$dueDate = executeQuery("date_add(dueDate, date_interval_create_from_date_string('7 days'));");

#if result object is not returned, then print an error and exit the PHP program
if(! $write_result){
	echo("Error - query could not be executed");
	$error = mysql_error();
	echo "<p> . $error . </p>";
else{
	echo $dueDate;
}
?>