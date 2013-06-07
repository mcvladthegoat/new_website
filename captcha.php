<?php
	session_start();
	$number = $_SESSION["captcha"];
	$first = rand(200,237);
	$second = rand(50,110);
	$third = rand(20,95);
	$im = imagecreate(60, 18); // создаем картинку с заданным размером
	$bg = imagecolorallocate($im, $first, $second, $third); // закрашиваем фон
	$text_color = imagecolorallocate($im, 255, 255, 255); // задаем цвет которым будем писать
	imagestring($im,20,5,3,$number, $text_color); // пишем
	Header("Content-type: image/jpeg"); // устанавливаем тип документа
	imageJpeg($im);
?>