<?php
/**
* Template part for displaying results in search pages
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package WOT
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container mt-4">
		<div class="row">
			<div class="col-12">

				<header class="entry-header">
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				</header><!-- .entry-header -->

				<?php wot_post_thumbnail(); ?>

				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->

			</div><!-- .col-x -->
		</div><!-- .row -->
	</div><!-- .container -->
</article><!-- #post-<?php the_ID(); ?> -->
