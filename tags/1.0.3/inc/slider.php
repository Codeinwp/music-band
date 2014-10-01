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
								if(isset($slider_image1) && $slider_image1 == '/images/slideone.png') {
								?>
									<div class="slide" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/slideone.png);">
										<div class="slide_details">
											<div class="album_details">
												<?php 
												if(isset($slider_title1) && $slider_title1 != '')
													echo '<h3>'.$slider_title1.'</h3>';
												if(isset($slider_text1) && $slider_text1 != '')	
													echo '<p>'.$slider_text1.'</p>';
												?>
											</div>
											<?php 
												if(isset($slider_bigtitle1) && $slider_bigtitle1 != '') 
													echo '<div class="album_title">'.$slider_bigtitle1.'</div>'; 
											?>
										</div>
									</div>
								<?php
								}
								else if(isset($slider_image1) && $slider_image1 != '/images/slideone.png'){
								?>
									<div class="slide" style="background-image: url(<?php echo $slider_image1; ?>);">
										<div class="slide_details">
											<div class="album_details">
												<?php 
												if(isset($slider_title1) && $slider_title1 != '')
													echo '<h3>'.$slider_title1.'</h3>';
												if(isset($slider_text1) && $slider_text1 != '')	
													echo '<p>'.$slider_text1.'</p>';	
												?>
											</div>
											<?php 
												if(isset($slider_bigtitle1) && $slider_bigtitle1 != '') 
													echo '<div class="album_title">'.$slider_bigtitle1.'</div>'; 
											?>
										</div>
									</div>
								<?php
								}
								
								/*
								* SECOND SLIDE
								*/
								
								if(isset($slider_image2) && $slider_image2 == '/images/slideone.png') {
								?>
									<div class="slide" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/slideone.png);">
										<div class="slide_details">
											<div class="album_details">
												<?php 
												if(isset($slider_title2) && $slider_title2 != '')
													echo '<h3>'.$slider_title2.'</h3>';
												if(isset($slider_text2) && $slider_text2 != '')	
													echo '<p>'.$slider_text2.'</p>';
												?>
											</div>
											<?php 
												if(isset($slider_bigtitle2) && $slider_bigtitle2 != '') 
													echo '<div class="album_title">'.$slider_bigtitle2.'</div>'; 
											?>
										</div>
									</div>
								<?php
								}
								else if(isset($slider_image2) && $slider_image2 != '/images/slideone.png'){
								?>
									<div class="slide" style="background-image: url(<?php echo $slider_image2; ?>);">
										<div class="slide_details">
											<div class="album_details">
												<?php 
												if(isset($slider_title2) && $slider_title2 != '')
													echo '<h3>'.$slider_title2.'</h3>';
												if(isset($slider_text2) && $slider_text2 != '')	
													echo '<p>'.$slider_text2.'</p>';
												?>
											</div>
											<?php 
												if(isset($slider_bigtitle2) && $slider_bigtitle2 != '') 
													echo '<div class="album_title">'.$slider_bigtitle2.'</div>'; 
											?>
										</div>
									</div>
								<?php
								}
								
								/*
								* THIRD SLIDE
								*/
								
								if(isset($slider_image3) && $slider_image3 == '/images/slideone.png') {
								?>
									<div class="slide" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/slideone.png);">
										<div class="slide_details">
											<div class="album_details">
												<?php 
												if(isset($slider_title3) && $slider_title3 != '')
													echo '<h3>'.$slider_title3.'</h3>';
												if(isset($slider_text3) && $slider_text3 != '')	
													echo '<p>'.$slider_text3.'</p>';
												?>
											</div>
											<?php 
												if(isset($slider_bigtitle3) && $slider_bigtitle3 != '') 
													echo '<div class="album_title">'.$slider_bigtitle3.'</div>'; 
											?>
										</div>
									</div>
								<?php
								}
								else if(isset($slider_image3) && $slider_image3 != '/images/slideone.png'){
								?>
									<div class="slide" style="background-image: url(<?php echo $slider_image3; ?>);">
										<div class="slide_details">
											<div class="album_details">
												<?php 
												if(isset($slider_title3) && $slider_title3 != '')
													echo '<h3>'.$slider_title3.'</h3>';
												if(isset($slider_text3) && $slider_text3 != '')	
													echo '<p>'.$slider_text3.'</p>';
												?>
											</div>
											<?php 
												if(isset($slider_bigtitle3) && $slider_bigtitle3 != '') 
													echo '<div class="album_title">'.$slider_bigtitle3.'</div>'; 
											?>
										</div>
									</div>
								<?php
								}
							?>
						</div><!-- end .slider-wrapper -->
						</div>
					</section>