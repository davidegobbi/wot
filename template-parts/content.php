<?php
/**
* Template part for displaying posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package WOT
*/

?>


<header class="page-header">
	<h1 class="page-title">
		<?php the_title(); ?>
	</h1>
</header>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_content(); ?>
</article><!-- #post-<?php the_ID(); ?> -->
