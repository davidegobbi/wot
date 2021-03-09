<?php
/**
* The template for displaying 404 pages (not found)
*
* @link https://codex.wordpress.org/Creating_an_Error_404_Page
*
* @package WOT
*/

get_header();
?>

<main id="primary" class="site-main">
	<div class="container my-5" style="min-height: 70vh;">
		<div class="row">
			<div class="col-12">
				<?php get_template_part( 'template-parts/content', '404' ); ?>
			</div>
		</div>
	</div>
</main><!-- #main -->

<?php
get_footer();
