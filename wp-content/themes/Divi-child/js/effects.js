(function($) {
	$(document).ready(function(){
	  $(".rubro").on({
			mouseenter: function(){
				$(this).find(".hover").toggleClass("resaltada");
				$(this).find(".nombre").toggleClass("resaltada");

		    var img = $(this).find("img");
		    var newSource = img.data('alt-src');
		    img.data('alt-src', img.attr('src'));
		    img.attr('src', newSource);
	  },
			mouseleave: function(){
				$(this).find(".hover").toggleClass("resaltada");
				$(this).find(".nombre").toggleClass("resaltada");

		    var img = $(this).find("img");
		    var newSource = img.data('alt-src');
		    img.data('alt-src', img.attr('src'));
		    img.attr('src', newSource);
		}
	  });
	  $("textarea").on({
			active: function() {
				$(this).addCss('color', '#111');
			},
			click: function() {
				$(this).html('');
			}
		});
		$("li.widget2").on({
			mouseenter: function(){
				$(this).toggleClass("resaltada");
				$(this).find(".nombre").toggleClass("resaltada");

		    var img = $(this).find("img");
		    var newSource = img.data('alt-src');
		    img.data('alt-src', img.attr('src'));
		    img.attr('src', newSource);
	  },
			mouseleave: function(){
				$(this).toggleClass("resaltada");
				$(this).find(".nombre").toggleClass("resaltada");

		    var img = $(this).find("img");
		    var newSource = img.data('alt-src');
		    img.data('alt-src', img.attr('src'));
		    img.attr('src', newSource);
			}
		});
	});
})(jQuery);