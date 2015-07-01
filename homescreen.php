<!DOCTYPE html>
		
<html>
<title>Student Center Log In</title>
<?php
	
	include ("include.php");
	
	if(!isset($_SESSION["p_id"])){
		echo "Welcome to the Student Center, please log in. <br>\n";
	}
	
	else{
		$p_id = htmlspecialchars($_SESSION["p_id"]);
		echo "Welcome $p_id. You are currently logged in.<br />";
	}
?>
</html>