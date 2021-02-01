import debounce from "../base-components/debounce";
var controller = new ScrollMagic.Controller();

// swap image urls for devices
let pageBannerImageSwapper = () => {
    var pageBanner = '.page-banner';
    $(window).on('resize load', debounce(function () {
        $(pageBanner).each(function () {
            var self = this;
            if ($(self).hasClass('image') && $(self).data('mobile-url')) {
                if ($(window).width() < 992) {
                    //alert("mobile");
                    $(self).css( "background-image", "url(" + $(self).data('mobile-url') + ")" );
                } else {
                    //alert("desktop");
                    $(self).css( "background-image", "url(" + $(self).data('desktop-url') + ")" );
                }
            } else {
              $(self).css( "background-image", "url(" + $(self).data('desktop-url') + ")" );
            };
            if ($(self).hasClass('video-autoplay') && $(self).data('mobile-url')) {
                if ($(window).width() < 768) {
                    //alert("mobile");
                    $(self).css( "background-image", "url(" + $(self).data('mobile-url') + ")" );
                }
            };
        })
    }, 50));
  };


export default pageBannerImageSwapper;
