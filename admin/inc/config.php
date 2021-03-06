<?php
	class cwpConfig{
		public static $admin_page_menu_name ;
		public static  $admin_page_title 	;
		public static  $admin_page_header 	;
		public static  $admin_template_directory ;
		public static  $admin_template_directory_uri ;
		public static  $admin_uri 	;
		public static $admin_path  ;
		public static  $menu_slug 	;
		public static $structure;
		public static function init(){
		
			$tmp = array();
			$default = array();
			$args = array(
						'sort_order' => 'ASC',
						'sort_column' => 'post_title',
						'hierarchical' => 0,
						'exclude' => '',
						'include' => '',
						'meta_key' => '',
						'meta_value' => '',
						'authors' => '',
						'child_of' => 0,
						'parent' => -1,
						'exclude_tree' => '',
						'number' => '',
						'offset' => 0,
						'post_type' => 'page',
						'post_status' => 'publish'
					); 
					$pages = get_pages($args); 
					foreach ( $pages as $page ) {
					
						$tmp[$page->ID] = $page->post_title;
						
						array_push($default, $page->ID);
					}
            
                    $args_post = array(
						'posts_per_page'   => -1,
                        'offset'           => 0,
                        'category'         => '',
                        'orderby'          => 'post_date',
                        'order'            => 'DESC',
                        'include'          => '',
                        'exclude'          => '',
                        'meta_key'         => '',
                        'meta_value'       => '',
                        'post_type'        => array('post','acme_product'),
                        'post_mime_type'   => '',
                        'post_parent'      => '',
                        'post_status'      => 'publish',
                        'suppress_filters' => true
						
					); 
					$pages_post = get_posts($args_post); 
                
					foreach ( $pages_post as $page_post ) {
						$tmp[$page_post->ID] = $page_post->post_title;
						
						array_push($default, $page_post->ID);
					}
					
					
		
			self::$admin_page_menu_name 	 = "Theme Options";
			self::$admin_page_title 		 = "Theme Options";
			self::$admin_page_header	 	 = "Theme Options";
			self::$admin_template_directory_uri  = get_template_directory_uri() . '/admin/layout';
			self::$admin_template_directory  = get_template_directory() . '/admin/layout';
			self::$admin_uri  		= 	get_template_directory_uri() . '/admin/'; 
			self::$admin_path 	 	= 	get_template_directory() . '/admin/';
			self::$menu_slug  		= 	"theme_options";
			self::$structure	= array(
						array(
							 "type"=>"tab",
							 "name"=>__("General options",'music-band-pro'),
							 "options"=>array(
								array(
									
									"type"=>"image",
									"name"=>__("Logo",'music-band-pro'),
									"description"=>__("Choose logo",'music-band-pro'),
									"id"=>"logoid",
									"default"=> "/images/logo.png" 
								),
								array(
									"type"=>"input_text",
									"name"=>__("Copyright",'music-band-pro'),
									"description"=>__("Enter copyright text",'music-band-pro'),
									"id"=>"copyright",
									"default"=>"&copy; 2014 Violet Band. All rights reserved. "
								),
								
								array(
									
									"type"=>"radio",
									"name"=>__("Header button",'music-band-pro'),
									"description"=>__("Show or hide button in the header of the page",'music-band-pro'),
									"id"=>"header_button",
									"options"=>array(
												"show"=>__("Show",'music-band-pro'),
												"hide"=>__("Hide",'music-band-pro'),
									),
									"default"=>"show"
								),
								
								array(
									"type"=>"input_text",
									"name"=>__("Header button text",'music-band-pro'),
									"description"=>__("Enter the text for the header button in case you want the button to appear",'music-band-pro'),
									"id"=>"header_button_text",
									"default"=>__("BUY ALBUM",'music-band-pro')
								),
								
								array(
									"type"=>"input_text",
									"name"=>__("Header button link",'music-band-pro'),
									"description"=>__("Enter the link for the header button in case you want the button to appear",'music-band-pro'),
									"id"=>"header_button_link",
									"default"=>"#"
								),
								
								array(
									
									"type"=>"group",
									"name"=>__("Top banner",'music-band-pro'),
									"options"=>	array(
													
													array(
									
														"type"=>"image",
														"name"=>__("Top banner image",'music-band-pro'),
														"description"=>__("Choose an image for the top banner",'music-band-pro'),
														"id"=>"top_banner_image",
														"default"=> "/images/abovefooterbg.png" 
													),
													array(
														"type"=>"input_text",
														"name"=>__("Top banner title",'music-band-pro'),
														"description"=>__("Enter a title for the top banner",'music-band-pro'),
														"id"=>"top_banner_title",
														"default"=>__("NEW ALBUM",'music-band-pro')
													),
													array(
														"type"=>"input_text",
														"name"=>__("Top banner text",'music-band-pro'),
														"description"=>__("Enter a text for the top banner",'music-band-pro'),
														"id"=>"top_banner_text",
														"default"=>__("Pre release 15th November 2013.",'music-band-pro')
													),
									)
								),	
								
								array(
									
									"type"=>"group",
									"name"=>__("Footer section with boxes and social icons",'music-band-pro'),
									"options"=>	array(
													
													array(
									
														"type"=>"image",
														"name"=>__("Footer section background section",'music-band-pro'),
														"description"=>__("Choose an image for the footer section",'music-band-pro'),
														"id"=>"footer_section_image",
														"default"=> "/images/abovefooterbg.png" 
													),
													array(
														"type"=>"input_text",
														"name"=>__("First box title",'music-band-pro'),
														"description"=>__("Enter a title for the first box",'music-band-pro'),
														"id"=>"footer_section_title1",
														"default"=>__("ON TOUR",'music-band-pro')
													),
													array(
														"type"=>"input_text",
														"name"=>__("First box text",'music-band-pro'),
														"description"=>__("Enter a text for the first box",'music-band-pro'),
														"id"=>"footer_section_text1",
														"default"=>__("From 11th November",'music-band-pro')
													),
													array(
														"type"=>"input_text",
														"name"=>__("Second box title",'music-band-pro'),
														"description"=>__("Enter a title for the second box",'music-band-pro'),
														"id"=>"footer_section_title2",
														"default"=>__("DARK SKY",'music-band-pro')
													),
													array(
														"type"=>"input_text",
														"name"=>__("Second box text",'music-band-pro'),
														"description"=>__("Enter a text for the second box",'music-band-pro'),
														"id"=>"footer_section_text2",
														"default"=>__("get on itunes now!",'music-band-pro')
													),
													array(
														"type"=>"input_text",
														"name"=>__("Third box title",'music-band-pro'),
														"description"=>__("Enter a title for the third box",'music-band-pro'),
														"id"=>"footer_section_title3",
														"default"=>__("FUN ZONE",'music-band-pro')
													),
													array(
														"type"=>"input_text",
														"name"=>__("Third box text",'music-band-pro'),
														"description"=>__("Enter a text for the third box",'music-band-pro'),
														"id"=>"footer_section_text3",
														"default"=>__("send us a message",'music-band-pro')
													),
													array(
														"type"=>"input_text",
														"name"=>__("Facebook link",'music-band-pro'),
														"description"=>__("Enter the facebook link",'music-band-pro'),
														"id"=>"facebook",
														"default"=>"#"
													),
													array(
														"type"=>"input_text",
														"name"=>__("Twitter link",'music-band-pro'),
														"description"=>__("Enter the twitter link",'music-band-pro'),
														"id"=>"twitter",
														"default"=>"#"
													),
													array(
														"type"=>"input_text",
														"name"=>__("Linkedin link",'music-band-pro'),
														"description"=>__("Enter the linkedin link",'music-band-pro'),
														"id"=>"linkedin",
														"default"=>"#"
													),
									)
								)			
							 )
						),
						array(
							"type"=>"tab",
							"name"=>__("Single page",'music-band-pro'),
							"options"=>array(
										array(
									
											"type"=>"checkbox",
											"name"=>__("Post details",'music-band-pro'),
											"description"=>__("Choose what post details to show on single page",'music-band-pro'),
											"id"=>"details_single",
											"options"=>array(
												"date"=>__("Date",'music-band-pro'),
												"author"=>__("Author",'music-band-pro'),
												"number_of_comments"=>__("Number of comments",'music-band-pro'),
												"category"=>__("Category",'music-band-pro'),
												"tags"=>__("Tags",'music-band-pro'),
												"number_of_views"=>__("Number of views",'music-band-pro'),
												"none"=>__("None",'music-band-pro')
												
											),
											"default"=>array("date","number_of_comments")
										),
										array(
									
											"type"=>"radio",
											"name"=>__("Featured image on single page",'music-band-pro'),
											"description"=>__("Show or hide featured image on single page",'music-band-pro'),
											"id"=>"fi_single",
											"options"=>array(
												"show"=>__("Show",'music-band-pro'),
												"hide"=>__("Hide",'music-band-pro'),
											),
											"default"=>"show"
										)
							)
						),
						array(
							"type"=>"tab",
							"name"=>__("First page + Archive page + Search page",'music-band-pro'),
							"options"=>array(
										array(
									
											"type"=>"checkbox",
											"name"=>__("Post details",'music-band-pro'),
											"description"=>__("Choose what post details to show on first page, archive page and search page",'music-band-pro'),
											"id"=>"details_index",
											"options"=>array(
												"date"=>__("Date",'music-band-pro'),
												"author"=>__("Author",'music-band-pro'),
												"number_of_comments"=>__("Number of comments",'music-band-pro'),
												"category"=>__("Category",'music-band-pro'),
												"tags"=>__("Tags",'music-band-pro'),
												"none"=>__("None",'music-band-pro')
											),
											"default"=>array("date","number_of_comments")
										),
										array(
									
											"type"=>"radio",
											"name"=>__("Featured image on first page",'music-band-pro'),
											"description"=>__("Show or hide featured image on first page, archive page and search page",'music-band-pro'),
											"id"=>"fi_index",
											"options"=>array(
												"show"=>__("Show",'music-band-pro'),
												"hide"=>__("Hide",'music-band-pro'),
											),
											"default"=>"show"
										)
							)
						),
						array(
							"type"=>"tab",
							"name"=>"Slider section",
							"options"=>array(
										array(
									
											"type"=>"radio",
											"name"=>__("Slider section on first page",'music-band-pro'),
											"description"=>__("Show or hide slider section on first page",'music-band-pro'),
											"id"=>"slider_index",
											"options"=>array(
												"show"=>__("Show",'music-band-pro'),
												"hide"=>__("Hide",'music-band-pro'),
											),
											"default"=>"show"
										),
										array(
									
											"type"=>"group",
											"name"=>__("First slide",'music-band-pro'),
											"options"=>	array(
															array(
														
																"type"=>"image",
																"name"=>__("First image for slider",'music-band-pro'),
																"description"=>__("Choose first image for slider",'music-band-pro'),
																"id"=>"slider_image1",
																"default"=> "/images/slideone.png" 
															),
															array(
																"type"=>"input_text",
																"name"=>__("First slide big title",'music-band-pro'),
																"description"=>__("Enter a title to appear on the right side of the first slide",'music-band-pro'),
																"id"=>"slider_bigtitle1",
																"default"=>__("ASYLUM",'music-band-pro')
															),
															array(
																"type"=>"input_text",
																"name"=>__("First slide small title",'music-band-pro'),
																"description"=>__("Enter a title to appear on the left side of the first slide",'music-band-pro'),
																"id"=>"slider_title1",
																"default"=>__("NEW album",'music-band-pro')
															),
															array(
																"type"=>"input_text",
																"name"=>__("First slide text",'music-band-pro'),
																"description"=>__("Enter a text to appear on the left side of the first slide",'music-band-pro'),
																"id"=>"slider_text1",
																"default"=>"Pre release 15th November 2013.<br />Featureing greatest hit: <b>Dark Sky</b>"
															),
											),
										),	
										array(
									
											"type"=>"group",
											"name"=>__("Second slide",'music-band-pro'),
											"options"=>	array(		
															array(
														
																"type"=>"image",
																"name"=>__("Second image for slider",'music-band-pro'),
																"description"=>__("Choose second image for slider",'music-band-pro'),
																"id"=>"slider_image2",
																"default"=> "/images/slideone.png" 
															),
															array(
																"type"=>"input_text",
																"name"=>__("Second slide big title",'music-band-pro'),
																"description"=>__("Enter a title to appear on the right side of the second slide",'music-band-pro'),
																"id"=>"slider_bigtitle2",
																"default"=>__("ASYLUM",'music-band-pro')
															),
															array(
																"type"=>"input_text",
																"name"=>__("Second slide small title",'music-band-pro'),
																"description"=>__("Enter a title to appear on the left side of the second slide",'music-band-pro'),
																"id"=>"slider_title2",
																"default"=>__("NEW album",'music-band-pro')
															),
															array(
																"type"=>"input_text",
																"name"=>__("Second slide text",'music-band-pro'),
																"description"=>__("Enter a text to appear on the left side of the second slide",'music-band-pro'),
																"id"=>"slider_text2",
																"default"=>"Pre release 15th November 2013.<br />Featureing greatest hit: <b>Dark Sky</b>"
															),
											),
										),
										array(
									
											"type"=>"group",
											"name"=>__("Third slide",'music-band-pro'),
											"options"=>	array(	
															array(
														
																"type"=>"image",
																"name"=>__("Third image for slider",'music-band-pro'),
																"description"=>__("Choose third image for slider",'music-band-pro'),
																"id"=>"slider_image3",
																"default"=> "/images/slideone.png" 
															),
															array(
																"type"=>"input_text",
																"name"=>__("Third slide big title",'music-band-pro'),
																"description"=>__("Enter a title to appear on the right side of the third slide",'music-band-pro'),
																"id"=>"slider_bigtitle3",
																"default"=>"ASYLUM"
															),
															array(
																"type"=>"input_text",
																"name"=>__("Third slide big title",'music-band-pro'),
																"description"=>__("Enter a title to appear on the left side of the third slide",'music-band-pro'),
																"id"=>"slider_title3",
																"default"=>__("NEW album",'music-band-pro')
															),
															array(
																"type"=>"input_text",
																"name"=>__("Third slide text",'music-band-pro'),
																"description"=>__("Enter a text to appear on the left side of the third slide",'music-band-pro'),
																"id"=>"slider_text3",
																"default"=>"Pre release 15th November 2013.<br />Featureing greatest hit: <b>Dark Sky</b>"
															),
												
											)	
										)	
							)
						),
						array(
							"type"=>"tab",
							"name"=>__("Normal pages layout",'music-band-pro'),
							"options"=>array(
										array(
									
											"type"=>"radio",
											"name"=>__("Featured image on pages",'music-band-pro'),
											"description"=>__("Show or hide featured image on pages",'music-band-pro'),
											"id"=>"fi_pages",
											"options"=>array(
												"show"=>__("Show",'music-band-pro'),
												"hide"=>__("Hide",'music-band-pro'),
											),
											"default"=>"show"
										)
									)
						),	
						array(
							"type"=>"tab",
							"name"=>__("Site colors",'music-band-pro'),
							"options"=>array(
										array(
									
											"type"=>"group",
											"name"=>__("General",'music-band-pro'),
											"options"=>	array(		
													array(
														"type"=>"color",
														"name"=>__("Post title",'music-band-pro'),
														"description"=>"",
														"id"=>"post_title",
														"default"=>"#bb6053"
													),
													array(
														"type"=>"color",
														"name"=>__("Page title",'music-band-pro'),
														"description"=>"",
														"id"=>"page_title",
														"default"=>"#bb6053"
													),
													array(
														"type"=>"color",
														"name"=>__("Menu items color",'music-band-pro'),
														"description"=>"",
														"id"=>"menu_color",
														"default"=>"#9793b1"
													),
													array(
														"type"=>"color",
														"name"=>__("Menu items color - hover",'music-band-pro'),
														"description"=>"",
														"id"=>"menu_color_hover",
														"default"=>"#c46e67"
													),
													array(
														"type"=>"color",
														"name"=>__("Blockquote color",'music-band-pro'),
														"description"=>"",
														"id"=>"blockquote_color",
														"default"=>"#fff"
													),
													array(
														"type"=>"color",
														"name"=>__("Blockquote background",'music-band-pro'),
														"description"=>"",
														"id"=>"blockquote_background",
														"default"=>"#2d2747"
													),
											)
										),		
										array(
											 "type"=>"group",
											 "name"=>__("Header",'music-band-pro'),
											 "options"=>array(
															array(
																"type"=>"color",
																"name"=>__("Header background",'music-band-pro'),
																"description"=>"",
																"id"=>"header_background",
																"default"=>"#41335d"
															),
															array(
																"type"=>"color",
																"name"=>__("Header text color",'music-band-pro'),
																"description"=>"",
																"id"=>"header_color",
																"default"=>"#7e70af"
															),
															array(
																"type"=>"color",
																"name"=>__("Inner page header text color",'music-band-pro'),
																"description"=>"",
																"id"=>"inner_page_header_text_color",
																"default"=>"#fff"
															),
															array(
																"type"=>"color",
																"name"=>__("Inner page header title color",'music-band-pro'),
																"description"=>"",
																"id"=>"inner_page_header_title_color",
																"default"=>"#dda7a7"
															)
											 )
										),
										array(
									
											"type"=>"group",
											"name"=>__("Buttons",'music-band-pro'),
											"options"=>	array(
										
															array(
																"type"=>"color",
																"name"=>__("Buttons background",'music-band-pro'),
																"description"=>"",
																"id"=>"buttons_background",
																"default"=>"#c46e67"
															),
															array(
																"type"=>"color",
																"name"=>__("Buttons text color",'music-band-pro'),
																"description"=>"",
																"id"=>"buttons_color",
																"default"=>"#fff"
															),
															array(
																"type"=>"color",
																"name"=>__("Buttons background - hover",'music-band-pro'),
																"description"=>"",
																"id"=>"buttons_background_hover",
																"default"=>"#97534e"
															),
															array(
																"type"=>"color",
																"name"=>__("Buttons text color - hover",'music-band-pro'),
																"description"=>"",
																"id"=>"buttons_color_hover",
																"default"=>"#fff"
															),
											)
										),		
										
										
										array(
									
											"type"=>"group",
											"name"=>__("Sidebar",'music-band-pro'),
											"options"=>	array(
										
													array(
														"type"=>"color",
														"name"=>__("Sidebar background",'music-band-pro'),
														"description"=>"",
														"id"=>"sidebar_background",
														"default"=>"#2a2443"
													),
													array(
														"type"=>"color",
														"name"=>__("Sidebar widget title color",'music-band-pro'),
														"description"=>"",
														"id"=>"sidebar_widget_title",
														"default"=>"#9080c9"
													),
													
													array(
														"type"=>"color",
														"name"=>__("Sidebar widget text color",'music-band-pro'),
														"description"=>"",
														"id"=>"sidebar_widget_text",
														"default"=>"#fff"
													),
											)
										),	
										
										array(
									
											"type"=>"group",
											"name"=>__("Slider",'music-band-pro'),
											"options"=>	array(
										
													array(
														"type"=>"color",
														"name"=>__("Slider details background",'music-band-pro'),
														"description"=>"",
														"id"=>"slider_details_background",
														"default"=>""
													),
													array(
														"type"=>"color",
														"name"=>__("Slider details big title color",'music-band-pro'),
														"description"=>"",
														"id"=>"slider_details_big_title_color",
														"default"=>"#fff"
													),
													array(
														"type"=>"color",
														"name"=>__("Slider details small title color",'music-band-pro'),
														"description"=>"",
														"id"=>"slider_details_small_title_color",
														"default"=>"#433d63"
													),
													array(
														"type"=>"color",
														"name"=>__("Slider details text color",'music-band-pro'),
														"description"=>"",
														"id"=>"slider_details_text_color",
														"default"=>"#fff"
													),
													array(
														"type"=>"color",
														"name"=>__("Slider navigation buttons background",'music-band-pro'),
														"description"=>"",
														"id"=>"slider_navigation_background",
														"default"=>"#2a2443"
													),
											)
										),
										
										array(
									
											"type"=>"group",
											"name"=>__("Footer",'music-band-pro'),
											"options"=>	array(
										
													array(
														"type"=>"color",
														"name"=>__("Footer background",'music-band-pro'),
														"description"=>"",
														"id"=>"footer_background",
														"default"=>"#c46e67"
													),
													array(
														"type"=>"color",
														"name"=>__("Footer color",'music-band-pro'),
														"description"=>"",
														"id"=>"footer_text",
														"default"=>"#fff"
													),
													array(
														"type"=>"color",
														"name"=>__("Footer boxes - title color",'music-band-pro'),
														"description"=>"",
														"id"=>"footer_boxes_title",
														"default"=>"#fff"
													),
													array(
														"type"=>"color",
														"name"=>__("Footer boxes - border color",'music-band-pro'),
														"description"=>"",
														"id"=>"footer_boxes_border",
														"default"=>"#fff"
													),
													array(
														"type"=>"color",
														"name"=>__("Footer boxes - text color",'music-band-pro'),
														"description"=>"",
														"id"=>"footer_boxes_text",
														"default"=>"#9b3226"
													),
											)
										),
										
										array(
									
											"type"=>"group",
											"name"=>__("Search form",'music-band-pro'),
											"options"=>	array(
										
													array(
														"type"=>"color",
														"name"=>__("Search form background",'music-band-pro'),
														"description"=>"",
														"id"=>"search_form_background",
														"default"=>"#7e70af"
													),
													array(
														"type"=>"color",
														"name"=>__("Search form color",'music-band-pro'),
														"description"=>"",
														"id"=>"search_form_color",
														"default"=>"#fff"
													),
											)
										),		
										
										array(
									
											"type"=>"group",
											"name"=>__("Latest video widget",'music-band-pro'),
											"options"=>	array(
											
													array(
														"type"=>"color",
														"name"=>__("Latest video widget background",'music-band-pro'),
														"description"=>"",
														"id"=>"latest_video_background",
														"default"=>"#c46e67"
													),
													array(
														"type"=>"color",
														"name"=>__("Latest video widget text color",'music-band-pro'),
														"description"=>"",
														"id"=>"latest_video_text",
														"default"=>"#2a2443"
													),
													array(
														"type"=>"color",
														"name"=>__("Latest video widget title color",'music-band-pro'),
														"description"=>"",
														"id"=>"latest_video_title",
														"default"=>"#fff"
													),
													
											)
										),	

										array(
									
											"type"=>"group",
											"name"=>__("Related news widget",'music-band-pro'),
											"options"=>	array(	
											
													array(
														"type"=>"color",
														"name"=>__("Related news widget titles color",'music-band-pro'),
														"description"=>"",
														"id"=>"related_news_title",
														"default"=>"#c46e67"
													),
													array(
														"type"=>"color",
														"name"=>__("Related news widget titles color - hover",'music-band-pro'),
														"description"=>"",
														"id"=>"related_news_title_hover",
														"default"=>"#c46e67"
													),
													array(
														"type"=>"color",
														"name"=>__("Related news widget date color",'music-band-pro'),
														"description"=>"",
														"id"=>"related_news_date",
														"default"=>"#7e70af"
													),
													array(
														"type"=>"color",
														"name"=>__("Related news widget date color - hover",'music-band-pro'),
														"description"=>"",
														"id"=>"related_news_date_hover",
														"default"=>"#9586ca"
													),
												)
										),	

										array(
									
											"type"=>"group",
											"name"=>__("Latest album widget",'music-band-pro'),
											"options"=>	array(	
										
													array(
														"type"=>"color",
														"name"=>__("Latest album widget - album name color",'music-band-pro'),
														"description"=>"",
														"id"=>"latest_album_title",
														"default"=>"#be7d7f"
													),
													array(
														"type"=>"color",
														"name"=>__("Latest album widget - tracklist title color",'music-band-pro'),
														"description"=>"",
														"id"=>"latest_album_tracklist",
														"default"=>"#c46e67"
													),
													array(
														"type"=>"color",
														"name"=>__("Latest album widget - song title color",'music-band-pro'),
														"description"=>"",
														"id"=>"latest_album_song",
														"default"=>"#fff"
													),
													array(
														"type"=>"color",
														"name"=>__("Latest album widget - song title color - hover",'music-band-pro'),
														"description"=>"",
														"id"=>"latest_album_song_hover",
														"default"=>"#7e70af"
													),
													array(
														"type"=>"color",
														"name"=>__("Latest album widget - button background",'music-band-pro'),
														"description"=>"",
														"id"=>"latest_album_button_background",
														"default"=>"#c46e67"
													),
													array(
														"type"=>"color",
														"name"=>__("Latest album widget - button background - hover",'music-band-pro'),
														"description"=>"",
														"id"=>"latest_album_button_background_hover",
														"default"=>"#c46e67"
													),
													array(
														"type"=>"color",
														"name"=>__("Latest album widget - button color",'music-band-pro'),
														"description"=>"",
														"id"=>"latest_album_button_color",
														"default"=>"#fff"
													)
												)	
										),
										array(
									
											"type"=>"group",
											"name"=>__("About us page",'music-band-pro'),
											"options"=>	array(	
										
													array(
														"type"=>"color",
														"name"=>__("Band members background",'music-band-pro'),
														"description"=>"",
														"id"=>"band_members_background",
														"default"=>"#c46e67"
													),
													array(
														"type"=>"color",
														"name"=>__("Band members background - hover",'music-band-pro'),
														"description"=>"",
														"id"=>"band_members_background_hover",
														"default"=>"#ce766f"
													),
											)
										),	
										array(
									
											"type"=>"group",
											"name"=>__("Events",'music-band-pro'),
											"options"=>	array(	
										
													array(
														"type"=>"color",
														"name"=>__("Events - background",'music-band-pro'),
														"description"=>"",
														"id"=>"next_events_background",
														"default"=>"#19142d"
													),
													array(
														"type"=>"color",
														"name"=>__("Events - day color",'music-band-pro'),
														"description"=>"",
														"id"=>"next_events_date_color",
														"default"=>"#fff"
													),
													array(
														"type"=>"color",
														"name"=>__("Events - month color",'music-band-pro'),
														"description"=>"",
														"id"=>"next_events_month_color",
														"default"=>"#fff"
													),
													array(
														"type"=>"color",
														"name"=>__("Events - text color",'music-band-pro'),
														"description"=>"",
														"id"=>"next_events_text_color",
														"default"=>"#c46e67"
													),
													array(
														"type"=>"color",
														"name"=>__("Events - bullets color",'music-band-pro'),
														"description"=>"",
														"id"=>"next_events_bullets_color",
														"default"=>"#6d6199"
													),
													array(
														"type"=>"color",
														"name"=>__("Events - current bullet color",'music-band-pro'),
														"description"=>"",
														"id"=>"next_events_current_bullet_color",
														"default"=>"#c46e67"
													),
													array(
														"type"=>"color",
														"name"=>__("Get tickets link background",'music-band-pro'),
														"description"=>"",
														"id"=>"get_tickets_link_background",
														"default"=>"#c46e67"
													),
													array(
														"type"=>"color",
														"name"=>__("Get tickets link color",'music-band-pro'),
														"description"=>"",
														"id"=>"get_tickets_link_color",
														"default"=>"#fff"
													),
													array(
														"type"=>"color",
														"name"=>__("Get tickets link color - hover",'music-band-pro'),
														"description"=>"",
														"id"=>"get_tickets_link_color_hover",
														"default"=>"#6e3632"
													),
											)
									   )		
										

									)
						),							
					); 
			 
		}	 
	
	} 
