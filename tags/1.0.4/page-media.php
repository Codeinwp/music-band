<?php 
/*
Template Name: Media
*/
get_header();
?>
		<!--Subheader Start-->
		<?php
			while ( have_posts() ) : the_post(); 
				$id = get_the_ID();
			endwhile;
			$top_banner = cwp('top_banner');
			if(isset($top_banner) && !empty($top_banner)):
				foreach($top_banner as $p):		
					if($id == $p):
						$top_banner_image = cwp('top_banner_image');
						$top_banner_title = cwp('top_banner_title');
						$top_banner_text = cwp('top_banner_text');
						if(isset($top_banner_image) && $top_banner_image == '/images/abovefooterbg.png'):
						?>
							<section id="subheader" class="subheader_news" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/abovefooterbg.png);">
								<?php 
									if(isset($top_banner_title) && $top_banner_title != '')
										echo '<div class="album_title">'.$top_banner_title.'</div>';
									if(isset($top_banner_text) && $top_banner_text != '')	
										echo '<p>'.$top_banner_text.'</p>';
								?>
							</section><!--/subheader-->
						<?php
						elseif(isset($top_banner_image) && $top_banner_image != ''):
						?>
							<section id="subheader" class="subheader_news" style="<?php echo $top_banner_image; ?>">
								<?php 
									if(isset($top_banner_title) && $top_banner_title != '')
										echo '<div class="album_title">'.$top_banner_text.'</div>';
									if(isset($top_banner_text) && $top_banner_text != '')	
										echo '<p>'.$top_banner_text.'</p>';
								?>
							</section><!--/subheader-->
						<?php
						endif;
					endif;
				endforeach;
			endif;
		?>

		<div class="pagetitle">
			<div class="pagetitlecenter">
				<h3><?php _e('PICTURES & VIDEO','music-band-pro'); ?></h3>
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