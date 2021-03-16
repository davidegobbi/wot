<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_604744d3c6af0',
	'title' => 'Breadcrumbs (categories)',
	'fields' => array(
		array(
			'key' => 'field_604744dd62408',
			'label' => 'Escludi da breadcrumbs',
			'name' => 'escludi_da_breadcrumbs',
			'type' => 'true_false',
			'instructions' => 'Se selezionata, questa casella impedisce che la presente categoria venga utilizzata come link nelle breadcrumbs',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'taxonomy',
				'operator' => '==',
				'value' => 'category',
			),
		),
		array(
			array(
				'param' => 'taxonomy',
				'operator' => '==',
				'value' => 'product_cat',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;
