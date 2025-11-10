<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

// if(class_exists('RGForms'))
// 	echo RGForms::parse_shortcode($atts);

echo do_shortcode('[gravityform id="'.$atts['form_id'].'" name="" title="'.$atts['display_title'].'" ajax="true"]');