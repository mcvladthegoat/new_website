<?php
	/*echo $haystack = "
      <div class=wall_text><a class=author href=/ratatataaa>Достойные</a> <div id=wpt-27139162_2766><div class=wall_post_text>Никогда никого не слушай. Имей своё мнение. Свою голову. Свои мысли и идеи. Планы на жизнь. Не гонись ни за кем. Только шаг на встречу, но не вдогонку. Это – жизнь. Никто за тебя не будет строить твоё счастье. Всеми управляет зависть&#33; Никого не слушай.";
	$haystack = strstr($haystack, "<div class=wall_post_text>");
	echo $haystack;*/   //JUST EXAMPLE, NOTHING ELSE
	include_once("system/simple_html_dom.php");

	$raw = fopen("http://www.vk.com/admiral", "r");
	while(!feof($raw)){
		$dump .= fread($raw, 4096);
	}//tradersunion?offset=70&own=1#posts
	$dump = file_get_html("http://m.vk.com/admiral");
	strip_tags($dump);
	//echo $dump;
	//$haystack = strstr($dump, "<div class=\"text\">");
	//preg_match("/<div class=\"text\">/i", $dump, $result);
	//$haystack = explode("div class=\"text\">",$dump);
	//$domparser = new domDocument;
	//$dom->loadHTML($dump);
	foreach($dump->find('div[class=profile_info] a[class=pm_item]') as $element)
	{
    	$f = 0;
		if($i == 2){
		echo "http://m.vk.com".$element->href."<br>";
		
		    $dump2 = file_get_html("http://m.vk.com".$element->href);
			foreach($dump2->find('a[class=ti_title]') as $element2){
				echo $element2->href."&nbsp<b>".$element2->plaintext."</b><br>";
				$dump3 = file_get_html("http://m.vk.com".$element2->href);
				$dump4 = $dump3;
				//foreach($dump3->find('div[class=post_item] div[class=pi_text]') as $element3){
				//echo "&nbsp&nbsp&nbsp|<img src=".$element3->src."><br><br>";
					echo "|||||||&nbsp&nbsp<i>".$element3->innertext."</i><br>";
				foreach($dump4->find('div[class=post_item] a img') as $element4){
				echo "<img src=".$element4->src."><br>";
				echo $dump3->find('div[class=post_item] div[class=pi_text]', $f);
				$f++;}
				//}
				$f=0;
			}
			
		}
    	$i++;
    	echo $element->innertext."<br><br>";
    	$srcc = $element->src;
    	//if($srcc != ""){
    	//file_put_contents($i.".jpg", file_get_contents($element->src));
    	//$i++;
    //}
}

	//echo $haystack;   //JUST EXAMPLE, NOTHING ELSE
	//print_r($haystack);
	//echo $result;
	fclose($raw);
?>