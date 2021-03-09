<?php
/**
* The template for displaying all pages
*
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages
* and that other 'pages' on your WordPress site may use a
* different template.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package WOT
*/

get_header();

$activeLeftSidebar = false;
$activeRightSidebar = false;
$activeBothSidebar = false;
if ( have_rows( 'attiva_sezioni' ) ) {
	while ( have_rows( 'attiva_sezioni' ) ) {
		the_row();
		if ( get_sub_field( 'attiva_sidebar' ) == 1 ) {
			if ( get_field( 'sidebar_style' ) == 'left' ) {
				$activeLeftSidebar = true;
			}
			if ( get_field( 'sidebar_style' ) == 'right' ) {
				$activeRightSidebar = true;
			}
			if ( get_field( 'sidebar_style' ) == 'both' ) {
				$activeBothSidebar = true;
			}
		}
	}
}
?>

<main id="primary" class="site-main">
	<div class="container">
		<div class="row">

			<?php
			/*
			LEFT SIDEBAR
			*/
			if ( $activeLeftSidebar == true || $activeBothSidebar == true) {
				echo '<div class="col-md-3">';
				get_template_part( 'sidebar-templates/sidebar', 'left' );
				echo '</div>';
			}


			/*
			MAIN
			*/
			if ( $activeBothSidebar == true ) {
				echo '<div class="col-md-6">';
			} elseif ( $activeLeftSidebar == true || $activeRightSidebar == true ) {
				echo '<div class="col-md-9">';
			} else {
				echo '<div class="col-12">';
			}
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', 'page' );
			endwhile; // End of the loop.
			echo '</div>';


			/*
			RIGHT SIDEBAR
			*/
			if ( $activeRightSidebar == true || $activeBothSidebar == true) {
				echo '<div class="col-md-3">';
				get_template_part( 'sidebar-templates/sidebar', 'right' );
				echo '</div>';
			}
			?>

		</div>
	</div>
</div>
</main><!-- #main -->

<?php
get_footer();
