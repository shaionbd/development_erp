$(function (){
  "use strict";

  $(function chart() {
    var number = Math.floor(Math.random()*100);
    $.plot("#big-box-chart",
      [
        {
          data: [[1, 10], [2, 8], [3, 27], [4, 25], [5, 59], [6, 20], [7, 55]],
          points: { show: false, radius: 6},
          splines: { show: true, tension: 0.45, lineWidth: 4, fill: 1}
        },
        { data: [[1, 20], [2, 12], [3, 47], [4, 15], [5, 70], [6, 10], [7, 45]],
          bars: { show: false}
        }
      ],
      {
        bars: { show: false, fill: true,  barWidth: 0.3, lineWidth: 2, order: 1, fillColor: { colors: [{ opacity: 0.1 }, { opacity: 0.3}] }, align: 'center'},
        colors: ['#6F6486','#AF92A9'],
        series: {
           shadowSize: 3 ,
           lines: {
             show : true ,
             fill: true,
             fillColor: { colors: [{ opacity: 0.1 }, { opacity: 0.5}] }
           } ,
           curvedLines: {
            apply: true ,
            active: true
           }
         },
        xaxis: { show: true, font: { color: '#ccc' }, position: 'bottom' },
        yaxis:{ show: true, font: { color: '#ccc' }},
        grid: { hoverable: true, clickable: true, borderWidth: 0, color: 'rgba(120,120,120,0.5)' },
        tooltip: true,
        tooltipOpts: { content: '%x.0 is %y.4',  defaultTheme: false, shifts: { x: 0, y: -40 } }
      }
    );
    $.plot("#yearsSales",
      [
        { data: [[1, 2], [2, 4], [3, 5], [4, 7], [5, 6], [6, 4], [7, 5], [8, 4]] },
        { data: [[1, 2], [2, 3], [3, 2], [4, 5], [5, 4], [6, 3], [7, 4], [8, 2]] }
      ],
      {
        bars: { show: true, fill: true,  barWidth: 0.3, lineWidth: 2, order: 1, fillColor: { colors: [{ opacity: 0.2 }, { opacity: 0.2}] }, align: 'center'},
        colors: ['#efefef','#FFC646'],
        series: {
          shadowSize: 3
        },
        xaxis: { show: true, font: { color: '#ccc' }, position: 'bottom' },
        yaxis:{ show: true, font: { color: '#ccc' }},
        grid: { hoverable: true, clickable: true, borderWidth: 0, color: 'rgba(120,120,120,0.3)' },
        tooltip: true,
        tooltipOpts: { content: '%x.0 is %y.4',  defaultTheme: false, shifts: { x: 0, y: -40 } }
      }
    );
    new Chartist.Bar('.ct-chart-99', {
      labels: ['Q1', 'Q2', 'Q3', 'Q4' , 'Q5', 'Q6', 'Q7', 'Q8' , 'Q9', 'Q10' , 'Q11' , 'Q12', 'Q13', 'Q14','Q1', 'Q2', 'Q3', 'Q4' , 'Q5', 'Q6', 'Q7', 'Q8' , 'Q9', 'Q10' , 'Q11' , 'Q12', 'Q13', 'Q14'],
      series: [
        [5, 4, 3, 7, 5, 10, 3 ,5, 4, 3, 7, 5, 10, 3,5, 4, 3, 7, 5, 10, 3 ,5, 4, 3, 7, 5, 10, 3],
        [3, 2, 9, 5, 4, 6, 4 ,3, 2, 9, 5, 4, 6, 4,3, 2, 9, 5, 4, 6, 4 ,3, 2, 9, 5, 4, 6, 4],
        [4, 1, 2, 1 , 4, 1, 2, 1,4, 1, 2, 1 , 4, 1 , 4, 1, 2, 1 , 4, 1, 2, 1,4, 1, 2, 1 , 4, 1]
      ]
      }, {
      stackBars: true,
      axisY: {
        labelInterpolationFnc: function(value) {
          return (value / 1);
          }
        }
      }).on('draw', function(data) {
      if(data.type === 'bar') {
        data.element.attr({
          style: 'stroke-width: 20px'
        });
      }
  });

  $('#homeCalender').fullCalendar({
      // put your options and callbacks here
      heme: false ,
      editable: true,
      droppable: true,
      defaultDate: "2017-05-01",
      header: true,
      buttonText: {
        prev: '',
        next: ''
      },
      events: [
        {
          title  : 'event 1',
          start  : '2017-05-01',
          end    : '2017-05-06' ,
          allDay : true ,
          editable: true
        },
        {
          title  : 'event 2',
          start  : '2017-05-01',
          end    : '2017-05-03' ,
          allDay : true ,
          editable: true ,
          className: 'info'
        },
        {
            title  : 'event 3',
            start  : '2017-05-11',
            end    : '2017-05-15' ,
            allDay : true ,
            editable: true ,
            className: 'danger'
        },
        {
            title  : 'event 4',
            start  : '2017-05-16',
            end    : '2017-05-18' ,
            allDay : true ,
            editable: true ,
            className: 'primary'
        },
        {
            title  : 'event 5',
            start  : '2017-05-22',
            end    : '2017-05-26' ,
            allDay : true ,
            editable: true
        }
    ]
  });
  });

  $(".s-1 .line").peity("line" , {
    fill: '#7E80E7',
    stroke: '#5a5bb7',
    strokeWidth: 2
  });

  $(".s-2 .line").peity("line" , {
    fill: '#71BFF1',
    stroke: '#2471a0',
    strokeWidth: 2
  });

  $(".s-3 .line").peity("line" , {
    fill: '#FFC646',
    stroke: '#a07416',
    strokeWidth: 2
  });

  $('.piy-chart').easyPieChart({
    //your configuration goes here
    barColor: '#71BFF1'
  });

});
