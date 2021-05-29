<?php

acf_register_block(array(
  'name'				=> 'slider1',
  'title'				=> __('Slider 1'),
  'description'		=> __(''),
  'render_callback'	=> 'my_acf_block_render_callback',
  'category'			=> 'wot',
  'icon'				=> 'admin-comments',
  'keywords'			=> array( 'slider' )
));
