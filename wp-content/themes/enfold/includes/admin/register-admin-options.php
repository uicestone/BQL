<?php
global $avia_config;

//avia pages holds the data necessary for backend page creation
$avia_pages = array(

	array( 'slug' => 'avia', 		'parent'=>'avia', 'icon'=>"hammer_screwdriver.png" , 	'title' =>  'Theme Options' ),
	array( 'slug' => 'styling', 	'parent'=>'avia', 'icon'=>"palette.png", 				'title' =>  'General Styling'  ),
	array( 'slug' => 'customize', 	'parent'=>'avia', 'icon'=>"wand.png", 					'title' =>  'Advanced Styling'  ),
	array( 'slug' => 'header', 		'parent'=>'avia', 'icon'=>"layout_select.png", 			'title' =>  'Header Layout'  ),
	array( 'slug' => 'sidebars', 	'parent'=>'avia', 'icon'=>"layout_select_sidebar.png", 	'title' =>  'Sidebar Layout'  ),
	array( 'slug' => 'footer', 		'parent'=>'avia', 'icon'=>"layout_select_footer.png", 	'title' =>  'Footer Layout'  ),
	array( 'slug' => 'blog', 		'parent'=>'avia', 'icon'=>"blog.png", 					'title' =>  'Blog Layout'  ),
);

if(!current_theme_supports('avia_disable_import_export')){
	$avia_pages[] = array( 'slug' => 'upload', 		'parent'=>'avia', 'icon'=>"import_export.png", 			'title' =>  'Import/Export'  );
}





//required for the general styling color schemes
include('register-backend-styles.php');

//required for the general styling google fonts
include('register-backend-google-fonts.php');

//required for the advanced styling wizard
include('register-backend-advanced-styles.php');









/*Frontpage Settings*/


if(!current_theme_supports('avia_disable_dummy_import')){
$avia_elements[] =	array(
					"slug"	=> "upload",
					"name" 	=> "Import Dummy Content: Posts, Pages, Categories",
					"desc" 	=> "If you are new to wordpress or have problems creating posts or pages that look like the <a href='http://www.kriesi.at/themes/enfold/'>Theme Demo</a> you can import dummy posts and pages here that will definitely help to understand how those tasks are done.",
					"id" 	=> "import",
					"type" 	=> "import");
}


if(is_child_theme()){
$avia_elements[] =	array(
					"slug"	=> "upload",
					"name" 	=> "Import Settings from your Parent Theme",
					"desc" 	=> "We have detected that you are using a Child Theme. That's Great!. If you want to, we can import the settings of your Parent theme to your Child theme. <br/>Please be aware that this will overwrite your current child theme settings.",
					"id" 	=> "parent_setting_import",
					"type" 	=> "parent_setting_import");
}


$avia_elements[] =	array(
    "slug"	=> "upload",
    "name" 	=> "Export Theme Settings File",
    "desc" 	=> "Click the button to generate and download a config file which contains the theme settings. You can use the config file to import the theme settings on another sever.",
    "id" 	=> "theme_settings_export",
    "type" 	=> "theme_settings_export");

$avia_elements[] =	array(
    "slug"		=> "upload",
    "name" 		=> "Import Theme Settings File",
    "desc" 		=> "Upload a theme configuration file here. Note that the configuration file settings will overwrite your current configuration and you can't restore the current configuration afterwards.",
    "id" 		=> "config_file_upload",
    "title" 	=> "Upload Theme Settings File",
    "button" 	=> "Insert Settings File",
    "trigger" 	=> "av_config_file_insert",
    // "fopen_check" 	=> "true",
    "std"	  	=> "",
    "file_extension" => "txt",
    "file_type"		=> "text/plain",
    "type" 		=> "file_upload");
    
    

    

  					
$avia_elements[] =	array(
	"slug"		=> "upload",
	"name" 		=> "Iconfont Manager",
	"desc" 		=> "You can upload additional Iconfont Packages generated with <a href='http://fontello.com/' target='_blank'>Fontello</a> to use them in your Layout Builder.<br/><br/>The 'Default Font' can't be deleted. <br/><br/>Make sure to delete any fonts that you are not using, to keep the loading time for your visitors low",
	"id" 		=> "iconfont_upload",
	"title" 	=> "Upload/Select Fontello Font Zip",
	"button" 	=> "Insert Zip File",
	"trigger" 	=> "av_fontello_zip_insert",
	// "fopen_check" 	=> "true",
	"std"	  	=> "",
	"type" 		=> "file_upload",
	"file_extension" => "zip", //used to check if user can upload this file type
	"file_type"		=> "application/octet-stream, application/zip", //used for javascript gallery to display file types
	);	  
    
    
    

    


$avia_elements[] =	array(
					"slug"	=> "avia",
					"name" 	=> "Frontpage Settings",
					"desc" 	=> "Select which page to display on your Frontpage. If left blank the Blog will be displayed",
					"id" 	=> "frontpage",
					"type" 	=> "select",
					"subtype" => 'page');

$avia_elements[] =	array(
					"slug"	=> "avia",
					"name" 	=> "And where do you want to display the Blog?",
					"desc" 	=> "Select which page to display as your Blog Page. If left blank no blog will be displayed",
					"id" 	=> "blogpage",
					"type" 	=> "select",
					"subtype" => 'page',
					"required" => array('frontpage','{true}')
					);

$avia_elements[] =	array(
					"slug"	=> "avia",
					"name" 	=> "Logo",
					"desc" 	=> "Upload a logo image, or enter the URL to an image if its already uploaded. The themes default logo gets applied if the input field is left blank<br/>Logo Dimension: 340px * 156px (if your logo is larger you might need to modify style.css to align it perfectly)",
					"id" 	=> "logo",
					"type" 	=> "upload",
					"label"	=> "Use Image as logo");

$avia_elements[] =	array(
					"slug"	=> "avia",
					"name" 	=> "Favicon",
					"desc" 	=> "Specify a <a href='http://en.wikipedia.org/wiki/Favicon'>favicon</a> for your site. <br/>Accepted formats: .ico, .png, .gif",
					"id" 	=> "favicon",
					"type" 	=> "upload",
					"label"	=> "Use Image as Favicon");





$avia_elements[] =	array(
					"slug"	=> "avia",
					"name" 	=> "Responsive Layout active?",
					"desc" 	=> "By default the theme adapts to the screen size of the visitor and uses a layout best suited. You can disable this behavior so the theme will only show the default layout without adaptation. <br/><br/>If you choose to display responsive layout that adapts to the screen size, you can choose between 2 maximum width settings",
					"id" 	=> "responsive_layout",
					"type" 	=> "select",
					"std" 	=> "responsive",
					"no_first"=>true,
					"subtype" => array( 'Active - Responsive Layout (Max width: 1030px)' =>'responsive',
										'Active - Responsive Layout Large (Max width: 1210px)' =>'responsive responsive_large',
										'Inactive - Fixed layout'=>'static_layout',
										));


$avia_elements[] =	array(
					"slug"	=> "avia",
					"name" 	=> "Websafe fonts fallback for Windows",
					"desc" 	=> "Older Browsers on Windows dont render custom fonts as smooth as modern ones. If you want to force websafe fonts instead of custom fonts for those browsers activate the setting here (affects older versions of IE, Firefox and Opera)",
					"id" 	=> "websave_windows",
					"type" 	=> "select",
					"std" 	=> "",
					"no_first"=>true,
					"subtype" => array( 'Not activated' =>'',
										'Activated'=>'active',
										));


