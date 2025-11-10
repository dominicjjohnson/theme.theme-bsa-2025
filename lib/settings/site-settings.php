<?php

function optionsframework_option_name() {
	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
	// echo $themename;
}


function optionsframework_options() {

	$options[] = array(
		'name' => __('Website Settings', 'options_check'),
		'type' => 'heading');

		$options[] = array(
			'name' => __('Header Settings', 'options_check'),
			'desc' => __('Header image text', 'options_check'),
			'id' => 'theme_header_text',
			'class' => 'mini',
			'type' => 'text');

		$options[] = array(
			'name' => __('Footer Settings', 'options_check'),
			'desc' => __('Footer Copyright text', 'options_check'),
			'id' => 'theme_footer_text',
			'class' => 'mini',
			'type' => 'text');

		$options[] = array(
			'name' => __('Social Settings', 'options_check'),
			'desc' => __('Facebook url (include http://)', 'options_check'),
			'id' => 'theme_social_facebook',
			'class' => 'mini',
			'type' => 'text');
		$options[] = array(
			'desc' => __('Twitter url (include http://)', 'options_check'),
			'id' => 'theme_social_twitter',
			'class' => 'mini',
			'type' => 'text');
		$options[] = array(
			'desc' => __('Pinterest url (include http://)', 'options_check'),
			'id' => 'theme_social_pinterest',
			'class' => 'mini',
			'type' => 'text');
		$options[] = array(
			'name' => __('Hero Settings', 'options_check'),
			'desc' => __('Hero Topbar Title', 'options_check'),
			'id' => 'hero_title',
			'type' => 'textarea');

	$options[] = array(
		'name' => __('Website Settings', 'options_check'),
		'type' => 'heading');

	$options[] = array(
			'name' => __('Site ID', 'options_check'),
			'desc' => __('SiteID', 'options_check'),
			'id' => 'site_id',
			'type' => 'text');
	$options[] = array(
			'name' => __('Dating URL', 'options_check'),
			'desc' => __('The URL e.g. http://yoursubdomain.yoursite.com', 'options_check'),
			'id' => 'dating_url',
			'type' => 'text');
	$options[] = array(
			'name' => __('Join URL', 'options_check'),
			'desc' => __('The URL all login and registration forms should submit to e.g. http://yoursubdomain.yoursite.com', 'options_check'),
			'id' => 'join_url',
			'type' => 'text');
	$options[] = array(
			'name' => __('Country Code', 'options_check'),
			'desc' => __('URL Country code e.g. www', 'options_check'),
			'id' => 'country_code',
			'type' => 'text');
	$options[] = array(
			'name' => __('Analytics', 'options_check'),
			'desc' => __('Header Analytics', 'options_check'),
			'id' => 'header_analytics_code',
			'type' => 'textarea');
	$options[] = array(
			'desc' => __('Body Analytics', 'options_check'),
			'id' => 'body_analytics_code',
			'type' => 'textarea');
		$options[] = array(
			'desc' => __('Footer Analytics', 'options_check'),
			'id' => 'footer_analytics_code',
			'type' => 'textarea');

	$options[] = array(
		'name' => __('Alternate Language Sites', 'options_check'),
		'type' => 'heading');

	$count = 1;
	while($count < 6){
		$count++;
		$options[] = array(
			'name' => __('Alternate Language', 'options_check'),
			'desc' => 'Upload flag image (ideally 32 x 32)',
			'id' => 'alternate_language_site_flag_'.$count,
			'type' => 'upload');


		$options[] = array(
			'desc' => __('Alternate site url '.$count.' (include http://)', 'options_check'),
			'id' => 'alternate_language_site_url_'.$count,
			'type' => 'text');

		$options[] = array(
			'desc' => __('Alternate site text', 'options_check'),
			'id' => 'alternate_language_site_alt_'.$count,
			'type' => 'text');
	}


	return $options;
}

?>