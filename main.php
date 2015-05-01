<?php
	$cat3 = "";
	for($i = 0; $i < count($cat2); $i++) {
		$switched = "";
		switch($cat2[$i]) {
			case "01":
				$switched = "Academic";
				break;
			case "02":
				$switched = "Anime/Manga";
				break;
			case "03":
				$switched = "Computers - Hardware";
				break;
			case "04":
				$switched = "Computers - Software";
				break;
			case "05":
				$switched = "Gamers";
				break;
			case "06":
				$switched = "I Don&#39;t Know";
				break;
			case "07":
				$switched = "Interwebz";
				break;
			case "08":
				$switched = "Literary";
				break;
			case "09":
				$switched = "Music";
				break;
			case "10":
				$switched = "Other";
				break;
			case "11":
				$switched = "Robotics";
				break;
			case "12":
				$switched = "Doctor Who";
				break;
			case "13":
				$switched = "Firefly";
				break;
			case "14":
				$switched = "TV - Other";
				break;
			case "15":
				$switched = "Trekkies";
				break;
			case "16":
				$switched = "Nerd Love";
				break;
			case "17":
				$switched = "Comics";
				break;
		}
		$cat3 .= "'" . $switched . "'";
		if($i != count($cat2) - 1) $cat3 .= ", ";
	}

	switch($pop) {
	
	case "random":
		$query = "SELECT *, DATE_FORMAT(dateTime, '%M %e, %Y, %l:%i%p') AS newdate FROM stories WHERE type NOT IN($cat3) ORDER BY RAND() LIMIT 15";
		$result8 = mysql_query($query, $con);
		$count = 14;
		break;
	
	case "allTime": case "wAllTime":
		$query = "SELECT *, DATE_FORMAT(dateTime, '%M %e, %Y, %l:%i%p') AS newdate FROM stories WHERE type NOT IN($cat3) ";
		if($pop === "allTime") $query .= "ORDER BY nerdy - fail DESC ";
		if($pop === "wAllTime") $query .= "ORDER BY nerdy - fail ASC ";
		$query .= "LIMIT ";
		$query .= 15 * ($page - 1);
		$query .= ",15";
		$result8 = mysql_query($query, $con);
		$result3 = mysql_query("SELECT nerdy FROM stories WHERE type NOT IN($cat3)", $con);
		$count = mysql_num_rows($result3) - 2;
		break;
	
	case "month": case "wMonth":
		$query = "SELECT *, DATE_FORMAT(dateTime, '%M %e, %Y, %l:%i%p') AS newdate FROM stories WHERE type NOT IN($cat3) AND YEAR(dateTime)=YEAR(CURRENT_DATE()) and MONTH(dateTime)=MONTH(CURRENT_DATE()) ";
		if($pop === "month") $query .= "ORDER BY nerdy - fail DESC LIMIT ";
		if($pop === "wMonth") $query .= "ORDER BY nerdy - fail ASC LIMIT ";
		$query .= 15 * ($page - 1);
		$query .= ",15";
		$result8 = mysql_query($query, $con);
		$result3 = mysql_query("SELECT nerdy FROM stories WHERE type NOT IN($cat3) AND YEAR(`dateTime`)=YEAR(CURRENT_DATE()) and MONTH(`dateTime`)=MONTH(CURRENT_DATE())", $con);
		$count = mysql_num_rows($result3) - 1;
		break;
	
	case "yesterday": case "wYesterday":
		$query = "SELECT *, DATE_FORMAT(dateTime, '%M %e, %Y, %l:%i%p') AS newdate FROM stories WHERE type NOT IN($cat3) AND dateTime<=CURRENT_DATE() - INTERVAL '0' DAY and dateTime>=CURRENT_DATE() - INTERVAL '1' DAY ";
		if($pop === "yesterday") $query .= "ORDER BY nerdy - fail DESC LIMIT ";
		if($pop === "wYesterday") $query .= "ORDER BY nerdy - fail ASC LIMIT ";
		$query .= 15 * ($page - 1);
		$query .= ",15";
		$result8 = mysql_query($query, $con);
		$result3 = mysql_query("SELECT nerdy FROM stories WHERE type NOT IN($cat3) AND dateTime<=CURRENT_DATE() - INTERVAL '0' DAY and dateTime>=CURRENT_DATE() - INTERVAL '1' DAY", $con);
		$count = mysql_num_rows($result3) - 1;
		break;
	
	default:
		$query = "SELECT *, DATE_FORMAT(dateTime, '%M %e, %Y, %l:%i%p') AS newdate FROM stories WHERE type NOT IN($cat3) ";
		$query .= "ORDER BY dateTime DESC ";
		$query .= "LIMIT ";
		$query .= 15 * ($page - 1);
		$query .= ",15";
		$result8 = mysql_query($query, $con);
		$result3 = mysql_query("SELECT nerdy FROM stories WHERE type NOT IN($cat3)", $con);
		$count = mysql_num_rows($result3) - 1;
		break;
	}
	
	if($pop === "tomorrow") {
		echo "You probably all know by now that this isn't legitimate...";
		$result8 = mysql_query("SELECT * FROM stories WHERE story='no'");
	}
	while($row = mysql_fetch_array($result8)) {
?>
<div class="story" style=" width: 682px;">
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
<a class="nerdyfail expand" href="javascript:;"><span class='slideComments'>Expand for Comments</span>
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
<div class="expandMe" style="display: none;">
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
?>
</span>
</div>
</div>
</div>
<br /><br />
<?php
	}
