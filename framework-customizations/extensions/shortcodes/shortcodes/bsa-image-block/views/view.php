<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/*
	This function can be found in functions.php
function btd_imageblock_shortcode_function($atts, $content = null){


	extract(shortcode_atts(array(
		'image' => '',
// 		'title' => '',
		'faicon' => '',
		'caption' => '',
		'link' => '',
		'target' => null,
	), $atts)); 

	$return = "";

	$return .=  '<div class="block">';


	$return .=  '<div class="block-content">';	

	if(!empty($title)) {
		
		$return .= '<div class="block-title"><p>'.$atts['title'].'</p></div>';
	
	} else {
		
		$return .= '';
		
	}

	if(isset($target)) {
		
		$return .=  '<a href="'.$atts['link'].'" target="'.$atts['target'].'" title="'.$atts['caption'].'">';

	} else {

		$return .=  '<a href="'.$atts['link'].'" title="'.$atts['caption'].'">';

	}

	$return .= '<img src="http:'.$atts['image']['url'].'" alt="'.$atts['caption'].'"/>';

	$return .= '</a>';
	
	if(!empty($caption)) {
		
		if(!empty($faicon)) {
			
			$return .= '<div class="block-description"><i class="' . $faicon .'"></i><p class="icon_text">'.$atts['caption'].'</p></div>';
				
		} else {
		
			$return .= '<div class="block-description"><p>'.$atts['caption'].'</p></div>';
		
		}
			
	} else {
		
		$return .= '';
		
	}

	$return .= '</div>';

	$return .= '</div>'; 


	return $return;

}
*/

echo btd_imageblock_shortcode_function($atts);