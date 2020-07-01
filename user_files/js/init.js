var galleryThumbs = new Swiper('.tabslide .gallery-thumbs', {
  spaceBetween: 10,
  slidesPerView: 3,
  freeMode: true,
  watchSlidesVisibility: true,
  watchSlidesProgress: true,
});
var galleryTop = new Swiper('.tabslide .gallery-top', {
  spaceBetween: 0,
  effect: 'fade',
  slidesPerView: 1,
  speed: 1000,
  navigation: {
    nextEl: '.tabslide .swiper-button-next',
    prevEl: '.tabslide .swiper-button-prev',
  },
  thumbs: {
    swiper: galleryThumbs
  }
});
//////////////////////////////
var swiper = new Swiper('.explore-slider .swiper-container', {
	slidesPerView: 4,
	spaceBetween: 30,
	// init: false,
	navigation: {
        nextEl: '.explore-slider .swiper-button-next',
        prevEl: '.explore-slider .swiper-button-prev',
    },
	breakpoints: {
	  1024: {
		slidesPerView: 3,
		spaceBetween: 40,
	  },
	  768: {
		slidesPerView: 2,
		spaceBetween: 30,
	  },
	  399: {
		slidesPerView: 1,
		spaceBetween: 20,
	  },
	}
  });
  //////////////////////////////
var swiper = new Swiper('.location-slider .home-swiper', {
	slidesPerView: 3,
	spaceBetween: 30,
	// init: false,
	navigation: {
        nextEl: '.location-slider .swiper-button-next',
        prevEl: '.location-slider .swiper-button-prev',
    },
	breakpoints: {
	  1024: {
		slidesPerView: 3,
		spaceBetween: 40,
	  },
	  768: {
		slidesPerView: 2,
		spaceBetween: 30,
	  },
	  399: {
		slidesPerView: 1,
		spaceBetween: 20,
	  },
	}
  });
	//////////////////////////////
	var swiper = new Swiper('.holiday-slider .swiper-container', {
		slidesPerView: 4,
		spaceBetween: 30,
		// init: false,
		navigation: {
					nextEl: '.holiday-slider .swiper-button-next',
					prevEl: '.holiday-slider .swiper-button-prev',
			},
		breakpoints: {
			1024: {
			slidesPerView: 3,
			spaceBetween: 40,
			},
			768: {
			slidesPerView: 2,
			spaceBetween: 30,
			},
			399: {
			slidesPerView: 1,
			spaceBetween: 20,
			},
		}
		});
	////////////////////////////////
		var swiper = new Swiper('.bestplaces-slider .swiper-container', {
			slidesPerView: 4,
			spaceBetween: 30,
			// init: false,
			navigation: {
						nextEl: '.bestplaces-slider .swiper-button-next',
						prevEl: '.bestplaces-slider .swiper-button-prev',
				},
			breakpoints: {
				1024: {
				slidesPerView: 3,
				spaceBetween: 40,
				},
				768: {
				slidesPerView: 2,
				spaceBetween: 30,
				},
				399: {
				slidesPerView: 1,
				spaceBetween: 20,
				},
			}
			});
//////////////////////////
  var swiper = new Swiper('.experience-slider .swiper-container', {
	slidesPerView: 4,
	spaceBetween: 30,
	// init: false,
	navigation: {
        nextEl: '.experience-slider .swiper-button-next',
        prevEl: '.experience-slider .swiper-button-prev',
    },
	breakpoints: {
	  1024: {
		slidesPerView: 3,
		spaceBetween: 40,
	  },
	  768: {
		slidesPerView: 2,
		spaceBetween: 30,
	  },
	  399: {
		slidesPerView: 1,
		spaceBetween: 20,
	  },
	}
  });

	////////////////////////////
	var swiper = new Swiper('.toprated-slider .swiper-container', {
		slidesPerView: 4,
		spaceBetween: 30,
		// init: false,
		navigation: {
					nextEl: '.toprated-slider .swiper-button-next',
					prevEl: '.toprated-slider .swiper-button-prev',
			},
		breakpoints: {
			1024: {
			slidesPerView: 3,
			spaceBetween: 40,
			},
			768: {
			slidesPerView: 2,
			spaceBetween: 30,
			},
			399: {
			slidesPerView: 1,
			spaceBetween: 20,
			},
		}
		});