?>
<!-- PAGE LINKS -->
<!-- PAGE LINKS -->
<!-- PAGE LINKS -->
<span class="color2">Page: </span>
<?php
	$count2 = (int) round($count / 15 + .5, PHP_ROUND_HALF_DOWN);
?>
<a <?php if(1 == $page) echo "class='pageSelected boxSelected'"; else echo "class='page box'"; ?> href="/home/<?php echo $pop; ?>/1/<?php echo $cat; ?>">&nbsp;1&nbsp;</a>
<?php
	if($page > 6) echo "... ";
	$startcount = $page - 6;
	if($startcount < 1) $startcount = 1;
	if($startcount == 1) echo "&nbsp;";
	for($i = $startcount; $i < $page - 1; $i++) {
?>
<a <?php if($i + 1 == $page) echo "class='pageSelected boxSelected'"; else echo "class='page box'"; ?> href="/home/<?php echo $pop . "/" . ($i + 1); ?>/<?php echo $cat; ?>">&nbsp;<?php echo $i + 1; ?>&nbsp;</a>&nbsp;
<?php
	}
	if($page != 1 && $page != $count2) {
?>
<a class='pageSelected boxSelected' href="/home/<?php echo $pop . "/" . $page; ?>/<?php echo $cat; ?>">&nbsp;<?php echo $page; ?>&nbsp;</a>&nbsp;
<?php
	}
	$endcount = $page + 5;
	if($endcount > $count2) $endcount = $count2 - 1;
	for($i = $page; $i < $endcount; $i++) {
		if($i != $count2 - 1) {
?>
<a <?php if($i + 1 == $page) echo "class='pageSelected boxSelected'"; else echo "class='page box'"; ?> href="/home/<?php echo $pop . "/" . ($i + 1); ?>/<?php echo $cat; ?>">&nbsp;<?php echo $i + 1; ?>&nbsp;</a>&nbsp;
<?php
		}
	}
	if($page + 6 < $count2) echo "...&nbsp;";
	if($count2 != 1) {
?>
<a <?php if($count2 == $page) echo "class='pageSelected boxSelected'"; else echo "class='page box'"; ?> href="/home/<?php echo $pop . "/" . $count2; ?>/<?php echo $cat; ?>">&nbsp;<?php echo $count2; ?>&nbsp;</a>&nbsp;
<?php
	}
?>
<!-- END PAGE LINKS -->
<!-- END PAGE LINKS -->
<!-- END PAGE LINKS -->
