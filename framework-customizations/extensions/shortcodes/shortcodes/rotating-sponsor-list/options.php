<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );

$args = array('hide_empty' => false);
$terms = get_terms( 'sponsortype', $args );
$types_array = array('all' => 'All Sponsors');
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
	foreach ( $terms as $term ) {
		$types_array[$term->term_id] = $term->name . ' ('.$term->count.')';
	}

	asort($types_array);
}

#prewrap($types_array);


$options = array(
	'title' => array(
        'label'   => __('Title', 'fw'),
        'type'    => 'text',
        'value'   => __('Sponsors', 'fw')
    ),
    'orderby' => array(
	    'type'  => 'select',
	    'label' => __('Order By: ', 'fw'),
	    'population' => 'array',
	    'source' => '',
	   	'choices' => array(
	   		'company'   => 'Company Name',
			'custom'    => 'Custom',
			'rand'      => 'Random'
	   	),
	   	'value' => 'company',
    ),
	'sponsortype' => array(
	    'type'  => 'select',
	    'label' => __('Group', 'fw'),
	    'desc'  => __('Select the sponsor group used for this list.', 'fw'),
	    'population' => 'array',
	    'source' => '',
	   	'choices' => $types_array,
	    'help'  => __('Help tip', 'fw'),
	),
	'logo_size' => array(
	    'type'  => 'select',
	    'label' => __('Logo Size', 'fw'),
	    'population' => 'array',
	    'source' => '',
	   	'choices' => array(
	   		'tiny' => 'Tiny',
	   		'small' => 'Small',
	   		'medium' => 'Medium',
	   		'large' => 'Large',
	   		'giant' => 'Giant',

	   	),
	   	'value' => 'medium',
	)
);
