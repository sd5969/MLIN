<?php
	if(!$included) die();
	$countz = mysql_num_rows(mysql_query("SELECT user FROM users"));
?>
<center><span style="font-size: 10px;" class="footer">
<?php if($cookieT === "streamline" || $cookieT === "streamline-blue" || $cookieT === "who" || $cookieT === "random") echo "<br /><hr />"; ?>
We have <?php echo $countz; ?> registered users!  <a href="/register" class="foot">Sign up.</a><br />MLIN &copy; 2011 | <a class="foot" href="/ToS">Privacy</a> | <a class="foot" href="/contact">Contact</a> | <a title="If not on Firefox this may not parse right." class="foot" href="/rss">RSS</a></span></center>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-10901144-1");
pageTracker._trackPageview();
} catch(err) {}</script>
