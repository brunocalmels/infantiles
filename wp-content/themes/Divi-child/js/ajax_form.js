function enviarMail(chequeo, posicion, nombre, email, tel, mensaje, lista) {
	var ajax = new XMLHttpRequest();
  ajax.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      	console.log(this.responseText);
      	if (this.responseText.indexOf("true") > 0)
          alert("Te contactaremos en breve para ayudarte a organizar el mejor día de tu vida.");
        else
        	alert("No se pudo enviar el formulario. Por favor, comunicate con nosotros telefónicamente y te atenderemos con gusto.");
      }
  };
  ajax.open("GET", varsGlobalesJS.homeUrl + "/form-organizar.php?chequeo=" + chequeo + "&nombre=" + nombre + "&email=" + email + "&tel=" + tel + "&mensaje=" + mensaje + "&rubros=" + lista + "&pos=" + posicion, true);
  ajax.send();
}

(function($) {
	$(document).ready(function(){
		$('.formulario-div').on('click', 'input[type=submit]', function(e) {
				e.preventDefault();
				// Validacion de campos de contacto completos
				var padre = $(this).parents('form');
				var email = padre.find('#email')[0].value;
				var tel    = padre.find('#telefono')[0].value;
				var nombre = padre.find('#nombre')[0].value;
				var chequeo = padre.find('#chequeo')[0].value;
				var posicion = padre.find('#pos')[0].value;
				var mensaje = padre.find('#mensaje')[0].value;
				if (nombre == '' || nombre == null) {
					alert('Por favor incluí un nombre.');
					return;
				}
				if ((email == null || email == '') && (tel == "" || tel == null)) {
					alert('Por favor incluí un email o un teléfono.');
					return;
				}
				var lista = '';
				var rubros = $('#org-rubros').find('input.org-check');
				for (i = 0; i < rubros.length; i++) {
					if (rubros[i].checked) {
						lista += rubros[i].value + ', ';
					}
				}
				enviarMail(chequeo, posicion, nombre, email, tel, mensaje, lista);
				padre.trigger('reset');
			})
		})
})(jQuery);


function enviarMailAnunciante(chequeo, anunciante, nombre, email, tel, mensaje) {
	var ajax = new XMLHttpRequest();
  ajax.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      	if (this.responseText.indexOf("true") > 0)
          alert("En breve te ponemos en contacto con " + anunciante + ".");
        else
        	alert("No se pudo enviar el formulario. Por favor, comunicate con nosotros telefónicamente y te atenderemos con gusto.");
      }
  };
  ajax.open("GET", varsGlobalesJS.homeUrl + "/form-anunciante.php?anunciante=" + anunciante + "&chequeo=" + chequeo + "&nombre=" + nombre + "&email=" + email + "&tel=" + tel + "&mensaje=" + mensaje, true);
  ajax.send();
}

(function($) {
	$(document).ready(function(){
		$('.an-formulario').on('click', 'input[type=submit]', function(e) {
				e.preventDefault();
				// Validacion de campos de contacto completos
				var padre = $(this).parents('form');
				var email = padre.find('#email')[0].value;
				var tel    = padre.find('#telefono')[0].value;
				var nombre = padre.find('#nombre')[0].value;
				var chequeo = padre.find('#chequeo')[0].value;
				var anunciante = padre.find('#anunciante')[0].value;
				var mensaje = padre.find('#mensaje')[0].value;
				if (nombre == '' || nombre == null) {
					alert('Por favor incluí un nombre.');
					return;
				}
				if ((email == null || email == '') && (tel == "" || tel == null)) {
					alert('Por favor incluí un email o un teléfono.');
					return;
				}
				enviarMailAnunciante(chequeo, anunciante, nombre, email, tel, mensaje);
				padre.trigger('reset');
			})
		})
})(jQuery);