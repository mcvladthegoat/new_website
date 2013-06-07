<?php
	session_start();
	if(!isset($_GET["pg"])){$_GET["pg"] = 1;}
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
			<div class=navi><p><a href="index.php">Главная</a>&nbsp &nbsp <a href="all-news.php" class="current">Все новости</a>&nbsp &nbsp <a href="discuss.php">Форум</a></p></div>
	<?php
		$link = mysql_connect(SQLADDR, SQLLOGIN, SQLPWD);
		mysql_select_db(SQLDB, $link);
  		$encoding = mysql_query("SET NAMES 'utf-8'", $link);
  		$top = $_GET["pg"] * 5;
  		$bottom = $top - 5;
  		$get = mysql_query("SELECT * FROM news WHERE website = '$serveraddr_var' ORDER BY 100000-id LIMIT $top, 5", $link);
  		if(mysql_num_rows($get)){
    		while($out = mysql_fetch_array($get)){
    			echo "<br><div class='news'><h2>".$out["name"]."</h2><p>";
    			if(file_exists("images/".$out["id"].".jpg")){
   					echo "<img src='images/".$out["id"].".jpg' class='left'>";
   				}
      			$cutted = mb_substr($out["content"], 0,150,'UTF-8');
      			echo $cutted."</p><a href=read.php?id=".$out["id"].">Далее...</a></div>";
      		}
      	}
      			  $counter = mysql_query("SELECT COUNT(*) from news where website = '$serveraddr_var'", $link);
	  $counted = mysql_result($counter, 0);
	  //echo $counted;
	  
	 // echo $counted;
	  $getnom = $_GET["pg"];
	  echo "<br><div id='pgnavi' class='news'><p>";
	  $cache = 0;
	 // echo $cache;
	  if($getnom == 1){$cache = 1;}
	  if($getnom != 1){
	  while($cache < $getnom){
	  		 $cache++;
	  	if($cache != $getnom){
	  	echo "<a href='all-news.php?pg=".$cache."'>".$cache."</a>";
	  }
	  }
	}
	  echo "&nbsp".$getnom."&nbsp";
	  $counted = $counted / 5;
	  while ($cache <= $counted){
	  	$cache++;
	  	echo "<a href='all-news.php?pg=".$cache."'>".$cache."</a>";
	  }




  echo "</p></div>";
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
