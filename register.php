<?php
	session_start();
	$included = true;
	include("connect.php");
	$cookieT = $_COOKIE['theme'];
	if(isset($_POST['sent'])) {
		$passCaptcha = true;
		require_once('recaptchalib.php');
		$privatekey = "lekey";
		$resp = recaptcha_check_answer ($privatekey,
										$_SERVER["REMOTE_ADDR"],
										$_POST["recaptcha_challenge_field"],
										$_POST["recaptcha_response_field"]);

		if (!$resp->is_valid) {
			$passCaptcha = false;
		}
	}
	include("style.php"); //Style thing.
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta name="description" content="My Life Is Nerdy | It's the Nerd Life - Is your life nerdy? Come tell us!" />
<meta name="keywords" content="my, life, is, nerdy, mlin, sdlynx, frenchie4111, nerd, my life is nerdy, geeky" />
<title>MLIN - My Life Is Nerdy | It's the Nerd Life - Register</title>
<script type="text/javascript" src="/Scripts/jquery.js"></script>
<script type="text/javascript">
<!--
	// prepare the form when the DOM is ready 
	var emailCheck = false;
	var userCheck = false;
	var passCheck = false;
	var repassCheck = false;	
	$(document).ready(function() {
		$('#user').change(function() {
			$.post("validate.php", {user: $('#user').val()}, function(data) {

				var set = data;
				if($('#user').val().length < 5) {
					set = "Too short.";
					userCheck = false;
				} else if($('#user').val().length > 20) {
					set = "Too long.";
					userCheck = false;
				} else if($('#user').val().indexOf(" ") != -1 || $('#user').val().indexOf("?") != -1 || $('#user').val().indexOf("|") != -1 || 
$('#user').val().indexOf("\"") != -1 || $('#user').val().indexOf("'") != -1 || $('#user').val().indexOf("<") != -1 || $('#user').val().indexOf(">") != -1 || 
$('#user').val().indexOf(";") != -1 || $('#user').val().indexOf("	") != -1) { set = "Invalid.";
					userCheck = false;
				} else if(set == data) {
					userCheck = true;
				}
				$('#userSpan').html(set);
			});
		});
		$('#pass').change(function() {
			if($('#pass').val().length < 5) {
				$('#passSpan').html("Too short.");
				passCheck = false;
			} else {
				$('#passSpan').html("<span style=\"color: green\">OK.</span>");
				passCheck = true;
			}
			if($('#repass').val() != $('#pass').val()) {
				$('#repassSpan').html("No match.");
				repasscheck = false;
			} else {
				$('#repassSpan').html("<span style=\"color: green\">OK.</span>");
				repassCheck = true;
			}
		});
		$('#repass').change(function() {
			if($('#repass').val() != $('#pass').val()) {
				$('#repassSpan').html("No match.");
				repassCheck = false;
			} else {
				$('#repassSpan').html("<span style=\"color: green\">OK.</span>");
				repassCheck = true;
			}
		});
		$('#email').change(function() {
			$.post("validate.php", {email: $('#email').val()}, function(data) {
				var set2 = data;
				if($('#email').val().indexOf(" ") != -1 || $('#email').val().indexOf("?") != -1 || $('#email').val().indexOf("|") != -1 || 
$('#email').val().indexOf("\"") != -1 || $('#email').val().indexOf("'") != -1 || $('#email').val().indexOf("<") != -1 || $('#email').val().indexOf(">") != -1 || 
$('#email').val().indexOf(";") != -1 || $('#email').val().indexOf("	") != -1 || $('#email').val().indexOf("@") < 1 || $('#email').val().indexOf(".") <= 0 || 
$('#email').val().indexOf(",") != -1) { set2 = "Invalid.";
					emailCheck = false;
					$('#emailSpan').html(set2);
				} else if($('#email').val().toLowerCase().indexOf("trash2009.com") != -1 || $('#email').val().toLowerCase().indexOf("spam.la") != -1 ||
$('#email').val().toLowerCase().indexOf("mailinator.com") != -1 || $('#email').val().toLowerCase().indexOf("guerrillamail.com") != -1 || $('#email').val().toLowerCase().indexOf("temporaryemail.net") != -1 ||
$('#email').val().toLowerCase().indexOf("meltmail.com") != -1 || $('#email').val().toLowerCase().indexOf("uggsrock.com") != -1 || $('#email').val().toLowerCase().indexOf("tempemail.net") != -1 ||
$('#email').val().toLowerCase().indexOf("mailexpire.com") != -1 || $('#email').val().toLowerCase().indexOf("filzmail.com") != -1 || $('#email').val().toLowerCase().indexOf("disposableinbox.com") != -1 || $('#email').val().toLowerCase().indexOf("mail.cz.cc") != -1 || $('#email').val().toLowerCase().indexOf("bobmail.info") != -1) { set2 = "Domain is b&.";
					emailCheck = false;
					$('#emailSpan').html(set2);
				} else if(set2.substr(0,1) == "1") {
					emailCheck = true;
					$('#emailSpan').html("<span style=\"color: green\">OK.</span>");
				} else {
					$('#emailSpan').html(set2);
				}
			});
		});
		$('#submit').click(function(e) {
			if(!userCheck || !passCheck || !repassCheck || !emailCheck) {
				e.preventDefault();
				$('#submitSpan').html("Invalid Info.");
				if(!userCheck) console.log("User is invalid.");
				if(!passCheck) console.log("Password is invalid.");
				if(!repassCheck) console.log("RePassword is invalid.");
				if(!emailCheck) console.log("Email is invalid.");
			}
		});
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
<br />
<?php
	include("wotd2.php");
?>
<br />
<center><span class="color2"><h2>Register</h2></span>
<div style="width: 90%;" class="story">
<?php
	if(!$passCaptcha && !$_GET[user] && !$_GET[mail]) {
		if($_POST[sent]) {
			echo "<span style=\"color: red; font-weight: bold;\">You entered the captcha wrong.</span><br />";
		}
?>
<br />Why register? So you can comment, of course.  Also, to tell us how many people use our site.<br /><br />
<form accept-charset="utf-8" style="display: inline;" action="/register" method="post" id="register" name="register">
<table><tr>
<td>Username:</td>
<td><input type="text" name="user" id="user" value="<?php echo $_POST[user]; ?>" >&nbsp;<span style="color: red; font-weight: bold;" id="userSpan"></span></td>
</tr><tr></tr><tr>
<td>Password:</td>
<td><input type="password" name="pass" id="pass" value="<?php echo $_POST[pass]; ?>" />&nbsp;<span style="color: red; font-weight: bold;" id="passSpan"></span></td>
</tr><tr></tr><tr>
<td>RePassword:</td>
<td><input type="password" name="repass" id="repass" value="<?php echo $_POST[repass]; ?>" />&nbsp;<span style="color: red; font-weight: bold;" id="repassSpan"></span></td>
</tr><tr></tr><tr>
<td>Email:</td>
<td><input type="text" name="email" id="email" value="<?php echo $_POST[email]; ?>" />&nbsp;<span style="color: red; font-weight: bold;" id="emailSpan"></span></td>
</tr><tr></tr><tr>
<td></td><td>
<?php
	require_once('recaptchalib.php');
	$publickey = "lekey"; // you got this from the signup page
	echo recaptcha_get_html($publickey);
?>
</td>
</tr><tr>
<td></td>
<td><input type="hidden" value="true" name="sent" /><input value="Sign Up!" type="submit" id="submit" />&nbsp;<span style="color: red; font-wieght: bold;" id="submitSpan"></span></td>
</tr>
</table>
<br />
Notes:<br />
Pick a different email address if you were going to use Yahoo! to avoid problems.<br />
Registration isn't really required to be an active user in this web site.<br />
If you use a fake email account, your account will be terminated, unless I don't notice.<br />
</form>
<?php
	} else if(passCaptcha && !$_GET[user] && !$_GET[mail]) {
	mysql_query("INSERT INTO users (user, pass, email, verified, IP, signupDate, numberOfLogins) VALUES('" . $_POST[user]. "', '" . md5($_POST[pass]) . "', '" . $_POST[email] . "', 0, '" . $_SERVER['REMOTE_ADDR'] . "', NOW(), 0)", $con) or die(mysql_error());
	$to = $_POST[email];
	$subject = "MLIN - Verify your email.";
	$message = "<html><head><title>MLIN - Verify your email.</title></head><body>" . $_POST[user] . ",<br /><br />Thank you for signing up!  Now just click <a href='http://mylifeisnerdy.co.cc/register.php?user=" . md5($_POST[user]) . "'>here</a> or go to this url (http://mylifeisnerdy.co.cc/register.php?user=" . md5($_POST[user])  . ") if you cannot see the link!<br /><br />MLIN Administration</div></body></html>";
	mail($to, $subject, $message, "From: from@from.fom \r\nContent-type: text/html");
?>
<h3>You have been signed up!</h3>
Shortly, you shall receive a verification email.  Please, verify your email address and then party on.
<?php
	} else if($_SESSION[loggedIn]) {
	echo "<h3>YOU SIR, are logged in.</h3>";
	} else if($_GET[user]) {
		$user = mysql_real_escape_string($_GET[user]);
		$result = mysql_query("SELECT user FROM users", $con) or die(mysql_error());
		while($row = mysql_fetch_array($result)) {
			if($user == md5($row[user])) {
				mysql_query("UPDATE users SET verified=1 WHERE user='$row[user]'", $con) or die(mysql_error());
				echo "<h3>Your account has been verified! Go ahead and log in.</h3>";
			}
		}
	} else {
		$mailTo = mysql_real_escape_string($_GET[mail]);
		$result = mysql_query("SELECT * FROM users WHERE user='$mailTo'", $con) or die(mysql_error());
		while($row = mysql_fetch_array($result)) {
			$to = $row[email];
			$subject = "MLIN - Verify your email.";
			$message = "<html><head><title>MLIN - Verify your email.</title></head><body>" . $row[user] . ",<br /><br />Thank you for signing up!  Now just click <a href='http://mylifeisnerdy.co.cc/register.php?user=" . md5($row[user]) . "'>here</a> or go to this url (http://mylifeisnerdy.co.cc/register.php?user=" . md5($row[user])  . ") if you cannot see the link!<br /><br />MLIN Administration</div></body></html>";
			mail($to, $subject, $message, "From: from@from.from \r\nContent-type: text/html");
			echo "<h3>Verification email resent.</h3>";
		}
	}
?>
</div>
</center>
</div>
<?php
	include('footer.php');
?>
</div></body>
</html>
