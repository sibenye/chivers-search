<?php
//this function strips the tags then converts to htmlentities
function safe_output($string) {
	
	if (empty($string)) { return ''; }
	
	return htmlentities(strip_tags($string));
	
}

//this function converts to htmlentities without stripping the tags
function safe_output2($string) {
	
	if (empty($string)) { return ''; }
	
	return htmlentities($string);
	
}


function regexp_replace($string) {
	if (empty($string)) { return '';}

// Convert Windows (\r\n) to Unix (\n)
$string = preg_replace('/\r\n/', "\n", $string);
// Convert Macintosh (\r) to Unix (\n)
$string = preg_replace('/\r/', "\n", $string);
// Handle paragraphs
$string = preg_replace('/\n\n/', '<br/><br/>', $string);
// Handle line breaks
$string = preg_replace('/\n/', '<br/>', $string);


	return $string;
}

/* This takes the date in the which the Ad was posted finds how long ago from today.
 it outputs it in secs, mins, or days as the case may be.
 But once the date posted is more than 7 days it will just output the date posted.*/
function timepassed($date1, $date2) {
	$created=strtotime($date1);
	$tp = time() - $created;
	
	if ($tp < 60): $tpd= $tp.' secs ago'; return $tpd; endif;
	
	if ($tp >= 60 && $tp < 120): $tpd = '1 min ago'; return $tpd; endif;
	
	if ($tp >= 120 && $tp <= 3600): $tp = $tp/60; $tp = round($tp, 0);    $tpd = $tp.' mins ago'; return $tpd; endif;
	
	if ($tp > 3600 && $tp < 7200): $tpd = '1 hr ago'; return $tpd; endif;
	
	if ($tp >= 7200 && $tp <= 86400): $tp = $tp/3600; $tp = round($tp, 0); $tpd = $tp.' hrs ago'; return $tpd; endif;
	
	if ($tp > 86400 && $tp < 172800): $tpd = '1 day ago'; return $tpd; endif;
	
	if ($tp >=172800 && $tp <=604800): $tp = $tp/86400; $tp = round($tp, 0); $tpd = $tp.' days ago'; return $tpd; endif;
	
	if ($tp > 604800): $tpd = $date2; return $tpd; endif;
}

/* This function takes an image that is above a certain dimension and
scales it down to a desired sized still maintaining the aspect ratio*/
function check_imagesize($imagefilename) {
	list($width, $height) = getimagesize($imagefilename);
	if ($width == 0 || $height == 0): $imagesize['error']=1;  else:
	
	$ratio = $width/$height;
	
	if ($width > 350 && $height > 260):  $imagesize['width']=350; $imagesize['height']= 260; else:
	if ($width > 350 && height < 260):  $height = 350/$ratio;  $imagesize['width']=350; $imagesize['height']= round($height, 0); else:
	if ($width < 350 && height > 260): $width = 260 * $ratio; $imagesize['width']= round($width, 0); $imagesize['height']= 260; else:
	if ($width <= 350 && height <= 260): $imagesize['width'] = $width; $imagesize['height'] = $height; endif; endif; endif; endif;
	
	endif;
		return $imagesize;
}

/*A function that generates random alphanumeric*/
function randgen() {
	$num = rand(20000, 99999);
	
	$lm = rand(0, 25);
	
	$letters = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
	
	$checksum1 = $num.$letters[$lm];
return $checksum1;

}

/*This function calculates when the Ad will expire and shows it in date format. it uses the date it was created and adds 90 days.
  If the date of expiration is tomorrow or today it will show 'tomorrow' and 'Today' respectively*/
  
function exdate($date) {
	$nowdate = strtotime(date("M j, Y")); //convert today's date to seconds
	$cdate = strtotime($date); //convert the date of creation to seconds
	$dateint = 90 * 60 * 60 * 24; //number of seconds in 30days
	$edate = $cdate + $dateint;
		
	$diff = $edate - $nowdate; //how long from today
	
	if ($diff > 172800): $edate = date("M j, Y", $edate); $exdate = 'This Ad expires on '.$edate; return $exdate;
	
	else:
	if (172800 > $diff && $diff > 86400): $edate = 'Tomorrow'; $exdate = 'This Ad expires '.$edate; return $exdate;
	
	else:
	if (86400 >= $diff && $diff > 0): $edate = 'Today'; $exdate = 'This Ad expires '.$edate; return $exdate;
	
	else:
	if (0 >= $diff): $exdate = 'This Ad has expired '; return $exdate;
		
	endif; endif; endif; endif;
}
?>
