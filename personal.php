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
<meta name="google-site-verification" content="upnSL5xl5GCxoJWu0TvznBSLri_yN581bqYMJxGAYrc" />
<link rel="alternate" type="application/rss+xml"  href="/rss" title="MLIN - My Life is Nerdy">
<meta name="description" content="My Life Is Nerdy | It's the Nerd Life - Is your life nerdy?? Come tell us!" />
<meta name="keywords" content="my, life, is, nerdy, mlin, sdlynx, frenchie4111, nerd, my life is nerdy, geeky" />
<title>MLIN - My Life Is Nerdy | It's the Nerd Life - My Stories</title>
<script type="text/javascript" src="/Scripts/jquery.js"></script>
<script type="text/javascript">
<!--
	// prepare the form when the DOM is ready 
	$(document).ready(function() {		
		$('.slideComments').toggle(function(){
			$(this).parent().siblings('.expandMe').slideUp('normal');
			$(this).html('Expand for Comments');
		},function(){
			$(this).parent().siblings('.expandMe').slideDown('normal');
			$(this).html('Collapse');
		});
	});
// -->
</script>
<script type="text/javascript" src="/Scripts/story.php"></script>
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
<span class="color1" style="font-size: 15px; font-family: Arial;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;It's the Nerd Life.&nbsp;</span><a href="http://feeds.feedburner.com/mlin" target="_blank"><img style="border: 0px;" src="Images/feed.gif" /></a></p></a>
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

<!-- PERSONAL -->
<!-- PERSONAL -->
<!-- PERSONAL -->
<span class="color2">
<center><h2>Personal Stories</h2></center>
<?php
	if($_SESSION[loggedIn]) {
?>
<b>Personally Submitted Stories</b><br /><br />
<?php
		$personals = mysql_query("SELECT *, DATE_FORMAT(dateTime, '%M %e, %Y, %l:%i%p') AS newdate FROM stories WHERE stories.by = '$_SESSION[user]' ORDER BY dateTime DESC") or die(mysql_error());
		if(mysql_num_rows($personals) == 0) echo "You have yet to post any stories while logged in that have been accepted.<br />";
		else while($row2 = mysql_fetch_array($personals)) {
			echo "<a class='nerdyfail' href='/story/" . str_replace(" ","+",$row2[dateTime]) . "'>$row2[type] - $row2[newdate] (" . mysql_num_rows(mysql_query("SELECT * FROM comments WHERE storyDate = '$row2[dateTime]'")) . ")</a><br /> ";
		}
?>
<br />
<?php
		$checkit = mysql_query("SELECT *,DATE_FORMAT(dateTime, '%M %e, %Y, %l:%i%p') AS newdate  FROM subscriptions s JOIN comments c ON (s.story = c.storyDate) JOIN stories t ON (s.story = t.dateTime) WHERE s.lastViewed < c.postDate AND s.user LIKE '$_SESSION[user]'") or die(mysql_error());
		if(mysql_num_rows($checkit) > 0) {
			echo "You have new comments on subscribed posts!<br /><br />";
			$checkit2 = mysql_query("SELECT *,DATE_FORMAT(dateTime, '%M %e, %Y, %l:%i%p') AS newdate  FROM subscriptions s JOIN comments c ON (s.story = c.storyDate) JOIN stories t ON (s.story = t.dateTime) WHERE s.lastViewed < c.postDate AND s.user LIKE '$_SESSION[user]'") or die(mysql_error());
?>
<b>New Comments On</b><br /><br />
<?php
			$usedDate = '0000-00-00 00:00:00';
			while($rowcheckit = mysql_fetch_array($checkit2)) {
				if($usedDate != $rowcheckit[dateTime]) echo "<a class='nerdyfail' href='/story/" . str_replace(" ","+",$rowcheckit[dateTime]) . "'>$rowcheckit[type] - $rowcheckit[newdate] (" . mysql_num_rows(mysql_query("SELECT * FROM comments WHERE storyDate = '$rowcheckit[dateTime]'")) . ")</a><br /> ";
				$usedDate = $rowcheckit[dateTime];
			}
			echo "<br />";
		}
?>
<b>Subscribed/Favorite Stories</b><br /><br />
<?php
		$subscriptions = mysql_query("SELECT *,DATE_FORMAT(dateTime, '%M %e, %Y, %l:%i%p') AS newdate  FROM subscriptions s JOIN stories t ON (s.story = t.dateTime) WHERE user LIKE '$_SESSION[user]' ORDER BY dateTime DESC") or die(mysql_error());
		while($row = mysql_fetch_array($subscriptions)) {
			echo "<a class='nerdyfail' href='/story/" . str_replace(" ","+",$row[dateTime]) . "'>$row[type] - $row[newdate] (" . mysql_num_rows(mysql_query("SELECT * FROM comments WHERE storyDate = '$row[dateTime]'")) . ")</a><br /> ";
		}
		if(mysql_num_rows($subscriptions) == 0) echo "You have not subscribed to any stories.<br />";
	} else {
		echo "You're not logged in .";
	}
?>
<!-- END PERSONAL -->
<!-- END PERSONAL -->
<!-- END PERSONAL -->
</div>
<?php
	include('footer.php');
?>
</div></body>
</html>