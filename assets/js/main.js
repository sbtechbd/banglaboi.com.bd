"use strict";

/* jshint esversion: 6, browser: true */
$ = jQuery;

var isRTL = $("body").hasClass("rtl");

SmoothScroll({ stepSize: 55 });

//- pustaka settings variable from wp localized
var pustaka = pustaka_js_var;

//- Mobile Menu Initialization
function initMobileMenu() {
	var mainMenu = $(".menu-main-wrapper .menu").length ? $(".menu-main-wrapper .menu") : $(".menu-main-dropdown .menu");
	var mobileMenuWrap = $(".mobile-menu");
	mobileMenuWrap.append(mainMenu.clone());

	var menuItem = mobileMenuWrap.find(".menu-item-has-children > a");

	menuItem.each(function () {
		var subButton = '<button class="open-sub"><i class="dripicons-chevron-down"></i></button>';
		$(this).append(subButton);
	});

	mobileMenuWrap.find(".open-sub").on("click", function (e) {
		e.preventDefault();
		$(this).toggleClass("active");
		$(this).parent().next().slideToggle();
	});

	var $mobileUserMenu = $(".mobile-menu-wrap .menu-user-wrap");
	var $mobileUserMenuTgr = $(".mobile-menu-wrap .menu-user-avatar");
	$mobileUserMenuTgr.on('click', function () {
		$mobileUserMenu.slideToggle(200);
	});
}

//- Mega Menu Initialization
function initMegaMenu() {

	var menuWrap = $(".menu-main-wrapper");
	var menu = menuWrap.find(".menu");
	var menuItems = menu.find(" > .mega-menu");
	var menuWrapWidth = menuWrap.innerWidth();
	var menuWrapHeight = menuWrap.innerHeight();
	var menuBg = $(".menu-main-background");
	var menuOverlay = $(".menu-main-overlay");
	var menuSubBg = $(".sub-bg-container");
	var widthTimeout;

	menuBg.width(menuWrapWidth);

	if (!isRTL) {
		menuSubBg.css("left", menuWrapWidth + 2);
	} else {
		menuSubBg.css("right", menuWrapWidth + 2);
	}

	//- Open Menu onclick
	$(".hdr-widget--menu-main .menu-main-toggle").on("click", function (e) {
		e.preventDefault();
		if (!$(this).hasClass('is-active')) {
			$(this).addClass("is-active");
			menuWrap.addClass("is-active");
			menuOverlay.addClass("is-active");
		} else {
			$(this).removeClass("is-active");
			menuWrap.removeClass("is-active");
			menuOverlay.removeClass("is-active");
		}

		$(".mobile-menu-wrap").slideToggle();
	});

	//- Close menu when overlay clicked
	menuOverlay.on('click', function () {
		menuOverlay.removeClass("is-active");
		$(".menu-main-toggle").removeClass("is-active");
		menuWrap.removeClass("is-active");
	});

	//- Open Menu on hover
	$(".hdr-widget--menu-main.open-onhover").hoverIntent(function () {
		var toggle = $(this).find(".menu-main-toggle");
		if (!toggle.hasClass('is-active')) {
			if (window.innerWidth > 991) {
				toggle.addClass("is-active");
				menuWrap.addClass("is-active");
				menuOverlay.addClass("is-active");
			}
		}
	}, function () {
		$(this).find(".menu-main-toggle").removeClass("is-active");
		menuWrap.removeClass("is-active");
		menuOverlay.removeClass("is-active");
	});

	menuItems.hover(hoverIn, hoverOut);

	function hoverIn() {
		openMegaMenu(this);
	}

	function hoverOut() {
		closeMegaMenu(this);
	}

	function openMegaMenu(el) {
		var sub = $(el).find(">.sub-menu");
		var subWidth = sub.innerWidth();
		var subHeight = sub.innerHeight();
		var hoverArea = $('<div class="hover-area"></div>');
		var subBg = {
			paddingBottom: $(el).data("pb") !== undefined && $(el).data("pb") !== "" ? parseInt($(el).data("pb")) : 0,
			paddingRight: $(el).data("pr") !== undefined && $(el).data("pr") !== "" ? parseInt($(el).data("pr")) : 0,
			background: $(el).data("bg")
		};

		clearTimeout(widthTimeout);

		menuWrap.addClass("mega-open");

		menuSubBg.css({
			backgroundImage: 'url(' + subBg.background + ')',
			opacity: 0
		});

		menuWrap.css({
			width: menuWrapWidth + subWidth + subBg.paddingRight,
			height: subHeight + 40 > menuWrapHeight ? subHeight + 40 + subBg.paddingBottom : menuWrapHeight + subBg.paddingBottom
		});

		menuWrap.on('transitionend', function () {
			menuSubBg.css("opacity", 1);
		});

		$(el).append(hoverArea);

		if (!isRTL) {
			$(el).find(".hover-area").css({
				left: menuWrapWidth,
				top: -20,
				width: subWidth + subBg.paddingRight,
				height: subHeight + 40 > menuWrapHeight ? subHeight + 40 + subBg.paddingBottom : menuWrapHeight + subBg.paddingBottom
			});
		} else {
			$(el).find(".hover-area").css({
				right: menuWrapWidth,
				top: -20,
				width: subWidth + subBg.paddingRight,
				height: subHeight + 40 > menuWrapHeight ? subHeight + 40 + subBg.paddingBottom : menuWrapHeight + subBg.paddingBottom
			});
		}

		$(el).addClass('sub-open');
		menuBg.addClass("sub-open");
	}

	function closeMegaMenu(el) {
		$(el).removeClass("sub-open");

		menuWrap.css({
			height: menuWrapHeight
		});

		widthTimeout = setTimeout(function () {
			menuWrap.css({
				width: menuWrapWidth
			});
		}, 60);
		menuWrap.removeClass("mega-open");
		menuBg.removeClass("sub-open");
		menuSubBg.css("opacity", 0);
		$(el).find('.hover-area').remove();
	}
}

