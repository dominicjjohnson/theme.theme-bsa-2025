<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );

require_once( get_template_directory() . '/framework-customizations/extensions/shortcodes/shortcodes/slider/slider-functions.php' );

$options = array(
	'image_ids' => array(
	    'type'  => 'multi-upload',
	    'label' => __('Add list of images to use inside the slider', 'fw'),
	    'images_only' => true,
	),
	'pause_time' => array(
	    'type'  => 'slider',
	    'value' => 5,
	    'properties' => array(
	        'min' => 1,
	        'max' => 20,
	        'sep' => 1,
	    ),
	    'label' => __('Pause Time', 'fw'),
	),
	'height' => array(
		'value' => 'auto',
		'label' => 'Height',
		'type' => 'text',
		'desc' => 'e.g. 300px or auto'
	),
	'stretch_images' => array(
	    'type'  => 'switch',
	    'value' => true,
	    'label' => __('Stretch Images to cover slider', 'fw'),
	    'left-choice' => array(
	        'value' => false,
	        'label' => __('No', 'fw'),
	    ),
	    'right-choice' => array(
	        'value' => true,
	        'label' => __('Yes', 'fw'),
	    ),
	),
	'transition' => array(
	    'type'  => 'select',
	    'value' => 'horizontal',
	    'label' => __('Slide Transition', 'fw'),
	    'choices' => cw_unyson_slider::get_transition_options(),
	),
	'random' => array(
	    'type'  => 'switch',
	    'value' => false,
	    'label' => __('Randomise order', 'fw'),
	    'left-choice' => array(
	        'value' => false,
	        'label' => __('No', 'fw'),
	    ),
	    'right-choice' => array(
	        'value' => true,
	        'label' => __('Yes', 'fw'),
	    ),
	),
	'show_nav' => array(
	    'type'  => 'switch',
	    'value' => true,
	    'label' => __('Show Prev / Next Arrows', 'fw'),
	    'left-choice' => array(
	        'value' => false,
	        'label' => __('No', 'fw'),
	    ),
	    'right-choice' => array(
	        'value' => true,
	        'label' => __('Yes', 'fw'),
	    ),
	),
	'show_pager' => array(
	    'type'  => 'switch',
	    'value' => true,
	    'label' => __('Show Pager', 'fw'),
	    'left-choice' => array(
	        'value' => false,
	        'label' => __('No', 'fw'),
	    ),
	    'right-choice' => array(
	        'value' => true,
	        'label' => __('Yes', 'fw'),
	    ),
	)

);

