<?php
	session_start();
	$included = true;
	include("connect.php");
	$nerdy = 0;
	$fail = 0;
	$dateTime = $_POST[dateTime];
	if(isset($_POST[nerdy])) $nerdy = $_POST[nerdy];
	if(isset($_POST[fail])) $fail = $_POST[fail];
	$result = mysql_query("SELECT * FROM stories WHERE dateTime='$dateTime'", $con);
	while($row = mysql_fetch_array($result)) {
		if(!$_SESSION[str_replace(" ","_",$dateTime)]) mysql_query("UPDATE stories SET nerdy=$nerdy+$row[nerdy],fail=$fail+$row[fail] WHERE dateTime='$row[dateTime]'", $con);
		echo "I did it.";
	}
	$_SESSION[str_replace(" ","_",$dateTime)] = true;
	if($_POST[comm]) {
		setCookie("WOTD2","password?",time() + 300);
	}
?>