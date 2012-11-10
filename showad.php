 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
      <div class="inner">
      <?php include ('nav.inc.php'); ?>
      </div>
      </div>
      <div class="clr"></div>
    
    
    <div id="showad_heading">
       <?php 
$headline = $ad['headlinec']; $country = $ad['countryc']; $state = $ad['statec']; $city = $ad['cityc'];?>
<p><strong><?php echo safe_output($headline);?></strong><br/>
<span><?php echo $city.', '.$state.', '.$country; ?></span>


<!-- Calculate Expiration date of Ad -->
<?php $edate =  exdate($ad['created_at']);?>
<!-- end of calc -->
<span class="float_right"><strong><?php echo $edate;?></strong></span></p>

      <div class="clr"></div>
      </div>
      <div class="clr"></div>
      <div id="showad_content">
 	<p><div class="sbox"><?php include ('fb_likebox.inc.php'); ?></div><br/>
 <?php if (!empty($ad['urlc'])):?>
<span><strong>Our Website: </strong><a href="http://<?php echo $ad['urlc'];?>" target="_blank"><?php echo $ad['urlc'];?></a></span>
<?php endif;?></p>
<div class="clr"></div>

<div class="showad-body" style="float:left;">
<?php if (preg_match("/^images\/.*body_image\.(png|jpeg|jpg|gif)$/", $ad['bodyc'])): ?>
<img src="<?php echo $ad['bodyc']; ?>" alt="<?php echo safe_output($headline);?>"/>
<?php else: 
echo regexp_replace(safe_output($ad['bodyc']));
 endif; ?>

</div>

<div style="float:right;"> <?php if (!empty($ad['image1c'])): 
$imagesize = check_imagesize($ad['image1c']);
if ($imagesize['error'] != 1):?>
<img class="showad-pic1" width="<?php echo $imagesize['width'];?>" height="<?php echo $imagesize['height'];?>" src="<?php echo $ad['image1c']; ?>" alt="<?php echo safe_output($headline);?>"/><br/><br/>
<?php else: ?>
<img class="showad-pic1" width="350" height="260" src="<?php echo $ad['image1c']; ?>" alt="<?php echo safe_output($headline);?>"/><br/><br/>

<?php endif; ?>
<?php endif; ?>

<?php if (!empty($ad['image2c'])): 
$imagesize = check_imagesize($ad['image2c']); 
if ($imagesize['error'] != 1):?>
<img class="showad-pic2" width="<?php echo $imagesize['width'];?>" height="<?php echo $imagesize['height'];?>" src="<?php echo $ad['image2c']; ?>"  alt="<?php echo safe_output($headline);?>"/><br/><br/>
<?php else: ?>
<img class="showad-pic2" width="490" height="368" src="<?php echo $ad['image2c']; ?>" alt="<?php echo safe_output($headline);?>" /><br/><br/>

<?php endif; ?>
<?php endif;?>
<script type="text/javascript"><!--
google_ad_client = "ca-pub-9496451679614562";
/* Chivers large rectangle2 */
google_ad_slot = "9476574077";
google_ad_width = 336;
google_ad_height = 280;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

		</div>
    <div class="clr"></div>
  </div>
  <?php include ('footer.inc.php'); ?>
</body>
</html>
