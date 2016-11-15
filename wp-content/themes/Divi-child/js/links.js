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

		$("#home-moda").on({
			click: function() {
				window.location.href = rUrl + "/moda";
			}
		});
		$("#home-gastronomia").on({
			click: function() {
				window.location.href = rUrl + "/gastronomia";
			}
		});
		$("#home-salones-y-decoracion").on({
			click: function() {
				window.location.href = rUrl + "/salones-y-decoracion";
			}
		});
		$("#home-animacion").on({
			click: function() {
				window.location.href = rUrl + "/animacion";
			}
		});
		$("#home-estetica").on({
			click: function() {
				window.location.href = rUrl + "/estetica";
			}
		});
		$("#home-fotografia-video-filmacion").on({
			click: function() {
				window.location.href = rUrl + "/fotografia-video-filmacion";
			}
		});
		$("#home-organizacion-de-eventos").on({
			click: function() {
				window.location.href = rUrl + "/organizacion-de-eventos";
			}
		});
		$("#home-otros-servicios").on({
			click: function() {
				window.location.href = rUrl + "/otros-servicios";
			}
		});
	});
})(jQuery);