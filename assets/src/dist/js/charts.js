$(function () {
  // start the main function
  "use strict";

  var color = {
    color1: "#7E80E7" ,
    color2: "#71BFF1" ,
    color3: "#FFC646" ,
    color4: "#fe7572" ,
    color5: "#232323" ,
    color6: "#efefef"
  };

  // start flot chart
  var data = [ [1, 10], [2, 11], [3, 12], [4, 13], [5, 14], [6, 15] ,[7, 16],[8, 17],[9, 18],[10,19] ] ;
  var data2 = [ [0, 0], [2, 19], [8, 19], [4, 19], [6, 19], [6, 19] ,[4, 19],[8, 19],[2, 19],[9,19] ] ;


  $.plot("#flot1", [ data ], {
    series: {
          shadowSize: 0,
          lines: {
            lineWidth: 0,
            fill: true,
            fillColor: '#7E80E7'
          }
        },
      grid: { show: true, borderWidth: 0, color: '#232323'
    },
    xaxis: {
      mode: "categories",
      tickLength: 0
    }
  });
  $.plot("#flot2", [ data2 ], {
    series: {
        lines:{ show: true, fill: false }
    },
    colors: ['#7E80E7'],
    grid: { show: true, borderWidth: 0, color: '#232323' },
  });
  $.plot("#flot3", [ data ], {
    series: {
        stack: false,
        bars: {
          show: true,
          barWidth: 0.55,
          lineWidth: 0
        }
      },
      grid: { show: true, borderWidth: 0, color: color.color5 },
      colors: [color.color2]
  });
  $.plot("#flot4" ,[ data ],{
    series: {
        stack: true,
        bars: {
          show: true,
          barWidth: 0.55,
          lineWidth: 0,
          horizontal: true
        }
      },
      grid: { show: true, borderWidth: 0, color: color.color5 },
      colors: [color.color3]
  });
  $.plot("#flot5" ,[ data ],{
    series: {
        stack: true,
        bars: {
          show: true,
          barWidth: 0.4,
          lineWidth: 1,
          horizontal: false
        }
      },
      grid: { show: true, borderWidth: 0, color: color.color5 },
      colors: [color.color4]
  });

  $(function pi() {

    var data = [], series = 3;
    for (var i = 0; i < series; i++) {
      data[i] = {
        label: "Series" + (i + 1),
        data: Math.floor(Math.random() * 100) + 1
      }
    }


    $.plot("#flot6" , data ,{
      series: {
          pie: {
            show: true,
            combine: {
              color: "#999",
              threshold: 0.05
            }
          }
        },
        legend: { show: false },
        colors: [color.color1, color.color2, color.color3]
    });
    $.plot("#flot7" , data ,{
      series: {
          pie: {
            show: true,
            combine: {
              color: "#999",
              threshold: 0.05
            }
          }
        },
        legend: { show: false },
        colors: [color.color1, color.color3, color.color4]
    });
    $.plot("#flot8" , data ,{
      series: {
          pie: {
            show: true,
            combine: {
              color: "#999",
              threshold: 0.05
            }
          }
        },
        legend: { show: false },
        colors: [color.color4, color.color6, color.color3]
    });

  });

  // end folt

  // folt in dashbord one
  
  // end in dashbord one

  // end main function
});
