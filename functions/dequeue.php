<?php

	function remove_unyson_stylesheets() {

		//wp_dequeue_style('fw-main-css');

		//wp_deregister_style('fw-main-css');

	}

	//add_action('wp_enqueue_scripts', 'remove_unyson_stylesheets', 25);

	// Optimize performance by removing unnecessary WordPress features
	function bsa_optimize_performance() {
		// Remove WordPress emoji support (saves 2 HTTP requests)
		remove_action('wp_head', 'print_emoji_detection_script', 7);
		remove_action('wp_print_styles', 'print_emoji_styles');
		remove_action('admin_print_scripts', 'print_emoji_detection_script');
		remove_action('admin_print_styles', 'print_emoji_styles');
		
		// Remove unnecessary WordPress generator meta tag
		remove_action('wp_head', 'wp_generator');
		
		// Remove WordPress version from scripts and styles
		add_filter('script_loader_src', 'bsa_remove_version_strings');
		add_filter('style_loader_src', 'bsa_remove_version_strings');
	}
	
	function bsa_remove_version_strings($src) {
		if (strpos($src, 'ver=')) {
			$src = remove_query_arg('ver', $src);
		}
		return $src;
	}
	
	add_action('init', 'bsa_optimize_performance');
	
	// Optimize jQuery loading
	function bsa_optimize_jquery() {
		if (!is_admin()) {
			// Move jQuery to footer for better page loading
			wp_scripts()->add_data('jquery', 'group', 1);
			wp_scripts()->add_data('jquery-core', 'group', 1);
			wp_scripts()->add_data('jquery-migrate', 'group', 1);
		}
	}
	add_action('wp_enqueue_scripts', 'bsa_optimize_jquery');
	
	// Add preload hints for critical resources
	function bsa_add_preload_hints() {
		echo '<link rel="preload" href="' . get_template_directory_uri() . '/assets/css/style.css?v2.2" as="style">' . "\n";
		echo '<link rel="preload" href="' . includes_url('js/jquery/jquery.min.js') . '" as="script">' . "\n";
	}
	add_action('wp_head', 'bsa_add_preload_hints', 1);