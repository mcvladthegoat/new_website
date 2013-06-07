<?php
	session_start();
	//if(!isset($_SESSION["email"])){header("Location: index.php"); exit();}
	unset($_SESSION["email"]);
	unset($_SESSION["logged"]);
	header("Location: index.php");
?>