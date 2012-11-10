<!--Transfer the values of the posted fields into variables -->
<?php
$main_category_id = $_POST['mcid'];
$sec_category_id = $_POST['seccid'];
$sub_category_id = $_POST['subcid'];
$country_id = $_POST['country_id'];
$state_id = $_POST['state_id'];
$advert = $_POST['advert'];
$image1 = $_FILES['image1']['name'];
$image2 = $_FILES['image2']['name'];
?>
<!-- Check if the main category has already been selected, if not display the form to select main category -->
<?php if (!isset($main_category_id)): ?>
	<form name="form1" action="adform.php?view=adform" method="post">	
    <label>Select the Main Category where your Ad belongs</label><br/><br/>
<select name="mcid" size="10" >
<?php foreach($show_maincategories as $list_mcat): ?>
<option value="<?php echo safe_output($list_mcat['main_category_id']); ?>" name="mcid" OnClick="document.form1.submit.focus();"><?php echo safe_output($list_mcat['main_category_name']); ?></option>
<?php endforeach; ?>	
</select><br/><br/>
<div><input name="submit" type="submit" value="OK" /></div>
	</form>

<!-- Check if the secondary category has already been selected, if not check the sec category table to see if their are secondary categories under the initially selected main category, if there is then display the form to select secondary category, if there is not display the form to select country -->
<?php else :?>
	<?php if (!isset($sec_category_id)) :?>
			<?php if (!empty($list_seccategories)): ?>
				<form name="form2" action="adform.php?view=adform" method="post">	
    			<label>Select the Secondary Category where your Ad belongs</label><br/><br/>
                <input type="hidden" value="<?php echo safe_output($main_category_id); ?>" name="mcid" />
				<select name="seccid" size="10">
				<?php foreach($list_seccategories as $list_seccat): ?>
				<option value="<?php echo safe_output($list_seccat['sec_category_id']); ?>" name="seccid" OnClick="document.form2.submit.focus();"><?php echo safe_output($list_seccat['sec_category_name']);?></option>
						<?php endforeach; ?>	
				</select><br/><br/>
                <div><input name="submit" type="submit" value="OK" /></div>
                </form>
                <?php else: ?>
			
            	<form name="form4" action="adform.php?view=adform" method="post">
                <label>Please Select the Country where the product/service/business that you want to advertises is located</label><br/><br/>
                <input type="hidden" value="<?php echo safe_output($main_category_id); ?>" name="mcid" />
                <input type="hidden" value="0" name="seccid" />
                <input type="hidden" value="0" name="subcid" />

                <select name="country_id" size="10">
						<?php foreach($list_countries as $list_country): ?>
						<option value="<?php echo safe_output($list_country['country_id']); ?>" name="country_id" OnClick="document.form4.submit.focus();"><?php echo safe_output($list_country['country_name']); ?></option>
						<?php endforeach; ?>	
				</select><br/><br/>
                <div><input name="submit" type="submit" value="OK" /></div>
                </form>
               <?php endif; ?>
               
            
