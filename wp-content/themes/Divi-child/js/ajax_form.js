function enviarMail(str) {
	var ajax = new XMLHttpRequest();
  ajax.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          alert(this.responseText);
      }
  };
  ajax.open("GET", varsGlobalesJS.homeUrl + "/form-organizar.php?rubros=" + str, true);
  ajax.send();
}

(function($) {
	$(document).ready(function(){

		$('#org-submit').on({
			click: function(){
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