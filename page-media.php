<?php 
/*
Template Name: Media
*/
get_header();

			while ( have_posts() ) : the_post(); 
				$id = get_the_ID();
			endwhile;
		?>

		<div class="pagetitle">
			<div class="pagetitlecenter">
				<h3><?php the_title(); ?></h3>
			</div><!--/pagetitlecenter-->
		</div><!--/pagetitle-->
		
		<!--Content Start-->
		<div class="media_bg">
			<div id="wraper">
				<section id="content">
				
					<?php
					$queryObject = new WP_Query( 'post_type=media' );
					if ($queryObject->have_posts()) {
						while ($queryObject->have_posts()) {
							$queryObject->the_post();
							?>
								<div class="video_media">
									<div class="video_embed">
										<?php the_content(); ?>
									</div><!--/video_embed-->
									<a href=""><?php the_title(); ?></a>
									<span><?php _e('Added ','music-band-pro'); echo get_the_date('F d, Y'); ?></span>
								</div><!--/video-->
								
							<?php
						}	
					}
					?>

					<div class="clearfix"></div>
					<?php wp_reset_postdata(); ?>
				</section><!--/content-->
				<aside id="sidebar">
					<?php get_sidebar(); ?>
				</aside><!--/sidebar-->
				<div class="clearfix"></div>
			</div><!--/wraper-->
		</div><!--/media_bg-->
		<!--Content End -->
<?php
get_template_part('/inc/footer-section'); 	
get_footer(); ?>