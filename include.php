<?php
	$mysqli = new mysqli('localhost', 'USERNAME', '', 'studentcenter');	

if (mysqli_conect_errno()) {
	printf("Connect failed: %s\n", mysqli_conect_error());
	exit();
}

session_start();

if(issset($SESSION["REMOTE_ADDR"]) && $SESSION["REMOTE_ADDR"] != $SERVER["REMOTE_ADDR"]) {
	session_destroy();
	session_start();
}
?>

