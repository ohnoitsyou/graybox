<?php
session_start();
if(!session_is_registered(username)){
header("location:new_releases.html");
}
?>

<html>
<body>
Login Successful
</body>
</html>