(function($) {
	$(document).ready(function() {

		var url = varsGlobalesJS.homeUrl;

		// Popup en homepage
		var popup_div = "<div id='popup_wrapper'><p>En Bodas sabemos de esto.</p><p>¿Querés que te ayudemos a organizar tu evento?<p><a href='" + url + 'te_ayudamos' + "'>Con tan sólo unos clics.</a><div id='popup_close'>x</div></div>";
		$('.home').append(popup_div);
		// Setear el tiempo para que aparezca (10 segundos...)
		$('#popup_wrapper').css('right', '40px');

		// Funcionalidad de cerrar el popup
		$('#popup_close').on({
			click: function() {
				$('#popup_wrapper').css('right', '-700px');
			}
		})
		
		// Para que las imagenes de las galerias se abran con popup
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
		});
	});
}) (jQuery);
