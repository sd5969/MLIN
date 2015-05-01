<?php
	if($_POST['pword'] === "lepassword") setCookie('WOTD2',$_POST['pword'],time()+1800);
?>
<html>
<head>
<title>Hooray</title>
</head>
<body>
<form accept-charset="utf-8" action="pword.php" method="post">
<input type="password" name="pword" />
<input type="submit" value="Submit" />
</form>
<?php
	if($_POST['pword'] === "lepassword") echo "You Win!";
?>
</body>
</html>