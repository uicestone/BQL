<?php

$advanced = array();

$advanced['strong'] = array(
	"id"			=> "strong", //needs to match array key
	"name"			=> "&lt;strong&gt;",
	"group" 		=> __("Tags",'avia_framework'),
	"description"	=> __("Change the styling for all &lt;strong&gt; tags",'avia_framework'),
	"selector"		=> array("#top [sections] strong" => ""),
	"sections"		=> true,
	"hover"			=> false,
	"edit"			=> array(	'color' 			=> array('type' => 'colorpicker', 'name'=> __("Font Color",'avia_framework')), 
								'background_color' 	=> array('type' => 'colorpicker', 'name'=> __("Background Color",'avia_framework')),
								'font_family' 		=> array('type' => 'font', 'name'=> __("Font Family",'avia_framework'), 'options' => $google_fonts),
							)
);

$advanced['blockquote'] = array(
	"id"			=> "blockquote", //needs to match array key
	"name"			=> "&lt;blockquote&gt;",
	"group" 		=> __("Tags",'avia_framework'),
	"description"	=> __("Change the styling for all &lt;blockquote&gt; tags",'avia_framework'),
	"selector"		=> array("#top [sections] blockquote"=> ""),
	"sections"		=> true,
	"hover"			=> false,
	"edit"			=> array(	'color' 			=> array('type' => 'colorpicker', 'name'=> __("Font Color",'avia_framework')), 
								'border_color' 		=> array('type' => 'colorpicker', 'name'=> __("Border Color",'avia_framework')),
								'font_size' 		=> array('type' => 'size', 'range' => '10-80', 'name'=> __("Font Size",'avia_framework')),
								'line_height' 		=> array('type' => 'size', 'range' => '0.7-2', 'increment' => 0.1, 'unit' => 'em',  'name'=> __("Line Height",'avia_framework')),
								'font_family' 		=> array('type' => 'font', 'name'=> __("Font Family",'avia_framework'), 'options' => $google_fonts),
							)
);



$advanced['headings_all'] = array(
	"id"			=> "headings_all", //needs to match array key
	"name"			=> "All Headings (H1-H6)",
	"group" 		=> __("Headings",'avia_framework'),
	"description"	=> __("Change the styling for all Heading tags",'avia_framework'),
	"selector"		=> array("#top #wrap_all [sections] h1, #top #wrap_all [sections] h2, #top #wrap_all [sections] h3, #top #wrap_all [sections] h4, #top #wrap_all [sections] h5, #top #wrap_all [sections] h6"=> ""),
	"sections"		=> true,
	"hover"			=> false,
	"edit"			=> array(	'color' 			=> array('type' => 'colorpicker', 'name'=> __("Font Color",'avia_framework')), 
								'background_color' 	=> array('type' => 'colorpicker', 'name'=> __("Background Color",'avia_framework')),
								'font_family' 		=> array('type' => 'font', 'name'=> __("Font Family",'avia_framework'), 'options' => $google_fonts),
							)

);

$advanced['h1'] = array(
	"id"			=> "h1", //needs to match array key
	"name"			=> "H1",
	"group" 		=> __("Headings",'avia_framework'),
	"description"	=> __("Change the styling for your H1 Tag",'avia_framework'),
	"selector"		=> array("#top #wrap_all [sections] h1"=> ""),
	"sections"		=> true,
	"hover"			=> false,
	"edit"			=> array(	'color' 			=> array('type' => 'colorpicker', 'name'=> __("Font Color",'avia_framework')), 
								'background_color' 	=> array('type' => 'colorpicker', 'name'=> __("Background Color",'avia_framework')),
								'font_size' 		=> array('type' => 'size', 'range' => '10-80', 'name'=> __("Font Size",'avia_framework')),
								'line_height' 		=> array('type' => 'size', 'range' => '0.7-2', 'increment' => 0.1, 'unit' => 'em',  'name'=> __("Line Height",'avia_framework')),
								'font_family' 		=> array('type' => 'font', 'name'=> __("Font Family",'avia_framework'), 'options' => $google_fonts),
							)

);


$advanced['h2'] = array(
	"id"			=> "h2", //needs to match array key
	"name"			=> "H2",
	"group" 		=> __("Headings",'avia_framework'),
	"description"	=> __("Change the styling for your H2 Tag",'avia_framework'),
	"selector"		=> array("#top #wrap_all [sections] h2"=> ""),
	"sections"		=> true,
	"hover"			=> false,
	"edit"			=> array(	'color' 			=> array('type' => 'colorpicker', 'name'=> __("Font Color",'avia_framework')), 
								'background_color' 	=> array('type' => 'colorpicker', 'name'=> __("Background Color",'avia_framework')),
								'font_size' 		=> array('type' => 'size', 'range' => '10-80', 'name'=> __("Font Size",'avia_framework')),
								'line_height' 		=> array('type' => 'size', 'range' => '0.7-2', 'increment' => 0.1, 'unit' => 'em',  'name'=> __("Line Height",'avia_framework')),
								'font_family' 		=> array('type' => 'font', 'name'=> __("Font Family",'avia_framework'), 'options' => $google_fonts),
							)
);

