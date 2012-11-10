<?php
//connect to mysql database server
$dbconnect = @mysql_connect('db2842.perfora.net', 'dbo359000015', '14frances');
if (!$dbconnect) {
echo'<p>Unable to connect to the ' .
'database server at this time.</p>';
}
// Select the advert database
if (!@mysql_select_db('db359000015')) {
echo'<p>Unable to locate the advert ' .
'database at this time.</p>';
}
?>