<?php
/* David Young */
require_once('common.php');
dbLogin();
dbSelect();
$sql = "select * from locations;";
$results = executeQuery($sql);
$returnString = "";
for($i = 0; $i < count($results); $i++) {
  $returnString .= "<option value=\"" . $results[$i]['locationID'] . "\">" . $results[$i]['address'] . ", " . $results[$i]['state'] . ", " . $results[$i]['zipcode'] . "</option>";
}
 echo $returnString;
?>
