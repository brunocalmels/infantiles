<?php
// Agrega los estilos del tema padre.
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style ( 'parent-style', get_template_directory_uri() . '/style.css' );
}
?>

<?php
// Agrega archivos de efectos y estetitca con JS
function agrega_efectos_js() {
    wp_enqueue_script(
        'custom-script',
        get_stylesheet_directory_uri() . '/js/effects.js',
        array( 'jquery' ),
        '1.0.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'agrega_efectos_js' );
?>

<?php
add_action( 'admin_enqueue_scripts', 'wp_enqueue_media' );
?>

<?php
// Agrega funcionalidad de media uploader
function subida_img_js() {
    wp_enqueue_script(
        'custom-script',
        get_stylesheet_directory_uri() . '/js/subida_img.js',
        array( 'jquery' ),
        '1.0.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'subida_img_js' );
?>

<?php
// Agrega Font Awesome para los iconos.
add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );
function enqueue_load_fa() {
    wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );
}
?>