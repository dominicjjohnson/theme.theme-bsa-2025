<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );

if(!class_exists('RGFormsModel')) return;

$forms = RGFormsModel::get_forms( null, 'title' );
foreach( $forms as $form ):
  $array[$form->id] =  $form->title;
endforeach;

$options = array(
	'form_id' => array(
	    'type'  => 'select',
	    'label' => __('Form ID', 'fw'),
	    'help'  => __('Select the form you want to place', 'fw'),
	    'population' => 'array',
	    'source' => '',
	    'choices' => $array,
	    'limit' => -1,
	),
	'display_title' => array(
		'type'    => 'switch',
		'value' => 'false',
		'label'   => 'Display title?',
		'left-choice' => array(
			'value' => 'false',
			'label' => 'Hide title',
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => 'Show title',
		),
	),
);
