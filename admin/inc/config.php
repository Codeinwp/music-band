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
														
														"type"=>"multiselect",
														"name"=>__("Top banner",'music-band-pro'),
														"description"=>__("Select the pages you want to have a top banner(Hold CTRL)",'music-band-pro'),
														"id"=>"top_banner",
														"options"=>$tmp,
														"default"=>$default
													),
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
														
														"type"=>"multiselect",
														"name"=>__("Footer section",'music-band-pro'),
														"description"=>__("Select the pages you want to have the footer section(Hold CTRL)",'music-band-pro'),
														"id"=>"footer_section",
														"options"=>$tmp,
														"default"=>$default
													),
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
					); 
			 
		}	 
	
	} 
