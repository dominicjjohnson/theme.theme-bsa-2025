<?php 
/**
 * Theme Functions Includes: Theme Options
 */

function get_miramedia_theme_options(){
	$options = wp_cache_get('theme_options', 'miramedia_basic_theme');
	if( $options ) return $options;

	$options = array (
		'event_name' => array(
			'id'      => 'theme_event_name',
			'title'   => 'Event Name',
			'name'    => 'Event Name',
			'desc'    => 'Event Name',
			'default' => '',
			'size'    => 'small',
		),
		'event_description' => array(
			'id'      => 'theme_event_description',
			'title'   => 'Event Description',
			'name'    => 'Event Description',
			'desc'    => 'Event Description',
			'default' => '',
			'size'    => 'small',
		),
		'event_location' => array(
			'id'      => 'theme_event_location',
			'title'   => 'Event Location',
			'name'    => 'Event Location',
			'desc'    => 'Venue Location',
			'default' => '',
			'size'    => 'small',
		),
		'event_start' => array(
			'id'      => 'theme_event_start',
			'title'   => 'Event Start',
			'name'    => 'Event Start',
			'desc'    => 'The day the event starts',
			'default' => '',
			'size'    => 'small',
		),
		'event_end' => array(
			'id'      => 'theme_event_end',
			'title'   => 'Event End',
			'name'    => 'Event End',
			'desc'    => 'The day the event ends',
			'default' => '',
			'size'    => 'small',
		),
		'Head Codes' => array(
			'id'      => 'head_codes',
			'title'   => 'Head Codes',
			'name'    => 'Head Codes',
			'desc'    => 'Please enter any code you want to add to the head of your site e.g. Google Analytics - it will be automatically installed on the site.',
			'default' => '',
		),
		'Body Codes' => array(
			'id'      => 'body_codes',
			'title'   => 'Body Codes',
			'name'    => 'Body Codes',
			'desc'    => 'Please enter any code you want to add to the body of your site e.g. Google Analytics - it will be automatically installed on the site.',
			'default' => '',
		),
		'Footer Codes' => array(
			'id'      => 'footer_codes',
			'title'   => 'Footer Codes',
			'name'    => 'Footer Codes',
			'desc'    => 'Please enter any code you want to add to the footer of your site e.g. Google Analytics - it will be automatically installed on the site.',
			'default' => '',
		),
	);

	

	$options = apply_filters('miramedia_theme_options', $options);
	wp_cache_set('theme_options', $options, 'miramedia_basic_theme');
	return $options;
} // get_miramedia_theme_options


/** */
add_action('admin_menu', 'miramedia_theme_options');
function miramedia_theme_options() {
	$options = get_miramedia_theme_options();

	if('theme_save'== $_REQUEST['action'] ) {
		foreach ($options as $key => $value) {
			if( isset($_REQUEST[ $value['id'] ]) )
				update_option( $value['id'], stripslashes($_REQUEST[ $value['id']]));
		}

		if(stristr($_SERVER['REQUEST_URI'],'&saved=true'))
			$location = $_SERVER['REQUEST_URI'];
		else
			$location = $_SERVER['REQUEST_URI'] . "&saved=true";
		 header("Location: $location");
		 die;
	}
	else if('theme_reset' == $_REQUEST['action'] ) {
		foreach ($options as $key => $value) {
			delete_option( $value['id'] );
			$location = $_SERVER['REQUEST_URI'] . "&reset=true";
		}
		header("Location: $location");
		die;
	}

	add_theme_page('Standard Theme Options', 'Theme Options', 10, 'standard-options', 'miramedia_theme_admin');
}

/** */
/*
function miramedia_theme_admin(){
	$stuboxes = '';
	$options  = get_miramedia_theme_options();
	foreach( $options as $name => $option ){
		if (miramedia_package_options($option['dependant']) || empty($option['dependant'])){
		 if( ! $option_value = get_option($option['id']) )
			 $option_value = $option['default'];
 
		 $input = 'small' == $option['size']
					  ? '<label for="'.$option['id'].'" class="sr-only">'.$option['name'].'</label><input style="width:100%;" type="text" name="'.$option['id'].'" id="'.$option['id'].'" value="'.$option_value.'"/>'
					  : '<label for="'.$option['id'].'" class="sr-only">'.$option['name'].'</label><textarea rows="5" style="width:100%;" name="'.$option['id'].'" id="'.$option['id'].'">'.$option_value.'</textarea>';
		 $note  = empty($option['note']) ? '' : '<div class="note"><p><b>Note</b>: '.$option['note'].'</p></div>';
		 $stuffbox = <<<HERE
<div id="stuffbox_{$option['id']}" class="stuffbox">
 <h3>{$option['title']}</h3>
 <div class="inside">
	<table class="form-table" style="width:100%">
	 <tr>
		<td width="30%"><p><strong>{$option['name']}:</strong> {$option['desc']}</p>{$note}</td>
		<td width="70%">
		 {$input}
		</td>
	 </tr>
	</table>
 </div>
</div>
HERE;
		 $stuffboxes .= "$stuffbox\n";
		} else {
		 $extensions .= <<<HERE
		 <li><strong>{$option['title']} </strong></li>
HERE;
		}
	}
	if(!empty($extensions)){$extensions_full = <<<HERE
	<div>
	 <h2>Available Extensions</h2>
	 <p>Please <a target="_blank" href="http://www.miramedia.co.uk/contact-us/">contact Miramedia</a> about adding the following extensions to your website.<p>
	 <ol>
	 {$extensions}
	 </ol>
	</div>  
HERE;
	}
	$saved = !empty($_REQUEST['saved']) ? '<div class="updated fade"><p><strong>Options Saved</strong></p></div>' : '';

	$page = <<<HERE
<div class="wrap">
 <h2 class="alignleft">Theme Options</h2>
 <br clear="all" />
 {$saved}
 <form method="post" id="myForm">
	<div id="poststuff" class="metabox-holder">
	 {$stuffboxes}
	</div>
	<input name="theme_save" type="submit" class="button-primary" value="Update Options" />
	<input type="hidden" name="action" value="theme_save" />
 </form>
 {$extensions_full}
</div>
HERE;
	echo $page;
}
*/
