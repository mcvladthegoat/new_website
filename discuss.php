<?php
	session_start();
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
			<div class=navi><p><a href="index.php">Главная</a>&nbsp &nbsp <a href="all-news.php">Все новости</a>&nbsp &nbsp <a href="discuss.php" class="current">Форум</a></p></div>
			<h2> Обсуждения:</h2>
		<?php
			  			$link = mysql_connect(SQLADDR, SQLLOGIN, SQLPWD); //If you have another MySQL login & password, change it here
 						mysql_select_db(SQLDB, $link);
  						$encoding = mysql_query("SET NAMES 'utf-8'", $link);
 						$get = mysql_query("SELECT * FROM vkforummain WHERE website = '$serveraddr_var' AND forum = 'yes'", $link);
  						if(mysql_num_rows($get)){
  							while ($out = mysql_fetch_array($get)) {
  								echo "<br><div class='news'><h3>".$out["name"]."</h3>";
   								echo "<br><a href=join-discuss.php?name=".urlencode($out["name"]).">Почитать</a></div>";
  							}
  						}
  						mysql_close();
  		?>
	</div>
	<div id = "left">
	<?php
		if($_SESSION["logged"] == "true"){
			echo "<p align=left> Вы вошли с <small>".$_SESSION["email"]."</small></p>";
			echo "<a href = logout.php>Выйти</a>";
		}
		else {
			echo "		<h3 align=center>Авторизация</h3>
		<a href=login.php><img src=bt1.png width=150 height=60 title=Войти></a>
		<a href=registration.php><img src=reg.png width=150 height=60 title=Регистрация></a>";
		}
	?>


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