<?php
/*if(!isset($_GET['txt']))
{
exit();
}*/

$body = '<p>first line is here ....</p><p>second line is here...</p>';
$filename = 'images/ad-image/House/file.png';
// Create a 700*200 image
$im = @imagecreate(1000, 500);

// White background and blue text
$bg = imagecolorallocate($im, 255, 255, 255);
$textcolor = imagecolorallocate($im, 0, 0, 255);

// Write the string at the top left
imagestring($im, 5, 0, 0, $body, $textcolor);

// Output the image

imagepng($im, $filename);

?>
<img src="<?php echo $filename;?>" />

