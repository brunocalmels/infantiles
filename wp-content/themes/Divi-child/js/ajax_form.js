function enviarMail(str) {
	var ajax = new XMLHttpRequest();
  ajax.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      	if (this.responseText.indexOf("true") > 0)
          alert("Te contactaremos en breve para ayudarte a organizar el mejor día de tu vida.");
        else
        	alert("No se pudo enviar el formulario. Por favor, comunicate con nosotros telefónicamente y te atenderemos con gusto.");
      }
  };
  ajax.open("GET", varsGlobalesJS.homeUrl + "/form-organizar.php?rubros=" + str, true);
  ajax.send();
}

(function($) {
	$(document).ready(function(){

		$('#org-submit').on({
			click: function(e){
				e.preventDefault();
				// Validacion de campos de contacto completos
				var email  = $('#org-email')[0].value;
				var tel    = $('#org-tel')[0].value;
				var nombre = $('#org-nombre')[0].value;
				if (nombre == '' || nombre == null) {
					alert('Por favor incluí un nombre.');
					return;
				}
				if ((email == null || email == '') && (tel == "" || tel == null)) {
					alert('Por favor incluí un email o un teléfono.');
					return;
				}
				var lista = '';
				var rubros = $('input.org-check');
				for (i = 0; i < rubros.length; i++) {
					if (rubros[i].checked) {
						lista += rubros[i].value + ' ';
					}
				}
				enviarMail(lista);
			}
		}

		)

	});
})(jQuery);