<?php
/**
* Template part for displaying page content in page.php
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package WOT
*/

?>

<div class="row">
	<div class="col-12">
		<h1>
			<?php the_title(); ?>
		</h1>
	</div>
</div>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_content(); ?>
</article><!-- #post-<?php the_ID(); ?> -->
