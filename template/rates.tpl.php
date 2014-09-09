<?php $tmpl_path = $config['template']['path'];?>
<!DOCTYPE html>
<html>
  <head>
    <title>SYMBOL Price Levels</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Expires" CONTENT="-1">

    <!-- Bootstrap CSS -->
    <link href="<?=$tmpl_path?>css/bootstrap.css" rel="stylesheet" media="screen">

    <!-- date range -->
    <link rel="stylesheet" type="text/css" href="<?=$tmpl_path?>css/daterange.css">

   

    <!-- Main CSS -->
    <link href="<?=$tmpl_path?>css/main.css" rel="stylesheet" media="screen">

    <!-- Font Awesome CSS -->
    <link href="<?=$tmpl_path?>fonts/font-awesome.css" rel="stylesheet">
    <!--[if IE 7]>
      <link rel="stylesheet" href="<?=$tmpl_path?>fonts/font-awesome.css">
    <![endif]-->

    <!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?=$tmpl_path?>js/html5shiv.js"></script>
      <script src="<?=$tmpl_path?>js/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>

    <div class="container">

    <!-- Menu Start -->
    <?php include_once('template/menu.tpl.php'); ?>
    <!-- Menu End -->

      <!-- Page title Start -->
      <div class="page-title">

        <div class="row ">

          <!-- Breadcrumb nav start -->
          <div class="col-md-6 col-sm-6 col-xs-6">
            <h2><?=$symbol_upper?></h2>  <!-- INSERT SYMBOL HERE -->
         
          </div>
          <!-- Breadcrumb nav end -->

          <div class="col-md-6 col-sm-6 col-xs-6">
            
           

            <!-- Stats Start -->
            <ul class="stats hidden-sm hidden-xs">
              <li>
                <span id="orders" class="graph" style="width:auto;"></span>
                <div class="details">
                  <span class="big">CURRENT PRICE:</span>
                  <span class="big"><?=$last_minute[0]['Rate']?></span>
                </div>
              </li>
             
            </ul>
            <!-- Stats End -->
            
          </div>
        </div>
      </div>
      <!-- Page title end -->

      <!-- Row start -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
       
              <h3 class="panel-title">Price Levels</h3>
            </div>
          
            <div class="panel-body">
         <!-- INSERT HOUR DATA HERE -->

			<p>Here are the last hours price levels for <?=$symbol_upper?>:</p>
              <div class="table-responsive">
                <table class="table table-bordered no-margin">
                  <thead>
                    <tr>
                      <th>SYMBOL</th>
                      <th>Open</th>
                      <th>High</th>
                      <th>Low</th>
					  <th>Close</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?=$symbol_upper?></td>
                      <td><?=$last_hour[0]['Open']?></td>
                      <td><?=$last_hour[0]['Heigh']?></td>
                      <td><?=$last_hour[0]['Low']?></td>
                      <td><?=$last_hour[0]['Closing']?></td>
                    </tr>
                  </tbody>
                </table>
				<br />
				<!-- INSERT DAILY DATA HERE -->

			<p>Here are yesterdays price levels for <?=$symbol_upper?> on <?=explode(' ',$last_day[0]['Datetime'])[0]?>:</p>
              <div class="table-responsive">
                <table class="table table-bordered no-margin">
                  <thead>
                    <tr>
                      <th>SYMBOL</th>
                      <th>Open</th>
                      <th>High</th>
                      <th>Low</th>
					  <th>Close</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?=$symbol_upper?></td>
                      <td><?=$last_day[0]['Open']?></td>
                      <td><?=$last_day[0]['Heigh']?></td>
                      <td><?=$last_day[0]['Low']?></td>
                      <td><?=$last_day[0]['Closing']?></td>
                    </tr>
                  </tbody>
                </table>
				<br />
				<!-- INSERT RANGE DATA HERE -->

			<p>Here are the levels for opening range for <?=$symbol_upper?>:</p>
              <div class="table-responsive">
                <table class="table table-bordered no-margin">
                  <thead>
                    <tr>
                      <th>SYMBOL</th>
                      <th>Open</th>
                      <th>High</th>
                      <th>Low</th>
					  <th>Close</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?=$symbol_upper?></td>
                      <td><?=$data_range[0]['Open']?></td>
                      <td><?=$data_range[0]['Heigh']?></td>
                      <td><?=$data_range[0]['Low']?></td>
                      <td><?=$data_range[0]['Closing']?></td>
                    </tr>
                  </tbody>
                </table>
			 
            </div>
          </div>
        </div>
      </div>
      <!-- Row end -->

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?=$tmpl_path?>js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=$tmpl_path?>js/bootstrap.min.js"></script>

    <!-- Sparkline graphs -->
    <script src="<?=$tmpl_path?>js/sparkline.js"></script>

    <!-- Date Range -->
    <script src="<?=$tmpl_path?>js/daterange/moment.js"></script>
    <script src="<?=$tmpl_path?>js/daterange/daterangepicker.js"></script>

    <!-- Custom JS -->
    <script type="text/javascript" id="graph_data">
      var current_hour = [<?php for($i=0;$i<count($current_hour_detail);$i++){
                                  if($i) echo ',';
                                  echo $current_hour_detail[$i]['Rate'];
                                }
                          ?>];

      $('#graph_data').data('hour1', current_hour);

      delete current_hour;

    </script>
    <script src="<?=$tmpl_path?>js/custom.js"></script>

  </body>
</html>