<?php
	session_start();
	$included = true;
	include("connect.php");
	$cookieT = $_COOKIE['theme'];
	include("style.php"); //Style thing.
	if($_GET[logout]) {
		setcookie("rememberMe", "", 1);
	}
	if($_POST[user] && $_POST[pass]) {
	$user = mysql_real_escape_string($_POST[user]);
	$pass = md5($_POST[pass]);
	$result = mysql_query("SELECT * FROM users WHERE user LIKE '$user' AND pass='$pass'", $con) or die(mysql_error());
		while($row = mysql_fetch_array($result)) {
			if($row['verified'] == 1) {
				$_SESSION[loggedIn] = true;
				$_SESSION[user] = $row[user];
				mysql_query("UPDATE users SET numberOfLogins = numberOfLogins + 1 WHERE user LIKE '$user' AND pass='$pass'");
				if($_POST[remember] == "true") setcookie("rememberMe", $row[user] . " " .$row[pass], time() + 604800);
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta name="description" content="My Life Is Nerdy | It's the Nerd Life - Is your life nerdy?? Come tell us!" />
<meta name="keywords" content="my, life, is, nerdy, mlin, sdlynx, frenchie4111, nerd, my life is nerdy, geeky" />
<?php
	$result = mysql_query("SELECT * FROM stories WHERE dateTime='$_GET[id]'");
?>
<title>MLIN - My Life Is Nerdy | It's the Nerd Life - Login</title>
<script type="text/javascript" src="/Scripts/jquery.js"></script>
<script type="text/javascript">
<!--
	// prepare the form when the DOM is ready 
	$(document).ready(function() {
		
	});
// -->
</script>
<script type="text/javascript">
<!-- 
	function buttonChange(name) {
		document.getElementById(name).style.backgroundColor='<?php echo $button; ?>';
	}
	function buttonChangeBack(name) {
		document.getElementById(name).style.backgroundColor='<?php echo $buttonBack; ?>';
	}
	function setSearch()
	{
		if(document.search.q.value == "") {
			document.search.q.value = "Search";
		}
	}
	function clearSearch() {
		if(document.search.q.value == "Search") {
			document.search.q.value = "";
		}
	}
// -->
</script>
<link rel="stylesheet" href="/<?php echo $theme; ?>" type="text/css" />
<link rel="shortcut icon" href="/mlin.ico" type="image/x-icon"/>
</head>
<body>
<div class="mainwrapper"><div class="main" id="main">
<?php
	include("searcher.php");
?>
<a href="/" class="title">
<p class="title" style="font-size: 20px;">MyLifeIs<span class="title2">Nerdy</span><br />
<span class="color1" style="font-size: 15px; font-family: Arial;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;It's the Nerd Life.&nbsp;</span><a href="http://feeds.feedburner.com/mlin" target="_blank"><img style="border: 0px;" src="/Images/feed.gif" /></a></p></a>
<table style="width: 100%;" cellpadding=4px>
<!-- NAVIGATION -->
<!-- NAVIGATION -->
<!-- NAVIGATION -->
<tr class="navbar">
<td class="navigation nSelected" id="nav1">
<a title="localhost: 127.0.0.1" href="/" class="navbarSelected" onmouseover="buttonChangeBack('nav1')" onmouseout="buttonChange('nav1')">
&nbsp;MyLifeIsNerdy</a>
</td>
<td class="navigation" id="nav2">
<a href="/vote" class="navbar" onmouseover="buttonChange('nav2')" onmouseout="buttonChangeBack('nav2')">
&nbsp;Vote On Submissions</a>
</td>
<td class="navigation" id="nav3">
<a href="/submit" class="navbar" onmouseover="buttonChange('nav3')" onmouseout="buttonChangeBack('nav3')">
&nbsp;Submit a Story</a>
</td>
<td class="navigation" id="nav4">
<a href="http://forums.mylifeisnerdy.co.cc/" target="_blank" class="navbar" onmouseover="buttonChange('nav4')" onmouseout="buttonChangeBack('nav4')">
&nbsp;Forums</a>
</td>
<td class="navigation" id="nav5">
<a href="/about" class="navbar" onmouseover="buttonChange('nav5')" onmouseout="buttonChangeBack('nav5')">
&nbsp;About Us</a>
</td>
</tr>
<!-- END NAVIGATION -->
<!-- END NAVIGATION -->
<!-- END NAVIGATION -->
</table>
<?php
	include("wotd2.php");
?>
<br />
<center><span class="color2"><h2>Login</h2></span>
<center>
<div style="width: 90%;" class="story">
<?php
	if($_GET[logout]) {
		unset($_SESSION['loggedIn']);
		unset($_SESSION['user']);
	}
	$user = $_POST[user];
	$pass = md5($_POST[pass]);
	$result = mysql_query("SELECT * FROM users WHERE user LIKE '$user' AND pass='$pass'", $con) or die(mysql_error());
	if($_POST[user] && $_POST[pass]) {
		while($row = mysql_fetch_array($result)) {
			if($row['verified'] == 1) {
				echo "Success! You are now logged in and free to comment.";
?>
<script type="text/javascript">
<!--
setTimeout('history.go(-1)', 2000);
//-->
</script>
<?php
			} else {
				echo "You still need to verify your email address.<br /><a class=\"page\" href=\"register.php?mail=$row[user]\">Send me the email again!</a><br />";
			}
		}
	}
	if(!$_SESSION['loggedIn'] && !$_GET[forgot] && !$_GET[user]) {
?>
<form accept-charset="utf-8" action="/login" method="post">
<?php
	if(mysql_num_rows($result) == 0 && $_POST[user] && $_POST[pass]) echo "<span style='color:red;'>Incorrect username or password</span>";
?>
<table><tr>
<td>Username:</td>
<td><input type="text" name="user"/></td>
</tr><tr></tr><tr>
<td>Password</td>
<td><input type="password" name="pass"/></td>
</tr><tr></tr><tr>
<td>Remember Me?</td>
<td><input type="checkbox" name="remember" value="true" /></td>
</tr><tr></tr><tr>
<td></td><td><input type="submit" value="Go!" />&nbsp;&nbsp;<a href="/login/forgot" class="page">Forgot password?</a></td>
</tr></table>
</form>
<?php
	}
	if($_GET[forgot] && !$_POST[email]) {
?>
<div style="text-align: left">
Forgot your password??<br /><br />
Email:<form accept-charset="utf-8" style="display: inline" action="/login/forgot" method="post"><input type="text" name="email" /><input type="submit" value="Help me!" /></form><br />
You should recieve an email with instructions shortly.
</div>
<?php
	}
	if($_POST[email]) {
		$result = mysql_query("SELECT *, CONCAT(user, pass) userpass FROM users WHERE email='$_POST[email]'") or die(mysql_error());
		while($row = mysql_fetch_array($result)) {
			$to = $_POST[email];
			$subject = "MLIN - Password reset.";
			$message = "<html><head><title>MLIN - Password reset.</title></head><body>" . $row[user] . ",<br /><br />It is unfortunate that you have lost your password.  However, it is fortunate that you can reset it <a style=\"color: FFAAAA;\" href='http://mylifeisnerdy.co.cc/login.php?user=" . md5($row[userpass]) . "&username=" . $row[user] . "'>here</a> or go to this url (http://mylifeisnerdy.co.cc/login.php?user=" . md5($row[userpass]) . "&username=" . $row[user] . ") if you cannot see the link!<br /><br />MLIN Administration</html>";
			mail($to, $subject, $message, "From: noreply@mylifeisnerdy.co.cc \r\nContent-type: text/html");
?>
An email has been sent.
<?php
		}
		if(mysql_num_rows($result) == 0) echo "Sorry, that email is not in our database.";
	}
	if($_GET[user] && $_GET[username] && (!$_POST[user2] || $_POST[pass2] !== $_POST[repass2]) || ($_POST[pass2] && strlen($_POST[pass2]) < 5)) {
?>
<div style="text-align: left;">
<?php
	if($_POST[pass2] !== $_POST[repass2]) echo "<span style='color: red'>Passwords did not match, try again.</span>";
	if($_POST[pass2] && strlen($_POST[pass2]) < 5) echo "<span style='color: red'>Password too short, try again.</span>";
?>
<form accept-charset="utf-8" action="/login" method="post">
Username: <?php echo $_GET[username]; ?><br />
New Password: <input type="password" name="pass2" /><br />
ReNew Password: <input type="password" name="repass2" /><br />
<input type="hidden" name="user2" value="<?php echo $_GET[user]; ?>" />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Change It!" /></form>
</div>

<?php
	}
	if($_POST[user2]) {
		$userpass = $_POST[user2];
		$result = mysql_query("SELECT *, CONCAT(user, pass) userpass FROM users", $con) or die(mysql_error());
		while($row = mysql_fetch_array($result)) {
			if($userpass == md5($row[userpass])) {
				$query1 = "UPDATE users SET pass='". md5($_POST[pass2]) . "' WHERE user='$row[user]'";
				mysql_query($query1, $con) or die(mysql_error());
				echo "<h3>Your password has been reset! Go ahead and log in.</h3>";
			}
		}
	}
	if($_SESSION[loggedIn] && !$_POST[user]) echo "<h3>You are already logged in!</h3>";
?>
</div>
</center>
</div>
<?php
	include('footer.php');
?>
</div></body>
</html>
