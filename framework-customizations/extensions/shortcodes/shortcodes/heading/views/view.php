<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$id = rand();

$type_settings = array();
$inner_settings = array();

foreach($atts as $k => $setting){
	switch ($k) {
		case 'font_size':
			$type_settings[] = 'font-size: ' . $setting . 'px;';
			$type_settings[] = 'font-size: ' . ($setting / 10) . 'rem;';
			break;
		case 'font_style':
			$type_settings[] = 'text-style: ' . $setting . ';';
			break;
		case 'font_weight':
			$type_settings[] = 'font-weight: ' . $setting . ';';
			break;
		case 'color':
			$type_settings[] = 'color: ' . $setting . ';';
			break;
		case 'align':
			$inner_settings[] = 'text-align: ' . $setting . ';';
			break;
		case 'padding':
			$inner_settings[] = 'padding: ' . $setting . ';';
			break;
		case 'margin':
			$inner_settings[] = 'margin: ' . $setting . ';';
			break;
		case 'background_color':
			$inner_settings[] = 'background-color: ' . $setting . ';';
			break;
		case 'font_family':
			$inner_settings[] = 'font-family: \'' . $setting . '\', \'Arial\', sans-serif;';
			break;
	}
}

$inner_settings[] = 'z-index: 99;';
$inner_settings[] = 'display: block;';

$type_settings[] = 'display: inline-block;';

$inner_settings_combined = implode(' ', $inner_settings);
$type_settings_combined = implode(' ', $type_settings);

echo '<span style="'.$inner_settings_combined.'"><span style="'.$type_settings_combined.'">'.$atts['text'].'</span></span>';

