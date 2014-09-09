<?php

//==============================================================================
// basic includes & initilizations

    require_once('include/config.php');
    require_once('include/db.php');
    require_once('include/functions.php');

    $db = new Database($config);

//==============================================================================

// _print_r($_GET);

//------------------------------------------------------------------------------
// 2 symbols & the amount for conversion

    // !!!!!!!! validations not done yet !!!!!!!!!!!!!!

    // base currency
    $symbol1 = strtolower($_GET['base']);
    $symbol1_upper = strtoupper($symbol1);


    // target currency
    $symbol2 = strtolower($_GET['target']);
    $symbol2_upper = strtoupper($symbol2);


    // amount
    $amount = $_GET['amount'];
    $view_data['amount'] = $amount;

//------------------------------------------------------------------------------



//------------------------------------------------------------------------------
// currency lists for dropdown

    $view_data['currencies']               = get_currency_lists($config['symbols']);
    $view_data['currency_details']         = $config['currencies'];
    $view_data['currency_base']            = $config['currencies'][$symbol1_upper];
    $view_data['currency_base']['abrUp']   = $symbol1_upper;
    $view_data['currency_base']['abrLo']   = $symbol1;
    $view_data['currency_target']          = $config['currencies'][$symbol2_upper];
    $view_data['currency_target']['abrUp'] = $symbol2_upper;
    $view_data['currency_target']['abrLo'] = $symbol2;

//------------------------------------------------------------------------------



//------------------------------------------------------------------------------
// exchange rates for today

    $view_data['exchange_rates'] = get_exchange_rates(  $db,
                                                        $config['db']['minute_table'],
                                                        $symbol1_upper,
                                                        $view_data['currencies']
                                                    );
    // _print_r($view_data['exchange_rates']);
    // die;
//------------------------------------------------------------------------------



//------------------------------------------------------------------------------
// current data for top right corner

    // get current conversion
    $view_data['current_conversion'] = $db->get($config['db']['minute_table'],'latest_minute',$symbol1.$symbol2);

    // [base] => gbp
    // [target] => eur
    // [amount] => 100


    $where = ' AND Base="'.$symbol1_upper.'" AND Target="'.$symbol2_upper.'" AND Amount="'.$amount.'" ';
    
    $tmp = $db->get($config['db']['conversions'],false,false,false,false,$where);


    //--------------------
    // update ( or add ) the number of times the same 
    // conversion has been done
        $data =  [  'Base'    => $symbol1_upper,
                    'Target'  => $symbol2_upper,
                    'Amount'  => $amount,
                    'Datetime'=> date("Y-m-d h:i:s")
                ];

        if(count($tmp)){
            // update
            $db->update_conversion($config['db']['conversions'],$data);

        }else{
            // insert
            $db->insert_conversion($config['db']['conversions'],$data);
        }
        unset($tmp);
        unset($data);
        // die;
    //--------------------


//------------------------------------------------------------------------------



//------------------------------------------------------------------------------
// latest conversions

    // get latest conversions
    $latest = $db->get( $config['db']['conversions'], 
                        false, 
                        false, 
                        false, 
                        false,
                        ' AND Base = "'.$symbol1_upper.'" ORDER BY Datetime DESC LIMIT 40 '
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


//------------------------------------------------------------------------------



//------------------------------------------------------------------------------
// populat conversions

    $popular = $db->get(    $config['db']['conversions'], 
                            false, 
                            false, 
                            false, 
                            false,
                            ' AND Base = "'.$symbol1_upper.'" ORDER BY Count DESC LIMIT 12 '
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

// _print_r($_GET,false);
// _print_r($view_data,false);
// die;


//==============================================================================
// Finally, include the template for display 

    include($config['template']['path'].'converter.tpl.php');

//==============================================================================
