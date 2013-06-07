<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
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
		<li><a href="index.php">Главная</a></li>
		<li><a href="news.php">Новости</a></li>
		<li><a href="graphics.php">Графики валют</a></li>
		<li><a href="termins.php">Терминология</a></li>
	</ul>
</div> <!-- header -->

<div id="PATH">
	<p><a href="#">Главная страница</a> <span class="Arrow">&raquo;</span>Чтение новости</p>
</div> <!-- PATH -->
<div id="SIDEBAR">
	<h1>Свежие новости</h1>
<?php
	//VK Parser
	include_once("system/simple_html_dom.php");
	include_once("moderncms/conf.php");
	$link = mysql_connect(SQLADDR, SQLLOGIN, SQLPWD); //If you have another MySQL login & password, change it here
	mysql_select_db(SQLDB, $link);
	$encoding = mysql_query("SET NAMES 'utf-8'", $link);
	$get = mysql_query("SELECT * FROM news WHERE id <> '$_GET[id]' AND website = '$serveraddr_var' ORDER BY 100000-id LIMIT 4,8", $link);
	if(mysql_num_rows($get)){
		while($out = mysql_fetch_array($get)){
			echo "<p class=Date>".$out["date"]."</p>";
			echo "<p>".$out["name"]."</p>";
			echo "<p class=More><a href=read.php?id=".$out["id"].">Далее...</a></p>";
		}
	}

 ?>
	<h1>Реклама</h1>
</div> <!-- sidebar -->
<div id="CONTENT">
	<h2>Наши контакты</h2>
	<br><p align=center> Если у вас есть какие-нибудь замечания, пожелания или предложения о сотрудничестве, пишите на этот адрес: <a href="mailto:cross-tester@inbox.ru">cross-tester@inbox.ru</a> Мы ответим вам в самое ближайшее время!</p>
</div>
<?php
	include_once("vkparser.php");
?>
<div id="FOOTER">
<ul>
   <li><a href="index.php" class="First">Главная</a> |</li>
   <li><a href="news.php">Новости</a> |</li>
   <li><a href="termins.php">Терминология</a> |</li>
   <li><a href="contacts.php">Наши контакты</a> |</li>
   <li><a href="map.php">Карта сайта</a></li>
</ul>
<p><!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href='http://www.liveinternet.ru/click' "+
"target=_blank><img src='//counter.yadro.ru/hit?t45.7;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet' "+
"border='0' width='31' height='31'><\/a>")
//--></script><!--/LiveInternet-->
&nbsp;&copy;2013, Forex-Success.ru </p>
</div> <!-- footer -->
</body>
</html>
