<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );

$options = array(
	'image' => array(
	    'type'  => 'upload',
	    'label' => __('Select the image to be used', 'fw'),
	    'value' => '',
	    'images_only' => true,
	),
	'title' => array(
		'value' => '',
		'label' => 'Title',
		'type' => 'text',
		'desc' => ''
	),
	'caption' => array(
		'value' => '',
		'label' => 'Caption',
		'type' => 'text',
		'desc' => ''
	),
	'link' => array(
		'value' => '',
		'label' => 'Link',
		'type' => 'text',
		'desc' => ''
	),
	'target' => array(
		'value' => '',
		'label' => 'Link Target',
		'type' => 'select',
		'desc' => '',
		'choices' => array (
			'_self' => __('Default', 'fw'),
			'_blank' => __('New Tab', 'fw'),
		),
	),
	'faicon' => array(
		'value' => 'fa-plus',
		'label' => 'Font Awesome Icon',
		'type' => 'icon',
		'attr' => array( 'class' => 'custom-class', 'data-foo' => 'bar'),
		'desc' => '',
	),
);

