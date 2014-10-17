<?php
/*
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @package cwp
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, user-scalable=no">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
<?php

	if( function_exists( 'music_band_pro_style_from_admin' ) ): 
		music_band_pro_style_from_admin();
	endif;
	
?>	
</head>

<body <?php body_class(); ?>>
		
		<!--Header Start-->
		<header>
			<div class="header_center">
				<?php 
					$logo = cwp('logoid'); 
					
					if( !empty($logo) ):
						if( $logo == '/images/logo.png' ):
							echo '<div id="logo" style="background: url('.get_template_directory_uri().'/images/logo.png) no-repeat left center;">';
								echo '<a href="'.esc_url( home_url( '/' ) ).'"></a>';
							echo '</div>';
						else:
							echo '<div id="logo" style="background: url('.$logo.') no-repeat left center;">';
								echo '<a href="'.esc_url( home_url( '/' ) ).'"></a>';
							echo '</div>';
						endif;
					else:
						echo '<div id="no-logo">';
							echo '<h1 class="site-title"><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.get_bloginfo( 'name' ).'</a></h1>';

						echo '<h2 class="site-description"><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.get_bloginfo( 'description' ).'</a></h2>';
						echo '</div>';
					endif;
				?>	
				<div class="menu_toggle"></div>

				<?php 
					$header_button = cwp('header_button');
					$header_button_text = cwp('header_button_text');
					$header_button_link = cwp('header_button_link');
					if(isset($header_button) && $header_button == 'show') {
						if( !empty($header_button_text) && !empty($header_button_link) ) {
							?>
								<div class="buyalbum">
									<a href="<?php echo $header_button_link; ?>"><?php echo $header_button_text; ?></a>
								</div>
							<?php
						}
					}
				?>

				<nav id="header_nav" class="main-navigation">
					<?php  wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '' ) ); ?>
				</nav><!--/header_nav-->
				
				<?php if(get_header_image() != ''): ?>
				<img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>" >
				<?php endif; ?>
			</div><!--/header_center-->
			
		</header>
		
		
		<?php 
			if (!is_front_page()):

				$top_banner_image = cwp('top_banner_image');
				
				if( !empty($top_banner_image) ):
				
					$top_banner_title = cwp('top_banner_title');
					$top_banner_text = cwp('top_banner_text');
				
					if($top_banner_image == '/images/abovefooterbg.png'):
					
						?>
							<section id="subheader" class="subheader_news" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/abovefooterbg.png);">
								<?php 
									if( !empty($top_banner_title) ):
										echo '<div class="album_title">'.$top_banner_title.'</div>';
									endif;	
									if( !empty($top_banner_text) ):
										echo '<p>'.$top_banner_text.'</p>';
									endif;	
								?>
							</section><!--/subheader-->
						<?php
					
					else:
						?>
							<section id="subheader" class="subheader_news" style="<?php echo $top_banner_image; ?>">
								<?php 
									if( !empty($top_banner_title) ):
										echo '<div class="album_title">'.$top_banner_text.'</div>';
									endif;	
									if( !empty($top_banner_text) ):
										echo '<p>'.$top_banner_text.'</p>';
									endif;	
								?>
							</section><!--/subheader-->
						<?php
					endif;
					
				endif;

			endif;	
		?>

		<div class="headerborder"></div>
		<!--Header End-->