
<?php
$sort = count($ads2);
$cut = count($ads);
If ($cut > 20): $slice= $cut / 20; $slice = ceil($slice); $slices = $slice + 1;?>
<div class="float_right"><?php
$page = 1; $mini = $min + 1; $maxi = $min + $sort;
echo '<span>Page '.$pagen.'/'.$slice.'&nbsp;&nbsp;&nbsp;&nbsp;'.$mini.'-'.$maxi.'&nbsp;&nbsp;&nbsp;&nbsp;</span>';
while ($page < $slices):?>
<span class="sbox"><a href="listad.php?view=listads&set=<?php echo $set; ?>&cname=<?php echo $cname;?>&countryid=<?php echo $countryid;?>&stateid=<?php echo $stateid;?>&min=<?php $mini=($page-1)*20; echo $mini;?>&max=20&pagen=<?php echo $page;?>"><?php echo $page; ?></a></span>&nbsp;&nbsp;
<?php $page++; endwhile; ?>
</div>
<?php endif;?>

