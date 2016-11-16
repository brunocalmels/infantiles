<?php
/*
Plugin Name: Macher Bodas
Plugin URI: http://macherit.com/productos/mche-bodas
Description: Sistema para integrar clientes y categorías de la plataforma Bodas
Version: 1.0
Author: Bruno Calmels
Author URI: http://macherit.com
Text Domain: mchr-bodas
License: GPLv2
*/

include_once('includes/anunciante-post-type.php');
include_once('includes/anunciante-meta-boxes.php');
include_once('includes/rubros-widget.php');

//  Acciones de Activación
register_activation_hook( __FILE__, 'mchr_install' );
function mchr_install() {
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	global $wp_version;
	global $wpdb;
	if ( version_compare( $wp_version, '4.5', '<' ) ) {
		wp_die( 'Este plugin requiere una versión de WordPress mayor o igual a 4.5.' );
	}

	// Valores por defecto
	/*
	$mchr_options_arr = array();
		update_option( 'mchr_options', $mchr_options_arr );
	*/
}

// Acciones de Desactivación
register_deactivation_hook( __FILE__, 'mchr_uninstall' );
function mchr_uninstall() {
	unregister_taxonomy('rubro');
	unregister_post_type('anunciante');
}

// Registra taxonomias y post custom types
add_action('init', 'registrar_tipos');
function registrar_tipos() {
	reg_rubro_tax();
	reg_anunciante_post_type();
	add_action('add_meta_boxes_anunciante', 'anunciantes_meta_box_init');
}


// Agrega los widgets
add_action( 'widgets_init', 'mchr_registrar_widgets' );

function mchr_registrar_widgets() {
	register_widget( 'mchr_rubros_widget' );
}

// Shortxode dummy para agregar 8 badges
add_shortcode( 'badges', 'badges_shortcode' );
function badges_shortcode( $atts ) {
	for($i=0; $i<8; $i++) {
		?>
		<div class="et_pb_text_align_center org-rubro">
			<img src="http://localhost/bodas/wp-content/uploads/2016/11/moda_icono-150x150.png" alt="moda_icono" width="150" height="150" class="alignnone size-thumbnail wp-image-100">
			<input class="org-check" type="checkbox" name="moda" value="Moda">
			<p>Moda</p>
		</div>
	<?php
	}
}

// Shortcode para el formulario de contacto
add_shortcode( 'formulario', 'formulario_shortcode' );
function formulario_shortcode( $atts ) {
	extract( shortcode_atts( array('locacion' => 'body' // set attribute default
), $atts ) );

	$ret = '<form class="org-formulario" action="' . home_url() . '/form-organizar.php" >';
		$ret .= wp_nonce_field( 'contacto_anunciante', 'chequeo' );

		if( $locacion === 'footer' ) {
			$ret .= '<div class="">';
		}
		else {
			$ret .= '<div class="et_pb_column et_pb_column_1_2 et_pb_column_1">';
		}
			$ret .= '<input type="text" name="nombre" id="nombre" placeholder="Nombre" />';
			$ret .= '<input type="text" name="telefono" id="telefono" placeholder="Teléfono" />';
			$ret .= '<input type="text" name="email" id="email" placeholder="Email" />';
		$ret .= '</div>';
		if( $locacion === 'footer' ) {
			$ret .= '<div class="">';
		}
		else {
			$ret .= '<div class="et_pb_column et_pb_column_1_2 et_pb_column_2">';
			$ret .= '<textarea name="mensaje" id="mensaje" onclick="">Mensaje</textarea>';
		}
			$ret .= '<input type="submit" name="enviar" value="Enviar">';
		$ret .= '</div>';
	$ret .= '</form>';
	return $ret;
}


// Define funcion para loguear
if ( ! function_exists('write_log') ) {
	function write_log ( $log )  {
		if ( is_array( $log ) || is_object( $log ) ) {
			error_log( print_r( $log, true ) );
		} else {
			error_log( $log );
		}
	}
}

?>