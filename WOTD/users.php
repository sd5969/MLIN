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
<title>Users</title>
</head>
<body>
<?php 
if($_POST['pword'] == "lepass" || $_COOKIE['WOTD'] === "lepass") {
	$result = mysql_query("SELECT * FROM users ORDER BY signupDate DESC");
	echo "<a>Users:</a>
	<table border='1' cellpadding='5px'>
	<tr><th>Username</th><th>Password</th><th>Email</th><th>Verified</th><th>IP</th><th>Sign Up Date</th><th>Number of Logins</th></tr>";
	while($row = mysql_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>". $row['user'] . "</td><td>" . $row['pass'] . "</td><td>" . $row['email'] . "</td><td>" . $row['verified'] . "</td><td>" . $row['IP'] ."</td><td>" . $row['signupDate'] ."</td><td>" . $row['numberOfLogins'] ."</td>";
		echo "</tr>";
	}
}
?>
</table>
</body>
</html>