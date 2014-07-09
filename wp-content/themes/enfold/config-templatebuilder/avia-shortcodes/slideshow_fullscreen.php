<?php
/**
 * Slider
 * Shortcode that allows to display a simple slideshow
 */

if ( !class_exists( 'avia_sc_slider_fullscreen' ) ) 
{
	class avia_sc_slider_fullscreen extends aviaShortcodeTemplate
	{
			static $slide_count = 0;
	
			/**
			 * Create the config array for the shortcode button
			 */
			function shortcode_insert_button()
			{
				$this->config['name']			= __('Fullscreen Slider', 'avia_framework' );
				$this->config['tab']			= __('Media Elements', 'avia_framework' );
				$this->config['icon']			= AviaBuilder::$path['imagesURL']."sc-fullscreen.png";
				$this->config['order']			= 60;
				$this->config['target']			= 'avia-target-insert';
				$this->config['shortcode'] 		= 'av_fullscreen';
				$this->config['shortcode_nested'] = array('av_fullscreen_slide');
				$this->config['tooltip'] 	    = __('Display a fullscreen slideshow element', 'avia_framework' );
				$this->config['tinyMCE'] 		= array('disable' => "true");
				$this->config['drag-level'] 	= 1;
			}

			/**
			 * Popup Elements
			 *
			 * If this function is defined in a child class the element automatically gets an edit button, that, when pressed
			 * opens a modal window that allows to edit the element properties
			 *
			 * @return void
			 */
			function popup_elements()
			{
				$this->elements = array(
			
					array(	
							"type" 			=> "modal_group", 
							"id" 			=> "content",
							'container_class' =>"avia-element-fullwidth avia-multi-img",
							"modal_title" 	=> __("Edit Form Element", 'avia_framework' ),
							"add_label"		=>  __("Add single image or video", 'avia_framework' ),
							"std"			=> array(),
							
							'creator'		=>array(
								
										"name" => __("Add Images", 'avia_framework' ),
										"desc" => __("Here you can add new Images to the slideshow.", 'avia_framework' ),
										"id" 	=> "id",
										"type" 	=> "multi_image",
										"title" => __("Add multiple Images",'avia_framework' ),
										"button" => __("Insert Images",'avia_framework' ),
										"std" 	=> ""
										),
															
							'subelements' 	=> array(
									
									
									array(	
										"name" 	=> __("Which type of slide is this?",'avia_framework' ),
										"id" 	=> "slide_type",
										"type" 	=> "select",
										"std" 	=> "",
										"subtype" => array(   __('Image Slide','avia_framework' )	=>'image',
										                      __('Video Slide','avia_framework' )	=>'video',
										                      )
								    ),
									
									array(	
									"name" 	=> __("Choose another Image",'avia_framework' ),
									"desc" 	=> __("Either upload a new, or choose an existing image from your media library",'avia_framework' ),
									"id" 	=> "id",
									"fetch" => "id",
									"type" 	=> "image",
									"required"=> array('slide_type','is_empty_or','image'),
									"title" => __("Change Image",'avia_framework' ),
									"button" => __("Change Image",'avia_framework' ),
									"std" 	=> ""),
									
									
				                    array(	
										"name" 	=> __("Image Position",'avia_framework' ),
										"id" 	=> "position",
										"type" 	=> "select",
										"std" 	=> "Center Center",
										"required" => array('id','not',''),
										"subtype" => array(   __('Top Left','avia_framework' )       =>'top left',
										                      __('Top Center','avia_framework' )     =>'top center',
										                      __('Top Right','avia_framework' )      =>'top right', 
										                      __('Bottom Left','avia_framework' )    =>'bottom left',
										                      __('Bottom Center','avia_framework' )  =>'bottom center',
										                      __('Bottom Right','avia_framework' )   =>'bottom right', 
										                      __('Center Left','avia_framework' )    =>'center left',
										                      __('Center Center','avia_framework' )  =>'center center',
										                      __('Center Right','avia_framework' )   =>'center right'
										                      )
								    ),
									
									
array(	
									"name" 	=> __("Video URL", 'avia_framework' ),
									"desc" 	=> __('Enter the URL to the Video. Currently supported are Youtube, Vimeo and direct linking of web-video files (mp4, webm, ogv)', 'avia_framework' ) .'<br/><br/>'.
									__('Working examples Youtube & Vimeo:', 'avia_framework' ).'<br/>
								<strong>http://vimeo.com/64927358</strong><br/> 
								<strong>http://www.youtube.com/watch?v=5guMumPFBag</strong><br/><br/>',
									"required"=> array('slide_type','equals','video'),
									"id" 	=> "video",
									"std" 	=> "http://",
									"type" 	=> "video",
									"title" => __("Upload Video",'avia_framework' ),
									"button" => __("Use Video",'avia_framework' ),
									
									),
									
									 array(	
									"name" 	=> __("Choose fallback image for mobile devices",'avia_framework' ),
									"desc" 	=> __("Either upload a new, or choose an existing image from your media library",'avia_framework' )."<br/><small>".__("Video on most mobile devices can't be controlled properly with JavaScript, which is mandatory here, therefore you are required to select a fallback image which can be displayed instead", 'avia_framework' ) ."</small>" ,
									"id" 	=> "mobile_image",
									"fetch" => "id",
									"type" 	=> "image",
									"required"=> array('slide_type','equals','video'),
									"title" => __("Choose Image",'avia_framework' ),
									"button" => __("Choose Image",'avia_framework' ),
									"std" 	=> ""),
									
									
									
									 array(	
										"name" 	=> __("Video Display",'avia_framework' ),
										"desc" 	=> __('You can either make sure that the whole video is visible and no cropping occurs or that the video is stretched to display full screen', 'avia_framework' ),
										"id" 	=> "video_cover",
										"type" 	=> "select",
										"std" 	=> "",
										"required"=> array('slide_type','equals','video'),
										"subtype" => array(   
															__('Display Video in default mode, black borders may occur but the whole video will be visible','avia_framework' )       =>'',
										                    __('Stretch Video so it covers the whole slideshow (Video must be 16:9 for this option to work properly)','avia_framework' )     =>'av-element-cover',
										                      )
								    ),
								    
								    array(	
									"name" 	=> __("Hide Video Controls", 'avia_framework' ),
									"desc" 	=> __("Check if you want to hide the controls (works for youtube and self hosted videos)", 'avia_framework' ) ,
									"id" 	=> "video_controls",
									"required"=> array('slide_type','equals','video'),
									"std" 	=> "",
									"type" 	=> "checkbox"),
									
									array(	
									"name" 	=> __("Mute Video Player", 'avia_framework' ),
									"desc" 	=> __("Check if you want to mute the video", 'avia_framework' ) ,
									"id" 	=> "video_mute",
									"required"=> array('slide_type','equals','video'),
									"std" 	=> "",
									"type" 	=> "checkbox"),
									
									array(	
									"name" 	=> __("Loop Video Player", 'avia_framework' ),
									"desc" 	=> __("Check if you want to loop the video (instead of showing the next slide the video will play from the beginning again)", 'avia_framework' ) ,
									"id" 	=> "video_loop",
									"required"=> array('slide_type','equals','video'),
									"std" 	=> "",
									"type" 	=> "checkbox"),
									
									array(	
									"name" 	=> __("Disable Autoplay", 'avia_framework' ),
									"desc" 	=> __("Check if you want to disable video autoplay when this slide shows", 'avia_framework' ) ,
									"id" 	=> "video_autoplay",
									"required"=> array('slide_type','equals','video'),
									"std" 	=> "",
									"type" 	=> "checkbox"),

									
									array(	
									"name" 	=> __("Caption Title", 'avia_framework' ),
									"desc" 	=> __("Enter a caption title for the slide here", 'avia_framework' ) ,
									"id" 	=> "title",
									"std" 	=> "",
									"type" 	=> "input"),
									
									 array(	
									"name" 	=> __("Caption Text", 'avia_framework' ),
									"desc" 	=> __("Enter some additional caption text", 'avia_framework' ) ,
									"id" 	=> "content",
									"type" 	=> "textarea",
									"std" 	=> "",
									),
									
									array(	
									"name" 	=> __("Caption Positioning",'avia_framework' ),
									"id" 	=> "caption_pos",
									"type" 	=> "select",
									"std" 	=> "caption_bottom",
									"subtype" => array(
												'Right Framed'=>'caption_right caption_right_framed caption_framed',
												'Left Framed'=>'caption_left caption_left_framed caption_framed', 
												'Bottom Framed'=>'caption_bottom caption_bottom_framed caption_framed',
												'Center Framed'=>'caption_center caption_center_framed caption_framed',
												'Right without Frame'=>'caption_right',
												'Left without Frame'=>'caption_left',
												'Bottom without Frame'=>'caption_bottom',
												'Center without Frame'=>'caption_center'
											),
									),
									
									
									array(	
									"name" 	=> __("Apply a link or buttons to the slide?", 'avia_framework' ),
									"desc" 	=> __("You can choose to apply the link to the whole image or to add 'Call to Action Buttons' that get appended to the caption", 'avia_framework' ),
									"id" 	=> "link_apply",
									"type" 	=> "select",
									"std" 	=> "",
									"subtype" => array(
										__('No Link for this slide',  	'avia_framework' ) =>'',
										__('Apply Link to Image',  		'avia_framework' ) =>'image',
										__('Attach one button',  		'avia_framework' ) =>'button',
										__('Attach two buttons',  		'avia_framework' ) =>'button button-two')),
									
									
									array(	
									"name" 	=> __("Image Link?", 'avia_framework' ),
									"desc" 	=> __("Where should the Image link to?", 'avia_framework' ),
									"id" 	=> "link",
									"required"=> array('link_apply','equals','image'),
									"type" 	=> "linkpicker",
									"fetchTMPL"	=> true,
									"subtype" => array(	
														__('Open Image in Lightbox', 'avia_framework' ) =>'lightbox',
														__('Set Manually', 'avia_framework' ) =>'manually',
														__('Single Entry', 'avia_framework' ) => 'single',
														__('Taxonomy Overview Page',  'avia_framework' ) => 'taxonomy',
														),
									"std" 	=> ""),
							
									array(	
									"name" 	=> __("Open Link in new Window?", 'avia_framework' ),
									"desc" 	=> __("Select here if you want to open the linked page in a new window", 'avia_framework' ),
									"id" 	=> "link_target",
									"type" 	=> "select",
									"std" 	=> "",
									"required"=> array('link','not_empty_and','lightbox'),
									"subtype" => AviaHtmlHelper::linking_options()),   
										
									
										
									array(	"name" 	=> __("Button 1 Label", 'avia_framework' ),
											"desc" 	=> __("This is the text that appears on your button.", 'avia_framework' ),
								            "id" 	=> "button_label",
								            "type" 	=> "input",
								            "container_class" => 'av_half av_half_first',
											"required"=> array('link_apply','contains','button'),
								            "std" 	=> "Click me"),	
								            
								   	array(	
											"name" 	=> __("Button 1 Color", 'avia_framework' ),
											"desc" 	=> __("Choose a color for your button here", 'avia_framework' ),
											"id" 	=> "button_color",
											"type" 	=> "select",
											"std" 	=> "light",
								    		"container_class" => 'av_half',
											"required"=> array('link_apply','contains','button'),
											"subtype" => array(	
														__('Translucent Buttons', 'avia_framework' ) => array(
															__('Light Transparent', 'avia_framework' )=>'light',
															__('Dark Transparent', 'avia_framework' )=>'dark',
														),
														
														__('Colored Buttons', 'avia_framework' ) => array(
															__('Theme Color', 'avia_framework' )=>'theme-color',
															__('Theme Color Subtle', 'avia_framework' )=>'theme-color-subtle',
															__('Blue', 'avia_framework' )=>'blue',
															__('Red',  'avia_framework' )=>'red',
															__('Green', 'avia_framework' )=>'green',
															__('Orange', 'avia_framework' )=>'orange',
															__('Aqua', 'avia_framework' )=>'aqua',
															__('Teal', 'avia_framework' )=>'teal',
															__('Purple', 'avia_framework' )=>'purple',
															__('Pink', 'avia_framework' )=>'pink',
															__('Silver', 'avia_framework' )=>'silver',
															__('Grey', 'avia_framework' )=>'grey',
															__('Black', 'avia_framework' )=>'black',
														)
														
														)),
								
								array(	
									"name" 	=> __("Button 1 Link?", 'avia_framework' ),
									"desc" 	=> __("Where should the Button link to?", 'avia_framework' ),
									"id" 	=> "link1",
									"container_class" => 'av_half av_half_first',
									"required"=> array('link_apply','contains','button'),
									"type" 	=> "linkpicker",
									"fetchTMPL"	=> true,
									"subtype" => array(	
														__('Set Manually', 'avia_framework' ) =>'manually',
														__('Single Entry', 'avia_framework' ) => 'single',
														__('Taxonomy Overview Page',  'avia_framework' ) => 'taxonomy',
														),
									"std" 	=> ""),
								
								
								
								array(	
									"name" 	=> __("Button 1 Link Target?", 'avia_framework' ),
									"desc" 	=> __("Select here if you want to open the linked page in a new window", 'avia_framework' ),
									"id" 	=> "link_target1",
									"type" 	=> "select",
									"std" 	=> "",
									"container_class" => 'av_half',
									"required"=> array('link_apply','contains','button'),
									"subtype" => AviaHtmlHelper::linking_options()),   						
								
								array(	"name" 	=> __("Button 2 Label", 'avia_framework' ),
											"desc" 	=> __("This is the text that appears on your second button.", 'avia_framework' ),
								            "id" 	=> "button_label2",
								            "type" 	=> "input",
								            "container_class" => 'av_half av_half_first',
											"required"=> array('link_apply','contains','button-two'),
								            "std" 	=> "Click me"),	
								            
								   	array(	
											"name" 	=> __("Button 2 Color", 'avia_framework' ),
											"desc" 	=> __("Choose a color for your second button here", 'avia_framework' ),
											"id" 	=> "button_color2",
											"type" 	=> "select",
											"std" 	=> "light",
								    		"container_class" => 'av_half',
											"required"=> array('link_apply','contains','button-two'),
											"subtype" => array(	
														__('Translucent Buttons', 'avia_framework' ) => array(
															__('Light Transparent', 'avia_framework' )=>'light',
															__('Dark Transparent', 'avia_framework' )=>'dark',
														),
														
														__('Colored Buttons', 'avia_framework' ) => array(
															__('Theme Color', 'avia_framework' )=>'theme-color',
															__('Theme Color Subtle', 'avia_framework' )=>'theme-color-subtle',
															__('Blue', 'avia_framework' )=>'blue',
															__('Red',  'avia_framework' )=>'red',
															__('Green', 'avia_framework' )=>'green',
															__('Orange', 'avia_framework' )=>'orange',
															__('Aqua', 'avia_framework' )=>'aqua',
															__('Teal', 'avia_framework' )=>'teal',
															__('Purple', 'avia_framework' )=>'purple',
															__('Pink', 'avia_framework' )=>'pink',
															__('Silver', 'avia_framework' )=>'silver',
															__('Grey', 'avia_framework' )=>'grey',
															__('Black', 'avia_framework' )=>'black',
														)
														
														)),
						
								array(	
									"name" 	=> __("Button 2 Link?", 'avia_framework' ),
									"desc" 	=> __("Where should the Button link to?", 'avia_framework' ),
									"id" 	=> "link2",
									"container_class" => 'av_half av_half_first',
									"required"=> array('link_apply','contains','button-two'),
									"type" 	=> "linkpicker",
									"fetchTMPL"	=> true,
									"subtype" => array(	
														__('Set Manually', 'avia_framework' ) =>'manually',
														__('Single Entry', 'avia_framework' ) => 'single',
														__('Taxonomy Overview Page',  'avia_framework' ) => 'taxonomy',
														),
									"std" 	=> ""),
								
								
								array(	
									"name" 	=> __("Button 2 Link Target?", 'avia_framework' ),
									"desc" 	=> __("Select here if you want to open the linked page in a new window", 'avia_framework' ),
									"id" 	=> "link_target2",
									"type" 	=> "select",
									"std" 	=> "",
									"container_class" => 'av_half',
									"required"=> array('link_apply','contains','button-two'),
									"subtype" => AviaHtmlHelper::linking_options()), 
			
						)	           
					),
							
					array(	
							"name" 	=> __("Slideshow Image Size", 'avia_framework' ),
							"desc" 	=> __("Choose image size for your slideshow.", 'avia_framework' ),
							"id" 	=> "size",
							"type" 	=> "select",
							"std" 	=> "extra_large",
							"subtype" =>  AviaHelper::get_registered_image_sizes(1000, true)		
							),
								
					array(	
							"name" 	=> __("Slideshow Transition", 'avia_framework' ),
							"desc" 	=> __("Choose the transition for your Slideshow.", 'avia_framework' ),
							"id" 	=> "animation",
							"type" 	=> "select",
							"std" 	=> "slide",
							"subtype" => array(__('Slide sidewards','avia_framework' ) =>'slide', __('Slide up/down','avia_framework' ) =>'slide_up', __('Fade','avia_framework' ) =>'fade'),
							),
							
					array(	
						"name" 	=> __("Autorotation active?",'avia_framework' ),
						"desc" 	=> __("Check if the slideshow should rotate by default",'avia_framework' ),
						"id" 	=> "autoplay",
						"type" 	=> "select",
						"std" 	=> "false",
						"subtype" => array(__('Yes','avia_framework' ) =>'true',__('No','avia_framework' ) =>'false')),	
			
					array(	
						"name" 	=> __("Slideshow autorotation duration",'avia_framework' ),
						"desc" 	=> __("Images will be shown the selected amount of seconds.",'avia_framework' ),
						"id" 	=> "interval",
						"type" 	=> "select",
						"std" 	=> "5",
						"subtype" => 
						array('3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','15'=>'15','20'=>'20','30'=>'30','40'=>'40','60'=>'60','100'=>'100')),
					
					array(	
						"name" 	=> __("Display a scroll down arrow", 'avia_framework' ),
						"desc" 	=> __("Check if you want to show a button at the bottom of the slider that takes the user to the next section by scrolling down", 'avia_framework' ) ,
						"id" 	=> "scroll_down",
						"std" 	=> "",
						"type" 	=> "checkbox"),
					
					
					/*
					array(	
						"name" 	=> __("Slideshow custom height",'avia_framework' ),
						"desc" 	=> __("Slideshow height is by default 100%. You can select a different size here. Will only work flawless with images, not videos",'avia_framework' ),
						"id" 	=> "slide_height",
						"type" 	=> "select",
						"std" 	=> "100",
						"subtype" => 
						array('100%'=>'100', '75%'=>'75', '66%'=>'66', '50%'=>'50')),
				*/
					
				);

			}
			
			/**
			 * Editor Element - this function defines the visual appearance of an element on the AviaBuilder Canvas
			 * Most common usage is to define some markup in the $params['innerHtml'] which is then inserted into the drag and drop container
			 * Less often used: $params['data'] to add data attributes, $params['class'] to modify the className
			 *
			 *
			 * @param array $params this array holds the default values for $content and $args. 
			 * @return $params the return array usually holds an innerHtml key that holds item specific markup.
			 */
			function editor_element($params)
			{	
				$params['innerHtml'] = "<img src='".$this->config['icon']."' title='".$this->config['name']."' />";
				$params['innerHtml'].= "<div class='avia-element-label'>".$this->config['name']."</div>";
				return $params;
			}
			
			/**
			 * Editor Sub Element - this function defines the visual appearance of an element that is displayed within a modal window and on click opens its own modal window
			 * Works in the same way as Editor Element
			 * @param array $params this array holds the default values for $content and $args. 
			 * @return $params the return array usually holds an innerHtml key that holds item specific markup.
			 */
			function editor_sub_element($params)
			{	
			
				$img_template 		= $this->update_template("img_fakeArg", "{{img_fakeArg}}");
				$template 			= $this->update_template("title", "{{title}}");
				$content 			= $this->update_template("content", "{{content}}");
				$video 				= $this->update_template("video", "{{video}}");
				$thumbnail = isset($params['args']['id']) ? wp_get_attachment_image($params['args']['id']) : "";
				
		
				$params['innerHtml']  = "";
				$params['innerHtml'] .= "<div class='avia_title_container'>";
				$params['innerHtml'] .=	"	<div ".$this->class_by_arguments('slide_type' ,$params['args']).">";
				$params['innerHtml'] .= "		<span class='avia_slideshow_image' {$img_template} >{$thumbnail}</span>";
				$params['innerHtml'] .= "		<div class='avia_slideshow_content'>";
				$params['innerHtml'] .= "			<h4 class='avia_title_container_inner' {$template} >".$params['args']['title']."</h4>";
				$params['innerHtml'] .= "			<p class='avia_content_container' {$content}>".stripslashes($params['content'])."</p>";
				$params['innerHtml'] .= "			<small class='avia_video_url' {$video}>".stripslashes($params['args']['video'])."</small>";
				$params['innerHtml'] .= "		</div>";
				$params['innerHtml'] .= "	</div>";
				$params['innerHtml'] .= "</div>";
				
				
				
				return $params;
			}
			
			
			
			/**
			 * Frontend Shortcode Handler
			 *
			 * @param array $atts array of attributes
			 * @param string $content text within enclosing form of shortcode element 
			 * @param string $shortcodename the shortcode found, when == callback name
			 * @return string $output returns the modified html string 
			 */
			function shortcode_handler($atts, $content = "", $shortcodename = "", $meta = "")
			{
				$atts = shortcode_atts(array(
				'size'			=> 'featured',
				'animation'		=> 'slide',
				'ids'    	 	=> '',
				'autoplay'		=> 'false',
				'interval'		=> 5,
				'handle'		=> $shortcodename,
				'stretch'		=> '',
				'bg_slider'		=> 'true',
				'slide_height'	=> "100",
				'scroll_down'	=> '',
				'content'		=> ShortcodeHelper::shortcode2array($content, 1)
				
				), $atts);
				
				extract($atts);
				$output  	= "";
			    $class = "";
			    
			    
				$skipSecond = false;
				avia_sc_slider_full::$slide_count++;
				
				$params['class'] = "avia-fullscreen-slider main_color ".$meta['el_class'].$class;
				$params['open_structure'] = false;
				
				//we dont need a closing structure if the element is the first one or if a previous fullwidth element was displayed before
				if($meta['index'] == 0) $params['close'] = false;
				if(!empty($meta['siblings']['prev']['tag']) && in_array($meta['siblings']['prev']['tag'], AviaBuilder::$full_el_no_section )) $params['close'] = false;
				
				if($meta['index'] != 0) $params['class'] .= " slider-not-first";
				
				$params['id'] = $atts['css_id']  = "fullscreen_slider_".avia_sc_slider_fullscreen::$slide_count;
				
				$output .=  avia_new_section($params);
				
				$slider  = new avia_slideshow($atts);
				$slider->set_extra_class($stretch);
				
				$output .= $slider->html();
				
				$output .= "</div>"; //close section
				
				
				//if the next tag is a section dont create a new section from this shortcode
				if(!empty($meta['siblings']['next']['tag']) && in_array($meta['siblings']['next']['tag'],  AviaBuilder::$full_el ))
				{
				    $skipSecond = true;
				}

				//if there is no next element dont create a new section.
				if(empty($meta['siblings']['next']['tag']))
				{
				    $skipSecond = true;
				}
				
				if(empty($skipSecond)) {
				
				$output .= avia_new_section(array('close'=>false, 'id' => "after_full_slider_".avia_sc_slider_fullscreen::$slide_count));
				
				}
				
				return $output;

			}
			
	}
}



