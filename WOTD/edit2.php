<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Edit Stories</title>
</head>
<body>
<?php
$included = true;
include("../connect.php");
if($_COOKIE['WOTD'] ==='lepass') {
if($_POST['sent'] == 'yes') {
	$t = $_POST[t];
	$story = str_replace("\"","&quot;",str_replace("'","&#39;",$_POST[story]));
	$nerdy = str_replace("\"","&quot;",str_replace("'","&#39;",$_POST[nerdy]));
	$type = str_replace("\"","&quot;",str_replace("'","&#39;",$_POST[type]));
	$fail = str_replace("\"","&quot;",str_replace("'","&#39;",$_POST[fail]));
	$comments = str_replace("\"","&quot;",str_replace("'","&#39;",$_POST[comments]));
	$query = "UPDATE ". $t ." SET story='". $story ."',nerdy=". $nerdy .",type='" . $type . "',fail=" . $fail;
	$query .= " WHERE dateTime='". str_replace("_"," ",$_POST['dateTime']) . "'";
	mysql_query($query);
	echo $query;
}
else {
?>
<div style="width: 70%;">
<?php
echo "<form style='text-align: right;' action='edit2.php' method='post'>";
$result = mysql_query("SELECT * FROM " . $_GET[t] . " WHERE dateTime='" . $_GET['dateTime'] . "'");
$row = mysql_fetch_array($result);
echo "dateTime: <input type='text' value=\"". $row['dateTime'] ."\" name='dateTime' /><br />";
echo "Story: <textarea cols=50 name='story'>" . $row['story'] . "</textarea><br />";
echo "Catgory: <input type='text' value=\"". $row['type'] ."\" name='type' /><br />";
echo "nerdy: <input type='text' value=\"". $row['nerdy'] ."\" name='nerdy' /><br />";
echo "fail: <input type='text' value=\"". $row['fail'] ."\" name='fail' /><br />";
echo "<input type='hidden' value=". $_GET['dateTime'] ." name='dateTime' /><br />";
echo "<input type='hidden' value=". $_GET[t] ." name='t' />";
?>
<input type='hidden' value='yes' name='sent'>
<input type='submit' value='Go'>
</form>
</div>
<?php
}
}
else {
echo "fail";
}
?>
</body>
</html>
