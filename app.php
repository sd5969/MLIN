<html>
<?php
$included = true;
include("connect.php");
$query = "SELECT DATE_FORMAT(dateTime, '%M %e, %Y, %l:%i%p') DT, type TYPE, story STORY, fail FAIL, nerdy NERDY FROM stories";

if($_GET["specific"] != NULL)
{
	$query = $query . " WHERE DATE_FORMAT(dateTime, '%M %e, %Y, %l:%i%p')='" . str_replace("%%"," ",$_GET["specific"]) . "'";
	if($_GET["order"] == "month")
		$query = $query . " AND YEAR(`dateTime`)=YEAR(CURRENT_DATE()) and MONTH(`dateTime`)=MONTH(CURRENT_DATE())";
	if($_GET["order"] == "yester")
		$query = $query . " AND dateTime<=CURRENT_DATE() - INTERVAL '0' DAY and dateTime>=CURRENT_DATE() - INTERVAL '1' DAY";
}
else {
	if($_GET["order"] == "month")
		$query = $query . " WHERE YEAR(`dateTime`)=YEAR(CURRENT_DATE()) and MONTH(`dateTime`)=MONTH(CURRENT_DATE())";
	if($_GET["order"] == "yester")
		$query = $query . " WHERE dateTime<=CURRENT_DATE() - INTERVAL '0' DAY and dateTime>=CURRENT_DATE() - INTERVAL '1' DAY";
}
if($_GET["order"] == NULL)
{
	$query = $query . " ORDER BY dateTime DESC";	
}
else {
	switch($_GET["order"]) {
		case "":
			$query = $query . " ORDER BY dateTime DESC";
			break;
		case "best":
			$query = $query . " ORDER BY nerdy-fail DESC";
			break;
		case "worst":
			$query = $query . " ORDER BY nerdy-fail ASC";
			break;
		case "random":
			$query = $query . " ORDER BY RAND()";
			break;
		default:
			$query = $query . " ORDER BY dateTime DESC";
			break;
	}
}
if($_GET["page"] != NULL) {
	$query = $query . " LIMIT " . 20*($_GET["page"]-1) . ", 20";
} else {
	$query .= " LIMIT 20";
}
//echo $query;
$result = mysql_query($query);
while($row = mysql_fetch_array($result))
{
	if($_GET["more"] != NULL)
		echo $row['DT'] . "%d%" . $row['TYPE'] . "%t%" . $row['STORY'] . "%s%" . $row["NERDY"] . "%n%" . $row["FAIL"] . "%f%" ."%/%";
	else
		echo $row['DT'] . "%d%" . $row['TYPE'] . "%t%" . $row['STORY'] . "%s%" . "%/%";
}
?>
</html>
