var $border_color = "#f9f9f9";
var $grid_color = "#eeeeee";
var $default_black = "#666666";
var $default_white = "#ffffff";
var $green = "#8ecf67";
var $blue = "#87ceeb";

$(function () {    
    // var data1 = [
    //     [1354586000000, 153], [1364587000000, 658], [1374588000000, 198],
    //     [1384589000000, 663], [1394590000000, 801], [1404591000000, 1080],
    //     [1414592000000, 353], [1424593000000, 749], [1434594000000, 523],
    //     [1444595000000, 258]
    // ];

    // var data1 = $('#graph_data').data('data1'),
    //     data2 = $('#graph_data').data('data2'),
    //     symbol1 = $('#graph_data').data('symbol1'),
    //     symbol2 = $('#graph_data').data('symbol2');

    // var data2 = [
    //     [1354586000000, 53], [1364587000000, 65], [1374588000000, 98],
    //     [1384589000000, 83], [1394590000000, 980], [1404591000000, 808],
    //     [1414592000000, 720], [1424593000000, 674], [1434594000000, 23],
    //     [1444595000000, 79]
    // ];

 
    var data = [{
        label: $('#graph_data').data('symbol1'),
        data: $('#graph_data').data('data1'),
        bars: {
          show: true,
          // barWidth: 30 * 60 * 60 * 1000 * 80
          bandWidth: 1
        },
        points:{
          show:true
        }
    },{
        label: $('#graph_data').data('symbol2'),
        data: $('#graph_data').data('data2'),
        lines: {
            show: true
        },
        points:{
          show:true
        }
    }];
 
    var options = {
    	series: {
		  shadowSize: 0,
		  bars: {
            lineWidth: 1,
            }
		},
        grid: {
				hoverable: true,
				clickable: false,
				borderWidth: 1,
				tickColor: $border_color,
				borderColor: $grid_color,
				backgroundColor: { colors: [$default_white, $default_white] }
		},
		legend:{   
			show: true,
			position: 'nw',
			noColumns: 0,
		},
		tooltip: true,
		tooltipOpts: {
			content: '%x: %y'
		},

		xaxis: {mode: "date", ticks:6, tickDecimals: 0},
        yaxis: {ticks:6, tickDecimals: 0},
        // yaxes: [
        //         {position:'left'},
        //         {positoin:'right'},
        //     ],

		colors: [$blue],
    };
 
    var plot = $.plot($("#combineChart"), data, options);  
});