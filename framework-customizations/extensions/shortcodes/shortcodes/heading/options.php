<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );

// Style

$options = array(
	'text' => array(
	    'type'  => 'text',
	    'label' => __('Text', 'fw'),
	),
	'align' => array(
	    'type'  => 'select',
	    'value' => 'center',
	    'label' => __('Text Align', 'fw'),
	    'choices' => array(
	        'left'     => __('Left', 'fw'),
	        'center'   => __('Center', 'fw'),
	        'right' => __('Right', 'fw'),
	    ),
	),
	'font-family' => array(
	    'type'  => 'select',
	    'value' => 'Helvetica',
	    'label' => __('Font Family', 'fw'),
	    'choices' => array(
	        'Arial'     => __('Arial', 'fw'),
	        'Helvetica' => __('Helvetica', 'fw'),
	        'Verdana'   => __('Verdana', 'fw'),
	        'Open Sans' => __('Open Sans', 'fw'),
	    ),
	),
	'font-size' => array(
	    'type'  => 'text',
	    'value' => '18',
	    'label' => __('Font Size', 'fw'),
	    'desc' => 'px'
	),
	'font-weight' => array(
	    'type'  => 'select',
	    'value' => 'Helvetica',
	    'value' => '400',
	    'label' => __('Font Weight', 'fw'),
	    'choices' => array(
	        '300' => __('Light/Thin', 'fw'),
	        '400' => __('Regular', 'fw'),
	        '800' => __('Bold', 'fw'),
	    ),
	),
	'color' => array(
	    'type'  => 'color-picker',
	    'value' => '#333',
	    'label' => __('Text Color', 'fw'),
	),
	'background-color' => array(
	    'type'  => 'color-picker',
	    'value' => '',
	    'label' => __('Background Color', 'fw'),
	),
	'padding' => array(
	    'type'  => 'text',
	    'value' => '0px',
	    'label' => __('Padding', 'fw'),
	),
	'margin' => array(
	    'type'  => 'text',
	    'value' => '0px 0px 15px',
	    'label' => __('Margin', 'fw'),
	),
);
