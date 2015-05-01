<?php
header("Content-type: image/png");
// example: <img src="gradient.php?height=600&width=100&start=00FF00&end=ff0000" />
$height=100;
$width=1;
$start='000000';
$end='FFFFFF';
if(isset($_GET['sc'])) $start = $_GET['sc'];
if(isset($_GET['ec'])) $end = $_GET['ec'];
$start_r = hexdec(substr($start,0,2)) - 40;
$start_g = hexdec(substr($start,2,2)) - 40;
$start_b = hexdec(substr($start,4,2)) - 40;
if($start_r < 0) $start_r = 0;
if($start_g < 0) $start_g = 0;
if($start_b < 0) $start_b = 0;
$end_r = hexdec(substr($end,0,2));
$end_g = hexdec(substr($end,2,2));
$end_b = hexdec(substr($end,4,2));
$image = imagecreate($width,$height);
for($y=0;$y<$height;$y++){
    for($x=0;$x<$width;$x++){
    	if($start_r==$end_r) $new_r = $start_r;

    	$difference = $start_r-$end_r;
    	$new_r = $start_r-intval(($difference/$height)*$y); 

    	if($start_g==$end_g) $new_g = $start_g;

    	$difference = $start_g-$end_g;
    	$new_g = $start_g-intval(($difference/$height)*$y);     

    	if($start_b==$end_b) $new_b = $start_b;

    	$difference = $start_b - $end_b;
    	$new_b = $start_b-intval(($difference/$height)*$y);

    	$row_color = imagecolorresolve($image,$new_r,$new_g,$new_b);
    	imagesetpixel($image,$x,$y,$row_color);
    }    
}
imagepng($image);
imagedestroy($image);
?>
