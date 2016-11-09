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