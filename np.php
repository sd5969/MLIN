<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="english">
<head>
<title>Notepad</title>
<meta name="author" content="Jamie Lewis" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
<?php
if(isset($_POST["notes"])){
 $file = fopen("note.txt",'w');
   if(fwrite($file,$_POST["notes"])){ 
    echo "File Written Successfully";
  }
fclose($file);
}

$file = fopen("note.txt",'r');
$content = fread($file,filesize("note.txt"));
echo "<form action='np.php' method='post'>";
echo "<fieldset>";
echo "<legend>Notepad</legend>";
echo "<label for='notes'>Notes:</label><br/>";
echo "<textarea name='notes' id='notes' cols='50' rows='3'>".htmlentities($content)."</textarea>";
echo "<input type='submit' value='Save'/>";
echo "</fieldset>";
echo "</form>";

?>
</body>
</html>