<?php
	header("Content-type: text/html");
	if(!$_POST[storyDate] && !$_POST[comment]) die();
	session_start();
	$included = true;
	include("connect.php");
	include("style.php");
	$storyDate = $_POST[storyDate];
	$startwith = array("the game ", "pokemon", "Pokemon", "dog ", "mlin", "Mlin", "/b/", "\"", "'", " i ");
	$replacewith = array("the game (I just lost) ", "pok&eacute;mon", "Pok&eacute;mon", "cat ", "MLIN", "MLIN", "(1 & 2)", "&#34;", "&#39;", " I ");
	$comment = str_replace($startwith, $replacewith, nl2br(htmlspecialchars ($_POST[comment], ENT_QUOTES, 'UTF-8')));
	$query = "INSERT INTO comments VALUES('$storyDate', NOW(), '$_POST[name]', '$comment', 0)";
	mysql_query($query, $con) or die(mysql_error());
	$result2 = mysql_query("SELECT * FROM comments WHERE comments.storyDate = '$storyDate' ORDER BY postDate") or die(mysql_error());
	$i = 1;
	echo "<table style='width: 100%; border: 0px;' cellpadding=0 cellspacing=0>";
	while($row2 = mysql_fetch_array($result2)) {
		include("showcomment.php");
	}
	echo "</table>";
?>
