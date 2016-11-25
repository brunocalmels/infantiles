(function($) {
	$(document).ready(function() {

		var url = varsGlobalesJS.homeUrl;

		// Popup en homepage
		var popup_div = "<div id='popup_wrapper'><div id='popup_inner'><div id='popup-1er-p'>En Revista Infantiles sabemos de esto</div><div id='popup-2do-p'>¿Querés que te ayudemos a organizar tu evento?</div><div id='popup-3er-p'><a href='" + url + '/recomendaciones' + "'>Con tan sólo unos clics.</a></div><div id='popup_close'>&times;</div></div></div>";
		$('.home').append(popup_div);
		// Setear el tiempo para que aparezca (10 segundos...)
		setTimeout( function(){ $('#popup_wrapper').css('right', '40px'); }, 5000);

		// Funcionalidad de cerrar el popup
		$('#popup_close').on({
			click: function() {
				$('#popup_wrapper').css('right', '-7000px');
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
