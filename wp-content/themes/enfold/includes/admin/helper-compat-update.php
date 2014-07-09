<?php

//activate the update script
add_action('admin_init', array(new avia_update_helper(), 'update_version'));


/*
 *
 * update for version 2.6: 
 * we need to map the single string that defines which header we are using to the multiple   
 * new options and save them, so the user does not need to manually update the header
 *
 * also the post specific layout option that shows/hides the title bar is saved with a new name and value set so it can easily overwrite the global option
 */
 
add_action('ava_trigger_updates', 'avia_map_header_setting',10,2);

function avia_map_header_setting($prev_version, $new_version)
{	
	//if the previous theme version is equal or bigger to 2.6 we don't need to update
	if(version_compare($prev_version, 2.6, ">=")) return; 
	
	//set global options
	global $avia;
	$theme_options = $avia->options['avia'];
	
	//if one of those settings is not available the user has never saved the theme options. No need to change anything
	if(empty($theme_options) || !isset($theme_options['header_setting'])) return;


	//set defaults
	$theme_options['header_layout'] 		= "logo_left menu_right";
	$theme_options['header_size'] 			= "slim";
	$theme_options['header_sticky'] 		= "header_sticky";
	$theme_options['header_shrinking'] 		= "header_shrinking";
	$theme_options['header_social'] 		= "";
	$theme_options['header_secondary_menu'] = "";
	$theme_options['header_phone_active']	= "";
	
	if(!empty($theme_options['phone'])) $theme_options['header_phone_active'] = "phone_active_right extra_header_active";
	
	//overwrite defaults based on the selection
	switch($theme_options['header_setting'])
	{
		case 'nonfixed_header': 
		
			$theme_options['header_sticky'] 	= "";
			$theme_options['header_shrinking'] 	= "";
			$theme_options['header_social'] 	= "";	
				
		break;
		case 'fixed_header social_header': 
		
			$theme_options['header_size'] 			= "large";
			$theme_options['header_social'] 		= "icon_active_left extra_header_active";
			$theme_options['header_secondary_menu'] = "secondary_right extra_header_active";
		
		break;
		case 'nonfixed_header social_header': 
		
			$theme_options['header_size'] 			= "large";
			$theme_options['header_sticky'] 		= "";
			$theme_options['header_shrinking'] 		= "";
			$theme_options['header_social'] 		= "icon_active_left extra_header_active";
			$theme_options['header_secondary_menu'] = "secondary_right extra_header_active";
		
		
		break;
		case 'nonfixed_header social_header bottom_nav_header': 
		
			$theme_options['header_layout'] 		= "logo_left bottom_nav_header";
			$theme_options['header_sticky'] 		= "";
			$theme_options['header_shrinking'] 		= "";
			$theme_options['header_social'] 		= "icon_active_main";
			$theme_options['header_secondary_menu'] = "secondary_right extra_header_active";
			
		break;
	}
	
	//replace existing options with the new options
	$avia->options['avia'] = $theme_options;
	update_option($avia->option_prefix, $avia->options);
	
	
	//update post specific options
    $getPosts = new WP_Query(
    	array(
	        'post_type'     => array( 'post', 'page', 'portfolio', 'product' ),
	        'post_status'   => 'publish',
	        'posts_per_page'=>-1,
	        'meta_query' => array(
	            array(
	                'key' => 'header'
	            )
	        )
	    ));
	    
	if(!empty($getPosts->posts))
	{
		foreach($getPosts->posts as $post)
		{
			$header_setting = get_post_meta( $post->ID, 'header', true );
			switch($header_setting)
			{
				case "yes": update_post_meta($post->ID, 'header_title_bar', ''); ; break;
				case "no":  update_post_meta($post->ID, 'header_title_bar', 'hidden_title_bar'); ; break;
			}
		}
	}
	
	
}


/*
 *
 * update for version XX: 
 *
 */