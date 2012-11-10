<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
<head>
<?php include ('google_ME_tracking_code.inc.php'); ?>
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
      <div class="float_left">
        <h2 class="light">Classified Ads For The Nigerian Market</h2>
        </div>
        <div class="float_right">
               <script>utmx_section("Post Ad Button")</script> <a href="adform.php?view=adform"><img class="sbox" src="images/post-ad.png" alt="picture" width="186" height="38" border="0" /></a></noscript>

        </div>
        <div class="clr"></div>
        <p class="light">Categories</p>
       <ul> <?php foreach($search_maincategories as $search_mcat): ?>
   <li class="sbox"><a href="listads.php?view=listads&set=1&cname=<?php echo $search_mcat['main_category_name'];?>&min=0&max=20&pagen=1"><?php echo $search_mcat['main_category_name'];?></a></li> <?php endforeach; ?></ul>
   
       <div class="clr"></div>
        
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
      <div class="inner2">
      <p class="light"><strong>Select location of Ad:</strong></p>
      <?php foreach($list_countries as $list_country): ?>
    <li class="sbox"><a href="listads.php?view=listads&set=2&cname=<?php echo $cname; ?>&countryid=<?php echo safe_output($list_country['country_id']); ?>&stateid=<?php echo $stateid; ?>&min=0&max=20&pagen=1"><?php echo safe_output($list_country['country_name']); ?></a></li>
    <?php endforeach; ?>
      
      </div>
      <?php include ('fb_likebox.inc.php'); ?>
      <div class="clr"></div>
		<?php include ('google_sidebar.inc.php'); ?>
    </div>
    <div class="main_right">
      <div class="clr"></div>
      <div id="right_text">
        <span><strong>Recent Ads</strong></span>
      </div>
      <div class="clr"></div>
      <div id="ads">
     <?php include ('recent_ads.inc.php') ?>
      </div>
      <p>&nbsp;</p>
    </div>
    <div class="clr"></div>
  </div>
 <?php include ('footer.inc.php'); ?>
</body>
</html>
