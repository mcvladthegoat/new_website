<?php
	/*REGISTRATOR*/
	session_start();
	if((!isset($_GET)) || (!isset($_SESSION["captcha"]))){header("Location: index.php"); exit();}
	if($_SESSION["captcha"] != $_POST["captcha"]){header("Location: registration.php"); exit();}
	$_POST["name1"] = strip_tags($_POST["name1"]);
	$_POST["name2"] = strip_tags($_POST["name2"]);
	$_POST["email"] = strip_tags($_POST["email"]);
	$_POST["pwd"] = strip_tags($_POST["pwd"]);
	include_once("system/vkparser.php");
	$link = mysql_connect(SQLADDR, SQLLOGIN, SQLPWD); //If you have another MySQL login & password, change it here
 	mysql_select_db(SQLDB, $link);
  	$encoding = mysql_query("SET NAMES 'utf-8'", $link);
  	$check_unique = mysql_query("SELECT * from vkforummain WHERE email = '$_POST[email]' AND website = '$serveraddr_var'", $link);
  	if(mysql_num_rows($check_unique)){
  		header("Location: failed.php");
  		exit();
  	}
  	$fullname = $_POST["name1"]." ".$_POST["name2"];
  	$register = mysql_query("INSERT INTO vkforummain VALUES('$fullname', '', 'no','$_POST[email]', '$_POST[pwd]', '$serveraddr_var')");
  	mysql_close();
?>
<!Doctype html>
<html>
<head>

	<link rel="stylesheet" type=text/css href=mainstyle.css>
	<meta charset=utf-8>
<?php
	include_once("system/simple_html_dom.php");
	include_once("system/head_include.php");
	include_once("system/head_include3.php");
?>
</head>
<body>
<div id='container'>
	<div id='center'>
		<div class=header> <?php include_once("system/head_include2.php"); ?> </div>
			<div class=navi><p><a href="index.php" class="current">Главная</a>&nbsp &nbsp <a href="all-news.php">Все новости</a> &nbsp &nbsp <a href="discuss.php">Форум</a></p></div>
			<h2> Ура! Поздравляем!</h2>
			<p> Вы были успешно зарегистрированы! Теперь Вы можете <a href="login.php">авторизоваться</a> на сайте.</p>
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
