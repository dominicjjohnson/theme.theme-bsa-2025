<?php if (!defined('FW')) die('Forbidden');
$style_array = array();
$extra_classes = '';
$bg_color = '';

// if(function_exists('prewrap')) prewrap($atts);

if (!empty($atts['background_color'])) {
	$style_array[] = 'background-color:' . $atts['background_color'] . ';';
}

if (!empty($atts['padding_top'])) $style_array[] = 'padding-top: ' . $atts['padding_top'] . 'px;';
if (!empty($atts['padding_bottom'])) $style_array[] = 'padding-bottom: ' . $atts['padding_bottom'] . 'px;';

if (!empty($atts['background_image']['data']['icon'])) {
	$style_array[] = 'background-image:url(' . $atts['background_image']['data']['icon'] . ');';

	if (!empty($atts['background_size'])) {
		$style_array[] = 'background-size: ' . $atts['background_size'] . ';';
	}

	if (!empty($atts['background_repeat'])) {
		$style_array[] = 'background-repeat: ' . $atts['background_repeat'] . ';';
	}

	$style_array[] = 'background-position: ' . $atts['background_position_x'] . ' ' . $atts['background_position_y'] . ';';
}

$bg_video_data_attr    = '';
$section_extra_classes = '';
if ( ! empty( $atts['video'] ) ) {
	$filetype           = wp_check_filetype( $atts['video'] );
	$filetypes          = array( 'mp4' => 'mp4', 'ogv' => 'ogg', 'webm' => 'webm', 'jpg' => 'poster' );
	$filetype           = array_key_exists( (string) $filetype['ext'], $filetypes ) ? $filetypes[ $filetype['ext'] ] : 'video';
	$data_name_attr = version_compare( fw_ext('shortcodes')->manifest->get_version(), '1.3.9', '>=' ) ? 'data-background-options' : 'data-wallpaper-options';
	$bg_video_data_attr = $data_name_attr.'="' . fw_htmlspecialchars( json_encode( array( 'source' => array( $filetype => $atts['video'] ) ) ) ) . '"';
	$section_extra_classes .= ' background-video';
}

$container_class = (isset($atts['is_fullwidth']) && $atts['is_fullwidth']) ? 'fw-container-fluid' : 'fw-container';
$extra_classes  .= (isset($atts['is_dark']) && $atts['is_dark']) ? ' fw-container-dark-section' : ' fw-container-light-section';

$extra_styles = implode(' ', $style_array);

?>
<section class="fw-main-row <?php echo $extra_classes ?> <?php echo esc_attr($section_extra_classes) ?>" style="<?php echo $extra_styles; ?>" <?php echo $bg_video_data_attr; ?>>
	<div class="<?php echo $container_class; ?>">
		<?php echo do_shortcode($content); ?>
	</div>
</section>