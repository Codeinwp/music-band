<?php
/*
 * The template for displaying 404 pages (Not Found).
 *
 * @package music-band-pro
 */

get_header(); 
?>
		<div class="pagetitle">
			<div class="pagetitlecenter">
				<h3><?php _e('Page not found','music-band-pro'); ?></h3>
			</div><!--/pagetitlecenter-->
		</div><!--/pagetitle-->
		
		<!--Content Start-->
		<div id="wraper">
			<section id="content">
				<div class="post post_inside">
					<article>
						<?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'music-band-pro' ); ?>
					</article>
					<?php get_search_form(); ?>
				</div><!--/post-->
			</section><!--/content-->
			<aside id="sidebar">
				<?php get_sidebar(); ?>
			</aside><!--/sidebar-->
			<div class="clearfix"></div>
		</div><!--/wraper-->

<?php get_template_part('/inc/footer-section'); ?>
<?php get_footer(); ?>