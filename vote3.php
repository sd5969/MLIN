<?php
	if(!$_POST[storyDate] || !$_POST[postDate] || !($_POST[positive] || $_POST[negative])) die("");
	session_start();
	$included = true;
	include("connect.php");
	$storyDate = $_POST[storyDate];
	$postDate = $_POST[postDate];
	if($_SESSION[$storyDate . "_" . $postDate]) die("DAMN");
	if($_POST[positive]) $add = 1;
	else if($_POST[negative]) $add = -1;
	else $add = 0;
	mysql_query("UPDATE comments SET vote = vote + $add WHERE storyDate LIKE '$storyDate' AND postDate LIKE '$postDate'") or die(mysql_error());
	echo "UPDATE comments SET vote = vote + $add WHERE storyDate LIKE '$storyDate' AND postDate LIKE '$postDate'";
	$_SESSION[$storyDate . "_" . $postDate] = true;
?>