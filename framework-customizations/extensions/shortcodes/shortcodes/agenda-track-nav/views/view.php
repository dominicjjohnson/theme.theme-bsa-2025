<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

// if(class_exists('RGForms'))
// 	echo RGForms::parse_shortcode($atts);

if($atts['select'] == 'day-2'){

	$page_ids = array(
		array('post_id' => '962'),
		array('post_id' => '1089'),
		array('post_id' => '1097'),
		array('post_id' => '1123')
	);

} elseif($atts['select'] == 'day-3'){

	$page_ids = array(
		array('post_id' => '1162'),
		array('post_id' => '1193'),
		array('post_id' => '1227'),
		array('post_id' => '1257')
	);
	
}


echo '<ul class="navigation-tabs">';
foreach($page_ids as $k => $content){
	
	$class = is_page($content['post_id']) ? 'active' : '';

	if(empty($content['text']))
		$content['text'] = get_the_title($content['post_id']);
	echo '<li><a class="'.$class.'" href="'.get_permalink($content['post_id']) . '">'.$content['text'].'</a></li>';
}
echo '</ul>';