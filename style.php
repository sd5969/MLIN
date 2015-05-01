<?php
	switch($cookieT) {
		case "bluenblack":
			$theme = "Style/bluenblack.css";
			$buttonBack = "#4444FF";
			$button = "#EEEEEE";
			$googleColors = array("4444FF","111111","4444FF","4444FF","CCCCCC");
			break;
		case "streamline":
			$theme = "Style/streamline.css";
			$buttonBack = "#400";
			$button = "#6c0000";
			$googleColors = array("8B0000","FFFFFF","8B0000","8B0000","000000");
			break;
		case "streamline-blue":
			$theme = "Style/streamline-blue.css";
			$buttonBack = "#004";
			$button = "#00006c";
			$googleColors = array("00008B","FFFFFF","00008B","00008B","000000");
			break;
		case "greennblack":
			$theme = "Style/greennblack.css";
			$buttonBack = "#8B8682";
			$button = "#EEEEEE";
			$googleColors = array("008B00","111111","008B00","008B00","CCCCCC");
			break;
		case "ubuntu":
			$theme = "Style/ubuntu.css";
			$buttonBack = "#fae5ba";
			$button = "#cc0000";
			$googleColors = array("ec530f","FFFFFF","ec530f","ec530f","000000");
			break;
		case "meteor":
			$theme = "Style/meteor.css";
			$button = "#ff6200";
			$buttonBack = "#111111";
			$googleColors = array("FF9000","000000","FF9000","FF9000","FFFFFF");
			break;
		case "bluengray":
			$theme = "Style/bluengray.css";
			$buttonBack = "#4444FF";
			$button = "#EEEEEE";
			$googleColors = array("4444FF","C7C7C7","4444FF","4444FF","444444");
			break;
		case "mint":
			$theme = "Style/mint.css";
			$buttonBack = "#ffffff";
			$button = "#beffd0";
			$googleColors = array("008B00","BEFFD0","008B00","008B00","000000");
			break;
		case "rose":
			$theme = "Style/rose.css";
			$buttonBack = "#ffffff";
			$button = "#ffbed0";
			$googleColors = array("8B0000","FFBED0","8B0000","8B0000","000000");
			break;
		case "yotsuba":
			$theme = "Style/yotsuba.css";
			$buttonBack = "#ffffff";
			$button = "#f0e0d6";
			$googleColors = array("8B0000","FFFFFA","8B0000","8B0000","8B0000");
			break;
		case "sky":
			$theme = "Style/sky.css";
			$buttonBack = "#ffffff";
			$button = "#bed0ff";
			$googleColors = array("00008B","BED0FF","00008B","00008B","000000");
			break;
		case "none":
			$theme = "Style/missing.css";
			$buttonBack = "#ffffff";
			$button = "#ffffff";
			$googleColors = array("000000","ffffFF","000000","000000","000000");
			break;
		case "who":
			$theme = "Style/who.css";
			$buttonBack = "#223d4d";
			$button = "#0d181e";
			$googleColors = array("223d4d","FFFFFF","223d4d","223d4d","000000");
			break;
		case "random":
			$color = dechex(rand(0x101010, 0xFFFFFF));
			$darker1 = hexdec(substr($color, 0, 2));
			$darker2 = hexdec(substr($color, 2, 2));
			$darker3 = hexdec(substr($color, 4, 2));
			$darker1 = $darker1 > 56 ? $darker1 - 40 : 16;
			$darker2 = $darker2 > 56 ? $darker2 - 40 : 16;
			$darker3 = $darker3 > 56 ? $darker3 - 40 : 16;
			$darker = dechex($darker1) . dechex($darker2) . dechex($darker3);
			$theme = "Style/random.php?color=$color&darker=$darker";
			$buttonBack = "#" . $color;
			$button = "#" . $darker;
			$googleColors = array("$color","FFFFFF","$color","$color","000000");
			break;
		default:
			$cookieT = "streamline-blue";
			$theme = "Style/streamline-blue.css";
			$buttonBack = "#004";
			$button = "#00006c";
			$googleColors = array("00008B","FFFFFF","00008B","00008B","000000");
			break;
	}
?>
