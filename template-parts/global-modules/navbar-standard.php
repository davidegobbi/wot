<div id="wrapper-navbar" class="m-navbar1"><!-- classes available: -fixedtop, -fullscreen -->
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark m-navbar1__nav"><!-- if you change navbar-expand-x class, remember to change mobile breakpoint in stylesheet -->
      <div class="site-branding">
        <?php
        if( function_exists( 'the_custom_logo' ) ) {
          if(has_custom_logo()) {
            the_custom_logo();
          } else {
            echo '<a href="' . get_site_url() . '">' . get_bloginfo( 'name' ) . '</a>';
          }
        }
        ?>
      </div><!-- .site-branding -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'wot' ); ?>">
        <span class="navbar-toggler-icon"></span>
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
