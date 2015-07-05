<!DOCTYPE html>

<html>
<title>Log into the Student Center!</title>

<?php

include "include.php";

//check for login, otherwise go back to homepage
if(isset($_SESSION["student_id"])) {
	echo "You are logged in, you will be redirected soon. \n";
	echo "or click <a href=\"homescreen.php\">here</a> to return. \n";
	header("refresh: 3; homescreen.php");
}

//provide login otherwise
else{
	echo "Enter your login information below: <br /><br />\n";
    echo '<form action="logincheck.php" method="POST">';
	echo "\n";
    echo 'Username: <input type="text" name="p_id" /><br />';
	echo "\n";
    echo 'Password: <input type="password" name="password" /><br />';
	echo "\n";
    echo '<input type="submit" value="Login" />';
	echo "\n";
    echo '</form>';
	echo "\n";
	echo '<br /><a href="homescreen.php">Homescreen</a>';
}

?>

</html>