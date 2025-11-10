<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

// 	'count'            => 'all',
// 	'type'             => 'static',
// 	'group'            => 'all',
// 	'layout'           => 'vertical',
// 	'content'          => 'avatar,name,job,company',
// 	'linkto'           => 'bio-conditional',
// 	'orderby'          => 'lastname',
// 	'avatar_selection' => 'grey'

$args = array('hide_empty' => false);
$terms = get_terms( 'speakergroup', $args );
$groups_array = array('all' => 'All Speakers');
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
	foreach ( $terms as $term ) {
		$groups_array[$term->term_id] = $term->name;
	}
	asort($groups_array);
}

$options = array(
	'title' => array(
        'label'   => __('Title', 'fw'),
        'desc'    => __('Title text', 'fw'),
        'type'    => 'text',
        'value'   => __('Speakers!', 'fw')
    ),
    'count' => array(
        'label'   => __('Count', 'fw'),
        'type'    => 'text',
        'value'   => __('3', 'fw')
    ),
	'layout' => array(
	    'type'  => 'image-picker',
	    'value' => 'horizontal',
	    'label' => __('Select Layout', 'fw'),
	    'desc'  => __('Select the layout of your speaker list', 'fw'),
	    'help'  => __('There are three seperate ways of displaying your speakers at your event, click one of the thumbnails to select that layout. ', 'fw'),
	    'choices' => array(
	        'featured' => get_template_directory_uri() . '/framework-customizations/extensions/shortcodes/shortcodes/conference-speakers/static/img/icon-speaker-select-featured.png',
	        'vertical' => get_template_directory_uri() .'/framework-customizations/extensions/shortcodes/shortcodes/conference-speakers/static/img/icon-speaker-select-vertical.png',
	        'horizontal' => get_template_directory_uri() . '/framework-customizations/extensions/shortcodes/shortcodes/conference-speakers/static/img/icon-speaker-select-horizontal.png',
	    ),
	    'blank' => true, // (optional) if true, images can be deselected
	),
	'linkto' => array(
	    'type'  => 'radio',
	    'value' => 'bio',
	    'label' => __('Link To', 'fw'),
	    'help'  => __('Choose where the user is taken when they click on the speakers profile.', 'fw'),
	    'choices' => array(
			'none'            => 'No link',
			'bio'             => 'Biography (always)',
			'bio-conditional' => 'Biography (if available)',
	    ),
	),
	'orderby' => array(
	    'type'  => 'radio',
	    'value' => 'lastname',
	    'label' => __('Order By', 'fw'),
	    'help'  => __('Choose where the user is taken when they click on the speakers profile.', 'fw'),
	    'choices' => array(
			'firstname' => 'First Name',
			'lastname'  => 'Last Name',
			'company'   => 'Company Name',
			'custom'    => 'Custom',
			'random'    => 'Random',
	    ),
	),
	'content' => array(
	    'type'  => 'checkboxes',
	    'value' => array(
	        'avatar' => true,
	        'name' => true,
	        'job' => false,
	        'company' => true,
	        'bio' => false
	    ),
	    'label' => __('Content', 'fw'),
	    'help'  => __('Select the content you want to display for each speaker', 'fw'),
	    'choices' => array(
			'avatar'  => 'Avatar',
			'name'    => 'Name',
			'job'     => 'Job Title',
			'company' => 'Company Name',
			'bio'     => 'Biography',
	    ),
	),
	'speakergroup' => array(
	    'type'  => 'select',
	    'label' => __('Group', 'fw'),
	    'desc'  => __('Select the group of speakers to display in this list.', 'fw'),
	    'population' => 'array',
	    'choices' => $groups_array
	)

);
