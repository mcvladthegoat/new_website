<?php
	session_start();
?>
<!Doctype html>
<html>
<head>

	<link rel="stylesheet" type=text/css href=mainstyle.css>
	<meta charset=utf-8>
<?php
	//include_once("system/vkparser.php");
	include_once("system/simple_html_dom.php");
	include_once("system/head_include.php");
	include_once("system/head_include3.php");
  include_once("moderncms/conf.php");

function translitIt($str) 
{
    $tr = array(
        "А"=>"a","Б"=>"b","В"=>"v","Г"=>"g",
        "Д"=>"d","Е"=>"e","Ж"=>"j","З"=>"z","И"=>"i",
        "Й"=>"y","К"=>"k","Л"=>"l","М"=>"m","Н"=>"n",
        "О"=>"o","П"=>"p","Р"=>"r","С"=>"s","Т"=>"t",
        
        "У"=>"u","Ф"=>"f","Х"=>"h","Ц"=>"ts","Ч"=>"ch",
        "Ш"=>"sh","Щ"=>"sch","Ъ"=>"","Ы"=>"yi","Ь"=>"",
        "Э"=>"e","Ю"=>"yu","Я"=>"ya","а"=>"a","б"=>"b",
        "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",
        "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
        "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
        "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
        "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
        "ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya", 
        " "=> "_", "."=> "", "/"=> "_"
    );
    return strtr($str,$tr);
}

?>
</head>
<body>
<div id='container'>
	<div id='center'>
		<div class=header> <?php include_once("system/head_include2.php"); ?> </div>
			<div class=navi><p><a href="index.php" class="current">Главная</a>&nbsp &nbsp <a href="all-news.php">Все новости</a> &nbsp &nbsp <a href="discuss.php">Форум</a></p></div>
			<h2> Последние новости:</h2>
		<?php
			  			$link = mysql_connect(SQLADDR, SQLLOGIN, SQLPWD); //If you have another MySQL login & password, change it here
 						mysql_select_db(SQLDB, $link);
  						// $encoding = mysql_query("SET NAMES 'utf-8'", $link);
              mysql_set_charset("utf8");
              $freq = 0;
 						$get = mysql_query("SELECT * FROM news ORDER BY id DESC LIMIT 0,20", $link);
  						if(mysql_num_rows($get)){
  							while ($out = mysql_fetch_array($get)) {
                  $freq++;
                  switch($freq % 4){
                    default:
                      $cutted = mb_substr($out["content"], 0,150,'UTF-8');
                      echo "<div class='square'><div class=navi><p><a href=read.php?name=".translitIt($out["name"]).">".$out["name"]."</a></p></div><p>";
                      if(file_exists("images/".$out["id"].".jpg")){
                        echo "<img src='images/".$out["id"].".jpg' width=150 height=150 class='left'>";
                      }
                      echo $cutted."...</p><hr><span class='date'>Дата: ".$out["date"]."</span><a href=read.php?name=".translitIt($out["name"]).">Комментарии</a>&nbsp|<a href=read.php?name=".translitIt($out["name"]).">Читать</a></div>"; 
                    break;
                    case 0:
                      $cutted = mb_substr($out["content"], 0,280,'UTF-8');
                      echo "<div class='square2x'><h2>".$out["name"]."</h2><p>";
                      if(file_exists("images/".$out["id"].".jpg")){
                        echo "<img src='images/".$out["id"].".jpg' width=150 height=150 class='left'>";
                      }
                      echo $cutted."...</p><hr><br><span class='date'>Дата: ".$out["date"]."</span><a href=read.php?name=".translitIt($out["name"]).">Комментарии</a>&nbsp|<a href=read.php?name=".translitIt($out["name"]).">Читать</a></div>"; 
                    break;
                    }

  							}
  						}
  						mysql_close();
  		?>
	</div>
	<div id = "left">
	<?php
		if($_SESSION["logged"] == "true"){
			echo "<div class=navi><p align=center>Вы вошли с <small><b>".$_SESSION["email"]."</b></small>";
			echo "<a href = logout.php><u>Выйти</u></a></p></div>";
		}
		else {
			echo "		<div class=navi><p align=center>Авторизация</p></div>
		<a href=login.php><img src=bt1.png width=150 height=60 title=Войти></a>
		<a href=registration.php><img src=reg.png width=150 height=60 title=Регистрация></a>";
		}
	?>

<!-- FIBO Informer / --><div id="fiboInformerQuotes" height="362" width="210" path="http://www.fibo.ru/informers/quotes.html" currencies="EURUSD,GBPUSD,USDJPY,USDCHF,AUDUSD,USDCAD,EURGBP,EURCHF,EURJPY,GBPJPY,GBPCHF"><iframe width="210" height="362" src="http://www.fibo.ru/informers/quotes.html?currencies=EURUSD,GBPUSD,USDJPY,USDCHF,AUDUSD,USDCAD,EURGBP,EURCHF,EURJPY,GBPJPY,GBPCHF" frameborder="0" style="overflow: hidden;"></iframe>
          <br><a class="fibo_link ml14" href="http://www.fibo.ru/" target="_blank">www.fibo.ru</a>
        <link href="http://www.fibo.ru/informers_resources/styles/informers.css" rel="stylesheet"></div><!-- / FIBO Informer -->
        

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