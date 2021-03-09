<?php
/**
* Template part for displaying 404 content
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package WOT
*/

?>

<section class="error-404 not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'wot' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'wot' ); ?></p>
		<p>
			<a href="<?php echo site_url(); ?>" class="btn btn-primary">
				Home
			</a>
		</p>
	</div><!-- .page-content -->
	
</section><!-- .error-404 -->
