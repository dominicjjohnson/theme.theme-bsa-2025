<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );

// Style

$options = array(
	'text' => array(
	    'type'  => 'text',
	    'label' => __('Text', 'fw'),
	),
	'heading_style' => array(
	    'type'  => 'image-picker',
	    'value' => 'image-2',
	    'label' => __('Style', 'fw'),
	    'choices' => array(
	        'heading-style-1' => get_template_directory_uri() .'/assets/img/heading-style-1-preview.png',
	        'heading-style-2' => get_template_directory_uri() .'/assets/img/heading-style-2-preview.png',
	    ),
	)
);
