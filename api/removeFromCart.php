<?php
/* David Young */
session_start();
$itemID = $_POST['itemID'];
$foundMatch = false;
for($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
  $item = $_SESSION['cart'][$i];
  if($item == $itemID) {
    unset($_SESSION['cart'][$i]);
    $foundMatch = true;
  }
}
$_SESSION['cart'] = array_values($_SESSION['cart']);
?>
