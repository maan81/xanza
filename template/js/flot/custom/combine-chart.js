var $border_color = "#f9f9f9";
var $grid_color = "#eeeeee";
var $default_black = "#666666";
var $default_white = "#ffffff";
var $green = "#8ecf67";
var $blue = "#87ceeb";

$(function () {    
    if(! $('#graph_data').length){ return;}

    var data1 = $('#graph_data').length?$('#graph_data').data('data1'):false,
        data2 = $('#graph_data').length?$('#graph_data').data('data2'):false,
        column = 1,
        sdata1, sdata2;

    if(data1.length && data2.length){
      sdata1 = data1.slice(),
      sdata2 = data2.slice();
      
      sdata1 = sdata1.filter(function(n){ return n != undefined });
      sdata2 = sdata2.filter(function(n){ return n != undefined });

      sdata1.sort(function(x,y) {
        if(x && y)
          return x[column] > y[column];
      });

      sdata2.sort(function(x,y) { 
        if(x && y)
          return x[column] > y[column];
      });

      // adjust timestamp to display in graph
        for (var i=data1.length-1;i>=0;i--){
          if(!data1[i]) continue;
          data1[i][0] -= 60 * 60 * 9 ;
          data1[i][0] *= 1000;
        };
        for (var i=data2.length-1;i>=0;i--){
          if(!data2[i]) continue;
          data2[i][0] -= 60 * 60 * 9 ;
          data2[i][0] *= 1000;
        };
    }else{
      sdata1 = [[null,0.005]];
      sdata2 = [[null,-0.005]];
    }

    var dotsData1 = [],
        ticks1 = [],
        dotsData2 = [],
        ticks2 = [],
        l = data1.length-1;
    for (var i=0; i<=l; i++ ) {
        dotsData1.push( [l-i, data1[i][1]] );
        ticks1.push( data1[l-i][0] );
    }
    for (var i=0; i<=l; i++ ) {
        dotsData2.push( [l-i, data2[i][1]] );
        ticks2.push( data2[l-i][0] );
    }
// console.log(dotsData1)
    var data = [{
                    label: $('#graph_data').data('symbol1'),
                    // data: data1,
                    data: dotsData1,
                    bars: {
                      show: true,
                      // barWidth: 30 * 60 * 60 * 600
                      barWidth: 0.7
                    },
                    yaxis: 1
                },{
                    label: $('#graph_data').data('symbol2'),
                    // data: data2,
                    data: dotsData2,
                    lines: {
                        show: true
                    },
                    points:{
                      show:true
                    },
                    yaxis: 2
                }];
 
// console.log(ticks1)


    var markings = [{}];

    for(var i=0;i<ticks1.length-1;i++){

      if(typeof (ticks1[i+1]) == 'undefined') break;

      if((ticks1[i+1]-ticks1[i]) > 86400000){

        var marking = {
                        color: '#888',
                        lineWidth: 1,
                        xaxis: { from: (i+0.85), to: (i+0.85) }
                      }

        markings[i] = marking;

      }else{
        var marking = {
                        color: '#eee',
                        lineWidth: 0,
                        xaxis: { from: i, to: i }
                      }

        markings[i] = marking;
      }

    //   firstDay = curDay; // loop through all days
    }

// console.log(markings)

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
				backgroundColor: { 
                            colors: [$default_white, $default_white] 
                        },
        markings: markings
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
      // xaxes: [{mode: "time"}],
      xaxes: [{ mode: "null",
                tickFormatter: function(val){ return formTicks(val,dotsData1,ticks1)} 
              }
             ],
      yaxes: [
              {
                position : 'left',
                ticks:6, 
                tickDecimals: 2,
                min:sdata1[0][1] -0.005,
                max:sdata1[sdata1.length-1][1] + 0.005
              },
              {
                position : 'right',
                ticks:6, 
                tickDecimals: 2,
                min:sdata2[0][1] -0.005,
                max:sdata2[sdata2.length-1][1] + 0.005
              }
            ],
  		colors: [$blue],
    };

    // formTicks function
    var monthNames = ["Jan", "Feb", "Mar", "Apr", 
                      "May", "Jun", "Jul", "Aug", 
                      "Sep", "Oct", "Nov", "Dec"
                    ];

    function formTicks(val, ticksArr, timestampArr) {

        var d = new Date(timestampArr[val]);
        return monthNames[d.getMonth()]+' '+(d.getDate());
        //return timestampArr[val];


          // return timestampArr[val];
//         var tick = ticksArr[val];

//         if ( tick != undefined ) {
//             tick = new Date( tick );

//             var hours = tick.getHours(),
//                 minutes = tick.getMinutes();

//                 tick = hours+':'+minutes;
//         }
//         else { tick = '' }

//        return tick
    }

    var plot = $.plot($("#combineChart"), data, options);  
});