//////////////////////		
  var swiper = new Swiper('.recommended-slider .swiper-container', {
	slidesPerView: 4,
	spaceBetween: 30,
	// init: false,
	navigation: {
        nextEl: '.recommended-slider .swiper-button-next',
        prevEl: '.recommended-slider .swiper-button-prev',
    },
	breakpoints: {
	  1024: {
		slidesPerView: 3,
		spaceBetween: 40,
	  },
	  768: {
		slidesPerView: 2,
		spaceBetween: 30,
	  },
	  399: {
		slidesPerView: 1,
		spaceBetween: 20,
	  },
	}
  });
	////////////////////
	var swiper = new Swiper('.missbigday-slider .swiper-container', {
		slidesPerView: 4,
		spaceBetween: 30,
		// init: false,
		navigation: {
					nextEl: '.missbigday-slider .swiper-button-next',
					prevEl: '.missbigday-slider .swiper-button-prev',
			},
		breakpoints: {
			1024: {
			slidesPerView: 3,
			spaceBetween: 40,
			},
			768: {
			slidesPerView: 2,
			spaceBetween: 30,
			},
			399: {
			slidesPerView: 1,
			spaceBetween: 20,
			},
		}
		});
	////////////////////////
  var swiper = new Swiper('.comforts-slider .swiper-container', {
	slidesPerView: 5,
	spaceBetween: 30,
	// init: false,
	navigation: {
        nextEl: '.comforts-slider .swiper-button-next',
        prevEl: '.comforts-slider .swiper-button-prev',
    },
	breakpoints: {
	  1024: {
		slidesPerView: 3,
		spaceBetween: 40,
	  },
	  768: {
		slidesPerView: 2,
		spaceBetween: 30,
	  },
	  399: {
		slidesPerView: 1,
		spaceBetween: 20,
	  },
	}
	});
	/////////////////////
	var swiper = new Swiper('.superhost-slider .swiper-container', {
		slidesPerView: 4,
		spaceBetween: 30,
		// init: false,
		navigation: {
					nextEl: '.superhost-slider .swiper-button-next',
					prevEl: '.superhost-slider .swiper-button-prev',
			},
		breakpoints: {
			1024: {
			slidesPerView: 3,
			spaceBetween: 40,
			},
			768: {
			slidesPerView: 2,
			spaceBetween: 30,
			},
			399: {
			slidesPerView: 1,
			spaceBetween: 20,
			},
		}
		});
	//////////////////////
  var swiper = new Swiper('.reasons-slider .swiper-container', {
	slidesPerView: 4,
	spaceBetween: 30,
	// init: false,
	navigation: {
        nextEl: '.reasons-slider .swiper-button-next',
        prevEl: '.reasons-slider .swiper-button-prev',
    },
	breakpoints: {
	  1024: {
		slidesPerView: 3,
		spaceBetween: 40,
	  },
	  768: {
		slidesPerView: 2,
		spaceBetween: 30,
	  },
	  399: {
		slidesPerView: 1,
		spaceBetween: 20,
	  },
	}
	});
/////////////////////	
var swiper = new Swiper('.adventure-slider .swiper-container', {
	slidesPerView: 5,
	spaceBetween: 30,
	// init: false,
	navigation: {
        nextEl: '.adventure-slider .swiper-button-next',
        prevEl: '.adventure-slider .swiper-button-prev',
    },
	breakpoints: {
		1199: {
			slidesPerView: 4,
			spaceBetween: 40,
		},
	  1024: {
		slidesPerView: 3,
		spaceBetween: 40,
	  },
	  768: {
		slidesPerView: 2,
		spaceBetween: 30,
	  },
	  399: {
		slidesPerView: 1,
		spaceBetween: 20,
	  },
	}
	});
/////////////////////
var swiper = new Swiper('.foodblog-slider .swiper-container', {
	slidesPerView: 5,
	spaceBetween: 30,
	// init: false,
	navigation: {
        nextEl: '.foodblog-slider .swiper-button-next',
        prevEl: '.foodblog-slider .swiper-button-prev',
    },
	breakpoints: {
		1199: {
			slidesPerView: 4,
			spaceBetween: 40,
		},
	  1024: {
		slidesPerView: 3,
		spaceBetween: 40,
	  },
	  768: {
		slidesPerView: 2,
		spaceBetween: 30,
	  },
	  399: {
		slidesPerView: 1,
		spaceBetween: 20,
	  },
	}
	});	
