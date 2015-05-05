<?php
require_once ('common.php');
dbLogin();
dbSelect();
$movie_query = "SELECT DISTINCT * from inventory where releaseDate > NOW() ORDER BY inventoryID DESC LIMIT 1;";
$results = executeQuery($movie_query);
echo "<img src=\"img/<?php echo $movie['inventoryID']; ?>.jpg\" alt=\"<?php echo $movie['iName']; ?>\" height=\"300px\" width=\"250px\" onmouseover=\"this.style.height='500px';this.style.width='300px';\" onmouseout=\"this.style.height='300px';this.style.width='250px';\" />";
?>

