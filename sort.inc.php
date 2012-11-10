<?php if ((!empty($stateid)) && (!empty($countryid)) && (!empty($cname)) && ($set ==1 || $set ==2) && (empty($q))): 

	echo '<h1 class="sbox"><strong>'.$cname.'</strong> Category Ads In <strong>'.$one_state['state_name'].'</strong>, <strong>'.$one_country['country_name'].'</strong></h1>'; ?>
<?php else: 

if ((empty($stateid)) && (!empty($countryid)) && (!empty($cname)) && ($set == 1) && (empty($q))): ?>

	
    <h1 class="sbox"><?php echo '<strong>'.$cname.'</strong> Category Ads In <strong>'.$one_country['country_name'].'</strong>'; ?></h1>
    <?php $cot = 0; ?>
    <table><tbody><tr>
    <?php foreach($list_states as $list_state): ?><td>
    <a href="listads.php?view=listads&set=1&cname=<?php echo $cname; ?>&countryid=<?php echo $countryid; ?>&stateid=<?php echo $list_state['state_id']; ?>&min=0&max=20&pagen=1"><?php echo safe_output($list_state['state_name']); ?></a></td>
    <?php $cot++; 
	if ($cot == 8): $cot = 0;?>
    </tr><tr>
    <?php endif; 
	endforeach; ?>
    </tr></tbody></table>
    
<?php else:

if ((empty($stateid)) && (empty($countryid)) && (!empty($cname)) && ($set == 1) && (empty($q))): ?>

	
    <h1 class="sbox"><?php echo 'You are viewing all the Ads in the <strong>'.$cname.'</strong> Category';?></h1>
    <p><em>Select the location of the Ad you are searching for</em></p>
    <ul><?php foreach($list_countries as $list_country): ?>
    <li class="sbox"><a href="listads.php?view=listads&set=1&cname=<?php echo $cname; ?>&countryid=<?php echo safe_output($list_country['country_id']); ?>&min=0&max=20&pagen=1"><?php echo safe_output($list_country['country_name']); ?></a></li>
    <?php endforeach; ?></ul>
	
<?php else:

if ((empty($stateid)) && (!empty($countryid)) && (empty($cname)) && ($set == 2) && (empty($q))): ?>

<h1 class="sbox"><?php echo 'You are viewing all the Ads in <strong>'.$one_country['country_name'].'</strong>';?></h1>
 <?php $cot = 0; ?>
    <table><tbody><tr>
    <?php foreach($list_states as $list_state): ?><td>
    <a href="listads.php?view=listads&set=2&countryid=<?php echo $countryid; ?>&stateid=<?php echo $list_state['state_id']; ?>&min=0&max=20&pagen=1"><?php echo safe_output($list_state['state_name']); ?></a></td>
    <?php $cot++; 
	if ($cot == 8): $cot = 0;?>
    </tr><tr>
    <?php endif; 
	endforeach; ?>
    </tr></tbody></table>

<?php else:
if ((!empty($stateid)) && (!empty($countryid)) && (empty($cname)) && ($set == 2) && (empty($q))): ?>

<h1 class="sbox"><?php echo 'You are viewing all the Ads in <strong>'.$one_state['state_name'].', '.$one_country['country_name'].'</strong>';?></h1>
<p><em>Select the Category</em></p>
<ul><?php foreach($search_maincategories as $search_mcat): ?>
 <li class="sbox"><a href="listads.php?view=listads&set=2&countryid=<?php echo $countryid; ?>&stateid=<?php echo $stateid; ?>&cname=<?php echo $search_mcat['main_category_name'];?>&min=0&max=20&pagen=1"><?php echo $search_mcat['main_category_name'];?></a></li>
 <?php endforeach; ?></ul>
 
<?php else:
if ((empty($stateid)) && (!empty($countryid)) && (!empty($cname)) && ($set == 2) && (empty($q))): ?>

<span class="sbox"><?php echo '<strong>'.$cname.'</strong> Category Ads In <strong>'.$one_country['country_name'].'</strong>'; ?></span><br/><br/>
    <?php $cot = 0; ?>
    <table><tbody><tr>
    <?php foreach($list_states as $list_state): ?><td>
    <a href="listads.php?view=listads&set=1&cname=<?php echo $cname; ?>&countryid=<?php echo $countryid; ?>&stateid=<?php echo $list_state['state_id']; ?>&min=0&max=20&pagen=1"><?php echo safe_output($list_state['state_name']); ?></a></td>
    <?php $cot++; 
	if ($cot == 8): $cot = 0;?>
    </tr><tr>
    <?php endif; 
	endforeach; ?>
    </tr></tbody></table>
    
<?php else:
if (!empty($q) || empty($q)): ?>
<div class="float_left">
        <h2 class="light">Classified Ads For The Nigerian Market</h2>
        </div>
        <div class="clr"></div>
        <p>Categories</p>
       <ul> <?php foreach($search_maincategories as $search_mcat): ?>
   <li class="sbox"><a href="listads.php?view=listads&set=1&cname=<?php echo $search_mcat['main_category_name'];?>&min=0&max=20&pagen=1"><?php echo $search_mcat['main_category_name'];?></a></li> <?php endforeach; ?></ul>
	<div class="clr"></div>
    <h1 class="sbox">Search result for <strong>'<?php echo $q; ?>'</strong></h1>

<?php endif;
		endif;
			endif;
				endif; 
					endif; 
						endif;
							endif;?>

    