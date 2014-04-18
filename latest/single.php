<?php
/*
 * The Template for displaying all single posts.
 *
 * @package cwp
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); 
		cwp_setPostViews(get_the_ID());
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
		<div class="pagetitle">
			<div class="pagetitlecenter">
				<h3><?php _e('Latest News','cwp'); ?></h3>
			</div><!--/pagetitlecenter-->
		</div><!--/pagetitle-->
		
		<!--Content Start-->
		<div id="wraper">
			<section id="content">

				<div <?php post_class('post_inside'); ?>>
					<div class="topdetails">
						<h2><a href=""><?php the_title(); ?></a></h2>
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
												comments_number( __('No Comments','cwp'), __('one Comment','cwp'), '% '.__('Comments','cwp') );
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

<?php endwhile; // end of the loop. ?>
<?php get_template_part('/inc/footer-section'); ?>
<?php get_footer(); ?>