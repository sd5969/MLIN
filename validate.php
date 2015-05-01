<?php
	$included = true;
	include("connect.php");
	if($_POST[user]) {
		$result = mysql_query("SELECT user FROM users WHERE user LIKE \"" . $_POST[user] . "\"", $con) or die(mysql_error());
		if(mysql_num_rows($result) == 0) echo "<span style=\"color: green\">OK.</span>";
		else echo "Taken.";
	}
	if($_POST[email]) {
		$result = mysql_query("SELECT email FROM users WHERE email LIKE \"" . $_POST[email] . "\"", $con) or die(mysql_error());
		if(mysql_num_rows($result) == 0) echo "1";
		else echo "Taken.";
	}
?>