<?php
/*
Template name: Fluid page
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

<div class="container-fluid">
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
</main><!-- #primary.site-main (open in header.php) -->

<?php
get_footer();
