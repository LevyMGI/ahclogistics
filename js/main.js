$(document).ready(function() {
//drives the mobile nav
//stick in the fixed 100% height behind the navbar but don't wrap it
  $('#slide-nav.navbar-inverse').after($('<div class="inverse" id="navbar-height-col"></div>'));

  $('#slide-nav.navbar-default').after($('<div id="navbar-height-col"></div>'));

  // Enter your ids or classes
  var toggler = '.navbar-toggle';
  var pagewrapper = '#page-content';
  var navigationwrapper = '.navbar-header';
  var menuwidth = '100%'; // the menu inside the slide menu itself
  var slidewidth = '80%';
  var menuneg = '-100%';
  var slideneg = '-80%';

  $("#slide-nav").on("click", toggler, function (e) {
    var selected = $(this).hasClass('slide-active');

    $('#slidemenu').stop().animate({
        left: selected ? menuneg : '0px'
    });

    $('#navbar-height-col').stop().animate({
        left: selected ? slideneg : '0px'
    });

    $(pagewrapper).stop().animate({
        left: selected ? '0px' : slidewidth
    });

    $(navigationwrapper).stop().animate({
        left: selected ? '0px' : slidewidth
    });

    $(this).toggleClass('slide-active', !selected);
    $('#slidemenu').toggleClass('slide-active');

    $('#navigation').toggleClass('slide-active');
    $('#navigation .fixed').toggleClass('slide-active');

    $('#page-content, body, .navbar-header').toggleClass('slide-active');

  });

  var selected = '#slidemenu, #page-content, body, .navbar, .navbar-header';

  $(window).on("resize", function () {
      if ($(window).width() > 767 && $('.navbar-toggle').is(':hidden')) {
          $(selected).removeClass('slide-active');
      }
  });

  //Drives the mobile back-to-top button's smoothscroll
  $(".mobile-backtotop").click(function(){
    $('html, body').animate({scrollTop: 0}, 750, 'swing');
  });

  //Smooth scroll plugin
  $(function() {
    $('a[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 1000);
          return false;
        }
      }
    });
  });

  $(".toggle").each(function(){
    $(this).click(function(){
      $(".navbar-toggle").click();
    });
  });

  $( '.services-li' ).hover(
        function(){
            $(this).children('.services-subnav').stop().slideDown(200);
        },
        function(){
            $(this).children('.services-subnav').stop().slideUp(200);
        }
    );
    $( '.industries-li' ).hover(
        function(){
            $(this).children('.industries-subnav').stop().slideDown(200);
        },
        function(){
            $(this).children('.industries-subnav').stop().slideUp(200);
        }
    );
});
