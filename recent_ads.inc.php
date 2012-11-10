 <?php if(!empty($adcurrent)): 
	    
	   $row_count = 1;
	   
			 
     foreach($adcurrent as $adcur): 
	 // Calculate how long ago the Ad was posted
		 $date1 = $adcur['modified_at'];
		 $date2 = $adcur['created_at'];
		 $date = timepassed($date1, $date2);
		//Check if Ad has pictures 
		 if (!empty($adcur['image1c']) || !empty($adcur['image2c'])): $pic = 'pics'; else: $pic = ''; endif;
		 
		 $row_style = ($row_count % 2) ? 'ad' : 'ad-alternate';
		 
   ?>
		 <div class="<?php echo $row_style; ?>">
			  <h1><a href="showad.php?view=showad&set=<?php echo $set;?>&cname=<?php echo $cname; ?>&countryid=<?php echo $countryid;?>&stateid=<?php echo $stateid;?>&id=<?php echo $adcur['idc']; ?>"><?php echo safe_output($adcur['headlinec']); ?>....</a><?php echo '<span style="color:#00CC00">'.$pic.'</span>';?> &nbsp;<span> at <?php echo safe_output($adcur['cityc']).', '.safe_output($adcur['statec']).', '.safe_output($adcur['countryc']);?><br/> posted <?php echo $date;?></span></h1>
		  </div>
			
			<?php 
			    $row_count++;
				$link++;
			    endforeach; 
			 ?>
		  <?php else: echo '<h1>No Recent Ads Yet. Post your Ad.</h1>'; endif; ?>