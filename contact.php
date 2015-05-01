<?php
	session_start();
	$included = true;
	include("connect.php");
	$cookieT = $_COOKIE['theme'];
	include("style.php"); //Style thing.
	$passCaptcha = false;
	if(strlen($_REQUEST[message]) > 0) {
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link rel="shortcut icon" href="/mlin.ico" type="image/x-icon"/>
<title>MLIN - My Life Is Nerdy | It's the Nerd Life - Contact Us</title>
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
<td class="navigation" id="nav1">
<a title="localhost: 127.0.0.1" href="/" class="navbar" onmouseover="buttonChange('nav1')" onmouseout="buttonChangeBack('nav1')">
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
<td class="navigation nSelected" id="nav5">
<a href="/about" class="navbarSelected" onmouseover="buttonChangeBack('nav5')" onmouseout="buttonChange('nav5')">
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
<span class="color2">
<center>
<h2>Contact Us</h2>
<?php
	if(isset($_POST['word']) && isset($_POST['title'])) {
		$_POST[message] = $_POST[word] . " - " . $_POST[title];
		$passCaptcha = true;
	}
	if(!$passCaptcha || $_POST[message] === "") {
?>
Simply put, don't.  But if you have to, email us at admin@mylifeisnerdy.co.cc.<br /><br />
<a name="suggestWOTD">Suggesting Words of the Day:</a> You can do that through the following form.<br />
Or, use this form for anything else you would like to say:<br /><br />
<?php
	if($_POST[message] === "") echo "<span style='color:red'>You entered no message!</span>";
	if($_POST[message]) echo "<span style='color:red'>You entered the captcha wrong!</span>";
?>
<form accept-charset="utf-8" method="post" action="/contact">
<table><tr>
<td>Your Email*</td>
<td><input type="text" name="from" value="<?php echo htmlspecialchars ($_POST[form], ENT_QUOTES, 'UTF-8'); ?>" /></td>
</tr><tr></tr><tr>
<td>Message**</td>
<td><textarea name="message" rows="15" cols="50"><?php echo htmlspecialchars (str_replace('\"','"',str_replace("\'","'",$_POST[message])), ENT_QUOTES, 'UTF-8'); ?></textarea></td>
</tr><tr></tr><tr>
<td>Captcha</td><td>
<?php
	require_once('recaptchalib.php');
	$publickey = "lekey2"; // you got this from the signup page
	echo recaptcha_get_html($publickey);
?>
</td>
</tr><tr></tr><tr>
<td></td>
<td><input type="submit" value="Send!" /></td>
</tr>
</table>
<span style="float: left;">*If you do not supply this, we will not be able to get back to you.</span><br /><span style="float: left;">**Must be supplied. Derp.</span><br />
</form>
<?php
	} else {
		echo "Your message has been sent!<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";
		$message = nl2br("<html><head><title>MLIN - Contact</title></head><body>" . $_POST[message] . "</div></body></html>");
		$from = "From: ". $_POST[from] . " \r\nContent-type: text/html";
		if($_POST[from] === "") $from = "From: from@from.from  \r\nContent-type: text/html";
		mail("to@to.to","MLIN - Contact",$message,$from);
	}
?>
</center>
</span>
</div>
<?php
	include('footer.php');
?>
</div></body>
</html>
