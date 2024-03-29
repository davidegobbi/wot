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
ACF Block initialization
*/
add_action('acf/init', 'my_acf_init');


/*
Register blocks
*/
function my_acf_init() {
  if( function_exists('acf_register_block') ) {

    //require get_template_directory() . '/wos/templates/3_modules/card1/wp/acf/register-card1.php';

  }
}

/*
Register ACF block fields
*/
//require get_template_directory() . '/wos/templates/3_modules/card1/wp/acf/acf-card1.php';


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
