<?php 

	register_nav_menus( array(
		'header_nav' => 'Header navigation menu',
		'footer_nav' => 'Footer navigation menu',
	));
	
	register_sidebar(array(
		'name' => 'Default Sidebar',
		'description' => 'This is the area on the right hand side of all pages e.g. speaker profiles, exhibitor profiles.',
		'id' => 'sidebar_area_default',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title'  => '<div class="title"><h2><span>',
		'after_title'   => '</span></h2></div>'
	));

	register_sidebar(array(
		'name' => 'Sidebar Widgets Template 1',
		'id' => 'sidebar_area_1',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title'  => '<div class="title"><h2><span>',
		'after_title'   => '</span></h2></div>'
	));
	register_sidebar(array(
		'name' => 'Sidebar Widgets Template 2',
		'id' => 'sidebar_area_2',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title'  => '<div class="title"><h2><span>',
		'after_title'   => '</span></h2></div>'
	));
	register_sidebar(array(
		'name' => 'Sidebar Widgets Template 3',
		'id' => 'sidebar_area_3',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title'  => '<div class="title"><h2><span>',
		'after_title'   => '</span></h2></div>'
	));

	// Footer

	register_sidebar(array(
		'name' => 'Footer Col 1',
		'id' => 'footer_area_1',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title'  => '<div class="title"><h2><span>',
		'after_title'   => '</span></h2></div>'
	));
	register_sidebar(array(
		'name' => 'Footer Col 2',
		'id' => 'footer_area_2',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title'  => '<div class="title"><h2><span>',
		'after_title'   => '</span></h2></div>'
	));
	register_sidebar(array(
		'name' => 'Footer Col 3',
		'id' => 'footer_area_3',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title'  => '<div class="title"><h2><span>',
		'after_title'   => '</span></h2></div>'
	));


	add_theme_support('post-thumbnails');


function remove_calendar_widget() {
	$widgets = array(
		'WP_Widget_Pages',
		'WP_Widget_Calendar',
		'WP_Widget_Archives',
		'WP_Widget_Links',
		'WP_Widget_Meta',
		'WP_Widget_Search',
		'WP_Widget_Categories',
		'WP_Widget_Recent_Posts',
		'WP_Widget_Recent_Comments',
		'flg_mag_widget',
		'P2P_Widget',
		'ConfWeb_Speakers',
		'WP_Widget_Tag_Cloud',
	);

	foreach($widgets as $widget){
		unregister_widget($widget);
	}
}

add_action( 'widgets_init', 'remove_calendar_widget', 99 );