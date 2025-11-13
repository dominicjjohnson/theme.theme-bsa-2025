<?php

// enqueue scripts and styles

function flg_scripts() {

	global $wp_styles;

	$assetsuri = get_stylesheet_directory_uri() . '/assets';

 	/* register styles */
 	wp_register_style( 'flg-setup', $assetsuri . '/css/setup.css', '', null);
 	wp_register_style( 'flg-font-awesome', $assetsuri . '/css/font-awesome.css', '', null);
 	wp_register_style( 'flg-font', $assetsuri . '/css/font.css', '', null);
 	wp_register_style( 'flg-header', $assetsuri . '/css/header.css', '', time());
 	wp_register_style( 'flg-footer', $assetsuri . '/css/footer.css', '', null);
 	wp_register_style( 'flg-style', $assetsuri . '/css/style.css', '', time());
  	// IE9 fallback CSS removed - no longer needed in 2025
  	wp_register_style( 'flg-bxslider', $assetsuri . '/css/jquery.bxslider.css', array('jquery'));
  	wp_register_style( 'flg-slick', $assetsuri . '/css/slick.css');
  	wp_register_style( 'flg-slicktheme', $assetsuri . '/css/slick-theme.css');
  	wp_register_style( 'flg-owl', $assetsuri . '/css/owl.carousel.css');
  	wp_register_style( 'flg-image-block', $assetsuri . '/css/image-block.css');

  	// register scripts */
  	wp_register_script('flg-modernizr', $assetsuri . '/vendor/js/modernizr.all.js');
  	wp_register_script('flg-scrolltofixed', $assetsuri . '/js/jquery-scrolltofixed-min.js', array('jquery'));
  	wp_register_script('flg-bxslider', $assetsuri . '/js/jquery.bxslider.min.js', array('jquery'));
  	wp_register_script('flg-slick', $assetsuri . '/js/slick.min.js', array('jquery'));
  	wp_register_script('flg-owl', $assetsuri . '/js/owl.carousel.min.js', array('jquery'));
  	wp_register_script('flg-cycle', $assetsuri . '/js/jquery.cycle.js', array('jquery'));
  	wp_register_script('flg-nav', $assetsuri . '/js/nav.js', array('jquery'), null, true);
  	wp_register_script('flg-common', $assetsuri . '/js/jquery.common.js', array('jquery'), null, true);
  	wp_register_script('flg-marquee', $assetsuri . '/js/jquery.marquee.min.js', array('jquery'), null, true);

  	wp_register_script('datatables-js', 'https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js', array('jquery'));
  	wp_register_style('datatables-css', 'https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css');
  	
  	

  	/* enqueue styles */
  	wp_enqueue_style( 'flg-setup' );
  	wp_enqueue_style( 'flg-font-awesome' );
  	wp_enqueue_style( 'flg-font' );
  	wp_enqueue_style( 'flg-header' );
  	wp_enqueue_style( 'flg-footer' );
  	wp_enqueue_style( 'flg-style' );
  	wp_enqueue_style( 'flg-style--nomq' );
  	$wp_styles->add_data( 'flg-style--nomq', 'conditional', 'lt IE 9' );
  	// DataTables and slider styles only loaded when needed
  	if (is_page('exhibitors') || is_page('speakers') || is_page('seminars')) {
  		wp_enqueue_style( 'datatables-css' );
  	}
    wp_enqueue_style( 'flg-bxslider' );
    wp_enqueue_style( 'flg-slick' );
    wp_enqueue_style( 'flg-slicktheme' );
    wp_enqueue_style( 'flg-owl' );
  	wp_enqueue_style( 'flg-image-block' );

  	wp_enqueue_script( 'flg-modernizr' );
  	wp_enqueue_script( 'flg-scrolltofixed' );

    wp_enqueue_script( 'flg-bxslider' );
    wp_enqueue_script( 'flg-slick' );
    wp_enqueue_script( 'flg-owl' );
    wp_enqueue_script( 'flg-common' );
    wp_enqueue_script( 'flg-nav' );
    wp_enqueue_script( 'datatables-js' );
    
    
  	wp_enqueue_script( 'flg-common' );
  	wp_enqueue_script( 'flg-nav' );
  	// DataTables only loaded when needed
  	if (is_page('exhibitors') || is_page('speakers') || is_page('seminars')) {
  		wp_enqueue_script( 'datatables-js' );
  	}

  /* enqueue styles */


}

add_action( 'wp_enqueue_scripts', 'flg_scripts' ); 

function pyramid_framework_theme_admin_scripts() {
	wp_enqueue_style( 'admin-theme-css', get_template_directory_uri() . '/assets/css/custom-admin.css' );
  wp_register_script('flg-admin-extranet-common', get_template_directory_uri() . '/assets/js/jquery.admin-extranet-common.js', array('jquery'));
  wp_enqueue_script('flg-admin-extranet-common');
}

add_action( 'admin_enqueue_scripts', 'pyramid_framework_theme_admin_scripts' );
