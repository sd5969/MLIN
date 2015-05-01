<?php
	header("Content-type: text/html");
	$included = true;
	include("connect.php");
	include("style.php");
	if(!$_POST[storyDate] && !$_POST[postDate]) die();
	session_start();
	mysql_select_db("database") or mysql_select_db("database");
	$storyDate = $_POST[storyDate];
	$postDate = $_POST[postDate];
	$query = "DELETE FROM comments WHERE storyDate = '$storyDate' AND postDate = '$postDate'";
	mysql_query($query, $con) or die(mysql_error());
	$result2 = mysql_query("SELECT * FROM comments WHERE comments.storyDate = '$storyDate' ORDER BY postDate") or die(mysql_error());
	$i = 1;
	echo "<table style='width: 100%; border: 0px;' cellpadding=0 cellspacing=0>";
	while($row2 = mysql_fetch_array($result2)) {
		include("showcomment.php");
	}
	echo "</table>";
?>