//- Author Filterable Layout
function authorIndexFilter() {
	var $filterableItems = $('.author-index');
	var $filterableNav = $('.browse-author-by-alphabet a');

	$filterableItems.isotope({
		filter: '*',
		layoutMode: 'fitRows',
		animationOptions: {
			duration: 750,
			easing: 'linear',
			queue: false
		}
	});

	$filterableNav.click(function (e) {
		var selector = $(this).data('filter');

		$filterableNav.removeClass('current');
		$(this).addClass('current');

		$filterableItems.isotope({
			filter: selector
		});
		e.preventDefault();
		return false;
	});
}

//- Hero Carousel/Slider Initialization
function initHeroCarousel() {
	var carousel = $(".hero-carousel-wrap");
	var carouselStyle = carousel.data("style");
	var carouselDuration = parseInt(carousel.data("duration"));
	var carouselFade = carousel.data('fade');
	var carouselEl = $(".hero-carousel");

	switch (carouselStyle) {
		case 'style-2':
			carouselEl.slick({
				lazyload: 'ondemand',
				slidesToShow: 1,
				infinite: true,
				dots: true,
				arrows: true,
				autoplay: true,
				prevArrow: '<button type="button" class="slick-prev"><i class="dripicons-chevron-left"></i></button>',
				nextArrow: '<button type="button" class="slick-next"><i class="dripicons-chevron-right"></i></button>',
				fade: carouselFade,
				autoplaySpeed: carouselDuration
			});
			break;

		default:
			carouselEl.slick({
				lazyload: 'ondemand',
				slidesToShow: 1,
				centerPadding: '400px',
				centerMode: true,
				infinite: true,
				dots: false,
				arrows: false,
				autoplay: true,
				autoplaySpeed: carouselDuration,
				responsive: [{
					breakpoint: 1700,
					settings: { centerPadding: '300px' }
				}, {
					breakpoint: 1600,
					settings: { centerPadding: '200px' }
				}, {
					breakpoint: 1300,
					settings: { centerPadding: '150px' }
				}, {
					breakpoint: 1024,
					settings: { centerPadding: '0' }
				}]
			});

	}
}

//- Look Inside Book Initialization
function initLookInside() {

	var el = $(".tokoo-look-inside");
	var zoomIn = el.find(".preview-zoom-in");
	var zoomOut = el.find(".preview-zoom-out");
	var pages = el.find(".book-pages");
	var box = el.find(".look-inside-box");
	var tabDetail = el.find(".toggle-detail-tab");
	var tabRelated = el.find(".toggle-related-tab");

	$(".look-inside__close").on("click", function () {
		el.fadeOut();
	});

	tabDetail.on("click", function () {
		box.toggleClass("tab-detail-active");
	});
	tabRelated.on("click", function () {
		box.toggleClass("tab-related-active");
	});

	zoomIn.on("click", function (e) {
		e.preventDefault();
		console.log("zoom in");
		if (pages.innerWidth() > 1200) return;
		pages.css({
			width: pages.innerWidth() + 100
		});
	});
	zoomOut.on("click", function (e) {
		e.preventDefault();
		console.log("zoom out");
		if (pages.innerWidth() < 600) return;
		pages.css({
			width: pages.innerWidth() - 100
		});
	});
}

