<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );

// 'sponsortype' => 'all',
// 'layout'      => 'logos',
// 'orderby'     => 'company',


// 'full'  => 'Show all sponsor details',
// 'excerpt'  => 'Limit the sponsor bio',
// 'logos' => 'Logos Only',

// 'company'   => 'Company Name',
// 'custom'    => 'Custom',

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
    'per_page' => array(
        'label'   => __('Count', 'fw'),
        'type'    => 'text',
        'desc'    => 'Enter the number of sponsors to show in this section. Set to -1 or leave blank to show all',
        'value'   => __(null, 'fw')
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
    'layout' => array(
	    'type'  => 'image-picker',
	    'value' => 'logos',
	    'label' => __('Layout', 'fw'),
	    'desc'  => __('Choose the layout you want to display your sponsors', 'fw'),
	    'choices' => array(
	        'full' => get_template_directory_uri() .'/framework-customizations/extensions/shortcodes/shortcodes/sponsor-list/static/img/icon-sponsor-select-full.png',
	        'excerpt' => get_template_directory_uri() .'/framework-customizations/extensions/shortcodes/shortcodes/sponsor-list/static/img/icon-sponsor-select-excerpt.png',
	        'logos' => get_template_directory_uri() .'/framework-customizations/extensions/shortcodes/shortcodes/sponsor-list/static/img/icon-sponsor-select-logos.png',
	    ),
	    'blank' => false, // (optional) if true, images can be deselected
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
