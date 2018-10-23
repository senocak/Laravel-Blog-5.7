// page init
jQuery(function(){
	"use strict";

	initIsoTop();
	initTabs();
	initFitVid();
	initbackTop();
	initLightbox();
	initAddClass();
	initCountDown();
	initHoverClass();
	new WOW().init();
	initSlickSlider();
	initStickyHeader();
});
jQuery(window).on('load', function() {
	"use strict";

	initIsoTop();
});

function initHoverClass() {
	jQuery('.blocks-slider .slide').on( "mouseover", function(){
		if (jQuery(this).siblings().hasClass("active")) {
			jQuery(this).siblings().removeClass('active');
			jQuery(this).addClass("active");
		}else{
			jQuery(this).addClass("active");
		}
	});
}

function initFitVid() {
	jQuery(".videobox").fitVids();
}
// count down init
function initCountDown() {
	var newDate = new Date(2016, 12, 28);
	
	jQuery("#defaultCountdown").countdown({until: newDate});
}



jQuery(window).load(function() {
	jQuery(".loader-holder").hide();
});

function initAddClass() {
	jQuery(".icon-menu, .close").click(function(event) {
		event.preventDefault();
		jQuery("body").toggleClass("sidenav-active");
	});
}

function initSlickSlider() {
	jQuery('.image-slider').slick({
		dots: false,
		autoplay: true,
		arrows: true,
		adaptiveHeight: true
	});
	jQuery('.carousel').slick({
		dots: false,
		autoplay: true,
		arrows: true,
		adaptiveHeight: true
	});
	jQuery('.instagram-slider .mask .slideset').slick({
		dots: false,
		arrows: false,
		autoplay: true,
		slidesToShow: 7,
		responsive: [
			{
				breakpoint: 991,
				settings: {slidesToShow: 5}
			},
			{
				breakpoint: 600,
				settings: {slidesToShow: 3}
			}
		]
	});
	jQuery('.center-slider').slick({
		centerMode: true,
		centerPadding: '0',
		slidesToShow: 3,
		speed: 400,
		adaptiveHeight: true,
		responsive: [
			{
				breakpoint: 767,
				settings: {
					centerMode: true,
					centerPadding: '0',
					adaptiveHeight: false,
					slidesToShow: 1
				}
			}
		]
	}); 
	jQuery('.slideshow').slick({
		fade: true,
		speed: 900,
		dots: false,
		arrows: false,
		infinite: true,
		asNavFor: '.switcher .switcher-mask'
	}); 
	jQuery('.switcher .switcher-mask').slick({
		dots: false,
		slidesToShow: 4,
		slidesToScroll: 1,
		asNavFor: '.slideshow',
		focusOnSelect: true,
		responsive: [
			{
				breakpoint: 1199,
				settings: {slidesToShow: 3}
			},
			{
				breakpoint: 991,
				settings: {slidesToShow: 2}
			},
			{
				breakpoint: 767,
				settings: {slidesToShow: 1}
			}
		]
	});
}

// fancybox modal popup init
function initLightbox() {
	jQuery('a.lightbox, a[rel*="lightbox"]').fancybox({
		padding: 0,
		loop: false,
		helpers: {
			overlay: {
				css: {background: 'rgba(0, 0, 0, 0.35)'}
			}
		},
		afterLoad: function(current, previous) {
			// handle custom close button in inline modal
			if(current.href.indexOf('#') === 0) {
				jQuery(current.href).find('a.close').off('click.fb').on('click.fb', function(e){
					e.preventDefault();
					jQuery.fancybox.close();
				});
			}
		}
	});
}
// content tabs init
function initTabs() {
	jQuery('header.tab-head').tabset({
		tabLinks: 'a',
		defaultTab: false
	});
}

// IsoTop init
function initIsoTop() {
	// Isotope init
	var isotopeHolder = jQuery('#masonry-container'),
		win = jQuery(window);
	jQuery('#masonry-container').isotope({
		itemSelector: '.block',
		transitionDuration: '0.6s'
	});
}

// sticky header init
function initbackTop() {
	var jQuerybackToTop = jQuery("#back-top");
	jQuery(window).on('scroll', function() {
		if (jQuery(this).scrollTop() > 100) {
			jQuerybackToTop.addClass('active');
		} else {
			jQuerybackToTop.removeClass('active');
		}
	});
	jQuerybackToTop.on('click', function(e) {
		jQuery("html, body").animate({scrollTop: 0}, 500);
	});
}


// sticky header init
function initStickyHeader() {
	var win = jQuery(window),
		stickyClass = 'sticky',
		stickyTop = jQuery('#header').offset().top +200;
	

	jQuery(window).on( 'scroll', function(){
		if (jQuery(window).scrollTop() >= stickyTop) {
			jQuery('#header').addClass('movetop');
		} else {
			jQuery('#header').removeClass('movetop');
		}
	});

	jQuery('#header').css({'height': jQuery('#header').innerHeight()});
	jQuery(window).resize( function(){
		jQuery('#header').css({'height': jQuery('#header').innerHeight()});
	});

	jQuery('#header').each(function() {
		var header = jQuery(this);
		var headerOffset = header.offset().top +400 || 0;
		var flag = true;

		function scrollHandler() {
			if (win.scrollTop() > headerOffset) {
				if (flag){
					flag = false;
					header.addClass(stickyClass);
				}
			} else {
				if (!flag) {
					flag = true;
					header.removeClass(stickyClass);
				}
			}

			ResponsiveHelper.addRange({
				'..767': {
					on: function() {
						header.removeClass(stickyClass);
					}
				}
			});
		}

		scrollHandler();
		win.on('scroll resize orientationchange', scrollHandler);
	});
}
