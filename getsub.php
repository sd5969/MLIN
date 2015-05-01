<?php
	header("Content-type: text/html");
	if(!($_POST[nerdy] && $_POST[fail] && $_POST[skip]) && !$_POST[dateTime] && !$_POST[page]) die();
	session_start();
	$included = true;
	include("connect.php");
	if($_POST[skip]) {
		if(!isset($_SESSION[seenStories])) $_SESSION[seenStories] = array($_POST[dateTime]);
		else $_SESSION[seenStories][] = $_POST[dateTime];
	}
	if($_POST[nerdy] && !$_SESSION[$_POST[dateTime]]) {
		mysql_query("UPDATE submit SET nerdy = nerdy + 1 WHERE dateTime = '$_POST[dateTime]'") or die(mysql_error());
		$result = mysql_query("SELECT * FROM submit WHERE dateTime = '$_POST[dateTime]'") or die(mysql_error());
		while($row = mysql_fetch_array($result)) {
			if($row[nerdy] >= 12 && $row[nerdy] / ($row[fail] == 0 ? 1 : $row[fail]) > .5) {
				mysql_query("INSERT INTO stories VALUES(NOW(),'$row[story]',$row[nerdy],$row[fail],'$row[type]','$row[by]', '$row[IP]')") or die(mysql_error());
				mysql_query("DELETE FROM submit WHERE dateTime = '$_POST[dateTime]'") or die(mysql_error());
			}
		}
		$_SESSION[$_POST[dateTime]] = true;
	} else if($_POST[fail] && !$_SESSION[$_POST[dateTime]]) {
		mysql_query("UPDATE submit SET fail = fail + 1 WHERE dateTime = '$_POST[dateTime]'") or die(mysql_error());
		$result = mysql_query("SELECT * FROM submit WHERE dateTime = '$_POST[dateTime]'") or die(mysql_error());
		while($row = mysql_fetch_array($result)) {
			if($row[fail] >= 12) {
				mysql_query("DELETE FROM submit WHERE dateTime = '$_POST[dateTime]'") or die(mysql_error());
			}
		}
		$_SESSION[$_POST[dateTime]] = true;
	}
	$result2 = mysql_query("SELECT * FROM submit");
	$count  = mysql_num_rows($result2);
	$dates = "";
	if(isset($_SESSION[seenStories]) && count($_SESSION[seenStories]) > 0) {
		$dates = "WHERE dateTime NOT IN(";
		for($i = 0; $i < count($_SESSION[seenStories]) - 2; $i++) {
			$dates .= "'" . $_SESSION[seenStories][$i] . "', ";
		}
		$dates .= "'" . $_SESSION[seenStories][count($_SESSION[seenStories]) - 1] . "') ";
	}
	$result3 = mysql_query("SELECT *, DATE_FORMAT(dateTime, '%M %e, %Y, %l:%i%p') AS newdate FROM submit " . $dates . "ORDER BY RAND() LIMIT 1");
	while($row = mysql_fetch_array($result3)) {
?>
<span style="font-size: 10px;"><?php echo $row[type]; ?><br /></span>
<span class="storytext"><?php echo $row[story]; ?></span><br />
<span style="font-size: 10px;" class="nerdyfail"><span style="float: right;"><?php echo $row[newdate]; ?>.</span>
</span>
<?php
//	echo $echothis;
	if(!$_SESSION[$row[dateTime]]) {
?>
<br />
<center>
<form accept-charset="utf-8" style="display: inline;">
<input type="hidden" name="dateTime" value="<?php echo $row[dateTime]; ?>" />
<input type="hidden" name="page" value="<?php echo $_POST[page] + 1; ?>" />
<input type="button" value="Nerdy" class="nerdyVote" />
</form>
</td>
<td>
<?php
	}
	else echo "<br /><center>";
?>
<form accept-charset="utf-8" style="display: inline;">
<input type="hidden" name="page" value="<?php echo $_POST[page] + 1; ?>" />
<input type="button" value="Skip" class="skipVote"></input>
</form>
<?php
	if(!$_SESSION[$row[dateTime]]) {
?>
<form accept-charset="utf-8" style="display: inline;">
<input type="hidden" name="dateTime" value="<?php echo $row[dateTime]; ?>" />
<input type="hidden" name="page" value="<?php echo $_POST[page] + 1; ?>" />
<input type="button" value="Fail" class="failVote"></input>
</form>
</center>
<?php
	}
	else echo "</center>";
	}
	if(mysql_num_rows($result3) == 0) echo "<br /><br />You've now voted on all stories available. Go away.";
?>
