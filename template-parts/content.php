<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WOT
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
