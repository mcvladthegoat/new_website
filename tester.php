<?php
	include_once("system/simple_html_dom.php");
	include_once("moderncms/conf.php");
	$link = mysql_connect(SQLADDR, SQLLOGIN, SQLPWD); //If you have another MySQL login & password, change it here
	mysql_select_db(SQLDB, $link);
	$tester = mysql_query("SELECT * FROM news LIMIT 4000, 4050", $link);
	while($out = mysql_fetch_array($tester)){
		echo "<br>".$out["content"];
	}