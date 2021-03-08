<div id="wrapper-navbar">

  <nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">

    <!-- Brand and toggle get grouped for better mobile display -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'wot' ); ?>">
      <span class="navbar-toggler-icon"></span>
    </button>

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

    <?php
    wp_nav_menu( array(
      'theme_location'  => 'menu-primary',
      'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
      'container'       => 'div',
      'container_class' => 'collapse navbar-collapse',
      'container_id'    => 'bs-example-navbar-collapse-1',
      'menu_class'      => 'navbar-nav ml-auto',
      'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
      'walker'          => new WP_Bootstrap_Navwalker(),
    ) );
    ?>

  </nav>

</div><!-- #wrapper-navbar end -->
