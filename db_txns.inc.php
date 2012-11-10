<?php
 
 /**
  * connects to database server and selects a database
  * @return bool (resource)
  */  
  function db_connect()
  {
		/*$connection = mysql_pconnect('db2842.perfora.net', 'dbo359000015', '14frances');*/ 
		$connection = mysql_pconnect('localhost', 'root', '14frances');
		if(!$connection)
    {
	    return false;
    }
    /*if(!mysql_select_db('db359000015'))*/
	 if(!mysql_select_db('advert'))
    {
	    return false;
    }
		
		return  $connection;
  }
	
	/**
  * This function takes the result from the database query and converts it into an associative array
  * @return array
  */  
	function db_result_to_array($result)
	{
	  $res_array = array();
		
		for ($count=0;  $row = mysql_fetch_array($result); $count++)
		{
		  $res_array[$count] = $row;
		}
		
		return $res_array;
	}
	

	/**
	 * selects adverts out of database with params supplied by user
	 * @param string $query_str
	 * @param string $main_category
	 * @return array
	 */
	function find_ads($query_str = null, $main_category = null, $countryid = null, $stateid = null)
	{
	  db_connect();
		
		$select =  "SELECT 
					idc,
                   headlinec, 
                   bodyc, 
				   main_category_namec,
				   sec_category_namec,
				   sub_category_namec,
                   modified_at,
				   created_at,
				   image1c,
				   image2c,
				   urlc,
                   countryc, 
                   statec, 
                   cityc ";
		$from = " FROM 
		           advert_tablec ";
							 
		$where = " WHERE
		            DATE_ADD( modified_at, INTERVAL 90 DAY ) > NOW() ";
							 			 
		$order = " ORDER BY  modified_at DESC";
							 
	  if (!empty($query_str))
	  {
	 	  	$select .= sprintf("
					               , match(headlinec,bodyc) 
                         against ('%s' IN BOOLEAN MODE) 
                         as relevance ",
												 mysql_real_escape_string($query_str)
					              );
				
			$where .= sprintf("
				                 AND match(headlinec,bodyc) against 
												('%s' IN BOOLEAN MODE) ", 
												mysql_real_escape_string($query_str)
												);	
			
			$order = " ORDER BY relevance DESC";
	
	 	}	
		
		
	  if (!empty($main_category))
	  {
						
			$where .= sprintf(" AND main_category_namec='%s'", 
							  mysql_real_escape_string($main_category));
	 	}	
		
		if (!empty($countryid) && empty($stateid))
	  {
			$from .= ", country_table";
			
			$where .= sprintf(" AND country_id='%s' AND countryc = country_name", mysql_real_escape_string($countryid));
	 	}	
		
		if (!empty($stateid) && !empty($countryid))
	  {
			$from .= ", state_table";
			
			$where .= sprintf(" AND state_table.state_id='%s' AND state_table.country_id='%s' AND statec = state_name",
			mysql_real_escape_string($stateid), mysql_real_escape_string($countryid));
	 	}	
		
		$query = $select.$from.$where.$order;

		$result = mysql_query($query);
		
		$number_of_results = mysql_num_rows($result);
		
		if($number_of_results == 0)
	  {
			return false;
		}
		
		$result = db_result_to_array($result);
		
		return $result;
		
	}


