<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );

$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

$args = array(
	'post_type' => 'post',
	'posts_per_page' => $atts['count'],
	'paged' => $paged
);
$blog_query = new WP_Query($args);

if($blog_query->have_posts()):
	echo '<div class="blog-posts--wrapper">';
	while($blog_query->have_posts()): $blog_query->the_post();
		global $post;

		echo '<div class="blog-post">';
			if(has_post_thumbnail( $post->ID)) echo '<div class="blog-image">' . get_the_post_thumbnail($post->ID, 'full').'</div>';

			echo '<h3><a href="'.get_permalink($post->ID).'" title="">';
			echo filter_the_title_max_charlength(60);
			echo '</a></h3>';
			echo '<div class="blog-post--excerpt">';
				the_excerpt();
			echo '</div>';
		echo '</div>';
	endwhile;

	if($atts['show_pager']){
		echo '<p class="number-pagination">';

		$big = 999999999; // need an unlikely integer

		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'mid_size' => 4,
			'total' => $blog_query->max_num_pages,
			'prev_text' => '',
			'next_text' => ''
		) );
		echo '</p>';
	}
	echo '</div>';
endif;


function filter_the_title_max_charlength($charlength) {
	$excerpt = get_the_title();
	$charlength++;
	
	$clean_excerpt = preg_replace('#(\[).*?(\])#', '', $excerpt);
	//echo $clean_excerpt;

	if ( mb_strlen( $clean_excerpt ) > $charlength ) {
		$subex = mb_substr( $clean_excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '...';
	} else {
		echo $clean_excerpt;
	}
}