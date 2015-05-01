<?php
	session_start();
	$included = true;
	include("connect.php");
	$cookieT = $_COOKIE['theme'];
	include("style.php"); //Style thing.
	$submitted = false;
	if(isset($_COOKIE[submitted])) {
		$submitted = $_COOKIE[submitted];
	}
	if(isset($_REQUEST[story])) {
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
	if($passCaptcha) setcookie("submitted", true, time()+300);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link rel="shortcut icon" href="/mlin.ico" type="image/x-icon"/>
<title>MLIN - My Life Is Nerdy | It's the Nerd Life - Submit a Story</title>
<script type="text/javascript" src="/Scripts/jquery.js"></script>
<script type="text/javascript">
<!--
	$(document).ready(function() {
<?php
	if($submitted || $passCaptcha) {
?>
		$("form#submission").slideUp("fast");
<?php
	}
?>
	});
//-->
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
<td class="navigation nSelected" id="nav3">
<a href="/submit" class="navbarSelected" onmouseover="buttonChangeBack('nav3')" onmouseout="buttonChange('nav3')">
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
<!-- SUBMIT -->
<!-- SUBMIT -->
<!-- SUBMIT -->
<span class="color2">
<center><h2>Submit a Story!</h2></center>
<div style="margin-left: 30px;">
<h2>What's This?</h2>
<ul>
	<li>Do us a favor and start with "Today", end with "MLIN" or "MLIN."</li>
	<li>Other useless criteria goes here.</li>
	<li>You know what to do.</li>
</ul>
<br />
<?php
	if(isset($_REQUEST[story])) {
		if(!$passCaptcha) {
			echo "Sorry, you typed the Captcha wrong, try again.";
		}
		if($passCaptcha && !$submitted) {
			$story3 = trim($_POST[story]);
			$type = str_replace("'","&#39;",$_REQUEST[type]);
			$startwith = array("the game ", "pokemon", "Pokemon", "dog ", "mlin", "Mlin", "/b/", "\"", "'", " i ");
			$replacewith = array("the game (I just lost) ", "pok&eacute;mon", "Pok&eacute;mon", "cat ", "MLIN", "MLIN", "(1 & 2)", "&#34;", "&#39;", " I ");
			$story3 = str_replace($startwith, $replacewith, nl2br(htmlspecialchars ($story3, ENT_QUOTES, 'UTF-8')));
			$sql = "INSERT INTO submit VALUES(NOW(),'$story3','0','0','$type','$_SESSION[user]', '$_SERVER[REMOTE_ADDR]')"; 
			mysql_query($sql, $con) or die(mysql_error() . $sql);  
			echo "Congratulations!  You have submitted a story.  Now go away.  In fact, you should go away, because you can no longer submit another story for the next 5 minutes. So ha!<br /><br /><br />";
		}
		if($submitted) {
			echo "Naughty, naughty, stop trying to submit. Wait 5 minutes.<br /><br /><br /><br />";
		}
	}
	else {
		if($submitted) {
			echo "Wait more.<br /><br /><br /><br /><br />";
		}
	}
?>
<form accept-charset="utf-8" action="/submit" method="post" id="submission">
Story:<br />
<textarea name="story" rows="10" cols="105"><?php echo htmlspecialchars(str_replace('\"','"',str_replace("\'","'",$_REQUEST[story])), ENT_QUOTES, 'UTF-8'); ?></textarea><br /><br />
Category:<br />
<select name="type">
<option value="Academic">Academic</option>
<option value="Anime/Manga">Anime/Manga</option>
<option value="Comics">Comics</option>
<option value="Computers - Hardware">Computers - Hardware</option>
<option value="Computers - Software">Computers - Software</option>
<option value="Gamers">Gamers</option>
<option value="I Don&#39;t Know" selected="selected">I Don't Know</option>
<option value="Interwebz">Interwebz</option>
<option value="Literary">Literary</option>
<option value="Music">Music</option>
<option value="Nerd Love">Nerd Love</option>
<option value="Other">Other</option>
<option value="Robotics">Robotics</option>
<option value="Doctor Who">Television - Doctor Who</option>
<option value="Firefly">Television - Firefly</option>
<option value="TV - Other">Television - Other</option>
<option value="Trekkies">Trekkies</option>
</select>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Submit" /><br /><br />
<?php
	require_once('recaptchalib.php');
	$publickey = "lekey"; // you got this from the signup page
	echo recaptcha_get_html($publickey);
?>
</form>
</div>
</span>
<!-- END SUBMIT -->
<!-- END SUBMIT -->
<!-- END SUBMIT -->
</div>
<?php
	include('footer.php');
?>
</div></body>
</html>
