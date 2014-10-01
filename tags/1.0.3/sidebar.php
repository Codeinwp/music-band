<?php
/*
 * The Sidebar containing the main widget areas.
 *
 * @package cwp
 */
?>
				<div class="widget latest_album">
					<?php
					$queryObject = new WP_Query( 'post_type=album&posts_per_page=1' );
					if ($queryObject->have_posts()) {
						while ($queryObject->have_posts()) {
							$queryObject->the_post();
							?>
								<div class="title dark"><?php _e('Latest Album:','music-band-pro'); ?> <span><?php the_title(); ?></span></div>
								<div class="album_cover">
									<?php
										if ( has_post_thumbnail()) {
											echo '<figure>'.get_the_post_thumbnail().'</figure>';
										}
									?>
								</div>
								<div class="tracklist">
									<h4><?php _e('Tracklisting','music-band-pro'); ?></h4>
									<?php 
										$song_counter = 1;
										$song_title1 = get_post_meta($id, 'cpi_song1_option');
										$song_title2 = get_post_meta($id, 'cpi_song2_option');
										$song_title3 = get_post_meta($id, 'cpi_song3_option');
										$song_title4 = get_post_meta($id, 'cpi_song4_option');
										$song_title5 = get_post_meta($id, 'cpi_song5_option');
										$song_title6 = get_post_meta($id, 'cpi_song6_option');
										$song_title7 = get_post_meta($id, 'cpi_song7_option');
										$song_title8 = get_post_meta($id, 'cpi_song8_option');
										$song_title9 = get_post_meta($id, 'cpi_song9_option');
										$song_title10 = get_post_meta($id, 'cpi_song10_option');
										$song_title11 = get_post_meta($id, 'cpi_song11_option');
										$song_title12 = get_post_meta($id, 'cpi_song12_option');
										$song_title13 = get_post_meta($id, 'cpi_song13_option');
										$song_title14 = get_post_meta($id, 'cpi_song14_option');
										$song_title15 = get_post_meta($id, 'cpi_song15_option');
										$song_title16 = get_post_meta($id, 'cpi_song16_option');
										$song_title17 = get_post_meta($id, 'cpi_song17_option');
										$song_title18 = get_post_meta($id, 'cpi_song18_option');
										$song_title19 = get_post_meta($id, 'cpi_song19_option');
										$song_title20 = get_post_meta($id, 'cpi_song20_option');
										
										$song_time1 = get_post_meta($id, 'cpi_time1_option');
										$song_time2 = get_post_meta($id, 'cpi_time2_option');
										$song_time3 = get_post_meta($id, 'cpi_time3_option');
										$song_time4 = get_post_meta($id, 'cpi_time4_option');
										$song_time5 = get_post_meta($id, 'cpi_time5_option');
										$song_time6 = get_post_meta($id, 'cpi_time6_option');
										$song_time7 = get_post_meta($id, 'cpi_time7_option');
										$song_time8 = get_post_meta($id, 'cpi_time8_option');
										$song_time9 = get_post_meta($id, 'cpi_time9_option');
										$song_time10 = get_post_meta($id, 'cpi_time10_option');
										$song_time11 = get_post_meta($id, 'cpi_time11_option');
										$song_time12 = get_post_meta($id, 'cpi_time12_option');
										$song_time13 = get_post_meta($id, 'cpi_time13_option');
										$song_time14 = get_post_meta($id, 'cpi_time14_option');
										$song_time15 = get_post_meta($id, 'cpi_time15_option');
										$song_time16 = get_post_meta($id, 'cpi_time16_option');
										$song_time17 = get_post_meta($id, 'cpi_time17_option');
										$song_time18 = get_post_meta($id, 'cpi_time18_option');
										$song_time19 = get_post_meta($id, 'cpi_time19_option');
										$song_time20 = get_post_meta($id, 'cpi_time20_option');
										
										$cpi_buyalbum_option = get_post_meta($id, 'cpi_buyalbum_option');
										$cpi_itunes_option = get_post_meta($id, 'cpi_itunes_option');
									
									if(isset($song_title1[0]) && $song_title1[0] != ''){
									?>
										<div class="track">
											<div class="nr"><?php echo $song_counter; ?></div>
											<div class="name"><?php echo $song_title1[0]; ?></div>
											<?php
												if(isset($song_time1[0]) && $song_time1[0] != '')
													echo '<div class="time">'.$song_time1[0].'</div>';
											?>
										</div>
									<?php
										$song_counter++;
									}
									if(isset($song_title2[0]) && $song_title2[0] != ''){
									?>
										<div class="track">
											<div class="nr"><?php echo $song_counter; ?></div>
											<div class="name"><?php echo $song_title2[0]; ?></div>
											<?php
												if(isset($song_time2[0]) && $song_time2[0] != '')
													echo '<div class="time">'.$song_time2[0].'</div>';
											?>
										</div>
									<?php
										$song_counter++;
									}
									if(isset($song_title3[0]) && $song_title3[0] != ''){
									?>
										<div class="track">
											<div class="nr"><?php echo $song_counter; ?></div>
											<div class="name"><?php echo $song_title3[0]; ?></div>
											<?php
												if(isset($song_time3[0]) && $song_time3[0] != '')
													echo '<div class="time">'.$song_time3[0].'</div>';
											?>
										</div>
									<?php
										$song_counter++;
									}
									if(isset($song_title4[0]) && $song_title4[0] != ''){
									?>
										<div class="track">
											<div class="nr"><?php echo $song_counter; ?></div>
											<div class="name"><?php echo $song_title4[0]; ?></div>
											<?php
												if(isset($song_time4[0]) && $song_time4[0] != '')
													echo '<div class="time">'.$song_time4[0].'</div>';
											?>
										</div>
									<?php
										$song_counter++;
									}
									if(isset($song_title5[0]) && $song_title5[0] != ''){
									?>
										<div class="track">
											<div class="nr"><?php echo $song_counter; ?></div>
											<div class="name"><?php echo $song_title5[0]; ?></div>
											<?php
												if(isset($song_time5[0]) && $song_time5[0] != '')
													echo '<div class="time">'.$song_time5[0].'</div>';
											?>
										</div>
									<?php
										$song_counter++;
									}
									if(isset($song_title6[0]) && $song_title6[0] != ''){
									?>
										<div class="track">
											<div class="nr"><?php echo $song_counter; ?></div>
											<div class="name"><?php echo $song_title6[0]; ?></div>
											<?php
												if(isset($song_time6[0]) && $song_time6[0] != '')
													echo '<div class="time">'.$song_time6[0].'</div>';
											?>
										</div>
									<?php
										$song_counter++;
									}
									if(isset($song_title7[0]) && $song_title7[0] != ''){
									?>
										<div class="track">
											<div class="nr"><?php echo $song_counter; ?></div>
											<div class="name"><?php echo $song_title7[0]; ?></div>
											<?php
												if(isset($song_time7[0]) && $song_time7[0] != '')
													echo '<div class="time">'.$song_time7[0].'</div>';
											?>
										</div>
									<?php
										$song_counter++;
									}
									if(isset($song_title8[0]) && $song_title8[0] != ''){
									?>
										<div class="track">
											<div class="nr"><?php echo $song_counter; ?></div>
											<div class="name"><?php echo $song_title8[0]; ?></div>
											<?php
												if(isset($song_time8[0]) && $song_time8[0] != '')
													echo '<div class="time">'.$song_time8[0].'</div>';
											?>
										</div>
									<?php
										$song_counter++;
									}
									if(isset($song_title9[0]) && $song_title9[0] != ''){
									?>
										<div class="track">
											<div class="nr"><?php echo $song_counter; ?></div>
											<div class="name"><?php echo $song_title9[0]; ?></div>
											<?php
												if(isset($song_time9[0]) && $song_time9[0] != '')
													echo '<div class="time">'.$song_time9[0].'</div>';
											?>
										</div>
									<?php
										$song_counter++;
									}
									if(isset($song_title10[0]) && $song_title10[0] != ''){
									?>
										<div class="track">
											<div class="nr"><?php echo $song_counter; ?></div>
											<div class="name"><?php echo $song_title10[0]; ?></div>
											<?php
												if(isset($song_time10[0]) && $song_time10[0] != '')
													echo '<div class="time">'.$song_time10[0].'</div>';
											?>
										</div>
									<?php
										$song_counter++;
									}
									if(isset($song_title11[0]) && $song_title11[0] != ''){
									?>
										<div class="track">
											<div class="nr"><?php echo $song_counter; ?></div>
											<div class="name"><?php echo $song_title11[0]; ?></div>
											<?php
												if(isset($song_time11[0]) && $song_time11[0] != '')
													echo '<div class="time">'.$song_time11[0].'</div>';
											?>
										</div>
									<?php
										$song_counter++;
									}
									if(isset($song_title12[0]) && $song_title12[0] != ''){
									?>
										<div class="track">
											<div class="nr"><?php echo $song_counter; ?></div>
											<div class="name"><?php echo $song_title12[0]; ?></div>
											<?php
												if(isset($song_time12[0]) && $song_time12[0] != '')
													echo '<div class="time">'.$song_time12[0].'</div>';
											?>
										</div>
									<?php
										$song_counter++;
									}
									if(isset($song_title13[0]) && $song_title13[0] != ''){
									?>
										<div class="track">
											<div class="nr"><?php echo $song_counter; ?></div>
											<div class="name"><?php echo $song_title13[0]; ?></div>
											<?php
												if(isset($song_time13[0]) && $song_time13[0] != '')
													echo '<div class="time">'.$song_time13[0].'</div>';
											?>
										</div>
									<?php
										$song_counter++;
									}
									if(isset($song_title14[0]) && $song_title14[0] != ''){
									?>
										<div class="track">
											<div class="nr"><?php echo $song_counter; ?></div>
											<div class="name"><?php echo $song_title14[0]; ?></div>
											<?php
												if(isset($song_time14[0]) && $song_time14[0] != '')
													echo '<div class="time">'.$song_time14[0].'</div>';
											?>
										</div>
									<?php
										$song_counter++;
									}
									if(isset($song_title15[0]) && $song_title15[0] != ''){
									?>
										<div class="track">
											<div class="nr"><?php echo $song_counter; ?></div>
											<div class="name"><?php echo $song_title15[0]; ?></div>
											<?php
												if(isset($song_time15[0]) && $song_time15[0] != '')
													echo '<div class="time">'.$song_time15[0].'</div>';
											?>
										</div>
									<?php
										$song_counter++;
									}
									if(isset($song_title16[0]) && $song_title16[0] != ''){
									?>
										<div class="track">
											<div class="nr"><?php echo $song_counter; ?></div>
											<div class="name"><?php echo $song_title16[0]; ?></div>
											<?php
												if(isset($song_time16[0]) && $song_time16[0] != '')
													echo '<div class="time">'.$song_time16[0].'</div>';
											?>
										</div>
									<?php
										$song_counter++;
									}
									if(isset($song_title17[0]) && $song_title17[0] != ''){
									?>
										<div class="track">
											<div class="nr"><?php echo $song_counter; ?></div>
											<div class="name"><?php echo $song_title17[0]; ?></div>
											<?php
												if(isset($song_time17[0]) && $song_time17[0] != '')
													echo '<div class="time">'.$song_time17[0].'</div>';
											?>
										</div>
									<?php
										$song_counter++;
									}
									if(isset($song_title18[0]) && $song_title18[0] != ''){
									?>
										<div class="track">
											<div class="nr"><?php echo $song_counter; ?></div>
											<div class="name"><?php echo $song_title18[0]; ?></div>
											<?php
												if(isset($song_time18[0]) && $song_time18[0] != '')
													echo '<div class="time">'.$song_time18[0].'</div>';
											?>
										</div>
									<?php
										$song_counter++;
									}
									if(isset($song_title19[0]) && $song_title19[0] != ''){
									?>
										<div class="track">
											<div class="nr"><?php echo $song_counter; ?></div>
											<div class="name"><?php echo $song_title19[0]; ?></div>
											<?php
												if(isset($song_time19[0]) && $song_time19[0] != '')
													echo '<div class="time">'.$song_time19[0].'</div>';
											?>
										</div>
									<?php
										$song_counter++;
									}
									if(isset($song_title20[0]) && $song_title20[0] != ''){
									?>
										<div class="track">
											<div class="nr"><?php echo $song_counter; ?></div>
											<div class="name"><?php echo $song_title20[0]; ?></div>
											<?php
												if(isset($song_time20[0]) && $song_time20[0] != '')
													echo '<div class="time">'.$song_time20[0].'</div>';
											?>
										</div>
									<?php
										$song_counter++;
									}
									?>
								</div>
								<?php 
									if(isset($cpi_buyalbum_option[0]) && $cpi_buyalbum_option[0] != '')
										echo '<div class="button"><a href="'.$cpi_buyalbum_option[0].'">'.__('BUY album','music-band-pro').'</a></div>';
									if(isset($cpi_itunes_option[0]) && $cpi_itunes_option[0] != '')
										echo '<div class="button"><a href="'.$cpi_itunes_option[0].'">'.__('GET on itunes','music-band-pro').'</a></div>';
						}	
					}
					wp_reset_postdata();
					?>
				</div>	
				
				<div class="widget next_event">
				
					<?php
					$count_posts = wp_count_posts('event');
					if($count_posts->publish >= 3):
						?>
						<div class="title dark">
							<?php _e('Next Event','music-band-pro'); ?>
							<div class="slidernav">
								<a href=""></a>
								<a href=""></a>
								<a href=""></a>
							</div>
						</div>
						<div class="panes">
						<?php
						$queryObject = new WP_Query( 'post_type=event&posts_per_page=3' );
						if ($queryObject->have_posts()) {
							while ($queryObject->have_posts()) {
								$queryObject->the_post();
								
								$day = get_post_meta($id, 'cpi_day_option');
								$month = get_post_meta($id, 'cpi_month_option');
								?>
									<div class="slide">
										<?php 
											if(isset($day[0]) && $day[0] != '')
												echo '<div class="day">'.$day[0].'</div>';
										?>
										
										<div class="eventcontent">
											<?php
												if(isset($month[0]) && $month[0] != '')
													echo '<span>'.$month[0].'</span><br />';
											?>
											<?php the_content(); ?>
										</div>
									</div>
									
								<?php
							}	
						}
						wp_reset_postdata();
						?>
						</div>
						
						<?php endif; ?>
				</div><!--/widget-->
				<?php
					$queryObject = new WP_Query( 'post_type=media&posts_per_page=1' );
					if ($queryObject->have_posts()) {
						while ($queryObject->have_posts()) {
							$queryObject->the_post();
							?>
							<div class="widget latest_video">
								<div class="title"><?php _e('Latest video','music-band-pro'); ?></div>
								<div class="video">
									<?php the_content(); ?>
								</div><!--/video-->
								<div class="videotitle"><?php the_title(); ?></div>
							</div><!--/widget-->
							<?php
						}
					}	
					wp_reset_postdata();
				?>
				<?php cwp_related_posts(); ?>
				<?php 
					if ( is_active_sidebar( 'sidebar-1' ) )
						dynamic_sidebar( 'sidebar-1' ); ?>