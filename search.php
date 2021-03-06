<?php
/*
 * The template for displaying Search Results pages.
 *
 * @package music-band-pro
 */

get_header(); ?>
		<div class="pagetitle">
			<div class="pagetitlecenter">
				<h3>
					<?php printf( __( 'Search Results for: %s', 'music-band-pro' ), '<span>' . get_search_query() . '</span>' ); ?>
				</h3>
			</div><!--/pagetitlecenter-->
		</div><!--/pagetitle-->
		
		<!--Content Start-->
		<div id="wraper">
			<section id="content">
				<?php while ( have_posts() ) : the_post(); ?>
				<div class="post">
					<div class="topdetails">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="details">
							<?php 
								$details_index = cwp('details_index');
								if(is_array($details_index)):
									$stop = 0;
									foreach($details_index as $di):
										if($di == 'none')
											$stop = 1;
									endforeach;
									if($stop == 0):
										foreach($details_index as $di):
											if($di == 'date')
												echo get_the_date('F j, Y').' &#8226;';
											if($di == 'author')
												echo '<a href="'.get_author_posts_url( get_the_author_meta( 'ID' )).'">'.get_the_author().'</a> &#8226;';
											if($di == 'number_of_comments')	{
												comments_number( __('No Comments','music-band-pro'), __('one Comment','music-band-pro'), '% '.__('Comments','music-band-pro') );
												echo ' &#8226;';
											}	
											if($di == 'category'){
												$cat = get_the_category();
												if(!empty($cat)) :
												foreach($cat as $cat_item):
													echo '<a href="'.get_category_link($cat_item->cat_ID).'">'.$cat_item->cat_name.'</a> &#8226;';
												endforeach;
												endif;
											}
											if($di == 'tags'){
												the_tags();
												echo ' &#8226;';
											}																	
										endforeach;
									endif;
								endif;
							?>
						</div>
					</div><!--/topdetails-->
					
					<div class="clearfix"></div>
					<?php 
						$fi_index = cwp('fi_index');
						if($fi_index == 'show'){
							if ( has_post_thumbnail()) {
								echo '<figure>'.get_the_post_thumbnail().'</figure>';
							}
						}						
					?>
					<article>
						<?php the_excerpt(); ?>
					</article>
					<div class="readmore"><a href="<?php the_permalink(); ?>"><?php _e('Read More','music-band-pro'); ?></a></div>
					<div class="clearfix"></div>
				</div><!--/post-->
				<?php endwhile; ?>
				<div class="pagination">
					<div class="prev"><?php previous_posts_link( __( 'Prev', 'music-band-pro' ) ); ?></div>	
					<div class="next"><?php next_posts_link( __( 'Next', 'music-band-pro' ) ); ?></div>
				</div><!-- /pagination-->
			</section><!--/content-->
			<aside id="sidebar">
				<?php get_sidebar(); ?>
			</aside><!--/sidebar-->
			<div class="clearfix"></div>
		</div><!--/wraper-->
	<?php get_template_part('/inc/footer-section'); ?>
<?php get_footer(); ?>