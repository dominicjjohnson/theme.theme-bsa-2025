<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	$options[] = array(
		'name' => __('Basic Settings', 'options_check'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Disqus Shortname', 'options_check'),
		'desc' => __('This is given when creating or editing a disqus account.', 'options_check'),
		'id' => 'disqus_account',
		'type' => 'text');

	$options[] = array(
		'name' => __('Google Analytics', 'options_check'),
		'desc' => __('Please enter your Google Analytics tracking code here - it will be automatically installed on the site.', 'options_check'),
		'id' => 'analytics_code',
		'type' => 'textarea');

	return $options;
}