<?php

	global $post;
	$post = get_post($post->ID);

	//if(exhibitor_is_enhanced($post->ID)){
/*
		$company_url = get_post_meta($post->ID, 'website_url', true);
			if (!empty($company_url)) {
				$link = '<a class="company_website" href="' . $company_url . '" target="_blank">' . $company_url .'</a>';
			} else {
				$link = '';
			}
*/

$exhibitor = new exhibitor(); // Create an instance of the class
if ($exhibitor_logo = $exhibitor->get_exhibitor_logo($post, 'sponsor_logo')) {
/*
			$company_url = get_post_meta($post->ID, 'website_url', true);
			if (!empty($company_url)) {
			$exhibitor_logo = '<div id="exhibitor-single-logo"><a class="company_website" href="' . $company_url . '" target="_blank">'.$exhibitor_logo.'</a></div>';
			} else {
*/
				$exhibitor_logo = '<div id="exhibitor-single-logo">'.$exhibitor_logo.'</div>';
// 			}
		}
	//}


	$title = '<h1 id="exhibitor-single-name">' . get_the_title($post->ID) . '</h1>';


	$exhibitor = new exhibitor(); // Create an instance of the class
	$contact_links = $exhibitor->get_contact_links($post->ID);
	// $social_links  = exhibitor::get_social_links($post->ID);

	//if(exhibitor_is_enhanced($post->ID)){
		$options = array(
			'twitter' => array(
				'text' => '<i class="fa fa-twitter"></i> Twitter',
				'key'  => 'twitter_url',
			),
			'facebook' => array(
				'text' => '<i class="fa fa-facebook"></i> Facebook',
				'key'  => 'facebook_url',
			),
			'youtube' => array(
				'text' => '<i class="fa fa-youtube"></i> YouTube',
				'key'  => 'youtube_url',
			),
			'linkedin' => array(
				'text' => '<i class="fa fa-linkedin"></i> Linkedin',
				'key'  => 'linkedin_url',
			),

		);

		$social_links = '';
		$listed_links = '';

		foreach($options as $k => $values){

			$value = get_post_meta($post->ID, $values['key'], true);

			if(empty($value)) continue;

			$link_content .= '<a href="'.$value.'" title="">'.$values['text'].'</a>';

		}

		if(!empty($link_content))
			$social_links .= '<div id="exhibitor-social-links">' . $link_content . '</div>';

	//}

	$exhibitor = new exhibitor(); // Create an instance of the class
	$halls = $exhibitor->get_halls($post); // Call the method on the instance

	$terms = get_the_terms($post->ID, 'category' );
	if(!empty($terms)){
		$category_names = array();
		foreach($terms as $term){
			$category_names[] = $term->name;
		}
		$categories = '<h4 class="exhibitor-single--categories">';
		$categories .= implode(', ', $category_names);
		$categories .= '</h4>';
	}

	$exhibitor = new exhibitor(); // Create an instance of the class
	$stands = $exhibitor->get_stand_numbers($post); // Call the method on the instance

	$exhibitor_bio = $exhibitor->get_profile_text($post);
		
	$exhibitor_trails = apply_filters('frontend_single_exhibitor_trails', '');
	
	$address1 = get_post_meta($post->ID, 'first_address', true);
	if(!empty($address1))
		$address1 = '<span>'.nl2br($address1).'</span><br />';
	$address2 = get_post_meta($post->ID, 'second_address', true);
	if(!empty($address2))
		$address2 = '<span>'.nl2br($address2).'</span><br />';
	$address3 = get_post_meta($post->ID, 'third_address', true);
	if(!empty($address3))
		$address3 = '<span>'.nl2br($address3).'</span><br />';
	$address4 = get_post_meta($post->ID, 'town', true);
	if(!empty($address4))
		$address4 = '<span>'.nl2br($address4).'</span><br />';
	$address5 = get_post_meta($post->ID, 'postcode', true);
	if(!empty($address5))
		$address5 = '<span>'.nl2br($address5).'</span><br />';
	$address6 = get_post_meta($post->ID, 'county', true);
	if(!empty($address6))
		$address6 = '<span>'.nl2br($address6).'</span><br />';
	$address7 = get_post_meta($post->ID, 'country', true);
	if(!empty($address7))
		$address7 = '<span>'.nl2br($address7).'</span><br />';

	if(exhibitor_is_enhanced($post->ID)){
		
		$videos        = exhibitor::get_videos($post->ID);

		if(!empty($videos)){
			$video_content = '<h2>Videos</h2>';
			foreach($videos as $video_url){
				$video_content .= apply_filters('the_content', $video_url);
			}
		}

		$promotional_docs = exhibitor::get_promotional_documents($post);
		if(!empty($promotional_docs)){
			$promo_docs = '<h2>Promotional Documents</h2>';
			foreach($promotional_docs as $doc){
				$promo_docs .= '<p><strong><a href="'.$doc['file'].'" target="_blank" title="">'.$doc['title'].'</a></strong>';
				if($doc['caption'])
					$promo_docs .= '<br  />'.$doc['caption'];
				$promo_docs .= '</p>';
			}
		}

		$exhibitor_press = do_shortcode('[miramedia_press_releases source="exhibitor" exhibitor_id="'.$post->ID.'" /]');

	}

	$promo_docs = $promo_docs ?? "";
	$exhibitor_press = $exhibitor_press ?? "";
	
	echo <<<HERE
{$exhibitor_logo}
<div id="exhibitor-single--contact-info">
	{$title}
	{$categories}
	{$halls}
	{$stands}
	{$contact_links}
	
	{$social_links}
</div>
<div id="exhibitor-single--exhibitor-bio">
	{$exhibitor_bio}
<div class="adresss-fields">
	{$address1}
	{$address2}
	{$address3}
	{$address4}
	{$address5}
	{$address6}
	{$address7}
</div>
</div>
{$video_content}
{$promo_docs}
{$exhibitor_press}
HERE;
