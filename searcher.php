<?php
	if(!$included) die();
?>
<div id="searchit">
<?php
	$checkit = mysql_query("SELECT COUNT(*) dacount FROM subscriptions s JOIN comments c ON (s.story = c.storyDate) WHERE s.lastViewed < c.postDate AND s.user LIKE '$_SESSION[user]'") or die(mysql_error());
	while($rowcheckit = mysql_fetch_array($checkit)) {
		if($rowcheckit[dacount] > 0) {
?>
<div id='notify'><a onmouseover="buttonChange('notify')" onmouseout="buttonChangeBack('notify')" class='navbar' href='/personal'>You have <?php echo $rowcheckit[dacount]; ?> new comment(s) on subscribed posts!</a></div>
<?php }
		else echo "<div id='notify' style='visibility: hidden; background-color: white'></div>";
	}
?>
<span class="color2">
<?php
	if($_COOKIE[rememberMe]) {
		$explosm = explode(" ",$_COOKIE[rememberMe]);
		$result = mysql_query("SELECT * FROM users WHERE user LIKE '$explosm[0]' AND pass='$explosm[1]'") or die(mysql_error());
		if(mysql_num_rows($result) == 1) {
			$_SESSION[loggedIn] = true;
			$_SESSION[user] = $explosm[0];
		}
	}
	if(!$_SESSION['loggedIn']) {
?>
<script type="text/javascript">
<!--
	$(document).ready(function() {
		$('#login').toggle(function() {
			$('#logindiv').fadeIn();
		}, function() {
			$('#logindiv').fadeOut();
		});
	});
//-->
</script>
<a class="page" href="javascript:;" id="login">Login</a> | <a class="page" href="/register">Register</a>
<div class="story" id="logindiv" style="display: none; margin: 10px 10px 10px 0px; position: absolute; z-index: 1000; width: 310px; border: 1px solid white; margin-left: 80px; margin-top: -1px;">
<form accept-charset="utf-8" action="/login" method="post">
<table><tr>
<td>Username:</td>
<td><input type="text" name="user"/></td>
</tr><tr></tr><tr>
<td>Password</td>
<td><input type="password" name="pass"/></td>
</tr><tr></tr><tr>
<td>Remember Me?</td>
<td style="text-align: left;">&nbsp;&nbsp;&nbsp;<input type="checkbox" name="remember" value="true"/></td>
</tr><tr></tr><tr>
<td></td><td><input type="submit" value="Go!" />&nbsp;&nbsp;<a href="/login/forgot" class="page">Forgot password?</a></td>
</tr></table>
</form>
</div>
<?php
	} else {
		echo "<a class='page' href='/personal'>" . $_SESSION['user'] . "</a> | <a class='page' href='/settings'>Settings</a>";
?>
 | <a class="page" href="/logout">Logout</a>
<?php
	}
?>
</span><br />
<form accept-charset="utf-8" style="display: inline; position: relative; top: 6px;" action="/" method="post"><select onchange="this.form.submit()" name="theme">
<option selected="selected">Change Theme</option>
<option value="random">Random</option>
<option value="who">Doctor Who</option>
<option value="streamline-blue">Streamline Blue</option>
<option value="streamline">Streamline</option>
<option value="sky">Sky</option>
<option value="meteor">Meteor</option>
<option value="yotsuba">Yotsuba</option>
<option value="ubuntu">Ubuntu</option>
<option value="rose">Rose</option>
<option value="mint">Mint</option>
<option value="bluenblack">Blue 'n' Black</option>
<option value="greennblack">Green 'n' Black</option>
<option value="bluengray">Blue 'n' Gray</option>
<!-- <option value="none">None</option> -->
</select></form><br style="line-height: 3" />
<form accept-charset="utf-8" action="/search" name="search" method="get"><input type="text" value="Search" name="q" cols="20" onfocus="clearSearch()" onBlur="setSearch()"></input></form></div>