<!-- Check if the sub category has already been selected, if not check the sub category table to see if their are sub categories under the initially selected secondary category, if there is then display the form to select sub category, if there is not display the form to select country -->
    
    <?php else: ?>
    	<?php if (!isset($sub_category_id)) :?>
        		<?php if (!empty($list_subcategories)): ?>
            		<form name="form3" action="adform.php?view=adform" method="post">	
    				<label>Select the Sub Category where your Ad belongs</label><br/><br/>
                	<input type="hidden" value="<?php echo safe_output($main_category_id); ?>" name="mcid" />
                	<input type="hidden" value="<?php echo safe_output($sec_category_id); ?>" name="seccid" />
					<select name="subcid" size="10">
						<?php foreach($list_subcategories as $list_subcat): ?>
						<option value="<?php echo safe_output($list_subcat['sub_category_id']); ?>" name="subcid" OnClick="document.form3.submit.focus();"><?php echo safe_output($list_subcat['sub_category_name']); ?></option>
						<?php endforeach; ?>	
					</select><br/><br/>
                    <div><input name="submit" type="submit" value="OK" /></div>
                    </form>
                 <?php else: ?>
			
            		<form name="form4" action="adform.php?view=adform" method="post">
                	<label>Please Select the Country where the product/service/business that you want to advertise is located</label><br/><br/>
                	<input type="hidden" value="<?php echo safe_output($main_category_id); ?>" name="mcid" />
               	 	<input type="hidden" value="<?php echo safe_output($sec_category_id); ?>" name="seccid" />
                	<input type="hidden" value="0" name="subcid" />
                    
                   	<select name="country_id" size="10">
						<?php foreach($list_countries as $list_country): ?>
						<option value="<?php echo $list_country['country_id'] ?>" name="country_id" OnClick="document.form4.submit.focus();"><?php echo safe_output($list_country['country_name']); ?></option>
						<?php endforeach;?>	
				</select><br/><br/>
                <div><input name="submit" type="submit" value="OK" /></div>
                </form>
                <?php endif; ?>
                            
                
<!-- Check if country has been selected, if not display form to select country -->
     
       <?php else: ?>
            	<?php if (!isset($country_id)) : ?>
                	<form name="form4" action="adform.php?view=adform" method="post">
                	<label>Please Select the Country where the product/service/business that you want to advertise is located</label><br/><br/>
					<input type="hidden" value="<?php echo safe_output($main_category_id); ?>" name="mcid" />
               	 	<input type="hidden" value="<?php echo safe_output($sec_category_id); ?>" name="seccid" />
                	<input type="hidden" value="<?php echo safe_output($sub_category_id); ?>" name="subcid" />
                    
                    <select name="country_id" size="10">
						<?php foreach($list_countries as $list_country): ?>
						<option value="<?php echo $list_country['country_id']; ?>" name="country_id" OnClick="document.form4.submit.focus();"><?php echo safe_output($list_country['country_name']); ?></option>
						<?php endforeach; ?>	
					</select><br/><br/>
                    <div><input name="submit" type="submit" value="OK" /></div>
                    </form>
 
 <!-- Check if state has been selected, if not display form to select state-->
                   
            	<?php else: ?>
					<?php if (!isset($state_id)):?>
                        <form name="form5" action="adform.php?view=adform" method="post">
                        <label>Please Select the State where the product/service/business that you want to advertise is located</label><br/><br/>
                        <input type="hidden" value="<?php echo safe_output($main_category_id); ?>" name="mcid" />
                        <input type="hidden" value="<?php echo safe_output($sec_category_id); ?>" name="seccid" />
                        <input type="hidden" value="<?php echo safe_output($sub_category_id); ?>" name="subcid" />
                        <input type="hidden" value="<?php echo safe_output($country_id); ?>" name="country_id" />
                        
                        <select name="state_id" size="10">
                            <?php foreach($list_states as $list_state): ?>
                            <option value="<?php echo safe_output($list_state['state_id']); ?>" name="state_id" OnClick="document.form5.submit.focus();"><?php echo safe_output($list_state['state_name']); ?></option>;
                            <?php endforeach; ?>	
                        </select><br/><br/>
                        <div><input name="submit" type="submit" value="OK" /></div>
                        </form>

 <!-- Check if city has been selected, if not display form to enter city-->
                        
                        <?php else:?>
                        <?php if (empty($advert['city_name'])):?>
                        <form name="form6" action="adform.php?view=adform" method="post">
                        <label>Please what City?</label><br/><br/>
                        <input type="hidden" value="<?php echo safe_output($main_category_id); ?>" name="mcid" />
                        <input type="hidden" value="<?php echo safe_output($sec_category_id); ?>" name="seccid" />
                        <input type="hidden" value="<?php echo safe_output($sub_category_id); ?>" name="subcid" />
                        <input type="hidden" value="<?php echo safe_output($country_id); ?>" name="country_id" />
                        <input type="hidden" value="<?php echo safe_output($state_id); ?>" name="state_id" />
                        <input type="text" size="20" maxlength="20" name="advert[city_name]" tabindex="2" />
                        <input type="submit" value="OK" />
						</form>
                        <!-- This script is used to set focus on the text input in the form above-->
                        <script type="text/javascript" language="JavaScript">
						document.forms['form6'].elements['advert[city_name]'].focus();
						</script>
                        <?php else:?>
							
