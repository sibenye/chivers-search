<?php if ($set == 1):?>
<p><span><a href="index.php?min=0&max=20&pagen=1" target="_self">Recent Ads</a>&nbsp;>>&nbsp;</span>
<span style="font-size:11px;"><a href="listads.php?view=listads&set=1&cname=<?php echo $cname; ?>&min=0&max=20&pagen=1"><?php echo $cname;?></a>&nbsp;>&nbsp;</span>
<span style="font-size:11px;"><a href="listads.php?view=listads&set=1&cname=<?php echo $cname; ?>&countryid=<?php echo $countryid;?>&min=0&max=20&pagen=1"><?php echo $one_country['country_name'];?></a>&nbsp;>&nbsp;</span>
<span style="font-size:11px;"><?php echo $one_state['state_name'];?></span></p>
<?php else:?>

<?php if ($set == 2):?>
<p><span style="font-size:11px;"><a href="index.php?min=0&max=20&pagen=1" target="_self">Recent Ads</a>&nbsp;>>&nbsp;</span>
<span style="font-size:11px;"><a href="listads.php?view=listads&set=2&countryid=<?php echo $countryid;?>&min=0&max=20&pagen=1"><?php echo $one_country['country_name'];?></a>&nbsp;>&nbsp;</span>
<span style="font-size:11px;"><a href="listads.php?view=listads&set=2&countryid=<?php echo $countryid;?>&stateid=<?php echo $stateid;?>&min=0&max=20&pagen=1"><?php echo $one_state['state_name'];?></a>&nbsp;>&nbsp;</span>
<span style="font-size:11px;"><?php echo $cname;?></span></p>
<?php else:?>
 
<span style="font-size:11px;"><a href="index.php?min=0&max=20&pagen=1" target="_self">Recent Posts</a>&nbsp;>>&nbsp;</span>
<?php endif; endif; ?>