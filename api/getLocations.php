<?php
require_once('common.php');
dbLogin();
dbSelect();
$sql = "select * from locations;";
$results = executeQuery($sql);
$returnString = "";
for($i = 0; $i < count($results); $i++) {
  //$returnString += "<option value=\"$results['locationID']\">$results['address'] $results['state'] , $results['zipcode'] </option>";
  $returnString += "<option></option>";
}
 echo $returnString;
?>