<!--Check if the contentform has been submitted by checking if the posted values of the required fields are not empty, if they are not then validate the image upload and insert field values to database, if posted value of required fields are empty then display the content form -->							
                        	<?php

if (!empty ($advert['headline']) && !empty ($advert['body']))
	: include 'verify.inc.php';
if (!$errorv)
	: include 'check_length.inc.php';
if (!$errorlen1 && !$errorlen2 && !$errorlen3)
	: include 'image_upload.inc.php';

if (!$errors1_1 && !$errors1_2 && !$errors1_3)
	: $advert['image1'] = $newname1;
$advert['image2'] = $newname2;

//include 'txt2image.inc.php';
//if (!$errorb):
//$advert['body'] = $file_name;

$insert_ads = record_ads($advert);

if (isset ($insert_ads)) {
	echo '<p><b>Your Ad has been added</b>.<em> It will expire after 90 days</em></p>';
	echo '<p>Go to <a href="index.php?min=0&max=20&pagen=1" target="_self">Home page</a></p>';

} else {
	echo '<p>Error adding submitted Ad: ' .
	mysql_error() . '</p>';
	echo '<p>Try again</p>';
	include 'form_content.inc.php';
}

/*else:
		$advert = $_POST['advert'];
	 echo '<strong style="color:#CC0000;">Submission was unsuccessfull, please try again!</strong><br/><br/>';
	 include 'form_content.inc.php';
	endif;*/

else
	: $advert = $_POST['advert'];

if ($errors1_1)
	: echo '<strong style="color:#CC0000;">Unknown Picture File extension!</strong><br/><br/>';
endif;
if ($errors1_2)
	: echo '<strong style="color:#CC0000;">You have exceeded the size limit!</strong><br/><br/>';
endif;
if ($errors1_3)
	: echo '<strong style="color:#CC0000;">Coping of Picture was unsuccessfull!</strong><br/><br/>';
endif;

include 'form_content.inc.php';
endif;

else
	: $advert = $_POST['advert'];
if ($errorlen1)
	: echo '<strong style="color:#CC0000;">Your Headline must be at least 20 xters long! Do not forget to Upload pic again if you did that before.</strong><br/><br/>';
endif;
if ($errorlen2)
	: echo '<strong style="color:#CC0000;">Your Body text must be at least 70 xters long! Do not forget to Upload pic again if you did that before.</strong><br/><br/>';
endif;
if ($errorlen3)
	: echo '<strong style="color:#CC0000;">Your Body text exceeded the 1000 xters limit! Do not forget to Upload pic again if you did that before.</strong><br/><br/>';
endif;
include 'form_content.inc.php';
endif;
else
	: $advert = $_POST['advert'];
echo '<strong style="color:#CC0000;">Fill in the correct keyword! and Do not forget to Upload your pic again if you did that before.</strong>';
include 'form_content.inc.php';
endif;
?>
              
              <?php

else
	: $advert['main_category_name'] = $one_maincategory['main_category_name'];
$advert['sec_category_name'] = $one_seccategory['sec_category_name'];
$advert['sub_category_name'] = $one_subcategory['sub_category_name'];
$advert['country_name'] = $one_country['country_name'];
$advert['state_name'] = $one_state['state_name'];
?>
                            
   <?php if (isset($_POST['submit'])): echo '<strong style="color:#CC0000;">Please fill in the required fields</strong>'; endif; ?>
   <?php include 'form_content.inc.php'; ?>
   <?php endif; ?>
                     <?php endif;?>
            	<?php endif; ?>
           <?php endif;?>
       <?php endif; ?>
   <?php endif; ?>
<?php endif; ?>