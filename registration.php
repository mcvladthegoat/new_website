<?php
	session_start();
	if(!isset($_GET["email"])){
		$rand = rand(1000,9999);
		$_SESSION["captcha"] = $rand;

	}
	if($_SESSION["logged"] == true){header("Location: index.php"); exit();}
?>
<!Doctype html>
<html>
<head>

	<link rel="stylesheet" type=text/css href=mainstyle.css>
	<meta charset=utf-8>
<?php
	include_once("system/vkparser.php");
	//include_once("system/vkforum.php")
	include_once("system/simple_html_dom.php");
	include_once("system/head_include.php");
	include_once("system/head_include3.php");
?>
</head>
<body>
<div id='container'>
	<div id='center'>
		<div class=header> <?php include_once("system/head_include2.php"); ?> </div>
			<div class=navi><p><a href="index.php">Главная</a>&nbsp &nbsp <a href="all-news.php">Все новости</a>&nbsp &nbsp <a href="discuss.php">Форум</a></p></div>
			<h2>Регистрация на сайте<small><small>  займет не более минуты.</small></small></h2>
			<form action="registration2.php" method=POST>
				<table>
				<tr><td><br>Ваш адрес эл.почты</td><td><br><input type=email name="email" required></td></tr>
				<tr><td><br>Ваше Имя</td><td><br><input type=text name="name1" required></td></tr>
				<tr><td><br>Фамилия</td><td><br><input type=text name="name2" required></td></tr>
				<tr><td><br>Пароль</td><td><br><input type=password name="pwd" required></td></tr>
				<tr><td><br>Введите число на картинке</td><td><br><input type=text name="captcha" required></td></tr>
				<tr><td><img src="/captcha.php"></td></tr>
				<tr><br><td></td><td><br><input type=submit value=Регистрация></td></tr>
				</table>
			</form>
		</div>
	<div id = "left">
		<h3>Реклама</h3>
		<p>...</p>

	</div>
	<div class=clear></div>
</div>
<!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href='http://www.liveinternet.ru/click' "+
"target=_blank><img src='//counter.yadro.ru/hit?t14.3;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet: показано число просмотров за 24"+
" часа, посетителей за 24 часа и за сегодня' "+
"border='0' width='88' height='31'><\/a>")
//--></script><!--/LiveInternet-->
</body>
</html>
