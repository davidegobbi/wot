<?php
/**
* The template for displaying the footer
*
* Contains the closing of the #content div and all content after.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package WOT
*/


/*
BLOCCHI GLOBALI
*/
// Inizializzo variabili blocchi globali
$activeFooter = null;
$styleFooter = null;
$activeBottombar = null;
$styleBottombar = null;


// Setto attivazione blocchi sulla base delle scelte nei campi ACF
if ( have_rows( 'attiva_sezioni' ) ) :
  while ( have_rows( 'attiva_sezioni' ) ) :
    the_row();
    if ( get_sub_field( 'attiva_footer' ) == 1 ) :
      $activeFooter = true;
      $styleFooter = get_field( 'footer_style' );
    endif;
    if ( get_sub_field( 'attiva_bottombar' ) == 1 ) :
      $activeBottombar = true;
      $styleBottombar = get_field( 'bottombar_style' );
    endif;
  endwhile;
endif;


/*
Forzo attivazione a determinate condizioni
*/
// se homepage "ultimi articoli"
if ( is_home() ) :
  $activeFooter = true;
  $styleFooter = 'standard';
  $activeBottombar = true;
  $styleBottombar = 'standard';
endif;
// se single post
if ( is_single() ) :
  $activeFooter = true;
  $styleFooter = 'standard';
  $activeBottombar = true;
  $styleBottombar = 'standard';
endif;
// se archive post
if ( is_archive() ) :
  $activeFooter = true;
  $styleFooter = 'standard';
  $activeBottombar = true;
  $styleBottombar = 'standard';
endif;
// se pagina Woocommerce
if ( is_woocommerce() ) :
  $activeFooter = true;
  $styleFooter = 'standard';
  $activeBottombar = true;
  $styleBottombar = 'standard';
endif;


/*
Infine, attivo blocchi richiesti
*/
if ($activeFooter == true) {
  get_template_part( 'template-parts/global-modules/footer', $styleFooter );
}
if ($activeBottombar == true) {
  get_template_part( 'template-parts/global-modules/bottombar', $styleBottombar );
}
?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
