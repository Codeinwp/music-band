<?php
/*
 * cwp functions and definitions
 *
 * @package cwp
 *
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */
	
function cwp_setup() {
	load_theme_textdomain( 'cwp', get_template_directory() . '/languages' );
	/*
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );
	/*
	 * Enable support for Post Thumbnails on posts and pages
	 */
	add_theme_support( 'post-thumbnails' );
	
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'cwp' ),
		'footer_menu' => __('Footer Menu', 'cwp')
		) 
	);
	/*
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'cwp_custom_background_args', array(
		'default-color' => '#f5f4f9',
		'default-image' => '',
	) ) );
	
	require( get_template_directory() . '/admin/functions.php' );
}

add_action( 'after_setup_theme', 'cwp_setup' );

/*
 * Register widgetized area and update sidebar with default widgets
 */
function cwp_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'cwp' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'cwp_widgets_init' );

/*
 * Enqueue scripts and styles
 */
function cwp_scripts() {

	wp_enqueue_style( 'cwp-style', get_stylesheet_uri() );
	
	wp_enqueue_script('jquery');

	wp_enqueue_script( 'cwp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	
	wp_enqueue_script( 'cwp-tabs', get_template_directory_uri() . '/js/tabs.js', array('jquery'), '20120206', true );
	
	wp_enqueue_script( 'cwp-slider', get_template_directory_uri() . '/js/jquery.slides.js', array('jquery'), '20120206', true );
	
	wp_enqueue_script( 'cwp-customscript', get_template_directory_uri() . '/js/customscript.js', array('jquery','cwp-tabs','cwp-slider'), '20120206', true );
	
	wp_enqueue_script( 'cwp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'cwp-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'cwp_scripts' );

/*
 * Implement the Custom Header feature.
 */
$args = array(
		'width'         => 1024,
		'height'        => 60,
		'default-image' => '',
		'uploads'       => true,
	);
add_theme_support( 'custom-header', $args );

/*
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/*
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/*
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/*
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

function cwp_add_editor_styles() {
    add_editor_style( '/css/custom-editor-style.css' );
}
add_action( 'init', 'cwp_add_editor_styles' );

add_filter( 'the_title', 'cwp_default_title' );

function cwp_default_title( $title ) {

	if($title == '')
		$title = "Default title";

	return $title;
}

add_action( 'init', 'cwp_create_post_type' );
function cwp_create_post_type() {
	register_post_type( 'album',
							array(
								'labels' => array(
									'name' => __( 'Albums','cwp' ),
									'singular_name' => __( 'Album','cwp' )
								),
							'public' => true,
							'has_archive' => true,
							//for tags
							'taxonomies' => array('post_tag'),
							//for the featured image
							'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
								'show_ui' => true,
							)
	);
	register_post_type( 'event',
							array(
								'labels' => array(
									'name' => __( 'Events','cwp' ),
									'singular_name' => __( 'Event','cwp' )
								),
							'public' => true,
							'has_archive' => true,
							//for tags
							'taxonomies' => array('post_tag'),
							//for the featured image
							'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
								'show_ui' => true,
							)
	);
	register_post_type( 'media',
							array(
								'labels' => array(
									'name' => __( 'Media','cwp' ),
									'singular_name' => __( 'Media','cwp' )
								),
							'public' => true,
							'has_archive' => true,
							//for tags
							'taxonomies' => array('post_tag'),
							//for the featured image
							'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
								'show_ui' => true,
							)
	);
	register_post_type( 'band_member',
							array(
								'labels' => array(
									'name' => __( 'Band members','cwp' ),
									'singular_name' => __( 'Band member','cwp' )
								),
							'public' => true,
							'has_archive' => true,
							//for tags
							'taxonomies' => array('post_tag'),
							//for the featured image
							'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
								'show_ui' => true,
							)
	);
	flush_rewrite_rules();
}

add_filter( 'wp_nav_menu_objects', create_function( '$menu', 'return array_reverse( $menu );' ) );

// function to display number of posts.
function cwp_getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
 
// function to count views.
function cwp_setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'cwp_posts_column_views');
add_action('manage_posts_custom_column', 'cwp_posts_custom_column_views',5,2);
function cwp_posts_column_views($defaults){
    $defaults['post_views'] = __('Views','cwp');
    return $defaults;
}
function cwp_posts_custom_column_views($column_name, $id){
  if($column_name === 'post_views'){
        echo cwp_getPostViews(get_the_ID());
    }
}

add_action('admin_menu', 'cwp_post_options_box');
 
function cwp_post_options_box() {
    add_meta_box('post_info', 'Date of event + Get tickets link', 'cwp_custom_post_info', 'event', 'side', 'high');
	add_meta_box('post_info', 'Caption of image', 'cwp_caption_image', 'page', 'side', 'high');
	add_meta_box('post_info', 'Album details', 'cwp_album_metaboxes', 'album', 'advanced', 'high');
	add_meta_box('post_info', 'Career', 'cwp_career_metaboxes', 'band_member', 'side', 'high');
}

function cwp_career_metaboxes() {
	global $post;
	?>
	<fieldset id="mycustom-div">
	<div>
	<p>
	<label for="cpi_career_option"><?php _e('Band member career:','cwp'); ?></label><br />
	<input type="text" name="cpi_career_option" id="cpi_career_option" value="<?php echo get_post_meta($post->ID, 'cpi_career_option', true); ?>">
	</p>
	</div>
	</fieldset>
	<?php
}

function cwp_caption_image() {
	global $post;
	?>
	<fieldset id="mycustom-div">
	<div>
	<p>
	<label for="cpi_caption_option"><?php _e('Caption image text:','cwp'); ?></label><br />
	<input type="text" name="cpi_caption_option" id="cpi_caption_option" value="<?php echo get_post_meta($post->ID, 'cpi_caption_option', true); ?>">
	</p>
	</div>
	</fieldset>
	<?php
}

function cwp_album_metaboxes() {
	global $post;
	?>
	<fieldset id="mycustom-div">
	<div>
	<p>
	<label for="cpi_price_option"><?php _e('Price:','cwp'); ?></label><br />
	<input type="text" name="cpi_price_option" id="cpi_price_option" value="<?php echo get_post_meta($post->ID, 'cpi_price_option', true); ?>">
	</p>
	<p>
	<label for="cpi_buyalbum_option"><?php _e('Buy album link(for sidebar):','cwp'); ?></label><br />
	<input type="text" name="cpi_buyalbum_option" id="cpi_buyalbum_option" value="<?php echo get_post_meta($post->ID, 'cpi_buyalbum_option', true); ?>">
	</p>
	<p>
	<label for="cpi_itunes_option"><?php _e('Get on itunes(for sidebar):','cwp'); ?></label><br />
	<input type="text" name="cpi_itunes_option" id="cpi_itunes_option" value="<?php echo get_post_meta($post->ID, 'cpi_itunes_option', true); ?>">
	</p>
	<p>
	<label for="cpi_song1_option"><?php _e('Song no1 title:','cwp'); ?></label><br />
	<input type="text" name="cpi_song1_option" id="cpi_song1_option" value="<?php echo get_post_meta($post->ID, 'cpi_song1_option', true); ?>">
	</p>
	<p>
	<label for="cpi_time1_option"><?php _e('Song no1 duration:','cwp'); ?></label><br />
	<input type="text" name="cpi_time1_option" id="cpi_time1_option" value="<?php echo get_post_meta($post->ID, 'cpi_time1_option', true); ?>">
	</p>
	<p>
	<label for="cpi_link1_option"><?php _e('Song no1 lyrics link:','cwp'); ?></label><br />
	<input type="text" name="cpi_link1_option" id="cpi_link1_option" value="<?php echo get_post_meta($post->ID, 'cpi_link1_option', true); ?>">
	</p>
	<p>
	<label for="cpi_song2_option"><?php _e('Song no2 title','cwp'); ?></label><br />
	<input type="text" name="cpi_song2_option" id="cpi_song2_option" value="<?php echo get_post_meta($post->ID, 'cpi_song2_option', true); ?>">
	</p>
	<p>
	<label for="cpi_time2_option"><?php _e('Song no2 duration:','cwp'); ?></label><br />
	<input type="text" name="cpi_time2_option" id="cpi_time2_option" value="<?php echo get_post_meta($post->ID, 'cpi_time2_option', true); ?>">
	</p>
	<p>
	<label for="cpi_link2_option"><?php _e('Song no2 lyrics link:','cwp'); ?></label><br />
	<input type="text" name="cpi_link2_option" id="cpi_link2_option" value="<?php echo get_post_meta($post->ID, 'cpi_link2_option', true); ?>">
	</p>
	<p>
	<label for="cpi_song3_option"><?php _e('Song no3 title:','cwp'); ?></label><br />
	<input type="text" name="cpi_song3_option" id="cpi_song3_option" value="<?php echo get_post_meta($post->ID, 'cpi_song3_option', true); ?>">
	</p>
	<p>
	<label for="cpi_time3_option"><?php _e('Song no3 duration:','cwp'); ?></label><br />
	<input type="text" name="cpi_time3_option" id="cpi_time3_option" value="<?php echo get_post_meta($post->ID, 'cpi_time3_option', true); ?>">
	</p>
	<p>
	<label for="cpi_link3_option"><?php _e('Song no3 lyrics link:','cwp'); ?></label><br />
	<input type="text" name="cpi_link3_option" id="cpi_link3_option" value="<?php echo get_post_meta($post->ID, 'cpi_link3_option', true); ?>">
	</p>
	<p>
	<label for="cpi_song4_option"><?php _e('Song no4 title:','cwp'); ?></label><br />
	<input type="text" name="cpi_song4_option" id="cpi_song4_option" value="<?php echo get_post_meta($post->ID, 'cpi_song4_option', true); ?>">
	</p>
	<p>
	<label for="cpi_time4_option"><?php _e('Song no4 duration:','cwp'); ?></label><br />
	<input type="text" name="cpi_time4_option" id="cpi_time4_option" value="<?php echo get_post_meta($post->ID, 'cpi_time4_option', true); ?>">
	</p>
	<p>
	<label for="cpi_link4_option"><?php _e('Song no4 lyrics link:','cwp'); ?></label><br />
	<input type="text" name="cpi_link4_option" id="cpi_link4_option" value="<?php echo get_post_meta($post->ID, 'cpi_link4_option', true); ?>">
	</p>
	<p>
	<label for="cpi_song5_option"><?php _e('Song no5 title:','cwp'); ?></label><br />
	<input type="text" name="cpi_song5_option" id="cpi_song5_option" value="<?php echo get_post_meta($post->ID, 'cpi_song5_option', true); ?>">
	</p>
	<p>
	<label for="cpi_time5_option"><?php _e('Song no5 duration:','cwp'); ?></label><br />
	<input type="text" name="cpi_time5_option" id="cpi_time5_option" value="<?php echo get_post_meta($post->ID, 'cpi_time5_option', true); ?>">
	</p>
	<p>
	<label for="cpi_link5_option"><?php _e('Song no5 lyrics link:','cwp'); ?></label><br />
	<input type="text" name="cpi_link5_option" id="cpi_link5_option" value="<?php echo get_post_meta($post->ID, 'cpi_link5_option', true); ?>">
	</p>
	<p>
	<label for="cpi_song6_option"><?php _e('Song no6 title:','cwp'); ?></label><br />
	<input type="text" name="cpi_song6_option" id="cpi_song6_option" value="<?php echo get_post_meta($post->ID, 'cpi_song6_option', true); ?>">
	</p>
	<p>
	<label for="cpi_time6_option"><?php _e('Song no6 duration:','cwp'); ?></label><br />
	<input type="text" name="cpi_time6_option" id="cpi_time6_option" value="<?php echo get_post_meta($post->ID, 'cpi_time6_option', true); ?>">
	</p>
	<p>
	<label for="cpi_link6_option"><?php _e('Song no6 lyrics link:','cwp'); ?></label><br />
	<input type="text" name="cpi_link6_option" id="cpi_link6_option" value="<?php echo get_post_meta($post->ID, 'cpi_link6_option', true); ?>">
	</p>
	<p>
	<label for="cpi_song7_option"><?php _e('Song no7 title:','cwp'); ?></label><br />
	<input type="text" name="cpi_song7_option" id="cpi_song7_option" value="<?php echo get_post_meta($post->ID, 'cpi_song7_option', true); ?>">
	</p>
	<p>
	<label for="cpi_time7_option"><?php _e('Song no7 duration:','cwp'); ?></label><br />
	<input type="text" name="cpi_time7_option" id="cpi_time7_option" value="<?php echo get_post_meta($post->ID, 'cpi_time7_option', true); ?>">
	</p>
	<p>
	<label for="cpi_link7_option"><?php _e('Song no7 lyrics link:','cwp'); ?></label><br />
	<input type="text" name="cpi_link7_option" id="cpi_link7_option" value="<?php echo get_post_meta($post->ID, 'cpi_link7_option', true); ?>">
	</p>
	<p>
	<label for="cpi_song8_option"><?php _e('Song no8 title:','cwp'); ?></label><br />
	<input type="text" name="cpi_song8_option" id="cpi_song8_option" value="<?php echo get_post_meta($post->ID, 'cpi_song88_option', true); ?>">
	</p>
	<p>
	<label for="cpi_time8_option"><?php _e('Song no8 duration:','cwp'); ?></label><br />
	<input type="text" name="cpi_time8_option" id="cpi_time8_option" value="<?php echo get_post_meta($post->ID, 'cpi_time8_option', true); ?>">
	</p>
	<p>
	<label for="cpi_link8_option"><?php _e('Song no8 lyrics link:','cwp'); ?></label><br />
	<input type="text" name="cpi_link8_option" id="cpi_link8_option" value="<?php echo get_post_meta($post->ID, 'cpi_link8_option', true); ?>">
	</p>
	<p>
	<label for="cpi_song9_option"><?php _e('Song no9 title:','cwp'); ?></label><br />
	<input type="text" name="cpi_song9_option" id="cpi_song9_option" value="<?php echo get_post_meta($post->ID, 'cpi_song9_option', true); ?>">
	</p>
	<p>
	<label for="cpi_time9_option"><?php _e('Song no9 duration:','cwp'); ?></label><br />
	<input type="text" name="cpi_time9_option" id="cpi_time9_option" value="<?php echo get_post_meta($post->ID, 'cpi_time9_option', true); ?>">
	</p>
	<p>
	<label for="cpi_link9_option"><?php _e('Song no9 lyrics link:','cwp'); ?></label><br />
	<input type="text" name="cpi_link9_option" id="cpi_link9_option" value="<?php echo get_post_meta($post->ID, 'cpi_link9_option', true); ?>">
	</p>
	<p>
	<label for="cpi_song10_option"><?php _e('Song no10 title:','cwp'); ?></label><br />
	<input type="text" name="cpi_song10_option" id="cpi_song10_option" value="<?php echo get_post_meta($post->ID, 'cpi_song10_option', true); ?>">
	</p>
	<p>
	<label for="cpi_time10_option"><?php _e('Song no10 duration:','cwp'); ?></label><br />
	<input type="text" name="cpi_time10_option" id="cpi_time10_option" value="<?php echo get_post_meta($post->ID, 'cpi_time10_option', true); ?>">
	</p>
	<p>
	<label for="cpi_link10_option"><?php _e('Song no10 lyrics link:','cwp'); ?></label><br />
	<input type="text" name="cpi_link10_option" id="cpi_link10_option" value="<?php echo get_post_meta($post->ID, 'cpi_link10_option', true); ?>">
	</p>
	<p>
	<label for="cpi_song11_option"><?php _e('Song no11 title:','cwp'); ?></label><br />
	<input type="text" name="cpi_song11_option" id="cpi_song11_option" value="<?php echo get_post_meta($post->ID, 'cpi_song11_option', true); ?>">
	</p>
	<p>
	<label for="cpi_time11_option"><?php _e('Song no11 duration:','cwp'); ?></label><br />
	<input type="text" name="cpi_time11_option" id="cpi_time11_option" value="<?php echo get_post_meta($post->ID, 'cpi_time11_option', true); ?>">
	</p>
	<p>
	<label for="cpi_link11_option"><?php _e('Song no11 lyrics link:','cwp'); ?></label><br />
	<input type="text" name="cpi_link11_option" id="cpi_link11_option" value="<?php echo get_post_meta($post->ID, 'cpi_link11_option', true); ?>">
	</p>
	<p>
	<label for="cpi_song12_option"><?php _e('Song no12 title:','cwp'); ?></label><br />
	<input type="text" name="cpi_song12_option" id="cpi_song12_option" value="<?php echo get_post_meta($post->ID, 'cpi_song12_option', true); ?>">
	</p>
	<p>
	<label for="cpi_time12_option"><?php _e('Song no12 duration:','cwp'); ?></label><br />
	<input type="text" name="cpi_time12_option" id="cpi_time12_option" value="<?php echo get_post_meta($post->ID, 'cpi_time12_option', true); ?>">
	</p>
	<p>
	<label for="cpi_link12_option"><?php _e('Song no12 lyrics link:','cwp'); ?></label><br />
	<input type="text" name="cpi_link12_option" id="cpi_link12_option" value="<?php echo get_post_meta($post->ID, 'cpi_link12_option', true); ?>">
	</p>
	<p>
	<label for="cpi_song13_option"><?php _e('Song no13 duration:','cwp'); ?></label><br />
	<input type="text" name="cpi_song13_option" id="cpi_song13_option" value="<?php echo get_post_meta($post->ID, 'cpi_song13_option', true); ?>">
	</p>
	<p>
	<label for="cpi_time13_option"><?php _e('Song no13 duration:','cwp'); ?></label><br />
	<input type="text" name="cpi_time13_option" id="cpi_time13_option" value="<?php echo get_post_meta($post->ID, 'cpi_time13_option', true); ?>">
	</p>
	<p>
	<label for="cpi_link13_option"><?php _e('Song no13 lyrics link:','cwp'); ?></label><br />
	<input type="text" name="cpi_link13_option" id="cpi_link13_option" value="<?php echo get_post_meta($post->ID, 'cpi_link13_option', true); ?>">
	</p>
	<p>
	<label for="cpi_song14_option"><?php _e('Song no14 title:','cwp'); ?></label><br />
	<input type="text" name="cpi_song14_option" id="cpi_song14_option" value="<?php echo get_post_meta($post->ID, 'cpi_song14_option', true); ?>">
	</p>
	<p>
	<label for="cpi_time14_option"><?php _e('Song no14 duration:','cwp'); ?></label><br />
	<input type="text" name="cpi_time14_option" id="cpi_time14_option" value="<?php echo get_post_meta($post->ID, 'cpi_time14_option', true); ?>">
	</p>
	<p>
	<label for="cpi_link14_option"><?php _e('Song no14 lyrics link:','cwp'); ?></label><br />
	<input type="text" name="cpi_link14_option" id="cpi_link14_option" value="<?php echo get_post_meta($post->ID, 'cpi_link14_option', true); ?>">
	</p>
	<p>
	<label for="cpi_song15_option"><?php _e('Song no15 title:','cwp'); ?></label><br />
	<input type="text" name="cpi_song15_option" id="cpi_song15_option" value="<?php echo get_post_meta($post->ID, 'cpi_song15_option', true); ?>">
	</p>
	<p>
	<label for="cpi_time15_option"><?php _e('Song no15 duration:','cwp'); ?></label><br />
	<input type="text" name="cpi_time15_option" id="cpi_time15_option" value="<?php echo get_post_meta($post->ID, 'cpi_time15_option', true); ?>">
	</p>
	<p>
	<label for="cpi_link15_option"><?php _e('Song no15 lyrics link:','cwp'); ?></label><br />
	<input type="text" name="cpi_link15_option" id="cpi_link15_option" value="<?php echo get_post_meta($post->ID, 'cpi_link15_option', true); ?>">
	</p>
	<p>
	<label for="cpi_song16_option"><?php _e('Song no16 title:','cwp'); ?></label><br />
	<input type="text" name="cpi_song16_option" id="cpi_song16_option" value="<?php echo get_post_meta($post->ID, 'cpi_song16_option', true); ?>">
	</p>
	<p>
	<label for="cpi_time16_option"><?php _e('Song no16 duration:','cwp'); ?></label><br />
	<input type="text" name="cpi_time16_option" id="cpi_time16_option" value="<?php echo get_post_meta($post->ID, 'cpi_time16_option', true); ?>">
	</p>
	<p>
	<label for="cpi_link16_option"><?php _e('Song no16 lyrics link:','cwp'); ?></label><br />
	<input type="text" name="cpi_link16_option" id="cpi_link16_option" value="<?php echo get_post_meta($post->ID, 'cpi_link16_option', true); ?>">
	</p>
	<p>
	<label for="cpi_song17_option"><?php _e('Song no17 title:','cwp'); ?></label><br />
	<input type="text" name="cpi_song17_option" id="cpi_song17_option" value="<?php echo get_post_meta($post->ID, 'cpi_song17_option', true); ?>">
	</p>
	<p>
	<label for="cpi_time17_option"><?php _e('Song no17 duration:','cwp'); ?></label><br />
	<input type="text" name="cpi_time17_option" id="cpi_time17_option" value="<?php echo get_post_meta($post->ID, 'cpi_time17_option', true); ?>">
	</p>
	<p>
	<label for="cpi_link17_option"><?php _e('Song no17 lyrics link:','cwp'); ?></label><br />
	<input type="text" name="cpi_link17_option" id="cpi_link17_option" value="<?php echo get_post_meta($post->ID, 'cpi_link17_option', true); ?>">
	</p>
	<p>
	<label for="cpi_song18_option"><?php _e('Song no18 title:','cwp'); ?></label><br />
	<input type="text" name="cpi_song18_option" id="cpi_song18_option" value="<?php echo get_post_meta($post->ID, 'cpi_song18_option', true); ?>">
	</p>
	<p>
	<label for="cpi_time18_option"><?php _e('Song no18 duration:','cwp'); ?></label><br />
	<input type="text" name="cpi_time18_option" id="cpi_time18_option" value="<?php echo get_post_meta($post->ID, 'cpi_time18_option', true); ?>">
	</p>
	<p>
	<label for="cpi_link18_option"><?php _e('Song no18 lyrics link:','cwp'); ?></label><br />
	<input type="text" name="cpi_link18_option" id="cpi_link18_option" value="<?php echo get_post_meta($post->ID, 'cpi_link18_option', true); ?>">
	</p>
	<p>
	<label for="cpi_song19_option"><?php _e('Song no19 title:','cwp'); ?></label><br />
	<input type="text" name="cpi_song19_option" id="cpi_song19_option" value="<?php echo get_post_meta($post->ID, 'cpi_song19_option', true); ?>">
	</p>
	<p>
	<label for="cpi_time19_option"><?php _e('Song no19 duration:','cwp'); ?></label><br />
	<input type="text" name="cpi_time19_option" id="cpi_time19_option" value="<?php echo get_post_meta($post->ID, 'cpi_time19_option', true); ?>">
	</p>
	<p>
	<label for="cpi_link19_option"><?php _e('Song no19 lyrics link:','cwp'); ?></label><br />
	<input type="text" name="cpi_link19_option" id="cpi_link19_option" value="<?php echo get_post_meta($post->ID, 'cpi_link19_option', true); ?>">
	</p>
	<p>
	<label for="cpi_song20_option"><?php _e('Song no20 title:','cwp'); ?></label><br />
	<input type="text" name="cpi_song20_option" id="cpi_song20_option" value="<?php echo get_post_meta($post->ID, 'cpi_song20_option', true); ?>">
	</p>
	<p>
	<label for="cpi_time20_option"><?php _e('Song no20 duration:','cwp'); ?></label><br />
	<input type="text" name="cpi_time20_option" id="cpi_time20_option" value="<?php echo get_post_meta($post->ID, 'cpi_time20_option', true); ?>">
	</p>
	<p>
	<label for="cpi_link20_option"><?php _e('Song no20 lyrics link:','cwp'); ?></label><br />
	<input type="text" name="cpi_link20_option" id="cpi_link20_option" value="<?php echo get_post_meta($post->ID, 'cpi_link20_option', true); ?>">
	</p>
	</div>
	</fieldset>
	<?php
}
 
//Adds the actual option box
function cwp_custom_post_info() {
	global $post;
	?>
	<fieldset id="mycustom-div">
	<div>
	<p>
	<label for="cpi_day_option"><?php _e('Day:','cwp'); ?></label><br />
	<input type="text" name="cpi_day_option" id="cpi_day_option" value="<?php echo get_post_meta($post->ID, 'cpi_day_option', true); ?>">
	<br />
	<label for="cpi_month_option"><?php _e('Month:','cwp'); ?></label><br />
	<input type="text" name="cpi_month_option" id="cpi_month_option" value="<?php echo get_post_meta($post->ID, 'cpi_month_option', true); ?>">
	<br />
	<label for="cpi_tickets_option"><?php _e('Get tickets link:','cwp'); ?></label><br />
	<input type="text" name="cpi_tickets_option" id="cpi_tickets_option" value="<?php echo get_post_meta($post->ID, 'cpi_tickets_option', true); ?>">
	
	</p>
	</div>
	</fieldset>
	<?php
}
 
add_action('save_post', 'cwp_custom_add_save');
function cwp_custom_add_save($postID){
	// called after a post or page is saved
	if($parent_id = wp_is_post_revision($postID))
	{
		$postID = $parent_id;
	}
 
	if (isset($_POST['cpi_month_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_month_option'], 'cpi_month_option');
	}
	if (isset($_POST['cpi_day_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_day_option'], 'cpi_day_option');
	}
	if (isset($_POST['cpi_tickets_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_tickets_option'], 'cpi_tickets_option');
	}
	if (isset($_POST['cpi_price_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_price_option'], 'cpi_price_option');
	}
	
	if (isset($_POST['cpi_song1_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_song1_option'], 'cpi_song1_option');
	}
	if (isset($_POST['cpi_song2_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_song2_option'], 'cpi_song2_option');
	}
	if (isset($_POST['cpi_song3_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_song3_option'], 'cpi_song3_option');
	}
	if (isset($_POST['cpi_song4_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_song4_option'], 'cpi_song4_option');
	}
	if (isset($_POST['cpi_song5_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_song5_option'], 'cpi_song5_option');
	}
	if (isset($_POST['cpi_song6_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_song6_option'], 'cpi_song6_option');
	}
	if (isset($_POST['cpi_song7_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_song7_option'], 'cpi_song7_option');
	}
	if (isset($_POST['cpi_song8_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_song8_option'], 'cpi_song8_option');
	}
	if (isset($_POST['cpi_song9_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_song9_option'], 'cpi_song9_option');
	}
	if (isset($_POST['cpi_song10_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_song10_option'], 'cpi_song10_option');
	}
	if (isset($_POST['cpi_song11_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_song11_option'], 'cpi_song11_option');
	}
	if (isset($_POST['cpi_song12_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_song12_option'], 'cpi_song12_option');
	}
	if (isset($_POST['cpi_song13_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_song13_option'], 'cpi_song13_option');
	}
	if (isset($_POST['cpi_song14_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_song14_option'], 'cpi_song14_option');
	}
	if (isset($_POST['cpi_song15_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_song15_option'], 'cpi_song15_option');
	}
	if (isset($_POST['cpi_song16_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_song16_option'], 'cpi_song16_option');
	}
	if (isset($_POST['cpi_song17_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_song17_option'], 'cpi_song17_option');
	}
	if (isset($_POST['cpi_song18_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_song18_option'], 'cpi_song18_option');
	}
	if (isset($_POST['cpi_song19_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_song19_option'], 'cpi_song19_option');
	}
	if (isset($_POST['cpi_song20_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_song20_option'], 'cpi_song20_option');
	}
	if (isset($_POST['cpi_time1_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_time1_option'], 'cpi_time1_option');
	}
	if (isset($_POST['cpi_time2_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_time2_option'], 'cpi_time2_option');
	}
	if (isset($_POST['cpi_time3_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_time3_option'], 'cpi_time3_option');
	}
	if (isset($_POST['cpi_time4_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_time4_option'], 'cpi_time4_option');
	}
	if (isset($_POST['cpi_time5_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_time5_option'], 'cpi_time5_option');
	}
	if (isset($_POST['cpi_time6_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_time6_option'], 'cpi_time6_option');
	}
	if (isset($_POST['cpi_time7_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_time7_option'], 'cpi_time7_option');
	}
	if (isset($_POST['cpi_time8_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_time8_option'], 'cpi_time8_option');
	}
	if (isset($_POST['cpi_time9_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_time9_option'], 'cpi_time9_option');
	}
	if (isset($_POST['cpi_time10_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_time10_option'], 'cpi_time10_option');
	}
	if (isset($_POST['cpi_time11_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_time11_option'], 'cpi_time11_option');
	}
	if (isset($_POST['cpi_time12_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_time12_option'], 'cpi_time12_option');
	}
	if (isset($_POST['cpi_time13_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_time13_option'], 'cpi_time13_option');
	}
	if (isset($_POST['cpi_time14_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_time14_option'], 'cpi_time14_option');
	}
	if (isset($_POST['cpi_time15_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_time15_option'], 'cpi_time15_option');
	}
	if (isset($_POST['cpi_time16_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_time16_option'], 'cpi_time16_option');
	}
	if (isset($_POST['cpi_time17_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_time17_option'], 'cpi_time17_option');
	}
	if (isset($_POST['cpi_time18_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_time18_option'], 'cpi_time18_option');
	}
	if (isset($_POST['cpi_time19_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_time19_option'], 'cpi_time19_option');
	}
	if (isset($_POST['cpi_time20_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_time20_option'], 'cpi_time20_option');
	}
	
	if (isset($_POST['cpi_link1_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_link1_option'], 'cpi_link1_option');
	}
	if (isset($_POST['cpi_link2_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_link2_option'], 'cpi_link2_option');
	}
	if (isset($_POST['cpi_link2_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_link2_option'], 'cpi_link2_option');
	}
	if (isset($_POST['cpi_link3_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_link3_option'], 'cpi_link3_option');
	}
	if (isset($_POST['cpi_link4_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_link4_option'], 'cpi_link4_option');
	}
	if (isset($_POST['cpi_link5_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_link5_option'], 'cpi_link5_option');
	}
	if (isset($_POST['cpi_link6_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_link6_option'], 'cpi_link6_option');
	}
	if (isset($_POST['cpi_link7_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_link7_option'], 'cpi_link7_option');
	}
	if (isset($_POST['cpi_link8_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_link8_option'], 'cpi_link8_option');
	}
	if (isset($_POST['cpi_link9_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_link9_option'], 'cpi_link9_option');
	}
	if (isset($_POST['cpi_link10_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_link10_option'], 'cpi_link10_option');
	}
	if (isset($_POST['cpi_link11_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_link11_option'], 'cpi_link11_option');
	}
	if (isset($_POST['cpi_link12_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_link12_option'], 'cpi_link12_option');
	}
	if (isset($_POST['cpi_link13_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_link13_option'], 'cpi_link13_option');
	}
	if (isset($_POST['cpi_link14_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_link14_option'], 'cpi_link14_option');
	}
	if (isset($_POST['cpi_link15_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_link15_option'], 'cpi_link15_option');
	}
	if (isset($_POST['cpi_link16_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_link16_option'], 'cpi_link16_option');
	}
	if (isset($_POST['cpi_link17_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_link17_option'], 'cpi_link17_option');
	}
	if (isset($_POST['cpi_link18_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_link18_option'], 'cpi_link18_option');
	}
	if (isset($_POST['cpi_link19_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_link19_option'], 'cpi_link19_option');
	}
	if (isset($_POST['cpi_link20_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_link20_option'], 'cpi_link20_option');
	}
	if (isset($_POST['cpi_caption_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_caption_option'], 'cpi_caption_option');
	}
	if (isset($_POST['cpi_career_option'])) {
		cwp_update_custom_meta($postID, $_POST['cpi_career_option'], 'cpi_career_option');
	}
}
 
function cwp_update_custom_meta($postID, $newvalue, $field_name) {
	// To create new meta
	if(!get_post_meta($postID, $field_name)){
	add_post_meta($postID, $field_name, $newvalue);
	}else{
	// or to update existing meta
	update_post_meta($postID, $field_name, $newvalue);
	}
}

class cwp_custom_menu_walker extends Walker
{
    public function walk( $elements, $max_depth )
    {
        $list = array ();

        foreach ( $elements as $item )
            $list[] = "<a href='$item->url'>$item->title</a>";

        return join( "\n", $list );
    }
}

function cwp_related_posts() {
 
	$posttags = get_the_tags();	
	
	$tag_list = array();
	
	if ($posttags) {
		foreach($posttags as $tag) {
			array_push($tag_list,$tag->term_id); 
		}
	}
	
	$notin = get_option('sticky_posts');
	array_push($notin, get_the_ID());
	
	if($tag_list) {
		$args = array(
			'posts_per_page' => 6,
			'post__not_in' => $notin,
			'tag__in'  => $tag_list
		);
	}
	else {
		$args = array(
			'posts_per_page' => 6,
			'post__not_in' => $notin
		);
	}
	$the_query = new WP_Query( $args );
	echo '<div class="widget related_news">';
	echo '<div class="title dark">'.__('Related News','cwp').'</div>';
	while ( $the_query->have_posts() ) : $the_query->the_post();
		?> 
			<div class="news">
				<a href=""><?php the_title(); ?></a>
				<p><?php echo get_the_date('F d, Y'); ?></p>
			</div>
		<?php	
	endwhile;
	echo '</div>';
	wp_reset_postdata();
 
}