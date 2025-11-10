<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );

//if(!class_exists('RGFormsModel')) return;

// 'src'         => '',
// 'url'         => '',
// 'height'      => '400px',
// 'width'       => '100%',
// 'frameborder' => '0',


$options = array(
	'width' => array(
	    'type'  => 'text',
	    'label' => __('Width', 'fw'),
        'value' => __('100%', 'fw'),
	),
	'height' => array(
	    'type'  => 'text',
	    'label' => __('Height', 'fw'),
        'value'   => __('400px', 'fw'),
	),
	'src' => array(
	    'type'  => 'text',
	    'label' => __('iFrame Src URL', 'fw'),
	    'help'  => __('Select the form you want to place', 'fw'),
	    'population' => 'array',
	    'choices' => $array,
	    'limit' => -1,
	),
	'frameborder' => array(
	    'type'  => 'select',
	    'label' => __('Show Border', 'fw'),
	    'population' => 'array',
	    'source' => '',
	    'choices' => array(
	    	false => 'No',
	    	true => 'Yes'
	    	),
	    'limit' => -1,
	),
);
