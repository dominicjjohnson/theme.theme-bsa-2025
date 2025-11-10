<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if(!empty($atts['dates']) && $atts['dates'] != 'all'){
	$term_data = get_term_by('id', $atts['dates'], 'date');
	$atts['dates'] = $term_data->slug;
}

if(!empty($atts['locations']) && $atts['locations'] != 'all'){
	$term_data = get_term_by('id', $atts['locations'], 'location');
	$atts['locations'] = $term_data->slug;
}

if(!empty($atts['tracks']) && $atts['tracks'] != 'all'){
	$term_data = get_term_by('id', $atts['tracks'], 'track');
	$atts['tracks'] = $term_data->slug;
}

    // 'speakerlayout' => array(
	   //  'type'  => 'image-picker',
	   //  'value' => 'logos',
	   //  'label' => __('Layout', 'fw'),
	   //  'desc'  => __('Choose the layout you want to display your sponsors', 'fw'),
	   //  'choices' => array(
	   //  	'full' => get_template_directory_uri() .'/framework-customizations/extensions/shortcodes/shortcodes/seminar-list/static/img/shortcode-sem-icon-sp-full.png',
	   //  	'company' => get_template_directory_uri() .'/framework-customizations/extensions/shortcodes/shortcodes/seminar-list/static/img/shortcode-sem-icon-sp-name-company.png',
	   //      'job' => get_template_directory_uri() .'/framework-customizations/extensions/shortcodes/shortcodes/seminar-list/static/img/shortcode-sem-icon-sp-no-logo.png',
	   //      'off' => get_template_directory_uri() .'/framework-customizations/extensions/shortcodes/shortcodes/seminar-list/static/img/shortcode-sem-icon-sp-blank.png',

#prewrap($atts['speakerlayout']);


if($atts['title']) echo '<h3 class="sem-shortcode-title">'.$atts['title'].'</h3>';

echo miramedia_sc_seminarlist($atts);