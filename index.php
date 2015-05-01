<?php
	session_start();
	$included = true;
	include("connect.php");
	$cookieT = $_COOKIE['theme'];
	if(isset($_POST[theme])) {
		setcookie("theme",$_POST[theme],time() + 31449600);
		$cookieT = $_POST[theme];
	}
	include("style.php"); //Style thing.
	
	if(isset($_GET[pop])) {
		$pop = $_GET[pop];
	} else {
		$pop = "recent";
	}
	if(isset($_GET[cat])) {
		$cat = $_GET[cat];
	} else {
		$cat = "";
	}
	$cat2 = explode("!", $cat);
	if(isset($_GET[page])) {
		$page = $_GET[page];
	} else{
		$page = 1;
	}
	if($page < 1) $page = 1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta name="google-site-verification" content="upnSL5xl5GCxoJWu0TvznBSLri_yN581bqYMJxGAYrc" />
<link rel="alternate" type="application/rss+xml"  href="/rss" title="MLIN - My Life is Nerdy">
<meta name="description" content="My Life Is Nerdy | It's the Nerd Life - Is your life nerdy?? Come tell us!" />
<meta name="keywords" content="my, life, is, nerdy, mlin, sdlynx, frenchie4111, nerd, my life is nerdy, geeky" />
<title>MLIN - My Life Is Nerdy | It's the Nerd Life</title>
<script type="text/javascript" src="/Scripts/jquery.js"></script>
<script type="text/javascript" src="/Scripts/konami.js"></script>
<script type="text/javascript">
<!--

	$(document).ready(function() {	

		konami = new Konami();
		konami.code = function() {
			$('#main').slideUp();
			$('#main').before('<center><h1>Also, the game.</h1></center>');
		}
		konami.load();

		$('.slideComments').toggle(function(){
			$(this).parent().siblings('.expandMe').slideDown('normal');
			$(this).html('Collapse');
		},function(){
			$(this).parent().siblings('.expandMe').slideUp('normal');
			$(this).html('Expand for Comments');
		});
		
		$('#popLink').click( function() {
			$('#category').slideUp("slow", function() {
				$('#popularity').slideDown("slow");
			});
		});
		$('#catLink').click( function() {
			$('#popularity').slideUp("slow", function() {
				$('#category').slideDown("slow");
			});
		});
		
		var thedelay = 4000;
		
		function cycleit(i) {
			$('#cyclelist li:eq(' + i + ')').fadeIn(1000).animate({opacity: "1"}, thedelay).fadeOut(1000, function() {
				if(i >= $('#cyclelist li').length - 1) cycleit(0);
				else cycleit(i + 1);
			});
		}
	
		if($('#cyclelist li').length > 1) {
			cycleit(0);
		}
		
		$('#changerClick').click( function(e) {
			e.preventDefault();
			var values = new Array();
			$.each($('#changer').serializeArray(), function(i, field) {
				if(i == 0) values[i] = field.value;
				else values[i] = field.name;
			});
			var url = "/home/" + values[0];
			url += "/1/";
			for(var i = 1; i < values.length; i++) url += "!" + values[i];
			window.location = window.location.href.substring(0, window.location.href.indexOf("?")) + url;
		});

		var $sidebar   = $("#sort"),
			$window    = $(window),
			offset     = $sidebar.offset(),
			topPadding = 15;

/*		$window.scroll(function() {
			if ($window.scrollTop() > offset.top && $window.scrollTop() < $(document).height() - 700) {
				$sidebar.stop().animate({
					marginTop: $window.scrollTop() - offset.top + topPadding
				});
			} else if($window.scrollTop() < offset.top) {
				$sidebar.stop().animate({
					marginTop: 0
				});
			}
		}); */
		
		$('#checkall').toggle(function() {
			$('.cat').attr("checked", true);
			$(this).html("Uncheck All");
		}, function() {
			$('.cat').attr("checked", false);
			$(this).html("Check All");
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
<div class="mainwrapper">
<div class="main" id="main">
<?php
	include("searcher.php");
?>
<p class="title" style="font-size: 20px;"><a href="/" class="title">MyLifeIs<span class="title2">Nerdy</span><br />
<span class="color1" style="font-size: 15px; font-family: Arial;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;It's the Nerd Life.&nbsp;</span></a><a href="http://feeds.feedburner.com/mlin" target="_blank"><img style="border: 0px;" src="/Images/feed.gif" /></a></p>
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
<!-- TEMPORARY -->
<!-- TEMPORARY -->
<!-- TEMPORARY -->
<span class="color2">
<span style="font-size: 13px;">
<ul id="cyclelist">
<li>The new Random theme is pretty cool, if I do say so myself.</li>
<li>More new update <a target="_blank" href="/contact" class="page">ideas?</a> I'll throw them onto the list.</li>
</ul>
</span>
<!-- END TEMPORARY -->
<!-- END TEMPORARY -->
<!-- END TEMPORARY -->
<!-- STORIES -->
<!-- STORIES -->
<!-- STORIES -->
<table style="width: 100%;">
<tr>
<td style="width: 700px; vertical-align: top; padding-right: 30px;">
<div style="width: 700px;">
<div id="derp">
<?php include("main.php"); ?>
</div>
<div id="loadDiv" style="display: none;">
<br /><br /><br /><center><img src='/load.php?theme=<?php echo $cookieT; ?>' /></center>
</div>
</div>
</td>
<!-- END STORIES -->
<!-- END STORIES -->
<!-- END STORIES -->
<!-- SORT BY -->
<!-- SORT BY -->
<!-- SORT BY -->
<td style="vertical-align: top;">
<div id="sort">
<span class="color2">
<h4>Popularity</h4>
<form style="display: inline;" id="changer">
<input type="radio" value="recent" name="pop" <?php if($pop === "recent") echo "checked"; ?> /> Recently Published<br />
<input type="radio" value="random" name="pop" <?php if($pop === "random") echo "checked"; ?>/> LOL So Randum<br />
<input type="radio" value="allTime" name="pop" <?php if($pop === "allTime") echo "checked"; ?>/> Top of All Time<br />
<input type="radio" value="month" name="pop" <?php if($pop === "month") echo "checked"; ?>/> Top of the Month<br />
<input type="radio" value="yesterday" name="pop"<?php if($pop === "yesterday") echo "checked"; ?> /> Top of Yesterday<br />
<input type="radio" value="wAllTime" name="pop" <?php if($pop === "wAllTime") echo "checked"; ?>/> Worst of All Time<br />
<input type="radio" value="wMonth" name="pop" <?php if($pop === "wMonth") echo "checked"; ?>/> Worst of the Month<br />
<input type="radio" value="wYesterday" name="pop" <?php if($pop === "wYesterday") echo "checked"; ?>/> Worst of Yesterday<br />
<br />
<h4>Filter Out</h4>

<a href="javascript:;" id="checkall" class="page">Check All</a><br />
<?php
	$academic = false;
	$anime = false;
	$hardware = false;
	$software = false;
	$gamers = false;
	$idk = false;
	$interwebz = false;
	$literary = false;
	$music = false;
	$other = false;
	$robotics = false;
	$who = false;
	$firefly = false;
	$tv = false;
	$trekkies = false;
	$love = false;
	$comics = false;
	
	for($i = 0; $i < count($cat2); $i++) {
		if($cat2[$i] === "01") $academic = true;
		if($cat2[$i] === "02") $anime = true;
		if($cat2[$i] === "03") $hardware = true;
		if($cat2[$i] === "04") $software = true;
		if($cat2[$i] === "05") $gamers = true;
		if($cat2[$i] === "06") $idk = true;
		if($cat2[$i] === "07") $interwebz = true;
		if($cat2[$i] === "08") $literary = true;
		if($cat2[$i] === "09") $music = true;
		if($cat2[$i] === "10") $other = true;
		if($cat2[$i] === "11") $robotics = true;
		if($cat2[$i] === "12") $who = true;
		if($cat2[$i] === "13") $firefly = true;
		if($cat2[$i] === "14") $tv = true;
		if($cat2[$i] === "15") $trekkies = true;
		if($cat2[$i] === "16") $love = true;
		if($cat2[$i] === "17") $comics = true;
	}
?>
<input class="cat" type="checkbox" name="01" <?php if($academic) echo "checked"; ?> /> Academic<br />
<input class="cat" type="checkbox" name="02" <?php if($anime) echo "checked"; ?> /> Anime/Manga<br />
<input class="cat" type="checkbox" name="03" <?php if($hardware) echo "checked"; ?> /> Computers - Hardware<br />
<input class="cat" type="checkbox" name="04" <?php if($software) echo "checked"; ?> /> Computers - Software<br />
<input class="cat" type="checkbox" name="05" <?php if($gamers) echo "checked"; ?> /> Gamers<br />
<input class="cat" type="checkbox" name="06" <?php if($idk) echo "checked"; ?> /> I Don't Know<br />
<input class="cat" type="checkbox" name="07" <?php if($interwebz) echo "checked"; ?> /> Interwebz<br />
<input class="cat" type="checkbox" name="08" <?php if($literary) echo "checked"; ?> /> Literary<br />
<input class="cat" type="checkbox" name="09" <?php if($music) echo "checked"; ?> /> Music<br />
<input class="cat" type="checkbox" name="10" <?php if($other) echo "checked"; ?> /> Other<br />
<input class="cat" type="checkbox" name="11" <?php if($robotics) echo "checked"; ?> /> Robotics<br />
<input class="cat" type="checkbox" name="12" <?php if($who) echo "checked"; ?> /> Television - Doctor Who<br />
<input class="cat" type="checkbox" name="13" <?php if($firefly) echo "checked"; ?> /> Television - Firefly<br />
<input class="cat" type="checkbox" name="14" <?php if($tv) echo "checked"; ?> /> Television - Other<br />
<input class="cat" type="checkbox" name="15" <?php if($trekkies) echo "checked"; ?> /> Trekkies<br />
<input class="cat" type="checkbox" name="16" <?php if($love) echo "checked"; ?> /> Nerd Love<br />
<input class="cat" type="checkbox" name="17" <?php if($comics) echo "checked"; ?> /> Comics<br />
<br />
<input type="button" value=" Change! " id="changerClick" />
</form>
</span>
</div>
</td>
<!-- END SORT BY -->
<!-- END SORT BY -->
<!-- END SORT BY -->
</tr>
</table>
</div>
<?php
	include('footer.php');
?>
</div></body>
</html>
