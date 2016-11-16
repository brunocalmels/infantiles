<?php
	require_once("wp-load.php");

	if ( ! wp_verify_nonce( $_POST['chequeo'], 'contacto_anunciante' ) ) {
	    die( __( 'Security check', 'textdomain' ) ); 
	}
	else {
		// Recibe los rubros seleccionados
		$rubros = $_REQUEST['rubros'];
		$nombre = $_REQUEST['nombre'];
		$email = $_REQUEST['email'];
		$tel = $_REQUEST['tel'];
		$mensaje = $_REQUEST['mensaje'];

		// Envía un email con los rubros.
		$cuerpo = "<p>Hola. Alguien quiere ayuda con la organización de su boda en los siguientes rubros:</p>";
		$cuerpo .= '<p>' . $rubros . '</p>';
		$cuerpo .= '<p>Además, dejó el siguiente mensaje: ' . $mensaje . '</p>';
		$cuerpo .= '<p>' . "Sus datos son: <ul>";
		$cuerpo .= '<li>Nombre: ' . $nombre . '</li>';
		$cuerpo .= '<li>Email: ' . $email . '</li>';
		$cuerpo .= '<li>Teléfono: ' . $tel . '</li>';
		$cuerpo .= '</ul></p>';
		$asunto = "Contacto desde el sitio web";
		$headers = array('Content-Type: text/html; charset=UTF-8', 'From: Sitio web de Revista Bodas <web@revistabodas.com.ar>');
		$destinatarios = 'revistabodas@revistabodas.com.ar';
		write_log( 'Mandando mail con cuerpo: ' . $cuerpo );
		$res = wp_mail( $destinatarios, $asunto, $cuerpo, $headers );
		if( $res )
			echo "true";
	echo "false";
	}

?>