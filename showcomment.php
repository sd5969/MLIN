<?php
	if(!$included) die();
	echo "<tr>";
	$i++;
	echo "<td style='text-align: right; white-space: nowrap; padding: 0px 10px 0px 5px; border-bottom: solid 1px #" . $googleColors[1] . ";'>" . ($row2[name] === $_SESSION[user] ? "<a class='nerdyfail commentDelete' href='javascript:;'><img src='/Images/x.gif' style='position: relative; top: 1px;' /> <div class='postDate' style='display: none;'>$row2[postDate]</div></a>" : "") . "<b>" . $row2['name'] . "</b></td>";
	echo "<td style='padding: 5px 0px; border-bottom: solid 1px #" . $googleColors[1] . ";'><span style=''>" . $row2['comment'] . "</span>";
	echo "</td>";
	echo "<td style='white-space: nowrap; padding: 5px 0px; text-align: right;'><div style='display: inline;'>
			<span class='hidePostDate' style='display: none;'>$row2[postDate]</span>
			<span class='hideStoryDate' style='display: none;'>$row2[storyDate]</span>
			<span class='elevate' style='top: -5px;'>
			<span class='voteCount'>$row2[vote]</span> 
			<a class='votePlus nerdyfail' href='javascript:;'><img class='plus' src='/Images/voteplus.png' /></a><a class='voteMinus nerdyfail' href='javascript:;'><img class='minus' src='/Images/voteminus.png' /></a>
			<span class='hiddenImage' style='display: none;'><img class='plus2' src='/Images/voteplus2.png' /><img class='minus2' src='/Images/voteminus2.png' /></span>
			</span></div></td>";		
	echo "</tr>";
?>
