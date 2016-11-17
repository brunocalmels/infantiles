<?php
// Agrega los estilos del tema padre.
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style ( 'parent-style', get_template_directory_uri() . '/style.css' );
}
?>

<?php
// Agrega JS
function agrega_js() {
    // Efectos visuales
    wp_register_script(
      'effects_js',
      get_stylesheet_directory_uri() . '/js/effects.js',
      array( 'jquery' ),
      '1.0.0',
      true
    );
    wp_enqueue_script('effects_js');
		
    // Links con JS
    wp_register_script(
      'links_js',
      get_stylesheet_directory_uri() . '/js/links.js',
      array( 'jquery' ),
      '1.0.0',
      true
    );
    wp_localize_script(
		  'links_js',
		  'varsGlobalesJS',
		  array(
		    'homeUrl' => esc_url(home_url())
		  )
		);
    wp_enqueue_script('links_js');

		// Formulario con AJAX, con variable global de JS para URL
    wp_register_script(
      'ajax_form_js',
      get_stylesheet_directory_uri() . '/js/ajax_form.js',
      array( 'jquery' ),
      '1.0.0',
      true
    );
    wp_localize_script(
		  'ajax_form_js',
		  'varsGlobalesJS',
		  array(
		    'homeUrl' => esc_url(home_url())
		  )
		);
    wp_enqueue_script('ajax_form_js');

    // Magnific Popup
    wp_register_script(
			'magnific_popup_js',
			get_stylesheet_directory_uri() . '/js/third_party/magnific-popup.js',
			array( 'jquery' ),
			'1.0.0',
			true
    );
    wp_enqueue_script('maginfic_popup_js');

    // Popups para imagenes
    wp_register_script(
			'popup_imgs_js',
			get_stylesheet_directory_uri() . '/js/popup_imgs.js',
			array( 'magnific_popup_js' ),
			'1.0.0',
			true
    );
    wp_enqueue_script('popup_imgs_js');
}

add_action( 'wp_enqueue_scripts', 'agrega_js' );
?>

<?php
	// Agrega estilos de Magnific Popup
	function agrega_magnific_popup_css() {
		wp_register_style(
			'magnific_popup_css',
			get_stylesheet_directory_uri() . '/third_party/magnific-popup.css'
		);
		wp_enqueue_style( 'magnific_popup_css' );
	}
	add_action( 'wp_enqueue_scripts', 'agrega_magnific_popup_css' );
?>

<?php
function agrega_admin_js() {
  // Agrega funcionalidad de media uploader
  wp_register_script(
      'subida_img_js',
      get_stylesheet_directory_uri() . '/js/subida_img.js',
      array( 'jquery' ),
      '1.0.0',
      true
  );
  wp_enqueue_script('subida_img_js');
  wp_enqueue_media(); // Necesario para el media uploader
}

add_action( 'admin_enqueue_scripts', 'agrega_admin_js' );
?>

<?php
function agrega_admin_styles_css() {
	wp_register_style(
		'admin_styles_css',
		get_stylesheet_directory_uri() . '/admin-styles.css'
	);
	wp_enqueue_style( 'admin_styles_css' );
}
add_action( 'admin_enqueue_scripts', 'agrega_admin_styles_css' );
?>

<?php
// Agrega Font Awesome para los iconos.
add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );
function enqueue_load_fa() {
  wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );
}
?>