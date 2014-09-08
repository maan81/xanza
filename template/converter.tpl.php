<!DOCTYPE html>
<html>
    <head>
        <title>Amount Currency to Currency - Symbol to Symbol Currency Converter</title>
        <!-- Add amount converted (default 1), From and to currency name, symbol from and to -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link href="../template/css/bootstrap.css" rel="stylesheet" media="screen">
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
                                    <span class="big">Send Euros Worldwide With Zero Commission!</span><!-- Replace "Euros" with base currency fro page -->
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
                            <h3 class="panel-title">EUR GBP Exchange Rate</h3>
                        </div>
                        <div class="panel-sub-heading">
                            <a href="#">Real Time</a>
                        </div>
                        <div class="panel-body">
                            <div class="daily-stats">
                                <h1 class="number primary" style="font-size:220%">
                                    <!-- Show default for page as 1 unit of base currency. For all other conversion queries populate with convert amount -->
                                    50 Euro to British Pound = 1.4595
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
                            <a href="#" class="pull-left">All Australian Dollar Exchange Rates..</a>
                            
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
                                <!-- Populate with base currency as default -->
                            </select>
                            <br>
                            <select class="form-control">
                                <option value="">To Currency</option>
                                <!-- Populate with conversion currency as default -->
                            </select>
                            <br>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter Amount">
                                <span class="input-group-btn">
                                <button class="btn btn-success" type="button" data-original-title="" title="Amount">Convert It!</button>
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
                            <i class="icon-jpy"></i><i class="icon-usd" style="margin-left:5px;margin-right:5px;"></i><i class="icon-eur"></i><i class="icon-gbp" style="margin-left:5px;margin-right:5px;"></i>
                            <h3 class="panel-title">Convert Amount Currency Name in Other Currency</h3>
                            <!-- Replace "amount" with page amount, replace "currency name" with base currency to others -->
                        </div>
                        <div class="panel-body">
                            <div id="myTabContent" class="tab-content">
                                <div class="tab-pane fade active in" id="gbp">
                                    <div class="table-responsive">
                                        <table class="table no-margin">
                                            <tbody>
                                                <!-- Replace "amount" with page amount (default 1), replace base "currency name" with page base name -->
                                                <tr>
                                                    <td><a href="">1 Euro = 1.2 British Pounds</a></td>
                                                    <td><a href="">1 Euro = 1.2 US Dollar</a></td>
                                                </tr>
                                                <tr>
                                                    <td><a href="">1 Euro = 1.2 Australian Dollar</a></td>
                                                    <td><a href="">1 Euro = 1.2 Canadian Dollar</a></td>
                                                </tr>
                                                <tr>
                                                    <td><a href="">1 Euro = 1.2 New Zealand Dollar</a></td>
                                                    <td><a href="">1 Euro = 1.2 Japanese Yen</a></td>
                                                </tr>
                                                <tr>
                                                    <td><a href="">1 Euro = 1.2 Chinese Yuan Renminbi</a></td>
                                                    <td><a href="">1 Euro = 1.2 Swiss Franc</a></td>
                                                </tr>
                                                <tr>
                                                    <td><a href="">1 Euro = 1.2 Indian Rupee</a></td>
                                                    <td><a href="">1 Euro = 1.2 South African Rand</a></td>
                                                </tr>
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
                            <i class="icon-jpy"></i><i class="icon-usd" style="margin-left:5px;margin-right:5px;"></i><i class="icon-eur"></i><i class="icon-gbp" style="margin-left:5px;margin-right:5px;"></i>
                            <h3 class="panel-title">About This Exchange Rate</h3>
                        </div>
                        <div class="panel-sub-heading">
                            <a href="#">Profile on EUR USD..</a> <!-- < Insert symbols here for this page. Also create php include where I can insert text paragraphs about the two currencies in the conversion below -->
                        </div>
                        <div class="panel-body">
                            <p>Include text here from a file named profile-symbol.php , "symbol" changing to base currency name for this paragraph</p>
                            <!-- example include profile-euro.php -->
                            <p>Include text here from a file named profile-symbol.php , "symbol" changing to target currency name for this paragraph</p>
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
                            <h3 class="panel-title">Latest "Base Currency" Conversions</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table -bordered no-margin">
                                    <!-- Populate with latest base currency conversions to any other currency -->
                                    <tbody>
                                        <tr>
                                            <td><a href="">100 EUR to GBP</a></td>
                                            <td><a href="">45 USD to GBP</a></td>
                                            <td><a href="">98 GBP to EUR</a></td>
                                            <td><a href="">2345 EUR to JPY</a></td>
                                            <td><a href="">100 AUD to GBP</a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="">100 EUR to GBP</a></td>
                                            <td><a href="">45 USD to GBP</a></td>
                                            <td><a href="">98 GBP to EUR</a></td>
                                            <td><a href="">2345 EUR to JPY</a></td>
                                            <td><a href="">100 AUD to GBP</a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="">100 EUR to GBP</a></td>
                                            <td><a href="">45 USD to GBP</a></td>
                                            <td><a href="">98 GBP to EUR</a></td>
                                            <td><a href="">2345 EUR to JPY</a></td>
                                            <td><a href="">100 AUD to GBP</a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="">100 EUR to GBP</a></td>
                                            <td><a href="">45 USD to GBP</a></td>
                                            <td><a href="">98 GBP to EUR</a></td>
                                            <td><a href="">2345 EUR to JPY</a></td>
                                            <td><a href="">100 AUD to GBP</a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="">100 EUR to GBP</a></td>
                                            <td><a href="">45 USD to GBP</a></td>
                                            <td><a href="">98 GBP to EUR</a></td>
                                            <td><a href="">2345 EUR to JPY</a></td>
                                            <td><a href="">100 AUD to GBP</a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="">100 EUR to GBP</a></td>
                                            <td><a href="">45 USD to GBP</a></td>
                                            <td><a href="">98 GBP to EUR</a></td>
                                            <td><a href="">2345 EUR to JPY</a></td>
                                            <td><a href="">100 AUD to GBP</a></td>
                                        </tr>
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
                            <h3 class="panel-title">Popular "Base Currency" Conversions</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table -bordered no-margin">
                                    <!-- Populate with most queried base currency conversions -->
                                    <tbody>
                                        <tr>
                                            <td><a href="">100 EUR to GBP</a></td>
                                            <td><a href="">45 USD to GBP</a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="">100 EUR to GBP</a></td>
                                            <td><a href="">45 USD to GBP</a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="">100 EUR to GBP</a></td>
                                            <td><a href="">45 USD to GBP</a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="">100 EUR to GBP</a></td>
                                            <td><a href="">45 USD to GBP</a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="">100 EUR to GBP</a></td>
                                            <td><a href="">45 USD to GBP</a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="">100 EUR to GBP</a></td>
                                            <td><a href="">45 USD to GBP</a></td>
                                        </tr>
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