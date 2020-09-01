jQuery(document).ready(function ($) {

	"use strict";

	var nav_menu      = $('#nav-wrapper'),
		nav_offset    = nav_menu.offset().top,
		is_sticky     = nav_menu.attr('data-sticky'),
		body          = $('body'),
		social_toggle = 0,
		scroll_up     = $('.scroll-up-btn');

	// Live Search Width
	$('.widget_search input, .not-found input.s').addClass('no-livesearch');

    // Sticky Menu
    if (is_sticky === 'enabled') {

	    //when scroll
	    $(window).scroll(function () {
            if ($(this).scrollTop() >= nav_offset) {

                nav_menu.addClass('fixed');
                body.addClass('has-sticky');

            } else {

                nav_menu.removeClass('fixed');
                body.removeClass('has-sticky');

            }
	    });

	    // default
	    if ($(this).scrollTop() >= nav_offset) {

			nav_menu.addClass('fixed');
			body.addClass('has-sticky');

		} else {

			nav_menu.removeClass('fixed');
			body.removeClass('has-sticky');

		}
	}

	// Social Buttons
	$('.social-btn .toggle').click(function () {
        
        // Count The Social Icons & Set The Height Of The List
        var countIcon = $('.social-icons > a').length,
            hei       = (countIcon * 38) + 50 + 'px',
            icons 	  = $(this).siblings('.social-icons'),
            btn 	  = $(this).parent(),
            cont      = $(this).parents('.fixed-buttons');
        
		if (btn.height() === 46) {
            
			cont.css('z-index', '12');
			btn.animate({
				height: hei
			}, function () {

				btn.css('overflow', 'visible');

			});
			btn.css({
				backgroundColor: '#fff',
				color: breaknews.social_btn_color,
				'border-radius': '50px',
			});
            
		} else {
            
			btn.animate({
				height: '46px'
			}, function () {

				btn.css( 'overflow', 'hidden' );
				cont.css( 'z-index', '10' );
                
                $(this).css({
					backgroundColor: breaknews.social_btn_color,
					color: '#fff',
					'border-radius': '50px',
				});

			});
            
		}
	});

	// Move To Up Button
	$(window).scroll(function () {

		if ($(this).scrollTop() > 600) {

			scroll_up.fadeIn(200);

		} else {

			scroll_up.fadeOut(200);

		}
	});

	if ($(window).scrollTop() > 600) {

		scroll_up.fadeIn(200);

	} else {

		scroll_up.fadeOut(200);

	}

	scroll_up.click(function () {

		$('html, body').animate({scrollTop : 0}, 500);

		return false;
	});

	// Popups
	function mm_popUp( $toggle, $element, $focus ) {

		$($toggle).on('click', function ( event ) {
			event.preventDefault();
			$('#body_overlay').fadeIn();
			$('#body_overlay .popup').not($($element)).hide();
			$($element).show();
			$($focus).focus();
		});

	};

	mm_popUp( '.contact-btn', '.contact-popup' );

	// Hide Popup
	$('#body_overlay .overlay').on('click', function () {
		$('#body_overlay').fadeOut('500');
	});

	// Mobile search
	$('.search-toggle').on('click', function () {
        $('#top-search').slideToggle(200);
        $('#top-search input').focus();
        $('.search-toggle .fa').fadeToggle(100);
    });
	
	// BXslider
	$('.featured-area .featured-slider').bxSlider({
		pager: false,
		mode: 'fade',
		auto: true,
		pause: 3000,
		onSliderLoad: function () {
			$("#sideslides").css("visibility", "visible");
        }
	});
	$('.post-img .bxslider').bxSlider({
		adaptiveHeight: true,
		pager: false,
		captions: true
	});
	
	// Menu
	$('.nav-toggle').on('click', function () {
		$('#nav-wrapper .menu').slideToggle();
	});
	$('#nav-wrapper .menu .sub-menu, #nav-wrapper .menu .children').parents('li').append(
		'<span class="li-toggle fa fa-angle-down"></span>'
	);
	$('#nav-wrapper .li-toggle').on('click', function () {
		$(this).siblings('ul').slideToggle();
	});

	// Load Facebook & Twitter Widget
	$(window).on('load', function(){
		$('.widget .loader-cont').hide();
	});

	$("body.has-nicescroll").niceScroll({
        cursorcolor : breaknews.main_color,
        background : '#f0f0f0',
        cursorwidth : "9px",
        cursorborderradius: "0",
        cursorborder: "none",
        autohidemode: "false",
        horizrailenabled: false,
        zindex: '200'
    });
	
});