<?php if (!defined('FW')) die('Forbidden');

	function disable_default_shortcodes($to_disable) {
	    $to_disable[] = 'accordion';
	    $to_disable[] = 'button';
	    $to_disable[] = 'calendar';
	    $to_disable[] = 'call_to_action';
	    $to_disable[] = 'icon';
	    $to_disable[] = 'icon_box';
	    $to_disable[] = 'map';
	    $to_disable[] = 'notification';
	    $to_disable[] = 'special_heading';
	    $to_disable[] = 'tabs';
	    $to_disable[] = 'table';
	    $to_disable[] = 'team_member';
	    $to_disable[] = 'testimonials';
	    $to_disable[] = 'widget_area';
	    return $to_disable;
	}
	add_filter('fw_ext_shortcodes_disable_shortcodes', 'disable_default_shortcodes');