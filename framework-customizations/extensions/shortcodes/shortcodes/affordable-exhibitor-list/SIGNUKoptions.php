<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );
	
/*
$args = array('hide_empty' => false);
$terms = get_terms( 'category', $args );
$types_array = array('all' => 'All Sponsors');
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
	foreach ( $terms as $term ) {
		$types_array[$term->term_id] = $term->name . ' ('.$term->count.')';
	}

	asort($types_array);
}
*/


$options = array(
	'service' => array(
	    'type'  => 'select',
	    'label' => __('Service', 'fw'),
	    'value' => 'all',
	    'help'  => __('Select the service you want to show exhibitors for', 'fw'),
	    'population' => 'array',
	    'choices' => create_tax_dropdown_options('services'),
	    'limit' => -1,
	),
);
