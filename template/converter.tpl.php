<!DOCTYPE html>
<html>
<head>
    <title>Amount Currency to Currency - Symbol to Symbol Currency Converter</title>
    <!-- Add amount converted (default 1), From and to currency name, symbol from and to -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="../template/css/bootstrap.css" rel="stylesheet" media="screen">
    <!-- date range -->
    <link rel="stylesheet" type="text/css" href="../template/css/daterange.css">
    <!-- Main CSS -->
    <link href="../template/css/main.css" rel="stylesheet" media="screen">
    <!-- Font Awesome CSS -->
    <link href="../template/fonts/font-awesome.css" rel="stylesheet">
    <!--[if IE 7]>
    <link rel="stylesheet" href="../template/fonts/font-awesome.css">
    <![endif]-->
    <!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="../template/js/html5shiv.js"></script>
    <script src="../template/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container">
        <!-- Menu Start -->
            <?php include_once('template/menu.tpl.php'); ?>
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
                            <div class="details">
                                <span class="big">
                                    Send <?=$view_data['currency_base']['abrUp']?> Worldwide With Zero Commission!
                                </span>
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
            <div class="col-md-8 col-sm-12 col-sx-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <h3 class="panel-title">
                            <?=$view_data['currency_base']['abrUp']?> <?=$view_data['currency_target']['abrUp']?> Exchange Rate
                        </h3>
                    </div>
                    <div class="panel-sub-heading">
                        <a href="../#">Real Time</a>
                    </div>
                    <div class="panel-body">
                        <div class="daily-stats">
                            <h1 class="number primary" style="font-size:220%">
                                <!-- Show default for page as 1 unit of base currency. For all other 
                                    conversion queries populate with convert amount -->
                                <?=$view_data['amount']?> <?=$view_data['currency_base']['Currency']?> 
                                to <?=$view_data['currency_target']['Currency']?> = 1.4595
                            </h1>
                            <p class="avg">&nbsp;</p>
                            <ul class="linkout">
                                <li>
                                    <h4 class="num">Get a free quote for this currency!</h4>
                                    <small>Zero Commission</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="panel-footer clearfix">
                        <a href="../#" class="pull-left">All Australian Dollar Exchange Rates..</a>
                        
                        </div> -->
                </div>
            </div>
            <!-- end box 1 -->
            <!-- End Box 2 -->

            <div class="col-md-4 col-sm-12 col-sx-12">
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
                                <button class="btn btn-success" type="button" 
                                        data-original-title="" title="Amount">
                                    Convert It!
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Converter -->


        <!-- Exchange Rates Box -->
        <div class="row">
            
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <i class="icon-jpy"></i>
                        <i class="icon-usd" style="margin-left:5px;margin-right:5px;"></i>
                        <i class="icon-eur"></i>
                        <i class="icon-gbp" style="margin-left:5px;margin-right:5px;"></i>
                        <h3 class="panel-title">
                            Convert Amount <?=$view_data['currency_base']['Currency']?> in Other Currencies
                        </h3>
                        <!-- Replace "amount" with page amount, replace "currency name" with base currency to others -->
                    </div>
                    <div class="panel-body">
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade active in" id="gbp">
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <tbody>
                                            <!-- Replace "amount" with page amount (default 1), replace base 
                                                "currency name" with page base name -->
                                            <?php for($i=0;$i<count($view_data['exchange_rates']);$i+=2):?>
                                                <tr>
                                                    <td>
                                                        <a href="<?=$config['baseurl'].
                                                                        '/convert-'.$view_data['exchange_rates'][$i]['BaseLo'].
                                                                            '-'.
                                                                                $view_data['exchange_rates'][$i]['TargetLo'].
                                                                                    '/1'?>">
                                                            1 <?=$view_data['exchange_rates'][$i]['Base']?> 
                                                            = 
                                                            1.2 <?=$view_data['exchange_rates'][$i]['Target']?>
                                                        </a>
                                                    </td>
                                                    <?php $i++?>
                                                    <td>
                                                        <a href="<?=$config['baseurl'].
                                                                        '/convert-'.$view_data['exchange_rates'][$i]['BaseLo'].
                                                                            '-'.
                                                                                $view_data['exchange_rates'][$i]['TargetLo'].
                                                                                    '/1'?>">
                                                            1 <?=$view_data['exchange_rates'][$i]['Base']?> 
                                                            = 
                                                            1.2 <?=$view_data['exchange_rates'][$i]['Target']?>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endfor?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Exchange Rates -->


            <!-- Start Guides -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">

                        <i class="icon-jpy"></i>
                        <i class="icon-usd" style="margin-left:5px;margin-right:5px;"></i>
                        <i class="icon-eur"></i><i class="icon-gbp" style="margin-left:5px;margin-right:5px;"></i>

                        <h3 class="panel-title">About This Exchange Rate</h3>

                    </div>
                    <div class="panel-sub-heading">
                        <a href="#">Profile on EUR USD..</a> 
                        <!-- < Insert symbols here for this page. Also create php include where 
                                I can insert text paragraphs about the two currencies in the 
                                conversion below 
                        -->
                    </div>
                    <div class="panel-body">
                        <p>
                            <?php include(  'profiles'.
                                                    '/profile-'.$view_data['currency_base']['abrLo'].'.php');?>
                        </p>
                        <!-- example include profile-euro.php -->
                        <p>
                            <!-- Include text here from a file named profile-symbol.php , "symbol" 
                                changing to target currency name for this paragraph 
                            -->
                            <?php include(  'profiles'.
                                                    '/profile-'.$view_data['currency_target']['abrLo'].'.php');?>

                        </p>
                        <!-- example include profile-usd.php -->
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
                        <h3 class="panel-title">
                            Latest <?=$view_data['currency_base']['Currency']?> Conversions
                        </h3>
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
                                                 '   <a href="'.$config['baseurl'].$v['Link'].'">'.
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
                        <h3 class="panel-title">
                            Popular <?=$view_data['currency_base']['Currency']?> Conversions
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table -bordered no-margin">
                                <!-- Populate with most queried base currency conversions -->
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
    <script src="../template/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../template/js/bootstrap.min.js"></script>
    <!-- Flot Charts -->
    <script src="../template/js/flot/jquery.flot.js"></script>
    <script src="../template/js/flot/jquery.flot.time.js"></script>
    <script src="../template/js/flot/jquery.flot.selection.js"></script>
    <script src="../template/js/flot/jquery.flot.resize.js"></script>
    <script src="../template/js/flot/jquery.flot.tooltip.js"></script>
    <script src="../template/js/flot/flot.excanvas.min.js"></script>
    <!-- Custom flot JS -->
    <script src="../template/js/flot/custom/combine-chart.js"></script>
    <!-- Sparkline graphs -->
    <script src="../template/js/sparkline.js"></script>
    <!-- Tyny Scrollbar -->
    <script src="../template/js/tiny-scrollbar.js"></script>
    <!-- Date Range -->
    <script src="../template/js/daterange/moment.js"></script>
    <script src="../template/js/daterange/daterangepicker.js"></script>
    <!-- Custom JS -->
    <script src="../template/js/custom.js"></script>
    <script src="../template/js/custom-index.js"></script>
</body>
</html>