<?php
	header("Content-type: text/css");
	$color = 0;
	$darker = 0;
	if(isset($_GET['color'])) $color = "#" . $_GET['color'];
	if(isset($_GET['darker'])) $darker = "#" . $_GET['darker'];
?>

<!--

	@import "general.css";
	
	* {
		padding: 0;
		margin: 0;
	}
	
	body, html {
		height: 100%;
		padding: 0;
		margin: 0;
	}
	
	body {
		font-family: Verdana, Sans Serif;
		background: <?php echo $color; ?> url("image.php?sc=<?php echo substr($darker, 1); ?>&ec=<?php echo substr($color, 1); ?>") repeat-x;
	}
	
	ul#cyclelist {
		margin-left: 10px;
		height: 30px;
	}
	
	div.mainwrapper {
		min-height: 100%;
		background-color: #f9f9f9;
		border-left: 2px solid #888;
		border-right: 2px solid #888;
		width: 960px;
		margin: 0 auto;
		padding: 0px 20px 20px 20px;
	}

	* html div.mainwrapper {
		height: 100%;
	}
	
	div.main {
		padding-top: 10px;
	}
	
	div.story {
		overflow: auto;
		width: 100%;
		background-color: #eee;
		color: #000000;
		padding-top: 10px;
		padding-bottom: 10px;
		padding-right: 10px;
		padding-left: 10px;
		border: 1px solid #ccc;
		border-radius: 5px 5px;
		-webkit-border-radius: 5px 5px;
		-moz-border-radius: 5px 5px;
	}
	
	div.story:hover {
		border: 1px solid #bbb;
		background-color: #ccc;
	}
	
	div#notify {
		background-color: <?php echo $darker?>;
	}
	
	span.color1 {
		color: <?php echo $color; ?>;
	}
	
	a.standard1:link {
		color: <?php echo $color; ?>;
		text-decoration: none;
	}

	a.standard1:visited {
		color: <?php echo $color; ?>;
		text-decoration: none;
	}

	a.standard1:active {
		color: <?php echo $color; ?>;
		text-decoration: none;
	}

	span.color2 {
		color: #111111;
	}
	
	span.nerdy {
		font-size: 30px;
		color: <?php echo $color; ?>;
	}
	
	span.nerdyfail {
		color: #111111;
	}
	
	span.title2 {
		font-size: 30px;
		color: <?php echo $darker; ?>;
	}
	
	p.title {
		color: #777777;
	}
	
	span.footer {
		color: #000000;
	}
	
	td.navigation {
		height: 30px;
	}
	
	td.nSelected {
		background-color: <?php echo $darker; ?>;
		color: #fff;
	}
	
	tr.navbar {
		background-color: <?php echo $color; ?>;
		color: #fff;
		padding-top: 5px;
		padding-bottom: 5px;
		padding-right: 5px;
		padding-left: 5px;
	}
	
	a.navbar:link {
		color: #fff;
		text-decoration: none;
	}
	a.navbar:visited {
		color: #fff;
		text-decoration: none;
	}
	a.navbar:hover {
		color: #fff;
		text-decoration: none;
	}
	
	a.nerdyfail:link {
		color: <?php echo $color; ?>;
		text-decoration: none;
	}
	a.nerdyfail:visited {
		color: <?php echo $color; ?>;
		text-decoration: none;
	}
	a.nerdyfail:hover {
		color: #000000;
		text-decoration: none;
	}
	
	a.navbarSelected:link {
		color: #fff;
		text-decoration: none;
	}
	a.navbarSelected:visited {
		color: #fff;
		text-decoration: none;
	}
	a.navbarSelected:hover {
		color: #fff;
		text-decoration: none;
	}
	
	a.title:link {
		color: #000;
		text-decoration: none;
	}
	a.title:visited {
		color: #000;
		text-decoration: none;
	}
	a.title:hover {
		text-decoration: none;
	}
	
	a.foot:link {
		color: <?php echo $color; ?>;
		text-decoration: none;
	}
	a.foot:visited {
		color: <?php echo $color; ?>;
		text-decoration: none;
	}
	a.foot:hover {
		color: #000000;
		text-decoration: none;
	}
	
	a:link {
		color: <?php echo $color; ?>;
		text-decoration: none;
	}
	a:visited {
		color: <?php echo $color; ?>;
		text-decoration: none;
	}
	a:hover {
		color: #FFFFFF;
		text-decoration: none;
	}
	
	a.page:link {
		color: <?php echo $color; ?>;
		text-decoration: none;
	}
	a.page:visited {
		color: <?php echo $color; ?>;
		text-decoration: none;
	}
	a.page:hover {
		color: #111;
		text-decoration: none;
	}
	
	a.pageSelected:link {

		text-decoration: none;
	}
	a.pageSelected:visited {

		text-decoration: none;
	}
	a.pageSelected:hover {
		color: <?php echo $color; ?>;
		text-decoration: none;
	}
	
	a.box:link {
		background-color: #FFFFFF;
		text-decoration: none;
	}
	a.box:visited {
		background-color: #FFFFFF;
		text-decoration: none;
	}
	a.box:hover {
		background-color: <?php echo $color; ?>;
		color: #fff;
		text-decoration: none;
	}
	
	a.boxSelected:link {
		background-color: <?php echo $color; ?>;
		color: #fff;
		text-decoration: none;
	}
	a.boxSelected:visited {
		background-color: <?php echo $color; ?>;
		color: #fff;
		text-decoration: none;
	}
	a.boxSelected:hover {
		background-color: #FFFFFF;
		color: <?php echo $darker; ?>;
		text-decoration: none;
	}

	a.Sort:link {
		color: <?php echo $color; ?>;
		text-decoration: none;
	}
	a.Sort:visited {
		color: <?php echo $color; ?>;
		text-decoration: none;
	}
	a.Sort:hover {
		color: #111111;
		text-decoration: none;
	}
	
	a.selectSort:link {
		color: #111111;
		text-decoration: none;
	}
	a.selectSort:visited {
		color: #111111;
		text-decoration: none;
	}
	a.selectSort:hover {
		color: <?php echo $color; ?>;
		text-decoration: none;
	}
	
-->