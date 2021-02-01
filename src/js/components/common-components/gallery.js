import debounce from "../base-components/debounce";
var controller = new ScrollMagic.Controller();
import bodyLock from "../common-components/bodyLock";


let gallery = () => {

    var galleryItem = '.gallery-item';
    var galleryItemModal = '.gallery-item-modal';
    var galleryNextButton = '.gallery-next';
    var galleryPrevButton = '.gallery-prev';
    var gallerymodalClose = '.gallery-modal-close';


    $(document).ready(function() {
      var itemId = 1;
      var modalId = 1;
      var numItems = $(galleryItem).length;
      var currentItemId;
      var incriment = 1;
      //alert(numItems);

      $(galleryItem).each(function () {
        var id = itemId;
        $(this).attr('id', id);
        ++itemId;
      });

      $(galleryItemModal).each(function () {
        var id = 'modal-'+modalId;
        $(this).attr('id', id);
        ++modalId;
      });

      $(galleryItem).click(function(){
        var itemId = $(this).attr('id');
        var modalId = '#modal-'+itemId;
        currentItemId = itemId;
        $(modalId).fadeIn();
        bodyLock();
    	});

      $(gallerymodalClose).on('click', function () {
          bodyLock();
          $(galleryItemModal).fadeOut();
          $(galleryItemModal).removeClass("active");
      })


      function nextGalleryItem(){
        var nextItemId = parseInt(currentItemId, 10) + parseInt(incriment, 10);
        if(nextItemId > numItems){
          //there is no next loop back
          $('#modal-'+currentItemId).fadeOut();
          $('#modal-1').fadeIn();
          currentItemId = 1;
        } else {
          $('#modal-'+currentItemId).fadeOut();
          $('#modal-'+nextItemId).fadeIn();
          ++currentItemId;
        };
      };

      function prevGalleryItem(){
        var prevItemId = parseInt(currentItemId, 10) - parseInt(incriment, 10);
        if(prevItemId < 1){
          //there is no next loop back
          $('#modal-'+currentItemId).fadeOut();
          $('#modal-'+numItems).fadeIn();
          currentItemId = numItems;
        } else {
          $('#modal-'+currentItemId).fadeOut();
          $('#modal-'+prevItemId).fadeIn();
          --currentItemId;
        };
    	};

      $(galleryNextButton).click(nextGalleryItem);
      $(galleryPrevButton).click(prevGalleryItem);


    });

};

export default gallery;
