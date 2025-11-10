<?php
/*
FULL    - Default (logo, name, job title, company name)
JOB     - Name, Job Title, Company Name
COMPANY - Name, Company Name
*/

	$layout = ($post->speakerlayout) ? $post->speakerlayout : 'full';

	$speaker_url  = get_permalink();
	$speaker_name = get_the_title();

	$speaker_job     = in_array($layout,array('full','job')) ? get_post_meta( $post->ID, 'speaker_speaker_job_title', $single=true ) : '';;
	$speaker_job     = $speaker_job ? '<span class="speaker-job-title">' . $speaker_job . '</span>' : '';
	$speaker_company = get_post_meta( $post->ID, 'speaker_company_name', $single=true );
	$speaker_company = $speaker_company ? '<span class="speaker-company-name">' . $speaker_company . '</span>' : '';
	$speaker_compjob = '<span class="position">' . implode( '<span class="sem-speaker-position-join"> - </span>', array_filter(array($speaker_job, $speaker_company)) ) . '</span>';

	$speaker_photo = '';
	if( $layout == 'full'):
		if(has_post_thumbnail($post->ID) ):
			$small_thumb_cropped = get_the_post_thumbnail( $post->ID, 'thumbnail' );
		else :
			$small_thumb_cropped = '<img src="' . get_template_directory_uri() . '/img/generic-speaker-small-grey.png" alt="View full profile for ' . esc_attr($speaker_name) . '"  />';
		endif;
		$speaker_photo       = '<a class="speaker-photo" href="' . $speaker_url . '" title="View full profile for ' . esc_attr($speaker_name) . '" rel="bookmark">' . $small_thumb_cropped . '</a>';
	endif;
        
	$piece  = '<li class="speaker-line speaker">' . $speaker_photo . '<a class="speaker-full-name" href="' . $speaker_url . '" title="View full profile for ' . esc_attr($speaker_name) . '">' . $speaker_name. '</a>';
	$piece .= $speaker_compjob ? " {$speaker_compjob}" : '';
	$piece .= '<div class="clear"></div></li>';
	$piece .= "\n";

	echo $piece;

//error_log( "Piece on {$post->ID} --- $piece" );
