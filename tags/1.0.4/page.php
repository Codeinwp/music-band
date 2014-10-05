<?php
/*
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package cwp
 */

get_header(); ?>
<?php 
	while ( have_posts() ) : the_post();
		$id = get_the_ID();
		
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
		<div class="headerborder"></div>
		
		<!--Content Start-->
		<div id="wraper">
			<section id="content">
				<?php 
					$fi_pages = cwp('fi_pages');
					if(isset($fi_pages) && $fi_pages == 'show') {
					
						if(has_post_thumbnail($post->ID)) {
							$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
					?>
						<div class="about_banner">
							<img src="<?php echo $url; ?>" alt="<?php bloginfo('name'); ?>" >
							
							<?php 
								$caption = get_post_meta($id, 'cpi_caption_option');
								if(isset($caption[0]) && $caption[0] != '')	
									echo '<div class="year">'.$caption[0].'</div>';
							?>
						</div>
					<?php
						}
					?>	
						<div class="about_content">
							<h3 class="about_content_title"><?php the_title(); ?></h3>
							<?php the_content(); ?>
							<?php wp_link_pages(); ?>
							<?php comments_template(); ?>
						</div>
					<?php
					}
					else {
					?>
						<div class="about_content">
							<h3 class="about_content_title"><?php the_title(); ?></h3>
							<?php the_content(); ?>
							<?php wp_link_pages(); ?>
							<?php comments_template(); ?>
						</div>
					<?php
					}
				?>
			</section><!--/content-->
			<aside id="sidebar" style="margin-top: -75px; margin-bottom: -25px;">
				<?php get_sidebar(); ?>
			</aside><!--/sidebar-->
			<div class="clearfix"></div>
		</div><!--/wraper-->
<?php endwhile;	?>
<?php get_template_part('/inc/footer-section'); ?>
<?php get_footer(); ?>