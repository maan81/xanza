<?php



/**
 * Get/extract the list of currencies from the config table
 * @param array -- array of crossreferenceing corrency symbos
 * @return array -- array of currency symbols
 */
function get_currency_lists($arr = []){
	$result = [];
	foreach($arr as $val){
		$tmp = str_split($val,3);
		$result[] = $tmp[0];
		$result[] = $tmp[1];
	}
	$result = array_values(array_unique($result));

	sort($result);

	return $result;
}




/**
 * Get the exchange rates
 * @param object -- to handle database
 * @param string -- the base currency
 * @param array -- array of target currencies
 * @param float -- the amount to convert from base
 * @param datetime -- the datetime to convert, along with '=', or '>=' .... 
 *                    if false, uses the latest datetime avilaible on db
 *                    ie, '>"2014-08-08"' , '="2014-08-10"' ...
 * @return array -- array currency to amount
 */
function get_exchange_rates($db,$base,$target=[],$amount=1,$datetime=false){
	// _print_r($base,false);	
	// _print_r($target,false);

	$sql = 'SELECT DISTINCT(Symbol), Name, Rate, Ask, Bid '.
		  'FROM `minute_table` '.
		  'WHERE (';

	$first = true;
	foreach($target as $val){

		$sql .= $first?'':'OR ';
		$sql .= 'Symbol LIKE "'.$base.$val.'" ';
		$first=false;
	}
	$sql .= ') ';

	// currently datetime is not used ... so not much of problem !!!
	if($datetime){
		_print_r('!!! Datetime used !!! Confirm its usage !!!',false);
		$sql .= ' AND Datetime '.$datetime.' ';
	}
	// currently datetime is not used ... so not much of problem !!!

	$sql .= 'ORDER BY Datetime DESC, Symbol ASC; ';

	// _print_r($sql,false);
	


	// SELECT DISTINCT(Symbol), Name, Rate, Ask, Bid
	// FROM `minute_table`
	// WHERE Symbol LIKE '%GBP%' 
	// OR Symbol LIKE '%EUR%'
	// ORDER BY Datetime DESC, Symbol ASC

	$db->connect();
	$res = mysqli_query($db->con,$sql);
	$data = array();
	if($res){
	while($val = mysqli_fetch_assoc($res)){
		$val['Rate'] = $val['Rate'] * $amount;
		$data[] = $val;
	}
	}
	$db->disconnect();

	// _print_r($data,false);

	return $data;
}



/**
 * Retrive & process data to be displayed in box
 */
function get_box_data($db,$table,$symbol,$earlier,$current){
	
	$yesterday = $db->get(	$table,
							false,
							$symbol,
							false,
							false,
							' AND Datetime 	>= "'.$earlier.'"'
						);

	$percent_change = ( ($current['Rate'] - $yesterday[0]['Closing']) / $yesterday[0]['Closing'] ) * 100 ;
	// _print_r($yesterday,false);
	// _print_r($current,false);

	return array_merge($yesterday[0],['Percent_change'=>$percent_change]);
}




/**
 * Get the current hour's detail .. for bar graph
 * @param object -- object to access & manipulate db data
 * @param string -- symbol
 * @return array -- array of data reqd. for the bar graph
 */
function get_current_hour_detail($db,$table,$symbol){

	$current_hour_detail = $db->get($table,'1_hour_earlier',$symbol);
	
	$tmp = array();
	
	for($i=0;$i<count($current_hour_detail);$i+=3){
		$tmp[] = $current_hour_detail[$i];
	}

	return $tmp;
}
