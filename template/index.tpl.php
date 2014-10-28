<?php

// error_reporting(0); // Turn off all error reporting
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
// asdfasdf
?>
<!DOCTYPE html>
<html>
<head>
    <title>Currency Converter, Forex Exchange Rates - Xanza.Com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="template/css/bootstrap.css" rel="stylesheet" media="screen">
    <!-- date range -->
    <link rel="stylesheet" type="text/css" href="template/css/daterange.css">
    <!-- Main CSS -->
    <link href="template/css/main.css" rel="stylesheet" media="screen">
    <!-- Font Awesome CSS -->
    <link href="template/fonts/font-awesome.css" rel="stylesheet">
    <!--[if IE 7]>
    <link rel="stylesheet" href="template/fonts/font-awesome.css">
    <![endif]-->
    <!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="template/js/html5shiv.js"></script>
        <script src="template/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container">
        <!-- Menu Start -->
        <?php include_once('template/menu.tpl.php'); ?>
        <!-- Menu End -->
        <!-- Header end -->
        <!-- Page title Start -->
        <div class="page-title">
            <div class="row ">
                <div class="col-md-6 col-sm-6 col-xs-6">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <!-- Stats Start -->
                    <ul class="stats hidden-sm hidden-xs">
                        <li>
                            <span id="orders" class="graph"></span>
                            <div class="details">
                                <span class="big"><?=$view_data['current1'][0]['Rate']?></span>
                                <span class="small"><?=$view_data['current1'][0]['Symbol']?></span>
                            </div>
                        </li>
                        <li>
                            <span id="currentBalance" class="graph"></span>
                            <div class="details">
                                <span class="big"><?=$view_data['current2'][0]['Rate']?></span>
                                <span class="small"><?=$view_data['current2'][0]['Symbol']?></span>
                            </div>
                        </li>
                    </ul>
                    <!-- Stats End -->
                </div>
            </div>
        </div>
        <!-- Page title end -->
        <!--  BEGIN CURRENCY CONVERTER -->
        <!-- Row start -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-sx-6">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <span class="label label-<?=($view_data['box1']['Percent_change']<0)?'danger':'primary'?>">
                            <?=$view_data['box1']['Percent_change']?>%
                        </span>
                        <h3 class="panel-title"><?=$view_data['box1']['Symbol']?></h3>
                    </div>
                    <div class="panel-sub-heading">
                        <a href="#">Real Time</a>
                    </div>
                    <div class="panel-body">
                        <div class="daily-stats">
                            <h1 class="number <?=($view_data['box1']['Percent_change']<0)?'reddown':'primary'?>">
                                <div class="arrow-<?=($view_data['box1']['Percent_change']<0)?'r':'b'?>">&nbsp;</div>
                                <?=$view_data['current1'][0]['Rate']?>
                            </h1>
                            <p class="avg">Date</p>
                            <ul class="details">
                                <li>
                                    <h4 class="num"><?=$view_data['box1']['Open']?></h4>
                                    <small>Open</small>
                                </li>
                                <li>
                                    <h4 class="num"><?=$view_data['box1']['Heigh']?></h4>
                                    <small>High</small>
                                </li>
                                <li>
                                    <h4 class="num"><?=$view_data['box1']['Low']?></h4>
                                    <small>Low</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-footer clearfix">
                        <a href="<?=$config['baseurl'].'/'.strtolower($view_data['current1'][0]['Symbol'])?>" 
                                    class="pull-left">See <?=$view_data['box1']['Symbol']?> Rates..
                        </a>
                    </div>
                </div>
            </div>
            <!-- end box 1 -->
            <div class="col-md-3 col-sm-6 col-sx-6">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <span class="label label-<?=($view_data['box2']['Percent_change']<0)?'danger':'primary'?>">
                            <?=$view_data['box2']['Percent_change']?>%
                        </span>
                        <h3 class="panel-title"><?=$view_data['box2']['Symbol']?></h3>
                    </div>
                    <div class="panel-sub-heading">
                        <a href="#">Real Time</a>
                    </div>
                    <div class="panel-body">
                        <div class="daily-stats">
                            <h1 class="number <?=($view_data['box2']['Percent_change']<0)?'reddown':'primary'?>">
                                <div class="arrow-<?=($view_data['box2']['Percent_change']<0)?'r':'b'?>">&nbsp;</div>
                                <?=$view_data['current2'][0]['Rate']?>
                            </h1>
                            <p class="avg">Date</p>
                            <ul class="details">
                                <li>
                                    <h4 class="num"><?=$view_data['box2']['Open']?></h4>
                                    <small>Open</small>
                                </li>
                                <li>
                                    <h4 class="num"><?=$view_data['box2']['Heigh']?></h4>
                                    <small>High</small>
                                </li>
                                <li>
                                    <h4 class="num"><?=$view_data['box2']['Low']?></h4>
                                    <small>Low</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-footer clearfix">
                        <a href="<?=$config['baseurl'].'/'.strtolower($view_data['current2'][0]['Symbol'])?>" 
                                    class="pull-left">See <?=$view_data['box2']['Symbol']?> Rates..
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Box 2 -->


            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <i class="icon-globe"></i>
                        <h3 class="panel-title">Currency Converter</h3>
                    </div>
                    <div class="panel-body">
                        <select class="form-control">
                            <option value="">From Currency</option>
                            <?php foreach($view_data['currencies'] as $key=>$val):?>
                                <option value="<?=$val?>"><?=$val?></option>
                            <?php endforeach?>
                        </select>
                        <br>
                        <select class="form-control">
                            <option value="">To Currency</option>
                            <?php foreach($view_data['currencies'] as $key=>$val):?>
                                <option value="<?=$val?>"><?=$val?></option>
                            <?php endforeach?>
                        </select>
                        <br>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Amount">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button" data-original-title="" title="Amount">
                                    Convert It!
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Box 3-->
        <!-- End Converter -->


        <!-- Price Chart -->
        <div class="row">
            <div class="col-md-8 col-sm-12 col-sx-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <i class="icon-bar-chart"></i>
                        <h3 class="panel-title">What 1000 US Dollars is worth in GBP</h3>
                    </div>
                    <div class="panel-sub-heading">
                        <a href="#">Last 10 days</a>
                    </div>
                    <div class="panel-body">
                        <div id="combineChart" class="chart-height"></div>
                        <hr class="hidden-xs">
                        <div class="row hidden-xs">
                            <div class="col-md-3 col-sm-3 col-xs-3 center-align-text">
                                <h3 class="no-margin no-padding">
                                    <?=$config['currencies']['GBP']['Symbol']?>
                                    <?=$view_data['graph_data1'][0]['Closing']?>
                                </h3>
                                <small class="text-muted">
                                    Cost on <?=explode(' ', $view_data['graph_data1'][0]['Range_start'])[0]?>
                                </small>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3 center-align-text">
                                <h3 class="no-margin no-padding">
                                    <?=$config['currencies']['GBP']['Symbol']?>
                                    <?=$view_data['graph_data1'][0]['Heigh']?>
                                </h3>
                                <small class="text-muted">High</small>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3 center-align-text">
                                <h3 class="no-margin no-padding">
                                    <?=$config['currencies']['GBP']['Symbol']?>
                                    <?=$view_data['graph_data1'][0]['Low']?>
                                </h3>
                                <small class="text-muted">Low</small>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3 center-align-text">
                                <h3 class="no-margin no-padding">
                                    <?=$config['currencies']['GBP']['Symbol']?>
                                    <?=$config['current1'][0]['Rate']?>
                                </h3>
                                <small class="text-muted">Todays Rate in GBP</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Chart -->

            <!-- Broker Quote -->
            <div class="col-md-4 col-sm-12 col-sx-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <i class="icon-money"></i>
                        <h3 class="panel-title">Get A Quote!</h3>
                    </div>
                    <div class="panel-sub-heading">
                        <a href="#">Commission Free</a>
                    </div>
                    <div class="panel-body">
                        <p>Quote form in here</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Broker Quote -->
        <!-- Exchange Rates Box -->
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <i class="icon-jpy"></i><i class="icon-usd" style="margin-left:5px;margin-right:5px;"></i><i class="icon-eur"></i><i class="icon-gbp" style="margin-left:5px;margin-right:5px;"></i>
                        <h3 class="panel-title">Exchange Rates Today</h3>
                    </div>
                    <div class="panel-sub-heading">
                        <a href="#">Real Time Updates</a>
                    </div>
                    <div class="panel-body">
                        <ul id="myTab" class="nav nav-tabs">
                            <?php $first=true?>
                            <?php foreach($view_data['exchange_rates'] as $key=>$val):?>
                                <li class="<?=($first?'active':'')?>">
                                    <a href="#<?=strtolower($key)?>" data-toggle="tab" data-original-title="">
                                        <?=strtoupper($key)?>
                                    </a>
                                </li>
                                <?php $first=false?>
                            <?php endforeach?>
                        </ul>
                        <br>
                        <div id="myTabContent" class="tab-content">

                            <?php $first=true?>
                            <?php foreach($view_data['exchange_rates'] as $key=>$val):?>
                                <div class="tab-pane fade <?=($first?'active':'')?> in" id="<?=strtolower($key)?>">
                                    <div class="table-responsive">
                                        <table class="table no-margin">
                                            <tbody>
                                                <?php foreach($val as $kk=>$vv):?>
                                                    <tr>
                                                        <td>
                                                            <a class="tablenum" href="<?=$config['baseurl'].'/'.strtolower($vv['Symbol'])?>">
                                                                <?=$vv['Base']?> <?=$vv['Target']?>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <ul class="ico <?=strtolower($vv['Base'])?> stylish-lists" 
                                                                    style="width:24px;float:left;">
                                                            </ul>
                                                            <ul class="ico <?=strtolower($vv['Target'])?> stylish-lists" 
                                                                    style="width:24px;float:left;">
                                                            </ul>
                                                        </td>
                                                        <td><span class="tablenum"><?=$vv['Rate']?></span></td>
                                                    </tr>
                                                <?php endforeach?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php $first=false?>
                            <?php endforeach?>

                        </div>
                    </div>
                </div>
            </div>
            <!-- End Exchange Rates -->

            <!-- Start Guides -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <i class="icon-jpy"></i><i class="icon-usd" style="margin-left:5px;margin-right:5px;"></i><i class="icon-eur"></i><i class="icon-gbp" style="margin-left:5px;margin-right:5px;"></i>
                        <h3 class="panel-title">Currency Guides!</h3>
                    </div>
                    <div class="panel-sub-heading">
                        <a href="#">Learn About the Markets..</a>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group no-margin">
                            <li class="list-group-item">Guide 1</li>
                            <li class="list-group-item">Guide 2</li>
                            <li class="list-group-item">Guide 3</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- #End Guides-->


        <!-- Start Latest Conversions -->
        <div class="row">
            <div class="col-md-8 col-sm-12 col-sx-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <i class="icon-list"></i>
                        <h3 class="panel-title">Latest Conversions</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table -bordered no-margin">
                                <tbody>
                                    <?php 
                                    //loop thru each row ...
                                    foreach ($view_data['latest_conversions'] as $key => $val) {
                                        echo '<tr>';
                                        //loop thru each value
                                        foreach ($val as $k => $v) {
                                            echo '<td>'.
                                                 '   <a href="'.$config['baseurl'].'/'.$v['Link'].'">'.
                                                        $v['Amount'].' '.$v['Base'].' to '.$v['Target'].
                                                 '   </a>'.
                                                '</td>';
                                        }
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Latest Conversions -->


            <!-- Popular Conversions -->
            <div class="col-md-4 col-sm-12 col-sx-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <i class="icon-tag"></i>
                        <h3 class="panel-title">Popular Conversions</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table -bordered no-margin">
                                <tbody>
                                    <?php 
                                    //loop thru each row ...
                                    foreach ($view_data['popular_conversions'] as $key => $val) {
                                        echo '<tr>';
                                        //loop thru each value
                                        foreach ($val as $k => $v) {
                                            echo '<td>'.
                                                 '   <a href="'.$config['baseurl'].'/'.$v['Link'].'">'.
                                                        $v['Amount'].' '.$v['Base'].' to '.$v['Target'].
                                                 '   </a>'.
                                                '</td>';
                                        }
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- Row end -->
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="template/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="template/js/bootstrap.min.js"></script>
    <!-- Flot Charts -->
    <script src="template/js/flot/jquery.flot.js"></script>
    <script src="template/js/flot/jquery.flot.time.js"></script>
    <script src="template/js/flot/jquery.flot.selection.js"></script>
    <script src="template/js/flot/jquery.flot.resize.js"></script>
    <script src="template/js/flot/jquery.flot.tooltip.js"></script>
    <script src="template/js/flot/flot.excanvas.min.js"></script>

    <script type="text/javascript" id="graph_data">

        var graph_data;

        // data for main graph

            graph_data = [<?php $first=true;
                                    foreach($view_data['graph_data1'] as $key=>$val){
                                        echo $first?'':',';
                                        echo '['.$key.', '.$val['Closing'].']';
                                        $first=false;
                                    }
                                ?>]
            $('#graph_data').data('data1', graph_data);
            $('#graph_data').data('symbol1', '<?=$view_data['graph_data1'][0]['Symbol']?>');


            graph_data = [<?php $first=true;
                                foreach($view_data['graph_data2'] as $key=>$val){
                                    echo $first?'':',';
                                    echo '['.$key.', '.$val['Closing'].']';
                                    $first=false;
                                }
                            ?>]

            $('#graph_data').data('data2', graph_data);
            $('#graph_data').data('symbol2', '<?=$view_data['graph_data2'][0]['Symbol']?>');




        // data for bar graphs on upper right

            graph_data = [<?php for($i=0;$i<count($view_data['current_hour_detail1']);$i++){
                                      if($i) echo ',';
                                      echo $view_data['current_hour_detail1'][$i]['Rate'];
                                    }
                              ?>];
            $('#graph_data').data('hour1', graph_data);

            graph_data = [<?php for($i=0;$i<count($view_data['current_hour_detail2']);$i++){
                                      if($i) echo ',';
                                      echo $view_data['current_hour_detail2'][$i]['Rate'];
                                    }
                              ?>];

            $('#graph_data').data('hour2', graph_data);

        delete graph_data;

    </script>

    <!-- Custom flot JS -->
    <script src="template/js/flot/custom/combine-chart.js"></script>
    <!-- Sparkline graphs -->
    <script src="template/js/sparkline.js"></script>
    <!-- Tyny Scrollbar -->
    <script src="template/js/tiny-scrollbar.js"></script>
    <!-- Date Range -->
    <script src="template/js/daterange/moment.js"></script>
    <script src="template/js/daterange/daterangepicker.js"></script>
    <!-- Custom JS -->
    <script src="template/js/custom.js"></script>
    <script src="template/js/custom-index.js"></script>
</body>
</html>

