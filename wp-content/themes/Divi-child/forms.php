<?php
// Envia un email al site owner con la informacion de contacto de un formulario
require_once("wp-load.php");

if( isset( $_POST['contacto'] ) ) {
	wp_verify_nonce( plugin_basename( __FILE__ ), 'contacto_anunciante' );
	$subect = 'Contacto desde el sitio web de Bodas';
	$content = 'Hola, Raimundo.</br>';
	if( isset( $_POST['anunciante'] ) )
		$content .= 'El cliente escribió para contactarse con ' . $_POST['anunciante'];
	$content .= 'Los siguientes son los campos completados:</br>';
	if( isset( $_POST['nombre'] ) )
		$content .= "Nombre: " . $_POST['nombre'] . '</br>';
	if( isset( $_POST['telefono'] ) )
		$content .= "Teléfono: " . $_POST['telefono'] . '</br>';
	if( isset( $_POST['email'] ) )
		$content .= "Email: " . $_POST['email'] . '</br>';
	if( isset( $_POST['mensaje'] ) )
		$content .= "Mensaje: " . $_POST['mensaje'] . '</br>';
	$content .= "Saludos.";
	$headers = array('Content-Type: text/html; charset=UTF-8', 'From: Revista Bodas <revistabodas@revistabodas.com.ar>');
	$destinatarios = 'brunocalmels@gmail.com'
	wp_mail( $destinatarios, $subject, $cuerpo, $headers );
}


?>