<?php
/**
 * The front page file.
 *
 * @package alexandria
 */

get_header(); ?>

	<?php 
		
		if( !of_get_option('homepage_layout') || of_get_option('homepage_layout') == 'bone' ) {
			get_template_part( 'index', 'bone' ); 
		}elseif( of_get_option('homepage_layout') == 'btwo' ) {
			get_template_part( 'index', 'btwo' ); 
		}else{	
			if( 'page' == get_option( 'show_on_front' ) ){	
				get_template_part('index', 'page');
			}else {
				get_template_part('index', 'standard');
			}
		}
		
	?>

<?php get_footer(); ?>