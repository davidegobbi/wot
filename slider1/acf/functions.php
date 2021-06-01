<?php

acf_register_block(array(
  'name'				=> 'slider1',
  'title'				=> __('Slider 1'),
  'description'		=> __(''),
  'supports' => array(
    'align' => false,
    'align-text' => false,
    'align-content' => false,
    'mode' => false,
    'multiple' => false
  ),
  'mode' => 'edit',
  'render_callback'	=> 'my_acf_block_render_callback',
  'category'			=> 'wot',
  'icon'				=> 'admin-comments',
  'keywords'			=> array( 'slider' )
));
