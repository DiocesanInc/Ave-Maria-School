<?php

function acf_stats()
{
    return array(
		array(
			'key' => 'field_61847b0bce3ce',
			'label' => 'Stats',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		// array(
		// 	'key' => 'field_6218dd22e5074',
		// 	'label' => 'Jump Off Point?',
		// 	'name' => 'jump_off_point_stats',
		// 	'type' => 'true_false',
		// 	'instructions' => '',
		// 	'required' => 0,
		// 	'conditional_logic' => 0,
		// 	'wrapper' => array(
		// 		'width' => '',
		// 		'class' => '',
		// 		'id' => '',
		// 	),
		// 	'message' => '',
		// 	'default_value' => 0,
		// 	'ui' => 1,
		// 	'ui_on_text' => '',
		// 	'ui_off_text' => '',
		// ),
		array(
			'key' => 'field_61847b11ce3cf',
			'label' => 'Stats Title',
			'name' => 'stats_title',
			'type' => 'text',
			'instructions' => 'Max characters: 30',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => 30,
		),
		// array(
		// 	'key' => 'field_6218fc0e247c6',
		// 	'label' => 'Behaviour on mobile devices',
		// 	'name' => 'featured_content_is_slider',
		// 	'type' => 'true_false',
		// 	'instructions' => '',
		// 	'required' => 0,
		// 	'conditional_logic' => array(
		// 		array(
		// 			array(
		// 				'field' => 'field_6218dd22e5074',
		// 				'operator' => '==',
		// 				'value' => '1',
		// 			),
		// 		),
		// 	),
		// 	'wrapper' => array(
		// 		'width' => '',
		// 		'class' => '',
		// 		'id' => '',
		// 	),
		// 	'message' => '',
		// 	'default_value' => 0,
		// 	'ui' => 1,
		// 	'ui_on_text' => 'Slider',
		// 	'ui_off_text' => 'Stack',
		// ),
		// array(
		// 	'key' => 'field_6218dbfc9a9a4',
		// 	'label' => 'Buttons',
		// 	'name' => 'stats_buttons',
		// 	'type' => 'repeater',
		// 	'instructions' => '',
		// 	'required' => 0,
		// 	'conditional_logic' => array(
		// 		array(
		// 			array(
		// 				'field' => 'field_6218dd22e5074',
		// 				'operator' => '==',
		// 				'value' => '1',
		// 			),
		// 		),
		// 	),
		// 	'wrapper' => array(
		// 		'width' => '',
		// 		'class' => '',
		// 		'id' => '',
		// 	),
		// 	'collapsed' => '',
		// 	'min' => 1,
		// 	'max' => 3,
		// 	'layout' => 'table',
		// 	'button_label' => '',
		// 	'sub_fields' => array(
		// 		array(
		// 			'key' => 'field_6218dc199a9a5',
		// 			'label' => 'Image',
		// 			'name' => 'image',
		// 			'type' => 'image',
		// 			'instructions' => '',
		// 			'required' => 0,
		// 			'conditional_logic' => 0,
		// 			'wrapper' => array(
		// 				'width' => '',
		// 				'class' => '',
		// 				'id' => '',
		// 			),
		// 			'return_format' => 'url',
		// 			'preview_size' => 'medium',
		// 			'library' => 'all',
		// 			'min_width' => '',
		// 			'min_height' => '',
		// 			'min_size' => '',
		// 			'max_width' => '',
		// 			'max_height' => '',
		// 			'max_size' => '',
		// 			'mime_types' => '',
		// 		),
		// 		array(
		// 			'key' => 'field_6218dcdd9a9a6',
		// 			'label' => 'Title',
		// 			'name' => 'title',
		// 			'type' => 'text',
		// 			'instructions' => 'Max characters: 50.',
		// 			'required' => 0,
		// 			'conditional_logic' => 0,
		// 			'wrapper' => array(
		// 				'width' => '',
		// 				'class' => '',
		// 				'id' => '',
		// 			),
		// 			'default_value' => '',
		// 			'placeholder' => '',
		// 			'prepend' => '',
		// 			'append' => '',
		// 			'maxlength' => 50,
		// 		),
		// 		array(
		// 			'key' => 'field_6218dce19a9a7',
		// 			'label' => 'Text',
		// 			'name' => 'text',
		// 			'type' => 'textarea',
		// 			'instructions' => 'Max characters: 200.',
		// 			'required' => 0,
		// 			'conditional_logic' => 0,
		// 			'wrapper' => array(
		// 				'width' => '',
		// 				'class' => '',
		// 				'id' => '',
		// 			),
		// 			'default_value' => '',
		// 			'placeholder' => '',
		// 			'maxlength' => 200,
		// 			'rows' => '',
		// 			'new_lines' => '',
		// 		),
		// 		array(
		// 			'key' => 'field_6218dce59a9a8',
		// 			'label' => 'Link',
		// 			'name' => 'link',
		// 			'type' => 'link',
		// 			'instructions' => '',
		// 			'required' => 0,
		// 			'conditional_logic' => 0,
		// 			'wrapper' => array(
		// 				'width' => '',
		// 				'class' => '',
		// 				'id' => '',
		// 			),
		// 			'return_format' => 'array',
		// 		),
		// 	),
		// ),
		array(
			'key' => 'field_61847b21ce3d0',
			'label' => 'Stats Description',
			'name' => 'stats_description',
			'type' => 'textarea',
			'instructions' => 'Max characters: 250',
			'required' => 0,
			// 'conditional_logic' => array(
			// 	array(
			// 		array(
			// 			'field' => 'field_6218dd22e5074',
			// 			'operator' => '!=',
			// 			'value' => '1',
			// 		),
			// 	),
			// ),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => 250,
			'rows' => '',
			'new_lines' => '',
		),
		array(
			'key' => 'field_61847b29ce3d1',
			'label' => 'Stats Link',
			'name' => 'stats_link',
			'type' => 'link',
			'instructions' => '',
			'required' => 0,
			// 'conditional_logic' => array(
			// 	array(
			// 		array(
			// 			'field' => 'field_6218dd22e5074',
			// 			'operator' => '!=',
			// 			'value' => '1',
			// 		),
			// 	),
			// ),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
		),
		array(
			'key' => 'field_61847b36ce3d2',
			'label' => 'Stats',
			'name' => 'stats',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			// 'conditional_logic' => array(
			// 	array(
			// 		array(
			// 			'field' => 'field_6218dd22e5074',
			// 			'operator' => '!=',
			// 			'value' => '1',
			// 		),
			// 	),
			// ),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 6,
			'layout' => 'table',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_61847b40ce3d3',
					'label' => 'Image',
					'name' => 'image',
					'type' => 'font-awesome',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'icon_sets' => array(
						0 => 'fas',
						1 => 'far',
					),
					'custom_icon_set' => '',
					'default_label' => '',
					'default_value' => '',
					'save_format' => 'element',
					'allow_null' => 0,
					'show_preview' => 1,
					'enqueue_fa' => 0,
					'fa_live_preview' => '',
					'choices' => array(
					),
				),
				array(
					'key' => 'field_61847b4ece3d4',
					'label' => 'Stat',
					'name' => 'stat',
					'type' => 'text',
					'instructions' => 'Max characters: 50',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => 50,
				),
			),
		),
    );
}