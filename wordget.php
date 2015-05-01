<?php
	if(!$_POST[word] && !$_POST[get]) die();
	$included = true;
	include("connect.php");
	if(!$_COOKIE[getIt]) {
		mysql_query("UPDATE words SET get = 1 + get WHERE word LIKE '" . $_POST[word] . "'");
		setCookie("getIt", true, mktime(24, 0, 0));
	}
?>