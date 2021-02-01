import debounce from "../base-components/debounce";
var controller = new ScrollMagic.Controller();

// swap image urls for devices
let projectsImageSwapper = () => {
    var projectImage = '.project-image';
    $(window).on('resize load', debounce(function () {
        $(projectImage).each(function () {
            var self = this;
              if ($(self).data('mobile-url')) {
                if ($(window).width() < 992) {
                    $(self).children().attr('src', $(self).data('mobile-url'));
                } else {
                    $(self).children().attr('src', $(self).data('desktop-url'));
                }
              } else {
                $(self).children().attr('src', $(self).data('desktop-url'));
              }
        })
    }, 50));
};


export default projectsImageSwapper;
