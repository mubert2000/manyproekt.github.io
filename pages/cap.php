<?php
header("Content-type: image/png");
session_start();


$sl = array(
                 '1','2','3','4','5','6',
                 '7','8','9','0');
$slovo = "";
for($i=0;$i<5; $i++){
$bl = rand(0,count($sl)-1);

$slovo .= $sl[$bl];
}
$_SESSION['capcha'] = $slovo;
$im = imagecreate(100,50);
//$res=imagettfbbox(100, 0, "./captcha.ttf",'ghgh');
$width=100;
imagedestroy($im);

$im=imagecreate($width,40);
//$im = imagefill($im,58,57,56);


$white = imagecolorallocatealpha($im,  255, 255, 255, 127); 
$black = imagecolorallocate($im, 65, 205,73); 
$f = imagecolorallocate($im, 191, 0,0);
imagettftext($im, 15, 0, 15,28, $black, "./image2.ttf",$slovo);

imagepng($im);
imagedestroy($im); 

?>