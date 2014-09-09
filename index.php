<?php

//==============================================================================
// basic includes & initilizations

	require_once('include/config.php');
	require_once('include/db.php');
	require_once('include/functions.php');

	$db = new Database($config);

//==============================================================================



//------------------------------------------------------------------------------
// 2 symbols to be displayed in the homepage

	$symbol1 = 'GBPEUR';
	$symbol2 = 'GBPUSD';

//------------------------------------------------------------------------------



//------------------------------------------------------------------------------
// current data for top right corner

	// current value 
	$view_data['current1'] = $db->get($config['db']['minute_table'],'latest_minute',$symbol1);
	$view_data['current2'] = $db->get($config['db']['minute_table'],'latest_minute',$symbol2);

	// data for bar graph
	$view_data['current_detail1'] = get_current_hour_detail($db,$config['db']['minute_table'],$symbol1);
	$view_data['current_detail2'] = get_current_hour_detail($db,$config['db']['minute_table'],$symbol2);

//------------------------------------------------------------------------------



//------------------------------------------------------------------------------
// data for box 1 & box 2

	// get the last working day
	$datetime = new DateTime(null, new DateTimeZone('UTC'));
	$datetime->modify('-1 Weekday');
	$earlier =  $datetime->format('Y-m-d');

	//--------------------
		// $yesterday1 = $db->get(	$config['db']['day_table'],
		// 						false,
		// 						$symbol1,
		// 						false,
		// 						false,
		// 						' AND Datetime 	>= "'.$earlier.'"'
		// 					);
		// $percent_change1 = ( ($view_data['current1'][0]['Rate'] - $yesterday1[0]['Closing']) / $yesterday1[0]['Closing'] ) * 100 ;





		// $yesterday2 = $db->get(	$config['db']['day_table'],
		// 						false,
		// 						$symbol2,
		// 						false,
		// 						false,
		// 						' AND Datetime 	>= "'.$earlier.'"'
		// 					);

		// $percent_change2 = ( ($view_data['current2'][0]['Rate'] - $yesterday2[0]['Closing']) / $yesterday2[0]['Closing'] ) * 100 ;


		// _print_r($yesterday1,false);
		// _print_r($yesterday2,false);
		// _print_r($view_data['current1'],false);
		// _print_r($view_data['current2'],false);
		// die;

	// get_box_data($db,$table,$symbol,$earlier,$current,$yesterday_closing);

	// data for box 1 & box 2
	$view_data['box1'] = get_box_data(	$db,
										$config['db']['day_table'],
										$symbol1,
										$earlier,
										$view_data['current1'][0]
									);
	$view_data['box2'] = get_box_data(	$db,
										$config['db']['day_table'],
										$symbol2,
										$earlier,
										$view_data['current2'][0]
									);

	// _print_r($view_data['box1'],false);
	// _print_r($view_data['box2'],false);
	// die;

//------------------------------------------------------------------------------



//------------------------------------------------------------------------------
// current hour detail data

	$current_hour_detail = $db->get($config['db']['minute_table'],'1_hour_earlier',$symbol1);
	//_print_r($current_hour_detail,false);

	$tmp = array();
	for($i=0;$i<count($current_hour_detail);$i+=3){
		$tmp[] = $current_hour_detail[$i];
	}
	$view_data['current_hour_detail1'] = $tmp;


	$current_hour_detail1 = $db->get($config['db']['minute_table'],'1_hour_earlier',$symbol2);
	//_print_r($current_hour_detail,false);

	$tmp = array();
	for($i=0;$i<count($current_hour_detail);$i+=3){
		$tmp[] = $current_hour_detail[$i];
	}
	$view_data['current_hour_detail2'] = $tmp;

	unset($current_hour_detail);
	unset($tmp);

	//_print_r($current_hour_detail1);
	//_print_r($current_hour_detail2);

//------------------------------------------------------------------------------


//------------------------------------------------------------------------------
// 10 days graph

	$view_data['graph_data1'] = $db->get(	$config['db']['day_table'], 
											false,
											$symbol1, 
											false, 
											false, 
											' ORDER BY Datetime DESC LIMIT 10 '
										);

	$view_data['graph_data2'] = $db->get(	$config['db']['day_table'], 
											false,
											$symbol2, 
											false, 
											false, 
											' ORDER BY Datetime DESC LIMIT 10 '
										);

//------------------------------------------------------------------------------



//------------------------------------------------------------------------------
// currency lists for dropdown

	$view_data['currencies'] = get_currency_lists($config['symbols']);

//------------------------------------------------------------------------------



//------------------------------------------------------------------------------
// exchange rates for today

	foreach($view_data['currencies'] as $base){
		$view_data['exchange_rates'][$base] = get_exchange_rates(	$db,
																	$config['db']['minute_table'],
																	$base,
																	$view_data['currencies']
																);
	}
	// _print_r($view_data['exchange_rates']);
	// die;
	
//------------------------------------------------------------------------------



//------------------------------------------------------------------------------
// latest & popular conversions

	// get latest conversions
	$latest = $db->get(	$config['db']['conversions'], 
						false, 
						false, 
						false, 
						false,
						' ORDER BY Datetime DESC LIMIT 40 '
					);

    $row = [];
	for($i=0;$i<count($latest);$i++) {
		if(($i%4)==0){
			if($i>0){
				$view_data['latest_conversions'][] = $row;
			}

			$row = [];
		}
		
		$latest[$i]['Link'] = 'convert-'.
								strtolower($latest[$i]['Base']).
									'-'.
										strtolower($latest[$i]['Target']).
											'/'.
												$latest[$i]['Amount'];


		$row[] = $latest[$i];


	}
	$view_data['latest_conversions'][] = $row;


	// get populat conversions
	$popular = $db->get(	$config['db']['conversions'], 
							false, 
							false, 
							false, 
							false,
							' ORDER BY Count DESC LIMIT 12 '
						);

    $row = [];
	for($i=0;$i<count($popular);$i++) {
		if(($i%2)==0){
			if($i>0){
				$view_data['popular_conversions'][] = $row;
			}

			$row = [];
		}
		$popular[$i]['Link'] = 'convert-'.
									strtolower($popular[$i]['Base']).
										'-'.
											strtolower($popular[$i]['Target']).
												'/'.
													$popular[$i]['Amount'];

		$row[] = $popular[$i];
	}
	$view_data['popular_conversions'][] = $row;

//------------------------------------------------------------------------------

// _print_r($view_data,false);
// die;


//==============================================================================
// Finally, include the template for display 

	include($config['template']['path'].'index.tpl.php');

//==============================================================================
