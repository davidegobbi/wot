<?php

function add_my_media_controls($wp_customize) {

  $wp_customize->add_setting('logoDark', array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'absint'
  ));

  $wp_customize->add_section('logo_dark', array(
    'title' => 'Dark Logo',
    'description' => 'Aggiungi il dark logo',
    'capability' => 'edit_theme_options'
  ));

  $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'logoDark', array(
    'section' => 'logo_dark',
    'label' => 'Dark Logo'
  )));
}

add_action('customize_register', 'add_my_media_controls');

?>
