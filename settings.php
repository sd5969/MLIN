<?php
	session_start();
	$included = true;
	include("connect.php");
	$cookieT = $_COOKIE['theme'];
	include("style.php"); //Style thing.
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link rel="shortcut icon" href="/mlin.ico" type="image/x-icon"/>
<title>MLIN - My Life Is Nerdy | It's the Nerd Life - Settings</title>
<script type="text/javascript" src="/Scripts/jquery.js"></script>
<script type="text/javascript">
<!--
	// prepare the form when the DOM is ready 
	// Enter god awful javascript, this was sooooo annoying to write.
	var emailCheck = false;
	var passCheck = false;
	var repassCheck = false;
	$(document).ready(function() {
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
			if(!passCheck || !repassCheck) {
				e.preventDefault();
				$('#submitSpan').html("Invalid Info.");
				if(!userCheck) console.log("User is invalid.");
				if(!passCheck) console.log("Password is invalid.");
				if(!repassCheck) console.log("RePassword is invalid.");
				if(!emailCheck) console.log("Email is invalid.");
			}
		});
		$('#submit2').click(function(e) {
			if(!emailCheck) {
				e.preventDefault();
				$('#submitSpan2').html("Invalid Info.");
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
<script type="text/javascript" src="/Scripts/jquery.js"></script>
<script type="text/javascript">
<!--
	$(document).ready(function() {

	});
//-->
</script>
<link rel="stylesheet" href="/<?php echo $theme; ?>" type="text/css" />
</head>
<body>
<div class="mainwrapper"><div class="main">
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
<!-- SETTINGS -->
<!-- SETTINGS -->
<!-- SETTINGS -->
<span class="color2">
<center><h2>Personal Settings</h2></center>
<?php
	$pass = md5($_POST[password]);
	if(isset($_POST[password])) {
		$result = mysql_query("SELECT * FROM users WHERE user LIKE '$_SESSION[user]' AND pass='$pass'", $con) or die(mysql_error());
			while($row = mysql_fetch_array($result)) {
				mysql_query("UPDATE users SET pass='" . md5($_POST[pass]) . "' WHERE user LIKE '$_SESSION[user]' AND pass='$pass'", $con);
				echo "Password changed.<br /><br />";
			}
		if(mysql_num_rows($result) == 0) echo "Wrong password.<br /><br />";
	}
	$pass2 = md5($_POST[password2]);
	$email = $_POST[email];
	if(isset($_POST[password2])) {
		$result = mysql_query("SELECT * FROM users WHERE user LIKE '$_SESSION[user]' AND pass='$pass2'", $con) or die(mysql_error());
			while($row = mysql_fetch_array($result)) {
				mysql_query("UPDATE users SET email='$email' WHERE user LIKE '$_SESSION[user]' AND pass='$pass2'", $con);
				echo "Email changed.<br /><br />";
			}
		if(mysql_num_rows($result) == 0) echo "Wrong password.<br /><br />";
	}
	if($_SESSION[loggedIn]) {
?>
<b>Change Password:</b><br /><br />
<form accept-charset="utf-8" action="/settings" method="post">
<table border=0>
<tr><td>Old Password:</td><td><input type="password" name="password" id="password" /></td></tr>
<tr><td>New Password:</td><td><input type="password" name="pass" id="pass" />&nbsp;<span style="color: red; font-weight: bold;" id="passSpan"></span></td></tr>
<tr><td>Re-New Password:</td><td><input type="password" name="repass" id="repass" />&nbsp;<span style="color: red; font-weight: bold;" id="repassSpan"></span></td></tr>
<tr><td></td><td><input type="submit" value="Change" id="submit" />&nbsp;<span style="color: red; font-wieght: bold;" id="submitSpan"></span></td></tr>
</table>
</form>
<br />
<b>Change E-mail:</b><br /><br />
<form accept-charset="utf-8" action="/settings" method="post">
<table border=0>
<tr><td>Password:</td><td><input type="password" name="password2" id="password2" /></td></tr>
<tr><td>New Email:</td><td><input type="text" name="email" id="email" />&nbsp;<span style="color: red; font-weight: bold;" id="emailSpan"></span></td></tr>
<tr><td></td><td><input type="submit" value="Change" id="submit2" />&nbsp;<span style="color: red; font-wieght: bold;" id="submitSpan2"></span></td></tr>
</table>
</form>
<?php
	} else echo "You're not even logged in!";
?>
</span>
<!-- END SETTINGS -->
<!-- END SETTINGS -->
<!-- END SETTINGS -->
</div>
<?php
	include('footer.php');
?>
</div></body>
</html>
