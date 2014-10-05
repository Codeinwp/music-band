<?php 
/*
Template Name: Tour
*/
get_header();

while ( have_posts() ) : the_post(); 
	$id = get_the_ID();
endwhile;
?>
		
<!--Subheader End-->

		<div class="pagetitle">
			<div class="pagetitlecenter">
				<h3><?php _e('upcoming events','music-band-pro'); ?></h3>
			</div><!--/pagetitlecenter-->
		</div><!--/pagetitle-->
		
		<!--Content Start-->
		<div id="wraper">
			<section id="content">
					<?php
					$queryObject = new WP_Query( 'post_type=event' );
					if ($queryObject->have_posts()) {
						while ($queryObject->have_posts()) {
							$queryObject->the_post();
							?>
								<div class="event">
									
										<?php 
											if ( has_post_thumbnail()) {
												echo '<div class="img">';
													echo get_the_post_thumbnail();
												echo '</div>';
											}	
										?>	
									
									<div class="title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></div>
									<?php 
										$day = get_post_meta($id, 'cpi_day_option');
										$month = get_post_meta($id, 'cpi_month_option');
										$tickets = get_post_meta($id, 'cpi_tickets_option');
										
										if( !empty($day[0]) ):
											echo '<div class="day">'.$day[0].'</div>';
										endif;	
									?>
									
									<div class="eventcontent">
										<?php 
											if( !empty($month[0]) ):
												echo '<span>'.$month[0].'</span><br />';
											endif;	
											
											the_excerpt(); 
										?>
									</div>
									<div class="clearfix"></div>
									<?php
										if( !empty($tickets[0]) ):
											echo '<div class="getticket"><a href="'.$tickets[0].'">'.__('Get tickets','music-band-pro').'</a></div>';
										endif;	
									?>
								</div>
								
							<?php
						}	
					}
					wp_reset_query();
					?>
			</section><!--/content-->
			<aside id="sidebar">
				<?php get_sidebar(); ?>
			</aside><!--/sidebar-->
			<div class="clearfix"></div>
		</div><!--/wraper-->
<?php
get_template_part('/inc/footer-section'); 
get_footer(); ?>