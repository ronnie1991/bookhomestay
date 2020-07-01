jQuery(document).ready(function($){
	var contentSections = $('.cd-section'),
		navigationItems = $('#cd-vertical-nav a');
		navigationrightItems = $('#cd-vertical-nav-rt a');

	updateNavigation();
	$(window).on('scroll', function(){
		updateNavigation();
	});

	//smooth scroll to the section
	navigationItems.on('click', function(event){
        event.preventDefault();
        smoothScroll($(this.hash));
	});
	navigationrightItems.on('click', function(event){
        event.preventDefault();
        smoothScroll($(this.hash));
    });
    //smooth scroll to second section
    $('.cd-scroll-down').on('click', function(event){
        event.preventDefault();
        smoothScroll($(this.hash));
    });

    //open-close navigation on touch devices
    $('.touch .cd-nav-trigger').on('click', function(){
    	$('.touch #cd-vertical-nav').toggleClass('open');
		$('.touch #cd-vertical-nav-rt').toggleClass('open');

    });
    //close navigation on touch devices when selectin an elemnt from the list
    $('.touch #cd-vertical-nav a').on('click', function(){
    	$('.touch #cd-vertical-nav').removeClass('open');
	});
	
	$('.touch #cd-vertical-nav-rt a').on('click', function(){
    	$('.touch #cd-vertical-nav-rt').removeClass('open');
    });

	function updateNavigation() {

		contentSections.each(function(){
			$this = $(this);
			var activeSection = $('#cd-vertical-nav a[href="#'+$this.attr('id')+'"]').data('number') - 1;
			if ( ( $this.offset().top - $(window).height()/2 < $(window).scrollTop() ) && ( $this.offset().top + $this.height() - $(window).height()/2 > $(window).scrollTop() ) ) {
				navigationItems.eq(activeSection).addClass('is-selected');
				//console.log("the ac",activeSection);
				$(".arrow-anchor").eq(0).attr("href","#section"+(activeSection));
				$(".arrow-anchor").eq(1).attr("href","#section"+(activeSection+2));
				var currCount=((activeSection+1) < 10)?('0'+(activeSection+1)):(activeSection+1);
				$(".count-list").text(currCount+"/08");
			}else {
				navigationItems.eq(activeSection).removeClass('is-selected');
			}

		
		});

		contentSections.each(function(){
			$this = $(this);
			var activeSection = $('#cd-vertical-nav-rt a[href="#'+$this.attr('id')+'"]').data('number') - 1;
			if ( ( $this.offset().top - $(window).height()/2 < $(window).scrollTop() ) && ( $this.offset().top + $this.height() - $(window).height()/2 > $(window).scrollTop() ) ) {
				navigationrightItems.eq(activeSection).addClass('is-selected');
				//console.log("the ac",activeSection);
				$(".arrow-anchor").eq(0).attr("href","#section"+(activeSection));
				$(".arrow-anchor").eq(1).attr("href","#section"+(activeSection+2));
				var currCount=((activeSection+1) < 10)?('0'+(activeSection+1)):(activeSection+1);
				$(".count-list").text(currCount+"/08");
			}else {
				navigationrightItems.eq(activeSection).removeClass('is-selected');
			}

		
		});

		
	}

	function smoothScroll(target) {
        $('body,html').animate(
        	{'scrollTop':target.offset().top},
        	600
        );
	}

	// $(function () {
	// 	var sidebar = $('.sidebar');
	// 	var top = sidebar.offset().top - parseFloat(sidebar.css('margin-top'));
	  
	// 	$(window).scroll(function (event) {
	// 	  var y = $(this).scrollTop();
	// 	  if (y >= top) {
	// 		sidebar.addClass('fixed');
	// 	  } else {
	// 		sidebar.removeClass('fixed');
	// 	  }
	// 	});
	// });


	$(function () {
		var sidebar = $('.sidebar');
		var listingheight = ($('.footer-wrap').position().top-500);
		var top = ($('.listing-info-sec').position().top+5);
		$(window).scroll(function (event) {
		  var y = $(this).scrollTop();
		  if (y >= top && y < listingheight) {
		  sidebar.addClass('fixed');
		  } else if(y > listingheight) {
		  sidebar.removeClass('fixed');
		  }
		  else
		  {
			sidebar.removeClass('fixed');
		  }
		});
	  });
	

});