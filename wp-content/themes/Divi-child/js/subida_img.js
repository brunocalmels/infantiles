(function($) {
	$(document).ready(function(){

		$('#img_upload').click(function(e) {
		  e.preventDefault();

		  frame = wp.media({
		    title : 'Seleccionar imagen',
		    multiple : false,
		    library : { type : 'image'},
		    button : { text : 'Elegir' },
		  })
		  .on('select', function() {
				var attachment = frame.state().get('selection').first().toJSON();
        $('#logo_img').attr('src', attachment.url);
        $('#logo_url').val(attachment.url);
		  })
		  .on('close', function() {
		  	// Se puede hacer algo de AJAX si hace falta...
		  })
			.on('open', function() {
			  //Se podria hacer que reconozca el archivo ya seleccionado...
			})
			.open();
		});
	});
})(jQuery);