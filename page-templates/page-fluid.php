<?php
/*
Template name: Fluid page
*/

get_header();
?>

<main id="primary" class="site-main">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <?php
        while ( have_posts() ) :
          the_post();
          get_template_part( 'template-parts/content', 'page' );
        endwhile; // End of the loop.
        ?>
      </div>
    </div>
  </div>
</main><!-- #main -->

<?php
get_footer();
