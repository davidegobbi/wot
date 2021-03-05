<?php


/*
Add WooCommerce support
*/
function add_woocommerce_support() {
  add_theme_support( 'woocommerce' );
  add_theme_support( 'wc-product-gallery-zoom' );
  add_theme_support( 'wc-product-gallery-lightbox' );
  add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'add_woocommerce_support' );


/*
Remove WooCommerce standard style
*/
/*
if (class_exists('Woocommerce')){
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
}
*/


/**
 * Adding bootstrap classes to woocommerce checkout form
 */
 add_filter('woocommerce_form_field_args',  'wc_form_field_args',10,3);
 function wc_form_field_args($args, $key, $value) {
   $args['input_class'] = array( 'form-control' );
   return $args;
 }
