<!DOCTYPE html>

<html>
<title>Log into the Student Center!</title>

<?php

include "include.php";

//check for login, otherwise go back to homepage
if(isset($_SESSION["p_id"])) {
	echo "You are logged in, you will be redirected soon. \n";
	echo "or click <a href=\"homescreen.php\">here</a> to return. \n";
	header("refresh: 3; homescreen.php");
}

//provide login otherwise
else{
	echo "";
}

?>

</html>