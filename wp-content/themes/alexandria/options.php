<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {
	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = 'alexandria';
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {
	
	// Test data
	$magpro_slider_start = array("false" => __("No", 'alexandria' ),"true" => __("Yes", 'alexandria' ));
	
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = __('Select a page:', 'alexandria' );
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri(). '/admin/images/';
		
	$options = array();
		
		
							
	$options[] = array( "name" => "country1",
						"type" => "innertabopen");	

		$options[] = array( "name" => __("Select a Skin", 'alexandria' ),
							"type" => "groupcontaineropen");	

				$options[] = array( "name" => __("Select a Skin", 'alexandria' ),
										"desc" => __("If you are not using child theme, selecting child theme will be same as using alexandria skin. If you are using child theme, then lite.css from the child theme will be used.", 'alexandria' ),
										"id" => "skin_style",
										"type" => "images",
										"std" => "alexandria",
										"options" => array(
											'alexandria' => $imagepath . 'alexandria.png',
											'radi' => $imagepath . 'radi.png',
											'green' => $imagepath . 'green.png',
											'purple' => $imagepath . 'purple.png',
											'brown' => $imagepath . 'brown.png',
											'orange' => $imagepath . 'orange.png',
											'yellow' => $imagepath . 'yellow.png',
											'aqua' => $imagepath . 'aqua.png',
											'grunge' => $imagepath . 'grunge.png',
											'child' => $imagepath . 'child.png')
										);						

										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Single Post Settings", 'alexandria' ),
							"type" => "groupcontaineropen");
							
					$options[] = array( "name" => __("Show Featured Image?", 'alexandria' ),
										"desc" => __("Select yes if you want to show featured image.", 'alexandria' ),
										"id" => "show_featured_image_single",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Ratings?", 'alexandria' ),
										"desc" => __("Select yes if you want to show ratings under post title.", 'alexandria' ),
										"id" => "show_rat_on_single",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);										
										
					$options[] = array( "name" => __("Show Posted by and Date?", 'alexandria' ),
										"desc" => __("Select yes if you want to show Posted by and Date under post title.", 'alexandria' ),
										"id" => "show_pd_on_single",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);											
										
					$options[] = array( "name" => __("Show Categories and Tags?", 'alexandria' ),
										"desc" => __("Select yes if you want to show categories under post title.", 'alexandria' ),
										"id" => "show_cats_on_single",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Next/Previous Box", 'alexandria' ),
										"desc" => __("Select yes if you want to show Next/Previous box on single post page.", 'alexandria' ),
										"id" => "show_np_box",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
																																							
										
		$options[] = array( "type" => "groupcontainerclose");						
		
		
		
	$options[] = array( "type" => "innertabclose");	


	$options[] = array( "name" => "country2",
						"type" => "innertabopen");	
						
		$options[] = array( "name" => __("Social Settings", 'alexandria' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Twitter", 'alexandria' ),
										"desc" => __("Enter your twitter id", 'alexandria' ),
										"id" => "twitter_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Redditt", 'alexandria' ),
										"desc" => __("Enter your reddit url", 'alexandria' ),
										"id" => "redit_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Facebook", 'alexandria' ),
										"desc" => __("Enter your facebook url", 'alexandria' ),
										"id" => "facebook_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Stumble", 'alexandria' ),
										"desc" => __("Enter your stumbleupon url", 'alexandria' ),
										"id" => "stumble_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Flickr", 'alexandria' ),
										"desc" => __("Enter your flickr url", 'alexandria' ),
										"id" => "flickr_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("LinkedIn", 'alexandria' ),
										"desc" => __("Enter your linkedin url", 'alexandria' ),
										"id" => "linkedin_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Google", 'alexandria' ),
										"desc" => __("Enter your google url", 'alexandria' ),
										"id" => "google_id",
										"std" => "",
										"type" => "text");

							
		$options[] = array( "type" => "groupcontainerclose");											
														
	$options[] = array( "type" => "innertabclose");

	$options[] = array( "name" => "country10",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Logo Section Settings", 'alexandria' ),
							"type" => "tabheading");
							
		$options[] = array( "name" => __("Logo Upload", 'alexandria' ),
							"type" => "groupcontaineropen");	
					
				$options[] = array( "name" => __("Upload Logo", 'alexandria' ),
										"desc" => __("Upload your logo here.", 'alexandria' ),
										"id" => "logo_layout_style",
										"type" => "proupgrade",
										);														
										
		$options[] = array( "type" => "groupcontainerclose");							
		
		$options[] = array( "name" => __("Logo Section Layout", 'alexandria' ),
							"type" => "groupcontaineropen");	

					
				$options[] = array( "name" => __("Select a layout", 'alexandria' ),
										"desc" => __("Images for logo section.", 'alexandria' ),
										"id" => "logo_layout_style",
										"type" => "images",
										"std" => "sbys",
										"options" => array(
											'sbys' => $imagepath . 'logo1.png',
											'onebone' => $imagepath . 'logo2.png')
										);														

										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");	
	
	$options[] = array( "name" => "country3",
						"type" => "innertabopen");	

		$options[] = array( "name" => __("Select Header Type", 'alexandria' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Select which type of header", 'alexandria' ),
										"desc" => __("Header One or WordPress Custom header feature. If you select custom header, go to appearance->Header and set a custom header", 'alexandria' ),
										"id" => "header_slider",
										"std" => "one",
										"type" => "images",
										"std" => "one",
										"options" => array(
											'one' => $imagepath . 'slider1.png',
											'cheader' => $imagepath . 'slider2.png')
										);					

										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Header's/Slider's Available in PRO Version", 'alexandria' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Following header's/slider's are available in PRO version", 'alexandria' ),
										"desc" => __("Upgrade to PRO version for above header's/Slider's", 'alexandria' ),
										"id" => "header_slider",
										"std" => "one",
										"type" => "proimages",
										"std" => "one",
										"options" => array(
											'one' => $imagepath . 'slider1.png',
											'videoone' => $imagepath . 'video.png',
											'oneplus' => $imagepath . 'oneplus.png',
											'slidertwo' => $imagepath . 'slidertwo.png',
											'slit' => $imagepath . 'slit.png',
											'fraction' => $imagepath . 'fraction.png',
											'hero' => $imagepath . 'hero.png')
										);					

										
		$options[] = array( "type" => "groupcontainerclose");		
		
		$options[] = array( "name" => __("Header On/Off Settings", 'alexandria' ),
							"type" => "groupcontaineropen");	

					
					$options[] = array( "name" => __("Show Header on homepage", 'alexandria' ),
										"desc" => __("Select yes if you want to show Header on homepage.", 'alexandria' ),
										"id" => "show_alexandria_slider_home",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);
										
					$options[] = array( "name" => __("Show Header on Single post page", 'alexandria' ),
										"desc" => __("Select yes if you want to show Header on Single post page.", 'alexandria' ),
										"id" => "show_alexandria_slider_single",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Header on Pages", 'alexandria' ),
										"desc" => __("Select yes if you want to show Header on Pages.", 'alexandria' ),
										"id" => "show_alexandria_slider_page",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Header on Category Pages", 'alexandria' ),
										"desc" => __("Select yes if you want to show Header on Category Pages.", 'alexandria' ),
										"id" => "show_alexandria_slider_archive",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);																														
										
		$options[] = array( "type" => "groupcontainerclose");			
						
	$options[] = array( "type" => "innertabclose");	
	
	$options[] = array( "name" => "country6",
						"type" => "innertabopen");	

		$options[] = array( "name" => __("Header One Settings", 'alexandria' ),
							"type" => "tabheading");
							
		$options[] = array( "name" => __("Welcome Section", 'alexandria' ),
							"type" => "groupcontaineropen");
							
					$options[] = array( "name" => __("Upload Image", 'alexandria' ),
										"desc" => __("Upload your image here.", 'alexandria' ),
										"id" => "slider_one_image",
										"type" => "upload");								

					$options[] = array( "name" => __("Headline", 'alexandria' ),
										"desc" => __("Enter the headline", 'alexandria' ),
										"id" => "slider_one_headline",
										"type" => "textarea");		
										
					$options[] = array( "name" => __("Feature text", 'alexandria' ),
										"desc" => __("Enter the feature text", 'alexandria' ),
										"id" => "slider_one_text",
										"type" => "textarea");
										
					$options[] = array( "name" => __("Call To Action text", 'alexandria' ),
										"desc" => __("Enter the text", 'alexandria' ),
										"id" => "slider_one_cta",
										"type" => "text");	
										
					$options[] = array( "name" => __("Call To Action Link", 'alexandria' ),
										"desc" => __("Enter the full url", 'alexandria' ),
										"id" => "slider_one_cta_link",
										"type" => "text");																																	

										
		$options[] = array( "type" => "groupcontainerclose");							
	
						
	$options[] = array( "type" => "innertabclose");	
	
								

	$options[] = array( "name" => "country4",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Layout Settings", 'alexandria' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Select a homepage layout", 'alexandria' ),
										"desc" => __("Images for layout.", 'alexandria' ),
										"id" => "homepage_layout",
										"std" => "bone",
										"type" => "images",
										"options" => array(
											'bone' => $imagepath . 'layout1.png',
											'btwo' => $imagepath . 'layout3.png',
											'spage' => $imagepath . 'layout2.png')
										);					

										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Layouts available in PRO Version", 'alexandria' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Following layout's are available in PRO version", 'alexandria' ),
										"desc" => __("Upgrade to PRO version for above layouts", 'alexandria' ),
										"id" => "homepage_layout",
										"std" => "bone",
										"type" => "proimages",
										"options" => array(
											'bone' => $imagepath . 'layout1.png',
											'btwo' => $imagepath . 'layout3.png',
											'boneplus' => $imagepath . 'boneplus.png',
											'bthree' => $imagepath . 'bthree.png',
											'bfour' => $imagepath . 'bfour.png',
											'bfive' => $imagepath . 'bfive.png',
											'bsix' => $imagepath . 'bsix.png',
											'bseven' => $imagepath . 'bseven.png',
											'beight' => $imagepath . 'beight.png',
											'bnine' => $imagepath . 'bnine.png')
										);					

										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Quote Settings", 'alexandria' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Quote?", 'alexandria' ),
										"desc" => __("Enter the welcome text", 'alexandria' ),
										"id" => "show_quote",
										"type" => "proupgrade");	
										
					$options[] = array( "name" => __("Quote 1", 'alexandria' ),
										"desc" => __("Enter the quote text", 'alexandria' ),
										"id" => "show_quote1",
										"type" => "proupgrade");														

					$options[] = array( "name" => __("Customer 1", 'alexandria' ),
										"desc" => __("Enter the customer name", 'alexandria' ),
										"id" => "show_quote1_cust",
										"type" => "proupgrade");
										
					$options[] = array( "name" => __("Quote 2", 'alexandria' ),
										"desc" => __("Enter the quote text", 'alexandria' ),
										"id" => "show_quote2",
										"type" => "proupgrade");														

					$options[] = array( "name" => __("Customer 2", 'alexandria' ),
										"desc" => __("Enter the customer name", 'alexandria' ),
										"id" => "show_quote2_cust",
										"type" => "proupgrade");
										
					$options[] = array( "name" => __("Quote 3", 'alexandria' ),
										"desc" => __("Enter the quote text", 'alexandria' ),
										"id" => "show_quote3",
										"type" => "proupgrade");														

					$options[] = array( "name" => __("Customer 3", 'alexandria' ),
										"desc" => __("Enter the customer name", 'alexandria' ),
										"id" => "show_quote3_cust",
										"type" => "proupgrade");																				
										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Client Logos", 'alexandria' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Client Logo Section?", 'alexandria' ),
										"desc" => __("Select yes if you want to show client logos.", 'alexandria' ),
										"id" => "show_quote",
										"type" => "proupgrade");	
										
					$options[] = array( "name" => __("Client Logo # 1", 'alexandria' ),
										"desc" => __("upload the logo", 'alexandria' ),
										"id" => "client_logo1",
										"type" => "proupgrade");														

					$options[] = array( "name" => __("Client Logo # 2", 'alexandria' ),
										"desc" => __("upload the logo", 'alexandria' ),
										"id" => "client_logo2",
										"type" => "proupgrade");
										
					$options[] = array( "name" => __("Client Logo # 3", 'alexandria' ),
										"desc" => __("upload the logo", 'alexandria' ),
										"id" => "client_logo3",
										"type" => "proupgrade");														

					$options[] = array( "name" => __("Client Logo # 4", 'alexandria' ),
										"desc" => __("upload the logo", 'alexandria' ),
										"id" => "client_logo4",
										"type" => "proupgrade");
										
		$options[] = array( "type" => "groupcontainerclose");							
						
	$options[] = array( "type" => "innertabclose");	
	
	$options[] = array( "name" => "country5",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Biz One Settings", 'alexandria' ),
							"type" => "tabheading");
																							
						
		$options[] = array( "name" => __("Welcome Section", 'alexandria' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Headline", 'alexandria' ),
										"desc" => __("Enter the headline", 'alexandria' ),
										"id" => "welcome_headline",
										"type" => "textarea");		
										
					$options[] = array( "name" => __("Welcome text", 'alexandria' ),
										"desc" => __("Enter the welcome text", 'alexandria' ),
										"id" => "welcome_text",
										"type" => "textarea");														

										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Left Section", 'alexandria' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Upload Image", 'alexandria' ),
										"desc" => __("Upload your image here.", 'alexandria' ),
										"id" => "left_section_image",
										"type" => "upload");					
					
					$options[] = array( "name" => __("Headline", 'alexandria' ),
										"desc" => __("Enter the headline", 'alexandria' ),
										"id" => "left_section_headline",
										"type" => "textarea");		
										
					$options[] = array( "name" => __("Welcome text", 'alexandria' ),
										"desc" => __("Enter the welcome text", 'alexandria' ),
										"id" => "left_section_text",
										"type" => "textarea");
										
					$options[] = array( "name" => __("Link", 'alexandria' ),
										"desc" => __("Enter the link to product or service", 'alexandria' ),
										"id" => "left_section_link",
										"type" => "text");																							

										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Center Section", 'alexandria' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Upload Image", 'alexandria' ),
										"desc" => __("Upload your image here.", 'alexandria' ),
										"id" => "center_section_image",
										"type" => "upload");					
					
					$options[] = array( "name" => __("Headline", 'alexandria' ),
										"desc" => __("Enter the headline", 'alexandria' ),
										"id" => "center_section_headline",
										"type" => "textarea");		
										
					$options[] = array( "name" => __("Welcome text", 'alexandria' ),
										"desc" => __("Enter the welcome text", 'alexandria' ),
										"id" => "center_section_text",
										"type" => "textarea");	
										
					$options[] = array( "name" => __("Link", 'alexandria' ),
										"desc" => __("Enter the link to product or service", 'alexandria' ),
										"id" => "center_section_link",
										"type" => "text");																							

										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Right Section", 'alexandria' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Upload Image", 'alexandria' ),
										"desc" => __("Upload your image here.", 'alexandria' ),
										"id" => "right_section_image",
										"type" => "upload");					
					
					$options[] = array( "name" => __("Headline", 'alexandria' ),
										"desc" => __("Enter the headline", 'alexandria' ),
										"id" => "right_section_headline",
										"type" => "textarea");		
										
					$options[] = array( "name" => __("Welcome text", 'alexandria' ),
										"desc" => __("Enter the welcome text", 'alexandria' ),
										"id" => "right_section_text",
										"type" => "textarea");
										
					$options[] = array( "name" => __("Link", 'alexandria' ),
										"desc" => __("Enter the link to product or service", 'alexandria' ),
										"id" => "right_section_link",
										"type" => "text");																								

										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Quote Section", 'alexandria' ),
							"type" => "groupcontaineropen");
							
					$options[] = array( "name" => __("Show Quote?", 'alexandria' ),
										"desc" => __("Select yes if you want to show quote.", 'alexandria' ),
										"id" => "show_alexandria_quote_bizone",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);								
					
					$options[] = array( "name" => __("Quote", 'alexandria' ),
										"desc" => __("Enter the Quote Text", 'alexandria' ),
										"id" => "quote_section_text",
										"type" => "textarea");		
										
					$options[] = array( "name" => __("Customer Name", 'alexandria' ),
										"desc" => __("Enter the customer name", 'alexandria' ),
										"id" => "quote_section_name",
										"type" => "text");														

										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Recent Posts", 'alexandria' ),
							"type" => "groupcontaineropen");
														
					$options[] = array( "name" => __("Show Recent Posts Section?", 'alexandria' ),
										"desc" => __("Select yes if you want to recent posts at the bottom.", 'alexandria' ),
										"id" => "show_bizone_posts",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
		$options[] = array( "type" => "groupcontainerclose");														
						
	$options[] = array( "type" => "innertabclose");
	
	$options[] = array( "name" => "country7",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Biz Two Settings", 'alexandria' ),
							"type" => "tabheading");						
						
		$options[] = array( "name" => __("Welcome Section", 'alexandria' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Headline", 'alexandria' ),
										"desc" => __("Enter the headline", 'alexandria' ),
										"id" => "biztwo_welcome_headline",
										"type" => "textarea");		
										
					$options[] = array( "name" => __("Welcome text", 'alexandria' ),
										"desc" => __("Enter the welcome text", 'alexandria' ),
										"id" => "biztwo_welcome_text",
										"type" => "textarea");														

										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Top Section", 'alexandria' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Upload Image", 'alexandria' ),
										"desc" => __("Upload your image here.", 'alexandria' ),
										"id" => "biztwo_left_section_image",
										"type" => "upload");					
					
					$options[] = array( "name" => __("Headline", 'alexandria' ),
										"desc" => __("Enter the headline", 'alexandria' ),
										"id" => "biztwo_left_section_headline",
										"type" => "textarea");		
										
					$options[] = array( "name" => __("Welcome text", 'alexandria' ),
										"desc" => __("Enter the welcome text", 'alexandria' ),
										"id" => "biztwo_left_section_text",
										"type" => "textarea");
										
					$options[] = array( "name" => __("Link", 'alexandria' ),
										"desc" => __("Enter the link to product or service", 'alexandria' ),
										"id" => "biztwo_left_section_link",
										"type" => "text");																							

										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Middle Section", 'alexandria' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Upload Image", 'alexandria' ),
										"desc" => __("Upload your image here.", 'alexandria' ),
										"id" => "biztwo_center_section_image",
										"type" => "upload");					
					
					$options[] = array( "name" => __("Headline", 'alexandria' ),
										"desc" => __("Enter the headline", 'alexandria' ),
										"id" => "biztwo_center_section_headline",
										"type" => "textarea");		
										
					$options[] = array( "name" => __("Welcome text", 'alexandria' ),
										"desc" => __("Enter the welcome text", 'alexandria' ),
										"id" => "biztwo_center_section_text",
										"type" => "textarea");	
										
					$options[] = array( "name" => __("Link", 'alexandria' ),
										"desc" => __("Enter the link to product or service", 'alexandria' ),
										"id" => "biztwo_center_section_link",
										"type" => "text");																							

										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Bottom Section", 'alexandria' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Upload Image", 'alexandria' ),
										"desc" => __("Upload your image here.", 'alexandria' ),
										"id" => "biztwo_right_section_image",
										"type" => "upload");					
					
					$options[] = array( "name" => __("Headline", 'alexandria' ),
										"desc" => __("Enter the headline", 'alexandria' ),
										"id" => "biztwo_right_section_headline",
										"type" => "textarea");		
										
					$options[] = array( "name" => __("Welcome text", 'alexandria' ),
										"desc" => __("Enter the welcome text", 'alexandria' ),
										"id" => "biztwo_right_section_text",
										"type" => "textarea");
										
					$options[] = array( "name" => __("Link", 'alexandria' ),
										"desc" => __("Enter the link to product or service", 'alexandria' ),
										"id" => "biztwo_right_section_link",
										"type" => "text");																								

										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Quote Section", 'alexandria' ),
							"type" => "groupcontaineropen");
							
					$options[] = array( "name" => __("Show Quote?", 'alexandria' ),
										"desc" => __("Select yes if you want to show quote.", 'alexandria' ),
										"id" => "show_alexandria_quote_biztwo",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);									
					
					$options[] = array( "name" => __("Quote", 'alexandria' ),
										"desc" => __("Enter the Quote Text", 'alexandria' ),
										"id" => "biztwo_quote_section_text",
										"type" => "textarea");		
										
					$options[] = array( "name" => __("Customer Name", 'alexandria' ),
										"desc" => __("Enter the Customer Name", 'alexandria' ),
										"id" => "biztwo_quote_section_name",
										"type" => "text");														

										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Portfolio Item # 1", 'alexandria' ),
							"type" => "groupcontaineropen");	
					
					$options[] = array( "name" => __("Upload Image", 'alexandria' ),
										"desc" => __("Upload your image here.", 'alexandria' ),
										"id" => "biztwo_port_one_image",
										"type" => "upload");
										
					$options[] = array( "name" => __("Name", 'alexandria' ),
										"desc" => __("Enter the project name", 'alexandria' ),
										"id" => "biztwo_port_one_name",
										"type" => "text");															
										
					$options[] = array( "name" => __("Link", 'alexandria' ),
										"desc" => __("Enter the link to project", 'alexandria' ),
										"id" => "biztwo_port_one_link",
										"type" => "text");														
										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Portfolio Item # 2", 'alexandria' ),
							"type" => "groupcontaineropen");	
					
					$options[] = array( "name" => __("Upload Image", 'alexandria' ),
										"desc" => __("Upload your image here.", 'alexandria' ),
										"id" => "biztwo_port_two_image",
										"type" => "upload");
										
					$options[] = array( "name" => __("Name", 'alexandria' ),
										"desc" => __("Enter the project name.", 'alexandria' ),
										"id" => "biztwo_port_two_name",
										"type" => "text");														
										
					$options[] = array( "name" => __("Link", 'alexandria' ),
										"desc" => __("Enter the link to project", 'alexandria' ),
										"id" => "biztwo_port_two_link",
										"type" => "text");														
										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Portfolio Item # 3", 'alexandria' ),
							"type" => "groupcontaineropen");	
					
					$options[] = array( "name" => __("Upload Image", 'alexandria' ),
										"desc" => __("Upload your image here.", 'alexandria' ),
										"id" => "biztwo_port_three_image",
										"type" => "upload");
										
					$options[] = array( "name" => __("Name", 'alexandria' ),
										"desc" => __("Enter the project name", 'alexandria' ),
										"id" => "biztwo_port_three_name",
										"type" => "text");															
										
					$options[] = array( "name" => __("Link", 'alexandria' ),
										"desc" => __("Enter the link to project", 'alexandria' ),
										"id" => "biztwo_port_three_link",
										"type" => "text");														
										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Portfolio Item # 4", 'alexandria' ),
							"type" => "groupcontaineropen");	
					
					$options[] = array( "name" => __("Upload Image", 'alexandria' ),
										"desc" => __("Upload your image here.", 'alexandria' ),
										"id" => "biztwo_port_four_image",
										"type" => "upload");
										
					$options[] = array( "name" => __("Name", 'alexandria' ),
										"desc" => __("Enter the project name", 'alexandria' ),
										"id" => "biztwo_port_four_name",
										"type" => "text");															
										
					$options[] = array( "name" => __("Link", 'alexandria' ),
										"desc" => __("Enter the link to project", 'alexandria' ),
										"id" => "biztwo_port_four_link",
										"type" => "text");														
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Recent Posts", 'alexandria' ),
							"type" => "groupcontaineropen");
														
					$options[] = array( "name" => __("Show Recent Posts Section?", 'alexandria' ),
										"desc" => __("Select yes if you want to recent posts at the bottom.", 'alexandria' ),
										"id" => "show_biztwo_posts",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
		$options[] = array( "type" => "groupcontainerclose");																					
						
	$options[] = array( "type" => "innertabclose");			
	
	$options[] = array( "name" => "country9",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Standard Page Settings", 'alexandria' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Comments?", 'alexandria' ),
										"desc" => __("Select yes if you want to show comments", 'alexandria' ),
										"id" => "show_comments_spage",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);		
										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");	

	$options[] = array( "name" => "country19",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Layouts available in PRO Version", 'alexandria' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Portfolio layout's are available in PRO version", 'alexandria' ),
										"desc" => __("Upgrade to PRO version for above layouts", 'alexandria' ),
										"id" => "portfolio_layout",
										"std" => "pone",
										"type" => "proimages",
										"options" => array(
											'pone' => $imagepath . 'pone.png',
											'ptwo' => $imagepath . 'ptwo.png',
											'pthree' => $imagepath . 'pthree.png',
											'pfour' => $imagepath . 'pfour.png')
										);					

										
		$options[] = array( "type" => "groupcontainerclose");						
						
	$options[] = array( "type" => "innertabclose");
								
	$options[] = array( "name" => "country11",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Footer Settings", 'alexandria' ),
							"type" => "tabheading");
							
		$options[] = array( "name" => __("Social Section", 'alexandria' ),
							"type" => "groupcontaineropen");	
					
				$options[] = array( "name" => __("Show social Section?", 'alexandria' ),
										"desc" => __("Select yes if you want to show social section.", 'alexandria' ),
										"id" => "show_social_section",
										"type" => "proupgrade",
										);														
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Footer Logo Upload", 'alexandria' ),
							"type" => "groupcontaineropen");	
					
				$options[] = array( "name" => __("Upload Logo", 'alexandria' ),
										"desc" => __("Upload your logo here.", 'alexandria' ),
										"id" => "footer_logo_upload",
										"type" => "proupgrade",
										);														
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Address Settings", 'alexandria' ),
							"type" => "groupcontaineropen");	
					
				$options[] = array( "name" => __("Show Search?", 'alexandria' ),
										"desc" => __("Select yes if you want to show search.", 'alexandria' ),
										"id" => "show_foote_search",
										"type" => "proupgrade",
										);	
										
				$options[] = array( "name" => __("Address", 'alexandria' ),
										"desc" => __("Enter Address", 'alexandria' ),
										"id" => "footer_address",
										"type" => "proupgrade",
										);	
										
				$options[] = array( "name" => __("Email", 'alexandria' ),
										"desc" => __("Enter Email Address", 'alexandria' ),
										"id" => "footer_email_address",
										"type" => "proupgrade",
										);
										
				$options[] = array( "name" => __("Phone Number", 'alexandria' ),
										"desc" => __("Enter Phone Number", 'alexandria' ),
										"id" => "footer_phone",
										"type" => "proupgrade",
										);
										
				$options[] = array( "name" => __("Skype", 'alexandria' ),
										"desc" => __("Enter Skype Address", 'alexandria' ),
										"id" => "footer_skype_address",
										"type" => "proupgrade",
										);
										
				$options[] = array( "name" => __("Google Map", 'alexandria' ),
										"desc" => __("Enter google map", 'alexandria' ),
										"id" => "footer_map_address",
										"type" => "proupgrade",
										);																																																														
										
		$options[] = array( "type" => "groupcontainerclose");											
										
		$options[] = array( "name" => __("Footer Layouts", 'alexandria' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Select a footer layout", 'alexandria' ),
										"desc" => __("Images for layout.", 'alexandria' ),
										"id" => "footer_layout",
										"std" => "one",
										"type" => "images",
										"std" => "one",
										"options" => array(
											'one' => $imagepath . 'footer1.png',
											'two' => $imagepath . 'footer2.png')
										);	
										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Footer Layouts available in PRO Version", 'alexandria' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Following layout's are available in PRO version", 'alexandria' ),
										"desc" => __("Upgrade to PRO version for above layouts", 'alexandria' ),
										"id" => "homepage_layout",
										"std" => "fone",
										"type" => "proimages",
										"options" => array(
											'fthree' => $imagepath . 'fthree.png',
											'ffour' => $imagepath . 'ffour.png',
											'ffive' => $imagepath . 'ffive.png',
											'fsix' => $imagepath . 'fsix.png')
										);					
										
		$options[] = array( "type" => "groupcontainerclose");																							
						
	$options[] = array( "type" => "innertabclose");			
							
						

							
		
	return $options;
}