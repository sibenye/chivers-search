<?php

  function check_fields($params)
	{
		foreach($params as $key=> $value)
		{
			 if( !isset($key) || ($value == '') )
			 {
			    return false; 
			 }
		}
		return true;
	}


?>