$advanced['h3'] = array(
	"id"			=> "h3", //needs to match array key
	"name"			=> "H3",
	"group" 		=> __("Headings",'avia_framework'),
	"description"	=> __("Change the styling for your H3 Tag",'avia_framework'),
	"selector"		=> array("#top #wrap_all [sections] h3"=> ""),
	"sections"		=> true,
	"hover"			=> false,
	"edit"			=> array(	'color' 			=> array('type' => 'colorpicker', 'name'=> __("Font Color",'avia_framework')), 
								'background_color' 	=> array('type' => 'colorpicker', 'name'=> __("Background Color",'avia_framework')),
								'font_size' 		=> array('type' => 'size', 'range' => '10-80', 'name'=> __("Font Size",'avia_framework')),
								'line_height' 		=> array('type' => 'size', 'range' => '0.7-2', 'increment' => 0.1, 'unit' => 'em',  'name'=> __("Line Height",'avia_framework')),
								'font_family' 		=> array('type' => 'font', 'name'=> __("Font Family",'avia_framework'), 'options' => $google_fonts),
							)
);

$advanced['h4'] = array(
	"id"			=> "h4", //needs to match array key
	"name"			=> "H4",
	"group" 		=> __("Headings",'avia_framework'),
	"description"	=> __("Change the styling for your H4 Tag",'avia_framework'),
	"selector"		=> array("#top #wrap_all [sections] h4"=> ""),
	"sections"		=> true,
	"hover"			=> false,
	"edit"			=> array(	'color' 			=> array('type' => 'colorpicker', 'name'=> __("Font Color",'avia_framework')), 
								'background_color' 	=> array('type' => 'colorpicker', 'name'=> __("Background Color",'avia_framework')),
								'font_size' 		=> array('type' => 'size', 'range' => '10-80', 'name'=> __("Font Size",'avia_framework')),
								'line_height' 		=> array('type' => 'size', 'range' => '0.7-2', 'increment' => 0.1, 'unit' => 'em',  'name'=> __("Line Height",'avia_framework')),
								'font_family' 		=> array('type' => 'font', 'name'=> __("Font Family",'avia_framework'), 'options' => $google_fonts),
							)
);

$advanced['h5'] = array(
	"id"			=> "h5", //needs to match array key
	"name"			=> "H5",
	"group" 		=> __("Headings",'avia_framework'),
	"description"	=> __("Change the styling for your H5 Tag",'avia_framework'),
	"selector"		=> array("#top #wrap_all [sections] h5"=> ""),
	"sections"		=> true,
	"hover"			=> false,
	"edit"			=> array(	'color' 			=> array('type' => 'colorpicker', 'name'=> __("Font Color",'avia_framework')), 
								'background_color' 	=> array('type' => 'colorpicker', 'name'=> __("Background Color",'avia_framework')),
								'font_size' 		=> array('type' => 'size', 'range' => '10-80', 'name'=> __("Font Size",'avia_framework')),
								'line_height' 		=> array('type' => 'size', 'range' => '0.7-2', 'increment' => 0.1, 'unit' => 'em',  'name'=> __("Line Height",'avia_framework')),
								'font_family' 		=> array('type' => 'font', 'name'=> __("Font Family",'avia_framework'), 'options' => $google_fonts),
							)
);

$advanced['h6'] = array(
	"id"			=> "h6", //needs to match array key
	"name"			=> "H6",
	"group" 		=> __("Headings",'avia_framework'),
	"description"	=> __("Change the styling for your H6 Tag",'avia_framework'),
	"selector"		=> array("#top #wrap_all [sections] h6"=> ""),
	"sections"		=> true,
	"hover"			=> false,
	"edit"			=> array(	'color' 			=> array('type' => 'colorpicker', 'name'=> __("Font Color",'avia_framework')), 
								'background_color' 	=> array('type' => 'colorpicker', 'name'=> __("Background Color",'avia_framework')),
								'font_size' 		=> array('type' => 'size', 'range' => '10-80', 'name'=> __("Font Size",'avia_framework')),
								'line_height' 		=> array('type' => 'size', 'range' => '0.7-2', 'increment' => 0.1, 'unit' => 'em',  'name'=> __("Line Height",'avia_framework')),
								'font_family' 		=> array('type' => 'font', 'name'=> __("Font Family",'avia_framework'), 'options' => $google_fonts),
							)
);



