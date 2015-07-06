<?php
	$mysqli = new mysqli("localhost", "root", "", "university");	

if (mysqli_conect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}

session_start();

if(issset($SESSION["REMOTE_ADDR"]) && $SESSION["REMOTE_ADDR"] != $SERVER["REMOTE_ADDR"]) {
	session_destroy();
	session_start();
}
?>

