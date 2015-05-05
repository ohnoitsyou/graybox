<?php
include('api/common.php');
//Database Connection
dbLogin();
//Select Database
dbSelect();
$username = mysql_real_escape_string($_POST["username"]);
// checks booleans
$usernameTaken = false;
//Create an array $userInfo[] --containing ll usernames
$userInfo = executeQuery("select username from users;");
foreach($userInfo as $takenName) {
    if($username == $takenName['username']) {
        $usernameTaken = true;
    }
}
if ($usernameTaken == false){
    $response="username available";
    echo "$response";
}  
else {
    $response="username taken";
    echo "$response";
}  
?>
