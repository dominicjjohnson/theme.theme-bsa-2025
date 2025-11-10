<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );

	// 'show'          => 'speakers',
	// 'extra_tax'     => '',
	// 'sessiondesc'   => 'full',
	// 'speakerlayout' => 'full',

	// $seminar_speaker_options = array(
	// 	'full'    => '',
	// 	'job'     => '',
	// 	'company' => '',
	// 	'off'     => '',
	// );

	// $sessiondescriptions = array(
	// 	'full'    => 'Full Content',
	// 	'excerpt' => 'Excerpt',
	// 	'none'    => 'None',
	// );

	// $seminarlist_show_options = array(
	//   'date'     => 'Dates',
	//   'track'    => 'Tracks',
	//   'location' => 'Locations',
	// );


$options = array(
	'title' => array(
	    'type'  => 'text',
	    'value' => 'Agenda',
	    'label' => __('Title', 'fw'),
	    'desc'  => __('Description', 'fw'),
	    'help'  => __('Help tip', 'fw'),
	),
	'sessiondesc' => array(
	    'type'  => 'select',
	    'label' => __('Session Description', 'fw'),
	    'value' => 'excerpt',
	    'help'  => __('How much of the session information would you like to show?', 'fw'),
	    'population' => 'array',
	    'choices' => array(
	    	'full' => 'Full Session Description',
	    	'excerpt' => 'Excerpt with link to read more', 
	    	'none' => 'Only the title'
	    ),
	),
	'dates' => array(
	    'type'  => 'select',
	    'label' => __('Dates', 'fw'),
	    'help'  => __('Select the date you want to show an agenda for', 'fw'),
	    'population' => 'array',
	    'choices' => create_tax_dropdown_options('date', false, 'slug'),
	    'limit' => -1,
	),
	'locations' => array(
	    'type'  => 'select',
	    'value' => 'all',
	    'label' => __('Location', 'fw'),
	    'help'  => __('Select the session ', 'fw'),
	    'population' => 'array',
	    'choices' => create_tax_dropdown_options('location'),
	    'limit' => -1,
	),
	'tracks' => array(
	    'type'  => 'select',
	    'label' => __('Tracks', 'fw'),
	    'value' => 'all',
	    'help'  => __('Select the track you want to show sessions for', 'fw'),
	    'population' => 'array',
	    'choices' => create_tax_dropdown_options('track'),
	    'limit' => -1,
	),
    'speakerlayout' => array(
	    'type'  => 'image-picker',
	    'value' => 'logos',
	    'label' => __('Layout', 'fw'),
	    'desc'  => __('Choose the layout you want to display your sponsors', 'fw'),
	    'choices' => array(
	    	'full' => get_template_directory_uri() .'/framework-customizations/extensions/shortcodes/shortcodes/seminar-list/static/img/shortcode-sem-icon-sp-full.png',
	        'job' => get_template_directory_uri() .'/framework-customizations/extensions/shortcodes/shortcodes/seminar-list/static/img/shortcode-sem-icon-sp-no-logo.png',
	    	'company' => get_template_directory_uri() .'/framework-customizations/extensions/shortcodes/shortcodes/seminar-list/static/img/shortcode-sem-icon-sp-name-company.png',
	        'off' => get_template_directory_uri() .'/framework-customizations/extensions/shortcodes/shortcodes/seminar-list/static/img/shortcode-sem-icon-sp-blank.png',
	    ),
	    'blank' => false, // (optional) if true, images can be deselected
	),
);
