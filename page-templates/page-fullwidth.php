<?php
/*
Template name: Full width
*/

get_header();
?>

<?php
while ( have_posts() ) :
  the_post();
  get_template_part( 'template-parts/content', 'page' );
endwhile; // End of the loop.
?>
</main><!-- #primary.site-main (open in header.php) -->

<?php
get_footer();
