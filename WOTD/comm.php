<?php
if($_POST['pword'] === 'lepass') {
	if(!isset($_COOKIE['WOTD'])) {
		setCookie('WOTD',$_POST['pword'],time()+1800);
	}
}
$included = true;
	include("../connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Read Stories</title>
</head>
<body>
<?php 
if($_POST['pword'] == "lepass" || $_COOKIE['WOTD'] === "lepass") {
		$result = mysql_query("SELECT * FROM comments ORDER BY postDate DESC");
		echo "Comments:
		<table border='1' style='width: 100%'>
		<tr><th>storyDate</th><th>postDate</th><th>name</th><th>comment</th><th>vote</th></tr>";
		while($row = mysql_fetch_array($result))
		{
			echo "<tr>";
			echo "<td><a href='/story/" . str_replace(" ", "+", $row[storyDate]) . "' target='_blank'>" . $row[storyDate] . "</a></td><td>". $row['postDate'] . "</td><td>" . $row['name'] . "</td><td>" . $row['comment'] . "</td><td>" . $row['vote'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
}
else {
	echo "FAIL";
}
?>
</body>
</html>
