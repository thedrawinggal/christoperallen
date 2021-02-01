var controller = new ScrollMagic.Controller();

let childrenReveal = () => {
    var childrenRevealWrapper = '.children-reveal';
    var childrenRevealChild = '.children-reveal-child';

    $(childrenRevealWrapper).each(function () {
        var self = this;
        var childrenRevealWrapperScene = new ScrollMagic.Scene({
            triggerElement: self,
            triggerHook: .75,
            offset: 0,
            duration: 0,
            reverse: false,
        }).addTo(controller);

        childrenRevealWrapperScene.on('start', function () {
            TweenMax.staggerFromTo($(self).find(childrenRevealChild), 2, {
                y: 75,
                opacity: 0,
            }, {
                y: 0,
                opacity: 1,
                ease: Expo.easeOut,
            }, .1);
        })
    })
};

let singleReveal = () => {
    var singleReveal = '.single-reveal';
    $(singleReveal).each(function () {

        var self = this;
        var singleRevealScene = new ScrollMagic.Scene({
            triggerElement: self,
            triggerHook: .75,
            offset: 0,
            duration: 0,
            reverse: false,
        }).addTo(controller);

        singleRevealScene.on('start', function () {
            TweenMax.fromTo($(self), 2, {
                y: 75,
                opacity: 0,
            }, {
                y: 0,
                opacity: 1,
                ease: Expo.easeOut,
            });
        })
    })
};

let fadeReveal = () => {
    var fadeReveal = '.fade-reveal';
    $(fadeReveal).each(function () {
        var self = this;
        var fadeRevealScene = new ScrollMagic.Scene({
            triggerElement: self,
            triggerHook: .75,
            offset: 0,
            duration: 0,
            reverse: false,
        }).addTo(controller);

        fadeRevealScene.on('start', function () {
            TweenMax.fromTo($(self), 2, {
                opacity: 0,
            }, {
                opacity: 1,
                ease: Expo.easeOut,
            });
        })
    })
};

let parallaxReveal= () => {
    var parallaxReveal = '.parallax-mirror';
      $(parallaxReveal).each(function () {
          var self = this;
          var parallaxRevealScene = new ScrollMagic.Scene({
              triggerElement: self,
              triggerHook: .75,
              offset: 0,
              duration: 0,
              reverse: false,
          }).addTo(controller);

          parallaxRevealScene.on('start', function () {
              TweenMax.fromTo($(self), 2, {
                  opacity: 0,
              }, {
                  opacity: 1,
                  ease: Expo.easeOut,
              });
          })
      })
};

export {
    childrenReveal,
    singleReveal,
    fadeReveal,
    parallaxReveal
};
