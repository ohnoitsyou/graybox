<?php
/* David Young */
require_once('common.php');
dbLogin();
dbSelect();
$username = $_POST['username'];
$paymentInfo = executeQuery("select card_id, card_type, card_num from payment_info, users where users.username = '$username' and users.userID = payment_info.card_owner;");
$returnString;
for($i = 0; $i < count($paymentInfo); $i++) {
  $returnString .= "<option value=\"" . $paymentInfo[$i]['card_id'] . "\">" . ucfirst($paymentInfo[$i]['card_type']) . " - " . substr($paymentInfo[$i]['card_num'],-4) . "</option>";
}
echo $returnString;
?>
