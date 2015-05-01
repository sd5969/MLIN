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
<script type='text/javascript'>
function setCookie(c_name,value,expiredays)
{
var exdate=new Date();
exdate.setDate(exdate.getDate()+expiredays);
document.cookie=c_name+ "=" +escape(value)+((expiredays==null) ? "" : "; expires="+exdate.toGMTString());
}
</script>
<title>Read Stories</title>
</head>
<body>
<?php 
if($_POST['pword'] == "lepass" || $_COOKIE['WOTD'] === "lepass") {
		isset($_GET[page]) ? $page = $_GET[page] : $page = 1;
		$result = mysql_query("SELECT *, (SELECT COUNT(*) FROM submit s2 WHERE s2.dateTime <= s.dateTime) AS count FROM submit s ORDER BY dateTime DESC");
		if($page == 1) {
		echo "The Submissions:
		<table border='1'>
		<tr><th>Number</th><th>Date</th><th>By</th><th>IP</th><th>Nerdy</th><th>Fail</th><th>Category</th><th>Story</th><th>Edit Link</th></tr>";
		while($row = mysql_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>" . $row[count] . "</td><td>" . $row[dateTime] . "</td><td>" . $row['by'] . "</td><td>" . $row['IP'] . "</td><td>" . $row['nerdy'] . "</td><td>" . $row['fail'] . "</td><td>" . $row[type] . "</td><td>" . $row['story'] . "</td><td><a href='edit2.php?t=submit&dateTime=". str_replace(" ","_",$row['dateTime']) ."'>Edit</a></td>";
			echo "</tr>";
		}
		echo "</table>";
		}
		$result = mysql_query("SELECT * FROM stories ORDER BY dateTime DESC LIMIT " . 100 * ($page - 1) . "," . 100 * $page);
		echo "The Stories:
		<table border='1'>
		<tr><th>Date</th><th>By</th><th>IP</th><th>Nerdy</th><th>Fail</th><th>Category</th><th>Story</th><th>Edit Link</th></tr>";
		while($row = mysql_fetch_array($result))
		{
			echo "<tr>";
			echo "<td><a href='/story/" . str_replace(" ", "+", $row[dateTime]) . "' target='_blank'>" . $row[dateTime] . "</a></td><td>" . $row['by'] . "</td><td>" . $row['IP'] . "</td><td>" . $row['nerdy'] . "</td><td>" . $row['fail'] . "</td><td>" . $row[type] . "</td><td>" . $row['story'] . "</td><td><a href='edit2.php?t=stories&dateTime=". str_replace(" ","_",$row['dateTime']) ."'>Edit</a></td>";
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
