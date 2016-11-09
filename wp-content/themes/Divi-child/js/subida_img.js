(function($) {
	$(document).ready(function(){

		$('#img_upload').click(function(e) {
		  e.preventDefault();
		  frame = wp.media({
		    title : 'My Gallery Title',
		    multiple : true,
		    library : { type : 'image'},
		    button : { text : 'Insert' },
		  });
		  frame.on('close',function() {
		    // get selections and save to hidden input plus other AJAX stuff etc.
		  });
			frame.on('open',function() {
			  var selection = frame.state().get('selection');
			  ids = $('#my_field_id').val().split(',');
		    ids.forEach(function(id) {
				  attachment = wp.media.attachment(id);
				  attachment.fetch();
				  selection.add( attachment ? [ attachment ] : [] );
				});
			});
			frame.open();
		});

	});
})(jQuery);