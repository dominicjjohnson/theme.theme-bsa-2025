<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );


$options = array(
	'title' => array(
        'label'   => __('Title', 'fw'),
        'type'    => 'text',
        'value'   => __('Sponsors', 'fw')
    ),
    'count' => array(
        'label'   => __('Count', 'fw'),
        'type'    => 'text',
        'value'   => __('20', 'fw')
    ),
    'show_pager' => array(
		'type'  => 'checkbox',
		'value' => true, // checked/unchecked
		'label' => __('Show Pager', 'fw'),
		'desc'  => __('Show the option to jump to the next page of blog posts', 'fw'),
		'text'  => __('Yes', 'fw'),
	)

);
