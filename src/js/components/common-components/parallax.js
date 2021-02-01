let parallax = () => {
  $(document).ready(function(){
    // Populate images from data attributes.
    $('.parallax').each(function(index) {
        var imageSrc = $(this).data('image-src');
        var imageHeight = $(this).data('height'); 
        $(this).css('background-image','url(' + imageSrc + ')');
        $(this).css('height', imageHeight);
    })
  })
};

export default parallax;


// use like this
// <div class="parallax" id="parallax" data-image-src="image.jpg" data-height="600px" >
//   content here
// </div>
