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
							 "name"=>"General options",
							 "options"=>array(
								array(
									
									"type"=>"image",
									"name"=>"logo",
									"description"=>"Choose logo",
									"id"=>"logoid",
									"default"=> "/images/logo.png" 
								),
								array(
									"type"=>"input_text",
									"name"=>"Copyright",
									"description"=>"Enter copyright text",
									"id"=>"copyright",
									"default"=>"&copy; 2013 Violet Band. All rights reserved. "
								),
								
								array(
									
									"type"=>"radio",
									"name"=>"Header button",
									"description"=>"Show or hide button in the header of the page",
									"id"=>"header_button",
									"options"=>array(
												"show"=>"Show",
												"hide"=>"Hide",
									),
									"default"=>"show"
								),
								
								array(
									"type"=>"input_text",
									"name"=>"Header button text",
									"description"=>"Enter the text for the header button in case you want the button to appear",
									"id"=>"header_button_text",
									"default"=>"BUY ALBUM"
								),
								
								array(
									"type"=>"input_text",
									"name"=>"Header button link",
									"description"=>"Enter the link for the header button in case you want the button to appear",
									"id"=>"header_button_link",
									"default"=>"#"
								),
								
								array(
									
									"type"=>"group",
									"name"=>"Top banner",
									"options"=>	array(
													array(
														
														"type"=>"multiselect",
														"name"=>"Top banner",
														"description"=>"Select the pages you want to have a top banner(Hold CTRL)",
														"id"=>"top_banner",
														"options"=>$tmp,
														"default"=>$default
													),
													array(
									
														"type"=>"image",
														"name"=>"Top banner image",
														"description"=>"Choose an image for the top banner",
														"id"=>"top_banner_image",
														"default"=> "/images/abovefooterbg.png" 
													),
													array(
														"type"=>"input_text",
														"name"=>"Top banner title",
														"description"=>"Enter a title for the top banner",
														"id"=>"top_banner_title",
														"default"=>"NEW ALBUM"
													),
													array(
														"type"=>"input_text",
														"name"=>"Top banner text",
														"description"=>"Enter a text for the top banner",
														"id"=>"top_banner_text",
														"default"=>"Pre release 15th November 2013."
													),
									)
								),	
								array(
									
									"type"=>"group",
									"name"=>"Footer section with boxes and social icons",
									"options"=>	array(
													array(
														
														"type"=>"multiselect",
														"name"=>"Footer section",
														"description"=>"Select the pages you want to have the footer section(Hold CTRL)",
														"id"=>"footer_section",
														"options"=>$tmp,
														"default"=>$default
													),
													array(
									
														"type"=>"image",
														"name"=>"Footer section background section",
														"description"=>"Choose an image for the footer section",
														"id"=>"footer_section_image",
														"default"=> "/images/abovefooterbg.png" 
													),
													array(
														"type"=>"input_text",
														"name"=>"First box title",
														"description"=>"Enter a title for the first box",
														"id"=>"footer_section_title1",
														"default"=>"ON TOUR"
													),
													array(
														"type"=>"input_text",
														"name"=>"First box text",
														"description"=>"Enter a text for the first box",
														"id"=>"footer_section_text1",
														"default"=>"From 11th November"
													),
													array(
														"type"=>"input_text",
														"name"=>"Second box title",
														"description"=>"Enter a title for the second box",
														"id"=>"footer_section_title2",
														"default"=>"DARK SKY"
													),
													array(
														"type"=>"input_text",
														"name"=>"Second box text",
														"description"=>"Enter a text for the second box",
														"id"=>"footer_section_text2",
														"default"=>"get on itunes now!"
													),
													array(
														"type"=>"input_text",
														"name"=>"Third box title",
														"description"=>"Enter a title for the third box",
														"id"=>"footer_section_title3",
														"default"=>"FUN ZONE"
													),
													array(
														"type"=>"input_text",
														"name"=>"Third box text",
														"description"=>"Enter a text for the third box",
														"id"=>"footer_section_text3",
														"default"=>"send us a message"
													),
													array(
														"type"=>"input_text",
														"name"=>"Facebook link",
														"description"=>"Enter the facebook link",
														"id"=>"facebook",
														"default"=>"#"
													),
													array(
														"type"=>"input_text",
														"name"=>"Twitter link",
														"description"=>"Enter the twitter link",
														"id"=>"twitter",
														"default"=>"#"
													),
													array(
														"type"=>"input_text",
														"name"=>"Linkedin link",
														"description"=>"Enter the linkedin link",
														"id"=>"linkedin",
														"default"=>"#"
													),
									)
								)			
							 )
						),
						array(
							"type"=>"tab",
							"name"=>"Single page",
							"options"=>array(
										array(
									
											"type"=>"checkbox",
											"name"=>"Post details",
											"description"=>"Choose what post details to show on single page",
											"id"=>"details_single",
											"options"=>array(
												"date"=>"Date",
												"author"=>"Author",
												"number_of_comments"=>"Number of comments",
												"category"=>"Category",
												"tags"=>"Tags",
												"number_of_views"=>"Number of views",
												"none"=>"None"
												
											),
											"default"=>array("date","number_of_comments")
										),
										array(
									
											"type"=>"radio",
											"name"=>"Featured image on single page",
											"description"=>"Show or hide featured image on single page",
											"id"=>"fi_single",
											"options"=>array(
												"show"=>"Show",
												"hide"=>"Hide",
											),
											"default"=>"show"
										)
							)
						),
						array(
							"type"=>"tab",
							"name"=>"First page + Archive page + Search page",
							"options"=>array(
										array(
									
											"type"=>"checkbox",
											"name"=>"Post details",
											"description"=>"Choose what post details to show on first page, archive page and search page",
											"id"=>"details_index",
											"options"=>array(
												"date"=>"Date",
												"author"=>"Author",
												"number_of_comments"=>"Number of comments",
												"category"=>"Category",
												"tags"=>"Tags",
												"none"=>"None"
											),
											"default"=>array("date","number_of_comments")
										),
										array(
									
											"type"=>"radio",
											"name"=>"Featured image on first page",
											"description"=>"Show or hide featured image on first page, archive page and search page",
											"id"=>"fi_index",
											"options"=>array(
												"show"=>"Show",
												"hide"=>"Hide",
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
											"name"=>"Slider section on first page",
											"description"=>"Show or hide slider section on first page",
											"id"=>"slider_index",
											"options"=>array(
												"show"=>"Show",
												"hide"=>"Hide",
											),
											"default"=>"show"
										),
										array(
									
											"type"=>"group",
											"name"=>"First slide",
											"options"=>	array(
															array(
														
																"type"=>"image",
																"name"=>"First image for slider",
																"description"=>"Choose first image for slider",
																"id"=>"slider_image1",
																"default"=> "/images/slideone.png" 
															),
															array(
																"type"=>"input_text",
																"name"=>"First slide big title",
																"description"=>"Enter a title to appear on the right side of the first slide",
																"id"=>"slider_bigtitle1",
																"default"=>"ASYLUM"
															),
															array(
																"type"=>"input_text",
																"name"=>"First slide small title",
																"description"=>"Enter a title to appear on the left side of the first slide",
																"id"=>"slider_title1",
																"default"=>"NEW album"
															),
															array(
																"type"=>"input_text",
																"name"=>"First slide text",
																"description"=>"Enter a text to appear on the left side of the first slide",
																"id"=>"slider_text1",
																"default"=>"Pre release 15th November 2013.<br />Featureing greatest hit: <b>Dark Sky</b>"
															),
											),
										),	
										array(
									
											"type"=>"group",
											"name"=>"Second slide",
											"options"=>	array(		
															array(
														
																"type"=>"image",
																"name"=>"Second image for slider",
																"description"=>"Choose second image for slider",
																"id"=>"slider_image2",
																"default"=> "/images/slideone.png" 
															),
															array(
																"type"=>"input_text",
																"name"=>"Second slide big title",
																"description"=>"Enter a title to appear on the right side of the second slide",
																"id"=>"slider_bigtitle2",
																"default"=>"ASYLUM"
															),
															array(
																"type"=>"input_text",
																"name"=>"Second slide small title",
																"description"=>"Enter a title to appear on the left side of the second slide",
																"id"=>"slider_title2",
																"default"=>"NEW album"
															),
															array(
																"type"=>"input_text",
																"name"=>"Second slide text",
																"description"=>"Enter a text to appear on the left side of the second slide",
																"id"=>"slider_text2",
																"default"=>"Pre release 15th November 2013.<br />Featureing greatest hit: <b>Dark Sky</b>"
															),
											),
										),
										array(
									
											"type"=>"group",
											"name"=>"Third slide",
											"options"=>	array(	
															array(
														
																"type"=>"image",
																"name"=>"Third image for slider",
																"description"=>"Choose third image for slider",
																"id"=>"slider_image3",
																"default"=> "/images/slideone.png" 
															),
															array(
																"type"=>"input_text",
																"name"=>"Third slide big title",
																"description"=>"Enter a title to appear on the right side of the third slide",
																"id"=>"slider_bigtitle3",
																"default"=>"ASYLUM"
															),
															array(
																"type"=>"input_text",
																"name"=>"Third slide big title",
																"description"=>"Enter a title to appear on the left side of the third slide",
																"id"=>"slider_title3",
																"default"=>"NEW album"
															),
															array(
																"type"=>"input_text",
																"name"=>"Third slide text",
																"description"=>"Enter a text to appear on the left side of the third slide",
																"id"=>"slider_text3",
																"default"=>"Pre release 15th November 2013.<br />Featureing greatest hit: <b>Dark Sky</b>"
															),
												
											)	
										)	
							)
						),
						array(
							"type"=>"tab",
							"name"=>"Normal pages layout",
							"options"=>array(
										array(
									
											"type"=>"radio",
											"name"=>"Featured image on pages",
											"description"=>"Show or hide featured image on pages",
											"id"=>"fi_pages",
											"options"=>array(
												"show"=>"Show",
												"hide"=>"Hide",
											),
											"default"=>"show"
										)
									)
						),						
					); 
			 
		}	 
	
	} 