//- Product Search Goodies
function initProductSearch() {
	var input = $(".product-search-input input");

	input.on('keyup', function () {
		if ($(this).val() !== '') {
			$(this).addClass('dirty');
		} else {
			$(this).removeClass('dirty');
		}
	});
}

//- Gradient Text initialization
function initTextGradient(color1, color2) {

	$(".text-gradient").each(function () {
		var el = $(this);
		var words = el.text().split("");
		var color = generateColor(color1, color2, words.length);

		el.empty();
		$.each(words, function (i, v) {
			el.append($('<span style="color:#' + color[i] + '">').text(v));
		});
	});
}

//- Masonry layout initialization
function initMasonryLayout() {
	$(".post-masonry").isotope({
		layoutMode: 'masonry'
	});
	if ($("html").hasClass('no-flexbox')) {
		$(".post-grid").isotope({
			layoutMode: 'masonry'
		});
	}
}

//- Parallax Goodies
function initGoodies() {
	var controller = new ScrollMagic.Controller();

	//- Page Header
	var pageHeader = new ScrollMagic.Scene({
		triggerHook: 0,
		triggerElement: '.site-header',
		duration: '100%'
	}).setTween(TweenMax.to('.page-header-bg .bg', 1, {
		y: '50%'
	})).addTo(controller);

	//- Single Post Image
	var singlePostImage = new ScrollMagic.Scene({
		triggerHook: 0.4,
		triggerElement: ".post__image",
		duration: '200%'
	}).setTween(TweenMax.to('.post__image .bg', 1, {
		y: '50%'
	})).addTo(controller);

	$(".post__share a").on("mouseenter", function () {
		$(this).addClass("animated").on("animationend", function () {
			$(this).removeClass("animated");
		});
	});

	$(".see-back").on("click", function () {
		$(this).parents(".book-images").find(".book").toggleClass("back-view");
	});
}

//- Init Tokoo Map initialization
function initMap() {
	$(".tokoo-map").each(function () {
		var mapEl = $(this),
		    lat = parseFloat(mapEl.data("lat")),
		    lon = parseFloat(mapEl.data("lon")),
		    markerImage = mapEl.data("marker-image"),
		    style = mapEl.siblings(".map-style").length ? JSON.parse(mapEl.siblings(".map-style").html()) : [],
		    height = parseInt(mapEl.data("height")),
		    title = mapEl.data("title"),
		    content = mapEl.data("content"),
		    zoom = mapEl.data("zoom") ? mapEl.data("zoom") : 13;

		mapEl.height(height);
		mapEl.gmap3({
			map: {
				options: {
					center: [lat, lon],
					zoom: zoom,
					mapTypeId: google.maps.MapTypeId.ROADMAP,
					mapTypeControl: false,
					navigationControl: true,
					scrollwheel: false,
					streetViewControl: false,
					styles: style
				}
			},
			marker: {
				latLng: [lat, lon],
				data: "<div class='tokoo-info-window'><h2>" + title + "</h2>" + content + "</div>",
				options: {
					icon: markerImage
				},
				events: {
					click: function click(marker, event, context) {

						var thisMap = $(this).gmap3("get"),
						    infowindow = $(this).gmap3({
							get: {
								name: "infowindow"
							}
						});
						console.log(infowindow);

						if (infowindow) {
							infowindow.open(thisMap, marker);
							infowindow.setContent(context.data);
						} else {
							$(this).gmap3({
								infowindow: {
									anchor: marker,
									options: {
										content: context.data
									}
								}
							});
						}
					}
				}
			}
		});
	});
}

//- Social Sharing System
function initSocialShare() {
	$(".post__share").each(function () {
		var title = $(this).data("title"),
		    text = $(this).data("text"),
		    image = $(this).data("image"),
		    url = $(this).data("url"),
		    width = $(this).data("width"),
		    height = $(this).data("height");

		$(this).find("a").ShareLink({
			title: title,
			text: text,
			image: image,
			url: url,
			width: width,
			height: height
		});
	});
}

//- Flexslider initialization [used on tokoo widget]
function initFlexSlider() {
	$(".gallery-slider,.koo-image-slider").flexslider({
		animation: 'slide',
		controlNav: false,
		animationLoop: false,
		prevText: '<i class="dripicons-chevron-left"></i>',
		nextText: '<i class="dripicons-chevron-right"></i>'
	});
}

