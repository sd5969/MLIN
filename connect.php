<?php
	error_reporting(0);
	if(!$included) die("Oops.  The MySQL server might be down (1).");
	if($_SERVER['REMOTE_ADDR'] === "127.0.0.1") {
		$con = mysql_connect("localhost", "username", "password");
		mysql_select_db("database", $con) or die("Oops.  The MySQL server might be down (2).");
	} else {
		$con = mysql_connect("localhost", "username", "password");
		mysql_select_db("database", $con) or die("Oops.  The MySQL server might be down (3).");
	}
	mysql_query("SET NAMES 'utf8'") or die("Oops.  The MySQL server might be down (4).");
    mysql_query("SET CHARACTER SET utf8") or die("Oops.  The MySQL server might be down (5).");
	mb_internal_encoding("UTF-8") or die("Oops.  The MySQL server might be down (6).");
?>