////////////////////
  var swiper = new Swiper('.trips-slider .swiper-container', {
	slidesPerView: 5,
	spaceBetween: 30,
	// init: false,
	navigation: {
        nextEl: '.trips-slider .swiper-button-next',
        prevEl: '.trips-slider .swiper-button-prev',
    },
	breakpoints: {
	  1024: {
		slidesPerView: 3,
		spaceBetween: 40,
	  },
	  768: {
		slidesPerView: 2,
		spaceBetween: 30,
	  },
	  399: {
		slidesPerView: 1,
		spaceBetween: 20,
	  },
	}
	});
	
//////////////////////////////

var swiper = new Swiper('.similar-slider .swiper-container', {
	slidesPerView: 4,
	spaceBetween: 30,
	// init: false,
	navigation: {
        nextEl: '.similar-slider .swiper-button-next',
        prevEl: '.similar-slider .swiper-button-prev',
    },
	breakpoints: {
		1199: {
			slidesPerView: 3,
			spaceBetween: 40,
		},
	  1024: {
		slidesPerView: 2,
		spaceBetween: 30,
		},
		767: {
			slidesPerView: 2,
			spaceBetween: 30,
		},
	  399: {
		slidesPerView: 1,
		spaceBetween: 20,
	  },
	}
	});
	
//////////////////////////////////////

var swiper = new Swiper('.places-slide .swiper-container', {
	spaceBetween: 30,
	effect: 'fade',
	//loop: true,
	pagination: {
		el: '.places-slide .swiper-pagination',
		clickable: true,
	},
	navigation: {
		nextEl: '.places-slide .swiper-button-next',
		prevEl: '.places-slide .swiper-button-prev',
	},
});
  
