<?php
	$speaker_detail = array();
	$speaker_detail[] = '<strong>'.get_post_meta( $post->ID, 'speaker_speaker_job_title', true ) . '</strong>';
	$speaker_detail[] = get_post_meta( $post->ID, 'speaker_company_name', true );
?>
<!-- PROFILE IMAGE -->
<?php if( $photo = get_the_post_thumbnail($id, 'medium') ): ?>
	<div id="single-speaker-photo"> <?php echo $photo; ?> </div>
<?php endif; ?>

<!-- SPEAKER NAME -->
<h1 class="speaker-name"><?php the_title(); ?></h1>

<!-- JOB TITLE AND COMPANY NAME -->
<?php echo '<p>' . implode('<br  /> ', $speaker_detail) . '</p>'; ?>
<?php the_content(); ?>

<?php $seminars = miramedia_get_speakers_seminars( $post->ID ); ?>
<?php
	if(!empty($seminars['all'])){
		echo '<h3 class="clear">'.get_the_title($post->ID) . ' ' .miramedia_get_option('language_speaking_at') . ': </h3>';

		$args = array(
			'post_type' => 'seminars',
			'post__in' => $seminars['all']
		);
		
		$custom_query = new WP_Query($args);
		
		if($custom_query->have_posts()) :
			while ($custom_query->have_posts()):
				$custom_query->the_post();
				global $post;
				$seminar_instance = new seminars();
				echo '<h5>'.$seminar_instance->get_session_title($post->ID).'</h5>';
				
				
				$session_details = array(
					array(
						'icon' => 'icon-calendar-empty',
						'content' => $seminar_instance->get_session_date($post->ID)
					),
					array(
						'icon' => 'icon-clock',
						'content' => $seminar_instance->get_session_times($post->ID)
					), 
					array(
						'icon' => 'icon-location',
						'content' => $seminar_instance->get_session_location($post->ID)
					)
				);
				
				$details_output = array();
				foreach ($session_details as $key => $value) {
					if(!empty($value['content']))
						$details_output[] = '<i class="'.$value['icon'].'"></i>'.$value['content'];
				}
				echo '<p><small><em>'.implode(' ', $details_output).'</em></small></p>';

			endwhile;
		endif;
	}
?>

<p class="clear"><span class="back-btn" onClick="parent.history.back();" title="<?php echo esc_attr($backlink_text); ?>">&laquo; Back to Previous Page</span></p>
<?php get_template_part('miramedia', 'addthis'); ?>
