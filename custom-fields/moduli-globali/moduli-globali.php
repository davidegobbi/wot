<?php
if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array(
    'key' => 'group_60436d0245748',
    'title' => 'Moduli globali',
    'fields' => array(
      array(
        'key' => 'field_60436d11147f4',
        'label' => 'Impostazioni',
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
        'placement' => 'left',
        'endpoint' => 0,
      ),
      array(
        'key' => 'field_60436db052f2e',
        'label' => 'Attiva sezioni',
        'name' => 'attiva_sezioni',
        'type' => 'group',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'layout' => 'table',
        'sub_fields' => array(
          array(
            'key' => 'field_60436dcb52f2f',
            'label' => 'Attiva Topbar',
            'name' => 'attiva_topbar',
            'type' => 'true_false',
            'instructions' => '',
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
          array(
            'key' => 'field_60436dd452f30',
            'label' => 'Attiva Navbar',
            'name' => 'attiva_navbar',
            'type' => 'true_false',
            'instructions' => '',
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
          array(
            'key' => 'field_6043760d82cda',
            'label' => 'Attiva Breadcrumbs',
            'name' => 'attiva_breadcrumbs',
            'type' => 'true_false',
            'instructions' => '',
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
          array(
            'key' => 'field_6043761f82cdb',
            'label' => 'Attiva Footer',
            'name' => 'attiva_footer',
            'type' => 'true_false',
            'instructions' => '',
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
          array(
            'key' => 'field_6043762a82cdc',
            'label' => 'Attiva Bottobar',
            'name' => 'attiva_bottobar',
            'type' => 'true_false',
            'instructions' => '',
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
      ),
      array(
        'key' => 'field_60436deb11dc1',
        'label' => 'Topbar',
        'name' => '',
        'type' => 'tab',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => array(
          array(
            array(
              'field' => 'field_60436dcb52f2f',
              'operator' => '==',
              'value' => '1',
            ),
          ),
        ),
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'placement' => 'left',
        'endpoint' => 0,
      ),
      array(
        'key' => 'field_60436e0611dc2',
        'label' => 'Note',
        'name' => '',
        'type' => 'message',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'message' => 'La Topbar	verrà mostrata in questa pagina. Nessun altro settaggio richiesto.',
        'new_lines' => 'wpautop',
        'esc_html' => 0,
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'page',
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
?>