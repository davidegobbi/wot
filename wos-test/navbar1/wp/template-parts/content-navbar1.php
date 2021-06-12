<?php
/*
Container
*/
if (get_field( 'navbar_container' )) {
  $navbar_container = get_field( 'navbar_container' );
} else {
  $navbar_container = 'container-fluid';
}

/*
Light/Dark mode
*/
// Background
if (get_field( 'navbar_mode' )) {
  $navbar_mode = get_field( 'navbar_mode' ); // 'light' or 'dark'
} else {
  $navbar_mode = '-light'; // default
}
// Color
if ( $navbar_mode == '-light' ) {
  $navbar_color = 'navbar-light';
} elseif ( $navbar_mode == '-dark' ) {
  $navbar_color = 'navbar-dark';
}

if ( $navbar_mode == '-light' ) {
  if ( get_theme_mod('logoDark') ) {
    $logoDark = wp_get_attachment_image_src( get_theme_mod('logoDark') );
    $logoDark_link = '<a href="' . site_url() . '" class="navbar-brand" rel="home"><img src="' . $logoDark[0] . '" class="custom-logo" alt="Logo dark"></a>';
  }
}
?>

<div id="wrapper-navbar" class="m-navbar1 <?php echo $navbar_mode; ?> -fullscreen -transparent -fixedtop"><!-- classes available: -fullscreen, -transparent, -fixedtop -->
  <div class="<?php echo $navbar_container; ?>">
    <nav class="navbar <?php echo $navbar_color; ?> m-navbar1__nav"><!-- if you change navbar-expand-x class, remember to change mobile breakpoint in stylesheet -->
      <div class="site-branding">
        <?php
        if ( $navbar_mode == '-light' ) {
          if ( get_theme_mod('logoDark') ) {
            echo $logoDark_link;
          } elseif ( function_exists( 'the_custom_logo' ) ) {
            if(has_custom_logo()) {
              the_custom_logo();
            } else {
              echo '<a href="' . get_site_url() . '">' . get_bloginfo( 'name' ) . '</a>';
            }
          }
        } elseif ( function_exists( 'the_custom_logo' ) ) {
          if(has_custom_logo()) {
            the_custom_logo();
          } else {
            echo '<a href="' . get_site_url() . '">' . get_bloginfo( 'name' ) . '</a>';
          }
        }
        ?>
      </div><!-- .site-branding -->
      <button class="navbar-toggler m-navbar1__toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'wot' ); ?>">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <?php
      wp_nav_menu( array(
        'theme_location'  => 'menu-primary', // registered in inc/register-nav.php
        'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
        'container'       => 'div',
        'container_class' => 'collapse navbar-collapse',
        'container_id'    => 'navbarSupportedContent',
        'menu_class'      => 'navbar-nav mr-auto',
        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
        'walker'          => new WP_Bootstrap_Navwalker(),
      ) );
      ?>
    </nav>
  </div>
</div>
