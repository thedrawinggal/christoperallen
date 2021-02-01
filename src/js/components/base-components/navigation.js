import bodyLock from "../common-components/bodyLock";

let navigation = () => {
//alert('nav');

  var menuTrigger = '.menu-trigger';

  $(menuTrigger).on('click', function () {
    $('.site-header-menu').fadeToggle('fast').css('display', 'flex');
    bodyLock();
  });

};

export default navigation;
