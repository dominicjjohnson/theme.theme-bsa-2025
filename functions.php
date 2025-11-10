<?php
//PHP8 Ready
	require_once('functions/wrapper.php');
	//require_once('functions/theme_options.php');
	require_once('functions/dequeue.php');
	require_once('functions/widgets.php');
	require_once('functions/ticker/ticker-options.php');
	require_once('functions/ticker/ticker-scripts-styles.php');
	require_once('functions/enqueue.php');
	require_once('functions/theme.php');
	require_once('functions/class.seminars.php');
	require_once('framework-customizations/unyson-helpers.php');
	require_once('crypt.php');
	require_once('link-shortcodes.php');
//	require_once('functions/ical-rewrites.php');  PHP8

	// deregister framework js file
	// wp_deregister_script('fw');
	// wp_register_script('fw', get_stylesheet_directory_uri() . '/framework-customizations/static/js/fw.js');

	// Replaces the excerpt "more" text by a link
	function new_excerpt_more($more) {
		global $post;
		return '...<br  /><a class="moretag" href="'. get_permalink($post->ID) . '">Read more</a>';
	}
	add_filter('excerpt_more', 'new_excerpt_more');

	add_filter( 'excerpt_length', 'new_excerpt_length' );
	function new_excerpt_length($length) {
		return 60;
	}


function filter_miracx_extensions($locations) { 
	$locations[get_template_directory() . 'framework-customizations/extensions'] = get_template_directory() . 'framework-customizations/extensions';	
	return $locations; 
}
add_filter('fw_extensions_locations', 'filter_miracx_extensions', 12);


add_image_size('partner_logo', 300, 200, false );
add_image_size('small_thumbnail', 50, 50, true );

/*
function unregister_taxonomy(){
    // register_taxonomy('category', array());
    register_taxonomy('post_tag', array());
}
add_action('init', 'unregister_taxonomy');
*/


/* 
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * This code allows the theme to work without errors if the Options Framework plugin has been disabled.
 */

if ( !function_exists( 'of_get_option' ) ) {
function of_get_option($name, $default = false) {
	
	$optionsframework_settings = get_option('optionsframework');
	
	// Gets the unique option id
	$option_name = $optionsframework_settings['id'];
	
	if ( get_option($option_name) ) {
		$options = get_option($option_name);
	}
		
	if ( isset($options[$name]) ) {
		return $options[$name];
	} else {
		return $default;
	}
}
}
 
add_filter( 'rwmb_meta_boxes', 'adjust_exhibitor_categories_register_meta_boxes' );
function adjust_exhibitor_categories_register_meta_boxes( $meta_boxes ){

	$meta_boxes[] = array(
		'title' => 'Exhibitor List Categories',
		'pages' => array( 'exhibitors' ),
		'context' => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'exclude' => array(
			'user_role' => array( 'administrator')
		),
		'fields' => array(
			array(
				'name'    => 'Categories',
				'id'      => 'category_selection',
				'type'    => 'taxonomy',
				'desc'    => 'Select the categories you wish your exhibitor profile to be included in on the website. This is limited to 10',
				'class'   => 'extranet_category_selection',
				'options' => array(
					'taxonomy' => 'category',
					'type' => 'checkbox_tree',
					'args' => array()
				),
			),
		)
	);

	$meta_boxes[] = array(
		'title' => 'Enhanced Exhibitor',
		'pages' => array( 'exhibitors' ),
		'context' => 'side',
		'priority' => 'high',
		'autosave' => true,
		'exclude' => array(
			'user_role' => array( 'extranet_member')
		),
		'fields' => array(

			array(
				'name'    => 'Enhanced Exhibitor',
				'id'      => 'enhanced_exhibitor',
				'type'    => 'checkbox',
				'desc'    => 'Display all the exhibitor fields on their profile',
			),
		)
	);

	return $meta_boxes;
}


function exhibitor_is_enhanced($exhibitor_id){
	$enhanced_status = get_post_meta($exhibitor_id, 'enhanced_exhibitor', true);

	if(!empty($enhanced_status)){
		return true;
	} else {
		return false;
	}
}

