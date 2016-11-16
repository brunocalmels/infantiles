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
					var foto = "<img src='" + url + "'' alt='" + alt + "' id='img-" + id + "'  class='thumb'/>";
					var hid = "<input type='hidden' id='hid-" + id + "' name='galeria[" + index + "]' value='" + id + "'/>";
					var borrar = "<a class='button borrar' href='#' data-id='" + id + "'>X</a>";
					$('#fotos').append(foto, hid, borrar);
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

		// Borra una imagen que se iba a poner en la galería
		$("#fotos").on( 'click', '.borrar', function(e) {
			e.preventDefault();
			var id = $(this).data('id');
			console.log('Id: ' + id);
			$(this).parent().find('#img-' + id).remove();
			$(this).parent().find('#hid-' + id).remove();
			$(this).remove();
		});

			// Borra una imagen que ya estaba en la galería
			$("#fotos").on( 'click', '.borrar_ya_en_galeria', function(e) {
			e.preventDefault();
			var id = $(this).data('id');
			console.log('Id: ' + id);
			var img = $(this).parent().find('#img-' + id);
			var contador = img.data('cont');
			console.log('Contador: ' + contador);
			img.remove();
			var hid = "<input type='hidden' id='hid-" + id + "' name='remover[" + contador + "]' value='" + id + "'/>";
			$('#fotos').append(hid);
			$(this).remove();
		});

	});
})(jQuery);
