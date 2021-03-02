<?php
/**
* The header for our theme
*
* This is the template that displays all of the <head> section and everything up until <div id="content">
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package WOT
*/

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">


		<div id="wrapper-navbar">

			<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'wot' ); ?></a>

			<nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">

				<div class="container">

					<!-- Brand and toggle get grouped for better mobile display -->
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'your-theme-slug' ); ?>">
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
						'menu_class'      => 'navbar-nav mr-auto',
						'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
						'walker'          => new WP_Bootstrap_Navwalker(),
					) );
					?>

				</div>

			</nav>

		</div><!-- #wrapper-navbar end -->
