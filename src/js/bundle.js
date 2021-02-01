import navigation from "./components/base-components/navigation";
import modal from "./components/base-components/modal";

import gallery from "./components/common-components/gallery";
import parallax from "./components/common-components/parallax";
import pageBannerImageSwapper from "./components/common-components/pageBanner";
import projectsImageSwapper from "./components/common-components/projectsImageSwapper";


import {
  childrenReveal,
  singleReveal,
  fadeReveal,
  parallaxReveal
} from "./components/common-components/elementReveal";

navigation();
parallax();
modal();
gallery();

if ($('.children-reveal')[0]) {
        childrenReveal();
      }

if ($('.single-reveal')[0]) {
    singleReveal();
  }

if ($('.fade-reveal')[0]) {
    fadeReveal();
  }

if ($('.parallax-mirror')) {
    parallaxReveal();
  }

if ($('.page-banner')[0]) {
        pageBannerImageSwapper();
    }

if ($('.project-image')[0]) {
        projectsImageSwapper();
    }


// helper for checking page
function pageChecker(pageClass) {
    return $('#content').hasClass(pageClass)
}

// make img tag svgs targetable by css
$("img.svg").each(function () {
    var $img = jQuery(this);
    var attributes = $img.prop("attributes");
    var imgURL = $img.attr("src");

    $.get(imgURL, function (data) {
        var $svg = $(data).find('svg');
        $svg = $svg.removeAttr('xmlns:a');
        $.each(attributes, function () {
            $svg.attr(this.name, this.value);
        });
        $img.replaceWith($svg);
    });
});


if (!$('a').hasClass('external')) {
    // Add smooth scrolling to all links
    var offset;
    $('a').on('click', function (event) {
        if ($(window))
            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top + 10,
                    easing: "easeInOutQuart",
                }, 500, function () {

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
    });
}
