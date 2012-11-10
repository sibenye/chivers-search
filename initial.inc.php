<?php

	

  include('config.php');
	//include('validate_fns.php');
  include('helper_fns.php');
  include('db_txns.inc.php');

  

  $view = empty($_GET['view']) ? 'listads' : $_GET['view'];
   
	
	switch ($view) {
	
	 case "showad":
	  		$id= $_GET['id'];
			$set = $_REQUEST['set'];
			$q = $_REQUEST['q'];
			$cname = $_REQUEST['cname'];
			$countryid = $_REQUEST['countryid'];
			$stateid = $_REQUEST['stateid'];
			$one_country = single_country($_REQUEST['countryid']);
			$one_state = single_state($_REQUEST['stateid']);
			$list_countries = find_countries();
			$list_states = find_states($_POST['countryid']);
			 $ad = select_ad($id);
			 $search_maincategories = find_maincategories();
			 $min = empty($_REQUEST['min']) ? 0 : $_REQUEST['min'];
   			$max = empty($_REQUEST['max']) ? 20 : $_REQUEST['max'];
			$pagen = $_REQUEST['pagen'];
			 $page_title2 = $ad['headlinec'];
			 $desc = 'Classified Ads For Nigerians';
				$key = 'Nigerian Classified Ads, Classified Ads, Free Classified Ads, Nigerias free classified ads, Nigeria Craigslist, 		Africa Classified Ads, Nigeria Advertising, Nigerian Market';

	  break;
	  
	  case "listads":
	  		$set = $_REQUEST['set'];
			$q = $_REQUEST['q'];
			$cname = $_REQUEST['cname'];
			$countryid = $_REQUEST['countryid'];
			$stateid = $_REQUEST['stateid'];
			$one_country = single_country($_REQUEST['countryid']);
			$one_state = single_state($_REQUEST['stateid']);
			$list_countries = find_countries();
			$list_states = find_states($_REQUEST['countryid']);
	  		$select_ads = select_ads($cname);
			$search_maincategories = find_maincategories();
			$adcurrent = find_adcurrent();
			$min = empty($_REQUEST['min']) ? 0 : $_REQUEST['min'];
   			$max = empty($_REQUEST['max']) ? 20 : $_REQUEST['max'];
			$pagen = $_REQUEST['pagen'];
			$ads2 = find_ads2($q, $cname, $countryid, $stateid, $min, $max);
			$ads = find_ads($q, $cname, $countryid, $stateid);
			$page_title1 = 'Chivers Nigeria Classified Ads';
			$desc = 'Classified Ads For Nigerians';
				$key = 'Nigerian Classified Ads, Classified Ads, Free Classified Ads, Nigerias free classified ads, Nigeria Craigslist, 		Africa Classified Ads, Nigeria Advertising, Nigerian Market';
			
	   break;
	  
	  case "test-centers":
	  		$pname = 'Test Centers';
	  		$search_maincategories = find_maincategories();
			$page_title1 = $pname;
			$desc = 'GRE, TOEFL and SAT Test Centers in Nigeria and Ghana';
			$key = 'GRE test centers, test centers, GRE registration centers, GRE in Nigeria, test centers in Nigeria, test centers in Ghana, GRE in Ghana';
	  break;
	  
	  case "free-download":
	  		$pname = 'Free Download';
	  		$search_maincategories = find_maincategories();
			$page_title1 = $pname;
			$desc = 'Free download of GRE/TOEFL/SAT/GMAT prep materials';
			$key = 'Test materials, GMAT test, GRE test, GRE preparation materials, SAT test, GMAT materials, TOEFL materials';
	  break;
	  
	  case "how-to-apply-for-visa":
	  		$pname = 'How to Apply for Visa';
	  		$search_maincategories = find_maincategories();
			$page_title1 = $pname;
			$desc = 'Guideline on How to Apply for U.S. and U.K. Visa from Nigeria';
			$key = 'US Visa, US student visa, UK Visa, UK student visa, US visa application in Nigeria, UK visa application in Nigeria';
	  break;
	  
	  case "adform":
	  			$pname = 'Post Your Ad';
				$page_title1 = 'Chivers Nigeria Classified Ads';
	  			$search_maincategories = find_maincategories();
				$show_maincategories = find_maincategories();
				$list_seccategories = find_seccategories($_POST['mcid']);
				$list_subcategories = find_subcategories($_POST['seccid']);
				$list_countries = find_countries();
				$list_states = find_states($_POST['country_id']);
				$one_maincategory = single_maincategory($_POST['mcid']);
				$one_seccategory = single_seccategory($_POST['seccid']);
				$one_subcategory = single_subcategory($_POST['subcid']);
				$one_country = single_country($_POST['country_id']);
				$one_state = single_state($_POST['state_id']);
				$desc = 'Classified Ads For Nigerians';
				$key = 'Nigerian Classified Ads, Classified Ads, Free Classified Ads, Nigerias free classified ads, Nigeria Craigslist, 		Africa Classified Ads, Nigeria Advertising, Nigerian Market';
	
	 break;
	  
	  case "results":
	  		$pname = 'Search results';
	  		$search_maincategories = find_maincategories();
			$page_title1 = $pname;
			$desc = 'Google Custom Search Results';
			$key = 'Nigeria Classified Ads search results, Classified ads search results, Nigeria search results';
	break;
	  
	  case "editad":
	  break;
		
	  
	
	}

	/*if ($view = 'listads'):
			include($_SERVER['DOCUMENT_ROOT'].'/'.$view'.php'); */

			/*include($_SERVER['DOCUMENT_ROOT'].'/chivers-search/'.$view'.php');*/
   
	/*else:
		include($_SERVER['DOCUMENT_ROOT'].'/'.$view.'/'.$view'.php'); */

			/*include($_SERVER['DOCUMENT_ROOT'].'/chivers-search/'.$view.'/'.$view'.php');*/


	/*endif; */


?>
