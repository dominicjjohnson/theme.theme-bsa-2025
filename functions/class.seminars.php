<?php

/**
 * Class for seminars. 
 */
class seminars {
	
	public function get_session_title($post_id){
		$post = get_post($post_id);
		if(!empty($post->post_content)){
			return '<a href="'.get_permalink($post_id).'" title="'.get_the_title($post_id).'">'.get_the_title($post_id).'</a> <small><i class="fa fa-chevron-right"></i></small>';
		} else {
			return get_the_title($post_id);
		}
	}
	
	// Seminar Session Times
	public function get_session_times($post_id){
		$times = array();
		$times[] = get_post_meta( $post_id, 'time_start', true );
		$times[] = get_post_meta( $post_id, 'time_end', true );
		
		if(empty($times)) return '-';
		
		$formatted = array();
		foreach($times as $time){
			$formatted[] = date( get_option('time_format'), strtotime($time) );
		}
		
		return implode(' - ', $formatted);
	}

	function get_session_date($post_id){
		$sem_date = wp_get_post_terms( $post_id, 'date' );
		
		if(empty($sem_date)) return '-';	
		
		$sem_date	= date( "l j F Y", strtotime($sem_date[0]->slug) );
		return $sem_date;
	}
	
	function get_session_location($post_id){
		return get_the_term_list( $post->ID, 'location', '', ', ', '' );
	}
	function get_session_track($post_id){
		return get_the_term_list( $post->ID, 'track', '', ', ', '' );
	}
}
