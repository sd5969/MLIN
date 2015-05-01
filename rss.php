<?php
	header("Content-type:application/rss+xml");
	echo "<?xml version=\"1.0\" ?>";
?>

<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<atom:link href="http://mylifeisnerdy.co.cc/rss" rel="self" type="application/rss+xml" />
<title>MLIN - My Life is Nerdy</title>
<link>http://mylifeisnerdy.co.cc/</link>
<description>My Life Is Nerdy | It's the Nerd Life - Is your life nerdy?? Come tell us!</description>
<image>
	<title>MLIN - My Life is Nerdy</title>
	<url>http://mylifeisnerdy.co.cc/Images/mlin.png</url>
	<link>http://mylifeisnerdy.co.cc/</link>
</image>
<?php
	$included = true;
	include("connect.php");
	$query = "SELECT * FROM stories ORDER BY dateTime DESC LIMIT 0,15";
	$result = mysql_query($query, $con);
	while($row = mysql_fetch_array($result)) {
?>
	<item>
        <title><?php echo $row[type] . ": " . substr($row[dateTime], 5, 5); ?></title>         
        <link>http://mylifeisnerdy.co.cc/story/<?php echo str_replace(" ","+",$row[dateTime]); ?></link>
        <description><?php echo str_replace("&eacute;","e",str_replace("<","&lt;",str_replace(" & "," &amp; ",str_replace(" && "," &amp;&amp; ",$row[story])))); ?></description>
		<guid>http://mylifeisnerdy.co.cc/story/<?php echo str_replace(" ","+",$row[dateTime]); ?></guid>
    </item>
<?php
	}
?>
</channel>
</rss>