(function ($) {

	"use strict";
	
	
	// Sticky nav
	$(window).on('scroll', function () {
		if ($(this).scrollTop() > 1) {
			$('.header').addClass("sticky");
		} else {
			$('.header').removeClass("sticky");
		}
	});
	
	// Sticky sidebar
	$('#sidebar').theiaStickySidebar({
		additionalMarginTop: 150
	});
	
	// Mobile Mmenu
	var $menu = $("nav#menu").mmenu({
		"extensions": ["pagedim-black"],
		counters: true,
		keyboardNavigation: {
			enable: true,
			enhance: true
		},
		navbar: {
			title: 'MENU'
		},
		navbars: [{position:'bottom',content: ['<a href="#0">© 2019 BookHomestays</a>']}]}, 
		{
		// configuration
		clone: true,
		classNames: {
			fixedElements: {
				fixed: "menu_fixed",
				sticky: "sticky"
			}
		}
	});
	var $icon = $("#hamburger");
	var API = $menu.data("mmenu");
	$icon.on("click", function () {
		API.open();
	});
	API.bind("open:finish", function () {
		setTimeout(function () {
			$icon.addClass("is-active");
		}, 100);
	});
	API.bind("close:finish", function () {
		setTimeout(function () {
			$icon.removeClass("is-active");
		}, 100);
	});
	
		// WoW - animation on scroll
		var wow = new WOW(
			{
			boxClass:     'wow',      // animated element css class (default is wow)
			animateClass: 'animated', // animation css class (default is animated)
			offset:       0,          // distance to the element when triggering the animation (default is 0)
			mobile:       true,       // trigger animations on mobile devices (default is true)
			live:         true,       // act on asynchronously loaded content (default is true)
			callback:     function(box) {
				// the callback is fired every time an animation is started
				// the argument that is passed in is the DOM node being animated
			},
			scrollContainer: null // optional scroll container selector, otherwise use window
			}
		);

	// Header button explore
    $('a[href^="#"].btn_explore').on('click', function (e) {
			e.preventDefault();
			var target = this.hash;
			var $target = $(target);
			$('html, body').stop().animate({
				'scrollTop': $target.offset().top
			}, 800, 'swing', function () {
				window.location.hash = target;
			});
		});
	
	// Image popups
	$('.magnific-gallery').each(function () {
		$(this).magnificPopup({
			delegate: 'a',
			type: 'image',
            preloader: true,
			gallery: {
				enabled: true
			},
			removalDelay: 500, //delay removal by X to allow out-animation
			callbacks: {
				beforeOpen: function () {
					// just a hack that adds mfp-anim class to markup 
					this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
					this.st.mainClass = this.st.el.attr('data-effect');
				}
			},
			closeOnContentClick: true,
			midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
		});
	});
	
	
	//Scroll to top
	$(window).on('scroll', function () {
		'use strict';
		if ($(this).scrollTop() != 0) {
			$('#toTop').fadeIn();
		} else {
			$('#toTop').fadeOut();
		}
	});
	$('#toTop').on('click', function () {
		$('body,html').animate({
			scrollTop: 0
		}, 500);
	});
	
		// Sticky filters
	$(window).bind('load resize', function () {
		var width = $(window).width();
		if (width <= 991) {
			$('.sticky_horizontal').stick_in_parent({
				offset_top: 50
			});
		} else {
			$('.sticky_horizontal').stick_in_parent({
				offset_top: 67
			});
		}
	});
	            
	// Secondary nav scroll
	var $sticky_nav= $('.secondary_nav');
	$sticky_nav.find('a').on('click', function(e) {
		e.preventDefault();
		var target = this.hash;
		var $target = $(target);
		$('html, body').animate({
			'scrollTop': $target.offset().top - 138
		}, 800, 'swing');
	});
	$sticky_nav.find('ul li a').on('click', function () {
		$sticky_nav.find('ul li a.active').removeClass('active');
		$(this).addClass('active');
	});
	
	// Faq section
	$('#faq_box a[href^="#"]').on('click', function () {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
			|| location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			   if (target.length) {
				 $('html,body').animate({
					 scrollTop: target.offset().top -185
				}, 800);
				return false;
			}
		}
	});
	$('ul#cat_nav li a').on('click', function () {
		$('ul#cat_nav li a.active').removeClass('active');
		$(this).addClass('active');
	});
	
	// Button show/hide map
	$(".btn_map, .btn_map_in").on("click", function () {
		var el = $(this);
		el.text() == el.data("text-swap") ? el.text(el.data("text-original")) : el.text(el.data("text-swap"));
		// $('html, body').animate({
		// 	scrollTop: $("body").offset().top +385
		// }, 600);
	});
	
	// Panel Dropdown
    function close_panel_dropdown() {
		$('.panel-dropdown').removeClass("active");
    }
    $('.panel-dropdown a').on('click', function(e) {
		if ( $(this).parent().is(".active") ) {
            close_panel_dropdown();
        } else {
            close_panel_dropdown();
            $(this).parent().addClass('active');
        }
        e.preventDefault();
    });

    // Closes dropdown on click outside the conatainer
	var mouse_is_inside = false;

	$('.panel-dropdown').hover(function(){
	    mouse_is_inside=true;
	}, function(){
	    mouse_is_inside=false;
	});

	$("body").mouseup(function(){
	    if(! mouse_is_inside) close_panel_dropdown();
	});
	
	/* Dropdown user logged */
	$('.dropdown-user').hover(function () {
		$(this).find('.dropdown-menu').stop(true, true).delay(50).fadeIn(300);
	}, function () {
		$(this).find('.dropdown-menu').stop(true, true).delay(50).fadeOut(300);
	});

	/* Search Select Box */
	$('.search-bar .search-select .search-select-input, .box_detail .search-select .search-select-input').click(function(){
		$('body .datepicker-dropdown').remove();
		$(this).closest('.search-select').find('.select-item').show();
		if(!$(this).closest('.search-select').hasClass('active')){
			$('.search-select.active').removeClass('active');
			$(this).closest('.search-select').addClass('active');
		}else{
			$(this).closest('.search-select').removeClass('active');
		}
	});

	$('.search-select .select-box .select-item').click(function(){
		$(this).closest('.search-select').find('.select-item').removeClass('active');
		$(this).addClass('active');
		$(this).closest('.search-select .search-select-box').find('input').val('');
		$(this).closest('.search-select').removeClass('active');
		$('.overlay').removeClass('active');
	});

	$(document).ready(function(){
		$('#searchDestinationInput').on('keyup', function() {
			var value = $(this).val().toLowerCase();
			$('.search-destination .select-box .select-item').filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});

	$('.search-destination .select-box .select-item').click(function(){
		var value = $(this).text();
		$("#destination").val(value);

		var id = $(this).data('val');
		$('#destinationId').val(id);
		$('.search-select-input').removeClass('error');
	});

	$('.number-selector .increase-btn').click(function(){
		var value = $(this).closest('.number-selector').find('.number').text();
		var newValue = parseInt(value) + 1;
		$(this).closest('.number-selector').find('.number').text(newValue);
		$(this).closest('.number-selector').find('input').val(newValue);
		
		var totalValue = $('.search-guests .no-of-guests .no').text();
		var newTotalValue = parseInt(totalValue) + 1;
		$('.search-guests .no-of-guests .no').text(newTotalValue);
		$('#noOfGuests').val(newTotalValue);
	});

	$('.number-selector .decrease-btn').click(function(){
		var value = $(this).closest('.number-selector').find('.number').text();
		if(value > 1){
			var newValue = parseInt(value) - 1;
			$(this).closest('.number-selector').find('.number').text(newValue);
			$(this).closest('.number-selector').find('input').val(newValue);
			
			var totalValue = $('.search-guests .no-of-guests .no').text();
			var newTotalValue = parseInt(totalValue) - 1;
			$('.search-guests .no-of-guests .no').text(newTotalValue);
			$('#noOfGuests').val(newTotalValue);
		}
	});

	$('.search-dates').click(function(){
		$('.search-select').removeClass('active');
	});

	$(function(){
		$('.input-daterange').datepicker({
			format: "dd M yyyy",
			orientation: "bottom left",
			autoclose: true,
			startDate: '+0d',
		});
	});

	$(function(){
		var checkinDate = $('.checkin-date').data('date');
		var checkoutDate = $('.checkout-date').data('date');
		if(checkinDate!='' || checkoutDate!=''){
			$('.checkin-date').datepicker('setDate', formatDateDmy(checkinDate));
			$('.checkout-date').datepicker('setDate', formatDateDmy(checkoutDate));
		}
		
		$('.sel-checkin-date').val(checkinDate);
		$('.sel-checkout-date').val(checkoutDate);
	});

	$(document).mouseup(function(e){
		var container = $(".search-select");
	
		if (!container.is(e.target)
			&& container.has(e.target).length === 0)
		{
			$(".search-select").removeClass('active');
		}
	});

	/* Format Dates */
	$("#checkInDatePicker").change(function(d){
		var date = formatDate($(this).val());
		$("#checkInDate").val(date);
		$("#checkOutDate").val(date);
		$('.datepicker').removeClass('error');
	});

	$("#checkOutDatePicker").change(function(d){
		var date = formatDate($(this).val());
		$("#checkOutDate").val(date);
	});

	$(document).on("click", "#searchPropertyForm #checkOutDatePicker", function(){
		$(".datepicker-dropdown").addClass('right-datepicker');
	});

	$(function(){
		$('.search-details-form').find()
	});

	function formatDate(d){
		var date = (new Date(d).getTime());
		var fd = moment(date).format('YYYY-MM-DD');
		return fd;
	}

	function formatDateDmy(d){
		var date = (new Date(d).getTime());
		var fd = moment(date).format('DD-MM-YYYY');
		return fd;
	}

	$('#searchPropertyForm').on('submit', function(e){
		var check = true;
		$('#searchPropertyForm .required').each(function(){
			var value = $(this).val();
			if($.trim(value)==''){
				check = false;
				$(this).addClass('error');
			}else{
				$(this).removeClass('error');
			}
		});
		if(check==false){
			e.preventDefault();
		}
	});

	$('.scroll-to').click(function(e){
		var jump = $(this).attr('href');
		var new_position = $(jump).offset();
		$('html, body').stop().animate({ scrollTop: new_position.top - 100 }, 500);
		e.preventDefault();
	});

	function hideFilter(){
		$('body').removeClass('no-scroll');
		$('.filter-bar .filter').removeClass('active');
		$('.filter-bar .overlay').removeClass('active');
	}

	$(document).on('click', '.filter-bar .filter .filter-btn', function(){
		$('.search-destination .select-box .select-item').show();
		if($(this).closest('.filter').hasClass('active')){
			hideFilter();
		}else{
			$('.filter.active').removeClass('active');
			$(this).closest('.filter').addClass('active');
			$('body').addClass('no-scroll');
			$('.filter-bar .overlay').addClass('active');
		}
	});

	$(document).on('click', '.filter-bar .filters .show-btn', function(e){
		e.preventDefault();
		$(this).closest('.filter-group').find('.filter-list').addClass('active');
		$(this).find('span').text('Show less');
		$(this).find('.fa').removeClass('fa-chevron-down').addClass('fa-chevron-up');
		$(this).addClass('hide-btn').removeClass('show-btn');
	});

	$(document).on('click', '.filter-bar .filters .hide-btn', function(e){
		e.preventDefault();
		$(this).closest('.filter-group').find('.filter-list').removeClass('active');
		$(this).find('span').text('Show all');
		$(this).find('.fa').removeClass('fa-chevron-up').addClass('fa-chevron-down');
		$(this).addClass('show-btn').removeClass('hide-btn');
	});

	$('.filter-bar .filter-save-btn').click(function(){
		hideFilter();
	});

	$(document).on('click', '.filter-bar .price-filter .price', function(){
		hideFilter();
		$(this).closest('.filter').find('.price').removeClass('active');
		$(this).addClass('active');
	});

	if($('#dateRangeInput').length){
		var checkinDate = $('#dateRangeInput').data('checkin-date');
		var checkoutDate = $('#dateRangeInput').data('checkout-date');
		var minDate = moment(new Date());

		if(checkinDate!='' && checkoutDate!=''){
			var start = moment(checkinDate);
			var end = moment(checkoutDate);
		}else{
			var start = moment(new Date()).add(0,'days');
			var end = moment(new Date()).add(3,'days');
		}

		function cb(start, end) {
			$('#dateRangeInput span').html(start.format('D MMM') + ' - ' + end.format('D MMM'));
			setSearchDates(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
		}

		$('#dateRangeInput').daterangepicker({
			startDate: start,
			endDate: end,
			minDate: minDate,
			locale: { cancelLabel: 'Close', applyLabel: 'Save' }
		}, cb);

		cb(start, end);
		
		$('#dateRangeInput').on('hide.daterangepicker', function(ev, picker) {
			hideFilter();
		});
		
	}

	$(document).mouseup(function(e){
		var container = $(".filter-bar .filter .filter-content, .daterangepicker");
	
		if (!container.is(e.target)
			&& container.has(e.target).length === 0)
		{
			hideFilter();
		}
	});
	
	var map;
	var Markers = {};
	var infowindow;
	var i;

	function initialize(locations){
		var origin = new google.maps.LatLng(locations[0][1], locations[0][2]);

		var mapOptions = {
			zoom: 9,
			center: origin
		};

		map = new google.maps.Map(document.getElementById('map'), mapOptions);

		infowindow = new google.maps.InfoWindow();

		for(i=0; i<locations.length; i++) {
			var position = new google.maps.LatLng(locations[i][1], locations[i][2]);
			var marker = new google.maps.Marker({
				position: position,
				icon: "http://www.bookhomestays.in/user_files/images/location-marker-1.png",
				label: "₹"+locations[i][3],
				map: map,
			});
			google.maps.event.addListener(marker, 'click', (function(marker, i) {
				return function() {
					infowindow.setContent(locations[i][0]);
					infowindow.setOptions({maxWidth: 300});
					infowindow.open(map, marker);
				}
			}) (marker, i));
			Markers[locations[i][4]] = marker;
		}
		locate(0);
		
		google.maps.event.addListener(map, "click", function(event) {
			infowindow.close();
		});
	}

	function locate(marker_id) {
		var myMarker = Markers[marker_id];
		var markerPosition = myMarker.getPosition();
		map.setCenter(markerPosition);
		//google.maps.event.trigger(myMarker, 'click');
	}

	$(function(){	
		if($('.filter-bar').length){
			$.get('get_search_properties', function(data){
				var json = data;
				if(json.status=='success'){
					populateSearchResults(json);
				}
			});
		}
	});

	$('.price-filter .price').click(function(){
		var minPrice = $(this).find('.min-price').data('min');
		var maxPrice = $(this).find('.max-price').data('max');
		$.get('filter_property_by_price', {'minPrice': minPrice, 'maxPrice': maxPrice}, function(data){
			var json = data;
			if(json.status=='success'){
				populateSearchResults(json);
			}
		});
	});

	$('.filter-bar .search-destination .select-box .select-item').click(function(){
		var id = $(this).data('val');
		$('#destinationId').val(id);

		$.get('filter_property_by_place', {'placeId': id}, function(data){
			var json = data;
			if(json.status=='success'){
				populateSearchResults(json);
			}
		});
	});

	$('#filterGuestsNoBtn').click(function(){
		var adults = $('#noOfAdults').val();
		var childrens = $('#noOfChildrens').val();

		$.get('filter_property_by_guests', {'adults': adults, 'childrens': childrens}, function(data){
			var json = data;
			if(json.status=='success'){
				populateSearchResults(json);
			}
		});
	});

	$('.filter-list.amenities .amenity').click(function(){
		var amenity = $(this).val();
		
		$.get('filter_property_by_amenities', {'amenity': amenity}, function(data){
			var json = data;
			if(json.status=='success'){
				populateSearchResults(json);
			}
		});
	});

	$('.filter-list.activities .activity').click(function(){
		var activity = $(this).val();
		
		$.get('filter_property_by_activities', {'activity': activity}, function(data){
			var json = data;
			if(json.status=='success'){
				populateSearchResults(json);
			}
		});
	});

	$('.filter-list.preferables .preferable').click(function(){
		var preferable = $(this).val();
		
		$.get('filter_property_by_preferables', {'preferable': preferable}, function(data){
			var json = data;
			if(json.status=='success'){
				populateSearchResults(json);
			}
		});
	});

	function populateSearchResults(json) {
		$('#searchResults').empty();
		var locations = [];
		var i = 0;
		$.each(json.properties, function(){
			var rating = '';
			var stars = this.rating;
			var nonStars = 5 - parseInt(this.rating);
			
			for(var j=0; j < stars; j++){
				rating += '<i class="fa fa-star voted"></i>';
			}
			
			for(var k=0; k < nonStars; k++){
				rating += '<i class="fa fa-star"></i>';
			}

			var output = '<div class="col-sm-6 col-md-6">'+
					'<div class="box_grid">'+
						'<figure>'+
							'<a href="http://www.bookhomestays.in/searchDetails/'+this.id+'" target="_blank">'+
								'<img src="http://www.bookhomestays.in/propertypic/'+this.img+'" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Explore</span></div>'+
							'</a>'+
						'</figure>'+
						'<div class="wrapper">'+
							'<div class="rating">'+
								rating+
							'</div>'+
							'<h3>'+
								'<a href="http://www.bookhomestays.in/searchDetails/'+this.id+'">'+this.name+'</a>'+
							'</h3>'+
							'<span class="price">From <span style="font-family: sans-serif; text-decoration:line-through">Rs. '+this.original_price+'</span> <strong style="font-family: sans-serif;">Rs. '+this.price+'</strong> per night</span>'+
						'</div>'+
						'<ul>'+
							'<li><i class="la la-user" style="font-size: 19px;">'+this.capacity+'</i><span style="padding: 2px;font-size: 12px;">Capacity</span>  </li>'+
							'<li><div class="score"><span><i class="la  la-map-marker" style="font-size: 19px;"></i>'+this.destinationName+'</span></div></li>'+
						'</ul>'+
					'</div>'+
				'</div>';
			$('#searchResults').append(output);
			locations.push(['<div class="property-thumbnail"><img src="http://www.bookhomestays.in/propertypic/'+this.img+'"></div><h4><a href="http://www.bookhomestays.in/searchDetails/'+this.id+'">'+this.name+'</a></h4><div class="property-rating"><i class="fa fa-star voted"></i><i class="fa fa-star voted"></i><i class="fa fa-star voted"></i><i class="fa fa-star voted"></i><i class="fa fa-star voted"></i></div><p>From <strong>&#8377;'+this.price+'</strong> per person</p><p><strong>'+this.capacity+'</strong> Capacity</p>', this.lat, this.lng, this.price, i]);
			i++;
		});

		if(json.recordsFound > 0){
			$('#showStaysBtn').text('Show '+json.recordsFound+' Stays');
			$('#map').addClass('show-map');
			initialize(locations);
		}else{
			$('#searchResults').html('<h1>Oops!! No Properties available</h1>')
			$('#showStaysBtn').text('No Stays Found');
			$('#map').removeClass('show-map');
		}

		if(json.totalSelectedFilters > 0) {
			$('#noOfSelectedFilters').html('&nbsp;&nbsp;- '+json.totalSelectedFilters);
		}else{
			$('#noOfSelectedFilters').text('');
		}	
	}

	function setSearchDates(checkinDate, checkoutDate) {
		$.get('set_search_dates', {'checkinDate': checkinDate, 'checkoutDate': checkoutDate}, function(data){
			var json = data;
			if(json.status=='success'){
				hideFilter();
			}
		});
	}

	$('#showStaysBtn').click(function(){
		hideFilter();
	});

	$('.hide-filters-btn').click(function(){
		hideFilter();
	});

})(window.jQuery); 