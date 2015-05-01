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
<title>Add Word Of The Day</title>
</head>
<body>
<?php 
if($_POST['pword'] === "lepass" || $_COOKIE[WOTD] === "lepass") {
	if($_POST['word'] == "")
	{
		$result = mysql_query("SELECT * FROM words ORDER BY wordnum DESC");
		echo "<a>The Words:</a>
		<table border='1'>
		<tr><th>Number</th><th>Use Date</th><th>Word</th><th>Alt Text</th><th>Edit Link</th></tr>";
		while($row = mysql_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>". $row['wordnum'] . "</td><td>" . $row['useDate'] . "</td><td>" . $row['word'] . "</td><td>" . $row['altText'] ."</td><td><a href='edit.php?wordnum=". $row['wordnum'] ."'>Edit</a></td>";
			echo "</tr>";
		}
	}
	else {
		echo "Word Should Be Added <br/>";
		$result2 = mysql_query("SELECT DATE_ADD(useDate,INTERVAL 1 DAY) this FROM words ORDER BY useDate DESC LIMIT 0,1") or die(mysql_error());
		while($row2 = mysql_fetch_array($result2)) {
			$oldDay = $row2[this];
		}
		$query = "INSERT INTO words (wordnum,word, altText,useDate) VALUES (NULL ,  '". str_replace("\"","&quot;",str_replace("'","&#39;",$_POST['word'])) . "','". str_replace("\"","&quot;",str_replace("'","&#39;",$_POST['altText'])) . "', '" . $oldDay . "')";
		mysql_query($query) or die(mysql_error());

		$result = mysql_query("SELECT * FROM words ORDER BY wordnum DESC");
		echo "<a>The Words:</a>
		<table border='1'>
		<tr><th>Number</th><th>Use Date</th><th>Word</th><th>Alt Text</th><th>Edit Link</th></tr>";
		while($row = mysql_fetch_array($result))
		  {
			echo "<tr>";
			echo "<td>". $row['wordnum'] . "</td><td>" . $row[useDate] . "</td><td>" . $row['word'] . "</td><td>"  . $row['altText'] ."</td><td><a href='edit.php?wordnum=". $row['wordnum'] ."'>Edit</a></td>";
			echo "</tr>";
		  }
		echo "</table>";
	}
}
else {
	echo "FAIL";
}
?>
</body>
</html>