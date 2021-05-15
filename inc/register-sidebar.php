<?php
/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*/


function wot_widgets_init() {
  register_sidebar(
    array(
      'name'          => esc_html__( 'Topbar colonna 1', 'wot' ),
      'id'            => 'topbar-col-1',
      'description'   => esc_html__( 'Aggiungi qui i widget', 'wot' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title' => '<span class="d-none">',
      'after_title' => '</span>',
    )
  );
  register_sidebar(
    array(
      'name'          => esc_html__( 'Barra laterale sinistra', 'wot' ),
      'id'            => 'left-sidebar',
      'description'   => esc_html__( 'Aggiungi qui i widget', 'wot' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );
  register_sidebar(
    array(
      'name'          => esc_html__( 'Barra laterale destra', 'wot' ),
      'id'            => 'right-sidebar',
      'description'   => esc_html__( 'Aggiungi qui i widget', 'wot' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );
  register_sidebar(
    array(
      'name'          => esc_html__( 'Footer colonna 1', 'wot' ),
      'id'            => 'footer-col-1',
      'description'   => esc_html__( 'Aggiungi qui i widget', 'wot' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );
  register_sidebar(
    array(
      'name'          => esc_html__( 'Bottombar colonna 1', 'wot' ),
      'id'            => 'bottombar-col-1',
      'description'   => esc_html__( 'Aggiungi qui i widget', 'wot' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );
}
add_action( 'widgets_init', 'wot_widgets_init' );
