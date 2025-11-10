<?php if (!defined('FW')) {
	die('Forbidden');
}

$options = array(
	'is_fullwidth' => array(
		'label'        => __('Full Width', 'fw'),
		'type'         => 'switch',
	),
	'is_dark' => array(
		'label'        => __('Dark', 'fw'),
		'type'         => 'switch',
	),
	'padding_top' => array(
	    'type'  => 'slider',
	    'value' => 25,
	    'properties' => array(
	        'min' => 0,
	        'max' => 250,
	        'step' => 5,
	    ),
	    'label' => __('Padding Top', 'fw'),
	),
	'padding_bottom' => array(
	    'type'  => 'slider',
	    'value' => 25,
	    'properties' => array(
	        'min' => 0,
	        'max' => 250,
	        'step' => 5,
	    ),
	    'label' => __('Padding Bottom', 'fw'),
	),
	
	'background_color' => array(
		'label' => __('Background Color', 'fw'),
		'desc'  => __('Please select the background color', 'fw'),
		'type'  => 'color-picker',
	),
	'background_image' => array(
		'label'   => __('Background Image', 'fw'),
		'desc'    => __('Please select the background image', 'fw'),
		'type'    => 'background-image',
		'choices' => array(//	in future may will set predefined images
		)
	),
    'background_size' => array(
		'label'   => __('Background Size', 'fw'),
		'desc'    => __('Select the size of this image', 'fw'),
		'value'   => 'cover',
		'type'    => 'select',
		'help'  => sprintf("%s \n\n'\"<br/><br/>\n\n <b>%s</b>",
                __('Auto: The background image doesn\'t scale up or down, it\'s stays the same size as the uploaded file.', 'fw'),
                __('Contain: The background image is resized so that its width or height (the bigger one) fits inside the element. The aspect ratio is preserved.', 'fw'),
                __('Cover: The background image is resized so that either its width or height (the smaller one) covers the whole element. The aspect ratio is preserved.', 'fw')
		),
		'choices' => array(
			'auto' => 'Auto',
			'contain' => 'Contain',
			'cover' => 'Cover',
		)
	),
	'background_repeat' => array(
		'label'   => __('Background Repeat', 'fw'),
		'desc'    => __('Select how this background repeats itself', 'fw'),
		'value'   => 'repeat',
		'type'    => 'select',
		'choices' => array(
			'no-repeat' => 'No Tiling',
			'repeat' => 'Tile',
			'repeat-x' => 'Tile Horizontally Only',
			'repeat-y' => 'Tile Vertically Only'
		)
	),
    'background_position_y' => array(
		'label'   => __('Background Position - Vertical', 'fw'),
		'value'   => 'center', 
		'type'    => 'select',
		'choices' => array(
			'top'    => 'Top',
			'center' => 'Middle',
			'bottom' => 'Bottom',
		)
	),
	'background_position_x' => array(
		'label'   => __('Background Position - Horizontal', 'fw'),
		'value'   => 'center',
		'type'    => 'select',
		'choices' => array(
			'left'   => 'Left',
			'center' => 'Center',
			'right'  => 'Right',
		)
	),
	'video' => array(
		'label' => __('Background Video', 'fw'),
		'desc'  => __('Insert Video URL to embed this video', 'fw'),
		'type'  => 'text',
	)
);
