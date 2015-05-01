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
<title>MLIN - My Life Is Nerdy | It's the Nerd Life - Privacy & ToU</title>
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
<h2>Privacy & Terms of Service</h2>
The real terms of service:<br />
</center>
<br />
<div style="padding: 20px;">
Privacy:<br />
<br />
You have none.  Whatever you post here can and will be used against you.  Just kidding, we don't care about your personal information.
  In other words, whatever you write won't be used aside from for the amusement of others.  We will however keep a log of your personal
  information in our databases.  But really that just means we have a copy of your story in our databases.  Don't worry.  You'll be fine.
  Pinky promise.  Even though those are useless.<br />
  <br /><br /><br />
Terms of Service:<br />
<br />
*Sigh*... I don't want to write this.  So just refer to this (taken from MLIA):<br />
<br />
&nbsp;&nbsp;&nbsp;MyLifeIsNerdy does not produce any content. All content is produced by the site's users. Stories become the property of MyLifeIsNerdy after they are submitted, and the user relinquishes all rights to the story and any profits that it might generate for the operators of this site. All content is provided as is, and is meant to be used for entertainment purposes only. Stories on this site are for personal use only. Any other use, or commercial activities are strictly prohibited.<br /><br />
&nbsp;&nbsp;&nbsp;MyLifeIsNerdy does not provide commercial services and there are no actual or implied guarantees as to the availability of service or the speed, operation or function of this site, which is offered on a basis to those who choose to comply with the terms detailed within and access the free contents of this site. <br /><br />
&nbsp;&nbsp;&nbsp;In usage of this site, or by otherwise using this site, you (the user), hereby undertake to adhere to the terms of use detailed herein and any others appended hereto, without evasion, equivocation or reservation of any kind, in the knowledge that failure to comply with the terms will result in suspension or denial of your access to the site and potential legal and civil penalties, together with the right to make the full circumstances publicly known.<br />
</div>
</span>
<?php
	include('footer.php');
?>
</div></body>
</html>
