<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$args = array('hide_empty' => false);
$terms = get_terms( 'sponsortype', $args );
$types_array = array('all' => 'All Sponsors');
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
	foreach ( $terms as $term ) {
		$types_array[$term->term_id] = $term->name;
	}

	asort($types_array);
}


$options = array(
	'sponsortype' => array(
	    'type'  => 'select',
	    'label' => __('Group', 'fw'),
	    'desc'  => __('Select the sponsor group used for this list.', 'fw'),
	    'population' => 'array',
	    'source' => '',
	   	'choices' => $types_array,
	    'help'  => __('Help tip', 'fw'),
	),
);
