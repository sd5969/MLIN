<?php
if($_POST['pword'] == 'lepass') {
	if(!$_COOKIE['WOTD']) {
		setCookie('WOTD',$_POST['pword'],time()+1800);
	}
}
$included = true;
	include("../connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Subscribe</title>
</head>
<body>
<?php 
if($_POST['pword'] == "lepass" || $_COOKIE['WOTD'] === "lepass") {
	$result = mysql_query("SELECT * FROM subscriptions ORDER BY user DESC");
	echo "<a>Subscriptions:</a>
	<table border='1' cellpadding='5px'>
	<tr><th>Username</th><th>Story (Date)</th><th>Last Visited</th><th>Edit</th></tr>";
	while($row = mysql_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>". $row['user'] . "</td><td>" . $row['story'] . "</td><td>" . $row['lastViewed'] . "</td><td><a href='editsubs.php?story=" . str_replace(" ", "_", $row[story]) . "&user=$row[user]'>Edit</a>";
		echo "</tr>";
	}
}
?>
</table>
</body>
</html>