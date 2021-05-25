<?php
$idElement = rand(1, 99999999); // generate random number to uniquely identify the card
$card1_container = get_field( 'card1_container' );
if ( get_field( 'card1_activate_overlay' ) == 1 ) {
  $card1_overlay = true;
}
$card1_overlay_color = get_field( 'card1_overlay_color' );

/*
Content
*/

// Background image
if ( have_rows( 'card1_background_image' ) ) :
  while ( have_rows( 'card1_background_image' ) ) : the_row();
  $backgroundImage_file = get_sub_field( 'file' );
  $backgroundImage_horizontal_align = get_sub_field( 'horizontal_align' );
  $backgroundImage_vertical_align = get_sub_field( 'vertical_align' );
endwhile; endif;

// Mobile background image
if ( have_rows( 'card1_background_image_mobile' ) ) :
  while ( have_rows( 'card1_background_image_mobile' ) ) : the_row();
  $backgroundImage_mobile_file = get_sub_field( 'file' );
  $backgroundImage_mobile_horizontal_align = get_sub_field( 'horizontal_align' );
  $backgroundImage_mobile_vertical_align = get_sub_field( 'vertical_align' );
endwhile; endif;

// Text content
$card1_title = get_field( 'card1_title' );
$card1_subtitle = get_field( 'card1_subtitle' );
$card1_description = get_field( 'card1_description' );
$card1_link = get_field( 'card1_link' );

?>


<div id="card1_<?php echo $idElement; ?>" class="m-card1">

  <?php if ($card1_overlay == true) : ?>
    <div class="m-card1__overlay"></div>
    <style>
    #card1_<?php echo $idElement; ?> .m-card1__overlay {
      background-color: <?php echo $card1_overlay_color; ?>
    }
    </style>
  <?php endif; ?>

  <div class="<?php echo $card1_container; ?>">
    <div class="row">
      <div class="col-12">
        <div class="m-card1__content">
          <?php if ($card1_title) : ?>
            <h1 class="m-card1__title">
              <?php echo $card1_title; ?>
            </h1>
            <?php
          endif;
          if ($card1_subtitle) :
            ?>
            <p class="m-card1__subtitle">
              <?php echo $card1_subtitle; ?>
            </p>
            <?php
          endif;
          if ($card1_description) :
            ?>
            <p class="m-card1__description">
              <?php echo $card1_description; ?>
            </p>
            <?php
          endif;
          if ($card1_link) :
            ?>
            <a class="btn btn-primary btn-lg m-card1__button" href="<?php echo esc_url( $card1_link['url'] ); ?>" target="<?php echo esc_attr( $card1_link['target'] ); ?>">
              <?php echo esc_html( $card1_link['title'] ); ?>
            </a>
          <?php endif; ?>
        </div>

      </div><!-- .col -->
    </div><!-- .row -->
  </div><!-- .container -->

</div><!-- m-card1 -->

<style>
<?php
if ( $backgroundImage_file ) :
  ?>
  #card1_<?php echo $idElement; ?> {
    background-image: url('<?php echo esc_url( $backgroundImage_file['url'] ); ?>');
    background-position: <?php echo $backgroundImage_horizontal_align . ' ' . $backgroundImage_vertical_align; ?>;
  }
  <?php
endif;

if ( $backgroundImage_mobile_file ) :
  ?>
  @media screen and (max-width: 767px) {
    #card1_<?php echo $idElement; ?> {
      background-image: url('<?php echo esc_url( $backgroundImage_mobile_file['url'] ); ?>');
      background-position: <?php echo $backgroundImage_mobile_horizontal_align . ' ' . $backgroundImage_mobile_vertical_align; ?>;
    }
  }
  <?php
endif;
?>
</style>
