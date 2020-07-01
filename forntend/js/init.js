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
var swiper = new Swiper('.location-slider .swiper-container', {
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
	////////////////////////////////
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
	
})(window.jQuery); 