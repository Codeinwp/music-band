<?php
/*
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package cwp
 */
?>
		<footer>
			<div class="footercenter">
				<div class="copyright">
					<?php
						$copyright = cwp('copyright');
						
						if(isset($copyright) && $copyright != '')
							echo $copyright;	
					?>
				</div>
				<?php  wp_nav_menu( array( 'theme_location' => 'footer_menu', 'depth' => -1, 'walker' => new cwp_custom_menu_walker, 'items_wrap'     => '<nav class="fnav">%3$s</nav>' ) ); ?>
				<?php
				echo '<div class="clearfix"></div>
					<div class="copyright">
					<a href="http://themeisle.com/themes/music-band/?utm_source=themefooter&utm_medium=logo&utm_campaign=themefooter" target="_blank">Music band Pro</a> powered by <a href="http://wordpress.org/" target="_blank">WordPress</a>
					</div>';
				?>	
				<div class="clearfix"></div>
			</div><!--/footercenter-->
		</footer>

<?php wp_footer(); ?>

</body>
</html>