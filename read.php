<?php
	session_start();
	if(!isset($_GET["id"])){header("Location: index.php");}
?>
<!Doctype html>
<html>
<head>

	<link rel="stylesheet" type=text/css href=mainstyle.css>
	<meta charset=utf-8>
<?php
	include_once("system/vkparser.php");
	include_once("system/simple_html_dom.php");
	include_once("system/head_include.php");
	include_once("system/head_include3.php");
?>
</head>
<body>
<div id='container'>
	<div id='center'>
		<div class=header> <?php include_once("system/head_include2.php"); ?> </div>
			<div class=navi><p><a href="index.php">Главная</a>&nbsp &nbsp <a href="all-news.php" class="current">Все новости</a> &nbsp &nbsp <a href="discuss.php">Форум</a></p></div>
		<?php
						$link = mysql_connect(SQLADDR, SQLLOGIN, SQLPWD); //If you have another MySQL login & password, change it here
 						mysql_select_db(SQLDB, $link);
  						$encoding = mysql_query("SET NAMES 'utf-8'", $link);
  						$getname = mysql_query("SELECT * from news where id = '$_GET[id]' AND website = '$serveraddr_var'", $link);
   						if (mysql_num_rows($getname)) {
        					while ($out = mysql_fetch_array($getname)) {
        						echo "<br><h2>".$out["name"]."</h2><div class = 'news' align=left><p>";
        						if(file_exists("images/".$out["id"].".jpg")){
   									echo "<img src='images/".$out["id"].".jpg' width=200 height=200 class='left'>";
   								}
   								echo $out["content"]."</p></div>";
   							}
   						}
   						echo "<br><h3>Другие новости</h3>";
						$encoding = mysql_query("SET NAMES 'utf-8'", $link);	
						$get = mysql_query("SELECT * FROM news WHERE id <> '$_GET[id]' AND website = '$serveraddr_var' ORDER BY id DESC LIMIT 4,7", $link);
						if(mysql_num_rows($get)){
							while($out = mysql_fetch_array($get)){
									echo "<br><h4><a href=read.php?id=".$out["id"].">".$out["name"]."</a>";
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
<br><br>
</body>
</html>