$avia_elements[] =	array(
					"slug"	=> "avia",
					"name" 	=> "Automated Schema.org HTML Markup",
					"desc" 	=> "The theme adds generic HTML schema markup to your template builder elements to provide additional context for search engines. If you want to add your own specific markup via plugins or custom HTML code, you can deactivate this setting",
					"id" 	=> "markup",
					"type" 	=> "select",
					"std" 	=> "",
					"no_first"=>true,
					"subtype" => array( 'Not activated' =>'inactive',
										'Activated'=>'',
										));



$avia_elements[] =	array(
					"slug"	=> "avia",
					"name" 	=> "Google Analytics Tracking Code",
					"desc" 	=> "Enter your Google analytics tracking Code here. It will automatically be added so google can track your visitors behavior.",
					"id" 	=> "analytics",
					"type" 	=> "textarea"
					);






$avia_elements[] =	array(
					"slug"	=> "styling",
					"name" 	=> "Select a predefined color scheme",
					"desc" 	=> "Choose a predefined color scheme here. You can edit the settings of the scheme below then.",
					"id" 	=> "color_scheme",
					"type" 	=> "link_controller",
					"std" 	=> "Blue",
					"class"	=> "link_controller_list",
					"subtype" => $styles);
					



$avia_elements[] =	array(
					"slug"		=> "customize",
					"name" 		=> "Here you can select a number of different elements and change their default styling",
					"desc" 		=> "If a value is left empty or set to default then it will not be changed from the value defined in your CSS files"."<br/><br/>".
									"<strong>Attention:</strong> This feature is in active <strong>BETA!</strong> We will constantly add new elements to customize and need your help: If you got any suggestions on what to add please <a target='_blank' href='http://www.kriesi.at/support/enfold-feature-requests/'>post them here</a>"."<br/><br/>",
					"id" 		=> "advanced_styling",
					"type" 		=> "styling_wizard",
					"order" 	=> array(__("Tags",'avia_framework'), __("Headings",'avia_framework'), __("Main Menu",'avia_framework'), __("Misc",'avia_framework')),
					"std" 		=> "",
					"class"		=> "",
					"elements" => $advanced);




