<?php 
			$footer_section_image = cwp('footer_section_image');
			
			$footer_section_title1 = cwp('footer_section_title1');
			$footer_section_title2 = cwp('footer_section_title2');
			$footer_section_title3 = cwp('footer_section_title3');
			
			$footer_section_text1 = cwp('footer_section_text1');
			$footer_section_text2 = cwp('footer_section_text2');
			$footer_section_text3 = cwp('footer_section_text3');
			
			$facebook = cwp('facebook');
			$twitter = cwp('twitter');
			$linkedin = cwp('linkedin');
			
			
			if( !empty($footer_section_image) ):
			
				if( $footer_section_image == '/images/abovefooterbg.png' ):
					echo '<div id="abovefooter" style="background: url('.get_template_directory_uri().'/images/abovefooterbg.png);">';
				else:
					echo '<div id="abovefooter" style="background: url('.$footer_section_image.');">';
				endif;
				
				echo '<div class="abovefooter_center">';
							
					/* first section */		
					if( !empty($footer_section_title1) || !empty($footer_section_text1) ):
						
						echo '<div class="box">';
							 
							if( !empty($footer_section_title1) ):
								echo '<div class="title">'.$footer_section_title1.'</div>';
							endif;	
							if( !empty($footer_section_text1) ):
								echo '<div class="subtitle">'.$footer_section_text1.'</div>';
							endif;
								
						echo '</div>';
						
					endif; 
					
					/* second section */
					if( !empty($footer_section_title2) || !empty($footer_section_text2) ):
						
						echo '<div class="box center">';
									 
							if( !empty($footer_section_title2) ):
								echo '<div class="title">'.$footer_section_title2.'</div>';
							endif;	
							if( !empty($footer_section_text2) ):
								echo '<div class="subtitle">'.$footer_section_text2.'</div>';
							endif;	
						
						echo '</div>';
						
					endif;
					
					/* third section */
					if( !empty($footer_section_title3) || !empty($footer_section_text3)):
						
						echo '<div class="box">';
							
							if( !empty($footer_section_title3) ):
								echo '<div class="title">'.$footer_section_title3.'</div>';
							endif;	
							if( !empty($footer_section_text3) ):
								echo '<div class="subtitle">'.$footer_section_text3.'</div>';
							endif;	
						
						echo '</div>';
					
					endif;
					?>
					<div class="clearfix"></div>
					
					<?php 
						if( !empty($facebook) || !empty($twitter) || !empty($linkedin)):
						?>
								<div id="footersocialmedia">
									<?php
										if( !empty($facebook) ):
											echo '<div class="social"><a href="'.$facebook.'"><img src="'.get_template_directory_uri().'/images/facebook.png" alt="Facebook"></a></div>';
										endif;	
										if( !empty($twitter) ):
											echo '<div class="social"><a href="'.$twitter.'"><img src="'.get_template_directory_uri().'/images/twitter.png" alt="Twitter"></a></div>';	
										endif;	
										if( !empty($linkedin) ):
											echo '<div class="social"><a href="'.$linkedin.'"><img src="'.get_template_directory_uri().'/images/linkedin.png" alt="Linkedin"></a></div>';	
										endif;	
									?>
								</div><!--/footersocialmedia-->
						<?php endif; ?>		
					</div><!--/abovefooter_center-->
				</div><!--/abovefooter-->
			<?php
		endif;	
?>		