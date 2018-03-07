$(document).ready(function() {
    // start the main function
    "use strict";

    // nice scrool
    // $('body').append('<script src="../assets/node_modules/nicescroll/dist/jquery.nicescroll.min.js"></script>');
    // $("html").niceScroll({
    //     cursorcolor: "#000",
    //     cursorborder: "0",
    //     // cursoropacitymin: 0.4 ,
    //     cursoropacitymax: 0.4,
    //     cursorwidth: "8px",
    //     mousescrollstep: 40,
    //     zindex: 9990
    // });
    // $(".sidebar").niceScroll({
    //     cursorcolor: "#000",
    //     cursorborder: "0",
    //     // cursoropacitymin: 0.4 ,
    //     cursoropacitymax: 0.4,
    //     cursorwidth: "3px",
    //     mousescrollstep: 40,
    //     zindex: 9990
    // });

    // load sidebar & navbar
    // $("#sidebar").load('sidebar.html');
    // sidebar sub-nav
    $("a.nav-link").click(function() {
        $(this).children(".zmdi-chevron-right").toggleClass('flep');
    });

    $("#sidebar a").each(function() {
        if (this.href == window.location.href) {
            $(this).addClass("active");
        }
    });

    $("#NavBtn").on('click', function() {
        // $(".nav-left , #sidebar").toggle();
        $("#layout").toggleClass("toggled-side");
        $(".nav-left").toggleClass("toggled-side");

    });

    $(window).resize(function() {
        if ($(document).width() < 900) {
            $("#layout").addClass("toggled-side");
            $(".nav-left").addClass("toggled-side");
        } else {
            $("#layout").removeClass("toggled-side");
            $(".nav-left").removeClass("toggled-side");
        }
    });

    if ($(document).width() < 900) {
        $("#layout").addClass("toggled-side");
        $(".nav-left").addClass("toggled-side");
    }

    // notification start
    var facebook = '<div id="not"><div class="not facebook"><div class="left"><i class="zmdi zmdi-facebook"></i></div><div class="right"><h1>notification name</h1><p>Lorem ipsum dolor sit amet</p></div></div></div>';
    var twitter = '<div id="not"><div class="not twitter"><div class="left"><i class="zmdi zmdi-twitter"></i></div><div class="right"><h1>notification name</h1><p>Lorem ipsum dolor sit amet</p></div></div></div>';
    var android = '<div id="not"><div class="not android"><div class="left"><i class="zmdi zmdi-android"></i></div><div class="right"><h1>notification name</h1><p>Lorem ipsum dolor sit amet</p></div></div></div>';
    var github = '<div id="not"><div class="not github"><div class="left"><i class="zmdi zmdi-github"></i></div><div class="right"><h1>notification name</h1><p>Lorem ipsum dolor sit amet</p></div></div></div>';
    var apple = '<div id="not"><div class="not apple"><div class="left"><i class="zmdi zmdi-apple"></i></div><div class="right"><h1>notification name</h1><p>Lorem ipsum dolor sit amet</p></div></div></div>';
    var behance = '<div id="not"><div class="not behance"><div class="left"><i class="zmdi zmdi-behance"></i></div><div class="right"><h1>notification name</h1><p>Lorem ipsum dolor sit amet</p></div></div></div>';

    $('#notification1 a.facebook').on('click', function() {
        $.notifications({

            // className: 'notify1',
            alive: 2000,
            fadeIn: 600,
            fadeOut: 800,
            sticky: false,

            tpl: facebook
        });

    });
    $('#notification1 a.twitter').on('click', function() {
        $.notifications({

            // className: 'notify1',
            alive: 2000,
            fadeIn: 600,
            fadeOut: 800,
            sticky: false,

            tpl: twitter
        });

    });
    $('#notification1 a.android').on('click', function() {
        $.notifications({

            // className: 'notify1',
            alive: 2000,
            fadeIn: 600,
            fadeOut: 800,
            sticky: false,

            tpl: android
        });

    });
    $('#notification1 a.github').on('click', function() {
        $.notifications({

            // className: 'notify1',
            alive: 2000,
            fadeIn: 600,
            fadeOut: 800,
            sticky: false,

            tpl: github
        });

    });
    $('#notification1 a.apple').on('click', function() {
        $.notifications({

            // className: 'notify1',
            alive: 2000,
            fadeIn: 600,
            fadeOut: 800,
            sticky: false,

            tpl: apple
        });

    });
    $('#notification1 a.behance').on('click', function() {
        $.notifications({

            alive: 2000,
            fadeIn: 600,
            fadeOut: 800,
            sticky: false,

            tpl: behance
        });

    });


    // notification end

    // start anemation
    $('head').append('<link rel="stylesheet" href="../assets/src/plug/animate.min.css"> ')
    $('.user').on('click', function() {
        $('.dropdown-menu').addClass('animated flipInY');
    })

    // start custmizer
    // $('body').prepend('<div class="custmizer"></div>');
    // $('.custmizer').load('custmizer.html');
    // sidebar.addClass('invers');
    // logoBg.addClass('invers');
    // end the main function
});