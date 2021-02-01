import debounce from "../base-components/debounce";
var controller = new ScrollMagic.Controller();

let carousel = () => {

    var carouselItem = '.carousel-item';
    var carouselImage = '.carousel-image';
    var carouselNavItem = '.carousel-nav-item';
    var carouselRotation = $('.carousel-wrapper').attr('rotation');
    var carouselSpeed = $('.carousel-wrapper').attr('speed')+'000';
    var intervalID;

    $(window).on('resize load', debounce(function () {
        $(carouselImage).each(function () {
            var self = this;
            if ($(window).width() < 992) {
                $(self).children().attr('src', $(self).data('mobile-url'));
            } else {
                $(self).children().attr('src', $(self).data('desktop-url'));
            }
        })
    }, 50));


    $(document).ready(function() {
      var initSlideId = 0;
      var initNavId = 0;

      $(carouselItem).each(function () {
        var id = 'slide'+initSlideId;
        $(this).attr('id', id);
        ++initSlideId;
      });

      $(carouselNavItem).each(function () {
        var id = initNavId;
        $(this).attr('id', id);
        ++initNavId;
      });

      $(carouselItem).hide(); // Hide all the slides
    	$(carouselItem+':first').show(); // Show the first slide
      $(carouselItem+':first').addClass('active');
    	$(carouselNavItem+':first').addClass('active');

      $(carouselNavItem).click(function(){

        //cycleSlides = false;
        var navId = $(this).attr('id');

    		if ($(this).is(".active")) {  // If it's already active, then...
    			return false; // Don't click through
    		} else {
          $(carouselItem).hide();
          $(carouselItem).removeClass('active');


          $('#slide'+navId).show();
          $('#slide'+navId).addClass('active');
    		}

    		$(carouselNavItem).removeClass('active'); // Remove class of 'active' on all lists
    		$(this).addClass('active');  // add class of 'active' on this list only
    		return false;

    	});

      $(carouselNavItem).hover(function(){
    		$(this).addClass('hover');
    		}, function() {
    		$(this).removeClass('hover');
    	});

      if (carouselRotation == 1) {
        intervalID = setInterval(cycleSlides, carouselSpeed);
        //alert(carouselSpeed);
      }else{
        //alert('rotation off');
      }


      function cycleSlides(){
        var onLast = $(carouselNavItem+':last').hasClass("active");
        var currentSlide = $(carouselItem+'.active');
        var currentNav = $(carouselNavItem+'.active');


        if(onLast){
          var nextSlide = $(carouselItem+':first');
          var nextNav = $(carouselNavItem+':first');
        } else {
          var nextSlide = $(carouselItem+'.active').next();
          var nextNav = $(carouselNavItem+'.active').next();
        }

        $(currentSlide).hide();
        $(currentSlide).removeClass("active");
        $(currentNav).removeClass("active");
        $(nextSlide).show();
        $(nextSlide).addClass("active");
        $(nextNav).addClass("active");

      };


    });

};

export default carousel;
