﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Форекс Главные новости - Forex-Success.ru</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="HEADER">
	<h1><a href="/">Forex-Success</a></h1>
	<!---<p class="NextPage"><a href="#">></a></p> !---->
	<ul>
		<li><a href="#">Главная</a></li>
		<li><a href="#">Новости</a></li>
		<li><a href="#">Графики валют</a></li>
		<li><a href="#">Терминология</a></li>
	</ul>
</div> <!-- header -->

<div id="PATH">
	<p><a href="#">Главная страница</a> <span class="Arrow">&raquo;</span>Последние новости</p>
</div> <!-- PATH -->

<div id="SIDEBAR">
<h1>Свежие новости</h1>
<?php
	//TestZone
	include_once("simple_html_dom.php");
	$input = file_get_html("http://m.vk.com/ratatataaa");
		foreach($input->find('div[class=text]') as $element) 
	{	if ($i<4) {
		
	
    	echo "<p class=Date>Сегодня</p>
    	<p>".$element->innertext. '</p>';
    	echo "<p class=More><a href=''>Пока на тесте...</a></p>";
    	$i++;
    }
    }
 ?>
	<h1>Реклама</h1>
	<p><a href="http://www.gettemplate.com/?fromnightcity">www.gettemplate.com</a></p>
	<p><a href="http://www.wisepixel.com/?fromnightcity">www.wisepixel.com</a></p>
	<p><a href="http://www.funnyball2.com/?fromnightcity">www.funnyball2.com</a></p>
</div> <!-- sidebar -->

<div id="CONTENT">
<h1>Text Header</h1>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam auctor semper libero. Vestibulum at erat eget arcu sagittis adipiscing. Vestibulum odio nisi, scelerisque et, tempus et, adipiscing vitae, augue. Fusce consectetuer, elit sit amet viverra ornare, odio eros luctus nisl, vel tempus felis quam et arcu. Proin id elit. Fusce rutrum mauris sit amet nibh viverra porttitor. Phasellus eu lorem vitae augue aliquet aliquam. Integer vestibulum viverra tellus. Aliquam est arcu, ullamcorper nec, molestie vitae, rutrum vitae, ligula. Vivamus vitae augue at dui consequat tempor.</p>
<p>Ut porttitor aliquam ligula. Quisque ultrices. Proin massa lectus, molestie sed, porta consequat, ornare ac, leo. Etiam pellentesque, nibh at interdum interdum, mauris nisl aliquet lorem, at sodales elit dolor id velit. Phasellus iaculis velit viverra magna. Nullam tincidunt molestie erat. Pellentesque justo. Ut elementum auctor dolor. Nam sagittis tempor purus. Morbi a sem non mi tempus feugiat. Integer tempor dolor non tortor. Ut ullamcorper sapien ut quam. Fusce posuere porttitor felis. Cras volutpat dignissim massa.</p>
<p>Aliquam sit amet augue in dui porttitor consectetuer. Nulla facilisi. Nunc suscipit, diam et dignissim consequat, sapien ante sodales orci, et lobortis tellus tortor imperdiet dui. Donec volutpat nonummy dui. In hac habitasse platea dictumst. Suspendisse potenti. Vestibulum ultrices pharetra ligula. Nulla facilisi. In accumsan congue turpis. <a href="#">Integer lorem</a>. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas dui. Etiam sit amet dolor vitae nunc fermentum blandit. Donec tincidunt. Suspendisse odio diam, sagittis vitae, consectetuer vel, cursus sed, enim. Phasellus ac lacus. Ut luctus, sapien ut sagittis cursus, tellus justo aliquam purus, vel consequat massa ligula sit amet magna.</p>
<h1>Second Header</h1>
<p>In velit. In convallis, libero at suscipit tempus, nunc tortor tempus augue, in tincidunt urna dui eget purus. Nunc leo sem, pulvinar non, euismod eu, condimentum sed, massa. Vivamus lorem arcu, consequat nec, ornare id, porttitor non, felis. Nullam nec dolor. Quisque sed urna. Nam libero. Praesent vel orci non nulla adipiscing aliquam. Sed enim dolor, hendrerit quis, rutrum sed, tincidunt a, mi. Donec fermentum metus vel ligula tempor condimentum. Aliquam erat volutpat. Cras fringilla faucibus erat. Aenean congue.</p>
<p>Curabitur arcu tellus, suscipit in, aliquam eget, ultricies id, sapien. Nam est. Donec neque risus, tempor vitae, blandit in, porttitor a, sapien. Fusce sollicitudin quam ac neque. Proin ac nulla id nisi dapibus commodo. Cras nulla purus, malesuada eu, pretium id, imperdiet vitae, odio. Phasellus congue ultrices lorem. Quisque sodales. Aliquam erat volutpat. Donec at mauris ut nisl aliquet convallis. Vivamus quam urna, suscipit at, porttitor sed, cursus quis, lorem.</p>
</div> <!-- content -->

<div id="FOOTER">
<ul>
   <li><a href="#" class="First">Главная</a> |</li>
   <li><a href="#">Новости</a> |</li>
   <li><a href="#">Терминология</a> |</li>
   <li><a href="#">Наши контакты</a> |</li>
   <li><a href="#">Карта сайта</a></li>
</ul>
<p>&copy; 2005, Company Name. All rights reserved.</p>
<p>Designed by <a href="http://www.gettemplate.com/?fromnightcity">GetTemplate</a></p>
</div> <!-- footer -->
</body>
</html>