<?php
$fetch = @mysql_query("SELECT * FROM advert WHERE id = '$idvalue'");

if (!isset($fetch)) {
	echo'<p>Error performing query: ' . mysql_error() .
	'</p>';
  }
else {
$row = @mysql_fetch_array($fetch);

$headline = $row['headline'];
$desc1 = $row['desc1'];
$desc2 = $row['desc2'];
$desc3 = $row['desc3'];
$display = $row['display'];
$destination = $row['destination'];

echo '<b>'.$headline.'</b>';
echo '<br/>'.$desc1;
echo '<br/>'.$desc2;
echo '<br/>'.$desc3;
echo '<br/><a href="'.$destination.'">'.$display.'</a>'; 
}
?>