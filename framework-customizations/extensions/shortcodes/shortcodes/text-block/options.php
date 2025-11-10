<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'text' => array(
		'type'   => 'wp-editor',
		'teeny'  => false, // this controls the options available on the wysiwyg
		'reinit' => true,
		'label'  => __( 'Content', 'fw' ),
		'desc'   => __( 'Enter some content for this texblock!', 'fw' ),
	)
);
