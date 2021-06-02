<?php

acf_register_block(array(
  'name'				=> 'card1',
  'title'				=> __('Card 1'),
  'description'		=> __(''),
  'supports' => array(
    'align' => false,
    'align-text' => false,
    'align-content' => false,
    'multiple' => false
  ),
  'render_callback'	=> 'my_acf_block_render_callback',
  'category'			=> 'wot',
  'icon'				=> 'admin-comments',
  'keywords'			=> array( 'card' ),
  'example'  => array(
    'attributes' => array(
      'mode' => 'preview',
      'data' => array(
        //card1_container
        "field_60abca180a5b6" => "container",
        //card1_activate_overlay
        "field_60ace92b44089" => true,
        //card1_overlay_color
        "field_60ace94f4408a" => "rgba(33, 37, 41, 0.5)",
        //card1_title
        "field_60abcace731e8" => "TITOLO",
        //card1_subtitle
        "field_60abcadb731e9" => "Sottotitolo",
        //card1_description
        "field_60abcaec731ea" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
        //card1_link
        "field_60abcafd731eb" => array(
          'url' => '#',
          'title' => 'Click here'
        ),
      )
    )
  )
));
