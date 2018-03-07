$(function () {
  "use strict";

  $('#Mycalender').fullCalendar({
      // put your options and callbacks here
      heme: true,
  		editable: true,
  		droppable: true,
  		defaultDate: '2017-05-01',
  		header: false,
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
        },
        {
            title  : 'event 6',
            start  : '2017-06-8',
            end    : '2017-06-10' ,
            allDay : true ,
            editable: true ,
            className: 'info'
        }
    ]
  })


});
