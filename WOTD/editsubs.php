<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Edit Subs</title>
</head>
<body>
<?php
$included = true;
include("../connect.php");
if($_COOKIE['WOTD'] ==='lepass') {
if($_POST['sent'] === 'yes') {
	$user = str_replace("\"","&quot;",str_replace("'","&#39;",$_POST[user]));
	$story = str_replace("\"","&quot;",str_replace("'","&#39;",$_POST[story]));
	$olduser = str_replace("\"","&quot;",str_replace("'","&#39;",$_POST[olduser]));
	$oldstory = str_replace("\"","&quot;",str_replace("'","&#39;",$_POST[oldstory]));
	$last = str_replace("\"","&quot;",str_replace("'","&#39;",$_POST[last]));
	$query = "UPDATE subscriptions SET user='$user', story='$story', lastViewed='$last' WHERE user='$olduser' AND story='$oldstory'";
	mysql_query($query);
	echo $query;
}
else {
?>
<div style="width: 70%;">
<?php
echo "<form style='text-align: right;' action='editsubs.php' method='post'>";
$result = mysql_query("SELECT * FROM subscriptions WHERE story='" . str_replace("_", " ", $_GET['story']) . "' AND user LIKE '$_GET[user]'");
$row = mysql_fetch_array($result);
echo "user: <input type='text' value=\"". $row['user'] ."\" name='user' /><br />";
echo "story (date): <input type='text' value=\"". $row['story'] ."\" name='story' /><br />";
echo "lastViewed: <input type='text' value=\"". $row['lastViewed'] ."\" name='last' /><br />";
echo "<input type='hidden' value='$row[user]' name='olduser' /><br />";
echo "<input type='hidden' value='$row[story]' name='oldstory' /><br />";
?>
<input type='hidden' value='yes' name='sent' />
<input type='submit' value='Go' />
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
