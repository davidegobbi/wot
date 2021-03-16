<?php
/*
Title: widget documentazione in dashboard
*/
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

function my_custom_dashboard_widgets() {
  global $wp_meta_boxes;

  wp_add_dashboard_widget('custom_help_widget', 'Documentazione', 'custom_dashboard_help');
}

function custom_dashboard_help() {
  echo '<p><a href="'.get_stylesheet_directory_uri().'/documentation/user-doc" target="_blank">Vedi documentazione d\'uso</a></p>';
  echo '<p><a href="'.get_stylesheet_directory_uri().'/documentation/dev-doc" target="_blank">Vedi documentazione di sviluppo</a></p>';
}
