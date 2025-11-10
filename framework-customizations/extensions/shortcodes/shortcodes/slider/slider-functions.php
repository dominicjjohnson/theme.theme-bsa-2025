<?php


class cw_unyson_slider{
	public static function get_transition_options(){
		return array(
			'horizontal' => __('Horizontal', 'fw'),
		    'vertical' => __('Vertical', 'fw'),
		    'fade' => __('Fade', 'fw')
		);
	}	

	public static function validate_value($key, $value){
		switch ($key) {
			case 'transition':
				$value = cw_unyson_slider::validate_value__transition($value);
				break;
		}

		return $value;
	}
	
	public static function validate_value__transition($value){
		$options = cw_unyson_slider::get_transition_options();

		if(isset($options[$value]))
			return $value;
		else
			return key($options);
	}
}