<?php

global $post;
$extensions = get_option( 'miramedia_extensions' ); ?>

<?php if( $photo = get_the_post_thumbnail($id, 'medium') ): ?>
	<div class="alignright"> <?php echo $photo; ?> </div>
<?php endif; ?> 
<h1><?php the_title(); ?></h1>
<?php 
	$track_text             = miramedia_get_option( 'language_track' );
	$download_to_diary_text = miramedia_get_option( 'language_download_to_diary' );

	if( $time_start && $time_end && $sem_date )
		$dates_to_diary_link = ' - <a href="' . get_permalink($post->ID) . 'ics" title="'.$download_to_diary_text.'">'.$download_to_diary_text.'</a>';
	
	$seminar_instance = new seminars();
	$session_details = array(
		'Time' => array(
			'icon' => 'fa fa-clock-o',
			'content' => $seminar_instance->get_session_times($post->ID)
		), 
		'Date' => array(
			'icon' => 'fa fa-calendar-o',
			'content' => $seminar_instance->get_session_date($post->ID)
		), 
		'Location' => array(
			'icon' => 'fa fa-location',
			'content' => $seminar_instance->get_session_location($post->ID)
		),
		'Track' => array(
			'icon' => 'fa fa-th-large',
			'content' => strip_tags($seminar_instance->get_session_track($post->ID))
		)
	);

	
	$details_output = array();
	foreach ($session_details as $key => $value) {
		if(!empty($value['content']))
			$details_output[] = '<i title="'.$key.'" class="'.$value['icon'].'"></i> <strong>'.$value['content'].'</strong><br  />';
	}
	echo '<p>'. implode( $details_output) .'</p>';
	
?>

<?php the_content(); ?>

<?php // Speakers by Role ?>
<?php
	$roles        = miramedia_get_speaker_roles_ordered();
	$speaker_list = array();

    foreach( $roles as $roleslug ):
      $role = get_posts( array('name'=>$roleslug, 'post_type'=>'speakerrole', 'post_status'=>'publish', 'posts_per_page'=>1) );
      if( empty($role) )
        continue;

      $role     = reset( $role );
      $speakers = miramedia_p2p_get_seminar_speakers_by_role( get_the_id(), $roleslug );

      if( empty($speakers) )
        continue;

      $role_speakers  = '<div class="speaker-for-session seminar-speakers-by-role-' . $roleslug . '">';
      $role_speakers .= '<p>' . $role->post_title . '</strong></p>';
      $role_speakers .= '<ul class="shortcode-speakers">';

      $role_speaker_list = array();
      foreach( $speakers as $post ):
        setup_postdata( $post );
        ob_start();
        get_template_part( 'content/seminars/speakers' );
        $piece = ob_get_contents();
        ob_end_clean();
        $role_speaker_list[] = $piece;
        wp_reset_postdata();
      endforeach;

      $role_speakers .= implode( "\n", $role_speaker_list );
      $role_speakers .= '</ul>';
      $role_speakers .= '</div>';

      $speaker_list[] = $role_speakers;
    endforeach; // roles as slug->role

  $speaker_list = implode( "\n", $speaker_list );
	echo $speaker_list;
?>

<?php // Presentations block : Bloody presentations :( ?>
<?php if( isset($extensions['seminar_presentations']) && $extensions['seminar_presentations'] == 'yes' ) : ?>
	<?php if( $presentation = get_query_var('cw_display_presentation') ) : ?>
		<?php //$allfiles = get_presentation_files(); ?>
		<?php if( has_presentation_files() ) : ?>
			<h4 id="presentation-files">Presentation</h4>
			<?php foreach( array('documents', 'images', 'audio') as $seg ) : // other?>
				<?php get_template_part( 'presentations', $seg ); ?>
			<?php endforeach; ?>
		<?php else : echo '<p>There are no presentation files available</p>'; endif; ?>
		<?php if( current_user_can('administrator') ): ?>	
			<p class="warning" style="text-align: center;">
				<a href="<?php echo get_permalink(); ?>" title="Back to normal seminar view.">View the seminar without presentations</a> &raquo; <br  /><br  />
				<small>Only administrators can see this message</small>
			</p>
		<?php endif; ?>
	<?php else : ?>
		<?php if( current_user_can('administrator') ): ?>
			<p class="warning" style="text-align: center;">
				Presentation files are hidden to regular site visitors<br  />
				<a href="<?php echo get_permalink(); ?>presentation/" title="Click here to view the page with presentation files available">To view the presentation files click here</a> &raquo;<br  /><br  />
				<small>Only administrators can see this message</small>
			</p>
		<?php endif; // Admin notice (link to presentations)?>
	<?php endif;  // get_query_var ?>
<?php endif; // extension on/off ?>

<div class="presentation-files">
<?php

            // Outputting the presentation files under the session details
			$files = rwmb_meta( 'presentation_link', 'type=file' );

			if(!($files == null || $files == '')){

			echo '<h3><i class="fa fa-download" aria-hidden="true"></i> Downloads:</h3>';

			foreach ( $files as $info ){
			     echo '<a href="' . $info['url'] . '" title="' . $info['title'] . '" rel="bookmark" target="_blank">' . $info['title'] . '</a><br />'; 
			}     
			}

			// Outputting the presentation urls under the session details
			$presentation = rwmb_meta( 'presentation_url');

			if(!($presentation == null || $presentation == '')){

	 		echo '<br /><h5>Download Links:</h5>'; 

			foreach ( $presentation as $pres ){ 
			     echo '<a href="' . $pres . '" title="' . $pres . '" rel="bookmark" target="_blank">' . $pres . '</a><br />';   
			}   
			}
?>

</div>


<p class="clear back-btn-container"><span class="back-btn" onClick="parent.history.back();" title="<?php echo esc_attr($backlink_text); ?>">&laquo; Back to Previous Page</span></p>
<?php get_template_part('miramedia', 'addthis'); ?>