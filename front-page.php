<?php
/*
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package music-band-pro
 */

get_header(); ?>
		<?php
			$slider_index = cwp('slider_index');
			if(isset($slider_index) && $slider_index == 'show'){
				get_template_part('/inc/slider');
			}
		if (is_home()): ?>
		
		<!--Content Start-->
		<div id="wraper">
		<!--Content End -->
		<?php get_template_part('/inc/footer-section'); ?>
<?php get_footer(); ?>