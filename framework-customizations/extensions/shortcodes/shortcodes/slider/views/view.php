<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
require_once( get_template_directory() . '/framework-customizations/extensions/shortcodes/shortcodes/slider/slider-functions.php' );

$slider_id = rand(1, 10000);

shortcode_atts(
	array(
		'transition' => 'horizontal',
		'pause' => 5,
		'show_nav' => true,
		'show_pager' => true,
	), $atts, 'bartag' );

wp_enqueue_style( 'bxslider' );
wp_enqueue_script( 'bxslider' );

#if(function_exists('prewrap')) prewrap($atts);

$image_ids = array();
if (isset($atts['image_ids']) && is_array($atts['image_ids'])) {
	foreach($atts['image_ids'] as $order => $image){
		$image_ids[] = $image['attachment_id'];
	}
}

if(!empty($atts['random'])) {
	shuffle($image_ids);
	$atts['random'] = 'true';
} else {
	$atts['random'] = 'false';
}

if(!empty($atts['pause_time'])){
	$pause_time = $atts['pause_time'];
} else {
	$pause_time = 5;
}
$pause_time = $pause_time * 1000;

$atts['show_pager'] = !empty($atts['show_pager']) ? 'true' : 'false';
$atts['show_nav'] = !empty($atts['show_nav']) ? 'true' : 'false';


if(!empty($image_ids)) {
	$images = array();
	foreach($image_ids as $id){
		$image = wp_get_attachment_image_src($id, 'full');
		$meta  = wp_get_attachment_metadata( $id );

		if( isset( $meta['media_link'] ) && $link = $meta['media_link'] ) {
			$link = trim( $link );
			if( !preg_match( '/^http/', $link ) ) 
				$link = 'http://' . $link;
			if( filter_var( $link, FILTER_VALIDATE_URL ) !== FALSE ) 
				$href = esc_url( $link );

			// Work out whether the url is external or internal
			$link_components = parse_url($href);
			$site_url_components = parse_url(site_url());
			
			// empty host will indicate url like '/relative.php'
			if($link_components['host'] !== $site_url_components['host']){
				$target = '_blank';
			} else {
				$target = '_self';
			}
		} 


		// If the image needs to be stretched to cover the whole area, it has to be a background image to use the 'background-size: cover' css rule. 
		if($atts['stretch_images']){

			if( isset( $meta['media_link'] ) && $link = $meta['media_link'] ) {
				$images[] = '<a target="'.$target.'" class="unyson-slide" href="' . esc_url( $link ) . '" style="background-image: url('. $image[0] . '); height: '.$atts['height'].'"></a>';
			} else {
				$images[] = '<div class="unyson-slide" style="background-image: url('. $image[0] . '); height: '.$atts['height'].'"></div>';
			}

		} else {
			if( isset( $meta['media_link'] ) && $link = $meta['media_link'] ) {
				$images[] = '<a class="unyson-slide" target="'.$target.'" href="' . esc_url( $link ) . '" style="background-image: url('. $image[0] . '); height: '.$atts['height'].'"><img src="'. $image[0] . '"  /></a>';
			} else {
				$images[] = '<div class="unyson-slide"><img src="'. $image[0] . '"  /></div>';
			}			

		}
	}

	$atts['transition'] = cw_unyson_slider::validate_value('transition', $atts['transition']);

	echo <<<HERE
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('div#unyson-bxslider-{$slider_id}').bxSlider({
			slideSelector: '.unyson-slide',
			pause: {$pause_time}, // time between slides
			pager: {$atts['show_pager']}, // hook up to option
			controls: {$atts['show_nav']}, // hook up to option
			responsive: true,
			auto: true,
			randomStart: {$atts['random']},
			mode: '{$atts['transition']}'
			// random
			// adaptiveHeight: true, # To be hooked up to the 'height' setting, if auto used.
			// captions: true # To be hooked up to the image captions
		});
	});
</script>
HERE;
?>
<div class="unyson-bxslider-wrapper">
	<div id="unyson-bxslider-<?php echo $slider_id; ?>" class="unyson-bxslider">
	<?php echo implode('', $images); ?>
	</div>
</div>
<?php
}