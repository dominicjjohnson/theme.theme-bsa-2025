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
	echo miramedia_sc_sponsors($atts);
echo '</div>';
