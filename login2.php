<?php
	session_start();
	if(!isset($_POST)){header("Location: index.php"); exit();}
	include_once("system/vkparser.php");
	$link = mysql_connect(SQLADDR, SQLLOGIN, SQLPWD); //If you have another MySQL login & password, change it here
 	mysql_select_db(SQLDB, $link);
  	$encoding = mysql_query("SET NAMES 'utf-8'", $link);
  	$_POST["email"] = strip_tags($_POST["email"]);
  	$login = mysql_query("SELECT * from vkforummain WHERE email = '$_POST[email]' AND website = '$serveraddr_var' AND pwd='$_POST[pwd]'", $link);
  	if(mysql_num_rows($login)){
  		$_SESSION["logged"] = "true";
  		$_SESSION["email"] = $_POST["email"];
  		header("Location: index.php");
  		exit();
  	}
  	else{
  		header("Location: login.php");
  		$_SESSION["logged"] = "false";
  	}
?>