/*Styling Settings*/
$avia_elements[] =	array(
					"slug"	=> "styling",
					"id" 	=> "default_slideshow_target",
					"type" 	=> "target",
					"std" 	=> "
					<style type='text/css'>

						#boxed .live_bg_wrap{ padding:23px;   border:1px solid #e1e1e1; background-position: top center;}
						.live_bg_small{font-size:10px; color:#999;}
						.live_bg_wrap{ padding: 0; background:#f8f8f8; overflow:hidden; background-position: top center;}
						.live_bg_wrap div{overflow:hidden; position:relative;}
						.live_bg_wrap h3{margin: 0 0 5px 0 ; color:inherit;}
						.live_bg_wrap .main_h3{font-weight:bold; font-size:17px;  }
						.border{border:1px solid; border-bottom:none; padding:13px; width:562px;}
						#boxed .border{  width:514px;}

						.live_header_color {position: relative;width: 100%;left: }
						.bg2{border:1px solid; margin:4px; display:block; float:right; width:220px; padding:5px;}
						.content_p{display:block; float:left; width:250px;}
						.live-socket_color{font-size:11px;}
						.live-footer_color a{text-decoration:none;}
						.live-socket_color a{text-decoration:none;  position:absolute; top:28%; right:13px;}

						#avia_preview .webfont_google_webfont{  font-weight:normal; }
						.webfont_default_font{  font-weight:normal; font-size:13px; line-height:1.7em;}

						div .link_controller_list a{ width:95px; font-size:11px;}
						.avia_half{width: 267px; float:left; height:183px;}
						.avia_half .bg2{float:none; margin-left:0;}
						.avia_half_2{border-left:none; padding-left:14px;}
						#boxed  .avia_half { width: 243px; }
						.live-slideshow_color{text-align:center;}
						.text_small_outside{position:relative; top:-15px; display:block; left: 10px;}
					</style>





					<small class='live_bg_small'>A rough preview of the frontend.</small>

					<div id='avia_preview' class='live_bg_wrap webfont_default_font'>
					<!--<small class='text_small_outside'>Next Event: in 10 hours 5 minutes.</small>-->


						<div class='live-header_color border'>
							<span class='text'>Header Text</span>
							<a class='a_link' href='#'>A link</a>
							<a class='an_activelink' href='#'>A hovered link</a>
							<div class='bg2'>Highlight Background + Border Color</div>
						</div>

						<!--<div class='live-slideshow_color border'>
							<h3 class='webfont_google_webfont main_h3'>Slideshow Area/Page Title Area</h3>
								<p class='slide_p'>Slideshow caption<br/>
									<a class='a_link' href='#'>A link</a>
									<a class='an_activelink' href='#'>A hovered link</a>
								</p>
						</div>-->

						<div class='live-main_color border avia_half'>
							<h3 class='webfont_google_webfont main_h3'>Main Content heading</h3>
								<p class='content_p'>This is default content with a default heading. Font color, headings and link colors can be choosen below. <br/>
									<a class='a_link' href='#'>A link</a>
									<a class='an_activelink' href='#'>A hovered link</a>
								</p>

								<div class='bg2'>Highlight Background + Border Color</div>
						</div>



						<div class='live-alternate_color border avia_half avia_half_2'>
								<h3 class='webfont_google_webfont main_h3'>Alternate Content Area</h3>
								<p>This is content of an alternate content area. Choose font color, headings and link colors below. <br/>
									<a class='a_link' href='#'>A link</a>
									<a class='an_activelink' href='#'>A hovered link</a>
								</p>

								<div class='bg2'>Highlight Background + Border Color</div>
						</div>

						<div class='live-footer_color border'>
							<h3 class='webfont_google_webfont'>Demo heading (Footer)</h3>
							<p>This is text on the footer background</p>
							<a class='a_link' href='#'>Link | Link 2</a>
						</div>

						<div class='live-socket_color border'>Socket Text <a class='a_link' href='#'>Link | Link 2</a></div>
					</div>

					",
					"nodescription" => true
					);





$avia_elements[] = array(	"slug"	=> "styling", "type" => "visual_group_start", "id" => "avia_tab1", "nodescription" => true, 'class'=>'avia_tab_container avia_set');


$avia_elements[] = array(	"slug"	=> "styling", "type" => "visual_group_start", "id" => "avia_tab5", "nodescription" => true, 'class'=>'avia_tab avia_tab2','name'=>'General');


$avia_elements[] =		array(	"name" 	=> "Heading Font",
								"slug"	=> "styling",
								"desc" 	=> "The Font heading utilizes google fonts and allows you to use a wide range of custom fonts for your headings",
					            "id" 	=> "google_webfont",
					            "type" 	=> "select",
					            "no_first" => true,
					            "class" => "av_2columns av_col_1",
					            "onchange" => "avia_add_google_font",
					            "std" 	=> "Open Sans",
					            "subtype" =>  $google_fonts);

$avia_elements[] =	array(	"name" 	=> "Defines the Font for your body text",
							"slug"	=> "styling",
							"desc" 	=> "Choose between web safe fonts (faster rendering) and google webkit fonts (more unqiue)<br/><br/>",
				            "id" 	=> "default_font",
				            "type" 	=> "select",
				            "no_first" => true,
				            "class" => "av_2columns av_col_2",
				            "onchange" => "avia_add_google_font",
				            "std" 	=> "Helvetica-Neue,Helvetica-websave",
				            "subtype" => apply_filters('avf_google_content_font', array(	'Web save fonts'=> array(
				            					'Arial'=>'Arial-websave',
				            					'Georgia'=>'Georgia-websave',
				            					'Verdana'=>'Verdana-websave',
				            					'Helvetica'=>'Helvetica-websave',
				            					'Helvetica Neue'=>'Helvetica-Neue,Helvetica-websave',
				            					'Lucida'=>'"Lucida-Sans",-"Lucida-Grande",-"Lucida-Sans-Unicode-websave"'),
				            					
				            					'Google fonts'=> array(
				            					'Arimo'=>'Arimo',
				            					'Cardo'=>'Cardo',
				            					'Droid Sans'=>'Droid Sans',
				            					'Droid Serif'=>'Droid Serif',
				            					'Kameron'=>'Kameron',
				            					'Maven Pro'=>'Maven Pro',
				            					'Open Sans'=>'Open Sans:400,600',
					            				'Lato'=>'Lato:300,400,700',
				            					'Lora'=>'Lora',

				            					))));

$avia_elements[] = array(	"slug"	=> "styling", "type" => "hr", "id" => "hrxy", "nodescription" => true);

$avia_elements[] =	array(
					"slug"	=> "styling",
					"name" 	=> "Use stretched or boxed layout?",
					"desc" 	=> "The stretched layout expands from the left side of the viewport to the right.",
					"id" 	=> "color-body_style",
					"type" 	=> "select",
					"std" 	=> "stretched",
					"no_first"=>true,
					"class" => "av_2columns av_col_1",
					"target" => array("default_slideshow_target::.avia_control_container::set_id"),
					"subtype" => array('Stretched layout'=>'stretched','Boxed Layout'=>'boxed'));


$avia_elements[] =	array(
					"slug"	=> "styling",
					"name" 	=> "Body Background color",
					"desc" 	=> "Background color for your site<br/><br/>",
					"id" 	=> "color-body_color",
					"type" 	=> "colorpicker",
					"std" 	=> "#eeeeee",
					"class" => "av_2columns av_col_2",
					"required" => array("color-body_style",'boxed'),
					"target" => array("default_slideshow_target::.live_bg_wrap::background-color"),
					);

/*
$avia_elements[] =	array(
					"slug"	=> "styling",
					"name" 	=> "Body Background color",
					"desc" 	=> "Background color for your site<br/><br/>",
					"id" 	=> "color-body_fontcolor",
					"type" 	=> "colorpicker",
					"std" 	=> "#ffffff",
					"class" => "av_2columns av_col_1",
					//"required" => array("color-body_style",'boxed'),
					"target" => array("default_slideshow_target::.text_small_outside::color"),
					);
*/


	$avia_elements[] = array(	"slug"	=> "styling", "type" => "hr", "id" => "hrx", "nodescription" => true);

	$avia_elements[] = array(
						"slug"	=> "styling",
						"id" 	=> "color-body_img",
						"name" 	=> "Background Image",
						"desc" 	=> "The background image of your Body<br/><br/>",
						"type" 	=> "select",
						"subtype" => array('No Background Image'=>'','Upload custom image'=>'custom','----------------------'=>''),
						"std" 	=> "",
						"no_first"=>true,
						"class" => "av_2columns av_col_1 set_blank_on_hide",
						"target" => array("default_slideshow_target::.live_bg_wrap::background-image"),
						"folder" => "images/background-images/",
						"required" => array("color-body_style",'boxed'),
						"folderlabel" => "");


	$avia_elements[] =	array(
						"slug"	=> "styling",
						"name" 	=> "Custom Background Image",
						"desc" 	=> "Upload a BG image for your Body<br/><br/>",
						"id" 	=> "color-body_customimage",
						"type" 	=> "upload",
						"std" 	=> "",
						"class" => "set_blank_on_hide av_2columns av_col_2",
						"label"	=> "Use Image",
						"required" => array("color-body_img",'custom'),
						"target" => array("default_slideshow_target::.live_bg_wrap::background-image"),
						);


	$avia_elements[] =	array(
						"slug"	=> "styling",
						"name" 	=> "Position of the image",
						"desc" 	=> "",
						"id" 	=> "color-body_pos",
						"type" 	=> "select",
						"std" 	=> "top left",
						"no_first"=>true,
						"class" => "av_2columns av_col_1",
						"required" => array("color-body_img",'{true}'),
						"target" => array("default_slideshow_target::.live_bg_wrap::background-position"),
						"subtype" => array('Top Left'=>'top left','Top Center'=>'top center','Top Right'=>'top right', 'Bottom Left'=>'bottom left','Bottom Center'=>'bottom center','Bottom Right'=>'bottom right', 'Center Left '=>'center left','Center Center'=>'center center','Center Right'=>'center right'));

	$avia_elements[] =	array(
						"slug"	=> "styling",
						"name" 	=> "Repeat",
						"desc" 	=> "",
						"id" 	=> "color-body_repeat",
						"type" 	=> "select",
						"std" 	=> "no-repeat",
						"class" => "av_2columns av_col_2",
						"no_first"=>true,
						"required" => array("color-body_img",'{true}'),
						"target" => array("default_slideshow_target::.live_bg_wrap::background-repeat"),
						"subtype" => array('no repeat'=>'no-repeat','Repeat'=>'repeat','Tile Horizontally'=>'repeat-x','Tile Vertically'=>'repeat-y', 'Stretch Fullscreen'=>'fullscreen'));

	$avia_elements[] =	array(
						"slug"	=> "styling",
						"name" 	=> "Attachment",
						"desc" 	=> "",
						"id" 	=> "color-body_attach",
						"type" 	=> "select",
						"std" 	=> "scroll",
						"class" => "av_2columns av_col_1",
						"no_first"=>true,
						"required" => array("color-body_img",'{true}'),
						"target" => array("default_slideshow_target::.live_bg_wrap::background-attachment"),
						"subtype" => array('Scroll'=>'scroll','Fixed'=>'fixed'));


$avia_elements[] = array(	"slug"	=> "styling", "type" => "visual_group_end", "id" => "avia_tab5_end", "nodescription" => true);


//create color sets for #header, Main Content, Secondary Content, Footer, Socket, Slideshow

$colorsets = $avia_config['color_sets'];
$iterator = 1;

foreach($colorsets as $set_key => $set_value)
{
	$iterator ++;

	$avia_elements[] = array(	"slug"	=> "styling", "type" => "visual_group_start", "id" => "avia_tab".$iterator, "nodescription" => true, 'class'=>'avia_tab avia_tab'.$iterator,'name'=>$set_value);

	$avia_elements[] =	array(
					"slug"	=> "styling",
					"name" 	=> "$set_value background color",
					"id" 	=> "colorset-$set_key-bg",
					"type" 	=> "colorpicker",
					"class" => "av_2columns av_col_1",
					"std" 	=> "#ffffff",
					"desc" 	=> "Default Background color",
					"target" => array("default_slideshow_target::.live-$set_key::background-color"),
					);

	$avia_elements[] =	array(
					"slug"	=> "styling",
					"name" 	=> "Alternate Background color",
					"desc" 	=> "Alternate Background for menu hover, tables etc",
					"id" 	=> "colorset-$set_key-bg2",
					"type" 	=> "colorpicker",
					"class" => "av_2columns av_col_2",
					"std" 	=> "#f8f8f8",
					"target" => array("default_slideshow_target::.live-$set_key .bg2::background-color"),
					);

	$avia_elements[] =	array(
					"slug"	=> "styling",
					"name" 	=> "Primary color",
					"desc" 	=> "Font color for links, dropcaps and other elements",
					"id" 	=> "colorset-$set_key-primary",
					"type" 	=> "colorpicker",
					"class" => "av_2columns av_col_1",
					"std" 	=> "#719430",
					"target" => array("default_slideshow_target::.live-$set_key .a_link, .live-$set_key-wrap-top::color,border-color"),
					);


	$avia_elements[] =	array(
					"slug"	=> "styling",
					"name" 	=> "Highlight color",
					"desc" 	=> "Secondary color for link and button hover, etc<br/>",
					"id" 	=> "colorset-$set_key-secondary",
					"type" 	=> "colorpicker",
					"class" => "av_2columns av_col_2",
					"std" 	=> "#8bba34",
					"target" => "default_slideshow_target::.live-$set_key .an_activelink::color",
					);


	$avia_elements[] =	array(
						"slug"	=> "styling",
						"name" 	=> "$set_value font color",
						"id" 	=> "colorset-$set_key-color",
						"type" 	=> "colorpicker",
						"class" => "av_2columns av_col_1",
						"std" 	=> "#666666",
						"target" => array("default_slideshow_target::.live-$set_key::color"),
						);

	$avia_elements[] =	array(
					"slug"	=> "styling",
					"name" 	=> "Border colors ",
					"id" 	=> "colorset-$set_key-border",
					"type" 	=> "colorpicker",
					"class" => "av_2columns av_col_2",
					"std" 	=> "#e1e1e1",
					"target" => array("default_slideshow_target::.live-$set_key.border, .live-$set_key .bg2::border-color"),
					);






	$avia_elements[] = array(	"slug"	=> "styling", "type" => "hr", "id" => "hr".$set_key, "nodescription" => true);

	$avia_elements[] = array(
						"slug"	=> "styling",
						"id" 	=> "colorset-$set_key-img",
						"name" 	=> "Background Image",
						"desc" 	=> "The background image of your $set_value<br/><br/>",
						"type" 	=> "select",
						"subtype" => array('No Background Image'=>'','Upload custom image'=>'custom','----------------------'=>''),
						"std" 	=> "",
						"no_first"=>true,
						"class" => "av_2columns av_col_1",
						"target" => array("default_slideshow_target::.live-$set_key::background-image"),
						"folder" => "images/background-images/",
						"folderlabel" => "");


	$avia_elements[] =	array(
						"slug"	=> "styling",
						"name" 	=> "Custom Background Image",
						"desc" 	=> "Upload a BG image for your $set_value<br/><br/>",
						"id" 	=> "colorset-$set_key-customimage",
						"type" 	=> "upload",
						"std" 	=> "",
						"class" => "set_blank_on_hide av_2columns av_col_2",
						"label"	=> "Use Image",
						"required" => array("colorset-$set_key-img",'custom'),
						"target" => array("default_slideshow_target::.live-$set_key::background-image"),
						);


	$avia_elements[] =	array(
						"slug"	=> "styling",
						"name" 	=> "Position of the image",
						"desc" 	=> "",
						"id" 	=> "colorset-$set_key-pos",
						"type" 	=> "select",
						"std" 	=> "top left",
						"no_first"=>true,
						"class" => "av_2columns av_col_1",
						"required" => array("colorset-$set_key-img",'{true}'),
						"target" => array("default_slideshow_target::.live-$set_key::background-position"),
						"subtype" => array('Top Left'=>'top left','Top Center'=>'top center','Top Right'=>'top right', 'Bottom Left'=>'bottom left','Bottom Center'=>'bottom center','Bottom Right'=>'bottom right', 'Center Left '=>'center left','Center Center'=>'center center','Center Right'=>'center right'));

	$avia_elements[] =	array(
						"slug"	=> "styling",
						"name" 	=> "Repeat",
						"desc" 	=> "",
						"id" 	=> "colorset-$set_key-repeat",
						"type" 	=> "select",
						"std" 	=> "no-repeat",
						"class" => "av_2columns av_col_2",
						"no_first"=>true,
						"required" => array("colorset-$set_key-img",'{true}'),
						"target" => array("default_slideshow_target::.live-$set_key::background-repeat"),
						"subtype" => array('no repeat'=>'no-repeat','Repeat'=>'repeat','Tile Horizontally'=>'repeat-x','Tile Vertically'=>'repeat-y'));

	$avia_elements[] =	array(
						"slug"	=> "styling",
						"name" 	=> "Attachment",
						"desc" 	=> "",
						"id" 	=> "colorset-$set_key-attach",
						"type" 	=> "select",
						"std" 	=> "scroll",
						"class" => "av_2columns av_col_1",
						"no_first"=>true,
						"required" => array("colorset-$set_key-img",'{true}'),
						"target" => array("default_slideshow_target::.live-$set_key::background-attachment"),
						"subtype" => array('Scroll'=>'scroll','Fixed'=>'fixed'));







	$avia_elements[] = array(	"slug"	=> "styling", "type" => "visual_group_end", "id" => "avia_tab_end".$iterator, "nodescription" => true);
}








$avia_elements[] = array(	"slug"	=> "styling", "type" => "visual_group_end", "id" => "avia_tab_container_end", "nodescription" => true);


$avia_elements[] =	array(
					"slug"	=> "styling",
					"name" 	=> "Quick CSS",
					"desc" 	=> "Just want to do some quick CSS changes? Enter them here, they will be applied to the theme. If you need to change major portions of the theme please use the custom.css file.",
					"id" 	=> "quick_css",
					"type" 	=> "textarea"
					);




/*Sidebar*/
$avia_elements[] =	array(
					"slug"	=> "sidebars",
					"name" 	=> "Sidebar on Archive Pages",
					"desc" 	=> "Choose the archive sidebar position here. This setting will be applied to all archive pages",
					"id" 	=> "archive_layout",
					"type" 	=> "select",
					"std" 	=> "sidebar_right",
					"no_first"=>true,
					"subtype" => array( 'left sidebar' =>'sidebar_left',
										'right sidebar'=>'sidebar_right',
										'no sidebar'=>'fullsize'
										));




$avia_elements[] =	array(
					"slug"	=> "sidebars",
					"name" 	=> "Sidebar on Blog Page",
					"desc" 	=> "Choose the blog sidebar position here. This setting will be applied to the blog page",
					"id" 	=> "blog_layout",
					"type" 	=> "select",
					"std" 	=> "sidebar_right",
					"no_first"=>true,
					"subtype" => array( 'left sidebar' =>'sidebar_left',
										'right sidebar'=>'sidebar_right',
										'no sidebar'=>'fullsize'
										));




$avia_elements[] =	array(
					"slug"	=> "sidebars",
					"name" 	=> "Sidebar on Single Post Pages",
					"desc" 	=> "Choose the blog post sidebar position here. This setting will be applied to single blog posts",
					"id" 	=> "single_layout",
					"type" 	=> "select",
					"std" 	=> "sidebar_right",
					"no_first"=>true,
					"subtype" => array( 'left sidebar' =>'sidebar_left',
										'right sidebar'=>'sidebar_right',
										'no sidebar'=>'fullsize'
										));







$avia_elements[] =	array(
					"slug"	=> "sidebars",
					"name" 	=> "Sidebar on Pages",
					"desc" 	=> "Choose the default page layout here. You can change the setting of each individual page when editing that page",
					"id" 	=> "page_layout",
					"type" 	=> "select",
					"std" 	=> "sidebar_right",
					"no_first"=>true,
					"subtype" => array( 'left sidebar' =>'sidebar_left',
										'right sidebar'=>'sidebar_right',
										'no sidebar'=>'fullsize'
										));


$avia_elements[] =	array(
					"slug"	=> "sidebars",
					"name" 	=> "Sidebar on Smartphones",
					"desc" 	=> "Show sidebar on smartphones (Sidebar is displayed then below the actual content)",
					"id" 	=> "smartphones_sidebar",
					"type" 	=> "checkbox",
					"std" 	=> "",
					"no_first"=>true,
					"subtype" => array( 'Hide sidebar on smartphones' 	=>'',
										'Show sidebar on smartphones'	=>'smartphones_sidebar_visible'
										));


$avia_elements[] =	array(
					"slug"	=> "sidebars",
					"name" 	=> "Page Sidebar navigation",
					"desc" 	=> "Display a sidebar navigation for all nested subpages of a page automatically? ",
					"id" 	=> "page_nesting_nav",
					"type" 	=> "checkbox",
					"std" 	=> "true",
					"no_first"=>true,
					"subtype" => array( 'Display sidebar navigation'=>'true',
										'Don\'t display Sidebar navigation' => ""
										));


$avia_elements[] =	array(	"name" => "Create new Sidebar Widget Areas",
							"desc" => "The theme supports the creation of custom widget areas. Simply open your <a target='_blank' href='".admin_url('widgets.php')."'>Widgets Page</a> and add a new Sidebar Area. Afterwards you can choose to display this Widget Area in the Edit Page Screen.",
							"id" => "widgetdescription",
							"std" => "",
							"slug"	=> "sidebars",
							"type" => "heading",
							"nodescription"=>true);



/*Header Layout Settings*/

$iconSpan = "<span class='pr-icons'>
				<img src='".AVIA_IMG_URL."icons/social_facebook.png' alt='' />
				<img src='".AVIA_IMG_URL."icons/social_twitter.png' alt='' />
				<img src='".AVIA_IMG_URL."icons/social_flickr.png' alt='' />
			</span>";
			
$avia_elements[] =	array(
					"slug"	=> "header",
					"id" 	=> "default_header_target",
					"type" 	=> "target",
					"std" 	=> "
					<style type='text/css'>
					
					#avia_options_page #avia_default_header_target{background:#555; border:none; padding:10px 10px; width: 610px;}
					#avia_header_preview{color:#999; border:1px solid #e1e1e1; padding:15px 45px; overflow:hidden; background-color:#fff; position: relative;}
					
					#pr-main-area{line-height:69px; overflow:hidden;}
					#pr-menu{float:right; font-size:12px;}	
					
					#pr-logo{ max-width: 150px; max-height: 70px; float:left;}
					#avia_header_preview.large #pr-logo{ max-width: 250px; max-height: 115px;}
					#avia_header_preview.large #pr-main-area{line-height:115px;}
					
					#search_icon{opacity:0.5; margin-left: 10px; top:3px; position:relative; display:none;}
					#search_icon.header_searchicon{display:inline;}
					#pr-content-area{display:block; clear:both; padding:15px 45px; overflow:hidden; background-color:#fff; text-align:center; border:1px solid #e1e1e1; border-top:none;}
					.logo_right #pr-logo{float:right}
					.logo_center{text-align:center;}
					.logo_center #pr-logo{float:none}
					.menu_left #pr-menu{float:left}
					#avia_options_page .bottom_nav_header#pr-main-area{line-height: 1em;}
					.bottom_nav_header #pr-menu{float:none; clear:both; }
					.bottom_nav_header.logo_right #pr-menu{text-align:right;}
					
					
					#pr-menu-2nd{height: 17px; color:#aaa; border:1px solid #e1e1e1; padding:5px 45px; overflow:hidden; background-color:#f8f8f8; border-bottom:none; display:none; font-size:11px;}
					.extra_header_active #pr-menu-2nd{display:block;}
					.pr-secondary-items{display:none;}
					.secondary_left .pr-secondary-items, .secondary_right .pr-secondary-items{display:block; float:left; margin:0 10px 0 0;}
					.secondary_right .pr-secondary-items{float:right; margin:0  0 0 10px;}
					
					.pr-icons{opacity:0.3; display:none; position:relative; top:1px;}
					.icon_active_left.extra_header_active #pr-menu-2nd .pr-icons{display:block; float:left; margin:0 10px 0 0;}
					.icon_active_right.extra_header_active #pr-menu-2nd .pr-icons{display:block; float:right; margin:0 0 0 10px ;}
					
					.icon_active_main #pr-main-icon{float:right; position:relative; }
					.icon_active_main #pr-main-icon .pr-icons{display:block; top: 3px; margin: 0 0 0 17px;}
					.icon_active_main .logo_right #pr-main-icon {left:-138px;}
					.icon_active_main .large .logo_right #pr-main-icon {left:-55px;}
					.icon_active_main .bottom_nav_header #pr-main-icon{top:30px;}
					.icon_active_main .large .bottom_nav_header #pr-main-icon{top:50px;}
					.icon_active_main .logo_right.bottom_nav_header #pr-main-icon{float:left; left:-17px;}
					.icon_active_main .logo_center.bottom_nav_header #pr-main-icon{float: right; top: 42px; position: absolute; right: 24px;}
					.icon_active_main .logo_center.bottom_nav_header #pr-main-icon .pr-icons{margin:0; top:0px;}
					
					.pr-phone-items{display:none;}
					.phone_active_left  .pr-phone-items{display:block; float:left;}
					.phone_active_right .pr-phone-items{display:block; float:right;}
					
					.header_stretch #avia_header_preview, .header_stretch #pr-menu-2nd{ padding-left: 15px; padding-right: 15px; }
					.header_stretch .icon_active_main .logo_right.menu_left #pr-main-icon {left:-193px;}
					
					.inner-content{color:#999; text-align: justify; }
					
					#pr-breadcrumb{height: 23px; line-height:23px; color:#aaa; border:1px solid #e1e1e1; padding:5px 45px; overflow:hidden; background-color:#f8f8f8; border-top:none; font-size:16px;}
					#pr-breadcrumb .some-breadcrumb{float:right; font-size:11px;}
					#pr-breadcrumb.title_bar .some-breadcrumb, #pr-breadcrumb.hidden_title_bar{ display:none; }
					
					</style>

					<div id='pr-stretch-wrap' >
						<small class='live_bg_small'>A rough layout preview of the header area</small>
						<div id='pr-phone-wrap' >
							<div id='pr-social-wrap' >
								<div id='pr-seconary-menu-wrap' >
									<div id='pr-menu-2nd'>{$iconSpan}<span class='pr-secondary-items'>Login | Signup | etc</span><span class='pr-phone-items'>Phone: 555-4432</span></div>
									<div id='avia_header_preview' >
										<div id='pr-main-area' >
											<img id='pr-logo' src='".AVIA_BASE_URL."images/layout/logo.png' alt=''/>
											<div id='pr-main-icon'>{$iconSpan}</div>
											<div id='pr-menu'>Home | About | Contact <img id='search_icon' src='".AVIA_IMG_URL."icons/search.png' alt='' /></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id='pr-breadcrumb'>Some Title <span class='some-breadcrumb'>Home  &#187; Admin  &#187; Header </span></div>
						<div id='pr-content-area'> Content / Slideshows / etc 
						<div class='inner-content'>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium sem.</div>
						</div>
					</div>
					",
					"nodescription" => true
					);

//START TAB CONTAINER
$avia_elements[] = array(	"slug"	=> "header", "type" => "visual_group_start", "id" => "avia_tab1", "nodescription" => true, 'class'=>'avia_tab_container avia_set');
$avia_elements[] = array(	"slug"	=> "header", "type" => "visual_group_start", "id" => "avia_tab5", "nodescription" => true, 'class'=>'avia_tab avia_tab2','name'=>'Header layout');
// START TAB

$avia_elements[] =	array(
					"slug"	=> "header",
					"name" 	=> "Menu and Logo Position",
					"desc" 	=> "You can choose various different logo and main menu positions here",
					"id" 	=> "header_layout",
					"type" 	=> "select",
					"std" 	=> "",
					"class" => "av_2columns av_col_1",
					"no_first"=>true,
					"target" => array("default_header_target::#pr-main-area::set_class"),
					"subtype" => array( 'Logo left, Menu right'  	=>'logo_left main_nav_header menu_right',
										'Logo right, Menu Left'	 	=>'logo_right main_nav_header menu_left',
										'Logo left, Menu below' 	=>'logo_left bottom_nav_header menu_left',
										'Logo right, Menu below' 	=>'logo_right bottom_nav_header menu_center',
										'Logo center, Menu below' 	=>'logo_center bottom_nav_header menu_right',
										));
										
$avia_elements[] =	array(
					"slug"	=> "header",
					"name" 	=> "Header Size",
					"desc" 	=> "Chose a predefined header size. You can also apply a custom height to the header",
					"id" 	=> "header_size",
					"type" 	=> "select",
					"std" 	=> "",
					"class" => "av_2columns av_col_2",
					"target" => array("default_header_target::#avia_header_preview::set_class"),
					"no_first"=>true,
					"subtype" => array( 'slim'  				=>'slim',
										'large'	 				=>'large',
										'custom pixel value' 	=>'custom',
										));				


$customsize = array();
for ($x=45; $x<=300; $x++){ $customsize[$x.'px'] = $x; }	
								
$avia_elements[] =	array(
					"slug"	=> "header",
					"name" 	=> "Header Custom Height",
					"desc" 	=> "Chose a custom height in pixels (wont be reflected in the preview above, only on your actual page)",
					"id" 	=> "header_custom_size",
					"type" 	=> "select",
					"std" 	=> "150",
					"required" => array('header_size','custom'),
					"no_first"=>true,
					"subtype" => $customsize);											
										
$avia_elements[] =	array(
					"slug"	=> "header",
					"name" 	=> "Header Title and Breadcrumbs",
					"desc" 	=> "Chose if and how you want to display the Title and Breadcrumb of your page. This option can be overwritten when writing/editing a page",
					"id" 	=> "header_title_bar",
					"type" 	=> "select",
					"std" 	=> "title_bar_breadcrumb",
					"target" => array("default_header_target::#pr-breadcrumb::set_class"),
					"no_first"=>true,
					"subtype" => array( 'Display title and breadcrumbs'  =>'title_bar_breadcrumb',
										'Display only title'	 		 =>'title_bar',
										'Hide both' 					 =>'hidden_title_bar',
										));											
										
										
																
// END TAB
$avia_elements[] = array(	"slug"	=> "header", "type" => "visual_group_end", "id" => "avia_tab5_end", "nodescription" => true);
$avia_elements[] = array(	"slug"	=> "header", "type" => "visual_group_start", "id" => "avia_tab5", "nodescription" => true, 'class'=>'avia_tab avia_tab2','name'=>'Header behavior');
// START TAB
										
$avia_elements[] = array(
							"name" 	=> "Sticky Header",
							"desc" 	=> "If checked the header will stick to the top of your site if user scrolls down (ignored on smartphones)",
							"id" 	=> "header_sticky",
							"type" 	=> "checkbox",
							"std"	=> "true",
							"slug"	=> "header");								

$avia_elements[] = array(
							"name" 	=> "Shrinking Header",
							"desc" 	=> "If checked the sticky header will shrink once the user scrolls down (ignored on smartphones + tablets)",
							"id" 	=> "header_shrinking",
							"type" 	=> "checkbox",
							"std"	=> "true",
							"required" => array('header_sticky','header_sticky'),
							"slug"	=> "header");

$avia_elements[] = array(
							"name" 	=> "Let logo and menu position adapt to browser window",
							"desc" 	=> "If checked the elements in your header will always be placed at the browser window edge, instead of matching the content width",
							"id" 	=> "header_stretch",
							"type" 	=> "checkbox",
							"std"	=> "",
							"target" => array("default_header_target::#pr-stretch-wrap::set_class"),
							"slug"	=> "header");

// END TAB
$avia_elements[] = array(	"slug"	=> "header", "type" => "visual_group_end", "id" => "avia_tab5_end", "nodescription" => true);


$avia_elements[] = array(	"slug"	=> "header", "type" => "visual_group_start", "id" => "avia_tab5", "nodescription" => true, 'class'=>'avia_tab avia_tab2','name'=>'Extra Elements');
// START TAB


$avia_elements[] = array(
							"name" 	=> "Append search icon to main menu",
							"desc" 	=> "If enabled a search Icon will be appended to the main menu that allows the users to perform an 'AJAX' Search ",
							"id" 	=> "header_searchicon",
							"type" 	=> "checkbox",
							"std"	=> "true",
							"target" => array("default_header_target::#search_icon::set_class"),
							"slug"	=> "header");	

$avia_elements[] = array(	"slug"	=> "header", "type" => "hr", "id" => "hr_header1", "nodescription" => true);

$avia_elements[] =	array(
					"slug"	=> "header",
					"name" 	=> "Header Social Icons",
					"desc" 	=> "Chose if and where to display social icons",
					"id" 	=> "header_social",
					"type" 	=> "select",
					"std" 	=> "",
					"class" => "av_2columns av_col_1",
					"target" => array("default_header_target::#pr-social-wrap::set_class"),
					"no_first"=>true,
					"subtype" => array( 'No social Icons'  		=>'',
										'Display in top bar at the left'	 =>'icon_active_left extra_header_active',
										'Display in top bar at the right'    =>'icon_active_right extra_header_active',
										'Display in main header area'    	 =>'icon_active_main',
										));	

$avia_elements[] =	array(
					"slug"	=> "header",
					"name" 	=> "Header Secondary Menu",
					"desc" 	=> "Chose if and where to display a secondary menu",
					"id" 	=> "header_secondary_menu",
					"type" 	=> "select",
					"std" 	=> "",
					"class" => "av_2columns av_col_2",
					"target" => array("default_header_target::#pr-seconary-menu-wrap::set_class"),
					"no_first"=>true,
					"subtype" => array( 'No Secondary Menu'  	=>'',
										'Secondary Menu in top bar at the left'	 =>'secondary_left extra_header_active',
										'Secondary Menu in top bar at the right' =>'secondary_right extra_header_active',
										));	

$avia_elements[] =	array(
					"slug"	=> "header",
					"name" 	=> "Header Phone Number/Extra Info",
					"desc" 	=> "Chose if you want to display an additional phone number or some extra info in your header",
					"id" 	=> "header_phone_active",
					"type" 	=> "select",
					"std" 	=> "",
					"class" => "av_2columns av_col_1",
					"target" => array("default_header_target::#pr-phone-wrap::set_class"),
					"no_first"=>true,
					"subtype" => array( 'No Phone Number/Extra Info'  		=>'',
										'Display in top bar at the left'	 =>'phone_active_left extra_header_active',
										'Display in top bar at the right'    =>'phone_active_right extra_header_active',
										));	

$avia_elements[] = array(
						"name" 	=> "Phone Number or small info text",
						"desc" 	=> "Add the text that should be displayed in your header here",
						"id" 	=> "phone",
						"type" 	=> "text",
						"std"	=> "",
						"class" => "av_2columns av_col_2",
						"required" => array('header_phone_active','{contains}phone_active'),
						"slug"	=> "header");
						
						
						


// END TAB
$avia_elements[] = array(	"slug"	=> "header", "type" => "visual_group_end", "id" => "avia_tab5_end", "nodescription" => true);
$avia_elements[] = array(	"slug"	=> "header", "type" => "visual_group_start", "id" => "avia_tab5", "nodescription" => true, 'class'=>'avia_tab avia_tab2','name'=>'Transparency Options');
// START TAB
$avia_elements[] =	array(	"name" => __("What is header transparency",'avia_framework'),
							"desc" => __("When creating/editing a page you can select to have the header be transparent and display the content (usually a fullwidth slideshow or a fullwidth image) beneath. In those cases you will usually need a different Logo and Main Menu color which can be set here.",'avia_framework')."<br/><a class='av-modal-image' href='".get_template_directory_uri()."/images/framework-helper/header_transparency.jpg'>".__('(Show example Screenshot)','avia_framework')."</a>",
							"id" => "transparency_description",
							"std" => "",
							"slug"	=> "header",
							"type" => "heading",
							"nodescription"=>true);
							
							
$avia_elements[] =	array(
					"slug"	=> "header",
					"name" 	=> "Transparency Logo",
					"desc" 	=> "Upload a logo image, or enter the URL to an image if its already uploaded. (Leave empty to use the default logo)",
					"id" 	=> "header_replacement_logo",
					"type" 	=> "upload",
					"label"	=> "Use Image as logo");


$avia_elements[] =	array(
					"slug"	=> "header",
					"name" 	=> "Transparency menu color",
					"desc" 	=> "Menu color for transparent header (Leave empty to use the default color)",
					"id" 	=> "header_replacement_menu",
					"type" 	=> "colorpicker",
					"std" 	=> ""
					);

// END TAB
$avia_elements[] = array(	"slug"	=> "header", "type" => "visual_group_end", "id" => "avia_tab5_end", "nodescription" => true);
$avia_elements[] = array(	"slug"	=> "header", "type" => "visual_group_start", "id" => "avia_tab5", "nodescription" => true, 'class'=>'avia_tab avia_tab2','name'=>'Mobile Menu');
// START TAB
$avia_elements[] =	array(
					"slug"	=> "header",
					"name" 	=> "Header Mobile Menu activation",
					"desc" 	=> "The mobile menu is usually displayed on smarthphone screensize only. If you have a lot of main menu items you might want to activate it for tablet screen size as well so it doesn't overlap the logo on tablets or small screens",
					"id" 	=> "header_mobile_activation",
					"type" 	=> "select",
					"std" 	=> "mobile_menu_phone",
					"no_first"=>true,
					"subtype" => array( 'Activate only for Smartphones (browser width below 768px)' =>'mobile_menu_phone',
										'Activate for Smartphones and Tablets (browser width below 990px)' =>'mobile_menu_tablet',
										));	
										

$avia_elements[] = array(
							"name" 	=> "Hide Mobile Menu Submenu Items",
							"desc" 	=> "By default all menu items of the mobile menu are visible. If you activate this option they will be hidden and a user needs to click on the parent menu item to display the submenus",
							"id" 	=> "header_mobile_behavior",
							"type" 	=> "checkbox",
							"std"	=> "",
							"slug"	=> "header");
							
							

// END TAB
$avia_elements[] = array(	"slug"	=> "header", "type" => "visual_group_end", "id" => "avia_tab5_end", "nodescription" => true);


//END TAB CONTAINER
$avia_elements[] = array(	"slug"	=> "header", "type" => "visual_group_end", "id" => "avia_tab_container_end", "nodescription" => true);

								









$avia_elements[] = array(	"slug"	=> "header", "type" => "visual_group_start", "id" => "avia_socialheader-start", "nodescription" => true, "required" => array('header_social','{contains}icon_active'), "class"=>'group_inside' );

$avia_elements[] =	array(
					"type" 			=> "group",
					"id" 			=> "social_icons",
					"slug"			=> "header",
					"linktext" 		=> "Add another social icon",
					"deletetext" 	=> "Remove icon",
					"blank" 		=> true,
					"nodescription" => true,
					"std"			=> array(
										array('social_icon'=>'twitter', 'social_icon_link'=>'http://twitter.com/kriesi'),
										array('social_icon'=>'dribbble', 'social_icon_link'=>'http://dribbble.com/kriesi'),
										),
					'subelements' 	=> array(

							array(
								"name" 	=> "Social Icon",
								"desc" 	=> "",
								"id" 	=> "social_icon",
								"type" 	=> "select",
								"slug"	=> "sidebar",
								"class" => "av_2columns av_col_1",
								"subtype" => apply_filters('avf_social_icons_options', array(

									'500px' 	=> 'five_100_px',
									'Behance' 	=> 'behance',
									'Dribbble' 	=> 'dribbble',
									'Facebook' 	=> 'facebook',
									'Flickr' 	=> 'flickr',
									'Google Plus' => 'gplus',
									'Instagram'  => 'instagram',
									'LinkedIn' 	=> 'linkedin',
									'Pinterest' 	=> 'pinterest',
									'Skype' 	=> 'skype',
									'Soundcloud'=> 'soundcloud',
									'Tumblr' 	=> 'tumblr',
									'Twitter' 	=> 'twitter',
									'Vimeo' 	=> 'vimeo',
									'Vk' 		=> 'vk',
									'Xing' 		=> 'xing',
									'Youtube'   => 'youtube',
									'Special: RSS (add RSS URL, leave blank if you want to use default WordPress RSS feed)' => 'rss',
									'Special: Email Icon (add your own URL to link to a contact form)' => 'mail',

								))),

							array(
								"name" 	=> "Social Icon URL:",
								"desc" 	=> "",
								"id" 	=> "social_icon_link",
								"type" 	=> "text",
								"slug"	=> "sidebar",
								"class" => "av_2columns av_col_2"),
						        )
						);






$avia_elements[] = array("slug"	=> "header", "type" => "visual_group_end", "id" => "avia_socialheader_end", "nodescription" => true);




/*footer settings*/


$avia_elements[] =	array(
					"slug"	=> "footer",
					"name" 	=> "Default Footer Widgets & Socket Settings",
					"desc" 	=> "Do you want to display the footer widgets & footer socket?",
					"id" 	=> "display_widgets_socket",
					"type" 	=> "select",
					"std" 	=> "all",
					"no_first" => true,
					"subtype" => array(
				                    'Display the footer widgets & socket'=>'all',
				                    'Display only the footer widgets (no socket)'=>'nosocket',
				                    'Display only the socket (no footer widgets)'=>'nofooterwidgets',
				                    'Don\'t display the socket & footer widgets'=>'nofooterarea'
									)
					);




$avia_elements[] =	array(
					"slug"	=> "footer",
					"name" 	=> "Footer Columns",
					"desc" 	=> "How many colmns should be diplayed in your footer",
					"id" 	=> "footer_columns",
					"type" 	=> "select",
					"std" 	=> "4",
					"subtype" => array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'));

$avia_elements[] =	array(
					"slug"	=> "footer",
					"name" 	=> "Copyright",
					"desc" 	=> "Add a custom copyright text at the bottom of your site. eg: <br/><strong>&copy; ".__('Copyright','avia_framework')."  - ".get_bloginfo('name')."</strong>",
					"id" 	=> "copyright",
					"type" 	=> "text",
					"std" 	=> ""

					);



/*blog settings*/



$avia_elements[] =	array(
					"slug"	=> "blog",
					"name" 	=> __("Blog Style", 'avia_framework' ),
					"desc" 	=> __("Choose the default blog layout here.", 'avia_framework' )."<br/><br/>".__("You can either chose a predefined layout or build your own blog layout with the advanced layout editor", 'avia_framework' ),
					"id" 	=> "blog_style",
					"type" 	=> "select",
					"std" 	=> "single-small",
					"no_first"=>true,
					"subtype" => array( 
									__( 'Multi Author Blog (displays Gravatar of the article author beside the entry and feature images above)', 'avia_framework' ) =>'multi-big',
									__( 'Single Author, small preview Pic (no author picture is displayed, feature image is small)', 'avia_framework' ) =>'single-small',
									__( 'Single Author, big preview Pic (no author picture is displayed, feature image is big)', 'avia_framework' ) =>'single-big',
									__( 'Grid Layout', 'avia_framework' ) =>'blog-grid',
									__( 'Use the advance layout editor to build your own blog layout (simply edit the page you have chosen in Enfold->Theme Options as a blog page)', 'avia_framework') =>'custom',
										));



$avia_elements[] = array("slug"	=> "blog", "type" => "visual_group_start", "id" => "avia_share_links_start", "nodescription" => true);	
    
$avia_elements[] =	array(	"name" => "Single Post Options",
							"desc" => "Here you can set options that affect your single blog post layout",
							"id" => "widgetdescription",
							"std" => "",
							"slug"	=> "blog",
							"type" => "heading",
							"nodescription"=>true);

$avia_elements[] =	array(
    "slug"	=> "blog",
    "name" 	=> "Single Post Style",
    "desc" 	=> "Choose the single post style here.",
    "id" 	=> "single_post_style",
    "type" 	=> "select",
    "std" 	=> "single-big",
    "no_first"=>true,
    "subtype" => array( 'Single post with small preview image (featured image)' =>'single-small',
        'Single post with big preview image (featured image)' =>'single-big',
        'Multi Author Blog (displays Gravatar of the article author beside the entry and feature images above)' =>'multi-big'
    ));
    
    

$avia_elements[] =	array(
    "slug"	=> "blog",
    "name" 	=> "Related Entries",
    "desc" 	=> "Choose if and how you want to display your related entries. (Related entries are based on tags. If a post does not have any tags then no related entries will be shown)",
    "id" 	=> "single_post_related_entries",
    "type" 	=> "select",
    "std" 	=> "av-related-style-tooltip",
    "no_first"=>true,
    "subtype" => array( 'Show Thumnails and display post title by tooltip' =>'av-related-style-tooltip',
        				'Show Thumbnail and post title by default' =>'av-related-style-full',
        				'Disable related entries' =>'disabled'
    ));
    
    
    
$avia_elements[] =	array(	"name" => "Blog meta elements",
							"desc" => "You can chose to hide some of the default Blog elements here:",
							"id" => "widgetdescription",
							"std" => "",
							"slug"	=> "blog",
							"type" => "heading",
							"nodescription"=>true);


$avia_elements[] = array(
		"name" 	=> "Blog Post Author",
		"desc" 	=> "Check to display",
		"id" 	=> "blog-meta-author",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"class" => "av_3col av_col_1",
		"slug"	=> "blog");	
		
		
$avia_elements[] = array(
		"name" 	=> "Blog Post Comment Count",
		"desc" 	=> "Check to display",
		"id" 	=> "blog-meta-comments",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"class" => "av_3col av_col_2",
		"slug"	=> "blog");			
		
$avia_elements[] = array(
		"name" 	=> "Blog Post Category",
		"desc" 	=> "Check to display",
		"id" 	=> "blog-meta-category",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"class" => "av_3col av_col_2",
		"slug"	=> "blog");	
		
		

$avia_elements[] = array(
		"name" 	=> "Blog Post Date",
		"desc" 	=> "Check to display",
		"id" 	=> "blog-meta-date",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"class" => "av_3col av_col_1",
		"slug"	=> "blog");	
		
		
$avia_elements[] = array(
		"name" 	=> "Blog Post Allowed HTML Tags",
		"desc" 	=> "Check to display",
		"id" 	=> "blog-meta-html-info",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"class" => "av_3col av_col_2",
		"slug"	=> "blog");	




    

$avia_elements[] = array("slug"	=> "blog", "type" => "visual_group_end", "id" => "avia_share_links_start", "nodescription" => true);	

$avia_elements[] = array("slug"	=> "blog", "type" => "visual_group_start", "id" => "avia_share_links_start", "nodescription" => true);	
    
$avia_elements[] =	array(	"name" => "Share links at the bottom of your blog post",
							"desc" => "The theme allows you to display share links to various social networks at the bottom of your blog posts. Check which links you want to display:",
							"id" => "widgetdescription",
							"std" => "",
							"slug"	=> "blog",
							"type" => "heading",
							"nodescription"=>true);


$avia_elements[] = array(
		"name" 	=> "Facebook link",
		"desc" 	=> "Check to display",
		"id" 	=> "share_facebook",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"class" => "av_3col av_col_1",
		"slug"	=> "blog");	
		
		
$avia_elements[] = array(
		"name" 	=> "Twitter link",
		"desc" 	=> "Check to display",
		"id" 	=> "share_twitter",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"class" => "av_3col av_col_2",
		"slug"	=> "blog");			
		
$avia_elements[] = array(
		"name" 	=> "Pinterest link ",
		"desc" 	=> "Check to display",
		"id" 	=> "share_pinterest",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"class" => "av_3col av_col_2",
		"slug"	=> "blog");	
		
				
		
		
$avia_elements[] = array(
		"name" 	=> "Google Plus link",
		"desc" 	=> "Check to display",
		"id" 	=> "share_gplus",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"class" => "av_3col av_col_1",
		"slug"	=> "blog");	
		
		
$avia_elements[] = array(
		"name" 	=> "Reddit link",
		"desc" 	=> "Check to display",
		"id" 	=> "share_reddit",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"class" => "av_3col av_col_2",
		"slug"	=> "blog");			
		
$avia_elements[] = array(
		"name" 	=> "Linkedin link ",
		"desc" 	=> "Check to display",
		"id" 	=> "share_linkedin",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"class" => "av_3col av_col_2",
		"slug"	=> "blog");				
		

$avia_elements[] = array(
		"name" 	=> "Tumblr link",
		"desc" 	=> "Check to display",
		"id" 	=> "share_tumblr",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"class" => "av_3col av_col_1",
		"slug"	=> "blog");	
		
$avia_elements[] = array(
		"name" 	=> "VK link",
		"desc" 	=> "Check to display",
		"id" 	=> "share_vk",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"class" => "av_3col av_col_2",
		"slug"	=> "blog");	
	
		
$avia_elements[] = array(
		"name" 	=> "Email link ",
		"desc" 	=> "Check to display",
		"id" 	=> "share_mail",
		"type" 	=> "checkbox",
		"std"	=> "true",
		"class" => "av_3col av_col_2",
		"slug"	=> "blog");				
		
		
		
		
		

		
$avia_elements[] = array("slug"	=> "blog", "type" => "visual_group_end", "id" => "avia_share_links_end", "nodescription" => true);	
		
		
		
		
		
		
		
		
		
		
		
		
		
