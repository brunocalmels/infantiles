(function($) {
	$(document).ready(function() {
		$('.et-image-slide img').each(function(){
		  $(this).magnificPopup({
	      type: 'image',
	      closeOnContentClick: true,
	      closeBtnInside: false,
	      gallery: { enabled:true }
		  })
		});

		$('.a-popup').magnificPopup({
		  type: 'image'
		  // other options
		});
	});
}) (jQuery);