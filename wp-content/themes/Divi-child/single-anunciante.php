<?php

get_header();

$show_default_title = get_post_meta( get_the_ID(), '_et_pb_show_title', true );

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>

<div id="main-content">
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">
				<?php while ( have_posts() ) :
				  the_post();
				  $post_cliente = wp_get_post_terms( $post->ID, 'cliente', array('fields' => 'all') );
				?>
				<?php if (et_get_option('divi_integration_single_top') <> '' && et_get_option('divi_integrate_singletop_enable') == 'on') echo(et_get_option('divi_integration_single_top')); ?>

				<?php
						  $et_pb_has_comments_module = has_shortcode( get_the_content(), 'et_pb_comments' );
						  $additional_class = $et_pb_has_comments_module ? ' et_pb_no_comments_section' : '';
				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' . $additional_class ); ?>>
					<?php if ( ( 'off' !== $show_default_title && $is_page_builder_used ) || ! $is_page_builder_used ) { ?>

					<?php  } ?>

					<div class="entry-content">
						<?php
						  do_action( 'et_before_content' );
						?>
						
						<!-- Recuadro contenedor -->
						<div id="anunciante">
							<div id="an-nombre">
								<?php echo '<h1>' . $post->post_title . '</h1>'; ?>
							</div>		
							<div id="an-datos">
								<?php
									$logo = get_post_meta( get_the_ID(), '_logo', true );
									if( $logo !== '') {
										echo '<div class="logoinfo">';
											echo '<img src=' . esc_url($logo) . ' alt=' . $post->post_title . ' />';	
										echo '</div>';
									}
								?>
								<div class="contacto">
									<h3>Contacto</h3>
									<ul class="contacto-list">
										<?php
											$direccion = get_post_meta( get_the_ID(), '_direccion', true );
											if($direccion !== ''){
												echo "<li class='an-item'><i class='fa fa-map-marker' aria-hidden='true'></i>" . $direccion;
												$ciudad = get_post_meta( get_the_ID(), '_ciudad', true );
												if($ciudad !== '')
													echo ", " . $ciudad;
												echo "</li>";
											}
											$telefono1 = get_post_meta( get_the_ID(), '_telefono1', true );
											if($telefono1 !== ''){
												echo "<li class='an-item'><i class='fa fa-phone' aria-hidden='true'></i>" . $telefono1 . "</li>";
											}
											$telefono2 = get_post_meta( get_the_ID(), '_telefono2', true );
											if($telefono2 !== ''){
												echo "<li class='an-item'><i class='fa fa-phone' aria-hidden='true'></i>" . $telefono2 . "</li>";
											}
											$telefono3 = get_post_meta( get_the_ID(), '_telefono3', true );
											if($telefono3 !== ''){
												echo "<li class='an-item'><i class='fa fa-phone' aria-hidden='true'></i>" . $telefono3 . "</li>";
											}
											$email = get_post_meta( get_the_ID(), '_direccion', true );
											if($email !== ''){
												echo "<li class='an-item'><i class='fa fa-envelope' aria-hidden='true'></i>" . $email . "</li>";
											}
											$facebook = get_post_meta( get_the_ID(), '_facebook', true );
											if($facebook !== ''){
												echo "<li class='an-item'><i class='fa fa-facebook-square' aria-hidden='true'></i><a href=" . esc_url($facebook) . ">" . $post->post_title . "</a></li>";
											}
											$web = get_post_meta( get_the_ID(), '_web', true );
											if($web !== ''){
												echo "<li class='an-item'><i class='fa fa-globe' aria-hidden='true'></i><a href=" . esc_url($web) . ">" . $web . "</a></li>";
											}
										?>
									</ul>
								</div> <!-- .contacto -->
								<div class="formulario">
									<h3>Mensaje</h3>
									<form class="an-formulario" action="#">
									<?php
									// Nonce for security
									wp_nonce_field( plugin_basename( __FILE__ ), 'contacto_anunciante' );
									// custom meta box form elements
									echo '<input type="hidden" name="contacto" value="">';
									echo '<input type="hidden" name="anunciante" value=' . $post->post_title . ' >';
									echo '<input type="text" name="nombre" placeholder="Nombre" />';
									echo '<input type="text" name="telefono" placeholder="Teléfono" />';
									echo '<input type="text" name="email" placeholder="Email" />';
									echo '<textarea name="mensaje" onclick="">Mensaje</textarea>';
									echo '<input type="submit" name="enviar" value="Enviar">'
									?>
									</form>
								</div>
							</div> <!-- #an-datos -->
						</div> <!-- #anunciante -->
						
						<?php
						  the_content();

						  wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'Divi' ), 'after' => '</div>' ) );
						?>
					</div><!-- .entry-content -->
					<div class="et_post_meta_wrapper">
						<?php
						  if ( et_get_option('divi_468_enable') == 'on' ){
							  echo '<div class="et-single-post-ad">';
							  if ( et_get_option('divi_468_adsense') <> '' ) echo( et_get_option('divi_468_adsense') );
							  else { ?>
						<a href="<?php echo esc_url(et_get_option('divi_468_url')); ?>">
							<img src="<?php echo esc_attr(et_get_option('divi_468_image')); ?>" alt="468" class="foursixeight" />
						</a>
						<?php 	}
							  echo '</div> <!-- .et-single-post-ad -->';
						  }
						?>

						<?php if (et_get_option('divi_integration_single_bottom') <> '' && et_get_option('divi_integrate_singlebottom_enable') == 'on') echo(et_get_option('divi_integration_single_bottom')); ?>

						<?php
						  if ( ( comments_open() || get_comments_number() ) && 'on' == et_get_option( 'divi_show_postcomments', 'on' ) && ! $et_pb_has_comments_module ) {
							  comments_template( '', true );
						  }
						?>
					</div><!-- .et_post_meta_wrapper -->
				</article><!-- .et_pb_post -->

				<?php endwhile; ?>
			</div><!-- #left-area -->

			<?php get_sidebar(); ?>
		</div><!-- #content-area -->
	</div><!-- .container -->
</div><!-- #main-content -->

<?php get_footer(); ?>