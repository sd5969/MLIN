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
<title>MLIN - My Life Is Nerdy | It's the Nerd Life - About Us</title>
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
<!-- ABOUT US -->
<!-- ABOUT US -->
<!-- ABOUT US -->
<span class="color2">
<div class="story" style="width: 90%; margin: 0 auto;">
<center><h2>About Us</h2></center>
<h2>How did MLIN start?</h2>
MLIN started when I wanted to post something on MLIA but it was just too nerdy.  I decided that there should be a home for these nerdy MLIAs, and here it is.  So, nerds and geeks alike, rejoice, for, finally, there is a place to post these fantastic stories which nobody else would enjoy reading.  No, this is not a site where you post your stories about Harry Potter or Pokemon, unless of course it includes a nerdy aspect of the concept.  Sometimes I even feel like some MLIAs belong here, but, hey, it's not up to me, is it.  Also, <a href="http://en.wikipedia.org/wiki/The_Game_(mind_game)" class="nerdyfail" target="_blank">the game</a>.  And yes, by adding the link, I've even fulfilled the rules of the game.  I bet you're upset you've lost the game yet again, and quite possibly again.  Unless of course you use the 30 minute rule, which is really just for the squeamish.<br />
<br />
<a class="Sort" href="/ToS">Privacy & Terms of Service</a><br />
<br />
<a class="Sort" href="/faqs">FAQs</a><br />
<br />
<a class="Sort" href="/contact">Contact Us</a><br /><br />
</div>
<?php /*<h2>Credits</h2>
<table border=0>
<tr><td>sdlynx</td>			<td>I made this...</td></tr>
<tr><td>frenchie4111</td>	<td>Overall doin' stuff.  Also admins the forum.</td></tr>
<tr><td>Walker</td>			<td>Most active forum admin.</td></tr>
<tr><td>jQuery</td>			<td>For making life way easier.</td></tr>
<tr><td>000webhost.com&nbsp;&nbsp;</td>	<td>They host us.</td></tr>
<tr><td>www.co.cc</td>		<td>They domain us.</td></tr>
</table> */ ?>
</span>
<!-- END ABOUT US -->
<!-- END ABOUT US -->
<!-- END ABOUT US -->
</div>
<?php
	include('footer.php');
?>
</div></body>
</html>
