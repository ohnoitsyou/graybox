<?php
require_once ('api/common.php');
dbLogin();
dbSelect();
$movie_query = "SELECT DISTINCT inventoryID from inventory where releaseDate between DATE_SUB(Now(), INTERVAL 30 DAY) AND NOW() ORDER BY inventoryID DESC LIMIT 5;";
$results = executeQuery($movie_query);
echo json_encode($results);
?>

