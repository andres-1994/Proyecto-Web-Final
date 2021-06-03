<?php 

	session_start();

	$codigo_captcha = substr(md5(time()), 0 , 8);

	$_SESSION['captcha'] = $codigo_captcha;

	$imagenCaptcha = imagecreatefrompng("fundocaptch.png");

	$fuenteCaptcha = imageloadfont("anonymous.gdf");

	$colorCaptcha = imagecolorallocate($imagenCaptcha, 0, 95, 200);

	imagestring($imagenCaptcha, $fuenteCaptcha, 15, 5, $codigo_captcha, $colorCaptcha);

	imagepng($imagenCaptcha);

	imagedestroy($imagenCaptcha);

