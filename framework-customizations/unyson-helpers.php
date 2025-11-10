<?php

function create_tax_dropdown_options($tax_name, $show_all = true, $orderby = 'name'){
	$terms = get_terms($tax_name, array('hide_empty' => false, 'orderby' => $orderby, 'order' => 'asc' ));
	$options_array = array();
	
	foreach($terms as $term){
		$options_array[$term->term_id] = $term->name;
	}

	// Add a 'Show All' option as the initial choice
	if($show_all) $options_array['all'] = 'All';

	return $options_array;
}

/*
wp_register_style('bsa-image-block', get_template_directory() . '/framework-customizations/static/css/image-block.css', array('fw') );
wp_enqueue_style('bsa-image-block');
*/