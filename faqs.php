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
<title>MLIN - My Life Is Nerdy | It's the Nerd Life - FAQs</title>
<script type="text/javascript" src="/Scripts/jquery.js"></script>
<script type="text/javascript">
<!--
	$(document).ready(function() {
		$('#expand').toggle( function() {
			$('.faqs').slideDown("normal");
			$('#expand').html("<a class='page' href='javascript:;'>Collapse all.</a>");
		}, function() {
			$('.faqs').slideUp("normal");
			$('#expand').html("<a class='page' href='javascript:;'>Expand all.</a>");
		});
		$('#a').toggle( function() {
			$('#a1').slideDown("normal");
		}, function() {
			$('#a1').slideUp("normal");
		});
		$('#b').toggle( function() {
			$('#b1').slideDown("normal");
		}, function() {
			$('#b1').slideUp("normal");
		});
		$('#c').toggle( function() {
			$('#c1').slideDown("normal");
		}, function() {
			$('#c1').slideUp("normal");
		});
		$('#d').toggle( function() {
			$('#d1').slideDown("normal");
		}, function() {
			$('#d1').slideUp("normal");
		});
		$('#e').toggle( function() {
			$('#e1').slideDown("normal");
		}, function() {
			$('#e1').slideUp("normal");
		});
		$('#f').toggle( function() {
			$('#f1').slideDown("normal");
		}, function() {
			$('#f1').slideUp("normal");
		});
		$('#g').toggle( function() {
			$('#g1').slideDown("normal");
		}, function() {
			$('#g1').slideUp("normal");
		});
		$('#h').toggle( function() {
			$('#h1').slideDown("normal");
		}, function() {
			$('#h1').slideUp("normal");
		});
		$('#i').toggle( function() {
			$('#i1').slideDown("normal");
		}, function() {
			$('#i1').slideUp("normal");
		});
		$('#j').toggle( function() {
			$('#j1').slideDown("normal");
		}, function() {
			$('#j1').slideUp("normal");
		});
		$('#k').toggle( function() {
			$('#k1').slideDown("normal");
		}, function() {
			$('#k1').slideUp("normal");
		});

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
<style type="text/css">
<!--
	div.faqs {display: none;}
-->
</style>
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
<center><h2>FAQs</h2></center>
<div id="expand" class="expand"><a class="page" href="javascript:;">Expand all.</a></div>
<a class="page" href="javascript:;" id="a"><h2>What does FAQ mean??</h2></a>
<div class="faqs" id="a1"><a class="page" target="_blank" href='http://lmgtfy.com/?q=frequently+asked+question'>This Is What an FAQ is.</a></div>
<a class="page" href="javascript:;" id="b"><h2>Why can't I comment?</h2></a>
<div class="faqs" id="b1">Just register, and sign in.  Please note: <b>You do not have to register to be an active user on this site.</b></div>
<a class="page" href="javascript:;" id="j"><h2>How can I help?</h2></a>
<div class="faqs" id="j1">Tell your friends about us.  Print <a class="page" target="_blank" href="/mlin.pdf">this</a> or <a class="page" target="_blank" href="/mlin2.pdf">this</a> and post it somewhere people will see.  Cut on the straight lines at the bottom.</div>
<a class="page" href="javascript:;" id="c"><h2>Why does the website look dumb?</h2></a>
<div class="faqs" id="c1">Well <br/>
A) Because you're on a crappy browser (Internet Explorer) OR<br/>
B) You have poor taste OR<br/>
C) You're dumb.</div>
<a class="page" href="javascript:;" id="k"><h2>How do I utilize the RSS Feed?</h2></a>
<div class="faqs" id="k1">1) Click on the little orange box near the title, and you can see the feed.<br />
2) Click on the "RSS Feed" link at the bottom of the page, and copy its URL into your favorite feed reading application.</div>
<a class="page" href="javascript:;" id="e"><h2>Help! How do I make a forum signature??</h2></a>
<div class="faqs" id="e1">You can either: use Photoshop/The GIMP to make one on your own; or use <a href="/Tests/makemeasig.php" class="page">this awesome script</a> I developed to do it for you.</div>
<a class="page" href="javascript:;" id="f"><h2>Why don't you have any more FAQs?</h2></a>
<div class="faqs" id="f1">Why don't you ask some more questions? (Touch&eacute;).</div>
<a class="page" href="javascript:;" id="g"><h2>How do I get to my Subscribed stories?!</h2></a>
<div class="faqs" id="g1">Click on your name on the top right.  Ooooh, look, a new page.  And you found it all on your own.</div>
<a class="page" href="javascript:;" id="h"><h2>Where can I find your Terms of Use?</h2></a>
<div class="faqs" id="h1"><a class="Sort" href="/tou">Here.</a></div>
<a class="page" href="javascript:;" id="i"><h2>How can we ask you a question?</h2></a>
<div class="faqs" id="i1">We have considerately set up this e-mail account for all of your spam... err e-mails.<br />
Email us @ derp@mylifeisnerdy.co.cc.</div>
</span>
</div>
<?php
	include('footer.php');
?>
</div></body>
</html>
