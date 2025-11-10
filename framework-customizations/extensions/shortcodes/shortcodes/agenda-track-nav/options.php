<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'select'  => array(
		'label'   => __( 'Option', 'fw' ),
		'desc'    => __( '', 'fw' ),
		'type'    => 'select',
		'choices' => array(
			'day-2' => __('Day 2', 'fw'),
			'day-3' => __( 'Day 3', 'fw' )
		)
	),
);