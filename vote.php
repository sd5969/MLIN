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
<title>MLIN - My Life Is Nerdy | It's the Nerd Life - Vote on Stories</title>
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
		$('.nerdyVote').live("click", function() {
			$('.replaceme').slideUp();
			$('.loadDiv').slideDown();
			$.post("/getsub.php", {nerdy: true, dateTime: $(this).siblings('input[name=dateTime]').val(), page: $(this).siblings('input[name=page]').val()}, function(data) {
				$('.replaceme').html(data);
				$('.loadDiv').slideUp("normal", function() {
					$('.replaceme').slideDown("normal", function() {
						window.scrollTo(0,999999999);
					});
				});
			});
		});
		
		$('.failVote').live("click", function() {
			$('.replaceme').slideUp();
			$('.loadDiv').slideDown();
			$.post("/getsub.php", {fail: true, dateTime: $(this).siblings('input[name=dateTime]').val(), page: $(this).siblings('input[name=page]').val()}, function(data) {
				$('.replaceme').html(data);
				$('.loadDiv').slideUp("normal", function() {
					$('.replaceme').slideDown("normal", function() {
						window.scrollTo(0,999999999);
					});
				});
			});
		});
		
		$('.skipVote').live("click", function() {
			$('.replaceme').slideUp();
			$('.loadDiv').slideDown();
			$.post("/getsub.php", {skip: true, dateTime: $(this).siblings('input[name=dateTime]').val(), page: $(this).siblings('input[name=page]').val()}, function(data) {
				$('.replaceme').html(data);
				$('.loadDiv').slideUp("normal", function() {
					$('.replaceme').slideDown("normal", function() {
						window.scrollTo(0,999999999);
					});
				});
				
			});
		});
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
<td class="navigation nSelected" id="nav2">
<a href="/vote" class="navbarSelected" onmouseover="buttonChangeBack('nav2')" onmouseout="buttonChange('nav2')">
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

<!-- VOTE HERE -->
<!-- VOTE HERE -->
<!-- VOTE HERE -->
<span class="color2">
<center><h2>Vote on Submissions!</h2></center>
<?php if($cookieT === "streamline" || $cookieT === "streamline-blue") echo "<br />"; ?>
<h2>How To:</h2>
<ul style="margin-left: 10px;">
	<li>You're bored, and have nothing better to do, right?</li>
	<li>Vote on these MLIN's that were recently submitted to us, because we're too lazy to.</li>
	<li>If the story makes you laugh, or you cannot understand the terminology, vote 'Nerdy'.</li>
	<li>If you can't figure out which button does what, you don't belong. Anywhere.</li>
</ul>
<?php if($cookieT === "streamline" || $cookieT === "streamline-blue") echo "<br />"; ?>
<?php
	$dates = '';
	if(isset($_SESSION[seenStories]) && count($_SESSION[seenStories]) > 0) {
		$dates = "WHERE dateTime NOT IN(";
		for($i = 0; $i < count($_SESSION[seenStories]) - 2; $i++) {
			$dates .= "'" . $_SESSION[seenStories][$i] . "', ";
		}
		$dates .= "'" . $_SESSION[seenStories][count($_SESSION[seenStories]) - 1] . "') ";
	}
	$query = "SELECT *, DATE_FORMAT(dateTime, '%M %e, %Y, %l:%i%p') AS newdate FROM submit " . $dates . "ORDER BY RAND() LIMIT 1";
	$result = mysql_query($query);
		$count = mysql_num_rows($result);
	while($row = mysql_fetch_array($result)) {
?>
<div class="story" style="width: 90%; margin: 0 auto;">
<div class="loadDiv" style="display: none;">
<br /><center><img src='/load.php?theme=<?php echo $cookieT; ?>' /></center>
</div>
<div class="replaceme" style="position: relative;">
<span style="font-size: 10px;"><?php echo $row[type]; ?><br /></span>
<span class="storytext"><?php echo $row[story]; ?></span><br />
<span style="font-size: 10px;" class="nerdyfail"><span style="float: right;"><?php echo $row[newdate]; ?>.</span>
</span>
<?php
	if(!$_SESSION[$row[dateTime]]) {
?>
<br />
<center>
<form accept-charset="utf-8" style="display: inline;">
<input type="hidden" name="dateTime" value="<?php echo $row[dateTime]; ?>" />
<input type="hidden" name="page" value="<?php echo $page; ?>" />
<input type="button" value="Nerdy" class="nerdyVote" />
</form>
<?php
	}
	else echo "<br /><center>";
?>
<form accept-charset="utf-8" style="display: inline;">
<input type="hidden" name="page" value="<?php echo $page; ?>" />
<input type="button" value="Skip" class="skipVote"></input>
</form>
<?php
	if(!$_SESSION[$row[dateTime]]) {
?>
<form accept-charset="utf-8" style="display: inline;">
<input type="hidden" name="dateTime" value="<?php echo $row[dateTime]; ?>" />
<input type="hidden" name="page" value="<?php echo $page; ?>" />
<input type="button" value="Fail" class="failVote"></input>
</form>
</center>
</div>
<?php
	}
	else echo "</center>";
?>
</div>
<?php
	}
	if($count == 0) {
		echo "<br /><br />No more submissions to vote on, for now.";
	}
?>
<!-- STOP VOTE HERE -->
<!-- STOP VOTE HERE -->
<!-- STOP VOTE HERE -->
</div>
<?php
	include('footer.php');
?>
</div></body>
</html>
