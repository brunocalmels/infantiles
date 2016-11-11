<div class="titulo_franja">
	<div id="bodas_header">
		<p>BodaS</p>
	</div>
	<div id="sep_header"></div>
	<div id="subt_header">
		<p>Contactate con nosotros para ser parte del portal y promocionar tu marca.</p>
	</div>
</div>

<form class="org-formulario" action="#">
<?php
	// Nonce for security
	wp_nonce_field( plugin_basename( __FILE__ ), 'contacto_anunciante' );
	echo '<input type="text" name="nombre" placeholder="Nombre" />';
	echo '<input type="text" name="telefono" placeholder="Teléfono" />';
	echo '<input type="text" name="email" placeholder="Email" />';
	echo '<textarea name="mensaje" onclick="">Mensaje</textarea>';
	echo '<input type="submit" name="enviar" value="Enviar">'
?>
</form>