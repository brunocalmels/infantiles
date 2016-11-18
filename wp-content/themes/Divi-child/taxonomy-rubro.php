<?php get_header(); ?>


<div id="main-content" class="et_pb_gutters3">
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">

				<!-- Auspiciantes -->
				<div class="titulo_franja" id="titulo_auspiciantes">
					<h1><?php echo single_term_title(); ?></h1>
				</div>

				<!-- Filtros por subrubros -->
				<?php
					$args['taxonomy'] = 'rubro';
					$args['depth'] = 1;
					$args['hide_empty'] = true;
					$args['parent_term'] = $term->ID;
					$args['format'] = 'list';				// Probar un format que devuelva links
					$args['echo'] = false;

					$subrubros = wp_list_categories( apply_filters( 'widget_categories_args', $args ) );
					
					foreach( $subrubro as $subr ) {
							echo '<a href=' . home_url() . '/rubro/' . $subr->slug . ' class="boton-filtro" >' . $subr . '</a>';
					}
				?>

				<?php /*
				<div id="auspiciantes">
					<?php
					// Busqueda de destacados (auspiciantes)
						$args = array(
								'posts_per_page' => 3,
								'orderby' => 'rand',
								'post_type' => 'anunciante',
								'tax_query' => array(
									'taxonomy' => 'rubro',
									'field' => 'name',
									'terms' => $rubro
								),
								'meta_key' => '_auspiciante',
								'meta_value' => '1'
							);
						$auspiciantes = new WP_Query( $args );
						//echo $auspiciantes->post_count . "</br>";
						//echo var_dump($auspiciantes->query_vars) . "</br>";
						while ( $auspiciantes->have_posts() ) :
							$auspiciantes->the_post();
							?>
							<div class="auspiciante">
								<a href=<?php the_permalink(); ?> >
									<span class="align-helper"></span>
									<img class="logo_auspiciante" src=<?php echo get_post_meta( get_the_ID(), '_logo_url', true );?> alt=<?php echo the_title();?> >
								</a>
								<div class="titulo_franja center cliqueable resaltado" onclick="window.location.href = '<?php the_permalink(); ?>'">
									<?php the_title(); ?>
								</div>
							</div>
							<?php
						endwhile;
						// Reset Post Data
						wp_reset_postdata();						
					?>
				</div>
				*/?>

				
				<div id="anunciantes-rubro">
					<?php
					// Anunciantes del rubro
					while ( have_posts() ) :
					  the_post();
						$ausp = false;
						if( get_post_meta( $post->ID, '_auspiciante', true) === '1' ) {
							$ausp = true;
						}
						?>
						<div class="auspiciante">
							<?php if( $ausp ) :
							?>
								<div class="ribbon-wrapper cliqueable" onclick="window.location.href = '<?php the_permalink(); ?>'">
									<div class="featured-ribbon">
										Destacado
									</div>
								</div>
							<?php
							endif;	
							?>
							<a href=<?php the_permalink(); ?> >
								<span class="align-helper"></span>
								<img class="logo_auspiciante" src=<?php echo get_post_meta( get_the_ID(), '_logo_url', true );?> alt=<?php echo the_title();?> >
							</a>
							<div class="nombre_anunciante titulo_franja center cliqueable" onclick="window.location.href = '<?php the_permalink(); ?>'">
								<?php the_title();
									$rubros = wp_get_post_terms( $post->ID, 'rubro', array('fields' => 'names') );
								?>
								<span class="rubro"><?php echo implode( ' - ', $rubros ) ?></span>
							</div>
						</div>
						<?php
					endwhile;
					?>
				</div>
			</div><!-- #left-area -->

			<?php get_sidebar(); ?>
		</div><!-- #content-area -->
	</div><!-- .container -->
</div><!-- #main-content -->

<div class="et_pb_gutters3 et_pb_footer_columns4">
	<?php get_footer(); ?>
</div>