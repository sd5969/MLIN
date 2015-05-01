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
<meta name="description" content="My Life Is Nerdy | It's the Nerd Life - Is your life nerdy?? Come tell us!" />
<meta name="keywords" content="my, life, is, nerdy, mlin, sdlynx, frenchie4111, nerd, my life is nerdy, geeky" />
<title>MLIN - My Life Is Nerdy | It's the Nerd Life - Story</title>
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
<?php
	$result8 = mysql_query("SELECT *, DATE_FORMAT(dateTime, '%M %e, %Y, %l:%i%p') AS newdate FROM stories WHERE dateTime='$_GET[id]'");
	while($row = mysql_fetch_array($result8)) {
	if(mysql_num_rows(mysql_query("SELECT * FROM subscriptions WHERE user LIKE '$_SESSION[user]' AND story = '$row[dateTime]'")) == 1) mysql_query("UPDATE subscriptions SET lastViewed=NOW() WHERE user LIKE '$_SESSION[user]' AND story = '$row[dateTime]'") or die(mysql_error());
?>
<div class="story" style="text-align: left; width: 90%; margin: 0 auto;">
<span style="font-size: 10px;" class="category"><?php echo $row[type]; ?></span><br />
<span class="storytext"><?php echo $row[story]; ?></span><br />
<span style="font-size: 10px;" class="nerdyfail">
<a class="nerdyLink nerdyfail" href="javascript:;">Nerdy?
<div class="dateDiv" style="display: none;"><?php echo $row[dateTime]; ?></div></a>
<span class="nerdyValue">
<?php echo $row[nerdy]; ?></span>. 
<a class="failLink nerdyfail" href="javascript:;">Fail?
<div class="dateDiv" style="display: none;"><?php echo $row[dateTime]; ?></div></a>
<span class="failValue">
<?php echo $row[fail]; ?></span>.
<span class="color3" style="float: right;"><?php echo $row[newdate]; ?>.</span><br />
<a class="nerdyfail expand" href="javascript:;"><span class='slideComments'>Collapse</span>
(<?php $commentcount = mysql_query("SELECT COUNT(*) count FROM comments WHERE comments.storyDate = '$row[dateTime]' ORDER BY postDate") or die(mysql_error());
while($countIt = mysql_fetch_array($commentcount)) {
	echo $countIt[count];
}
?>)
</a>
<div style="float: right;">

<?php
	if($_SESSION[loggedIn]) {
		$countsubs = mysql_query("SELECT * FROM subscriptions WHERE user LIKE '$_SESSION[user]' AND story='$row[dateTime]'") or die(mysql_error());
		if(mysql_num_rows($countsubs) == 1) {
?>
<a href="javascript:;" class="unsubscribe nerdyfail">Unsubscribe<div class="dateDiv" style="display: none;"><?php echo $row[dateTime]; ?></div></a>
<?php
		} else {
?>
<a href="javascript:;" class="subscribe nerdyfail">Subscribe<div class="dateDiv" style="display: none;"><?php echo $row[dateTime]; ?></div></a>
<?php
		}
?>
 | 
<?php
	}
?>

<a class="nerdyfail" href="/story/<?php echo str_replace(" ","+",$row[dateTime]); ?>">Permalink</a></div>
<div class="loadDiv" style="display: none;">
<br /><center><img src='/load.php?theme=<?php echo $cookieT; ?>' /></center>
</div>
<div class="expandMe" style="line-height: 1.5">
<div class="expandComments">
<br />
<table style='width: 100%; border: 0px;'>
<?php
	$result2 = mysql_query("SELECT * FROM comments WHERE comments.storyDate = '$row[dateTime]' ORDER BY postDate") or die(mysql_error());
	$i = 1;
	while($row2 = mysql_fetch_array($result2)) {
		include("showcomment.php");
	}
?>
</table>
<?php
	if($_SESSION['loggedIn']) {
?>
</div>
<br />
<form accept-charset="utf-8" class="commentForm">
<b style='vertical-align: top;'><?php echo $_SESSION['user']; ?></b><br style="line-height: 1.5;" />
<textarea rows=1 name="comments" class="comment2" style="width: 99%;">Comment</textarea>
<input type="hidden" name="dateTime" value="<?php echo $row['dateTime'] ?>" />
<input type="button" style="float: right;" value="Submit" class="formSubmit"/>
</form>
<?php
	}
	if($_SESSION['user'] === 'SDLynx') {
?>
<br /><a class="nerdyfail" href="/WOTD/edit2.php?t=stories&dateTime=<?php echo str_replace(' ', '_', $row['dateTime']); ?>">Change</a>
<?php
	}
?>
</span>
</div>
</div>
<br /><br />
<?php
	}
?>
</div>
<?php
	include('footer.php');
?>
</div></body>
</html>
