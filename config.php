<?php

// strips out escape characters
function stripslashes_deep($value)
{
  $value = is_array($value) ? array_map('stripslashes_deep', $value) : stripslashes($value);
	return $value;
}

if ( get_magic_quotes_gpc() ) 
{
   $_POST   = stripslashes_deep($_POST);
   $_GET    = stripslashes_deep($_GET);
} 


?>
