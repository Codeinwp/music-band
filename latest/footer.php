<?php
/*
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package music-band-pro
 */
?>
		<footer>
			<div class="footercenter">
				<div class="copyright">
					<?php
						$copyright = cwp('copyright');
						
						if( !empty($copyright) ):
							echo $copyright;	
						endif;	
					?>
					<a href="http://themeisle.com/themes/music-band/?utm_source=music-band&utm_medium=link&utm_campaign=themefooter" target="_blank">Music band Pro</a><?php _e('powered by','music-band-pro'); ?><a href="http://wordpress.org/" target="_blank">WordPress</a>
				</div>
				<nav id="footer_nav">	
					<?php wp_nav_menu( array( 'theme_location' => 'footer_menu', 'container' => '', 'depth' => -1 ) ); ?>
				</nav>
				<div class="clearfix"></div>
			</div><!--/footercenter-->
		</footer>

<?php wp_footer(); ?>

</body>
</html>