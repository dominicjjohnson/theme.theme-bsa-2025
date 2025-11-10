<?php

// http://blog.jonudell.net/2011/10/17/x-wr-timezone-considered-harmful/

// Query Vars
add_filter( 'query_vars', 'extranet_add_query_vars');
function extranet_add_query_vars( $public_query_vars ) {
	$public_query_vars[] = 'ics';
	$public_query_vars[] = 'eventical';
	return $public_query_vars;
}

// Rewrite Rules
add_action( 'init', 'extranet_add_rewrite_rules' );
function extranet_add_rewrite_rules(){
	// Event
	add_rewrite_rule( 'add-dates-to-diary/?', 'index.php?eventical=true', 'top' );
	add_rewrite_endpoint( 'eventical', EP_NONE );
	// Seminars
	add_rewrite_rule( 'ics/([0-9]+)/?',        'index.php?ics=$matches[1]',                  'top' );
	add_rewrite_rule( 'seminar/([^/]+)/ics/?', 'index.php?seminars=$matches[1]&ics=true', 'top' );
	add_rewrite_endpoint( 'ics', EP_ALL ); 
}

function extranet_diarydate_ics_body( $ical ){
	$event = get_bloginfo( 'title' );
	$title = get_the_title( $ical->ID );
	$url   = get_permalink( $ical->ID );
	$type  = $ical->post_type;
	$ntime = date( 'Ymd\THis' );
	$uid   = date( 'YmdHis' ) . sanitize_title( $title );

	switch ( $type ) :
		case 'diarydates' :
			$stime = 'not sure';
		case 'seminar' :
		default :			
			$day      = wp_get_object_terms($ical->ID, 'date');
			$day      = $day[0]->slug;
			$stime    = $day . get_post_meta( $ical->ID, 'sem_start_time', $single=true );
			$stime    = date( 'Ymd\THis', strtotime( $stime ) );
			$etime    = $day . get_post_meta( $ical->ID, 'sem_end_time', $single=true );
			$etime    = date( 'Ymd\THis', strtotime( $etime ) );
			$desc     = trim( strip_tags( $ical->post_content ) );
			$desc     = preg_replace( '/[\s]+/', " ", $desc );
			$location = get_the_term_list( $ical->ID, 'location', '', ', ', '' ) ;
 			$location = trim( strip_tags( $location ) );
		break;
	endswitch;

//X-WR-CALNAME:$title
 	$ical = <<<HERE
BEGIN:VCALENDAR
PRODID:-//Miramedia//Miramedia Events Core//EN
VERSION:2.0
METHOD:PUBLISH
X-ORIGINAL-URL:$url
X-WR-CALDESC:$title
X-WR-TIMEZONE:Europe/London
BEGIN:VEVENT
DTSTART:$stime
DTEND:$etime
TRANSP:OPAQUE
SEQUENCE:0
UID:$uid
DTSTAMP:$ntime
DESCRIPTION;ENCODING=QUOTED-PRINTABLE:$desc
LOCATION:$location
SUMMARY;ENCODING=QUOTED-PRINTABLE:$title
PRIORITY:5
CLASS:PUBLIC
BEGIN:VALARM
TRIGGER:-PT1440M
ACTION:DISPLAY
DESCRIPTION:Reminder
END:VALARM
END:VEVENT
END:VCALENDAR
HERE;
	
	$ical = str_replace( "\n", "\r\n", $ical );
	return $ical;
}


add_action( 'template_redirect', 'extranet_serve_ics_file', 13, 0 );
function extranet_serve_ics_file(){
	global $post;

	$ics       = get_query_var( 'ics' );
	$ical_id   = $ics;
	$ical_name = 'diarydate-' . date( 'Y-m-d' );
	$ical_body = 'No details available';
	$is_ical   = false;
	
	if( is_numeric( $ics ) && $seminar = get_post( $ics ) ){
		$ical_name = $seminar->post_name;
		$ical_body = extranet_diarydate_ics_body( $seminar );
		$is_ical   = true;
	}
	
	if( 'true' == $ics ){
		global $post;
		$ical_name = $post->post_name;
		$ical_body = extranet_diarydate_ics_body( $post );
		$is_ical   = true;
	}
	
	if( $is_ical ){
		header('Content-type: text/calendar');
		header('Content-Disposition: attachment; filename="' . $ical_name .'.ics"');
		echo $ical_body;
		exit;
	}
}

// Event
add_action( 'template_redirect', 'extranet_serve_default_dates_to_diary' );
function extranet_serve_default_dates_to_diary(){
	if( get_query_var( 'eventical' ) ){
		$start    = get_option( 'theme_event_start' );
		$end      = get_option( 'theme_event_end' );
		$location = get_option( 'theme_event_location' );
		if( empty( $start ) || empty( $end ) )
			wp_redirect( home_url() );
		$title = get_bloginfo( 'name' );
		if( $ename = get_option( 'theme_event_name' ) )
			$title = $ename;
		$desc  = trim( strip_tags( get_bloginfo( 'desc' ) ) );
		if( $edesc = get_option( 'theme_event_description' ) )
			$desc = $edesc;

		$url   = home_url();
		$stime = date( 'Ymd\THis', strtotime( $start ) );
		$etime = date( 'Ymd\THis', strtotime( $end ) );
		$ntime = date( 'Ymd\THis' );

		$filename = sanitize_title( $title );
		$uid      = date( 'YmdHis' ) . $filename;

		$ical = <<<HERE
BEGIN:VCALENDAR
PRODID:-//Miramedia//Miramedia Events Core//EN
VERSION:2.0
METHOD:PUBLISH
X-WR-TIMEZONE:Europe/London
BEGIN:VEVENT
DTSTART:$stime
DTEND:$etime
TRANSP:OPAQUE
SEQUENCE:0
UID:$uid
DTSTAMP:$ntime
DESCRIPTION;ENCODING=QUOTED-PRINTABLE:$desc
LOCATION:$location
SUMMARY;ENCODING=QUOTED-PRINTABLE:$title
PRIORITY:5
CLASS:PUBLIC
BEGIN:VALARM
TRIGGER:-PT1440M
ACTION:DISPLAY
DESCRIPTION:Reminder
END:VALARM
END:VEVENT
END:VCALENDAR
HERE;

		$ical = str_replace( "\n", "\r\n", $ical );
		header( 'Content-type: text/calendar' );
		header( 'Content-Disposition: attachment; filename="' . $filename . '.ics"' );
		echo $ical;
		exit;
	}
}
