<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$output = get_term_by('ID', $atts['sponsortype'], 'sponsortype' );

if($atts['logo_size']){

	switch ($atts['logo_size']) {
		case 'large':
		case 'giant':
			$atts['size'] = 'large';
			break;
		default:
			$atts['size'] = 'sponsor_logo';
			break;
	}

}

if($atts['title'])
	echo '<h3>'.$atts['title'].'</h3>';


echo '<div class="unyson-sponsors logo-size-'.$atts['logo_size'].'">';
	global $wp_query, $post;

	$defaults = array(
		'sponsortype' => 'all',
		'layout'      => 'logos',
		'orderby'     => 'company',
		'per_page'    => '-1',
		'size'        => 'sponsor_logo'
	);

	// Using the sponsor shortcode so load the frontend JS/CSS
	wp_enqueue_style( 'sponsor-frontend' );

	$atts = shortcode_atts( $defaults, $atts );	
	$size = '';
	extract( $atts );

	
	if(empty($per_page)) $per_page = '-1';

	$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
	$args  = array(
		'post_type'           => 'sponsors',
		'posts_per_page'      => -1,
		'orderby'             => 'menu_order',
		'order'               => 'ASC',
		'ignore_sticky_posts' => 1,
	);

	$term = (object)array('term_id'=>'all'); // Dummy default for 'all'
	if( $sponsortype && $sponsortype != 'all' ) :
		$term              = is_numeric($sponsortype) ? get_term( $sponsortype, 'sponsortype' ) : get_term_by( 'slug', $sponsortype, 'sponsortype' );
		$tax_query         = array( 'taxonomy' => 'sponsortype', 'terms' => array($term->slug), 'field' => 'slug' );
		$args['tax_query'] = array( $tax_query );
	endif;

	switch( $orderby ) :
		case 'rand':
			$args['orderby']  = 'rand';
			break;
		case 'custom':
			$args['orderby']  = 'meta_value_num';
			$args['meta_key'] = 'miramedia_sponsor_order_' . $term->term_id;
			break;
		case 'company':
		default:
			$args['orderby']  = 'title';
			break;
	endswitch;

	$displayed_ids = array();
	$sc_content    = '';
	$list_items    = array();

	$count = 0;
	$sponsors      = get_posts( $args );
	// $list_items[] = '<div class="sponsor-widget--rotate-wrap clearfix">';
		foreach( $sponsors as $post ) : setup_postdata( $post );
			
			miramedia_set_post_global( 'sponsorlist_atts', $atts );
			// if($count !== 0 && $count % $per_page == 0) {
			// 	$list_items[] = '</div><div class="sponsor-widget--rotate-wrap clearfix">';
			// }

			$sponsor_content = miramedia_sc_sponsor_item($post, $size);
			if(!empty($sponsor_content)){
				$list_items[] = $sponsor_content;
				$count++;
				$displayed_ids[] = $post->ID;
			}

			
		endforeach; wp_reset_postdata();

		$unsorted_custom_items = false;
		if( $orderby == 'custom' ) :
			unset( $args['meta_key'] );
			$args['post__not_in'] = $displayed_ids;
			$args['orderby']      = 'title';
			$sponsors             = get_posts( $args );
			if( count($sponsors) ) :
				$unsorted_custom_items = true;
				
				foreach( $sponsors as $post ) : setup_postdata( $post );
					
					// if($count !== 0 && $count % $per_page == 0) $list_items[] = '</div><div class="sponsor-widget--rotate-wrap clearfix">';
					
					miramedia_set_post_global( 'sponsorlist_atts', $atts );
					
					$sponsor_content = miramedia_sc_sponsor_item($post, $size);
					if(!empty($sponsor_content)){
						$list_items[] = $sponsor_content;
						$count++;
					}
					
				endforeach; wp_reset_postdata();
			endif;
		endif;
	// $list_items[] = '</div>';

	// $warning = '';
	// if( !count($list_items) && miramedia_is_admin() ) :
	// 	$warning .= '<p class="warning" style="text-align:center;">';
	// 	$warning .= '<strong>There are no sponsors with these settings</strong>';
	// 	$warning .= '<br  /><a href="' . admin_url('edit.php?post_type=sponsors') . '"><strong>Manage your sponsors here</strong></a> &raquo;';
	// 	$warning .= '<br  /><small><em>Only administrators can see this message</em></small>';
	// 	$warning .= '</p>';
	// endif;

	// if( $unsorted_custom_items && miramedia_is_admin() ) :
	// 	$warning .= '<p class="warning" style="text-align:center;">';
	// 	$warning .= 'You have un-ordered items in your custom list. They have been added at the bottom of the list.';
	// 	$url      = 'edit.php?post_type=sponsors&page=custom-sponsor-ordering';
	// 	if( $group && $group != 'all' )
	// 		$url .= '&sponsorgroup=' . $term->term_id;
	// 	$warning .= '<br  /><a href="' . admin_url($url) . '">Edit Custom Order Here &raquo;</a>';
	// 	$warning .= '<br  /><small><em>Only administrators can see this message</em></small>';
	// 	$warning .= '</p>';
	// endif;

	// $warning = apply_filters( 'miramedia_frontend_admin_warning', $warning, 'sponsors' );

	$sc_content  = implode( '', $list_items );
	$wrapclasses = array( 'sponsor-list-wrapper', 'sponsor-rotate-wrapper' );
	foreach ( $atts as $key => $value ) {
		$wrapclasses[] = $value;
	}

	if( empty( $sc_conent ) )
		$sc_content  = '<div class="' . implode( ' ', $wrapclasses ) . '">' . $sc_content . '</div>';

	echo $sc_content;
echo '</div>';