<?php
/*
 * The Template for displaying all single posts.
 *
 * @package music-band-pro
 */

get_header();
 
	while ( have_posts() ) : 
		the_post(); 
		cwp_setPostViews(get_the_ID());
?>
		<div class="pagetitle">
			<div class="pagetitlecenter">
				<h3><?php the_title(); ?></h3>
			</div><!--/pagetitlecenter-->
		</div><!--/pagetitle-->
		
		<!--Content Start-->
		<div id="wraper">
			<section id="content">

				<div <?php post_class('post_inside'); ?>>
					<div class="topdetails">
						<div class="details">
							<?php 
								$details_single = cwp('details_single');
								if(is_array($details_single)):
									$stop = 0;
									foreach($details_single as $ds):
										if($ds == 'none')
											$stop = 1;
									endforeach;
									if($stop == 0):
										foreach($details_single as $ds):
											if($ds == 'date')
												echo get_the_date('F j, Y').' &#8226; ';
											if($ds == 'author')
												echo '<a href="'.get_author_posts_url( get_the_author_meta( 'ID' )).'">'.get_the_author().'</a> &#8226; ';
											if($ds == 'number_of_comments')	{
												comments_number( __('No Comments','music-band-pro'), __('one Comment','music-band-pro'), '% '.__('Comments','music-band-pro') );
												echo ' &#8226; ';
											}	
											if($ds == 'category'){
												$cat = get_the_category();
												if(!empty($cat)) :
												foreach($cat as $cat_item):
													echo '<a href="'.get_category_link($cat_item->cat_ID).'">'.$cat_item->cat_name.'</a> &#8226; ';
												endforeach;
												endif;
											}
											if($ds == 'tags'){
												the_tags();
												echo ' &#8226; ';
											}										
											if($ds == 'number_of_views'){
												echo cwp_getPostViews(get_the_ID());
												echo ' &#8226; ';
											}										
										endforeach;
									endif;	
								endif;
							?>
						</div>
					</div><!--/topdetails-->
					<div class="clearfix"></div>
					<?php 
						$fi_single = cwp('fi_single');
						if($fi_single == 'show'){
							if ( has_post_thumbnail()) {
								echo '<figure>'.get_the_post_thumbnail().'</figure>';
							}
						}						
					?>
					<article>
						<?php the_content(); ?>
						<?php wp_link_pages(); ?>
					</article>
					
					<?php comments_template(); ?>
				</div><!--/post-->

			</section><!--/content-->
			<aside id="sidebar">
				<?php get_sidebar(); ?>
			</aside><!--/sidebar-->
			<div class="clearfix"></div>
		</div><!--/wraper-->

<?php 
endwhile; 

get_template_part('/inc/footer-section');

get_footer(); 

?>