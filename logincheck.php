<!DOCTYPE html>

<html>
<title>Log into the Student Center!</title>

<?php

include ("include.php");
// check if they exist in the database
  if(isset($_POST["p_id"]) && isset($_POST["password"])){
    if ($stmt = $mysqli->prepare("select p_id,password         from person where p_id = ? and password = ?")){
	  $input['p_id'] = $_POST["p_id"];
	  $input['password'] = md5($_POST["password"]);
      $stmt->bind_param("ss", $input['p_id'], $input['password']);
      $stmt->execute();
      $stmt->bind_result($p_id, $password);
	    //if there is a match set session variables and send user to homepage
        if ($stmt->fetch()) {
		  $_SESSION["p_id"] = $p_id;
		  $_SESSION["REMOTE_ADDR"] = $_SERVER["REMOTE_ADDR"]; //store clients IP address to help prevent session hijack
         	echo "You are logged in, you will be                     redirected soon, \n";
	       echo "or click <a                       href=\"homescreen.php\">here</a> to return. \n";
	       header("refresh: 3; homescreen.php");
        }
		//if no match then tell them to try again
		else {
		  sleep(3); //pause a bit to help prevent brute force attacks
		  echo "Username/Password mismatch, please try            again.";
		  echo "You will be redirected soon, \n"; 
            echo "or click <a           href=\"login.php\">here</a>.\n";
		  header("refresh: 3; login.php");
		}
      $stmt->close();
	  $mysqli->close();
    }  
  }


?>

</html>