<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Add Word Of The Day</title>
</head>
<body>
<?php
$included = true;
	include("../connect.php");
if($_COOKIE['WOTD']=='lepass') {
if($_POST['sent'] == 'yes') {

$wordnum = str_replace("\"","&quot;",str_replace("'","&#39;",$_POST[wordnum]));
$word = str_replace("\"","&quot;",str_replace("'","&#39;",$_POST[word]));
$alt = str_replace("\"","&quot;",str_replace("'","&#39;",$_POST[altText]));

echo "$wordnum | $word | $alt";

mysql_query("UPDATE words SET word='". $word ."' WHERE wordnum=". $wordnum);
mysql_query("UPDATE words SET altText='". $alt ."' WHERE wordnum=". $wordnum);
mysql_query("UPDATE words SET useDate='". $_POST['useDate'] ."' WHERE wordnum=". $wordnum);
}
else {
?>
<?php
echo "<form action='edit.php' method='post'>";
$result = mysql_query("SELECT * FROM words WHERE wordnum=" . $_GET['wordnum']);
$row = mysql_fetch_array($result);
echo "Word: <input type='text' value='". $row['word'] ."' name='word'>";
echo "Date: <input type='text' value='". $row['useDate'] ."' name='useDate'>";
echo "Alt Text: <input type='text' value='". $row['altText'] ."' name='altText'>";
echo "<input type='hidden' value=". $_GET['wordnum'] ." name='wordnum'>";
?>
<input type='hidden' value='yes' name='sent'>
<input type='submit' value='Go'>
</form>
<?php
}
}
else {
echo "fail";
}
?>
</body>
</html>

<!-- 
Variables-
GET: wordnum
-->