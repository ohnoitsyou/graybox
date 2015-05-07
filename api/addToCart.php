<?php
/* David Young */
  session_start();
  $titleID = $_POST['itemID'];
  $alreadyInCart = false;
  foreach($_SESSION['cart'] as $item) {
    if($titleID === $item) {
      $alreadyInCart = true;
      break;
    }
  }
  if(!$alreadyInCart) {
    $_SESSION['cart'][] = $titleID;
    echo "1";
  } else {
    echo "-1";
  }
?>
