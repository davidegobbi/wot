<?php

/*
Add new Gutenberg block category
*/
function wot_block_category( $categories, $post ) {
  return array_merge(
    array(
      array(
        'slug' => 'wot',
        'title' => __( 'WOT Blocks', 'wot-blocks' ),
      ),
    ),
    $categories
  );
}
add_filter( 'block_categories', 'wot_block_category', 10, 2);


/*
Add ACF Block support
*/
add_action('acf/init', 'my_acf_init');


/*
Register blocks
*/
function my_acf_init() {
  if( function_exists('acf_register_block') ) {

    acf_register_block(array(
      'name'				=> 'card1',
      'title'				=> __('Card 1'),
      'description'		=> __(''),
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


  }
}


/*
Render blocks
*/
function my_acf_block_render_callback( $block ) {
  $slug = str_replace('acf/', '', $block['name']);
  if( file_exists( get_theme_file_path("/template-parts/acf-block/content-{$slug}.php") ) ) {
    include( get_theme_file_path("/template-parts/acf-block/content-{$slug}.php") );
  }
}


/*
Remove embedded stylesheet for Gutenberg editor on the back end
https://stackoverflow.com/questions/54203925/remove-embedded-stylesheet-for-gutenberg-editor-on-the-back-end
*/
add_filter( 'block_editor_settings' , 'remove_guten_wrapper_styles' );
function remove_guten_wrapper_styles( $settings ) {
  unset($settings['styles'][0]);
  return $settings;
}


/*
Enqueue WOS assets in WP admin (for backend preview)
*/
function load_editor_wos_style_scripts(){

  wp_enqueue_script( 'bootstrap-scripts', get_stylesheet_directory_uri() . '/wos/lib/bootstrap/js/bootstrap.bundle.js',array( 'jquery' ),'',true);
  wp_enqueue_script( 'libraries', get_stylesheet_directory_uri() . '/wos/dist/js/libraries.min.js',array( 'jquery' ),'',true);
  wp_enqueue_script( 'templates', get_stylesheet_directory_uri() . '/wos/dist/js/templates.min.js',array( 'jquery' ),'',true);

  wp_register_style( 'wos_templates_css', get_stylesheet_directory_uri() . '/wos/dist/css/templates.min.css' );
  wp_enqueue_style( 'wos_templates_css' );
  wp_register_style( 'wos_libraries_css', get_stylesheet_directory_uri() . '/wos/dist/css/libraries.min.css' );
  wp_enqueue_style( 'wos_libraries_css' );

}
add_action('enqueue_block_editor_assets', 'load_editor_wos_style_scripts');
?>