$advanced['main_menu'] = array(
	"id"			=> "main_menu", //needs to match array key
	"name"			=> __("Main Menu Links",'avia_framework'),
	"group" 		=> __("Main Menu",'avia_framework'),
	"description"	=> __("Change the styling for your main menu links",'avia_framework'),
	"selector"		=> array("#top .av-main-nav > li[hover] > a"=> ""),
	"sections"		=> false,
	"hover"			=> true,
	"edit"			=> array(	'color' 			=> array('type' => 'colorpicker', 'name'=> __("Font Color",'avia_framework')), 
								'background_color' 	=> array('type' => 'colorpicker', 'name'=> __("Background Color",'avia_framework')),
								'font_size' 		=> array('type' => 'size', 'range' => '10-30', 'name'=> __("Font Size",'avia_framework')),
								'font_family' 		=> array('type' => 'font', 'name'=> __("Font Family",'avia_framework'), 'options' => $google_fonts),
							)						
);


$advanced['main_menu_dropdown'] = array(
	"id"			=> "main_menu_dropdown", //needs to match array key
	"name"			=> __("Main Menu sublevel Links",'avia_framework'),
	"group" 		=> __("Main Menu",'avia_framework'),
	"description"	=> __("Change the styling for your main menu dropdown links",'avia_framework'),
	"selector"		=> array("#top #wrap_all .av-main-nav ul > li[hover] > a, #top #wrap_all .avia_mega_div, #top #wrap_all .avia_mega_div ul, #top #wrap_all .av-main-nav ul ul"=> ""),
	"sections"		=> false,
	"hover"			=> true,
	"edit"			=> array(	'color' 			=> array('type' => 'colorpicker', 'name'=> __("Font Color",'avia_framework')), 
								'background_color' 	=> array('type' => 'colorpicker', 'name'=> __("Background Color",'avia_framework')),
								'border_color' 		=> array('type' => 'colorpicker', 'name'=> __("Border Color",'avia_framework')),
								'font_size' 		=> array('type' => 'size', 'range' => '10-30', 'name'=> __("Font Size",'avia_framework')),
								'line_height' 		=> array('type' => 'size', 'range' => '0.7-3', 'increment' => 0.1, 'unit' => 'em',  'name'=> __("Line Height",'avia_framework')),
							)						
);

$advanced['top_bar'] = array(
	"id"			=> "top_bar", //needs to match array key
	"name"			=> __("Small bar above Main Menu",'avia_framework'),
	"group" 		=> __("Main Menu",'avia_framework'),
	"description"	=> __("Change the styling for the small bar above the main menu which can contain social icons, a second menu and a phone number ",'avia_framework'),
	"selector"		=> array(
							 	"#top #header_meta, #top #header_meta nav ul ul li, #top #header_meta nav ul ul a, #top #header_meta nav ul ul" => array("background_color" => "background-color: %background_color%;"), 
							 	"#top #header_meta a, #top #header_meta ul, #top #header_meta li, #top #header_meta .phone-info" => array( "border_color" => "border-color: %border_color%;", "color" => "color: %color%;" )
							 ),
	"sections"		=> false,
	"hover"			=> false,
	"edit"			=> array(	'color' 			=> array('type' => 'colorpicker', 'name'=> __("Font Color",'avia_framework')), 
								'background_color' 	=> array('type' => 'colorpicker', 'name'=> __("Background Color",'avia_framework')),
								'border_color' 		=> array('type' => 'colorpicker', 'name'=> __("Border Color",'avia_framework')),
							)						
);

$advanced['hover_overlay'] = array(
	"id"			=> "hover_overlay", //needs to match array key
	"name"			=> __("Linked Image Overlay",'avia_framework'),
	"group" 		=> __("Misc",'avia_framework'),
	"description"	=> __("Change the styling for the overlay that appears when you place your mouse cursor above a linked image",'avia_framework'),
	"selector"		=> array(  
								"#top [sections] .image-overlay" => array("background_color" => "background-color: %background_color%;"),   
								"#top [sections] .image-overlay .image-overlay-inside:before" => array( "icon_color" => "background-color: %icon_color%;", "color" => "color: %color%;" )
							),
	"sections"		=> true,
	"hover"			=> false,
	"edit"			=> array(	'color' 			=> array('type' => 'colorpicker', 'name'=> __("Icon Color",'avia_framework')), 
								'icon_color' 		=> array('type' => 'colorpicker', 'name'=> __("Icon background",'avia_framework')),
								'background_color' 	=> array('type' => 'colorpicker', 'name'=> __("Overlay Color",'avia_framework')),
							)						
);




//body font size
//dropdown menu
//icon colors
//hover states
//links
// all sections/specific section