<?php
	if(!$_GET[theme]) $cookieT = 'streamline-blue';
	else $cookieT = $_GET[theme];
	header("Location: http://mylifeisnerdy.co.cc/Images/load_" . $cookieT . ".gif");
?>