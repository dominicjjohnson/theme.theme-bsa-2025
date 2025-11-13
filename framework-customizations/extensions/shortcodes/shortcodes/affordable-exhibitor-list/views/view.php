 <?php 
	
	if ( ! defined( 'FW' ) ) { die( 'Forbidden' ); }

//  	$service = $atts['service'];

	// Initialize variables to prevent undefined variable warnings
	$exhibitors = '';
	$exhibitor_list_placement = isset($atts['placement']) ? $atts['placement'] : 1;

	$alphabet = range( 'a', 'z' );
	
	$args = array(
		'post_type' => 'exhibitors',
		'posts_per_page' => -1,
		'orderby' => 'title',
		'order' => 'asc',
/*
		'tax_query' => array(
			array (
				'taxonomy' => 'services',
				'terms' => $service,
			),
		),
*/
	);
	
	// Debug output removed - tax_query is commented out above
	// echo $args['tax_query']['terms'];

	$query = new WP_Query($args);

	

	if($query->have_posts()):

		$atoz_posts = array();
		while($query->have_posts()): $query->the_post();
			global $post;
			
			

			$atoz_posts[] = $post;

			$title = get_the_title($post);
			$permalink = get_permalink($post);
			$attachment_id = get_post_meta($post->ID, 'profile_logo', true);
			if ($attachment_id) {
				$attachment = wp_get_attachment_image_src($attachment_id, 'cd ');
				$exhibitor_logo_src = $attachment ? $attachment[0] : '';
			} else {
				$exhibitor_logo_src = '';
			}

			$content = get_post_meta($post->ID, 'ex_rich_text_profile', true);
			$short_con = substr($content, 0, 75);
 
 			////////////////////// Checking for trails ///////////////// 

			$trails    = wp_get_object_terms( $post->ID, 'trail' );
			$trailclass = array();

			$trails_for_frontend = array();

			foreach( $trails as $tra ) :
				$trail_check = $tra->slug;

			$stylesheet_url = get_stylesheet_directory_uri();
			if($trail_check == "materials-world"){
				$trailclass[] = '<img src="' . $stylesheet_url . '/assets/img/materials-world-logo.png" />'; 
			}else if($trail_check == "retail-route"){
				$trailclass[] = '<img src="' . $stylesheet_url . '/assets/img/retail-route-logo.png" />'; 
			}else if($trail_check == "textile-trail"){ 
				$trailclass[] = '<img src="' . $stylesheet_url . '/assets/img/textile-trail-logo.png" />';   
			}

			endforeach;

			$trailclasses = implode(' ', $trailclass);

			///////////////////////// End of Trails ///////////////////////

			
			$first    = strtolower( mb_substr($title, 0, 1, 'UTF-8') );
			$alpha    = in_array($first, $alphabet) ? $first : '0-9';

			$categories    = wp_get_object_terms( $post->ID, 'category' );
			$categoryclass = array();
			$categories_to_include = array();
			$categories_for_frontend = array();
			foreach( $categories as $cat ) :
				$categories_to_include[$cat->term_id] = $cat->name; 
				$categoryclass[] = 'cat_' . $cat->term_id;
				$categories_for_frontend[] = $cat->name;
			endforeach;
			$categoryclasses = implode(' ', $categoryclass);
			$categories_for_frontend = implode(', ', $categories_for_frontend);

			$types = !empty($categories_for_frontend) ? $categories_for_frontend: '';

			$stand_number = get_post_meta($post->ID, 'stand_number', true);

			$exhibitor_cont = limit_words($content, 30) . ' <a href="' . $permalink . '">...Read More</a>';
			
			$company_url = get_post_meta($post->ID, 'website_url', true);
			if (!empty($company_url)) {
				$link = '<a class="company_website" href="' . $company_url . '" target="_blank">' . $company_url .'</a>';
			} else {
				$link = '';
			}

			$exhibitors .= <<<HERE
				<div class="exhibitor-list--block atoz_$first $categoryclasses" data-letter="$first">
					<a class="logo-box" href="$permalink" title="$title Profile">
						<img src="$exhibitor_logo_src" alt="$title Logo" />
					</a>
					<div class="exhibitor-text">
						<p class="exhibitor-title">Stand $stand_number | <a href="$permalink" title="$title Profile">$title</a></p>
						<div class="exhibitor-details">
							$exhibitor_cont
						</div>
						$link
					</div>
				</div>
			HERE;

		endwhile;

		//TW this function expects an additional parameter
		$placement = 1;
		$atoz = miramedia_exhibitor_list_sort_atoz( $atoz_posts,$placement );

		$cat_string = implode(', ', $categories_to_include);
		
		$args = array(
			'taxonomy'        => 'category',
			'orderby'         => 'name',
			'show_count'      => false,
			'hide_if_empty'   => true,
			'show_option_all' => '- All Categories -',
			'id'              => 'category_dropdown_' . $exhibitor_list_placement,
			'depth'           => 1,
			'echo'            => false,
			'class'           => 'exbtrlist-category-dropdown',
			'include'         => $cat_string,
			'exclude'         => 1,
		);

		
		$cat_dropdown = '<div id="category_dropdown_wrap_'.$exhibitor_list_placement.'" class="category_dropdown_wrap" data-table-id="'.$exhibitor_list_placement.'"><p>' . wp_dropdown_categories( $args ) . '</p></div>';

		if(!empty($exhibitors)){
			echo <<<HERE
			<div id="exhibitor-list--search-tools">
				<div id="exhibitor-list--atoz-wrapper">
					{$atoz}
				</div>
				<div id="exhibitor-list--cat-wrapper">
					{$cat_dropdown}
				</div>
				<div id="exhibitor-list--search-wrapper">
					<label for="exhibitor-list--text-search" class="sr-only">Search Exhibitors</label>
					<input id="exhibitor-list--text-search" type="text" placeholder="Search" aria-label="Search Exhibitors" />
				</div>
				<i class="fa fa-search" style="color: #90c2c2; font-size: 18px;"></i>
			</div>
<div id="exhibitor-list--block-layout">
	{$exhibitors}
</div>
HERE;
		}
	endif;


/*

function trunc($max_words) {
	$phrase = get_post_meta($post->ID, 'ex_rich_text_profile', true);
   $phrase_array = explode(' ',$phrase);
   if(count($phrase_array) > $max_words && $max_words > 0)
      $phrase = implode(' ',array_slice($phrase_array, 0, $max_words)).'...';
   return $phrase;
}
*/



function filter_the_excerpt_max_charlength($charlength) {
	$excerpt = get_post_meta($post->ID, 'ex_rich_text_profile', true);
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '...';
	} else {
		echo $excerpt;
	}
}

function limit_words($string, $word_limit)
{
    $words = explode(" ",$string);
    return implode(" ",array_splice($words,0,$word_limit));
}