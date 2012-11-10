<!-- this is the content form where the user inputs his headline and description of Ad and also pictures if he has any -->
<fieldset><h2>Create Your Ad here.</h2>
<form name="form7" action="adform.php?view=adform" enctype="multipart/form-data" method="post">


	<h1><label for="main-category"><b>Main Category:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><?php echo $advert['main_category_name']; ?><input type="hidden" name="advert[main_category_name]" value="<?php echo $advert['main_category_name']; ?>"><input type="hidden" value="<?php echo $main_category_id; ?>" name="mcid" /></label></h1>
	
	<h1><label for="sec-category"><b>Secondary Category:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><?php echo $advert['sec_category_name']; ?><input type="hidden" name="advert[sec_category_name]" value="<?php echo $advert['sec_category_name']; ?>"> <input type="hidden" value="<?php echo $sec_category_id; ?>" name="seccid" /></label></h1>

	<h1><label for="sub-category"><b>Sub Category:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><?php echo $advert['sub_category_name']; ?><input type="hidden" name="advert[sub_category_name]" value="<?php echo $advert['sub_category_name']; ?>"><input type="hidden" value="<?php echo $sub_category_id; ?>" name="subcid" /></label></h1>
<p>&nbsp;</p>

	<h1><label for="country"><b>Country:&nbsp;&nbsp;</b><?php echo $advert['country_name']; ?><input type="hidden" name="advert[country_name]" readonly value="<?php echo $advert['country_name']; ?>" /> <input type="hidden" value="<?php echo $country_id; ?>" name="country_id" /></label>&nbsp;&nbsp;&nbsp;
    
    <label for="state"><b>State:&nbsp;&nbsp;</b><?php echo $advert['state_name']; ?><input type="hidden" name="advert[state_name]" value="<?php echo $advert['state_name']; ?>" /> <input type="hidden" value="<?php echo $state_id; ?>" name="state_id" /></label>&nbsp;&nbsp;&nbsp;
   
    <label for="city"><b>LGA/City:&nbsp;&nbsp;</b><?php echo safe_output($advert['city_name']); ?><input type="hidden" name="advert[city_name]" value="<?php echo safe_output($advert['city_name']); ?>" /></label></h1>
<p>&nbsp;</p>

	<h1><label for="headline">Headline:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	<input type="text" size="70" maxlength="80" name="advert[headline]" value="<?php echo safe_output($advert['headline']); ?>"/><em>* (80 xters max)</em></label></h1>
    <p>&nbsp;</p>
     
     <label><em style="color:#F00; font-size:11px">(please don't start from http://, start from www)</em></label>
	<h1><label for="url">URL:&nbsp;&nbsp;&nbsp;&nbsp;
	http:// <input type="text" size="35" maxlength="80" name="advert[url]" value="<?php echo safe_output($advert['url']); ?>"/><em> Enter the website link to your Ad, if any.</em></label></h1>
    <p>&nbsp;</p>


<h1><label for="body">Body:<em>Please describe your Ad here; Clearity is important and don't forget to include your contact.</em>* (1000 xters max)</label></h1>

<textarea name="advert[body]" rows="10" cols="80" wrap="hard" style="margin-right:20px;"><?php echo safe_output($advert['body']); ?></textarea><br/><br/>

<h1><label for="image1">Picture1:&nbsp;<input type="file" name="image1" size="20" maxlength="100" value="<?php echo $image1;?>"/>&nbsp;&nbsp;<em>jpeg, png, & gif only. Not more than 1MB</em></label></h1>
<h1><label for="image2">Picture2:&nbsp;<input type="file" name="image2" size="20" maxlength="100" value="<?php echo $image2;?>"/>&nbsp;&nbsp;<em>jpeg, png, & gif only. Not more than 1MB</em></label></h1>

<?php $checksum1 = randgen();?>
<h1>Type in the Keyword</h1>
<?php echo '<strong style="color:#00CC00; font-size:15px;">'.$checksum1.'</strong>'; ?><br/>
<input type="hidden" name="checksum1" value="<?php echo $checksum1;?>"/>
<input type="text" size="6" maxlength="6" name="checksum2"/>&nbsp;&nbsp;<h1><span>* Case Sensitive</span></h1>

<?php
/* 
require_once('recaptchalib.php');
 $publickey = "6LdC8cISAAAAAPaabsDprxhbQ592T1Rg7NffJD45"; // you got this from the reCaptcha signup page
 echo recaptcha_get_html($publickey);*/
?>


  	
<p>&nbsp;</p>  
<h1>Advertising Policy<br/><span>Please read the advertising policies described below and make sure that your Ads comply.</span></h1>
<p>&nbsp;</p>

<div><textarea name="ad_agreement" readonly rows="5" cols="60" style="margin-right:20px;">
Your intended headline must fit within the limits.
Ads for the promotion of the sale of paper writing services or test taking services is prohibited.
Ads that promote pornograghic websites is prohibited.
Ads for the promotion of escort services, prostitution, or related content is prohibited.
Ad text advocating against any organization, person, or group of people is not permitted. 
The promotion of self-harm and violence against people or animals is prohibited.
The sale or promotion of counterfeit goods is prohibited.
Ads for the promotion of drugs, drug paraphernalia, and aids to pass drug tests is prohibited.
Ads for the promotion of fake documents such as fake IDs, passports, social security cards, immigration papers, diplomas e.t.c. is prohibited.
Ads for the promotion of hacking and tools that aid in copyright infringement is prohibited.
Ads for the promotion of websites that make unrealistic claims, or otherwise extremely misleading to users is prohibited.
If your Ad contains a URL it must link to a working webpage with content that's relevant to your ad. 
Violation of any of these policies will result in the disapproval and removal of your Ad without notification.

</textarea></div>
<div style="float:right;"><input name="submit" type="submit" value="SUBMIT" /></div>

<p>* required fields</p>
</form></fieldset>
<!-- This script is used to set focus on the text input in the form above-->
<script type="text/javascript" language="JavaScript">
document.forms['form7'].elements['advert[headline]'].focus();
</script>