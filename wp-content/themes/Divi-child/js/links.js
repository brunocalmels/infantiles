(function($) {

	var baseUrl = varsGlobalesJS.homeUrl;
	var rUrl = baseUrl + '/rubro';

	$(document).ready(function(){
		$("#home-rubros").children().on({
			mouseenter: function() {
				$(this).css('cursor', 'pointer');
			},
			mouseleave: function() {
				$(this).css('cursor', 'initial');
			},
		});

		$("#home-animacion-organizacion").on({
			click: function() {
				window.location.href = rUrl + "/animacion-organizacion";
			}
		});
		$("#home-bebes-ninos").on({
			click: function() {
				window.location.href = rUrl + "/bebes-ninos";
			}
		});
		$("#home-cabina-fotos").on({
			click: function() {
				window.location.href = rUrl + "/cabina-fotos";
			}
		});
		$("#home-colonias-escuelas").on({
			click: function() {
				window.location.href = rUrl + "/colonias-escuelas";
			}
		});
		$("#home-salones-peloteros").on({
			click: function() {
				window.location.href = rUrl + "/salones-peloteros";
			}
		});
		$("#home-otros-servicios").on({
			click: function() {
				window.location.href = rUrl + "/otros-servicios";
			}
		});
	});
})(jQuery);