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
			'description'	=> 'Widgets de funciones específicas del sistema Macher-Bodas',
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
					<a href="http://localhost/bodas/rubro/moda">
						<img src='http://localhost/bodas/wp-content/uploads/2016/11/moda_small_hover.png' alt="Moda" class="icono-widget2" data-alt-src='http://localhost/bodas/wp-content/uploads/2016/11/moda_small.png'>
						<div class='nombre'>Moda</div>
					</a>
				</li>
				<li class="widget2 cat-item">
					<a href="http://localhost/bodas/rubro/gastronomia">
						<img src='http://localhost/bodas/wp-content/uploads/2016/11/gastronomia_small_hover.png' alt="Gastronomía" class="icono-widget2" data-alt-src='http://localhost/bodas/wp-content/uploads/2016/11/gastronomia_small.png'>
						<div class='nombre'>Gastronomía</div>
					</a>
				</li>
				<li class="widget2 cat-item">
					<a href="http://localhost/bodas/rubro/salones-y-decoracion">
						<img src='http://localhost/bodas/wp-content/uploads/2016/11/salones_deco_small_hover.png' alt="Salones y decoración" class="icono-widget2" data-alt-src='http://localhost/bodas/wp-content/uploads/2016/11/salones_deco_small.png'>
						<div class='nombre'>Salones y decoración</div>
					</a>
				</li>
				<li class="widget2 cat-item">
					<a href="http://localhost/bodas/rubro/animacion">
						<img src='http://localhost/bodas/wp-content/uploads/2016/11/animacion_small_hover.png' alt="Animación" class="icono-widget2" data-alt-src='http://localhost/bodas/wp-content/uploads/2016/11/animacion_small.png'>
						<div class='nombre'>Animación</div>
					</a>
				</li>
				<li class="widget2 cat-item">
					<a href="http://localhost/bodas/rubro/estetica">
						<img src='http://localhost/bodas/wp-content/uploads/2016/11/estetica_small_hover.png' alt="Estética" class="icono-widget2" data-alt-src='http://localhost/bodas/wp-content/uploads/2016/11/estetica_small.png'>
						<div class='nombre'>Estética</div>
					</a>
				</li>
				<li class="widget2 cat-item">
					<a href="http://localhost/bodas/rubro/fotografia-video-filmacion">
						<img src='http://localhost/bodas/wp-content/uploads/2016/11/fotografia_small_hover.png' alt="Fotografía - video - filmación" class="icono-widget2" data-alt-src='http://localhost/bodas/wp-content/uploads/2016/11/fotografia_small.png'>
						<div class='nombre'>Fotografía - video - filmación</div>
					</a>
				</li>
				<li class="widget2 cat-item">
					<a href="http://localhost/bodas/rubro/organizacion-de-eventos">
						<img src='http://localhost/bodas/wp-content/uploads/2016/11/organizacion_small_hover.png' alt="Organización de eventos" class="icono-widget2" data-alt-src='http://localhost/bodas/wp-content/uploads/2016/11/organizacion_small.png'>
						<div class='nombre'>Organización de eventos</div>
					</a>
				</li>
				<li class="widget2 cat-item">
					<a href="http://localhost/bodas/rubro/otros-servicios"s>
						<img src='http://localhost/bodas/wp-content/uploads/2016/11/otros_small_hover.png' alt="Otros servicios" class="icono-widget2" data-alt-src='http://localhost/bodas/wp-content/uploads/2016/11/otros_small.png'>
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