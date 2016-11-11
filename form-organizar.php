<?php
	require_once("wp-load.php");

	// Recibe los rubros seleccionados
	$rubros = $_REQUEST['rubros'];

	// Envía un email con los rubros.
	$cuerpo = "<p>Hola. Alguien quiere ayuda con la organización de su boda en los siguientes rubros:</p>";
	$cuerpo .= '<p>' . $rubros . '</p>';
	$asunto = "Contacto desde el sitio web";
	$headers = array('Content-Type: text/html; charset=UTF-8', 'From: Sitio web de Revista Bodas <web@revistabodas.com.ar>');
	$destinatarios = 'revistabodas@revistabodas.com.ar';
	write_log( 'Mandando mail con cuerpo: ' . $cuerpo );
	$res = wp_mail( $destinatarios, $asunto, $cuerpo, $headers );
	if( $res )
		echo "true";
	echo "false";
?>