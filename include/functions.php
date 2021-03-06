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
function get_exchange_rates($db,$table,$base,$target=[],$amount=1,$datetime=false){
	// _print_r($base,false);	
	// _print_r($target,false);


	// SELECT * FROM minute_table 
	// WHERE 1 
	// AND ( 
	// 	Symbol = "AUDAUD" OR 
	// 	Symbol = "AUDCAD" OR 
	// 	Symbol = "AUDCHF" OR 
	// 	Symbol = "AUDEUR" OR 
	// 	Symbol = "AUDGBP" OR 
	// 	Symbol = "AUDJPY" OR 
	// 	Symbol = "AUDNZD" OR 
	// 	Symbol = "AUDUSD"  
	// ) 
	// GROUP BY Symbol 
	// ORDER BY Datetime DESC ;

	$sql_part = ' AND ( '.
				'	Symbol = "'.$base.
				implode('" OR Symbol = "'.$base, $target).'" '.
				' )' .
				' GROUP BY Symbol '.
				' ORDER BY Datetime DESC ';

	// implode('" OR Symbol = "'.$base, $target)
	// _print_r($sql_part);
	$data = $db->get($table,false,false,false,false,$sql_part);

	for($i=0;$i<count($data);$i++){
		$data[$i]['Rate'] 	  = $data[$i]['Rate'] * $amount;
		$data[$i]['Base']	  = $base;
		$data[$i]['BaseLo']	  = strtolower($base);
		$data[$i]['Target']	  = explode(' ', $data[$i]['Name'])[2];
		$data[$i]['TargetLo'] = strtolower($data[$i]['Target']);
	}

	// _print_r($data,false);die;

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

	$percent_change = 0;
	if(!empty($yesterday[0]['Closing'])){
		$percent_change = ( ($current['Rate'] - $yesterday[0]['Closing']) / $yesterday[0]['Closing'] ) * 100 ;
	}
	$percent_change = round($percent_change,2);
	// _print_r($yesterday,false);
	// _print_r($current,false);
	// _print_r($percent_change);
	// die;
	
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