/**
	 * selects adverts out of database with params supplied by user but this time includes a min and max limit to enable page break
	 * @param string $query_str
	 * @param string $main_category
	 * @return array
	 */
	function find_ads2($query_str = null, $main_category = null, $countryid = null, $stateid = null, $min, $max)
	{
	  db_connect();
		
		$select =  "SELECT 
					idc,
                   headlinec, 
                   bodyc, 
				   main_category_namec,
				   sec_category_namec,
				   sub_category_namec,
                   modified_at,
				   created_at,
				   image1c,
				   image2c,
				   urlc,
                   countryc, 
                   statec, 
                   cityc ";
		$from = " FROM 
		           advert_tablec ";
							 
		$where = " WHERE
		            DATE_ADD( modified_at, INTERVAL 90 DAY ) > NOW() ";
							 			 
		$order = " ORDER BY  modified_at DESC";
		
		$limit = " LIMIT $min, $max";
							 
	  if (!empty($query_str))
	  {
	 	  	$select .= sprintf("
					               , match(headlinec,bodyc) 
                         against ('%s' IN BOOLEAN MODE) 
                         as relevance ",
												 mysql_real_escape_string($query_str)
					              );
				
			$where .= sprintf("
				                 AND match(headlinec,bodyc) against 
												('%s' IN BOOLEAN MODE) ", 
												mysql_real_escape_string($query_str)
												);	
			
			$order = " ORDER BY relevance DESC";
	
	 	}	
		
		
	  if (!empty($main_category))
	  {
						
			$where .= sprintf(" AND main_category_namec='%s'", 
							  mysql_real_escape_string($main_category));
	 	}	
		
		if (!empty($countryid) && empty($stateid))
	  {
			$from .= ", country_table";
			
			$where .= sprintf(" AND country_id='%s' AND countryc = country_name", mysql_real_escape_string($countryid));
	 	}	
		
		if (!empty($stateid) && !empty($countryid))
	  {
			$from .= ", state_table";
			
			$where .= sprintf(" AND state_table.state_id='%s' AND state_table.country_id='%s' AND statec = state_name",
			mysql_real_escape_string($stateid), mysql_real_escape_string($countryid));
	 	}	
		
		$query = $select.$from.$where.$order.$limit;

		$result = mysql_query($query);
		
		$number_of_results = mysql_num_rows($result);
		
		if($number_of_results == 0)
	  {
			return false;
		}
		
		$result = db_result_to_array($result);
		
		return $result;
		
	}

	
		
 /**
 * selects current adverts that are not more than 10days old
 * 
 * @return array
 */
	function find_adcurrent()
	{
	   db_connect();
		
		$query =  "SELECT 
						idc,
                         headlinec, 
                         modified_at,
						 created_at,
                         main_category_namec, 
                         sec_category_namec,
						 sub_category_namec,
						 image1c,
						 image2c,
						 urlc,
						 countryc,
						 statec,
						 cityc
                      				FROM 
							          advert_tablec
							       WHERE 
							         DATE_ADD( modified_at, INTERVAL 10 DAY ) > NOW() 
								ORDER BY  modified_at DESC";	 
									

		$result = mysql_query($query);
		
	  $result = db_result_to_array($result);
		
		return $result;
	
	}
	
	
	
 /**
 * selects a single ad to view in full
 * @param type variable
 * @return type
 */
	function select_ad($id)
	{
	   db_connect();
		
		$query = sprintf("SELECT 
					idc,
                   headlinec, 
                   bodyc, 
				   main_category_namec,
				   sec_category_namec,
				   sub_category_namec,
                   modified_at,
				   created_at,
				   image1c,
				   image2c,
				   urlc,
                   countryc, 
                   statec, 
                   cityc 
				   		FROM	advert_tablec
							WHERE idc='%s'", mysql_real_escape_string($id));

		$result = mysql_query($query);
		
		$result = mysql_fetch_array($result);
		
		return $result;
	
	}
	
	
	
 /**
 * selects advert by email
 * @param  $email
 * @return array
 */
	function find_adsowner($email)
	{
	   db_connect();
		
		$query =  sprintf("SELECT 
						  idc,
                        headlinec, 
							modified_at
							       FROM 
							         advert_tablec
							       WHERE 
							         emailc = '%s'", mysql_real_escape_string($email)
									);

		$result = mysql_query($query);
		
	  $result = mysql_fetch_array($result);
		
		return $result;
	
	}	


 /**
 * selects list of ads by category
 * @param type variable
 * @return type
 */
	function select_ads($cname)
	{
	   db_connect();
		
		$query =  sprintf("SELECT 
					idc,
                   headlinec, 
                   bodyc, 
				   main_category_namec,
				   sec_category_namec,
				   sub_category_namec,
                   modified_at,
				   created_at,
				   image1c,
				   image2c,
				   urlc,
				   countryc, 
                   statec,
				   cityc
                   			FROM advert_tablec
							WHERE main_category_namec='%s'
							AND DATE_ADD( modified_at, INTERVAL 30 DAY ) > NOW() ", mysql_real_escape_string($cname));
							
		$result = mysql_query($query);
		
		$result = db_result_to_array($result);
		
		return $result;
	
	}

/**
 * selects  main categories .
 * @param type variable
 * @return type
 */
	function find_maincategories()
	{
	   db_connect();
		
		$query =  "SELECT 
                  main_category_name, 
					main_category_id
						FROM
						main_category
						WHERE
							main_category_id > 0
							 ORDER BY
								    main_category_name ASC
									";

		$result = mysql_query($query);
		
		$result = db_result_to_array($result);
		
		return $result;
	
	}
	

/**
 * selects  secondary categories .
 * @param type variable
 * @return type
 */
	function find_seccategories($id)
	{
	   db_connect();
		
		$query =  sprintf("SELECT 
                  sec_category_name, 
					sec_category_id
						FROM
						sec_category
						WHERE
							main_category_id = '%s'
							 ORDER BY
								    sec_category_name ASC", mysql_real_escape_string($id));

		$result = mysql_query($query);
		
		$result = db_result_to_array($result);
		
		return $result;
	
	}
	
	
/**
 * selects  sub categories .
 * @param type variable
 * @return type
 */
	function find_subcategories($id)
	{
	   db_connect();
		
		$query =  sprintf("SELECT 
                  sub_category_name, 
					sub_category_id
						FROM
						sub_category
						WHERE
							sec_category_id = '%s'
							 ORDER BY
								    sub_category_name ASC", mysql_real_escape_string($id));

		$result = mysql_query($query);
		
		$result = db_result_to_array($result);
		
		return $result;
	
	}
	

/** 
	*Selects Country list
	* @param type variable
 * @return type
 */
 
 function find_countries()
	{
	   db_connect();
		
		$query =  "SELECT 
                  country_name, 
					country_id
						FROM
						country_table
							WHERE country_id > 0
						 	";

		$result = mysql_query($query);
		
		$result = db_result_to_array($result);
		
		return $result;
	
	}
 
 /**
 * selects  list of states .
 * @param type variable
 * @return type
 */
	function find_states($id)
	{
	   db_connect();
		
		$query =  sprintf("SELECT 
                  state_name, 
					state_id
						FROM
						state_table
						WHERE
							country_id = '%s'
							 ORDER BY
								    state_name ASC", mysql_real_escape_string($id));

		$result = mysql_query($query);
		
		$result = db_result_to_array($result);
		
		return $result;
	
	}

/*
  *Selects a single main category
  * @param  type variable
 * @return array
 */
function single_maincategory($id)
	{
	   db_connect();
		
		$query = sprintf("SELECT
					main_category_name,
					main_category_id
					FROM
					main_category
					WHERE
					main_category_id = '%s'", mysql_real_escape_string($id));
	
	$result = mysql_query($query);
		
	  $result = mysql_fetch_array($result);
		
		return $result;
	}

/*
  *Selects a single secondary category
  * @param  $id
 * @return array
 */
	function single_seccategory($id)
{
	   db_connect();
		
		$query = sprintf("SELECT
					sec_category_name,
					sec_category_id
					FROM
					sec_category
					WHERE
					sec_category_id = '%s'", mysql_real_escape_string($id));
					
	$result = mysql_query($query);
		
	  $result = mysql_fetch_array($result);
		
		return $result;
	}

/**
  *Selects a single sub category
  * @param  $id
 * @return array
 */
	function single_subcategory($id)
{
	   db_connect();
		
		$query = sprintf("SELECT
					sub_category_name,
					sub_category_id
					FROM
					sub_category
					WHERE
					sub_category_id = '%s'", mysql_real_escape_string($id));
					
		$result = mysql_query($query);
		
	  $result = mysql_fetch_array($result);
		
		return $result;
	}

/**
  *Selects a single country
  * @param  $id
 * @return array
 */
	function single_country($id)
{
	   db_connect();
		
		$query = sprintf("SELECT
					country_name,
					country_id
					FROM
					country_table
					WHERE
					country_id = '%s'", mysql_real_escape_string($id));
					
		$result = mysql_query($query);
		
	  $result = mysql_fetch_array($result);
		
		return $result;
	}

/**
  *Selects a single state
  * @param  $id
 * @return array
 */
	function single_state($id)
{
	   db_connect();
		
		$query = sprintf("SELECT
					state_name,
					state_id
					FROM
					state_table
					WHERE
					state_id = '%s'", mysql_real_escape_string($id));
					
		$result = mysql_query($query);
		
	  $result = mysql_fetch_array($result);
		
		return $result;
	}
	
/**
 * inserts new ads into database
 * @param array $params
 * @return bool
 */
	function record_ads($params)
	{
	   db_connect();
		
		$query =  sprintf("INSERT INTO advert_tablec SET 
			                    main_category_namec='%s',
								sec_category_namec='%s',
								sub_category_namec='%s',
								headlinec='%s',
								bodyc='%s',
								image1c='%s',
								image2c= '%s',
								countryc='%s',
								statec='%s',
								cityc='%s',
								urlc='%s',
								modified_at=NOW(),
								created_at=NOW()
									",   mysql_real_escape_string($params['main_category_name']),
										 mysql_real_escape_string($params['sec_category_name']),
										 mysql_real_escape_string($params['sub_category_name']),
									   mysql_real_escape_string($params['headline']),
										 mysql_real_escape_string($params['body']),
										 mysql_real_escape_string($params['image1']),
										 mysql_real_escape_string($params['image2']),
										 mysql_real_escape_string($params['country_name']),
										 mysql_real_escape_string($params['state_name']),
										 mysql_real_escape_string($params['city_name']),
										  mysql_real_escape_string($params['url'])
					
									);

		$result = mysql_query($query);
		if(!$result)
		{
			 return false;
		}
		return true;
	}
?>

