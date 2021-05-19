<?php
$idElement = '1';
$header_container = get_field( 'header_container' );

if ( have_rows( 'header_standard_style' ) ) :
  while ( have_rows( 'header_standard_style' ) ) : the_row();

  if ( have_rows( 'immagine_di_sfondo' ) ) :
    while ( have_rows( 'immagine_di_sfondo' ) ) : the_row();
    $backgroundImage_file = get_sub_field( 'file' );
    $backgroundImage_allineamento_orizzontale = get_sub_field( 'allineamento_orizzontale' );
    $backgroundImage_allineamento_verticale = get_sub_field( 'allineamento_verticale' );
  endwhile; endif;
  if ( have_rows( 'immagine_di_sfondo_mobile' ) ) :
    while ( have_rows( 'immagine_di_sfondo_mobile' ) ) : the_row();
    $backgroundImage_mobile_file = get_sub_field( 'file' );
    $backgroundImage_mobile_allineamento_orizzontale = get_sub_field( 'allineamento_orizzontale' );
    $backgroundImage_mobile_allineamento_verticale = get_sub_field( 'allineamento_verticale' );
  endwhile; endif;

  $header_standard_style_title = get_sub_field( 'header_standard_style_title' );
  $header_standard_style_subtitle = get_sub_field( 'header_standard_style_subtitle' );
  $header_standard_style_description = get_sub_field( 'header_standard_style_description' );
  $header_standard_style_link = get_sub_field( 'header_standard_style_link' );

endwhile;
endif;
?>


<div id="header1_<?php echo $idElement; ?>" class="m-header1">
  <div class="m-header1__overlay"></div>
  <div class="<?php echo $header_container; ?>">
    <div class="row">
      <div class="col-12">
        <div class="m-header1__content">
          <?php if ($header_standard_style_title) : ?>
            <h1 class="m-header1__title">
              <?php echo $header_standard_style_title; ?>
            </h1>
            <?php
          endif;
          if ($header_standard_style_subtitle) :
            ?>
            <p class="m-header1__subtitle">
              <?php echo $header_standard_style_subtitle; ?>
            </p>
            <?php
          endif;
          if ($header_standard_style_description) :
            ?>
            <p class="m-header1__description">
              <?php echo $header_standard_style_description; ?>
            </p>
            <?php
          endif;
          if ($header_standard_style_link) :
            ?>
            <a class="btn btn-primary btn-lg m-header1__button" href="<?php echo esc_url( $header_standard_style_link['url'] ); ?>" target="<?php echo esc_attr( $header_standard_style_link['target'] ); ?>">
              <?php echo esc_html( $header_standard_style_link['title'] ); ?>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>


<style>
<?php
if ( $backgroundImage_file ) :
  ?>
  #header1_<?php echo $idElement; ?> {
    background-image: url('<?php echo esc_url( $backgroundImage_file['url'] ); ?>');
    background-position: <?php echo $backgroundImage_allineamento_orizzontale . ' ' . $backgroundImage_allineamento_verticale; ?>;
  }
  <?php
endif;

if ( $backgroundImage_mobile_file ) :
  ?>
  @media screen and (max-width: 767px) {
    #header1_<?php echo $idElement; ?> {
      background-image: url('<?php echo esc_url( $backgroundImage_mobile_file['url'] ); ?>');
      background-position: <?php echo $backgroundImage_mobile_allineamento_orizzontale . ' ' . $backgroundImage_mobile_allineamento_verticale; ?>;
    }
  }
  <?php
endif;
?>
</style>
