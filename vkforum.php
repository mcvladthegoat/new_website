<?php
//VK Forum Parser     vkforum
	include_once($_SERVER["DOCUMENT_ROOT"]."/system/simple_html_dom.php");
	include_once($_SERVER["DOCUMENT_ROOT"]."/moderncms/conf.php");
	$i = $f = 0;
	$link = mysql_connect(SQLADDR, SQLLOGIN, SQLPWD); //If you have another MySQL login & password, change it here
	mysql_select_db(SQLDB, $link);
	//mysql_set_charset('utf-8',$link);
	$vk2get = mysql_query("SELECT * from vkparser where website = '$serveraddr_var'", $link);
	echo "OK!<br>";
	if(mysql_num_rows($vk2get)){
		while($out = mysql_fetch_array($vk2get)){
			$dump = file_get_html("http://m.vk.com/".$out["group_name"]);
			echo "OK2!<br>";
			foreach($dump->find('div[class=profile_info] a[class=pm_item]') as $element_1)
			{
				if($i == 2){
					$undering = 200;
					while ($undering <=220){
					$dump2 = file_get_html("http://m.vk.com".$element_1->href."?offset=".$undering);
					echo "OK3!<br>";
					foreach($dump2 -> find('a[class=ti_title]') as $element_2)
					{
						$tryings = 0;
						while($tryings <= 100){
						$dump3 = file_get_html("http://m.vk.com".$element_2->href."?offset=".$tryings);
						$dump4 = $dump3;
						echo "OK4!<br>";
						$forumname = $element_2->innertext;
						//$forumname = mb_substr($forumname,0,strlen($forumname), 'UTF-8');
						$check_topic = mysql_query("SELECT * from vkforummain WHERE name='$forumname' AND website='$serveraddr_var'", $link);
						if(mysql_num_rows($check_topic) == 0){
							if($forumname != ''){
								$verify_topic = mysql_query("INSERT INTO vkforummain VALUES('$forumname','', 'yes', '','','$serveraddr_var')", $link);
								echo mysql_error();
							}
						}
						echo mysql_error();
						foreach($dump3 -> find('div[class=post_item] div[class=pi_text]') as $result_text)		
						{
							$element_3 =  $dump4->find('div[class=post_item] a img', $f);
							echo "OK5!<br>";
							$authorname = $dump4->find('div[class=pi_head] a', $f);
							$dateandtime = $dump4->find("div[class=pi_info] a[class=item_date]",$f);
							$check_recorder = mysql_query("SELECT * from vkforummsg WHERE name='$authorname->plaintext' AND text='$result_text->plaintext' AND website='$serveraddr_var'", $link);
							if(mysql_num_rows($check_recorder) == 0){
								if($authorname->plaintext != ''){
									$recorder = mysql_query("INSERT INTO vkforummsg VALUES('$authorname->plaintext', '$dateandtime->plaintext', '$forumname', '$result_text->plaintext','$element_3->src', '$serveraddr_var')", $link);
								}
							}
							echo mysql_error();
							echo "OK6!<br>";
							//$check_recorder2 = mysql_query("SELECT * from vkforum_main WHERE name = '$authorname->plaintext' AND photo = '$element_3->href' AND  forum = no AND website = '$serveraddr_var'", $link);
							//if(mysql_num_rows($check_recorder2) == 0){
							//if($authorname->plaintext != ''){
							//	$recorder2 = mysql_query("INSERT INTO vkforum_main VALUES('$authorname->plaintext','$element_3->src', 'no', '$serveraddr_var')", $link);
							//}
							//}
							echo mysql_error();
							echo "OK7!<br>";
							$f++;
						}
						$f=0;
					
					$tryings+=10;
					}
					}
				}
				$undering+=20;
			}
				$i++;
			}
		}
	}
?>