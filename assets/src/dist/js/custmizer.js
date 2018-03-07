$(function () {
  var sidebar = $('#sidebar');
  var nav = $('#top-navbar');
  var logoBg = $('.nav-left');
  var cust = $('#custmizer');
  var body = $('body');

  // toggle the custmizer open and close
  $('.set').on('click' , function () {
    cust.toggleClass('custisclose');
  });

  // cheeck the checkbox
  $('.side input').on('change' , function() {
    $('.sidecheck input').not(this).prop('checked' , false)
  });

  $('.navbar input').on('change' , function() {
    $('.navcheck input').not(this).prop('checked' , false)
  });


  // side bar custmizer

  $('#dark').on('click' , function() {
    sidebar.addClass('invers');
    logoBg.addClass('invers')
  });

  $('#light').on('click' , function() {
    sidebar.removeClass('invers');
    logoBg.removeClass('invers')
  });

  // navbar cusmize

  $('#nav1').on('click' , function () {
    var body = $('body');
    nav.removeClass('nav2 , nav3 , nav4 , nav5 , nav6')
    nav.addClass('nav1')
  });
  $('#nav2').on('click' , function () {
    var body = $('body');
    nav.removeClass('nav1 , nav3 , nav4 , nav5 , nav6')
    nav.addClass('nav2')
  });
  $('#nav3').on('click' , function () {
    var body = $('body');
    nav.removeClass('nav1 , nav2 , nav4 , nav5 , nav6')
    nav.addClass('nav3')
  });
  $('#nav4').on('click' , function () {
    var body = $('body');
    nav.removeClass('nav1 , nav2 , nav3 , nav5 , nav6')
    nav.addClass('nav4')
  });
  $('#nav5').on('click' , function () {
    var body = $('body');
    nav.removeClass('nav1 , nav2 , nav3 , nav4 , nav6')
    nav.addClass('nav5')
  });
  $('#nav6').on('click' , function () {
    var body = $('body');
    nav.removeClass('nav1 , nav2 , nav3 , nav4 , nav5')
    nav.addClass('nav6')
  });

  // start layout custmize
  $('#body1').on('click' , function () {
    body.toggleClass('boxed');
    nav.find('.nav').toggleClass('boxed');
  });


});
