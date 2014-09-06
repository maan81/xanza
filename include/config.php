<?php

/**
 * Database connections
 */
$config['db']['server']   = 'localhost';
$config['db']['database'] = 'xanza_currency';
$config['db']['username'] = 'xanza_currency';
$config['db']['password'] = 'xac123!';



/**
 * Database tables
 */
$config['db']['minute_table'] = 'minute_table';
$config['db']['hour_table']   = 'hour_table';
$config['db']['day_table']    = 'day_table';
$config['db']['range_table']  = 'range_table';



/**
 * Symbols to be used
 *  If these symbols are modified, the symbols in 
 *  .htaccess file should be modified as well
 */
$config['symbols'] = array(	'GBPUSD', 'USDCHF', 'EURUSD', 'GBPJPY', 
							'EURJPY', 'GBPEUR', 'USDCAD', 'USDJPY',
							'AUDUSD', 'NZDUSD', 'EURAUD', 'EURCHF',
							'GBPCHF', 'CADJPY', 'AUDNZD', 'GBPCAD',
							'EURNZD', 'EURCAD', 'CHFJPY', 'AUDJPY');




/**
 * Data obtained external url
 */
$config['yql'] = 'select * from yahoo.finance.xchange where pair in ("'.implode('", "', $config['symbols']).'")';
$config['env'] = 'store://datatables.org/alltableswithkeys';
$config['url'] = 'http://query.yahooapis.com/v1/public/yql?q='.urlencode($config['yql']).'&env='.urlencode($config['env']).'&format=json';



/**
 * Data obtained from static file
 */
$config['use_filedata'] = false;  // true = uses data from file; false = used data from url, ie yahoo finance
$config['filepath'] = 'include/';
$config['filename'] = 'current_data_json.';




/**
 * Range Start time & Range end time -- from yesterday's hour data
 *  The range has to be within the same day, 
 *  ie 00:00:00 to 23:59:59
 */
$config['range_start'] = '06:00:00';
$config['range_end']   = '13:00:00';




/**
 * Delete old data settings
 *  The parameters avilaible are the ones accepted for Date::modify(), 
 *  http://php.net/manual/en/datetime.modify.php
 *
 *  ie, -1 day,  -2 months  .....
 */
$config['minute_table_range'] = '-7 hours';
$config['hour_table_range']   = '-2 days';
$config['day_table_range']    = '-33 days';
$config['range_table_range']  = '-33 days';




$config['template']['path'] = 'template/';




/**
 * PHP's print_r fn customized for debugging.
 * should not be necessary for production
 *
 */
function _print_r($data,$end=true,$return=false){

	$str = '';

	if(!$return){

		$t = debug_backtrace();

		$str .= PHP_EOL.'<hr/>';
		$str .= '<pre>';
		$str .= print_r('file : '.$t[0]['file'],true);
		$str .= '</pre>';
		$str .= PHP_EOL.'<pre>';
		$str .= print_r('line : '.$t[0]['line'],true);
		$str .= '</pre>';
		$str .= PHP_EOL.'<pre>';
		$str .= print_r('data :'.print_r($data,true),true);
		$str .= '</pre>';
		$str .= PHP_EOL.'<hr/>';
	}


	if(!$end){
		echo $str;
		return;
	}

	echo $str;
	die;
}
