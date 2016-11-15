(function($) {
	$(document).ready(function(){

		// Para la imagen del logotipo
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

		// Para las imagenes de la galeria
		$('#nueva_foto_upload').click(function(e) {
			e.preventDefault();
			var ids = [];
			frame = wp.media({
		    title : 'Seleccionar imagen',
		    multiple : true,
		    library : { type : 'image'},
		    button : { text : 'Elegir' },
		  })
		  .on('select', function() {
				frame.state().get('selection').forEach( function(item, index) {
					// Agrega la id para ponerle el post_parent 
					itemJ = item.toJSON();
					var id = itemJ.id;
					var url = itemJ.url;
					var alt = itemJ.title;
					console.log('Id: ' + itemJ.id + ' - URL: ' + url + ' - alt: ' + alt);
					// Crea un elemento nodo img con esta foto
					var foto = "<img src='" + url + "'' alt='" + alt + "' class='thumb'/>";
					var hid = "<input type='hidden' name='galeria[" + index + "]' value='" + id + "'/>";
					$('#fotos_galeria').prepend(foto, hid);
				});
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



// Falta enqueuear el estil para que salgan como .thumb en backend admin, y agregarle el post_parent en anunciante_guardar_meta_box().