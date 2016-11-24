<?php
class mchr_rubros_widget extends WP_Widget {
	public $id_base;
	public $name;
	public $widget_options;
	public $control_options;
	public $number = false;
	public $id = false;
	public $updated = false;

	function __construct() {
		$widget_opts = array(
			'classname'		=> 'mchr_widget_class',
			'description'	=> 'Widgets de funciones específicas del sistema Macher-infantiles',
			);
        $this->id_base ='mchr_rubros_widget';
        $this->name = 'Rubros Widget';
        $this->option_name = 'widget_' . $this->id_base;
        $this->widget_options = wp_parse_args( $widget_opts, array( 'classname' => $this->option_name, 'customize_selective_refresh' => false ) );
        $this->control_options = wp_parse_args( array(), array( 'id_base' => $this->id_base ) );
    }

	
	function form( $instance ) {
		$defaults = array(
			'titulo' => 'Rubros',
			'tax' => 'rubro',
			);
		$instance = wp_parse_args( (array) $instance, $defaults );
		$titulo = $instance['titulo'];
		$tax = $instance['tax'];
?>
		<p>
			Título:
			<input class="widefat"
				name="<?php echo $this->get_field_name( 'titulo' ); ?>"
				type="text" value="<?php echo esc_attr( $titulo ); ?>" />
		</p>
		<p>
			Taxonomía:
			<input class="widefat"
				name="<?php echo $this->get_field_name( 'tax' ); ?>"
				type="text" value="<?php echo esc_attr( $tax ); ?>" />
		</p>
		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['titulo'] = sanitize_text_field( $new_instance['titulo'] );
		$instance['tax'] = sanitize_text_field( $new_instance['tax'] );
		return $instance;
	}

	function widget( $args, $instance ) {
		global $wpdb;
		extract( $args );
		echo $before_widget;
		$title = apply_filters( 'widget_title', $instance['titulo'] );
		if ( !empty( $title ) ) {
			//echo $before_title . esc_html( $title )	. $after_title;
		};

		?>
	    <ul>

				<li class="widget2 cat-item">
					<a href="<?php echo home_url(); ?>/rubro/animacion-organizacion">
						<img src='<?php echo home_url(); ?>/wp-content/uploads/2016/11/animacion_organizacion_small_hover.png' alt="Animacion y organizacion" class="icono-widget2" data-alt-src='<?php echo home_url(); ?>/wp-content/uploads/2016/11/animacion_organizacion_small.png'>
						<div class='nombre'>Animación infantil y organización de eventos</div>
					</a>
				</li>
				<li class="widget2 cat-item">
					<a href="<?php echo home_url(); ?>/rubro/bebes-ninos">
						<img src='<?php echo home_url(); ?>/wp-content/uploads/2016/11/bebes_ninos_small_hover.png' alt="Bebés y niños" class="icono-widget2" data-alt-src='<?php echo home_url(); ?>/wp-content/uploads/2016/11/bebes_ninos_small.png'>
						<div class='nombre'>Bebés y niños</div>
					</a>
				</li>
				<li class="widget2 cat-item">
					<a href="<?php echo home_url(); ?>/rubro/cabina-fotos">
						<img src='<?php echo home_url(); ?>/wp-content/uploads/2016/11/cabina_fotos_small_hover.png' alt="Cabina de fotos" class="icono-widget2" data-alt-src='<?php echo home_url(); ?>/wp-content/uploads/2016/11/cabina_fotos_small.png'>
						<div class='nombre'>Cabina de fotos</div>
					</a>
				</li>
				<li class="widget2 cat-item">
					<a href="<?php echo home_url(); ?>/rubro/colonias-escuelas">
						<img src='<?php echo home_url(); ?>/wp-content/uploads/2016/11/colonias_escuelas_small_hover.png' alt="Colonias de vacaciones - Escuelas deportivas" class="icono-widget2" data-alt-src='<?php echo home_url(); ?>/wp-content/uploads/2016/11/colonias_escuelas_small.png'>
						<div class='nombre'>Colonias de vacaciones - Escuelas deportivas</div>
					</a>
				</li>
				<li class="widget2 cat-item">
					<a href="<?php echo home_url(); ?>/rubro/salones-peloteros">
						<img src='<?php echo home_url(); ?>/wp-content/uploads/2016/11/salones_peloteros_small_hover.png' alt="Salones y peloteros" class="icono-widget2" data-alt-src='<?php echo home_url(); ?>/wp-content/uploads/2016/11/salones_peloteros_small.png'>
						<div class='nombre'>Salones y peloteros</div>
					</a>
				</li>
				<li class="widget2 cat-item">
					<a href="<?php echo home_url(); ?>/rubro/otros-servicios"s>
						<img src='<?php echo home_url(); ?>/wp-content/uploads/2016/11/otros_servicios_small_hover.png' alt="Otros servicios" class="icono-widget2" data-alt-src='<?php echo home_url(); ?>/wp-content/uploads/2016/11/otros_servicios_small.png'>
						<div class='nombre'>Otros servicios</div>
					</a>
				</li>

		<?php
		/*
      $cat_args['title_li'] = '';
      $cat_args['taxonomy'] = 'rubro';
      $cat_args['depth'] = 1;
      $cat_args['hide_empty'] = false;

      wp_list_categories( apply_filters( 'widget_categories_args', $cat_args ) );
      */
      ?>
      
      </ul>
<?php
		 echo $after_widget;
	}
}

?>