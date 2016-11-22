<?php
	require_once("wp-load.php");

	if ( ! wp_verify_nonce( $_REQUEST['chequeo'], 'contacto_anunciante' ) ) {
	    die( __( 'Security check', 'textdomain' ) ); 
	}
	else {
		// Recibe los rubros seleccionados
		$nombre = $_REQUEST['nombre'];
		$mensaje = $_REQUEST['mensaje'];
		$posicion = $_REQUEST['pos'];
		$email = '';
		if( isset( $_REQUEST['email'] ) )
			$email = $_REQUEST['email'];
		$tel = '';
		if( isset( $_REQUEST['tel'] ) )
			$tel = $_REQUEST['tel'];
		$rubros = '';
		if( isset( $_REQUEST['rubros'] ) )
			$rubros = $_REQUEST['rubros'];

		// Envía un email con los rubros.
		$cuerpo = "<p>Hola.</p>";
		if( $posicion === 'ayuda' ) {
			$cuerpo .= "<p>Alguien quiere ayuda con la organización de su boda en los siguientes rubros:</p>";
			$cuerpo .= '<p>' . $rubros . '</p>';
			$cuerpo .= '<p>Además, dejó el siguiente mensaje: ' . $mensaje . '</p>';
		}
		elseif( $posicion === 'footer' ) {
			$cuerpo .= "<p>Alguien quiere subscribirse al newsletter.</p>";
			$cuerpo .= '<p>Además, dejó el siguiente mensaje: ' . $mensaje . '</p>';
		}
		else {
			$cuerpo .= "<p>Alguien quiere anunciar en la revista.</p>";
		}
		$cuerpo .= '<p>' . "Sus datos son: <ul>";
		$cuerpo .= '<li>Nombre: ' . $nombre . '</li>';
		$cuerpo .= '<li>Email: ' . $email . '</li>';
		$cuerpo .= '<li>Teléfono: ' . $tel . '</li>';
		$cuerpo .= '</ul></p>';
		$asunto = "Contacto desde el sitio web";
		$headers = array('Content-Type: text/html; charset=UTF-8', 'From: Sitio web de Revista Bodas <web@revistabodas.com.ar>');
		$destinatarios = 'revistabodas@revistabodas.com.ar';
		write_log( 'Mandando mail con cuerpo: ' . $cuerpo . ' a ' . $destinatarios );
		$res = wp_mail( $destinatarios, $asunto, $cuerpo, $headers );
		if( $res )
			echo "true";
	echo "false";
	}

?>