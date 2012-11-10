<?php 
$head = $advert['headline'];
$bod = $advert['body'];

$headlen = strlen($head);
$bodlen = strlen($bod);

if ($headlen < 20): $errorlen1 = 1; else: $errorlen1 = 0; endif;
if ($bodlen < 70): $errorlen2 = 1; else: $errorlen2 = 0; endif;
if ($bodlen > 1000): $errorlen3 = 1; else: $errorlen3 = 0; endif;

?>