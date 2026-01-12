"use strict";

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

(function ($) {
  'use strict';

  var _$$slick;

  var mainurl = $('.logo a').attr('href');

  if ($('#svgloader').length) {
    new Vivus('svgloader', {
      duration: 100
    }, function (obj) {
      obj.play(obj.getStatus() === 'end' ? -1 : 1);
    });
  }

  $(window).load(function () {
    new Vivus('svgloader', {
      duration: 100
    }, function (obj) {
      obj.el.classList.add('finished');
      $(".preloader").fadeOut(100, function () {
        //fadeOut complete. Remove the loading div
        $(".preloader").remove(); //makes page more lightweight
      });
    });
  });

  $(document).on('ready', function () {
  // $(".preloader").delay(100).fadeOut(700, function () {
  //     // fadeOut complete. Remove the loading div
  //     $(".preloader").remove(); //makes page more lightweight
  // });
    AOS.init({
      easing: 'ease-out-back',
      duration: 1000
    });

    if (window.matchMedia("(min-width: 1024px)").matches) {
      AOS.refresh();
      var scrollRef = 0;
      window.addEventListener('scroll', function () {
        // increase value up to 10, then refresh AOS
        scrollRef <= 10 ? scrollRef++ : AOS.refresh();
      });
      window.addEventListener('load', AOS.refresh);
    }
  }); // $(function() { AOS.init({ offset: 100, duration:700, easing:"ease-out-quad", once:!0 }); window.addEventListener('load', AOS.refresh); });

  $(".petrikor-scroll-menu a").on('click touch', function (event) {
    var _href = $(this).attr('href');

    if (_href.indexOf("#") != -1) {
      if (!$('body').hasClass('home')) {
        _href = mainurl + $(this).attr('href');
        window.location = _href;
      } else {
        event.preventDefault();
      }

      $('html, body').animate({
        scrollTop: $(_href).offset().top - 60
      }, 2000);
    }
  }); // Cache selectors

  var topMenu = $("#menu-main-menu"),
      topMenuHeight = topMenu.outerHeight() + 76,
      // topMenuHeight =  100,
  // All list items
  menuItems = topMenu.find("a"),
      // Anchors corresponding to menu items
  scrollItems = menuItems.map(function () {
    var item = $($(this).attr("href"));

    if (item.length) {
      return item;
    }
  });
  $(window).scroll(function () {
    if ($(window).scrollTop() > 50) {
      $('.scrolltop').fadeIn();
    } else {
      $('.scrolltop').fadeOut();
    }

    if ($(window).scrollTop() >= 110) {
      // user scrolled 50 pixels or more;
      $('.petrikor-header').addClass('fixed-top petrikor-fixed-top');
    } else {
      $('.petrikor-header').removeClass('fixed-top petrikor-fixed-top');
    }

    var scrollDistance = parseInt($(window).scrollTop()); // Assign active class to nav links while scolling
    // Get container scroll position

    var fromTop = $(this).scrollTop() + topMenuHeight;
    var shoTrue = $(this).scrollTop() + 30; // Get id of current scroll item

    var cur = scrollItems.map(function () {
      if ($(this).offset().top < fromTop) return this;
    });

    var _cur = scrollItems.map(function () {
      if ($(this).offset().top < shoTrue) return this;
    }); // Get the id of the current element


    cur = cur[cur.length - 1];
    _cur = _cur[_cur.length - 1];
    var id = cur && cur.length ? cur[0].id : "";

    var _id = _cur && _cur.length ? _cur[0].id : ""; // Set/remove active class


    menuItems.parent().removeClass("active").end().filter("[href='#" + id + "']").parent().addClass("active");

    var _c = $('#' + id).attr('class');

    var elements = document.getElementsByClassName(_c);

    if (window.matchMedia("(min-width: 1024px)").matches) {
      for (var i = 0; i < elements.length; i++) {
        elements[i].addEventListener('scroll', AOS.refresh);
      }
    } // document.querySelector(_c).addEventListener('scroll', AOS.refresh);
    // $('.sub-cat-pro').each(function (i) {
    //     if (($(this).position().top) - 65 <= scrollDistance) {
    //         $('.product-cat a.active').removeClass('active');
    //         $('.product-cat a').eq(i).addClass('active');
    //     }
    // });

  });
  $(function () {
    $(".scroll").click(function () {
      $("html,body").animate({
        scrollTop: $("html").offset().top
      }, 'slow');
      return false;
    });
  });
  AOS.init(); // Init slick slider + animation

  $('.slider').slick({
    autoplay: true,
    speed: 800,
    lazyLoad: 'progressive',
    arrows: true,
    dots: true,
    prevArrow: '<div class="slick-nav prev-arrow"><i></i><svg><use xlink:href="#circle"></svg></div>',
    nextArrow: '<div class="slick-nav next-arrow"><i></i><svg><use xlink:href="#circle"></svg></div>'
  }).slickAnimation();
  $('.slick-nav').on('click touch', function (e) {
    e.preventDefault();
    var arrow = $(this);

    if (!arrow.hasClass('animate')) {
      arrow.addClass('animate');
      setTimeout(function () {
        arrow.removeClass('animate');
      }, 1600);
    }
  });
  $('.section-slider').slick((_$$slick = {
    dots: false,
    infinite: true,
    speed: 1000,
    arrows: false,
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: true,
    loop: true,
    adaptiveHeight: true,
    cssEase: 'linear',
    centerPadding: 50
  }, _defineProperty(_$$slick, "arrows", true), _defineProperty(_$$slick, "responsive", [{
    breakpoint: 1024,
    settings: {
      slidesToShow: 5,
      slidesToScroll: 1,
      infinite: true,
      dots: false,
      arrows: true
    }
  }, {
    breakpoint: 991,
    settings: {
      slidesToShow: 3,
      slidesToScroll: 3,
      arrows: true
    }
  }, {
    breakpoint: 480,
    settings: {
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: true
    }
  }]), _$$slick));
  var filterList = {
    init: function init() {
      alert(); // MixItUp plugin
      // http://mixitup.io

      $('.portfolio-content').mixItUp({
        selectors: {
          target: '.portfolio',
          filter: '.filter'
        },
        load: {
          filter: '.all' // show app tab on first load

        }
      });
    }
  }; // Run the show!

  filterList.init();
  $('#partner-modal').on('shown.bs.modal', function () {// $('.partners-contact input:frist-child').trigger('focus');
  });
  $('#mc-embedded-subscribe').click(function (e) {
    e.preventDefault();
    $('.error_message').html(' ');
    var email = $('#mc-embedded-subscribe-form #mce-EMAIL').val();

    if ($.trim(email).length) {
      //              $('.mc4wp-form').submit();
      var $form = $('#mc-embedded-subscribe-form'); // $('#mc-embedded-subscribe-form #mce-EMAIL').val(email);

      registermailchimp_footer($form);
    } else if (!$.trim(email).length) {
      $('.error_message').html('Email address is required.').addClass('text-danger');
      ;
    }
  });

  function registermailchimp_footer($form) {
    $.ajax({
      type: $form.attr('method'),
      url: $form.attr('action').replace('/post?', '/post-json?').concat('&c=?'),
      data: $form.serialize(),
      cache: false,
      dataType: 'jsonp',
      contentType: "application/json; charset=utf-8",
      error: function error(err) {
        console.log('Could not connect to the registration server. Please try again later.');
      },
      success: function success(data) {
        $('#mc-embedded-subscribe-form #mce-EMAIL').val('');

        if (data['result'] != "success") {
          //ERROR
          $('.error_message').html(data['msg']).addClass('text-danger');
        } else {
          $('.error_message').html(data['msg']).removeClass('text-danger').addClass('text-success');
        }
      }
    });
  }
})(jQuery);;