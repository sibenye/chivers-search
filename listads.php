 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
<head>
<?php include ('header.inc.php'); ?>
</head>
<body>
<?php include ('fb_plugin.inc.php'); ?>
<div class="main">
  <div class="main_resize">
    <div class="header">
      <?php include ('google_topbanner.inc.php'); ?>
    <?php include ('logo.inc.php'); ?>
      
      <div class="clr"></div>
      <div class="menu">
        <?php include ('menu.inc.php'); ?>
      </div>
           <!-- <div class="click">
        <p>Click here to live Support Tell Free 1-866-123-675</p>
      </div>-->
      <div class="clr"></div>
    </div>
    <div class="clr"></div>
    <div class="slider_main">
      <div class="float_right">
               <script>utmx_section("Post Ad Button")</script> <a href="adform.php?view=adform"><img class="sbox" src="images/post-ad.png" alt="picture" width="186" height="38" border="0" /></a></noscript>
        </div>
      <?php include ('nav.inc.php');?>
       <div class="clr"></div>
      <?php include ('sort.inc.php'); ?>
      
      </div>
      <div class="clr"></div>
    <div class="main_left">
      <div class="search">
         <form id="searchform" name="searchform" method="get" action="listads.php?view=listads">
          <label>Search: </label>
            
            <input name="q" type="text" class="keywords" id="textfield" maxlength="50" value="" />
            <input name="cname" type="hidden" value="<?php echo $cname; ?>" />
            <input name="countryid" type="hidden" value="<?php echo $countryid; ?>" />
            <input name="stateid" type="hidden" value="<?php echo $stateid; ?>" />
            <input name="min" type="hidden" value="0" />
            <input name="max" type="hidden" value="20" />
            <input name="pagen" type="hidden" value="1" />
            <input name="set" type="hidden" value="1" />
            
            <input name="b" type="image" src="images/search.png" class="button" />
          
        </form>
        <div class="clr"></div>
      </div>
      <?php include ('fb_likebox.inc.php'); ?>
      <div class="clr"></div>
		<?php include ('google_sidebar.inc.php'); ?>
    </div>
    <div class="main_right">
    <div class="clr"></div>
    <div id="right_text">
        
<span><?php echo empty($ads) ? '0' : count($ads);?> Ads Found!</span>

  <?php if(!empty($ads)): include ('pagebreak.inc.php'); endif;?>
      <div class="clr"></div>
      </div>
      <div class="clr"></div>
      <div id="ads">
 <?php if(!empty($ads)): 
	    
	   $row_count = 1;
			 
     foreach($ads2 as $ad): 
	 // Calculate how long ago the Ad was posted
		 $date1 = $ad['modified_at'];
		 $date2 = $ad['created_at'];
		 $date = timepassed($date1, $date2);
		//Check if Ad has pictures 
		 if (!empty($ad['image1c']) || !empty($ad['image2c'])): $pic = 'pics'; else: $pic = ''; endif;
		 
		 $row_style = ($row_count % 2) ? 'ad' : 'ad-alternate';
		 
   ?>
		  <div class="<?php echo $row_style; ?>">
			  <h1><a href="showad.php?view=showad&set=<?php echo $set;?>&cname=<?php echo $cname; ?>&countryid=<?php echo $countryid;?>&stateid=<?php echo $stateid;?>&id=<?php echo $ad['idc']; ?>&min=<?php echo $min;?>&max=<?php echo $max;?>&pagen=<?php echo $pagen;?>"><?php echo safe_output($ad['headlinec']); ?>....</a><?php echo '<span style="color:#00CC00">'.$pic.'</span>';?> &nbsp;<span> at <?php echo safe_output($ad['cityc']).', '.safe_output($ad['statec']).', '.safe_output($ad['countryc']);?><br/> posted <?php echo $date;?></span></h1>
		  </div>
			
			<?php 
			    $row_count++;
			    endforeach; 
			 ?>
		  <?php else: echo '<h1>No Ads Yet. Post your Ad.</h1>'; endif;?>
          <div class="clr"></div>
		</div>
        <div id="right_text">
         <?php if(!empty($ads)): include ('pagebreak.inc.php'); endif;?>
      <div class="clr"></div>
      </div>
    </div>
    <div class="clr"></div>
  </div>
  <?php include ('footer.inc.php'); ?>
</body>
</html>
