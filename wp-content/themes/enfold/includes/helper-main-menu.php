<?php 

$responsive		= avia_get_option('responsive_layout','responsive');
$headerS 		= avia_header_setting();
$headerMenu 	= $responsive ? "mobile_slide_out" : "";
$social_args 	= array('outside'=>'ul', 'inside'=>'li', 'append' => '');
$icons 			= !empty($headerS['header_social']) ? avia_social_media_icons($social_args, false) : "";
?>


<header id='header' class=' header_color <?php avia_is_dark_bg('header_color'); echo " ".$headerMenu.$headerS['header_class']; ?>' <?php avia_markup_helper(array('context' => 'header','post_type'=>'forum'));?>>

<?php

if($responsive && $headerMenu == 'mobile_slide_out')
{
	echo '<a id="advanced_menu_toggle" href="#" '.av_icon_string('mobile_menu').'></a>';
	echo '<a id="advanced_menu_hide" href="#" 	'.av_icon_string('close').'></a>';
}

//subheader, only display when the user chooses a social header
if($headerS['header_topbar'] == true)
{
?>
		<div id='header_meta' class='container_wrap container_wrap_meta <?php echo avia_header_class_string(array('header_social', 'header_secondary_menu', 'header_phone_active'), 'av_'); ?>'>
		
			      <div class='container'>
			      <?php
			            /*
			            *	display the themes social media icons, defined in the wordpress backend
			            *   the avia_social_media_icons function is located in includes/helper-social-media-php
			            */
						$nav = "";
						
						//display icons
			            if(strpos( $headerS['header_social'], 'extra_header_active') !== false) echo $icons;
					
						//display navigation
						if(strpos( $headerS['header_secondary_menu'], 'extra_header_active') !== false )
						{
			            	//display the small submenu
			                $avia_theme_location = 'avia2';
			                $avia_menu_class = $avia_theme_location . '-menu';
			                $args = array(
			                    'theme_location'=>$avia_theme_location,
			                    'menu_id' =>$avia_menu_class,
			                    'container_class' =>$avia_menu_class,
			                    'fallback_cb' => '',
			                    'container'=>'',
			                    'echo' =>false
			                );
			                
			                $nav = wp_nav_menu($args);
						}
			                
						if(!empty($nav) || apply_filters('avf_execute_avia_meta_header', false))
						{
							echo "<nav class='sub_menu' ".avia_markup_helper(array('context' => 'nav', 'echo' => false)).">";
							echo $nav;
		                    do_action('avia_meta_header'); // Hook that can be used for plugins and theme extensions (currently: the wpml language selector)
							echo '</nav>';
						}
						
						
						//phone/info text	
						$phone			= $headerS['header_phone_active'] != "" ? $headerS['phone'] : "";
						$phone_class 	= !empty($nav) ? "with_nav" : "";
						if($phone) 		{ echo "<div class='phone-info {$phone_class}'><span>{$phone}</span></div>"; }
							
							
			        ?>
			      </div>
		</div>

<?php } ?>



		<div  id='header_main' class='container_wrap container_wrap_logo'>
	
        <?php
        /*
        * Hook that can be used for plugins and theme extensions (currently:  the woocommerce shopping cart)
        */
        do_action('ava_main_header');
		?>
	
				 <div class='container'>
		
						<?php
						/*
						*	display the theme logo by checking if the default logo was overwritten in the backend.
						*   the function is located at framework/php/function-set-avia-frontend-functions.php in case you need to edit the output
						*/
						$addition = false;
						if( !empty($headerS['header_transparency']) && !empty($headerS['header_replacement_logo']) )
						{
							$addition = "<img src='".$headerS['header_replacement_logo']."' class='alternate' alt='' />";
						}
						
						echo avia_logo(AVIA_BASE_URL.'images/layout/logo.png', $addition, 'strong', true);
					
						    if($headerS['header_social'] == 'icon_active_main' && !empty($headerS['bottom_menu'])) echo $icons;
						
						/*
						*	display the main navigation menu
						*   modify the output in your wordpress admin backend at appearance->menus
						*/
						    $extraOpen = $extraClose = "";
						    if($headerS['bottom_menu']){ $extraClose = "</div></div><div id='header_main_alternate' class='container_wrap'><div class='container'>";  }
						
						    echo $extraClose;
						
						    echo "<nav class='main_menu' data-selectname='".__('Select a page','avia_framework')."' ".avia_markup_helper(array('context' => 'nav', 'echo' => false)).">";
						        $avia_theme_location = 'avia';
						        $avia_menu_class = $avia_theme_location . '-menu';
						        $args = array(
						            'theme_location'	=> $avia_theme_location,
						            'menu_id' 			=> $avia_menu_class,
						            'menu_class'		=> 'menu av-main-nav',
						            'container_class'	=> $avia_menu_class.' av-main-nav-wrap',
						            'fallback_cb' 		=> 'avia_fallback_menu',
						            'walker' 			=> new avia_responsive_mega_menu()
						        );
						
						        wp_nav_menu($args);
						        
						    if($headerS['header_social'] == 'icon_active_main' && empty($headerS['bottom_menu'])) echo $icons;    
						        
						    echo '</nav>';
						
						    /*
						    * Hook that can be used for plugins and theme extensions
						    */
						    do_action('ava_after_main_menu');
						?>
						
		        <!-- end container-->
		        </div>

		<!-- end container_wrap-->
		</div>
		
		<div class='header_bg'></div>

<!-- end header -->
</header>
