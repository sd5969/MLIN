<?php
	if(!$included) die();
	$result = mysql_query("SELECT * FROM words WHERE useDate =  '2009-10-25' + INTERVAL( MOD( CAST( NOW( ) AS DATE ) -  '2009-10-25', 731 ) ) DAY LIMIT 0 , 30") or die(mysql_error());
	while($row = mysql_fetch_array($result)) {
		$altText = $row[altText] ."\"> ";
		$word = $row[word];
		$get = " | <span style='font-size: 12px; position: relative;'>" . $row[get] . " " . ($row[get] != 1 ? "people get it!" : "person gets it!") . "</span>";
	}
?>
<div style="margin-top: 10px; overflow: hidden; line-height: 1; height: 23px;">
<script type="text/javascript">
<!--
	$(document).ready(function() {
		$('.suggest').toggle(function() {
			$('#suggestwotd').fadeIn();
		}, function() {
			$('#suggestwotd').fadeOut();
		});
		$('#submitwotd').click( function(e) {
			e.preventDefault();
			if($('#human').val() == "MLIN") {
				$.post("/contact", {word: $('#wordwotd').val(), title: $('#titlewotd').val()}, function(data) {
					$('#suggestwotd').html("Submitted!");
					$('#suggestwotd').fadeOut();
				});
				$('#suggestwotd').html('Loading...');
			} else {
				alert('Oops, write "MLIN" (no quotes).  If you\'re wondering why we want you to do this, it\'s to prove you are human.');
			}
		});
		$('#get').click( function(e) {
		e.preventDefault();
			$.post("/wordget.php", {word: "<?php echo $word; ?>", get: 1}, function(data) {
				$('#getForm').html(data + "You get it!");
			});
		});
	});
//-->
</script>
<span style="font-size: 15px; position: relative; top: -2px;" class="color2"><a class="page suggest" href="javascript:;">Nerd Word of the Day</a>: </span>
<a href="/nwotd" class="standard1"><span class='color1' style="font-size: 20px; font-weight: bold;" title="
<?php
	echo $altText . $word . $get;
	if(mysql_num_rows($result) == 0) echo "I forgot to place a word for today, and so the WoTD is suggest.\"><a class='page suggest' href='javascript:;'>Suggest</a>";
?>
&nbsp;<span id="getForm" style="font-size: 12px; top: -1px; position: relative;"><form style="display: inline;"><input style="top: -2px;" type="button" value=" I Get It! " id="get" /></form></span>
</span></a>
<div id="suggestwotd" class="story" style="display: none; margin: 10px 10px 10px 0px; position: absolute; z-index: 1000; width: 195px; border: 1px solid white;">
<form accept-charset="utf-8" style="padding-left: 20px;" method="post" action="#">
Word:<br />
<input id="wordwotd" type="text" name="word" /><br />
Title:<br />
<input id="titlewotd" type="text" name="title" /><br />
Write "MLIN":
<input id="human" type="text" /><br />
<br />
<input id="submitwotd" type="submit" value="Submit" />
</form>
</div>
</div>
<center>
<?php /* <!-- Begin BidVertiser code -->
<br />
<SCRIPT LANGUAGE="JavaScript1.1" SRC="http://bdv.bidvertiser.com/BidVertiser.dbm?pid=358371&bid=887691" type="text/javascript"></SCRIPT>
<!-- End BidVertiser code --> */ ?>
<?php /* <script type="text/javascript">
ch_client = "sdlynx";
ch_width = 728;
ch_height = 90;
ch_type = "mpu";
ch_sid = "Chitika Default";
ch_backfill = 1;
ch_color_site_link = "#<?php echo $googleColors[0]; ?>";
ch_color_title = "#<?php echo $googleColor[1]; ?>";
ch_color_border = "#<?php echo $googleColor[4]; ?>";
ch_color_text = "#<?php echo $googleColor[2]; ?>";
ch_color_bg = "#<?php echo $googleColor[3]; ?>";
</script>
<script src="http://scripts.chitika.net/eminimalls/amm.js" type="text/javascript">
</script> */ ?>
<!-- Begin: AdBrite, Generated: 2010-09-26 19:36:22  -->
<script type="text/javascript">
var AdBrite_Title_Color = '<?php echo $googleColors[4]; ?>';
var AdBrite_Text_Color = '<?php echo $googleColors[4]; ?>';
var AdBrite_Background_Color = '<?php echo $googleColors[1]; ?>';
var AdBrite_Border_Color = '<?php echo $googleColors[0]; ?>';
var AdBrite_URL_Color = '<?php echo $googleColors[3]; ?>';
try{var AdBrite_Iframe=window.top!=window.self?2:1;var AdBrite_Referrer=document.referrer==''?document.location:document.referrer;AdBrite_Referrer=encodeURIComponent(AdBrite_Referrer);}catch(e){var AdBrite_Iframe='';var AdBrite_Referrer='';}
</script>
<br />
<span style="white-space:nowrap;"><script type="text/javascript">document.write(String.fromCharCode(60,83,67,82,73,80,84));document.write(' src="http://ads.adbrite.com/mb/text_group.php?sid=1769202&zs=3732385f3930&ifr='+AdBrite_Iframe+'&ref='+AdBrite_Referrer+'" type="text/javascript">');document.write(String.fromCharCode(60,47,83,67,82,73,80,84,62));</script>
<a target="_top" href="http://www.adbrite.com/mb/commerce/purchase_form.php?opid=1769202&afsid=1"><img src="http://files.adbrite.com/mb/images/adbrite-your-ad-here-leaderboard.gif" style="background-color:#CCCCCC;border:none;padding:0;margin:0;" alt="Your Ad Here" width="14" height="90" border="0" /></a></span>
<!-- End: AdBrite -->
</center>