//- Countdown UI Initialization
function initCountdown() {
	$(".product-date-count-down").each(function () {
		var dateline = $(this).data("date");
		$(this).countdown(dateline, function (event) {
			var $this = $(this).html(event.strftime('' + '<div class="count-num"><span class="timer">%D</span><span class="label">' + pustaka_translate.days + '</span></div> ' + '<div class="count-num"><span class="timer">%H</span><span class="label">' + pustaka_translate.hr + '</span></div> ' + '<div class="count-num"><span class="timer">%M</span><span class="label">' + pustaka_translate.min + '</span></div> ' + '<div class="count-num"><span class="timer">%S</span><span class="label">' + pustaka_translate.sec + '</span></div>'));
		});
	});
}

//- Audio Playlist Hook
function tokooAudioPlaylist() {
	var musicCover = $(".music-cover-wrap");
	var playButton = musicCover.find(".play");
	var player = $(".product-overview").find("audio")[0];

	if (musicCover.length) {
		$(document).on('click', '.music-cover .play', function () {
			if (player.paused) {
				player.play();
				musicCover.find(".music-cover").addClass("is-playing");
			} else {
				player.pause();
				musicCover.find(".music-cover").removeClass("is-playing");
			}
		});
		player.addEventListener('play', function () {
			musicCover.find(".music-cover").addClass("is-playing");
		}, false);
		player.addEventListener('pause', function () {
			musicCover.find(".music-cover").removeClass("is-playing");
		}, false);
	}
}

//- Deal tab navigation
function dealNavTab() {
	var el = $(".deal-tab-grid");

	el.on("click", ".deal-tab-nav a", function (e) {
		e.preventDefault();
		var target = $(this).attr('href');

		$(this).parent().siblings().removeClass('active');
		$(this).parent().addClass('active');

		el.find('.deal-tab-pane').removeClass('active');
		$(target).addClass('active');
	});
}

function initStickyHeader() {
	var header = $(".site-header-wrap");
	var headerH = header.find('.site-header').innerHeight();
	if (header.hasClass("is-sticky")) {
		header.css({ height: headerH + 'px' });
	}
}

$(document).ready(function () {
	initStickyHeader();
	initMobileMenu();
	initHeroCarousel();
	if (!$("body").hasClass('rtl')) {
		initTextGradient(pustaka.accent_color_1, pustaka.accent_color_2);
	}
	initProductSearch();
	initMasonryLayout();
	initGoodies();
	initMap();
	initSocialShare();
	initLookInside();
	initCountdown();
	dealNavTab();

	// $(".pustaka-lazyload").lazyload({
	// 	load : function(self, elements_left, settings) {
	// 		$(this).addClass('lazy-loaded');
	// 	}
	// });
	/*! testing */
	var myLazyLoad = new LazyLoad({
		data_src: 'original',
		class_loaded: 'lazy-loaded',
		threshold: 400
	});

	$(".see-gallery").hover(function () {
		$(".movie-case").addClass("is-open");
	}, function () {
		$(".movie-case").removeClass("is-open");
	});

	$(".see-inside").on("click", function (e) {
		e.preventDefault();
		$(".tokoo-look-inside").fadeIn();
	});

	$(".venobox").venobox();

	$(".open-login-popup").on("click", function (e) {
		if ($("body").hasClass("woocommerce-account")) {
			return false;
		}
		$(".user-auth-box").fadeIn();
		e.preventDefault();
	});

	if ($('.user-auth-box .woocommerce-error').length) {
		// console.log("testing");
		// console.log($(".open-login-popup").length)
		$(".open-login-popup").trigger('click');
	}

	$(".user-auth-box .tokoo-popup__close").on("click", function () {
		$(this).parents(".tokoo-popup").fadeOut();
	});

	$(".author-area").stick_in_parent().on('sticky_kit:bottom', function (e) {
		$(this).parent().css('position', 'static');
	}).on('sticky_kit:unbottom', function (e) {
		$(this).parent().css('position', 'relative');
	});

	$(".hdr-widget--menu-cart").on('click', function (e) {
		e.stopPropagation();
		if ($(".mobile-menu-wrap").is(":visible")) {
			$(".mobile-menu-wrap").hide();
			$(".menu-main-overlay").removeClass("is-active");
			$(".menu-main-toggle").removeClass("is-active");
		}
	});
});

$(window).resize(function () {
	initStickyHeader();
});

$(window).load(function () {

	initMegaMenu();
	initMasonryLayout();
	initFlexSlider();
	authorIndexFilter();
	tokooAudioPlaylist();
	initStickyHeader();
});