<?php
	//VK Parser
	include_once($_SERVER["DOCUMENT_ROOT"]."/system/simple_html_dom.php");
	include_once($_SERVER["DOCUMENT_ROOT"]."/moderncms/conf.php");
	$link = mysql_connect(SQLADDR, SQLLOGIN, SQLPWD); //If you have another MySQL login & password, change it here
	mysql_select_db(SQLDB, $link);
	$j = 0;
	$encoding = mysql_query("SET NAMES 'utf-8'", $link);
		$vkget = mysql_query("SELECT * FROM vkparser WHERE website = '$serveraddr_var'", $link);
	if(mysql_num_rows($vkget)){
		while($out = mysql_fetch_array($vkget)){
			$input = file_get_html("http://m.vk.com/".$out["group_name"]);
			$just_for_img = file_get_html("http://m.vk.com/".$out["group_name"]);
			foreach($input->find('div[class=pi_text]') as $element) 
			{	
				$result = $element->innertext;
				$result = strip_tags($result,"<br>");
				//echo $result;
				$moremore = iconv_strlen($result, 'UTF-8');
				$imgprs = $just_for_img->find("a[class='medias_thumb thumb_item al_photo'] img", $j);
				$imgsrc = $imgprs->src;
				//echo $imgsrc;
				$j++;
				if($moremore > 21){
				$comp = mysql_query("SELECT * FROM news WHERE content='$result' AND website = '$serveraddr_var'", $link);
					if(mysql_num_rows($comp) == 0){
					$cropped = mb_substr($result, 0,20,'UTF-8');
					$cropped .= "...";
					$today = date("Y-m-d");
					mysql_query("SET NAMES 'utf-8'", $link);
					$write = mysql_query("INSERT INTO news VALUES('','$cropped','$result', '$out[category_select]','$today','', '$serveraddr_var', true)", $link);
					//$getid = mysql_query("SELECT id from news WHERE content='$result' and website = '$serveraddr_var'", $link);
					//$imgid = mysql_result($getid, 0);
					$image_addr = $_SERVER['DOCUMENT_ROOT']."/images/".$imgid.".jpg";
					/*if($imgsrc != ""){
						file_put_contents($image_addr, file_get_contents($imgsrc));
					}*/
				}
		}
	}
	}
}