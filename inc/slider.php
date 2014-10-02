					<section id="subheader">
						<div class="subheader_center" id="sliderr">
							<div id="ciwslidernavnew">
								<div class="slidesjs-previous slidesjs-navigation left slider-buttons"><a href=""></a></div>
								<div class="right slidesjs-next slidesjs-navigation slider-buttons"><a href=""></a></div>
							</div><!--/slidernavnew-->
							<div class="sliderWrapper">
							
							
							<?php
								$slider_image1 = cwp('slider_image1');
								$slider_image2 = cwp('slider_image2');
								$slider_image3 = cwp('slider_image3');
								
								$slider_bigtitle1 = cwp('slider_bigtitle1');
								$slider_bigtitle2 = cwp('slider_bigtitle2');
								$slider_bigtitle3 = cwp('slider_bigtitle3');
								
								$slider_title1 = cwp('slider_title1');
								$slider_title2 = cwp('slider_title2');
								$slider_title3 = cwp('slider_title3');
								
								$slider_text1 = cwp('slider_text1');
								$slider_text2 = cwp('slider_text2');
								$slider_text3 = cwp('slider_text3');
								
								/*
								* FIRST SLIDE
								*/
								if( !empty($slider_image1) ):
								
									/* image */
								
									if( $slider_image1 == '/images/slideone.png' ):
										echo '<div class="slide" style="background-image: url('.get_template_directory_uri().'/images/slideone.png);">';
									else:
										echo '<div class="slide" style="background-image: url('.$slider_image1.');">';
									endif;

									/* details */

									if ( !empty($slider_title1) || !empty($slider_text1) || !empty($slider_bigtitle1) ):	
										echo '<div class="slide_details">';
											echo '<div class="album_details">';
											
												if( !empty($slider_title1) ):
													echo '<h3>'.$slider_title1.'</h3>';
												endif;	
												if( !empty($slider_text1) ):
													echo '<p>'.$slider_text1.'</p>';
												endif;	
											
											echo '</div>';
											
											if( !empty($slider_bigtitle1) ):
												echo '<div class="album_title">'.$slider_bigtitle1.'</div>'; 
											endif;	
											
											
										echo '</div>';
									echo '</div>';
									endif;
								
								endif;
								
								/*
								* SECOND SLIDE
								*/
								
								if( !empty($slider_image2) ):
								
									/* image */
								
									if( $slider_image2 == '/images/slideone.png' ):
										echo '<div class="slide" style="background-image: url('.get_template_directory_uri().'/images/slideone.png);">';
									else:
										echo '<div class="slide" style="background-image: url('.$slider_image2.');">';
									endif;

									/* details */

									if ( !empty($slider_title2) || !empty($slider_text2) || !empty($slider_bigtitle2) ):	
										echo '<div class="slide_details">';
											echo '<div class="album_details">';
											
												if( !empty($slider_title2) ):
													echo '<h3>'.$slider_title2.'</h3>';
												endif;	
												if( !empty($slider_text2) ):
													echo '<p>'.$slider_text2.'</p>';
												endif;	
											
											echo '</div>';
											
											if( !empty($slider_bigtitle2) ):
												echo '<div class="album_title">'.$slider_bigtitle2.'</div>'; 
											endif;	
											
											
										echo '</div>';
									echo '</div>';
									endif;
								
								endif;
								
								/*
								* THIRD SLIDE
								*/
								
								if( !empty($slider_image3) ):
								
									/* image */
								
									if( $slider_image3 == '/images/slideone.png' ):
										echo '<div class="slide" style="background-image: url('.get_template_directory_uri().'/images/slideone.png);">';
									else:
										echo '<div class="slide" style="background-image: url('.$slider_image3.');">';
									endif;

									/* details */

									if ( !empty($slider_title3) || !empty($slider_text3) || !empty($slider_bigtitle3) ):	
										echo '<div class="slide_details">';
											echo '<div class="album_details">';
											
												if( !empty($slider_title3) ):
													echo '<h3>'.$slider_title3.'</h3>';
												endif;	
												if( !empty($slider_text3) ):
													echo '<p>'.$slider_text3.'</p>';
												endif;	
											
											echo '</div>';
											
											if( !empty($slider_bigtitle3) ):
												echo '<div class="album_title">'.$slider_bigtitle3.'</div>'; 
											endif;	
											
											
										echo '</div>';
									echo '</div>';
									endif;
								
								endif;
							?>
						</div><!-- end .slider-wrapper -->
						</div>
					</section>