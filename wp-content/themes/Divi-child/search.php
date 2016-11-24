<?php get_header(); ?>

<div id="main-content" class="et_pb_gutters3">
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">

				<!-- Auspiciantes -->
				<div class="titulo_franja" id="titulo_auspiciantes">
					<h1><?php echo single_term_title(); ?></h1>
				</div>


				<div id="anunciantes-rubro">
					<?php
					// Resultados de la busqueda
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

							<?php
								$logo_src = get_post_meta( get_the_ID(), '_logo_url', true );
								$con_logo = $logo_src!==''?true:false;
								if( $con_logo ) {
									?>
									<a href="<?php the_permalink();?>">
										<img class="logo_auspiciante" src="<?php echo $logo_src;?>"alt="<?php the_title(); ?>" >
										<span class="align-helper"></span>
									</a>
									<?php
									}
									else {
										?>
									<a href="<?php the_permalink();?>">
										<img class="logo_auspiciante" src="<?php echo home_url(); ?>/wp-content/uploads/2016/11/bodas_relleno.png" alt="<?php the_title(); ?>" >
										<span class="align-helper"></span>
									</a>
										<?php
									}
								?>
								
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