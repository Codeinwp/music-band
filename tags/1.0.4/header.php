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
</head>

<body <?php body_class(); ?>>
		
		<!--Header Start-->
		<header>
			<div class="header_center">
				<?php 
					$logo = cwp('logoid'); 
					if($logo == '/images/logo.png')
						$logo = get_template_directory_uri().$logo;
					
					if(isset($logo) && $logo != '') {	
				?>
						<div id="logo" style="background: url(<?php echo $logo; ?>) no-repeat left center;">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"></a>
						</div><!--/logo-->
				<?php 	
					}
					else {
				?>
						<div id="no-logo">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e('Music Band','music-band-pro'); ?></a>
						</div><!--/logo-->
				<?php	
					}
				?>	
				<div class="menu_toggle"></div>

				<?php 
					$header_button = cwp('header_button');
					$header_button_text = cwp('header_button_text');
					$header_button_link = cwp('header_button_link');
					if(isset($header_button) && $header_button == 'show') {
						if(isset($header_button_text) && $header_button_text != '' && isset($header_button_link) && $header_button_link != '') {
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
		
		<!--Header End-->