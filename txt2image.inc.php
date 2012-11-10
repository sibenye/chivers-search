<?php 
$errorb = 0;
$cname = $advert['main_category_name'];
$body = $advert['body'];
$txt = explode("\n", $body);
$lines = count($txt);

$num = rand(10, 1000000);
$file_name = 'images/ad-image/'.$cname.'/'.date('j, M Y').'('.$num.')'.'body_image.png';


$font_size   = 4;
$width  = 550; //Set width of image
$height = imagefontheight($font_size) * $lines; //Set height of image dependent on number of lines in string
	//Get width and height of individual character string
$el=imagefontheight($font_size);
  $em=imagefontwidth($font_size);
  // Create the image pallette
  $img = imagecreatetruecolor($width,$height);
  // White background
$background_color = imagecolorallocate ($img, 255, 255, 255); 
imagefilledrectangle($img, 0, 0,$width ,$height , $background_color);
  // Black font color
  $text_color = imagecolorallocate($img, 0, 0, 0);

$key = $lines;
foreach ($txt as $k=>$string) {
	$key = --$key;
    // Length of the string
    $len = strlen($string);
	if ($key != 0): $len = $len - 1; endif;//This is to avoid drawing the meta character that represents a line break
    // Y-coordinate of character, X changes, Y is static
    $ypos = 0;
    // Loop through the string
    for($i=0;$i<$len;$i++){
      // Position of the character horizontally
      $xpos = $i * $em;
      $ypos = $k * $el;
      // Draw character
      imagechar($img, $font_size, $xpos, $ypos, $string, $text_color);
      // Remove character from string
      $string = substr($string, 1);     
    }
  }
  // Return the image
$body_image = imagepng ($img, $file_name);
if (!$body_image): $errorb=1; endif;
  // Remove image
  imagedestroy($img);
  
  
 
?>