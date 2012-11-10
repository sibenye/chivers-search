<?php include('header.inc.php'); 

		include ('sidebar_left.inc.php');

		if ($view == 'test-centers' || $view == 'free-download' || $view == 'how-to-apply-for-visa' || $view == 'adform'):
		include ('sidebar_right.inc.php');
		endif;
?>



<?php include($_SERVER['DOCUMENT_ROOT'].'/'.$view.'/'.$view.'.php'); 
		/*include($_SERVER['DOCUMENT_ROOT'].'/chivers-search/'.$view.'/'.$view.'.php');*/
?>



<?php include('footer.inc.php'); ?>
