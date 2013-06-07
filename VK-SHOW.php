<?php
	//$raw = fopen("", "r");
/*	while(!feof($raw)){
		$dump .= fread($raw, 4096);
	}*/	
	include_once("simple_html_dom.php");
	$dump = file_get_html("http://vk.com/tradersunion");
	//$dump = htmlspecialchars($dump);
	echo $dump;
?>