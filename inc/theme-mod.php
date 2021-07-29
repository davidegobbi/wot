<?php

/*
endpoints
*/
function add_my_endpoints($wp_customize) {

  // SECTION
  $wp_customize->add_section('endpoints', array(
    'title' => 'Endpoints',
    'description' => 'Imposta endpoints',
    'capability' => 'edit_theme_options'
  ));

  /*
  blog_page_url_en
  */
  // SETTING
  $wp_customize->add_setting('blog_page_url_en', array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
  ));
  // CONTROL
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'blog_page_url_en', array(
    'type' => 'url',
    'section' => 'endpoints', // Add a default or your own section
    'label' => __( 'Blog page eng' ),
    'description' => __( 'Inserire URL pagina Blog in INGLESE' ),
    'input_attrs' => array(
      'placeholder' => __( 'es. https://www.lafinanziariatrentina.it/news-ed-eventi' ),
    ),
  )));

  /*
  blog_page_url_it
  */
  // SETTING
  $wp_customize->add_setting('blog_page_url_it', array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
  ));
  // CONTROL
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'blog_page_url_it', array(
    'type' => 'url',
    'section' => 'endpoints', // Add a default or your own section
    'label' => __( 'Blog page ita' ),
    'description' => __( 'Inserire URL pagina Blog in ITALIANO' ),
    'input_attrs' => array(
      'placeholder' => __( 'es. https://www.lafinanziariatrentina.it/news-ed-eventi' ),
    ),
  )));

}

add_action('customize_register', 'add_my_endpoints');


/*
DARK LOGO
 */
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
