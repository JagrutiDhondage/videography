<?php

session_start();
if(isset($_POST['logout'])){
	if(isset($_SESSION['username']) && isset($_SESSION["userid"])){

		unset($_SESSION["username"]);
		unset($_SESSION["userid"]);
		session_destroy();
		header("Location:homepage.php");

	}
}

?>

