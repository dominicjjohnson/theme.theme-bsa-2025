<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

// echo '<pre>';
// print_r($atts);
// echo '</pre>';
	
	// // Build get_post/WP_Query args
	// $defaults = array(
	// 	'count'            => 'all',
	// 	'type'             => 'static',
	// 	'group'            => 'all',
	// 	'layout'           => 'vertical',
	// 	'content'          => 'avatar,name,job,company',
	// 	'linkto'           => 'bio-conditional',
	// 	'orderby'          => 'lastname',
	// );

if($atts['speakergroup'] != 'all'){
	$group_ob = get_term_by('ID', $atts['speakergroup'], 'speakergroup' );
	// print_r($group_ob);
	$atts['group'] = $group_ob->slug;
}

$content_sorted = array();
if (isset($atts['content']) && is_array($atts['content'])) {
	foreach($atts['content'] as $k => $v){
		$content_sorted[] = $k;
	}
	$atts['content'] = implode(',', $content_sorted);
} else {
	$atts['content'] = '';
}


// echo '<pre>';
// print_r($atts);
// echo '</pre>';

echo miramedia_sc_speakers($atts);