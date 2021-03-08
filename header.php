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

		<?php
		/*
		BLOCCHI GLOBALI
		 */
		// Inizializzo variabili blocchi globali
		$activeTopbar = null;
		$styleTopbar = null;
		$activeNavbar = null;
		$styleNavbar = null;
		$activeHeader = null;
		$styleHeader = null;
		$activeBreadcrumbs = null;
		$styleBreadcrumbs = null;


		// Setto attivazione blocchi sulla base delle scelte nei campi ACF
		if ( have_rows( 'attiva_sezioni' ) ) :
			while ( have_rows( 'attiva_sezioni' ) ) :
				the_row();
				if ( get_sub_field( 'attiva_topbar' ) == 1 ) :
					$activeTopbar = true;
					$styleTopbar = get_field( 'topbar_style' );
				endif;
				if ( get_sub_field( 'attiva_navbar' ) == 1 ) :
					$activeNavbar = true;
					$styleNavbar = get_field( 'navbar_style' );
				endif;
				if ( get_sub_field( 'attiva_header' ) == 1 ) :
					$activeHeader = true;
					$styleHeader = get_field( 'header_style' );
				endif;
				if ( get_sub_field( 'attiva_breadcrumbs' ) == 1 ) :
					$activeBreadcrumbs = true;
					$styleBreadcrumbs = get_field( 'breadcrumbs_style' );
				endif;
			endwhile;
		endif;


		/*
		Forzo attivazione a determinate condizioni
		*/
		// se homepage "ultimi articoli"
		if ( is_home() ) :
			$activeTopbar = true;
			$styleTopbar = 'standard';
			$activeNavbar = true;
			$styleNavbar = 'standard';
			$activeHeader = false;
			$styleHeader = 'standard';
			$activeBreadcrumbs = false;
			$styleBreadcrumbs = 'standard';
		endif;
		// se single post
		if ( is_single() ) :
			$activeTopbar = true;
			$styleTopbar = 'standard';
			$activeNavbar = true;
			$styleNavbar = 'standard';
			$activeHeader = true;
			$styleHeader = 'standard';
			$activeBreadcrumbs = true;
			$styleBreadcrumbs = 'standard';
		endif;
		// se archive post
		if ( is_archive() ) :
			$activeTopbar = true;
			$styleTopbar = 'standard';
			$activeNavbar = true;
			$styleNavbar = 'standard';
			$activeHeader = false;
			$styleHeader = 'standard';
			$activeBreadcrumbs = false;
			$styleBreadcrumbs = 'standard';
		endif;
		// se pagina Woocommerce
		if ( is_woocommerce() ) :
			$activeTopbar = true;
			$styleTopbar = 'standard';
			$activeNavbar = true;
			$styleNavbar = 'standard';
			$activeHeader = false;
			$styleHeader = 'standard';
			$activeBreadcrumbs = false;
			$styleBreadcrumbs = 'standard';
		endif;


		/*
		Infine, mostro blocchi richiesti
		*/
		if ($activeTopbar == true) {
			get_template_part( 'template-parts/global-modules/topbar', $styleTopbar );
		}
		if ($activeNavbar == true) {
			get_template_part( 'template-parts/global-modules/navbar', $styleNavbar );
		}
		if ($activeHeader == true) {
			get_template_part( 'template-parts/global-modules/header', $styleHeader );
		}
		if ($activeBreadcrumbs == true) {
			get_template_part( 'template-parts/global-modules/breadcrumbs', $styleBreadcrumbs );
		}
		?>