function my_login_logo() { ?>
    <style type="text/css">

        #login h1 a{
			background: url('<?php echo get_stylesheet_directory_uri() ?>/assets/img/bsa_details.png') no-repeat;
			width: 310px;
			height: 120px;
			background-size: contain;
			background-position: center;
        }

        .login #backtoblog a,
        .login #backtoblog a:link,
        .login #backtoblog a:visited,
        .login #backtoblog a:active{
          background: #5A5B5D;
          color: #fff;
          width: 96%;
          padding: 16px 2%;
          position: absolute;
          top: 0px;
          left: 0px;
          margin: 0px;
          text-shadow: none;
          color: #fff !important;
          font-weight: bold;
          text-decoration: none;
          border-bottom: none;
        }
        .login #backtoblog a:hover{
          text-decoration: underline;
          background: #fcc95f; 
        }

        .login #nav{
          padding: 0px;
          text-align: right; 
        }

        .login #nav a{
          font-weight: bold;
          color: #0096CF;
          font-size: 14px;
        }

    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


//hook into the init action and call create_book_taxonomies when it fires
//TJW is this required? why is function commented out ?add_action( 'init', 'create_topics_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts

// function create_topics_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

/*
  $labels = array(
    'name' => _x( 'Services', 'taxonomy general name' ),
    'singular_name' => _x( 'Services', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Services' ),
    'all_items' => __( 'All Services' ),
    'parent_item' => __( 'Parent Services' ),
    'parent_item_colon' => __( 'Parent Service:' ),
    'edit_item' => __( 'Edit Service' ), 
    'update_item' => __( 'Update Service' ),
    'add_new_item' => __( 'Add New Sercice' ),
    'new_item_name' => __( 'New Service Name' ),
    'menu_name' => __( 'Services' ),
  );
*/ 	

// Now register the taxonomy

/*
  register_taxonomy('services',array('exhibitors'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'services' ),
  ));

}
*/


function btd_imageblock_shortcode_function($atts, $content = null){


	extract(shortcode_atts(array(
		'image' => '',
 		'title' => '',
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


add_shortcode( 'conference_iframes', 'miramedia_sc_iframes' );
function miramedia_sc_iframes( $atts, $content=''){

	$defaults = array(
		'src'         => '',
		'url'         => '',
		'height'      => '400px',
		'width'       => '100%',
		'frameborder' => '0',
	);

	$atts = shortcode_atts( $defaults, $atts );
	extract( $atts );

	$src         = esc_attr( $src );
	$url         = esc_attr( $url );
	$height      = esc_attr( $height );
	$width       = esc_attr( $width );
	$frameborder = esc_attr( $frameborder );

	if( empty($src) && !empty($url) ):
		$src = $url;
	endif;

	if( empty($src) && miramedia_is_admin() ):
		return '<p class="warning" style="text-align:center;">No frame URL specified in the iFrame.</p>';
	endif;

	if( !preg_match('/^http/', $src) ) :
		$src = 'http://' . $src;
	endif;
	$src = esc_url( $src );
	if( filter_var($src, FILTER_VALIDATE_URL) === FALSE ) :
		return '<p class="warning" style="text-align:center;">Invalid frame URL specified in the iFrame.</p>';
	endif;
	
	if($frameborder == 'yes') $frame_class = ' iframe-border';

	$frame = <<<HERE
<iframe class="{$frame_class}" src="{$src}" width="{$width}" height="{$height}">
	$content
</iframe>
HERE;

	return $frame;
}


add_filter( 'gform_confirmation_anchor', '__return_true' );


@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );




// Unyson code to add a font

function _filter_theme_add_hind_google_font($fonts) {
    if(defined('FW')) {
        return '';
    }
    $fonts['Roboto']  = array(
            'family'    => 'Poppins',
            'variants'  => array( 400, 700 ),
    );
    ksort($fonts);
    return $fonts;
}
add_filter('fw_google_fonts', '_filter_theme_add_hind_google_font');


####add as a standard font

function startuplanding_filter_theme_typography_custom_fonts( $fonts ) {
    
    array_push( $fonts, "lane" );
    return $fonts;
}
add_filter( 'fw_option_type_typography_standard_fonts', 'startuplanding_filter_theme_typography_custom_fonts' );



//###For typography-v2 option type

//`fw_option_type_typography_v2_standard_fonts`

//More details v2 https://github.com/ThemeFuse/Unyson/blob/master/framework/includes/option-types/typography-v2/class-fw-option-type-typography-v2.php#L54

?>




