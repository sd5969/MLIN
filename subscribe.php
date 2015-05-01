<?php
	if($_POST[subscribe] != 1 && $_POST[unsubscribe] != 1) die();
	$included = true;
	include("connect.php");
	$user = $_POST[user];
	$dateTime = $_POST[dateTime];
	if($_POST[subscribe] == 1) mysql_query("INSERT INTO subscriptions (user, story, lastViewed) VALUES ('$user', '$dateTime', NOW())");
	else if($_POST[unsubscribe] == 1) mysql_query("DELETE FROM subscriptions WHERE user LIKE '$user' and story='$dateTime'");
?>