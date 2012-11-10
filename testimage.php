<?php


$body = 'hello dearie';
// Create a 1000*500 image
$im = @imagecreate(1000, 500);

// White background and blue text
$bg = imagecolorallocate($im, 255, 255, 255);
$textcolor = imagecolorallocate($im, 0, 0, 255);

// Write the string at the top left
imagestring($im, 5, 0, 0, $body, $textcolor);

// Output the image
header('Content-type: image/png');

imagepng($im);
imagedestroy($im);
?>
