
  // (function ($) {
  
  // "use strict";

  //   // MENU
  //   $('.navbar-collapse a').on('click',function(){
  //     $(".navbar-collapse").collapse('hide');
  //   });
    
  //   // CUSTOM LINK
  //   $('.smoothscroll').click(function(){
  //     var el = $(this).attr('href');
  //     var elWrapped = $(el);
  //     var header_height = $('.navbar').height();
  
  //     scrollToDiv(elWrapped,header_height);
  //     return false;
  
  //     function scrollToDiv(element,navheight){
  //       var offset = element.offset();
  //       var offsetTop = offset.top;
  //       var totalScroll = offsetTop-navheight;
  
  //       $('body,html').animate({
  //       scrollTop: totalScroll
  //       }, 300);
  //     }
  //   });

  //   $(window).on('scroll', function(){
  //     function isScrollIntoView(elem, index) {
  //       var docViewTop = $(window).scrollTop();
  //       var docViewBottom = docViewTop + $(window).height();
  //       var elemTop = $(elem).offset().top;
  //       var elemBottom = elemTop + $(window).height()*.5;
  //       if(elemBottom <= docViewBottom && elemTop >= docViewTop) {
  //         $(elem).addClass('active');
  //       }
  //       if(!(elemBottom <= docViewBottom)) {
  //         $(elem).removeClass('active');
  //       }
  //       var MainTimelineContainer = $('#vertical-scrollable-timeline')[0];
  //       var MainTimelineContainerBottom = MainTimelineContainer.getBoundingClientRect().bottom - $(window).height()*.5;
  //       $(MainTimelineContainer).find('.inner').css('height',MainTimelineContainerBottom+'px');
  //     }
  //     var timeline = $('#vertical-scrollable-timeline li');
  //     Array.from(timeline).forEach(isScrollIntoView);
  //   });
  
  // })(window.jQuery);

(function() {
	'use strict';

	var tinyslider = function() {
		var el = document.querySelectorAll('.testimonial-slider');

		if (el.length > 0) {
			var slider = tns({
				container: '.testimonial-slider',
				items: 1,
				axis: "horizontal",
				controlsContainer: "#testimonial-nav",
				swipeAngle: false,
				speed: 700,
				nav: true,
				controls: true,
				autoplay: true,
				autoplayHoverPause: true,
				autoplayTimeout: 3500,
				autoplayButtonOutput: false
			});
		}
	};
	tinyslider();

	


	var sitePlusMinus = function() {

		var value,
    		quantity = document.getElementsByClassName('quantity-container');

		function createBindings(quantityContainer) {
	      var quantityAmount = quantityContainer.getElementsByClassName('quantity-amount')[0];
	      var increase = quantityContainer.getElementsByClassName('increase')[0];
	      var decrease = quantityContainer.getElementsByClassName('decrease')[0];
	      increase.addEventListener('click', function (e) { increaseValue(e, quantityAmount); });
	      decrease.addEventListener('click', function (e) { decreaseValue(e, quantityAmount); });
	    }

	    function init() {
	        for (var i = 0; i < quantity.length; i++ ) {
						createBindings(quantity[i]);
	        }
	    };

	    function increaseValue(event, quantityAmount) {
	        value = parseInt(quantityAmount.value, 10);

	        console.log(quantityAmount, quantityAmount.value);

	        value = isNaN(value) ? 0 : value;
	        value++;
	        quantityAmount.value = value;
	    }

	    function decreaseValue(event, quantityAmount) {
	        value = parseInt(quantityAmount.value, 10);

	        value = isNaN(value) ? 0 : value;
	        if (value > 0) value--;

	        quantityAmount.value = value;
	    }
	    
	    init();
		
	};
	sitePlusMinus();


})()
