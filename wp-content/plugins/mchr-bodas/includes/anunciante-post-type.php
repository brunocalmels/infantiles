<?php
// Agrega Anunciante como un Custom Post Type;
function reg_anunciante_post_type () {
	$labels = array(
		'name'					=> 'Anunciantes',
		'singlar_name'			=> 'Anunciante',
		'add_new'				=> 'Agregar anunciante nuevo',
		'add_new_item'			=> 'Agregar anunciante nuevo',
		'edit_item'				=> 'Editar anunciante',
		'new_item'				=> 'Nuevo anunciante',
		'all_items'				=> 'Todos los anunciantes',
		'view_item'				=> 'Ver todos los anunciantes',
		'search_items'			=> 'Buscar anunciantes',
		'not_found'				=> 'No se encontraron anunciantes',
		'not_found_in_trash'	=> 'No se encontraron anunciantes entre los eliminados',
		'menu_name'				=> 'Anunciantes'
		);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => false,
		"show_ui" => true,
		//"has_archive_string" => "",
		"exclude_from_search" => false,
		//"capability_type" => "post",
		"hierarchical" => false,
		"query_var" => true,
		'show_in_admin_bar' => true,
		"menu_position" => 21,
		"show_in_menu" => true,
		//"show_in_menu_string" => "",
		"supports" => ["title", "author"],
		"taxonomies" => ['rubro']
		);
	register_post_type('anunciante', $args);
}

// Añade custom tax de rubro
function reg_rubro_tax () {
	$labels = array(
		'name' => 'Rubros',
		'singular' => 'Rubro',
		'search_items' => 'Buscar rubro',
		'popular_items' => 'Rubros populares',
		'all_items' => 'Todos los rubros',
		'edit_item' => 'Editar rubro',
		'view_item' => 'Ver rubro',
		'add_new_item' => 'Agregar nuevo rubro',
		'new_item_name' => 'Nombre del nuevo rubro',
		'parent_item' => 'Rubro superior',
		'parent_item_colon' => 'Rubro superior:',
		'update_item' => 'Rubro actualizado',
		'menu_name' => 'Rubros'
		);
	$args = array(
			'hierarchical' => true,
			'labels' => $labels,
			'public' => true,
			'show_ui' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud' => false,
			'show_admin_column' => true,
			'query_var' => true,
			);

	register_taxonomy( 'rubro', 'anunciante', $args );
}