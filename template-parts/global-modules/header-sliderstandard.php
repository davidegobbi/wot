<div class="splide wrapper_m-header1" id="header1__slider1">
  <div class="splide__track">
    <ul class="splide__list">

      <?php
      $header_container = get_field( 'header_container' );
      if ( get_field( 'header_standard_style_activate_overlay' ) == 1 ) {
        $header_standard_style_overlay = true;
      }
      $header_standard_style_overlay_color = get_field( 'header_standard_style_overlay_color' );
      $idElement = 0;
      if ( have_rows( 'slider_standard_style' ) ) :
        while ( have_rows( 'slider_standard_style' ) ) : the_row();
        $idElement++;
        ?>

        <li class="splide__slide">

          <?php

          /*
          Content
          */

          // Background image
          if ( have_rows( 'slider_standard_style_background_image' ) ) :
            while ( have_rows( 'slider_standard_style_background_image' ) ) : the_row();
            $backgroundImage_file = get_sub_field( 'file' );
            $backgroundImage_horizontal_align = get_sub_field( 'horizontal_align' );
            $backgroundImage_vertical_align = get_sub_field( 'vertical_align' );
          endwhile; endif;

          // Mobile background image
          if ( have_rows( 'slider_standard_style_background_image_mobile' ) ) :
            while ( have_rows( 'slider_standard_style_background_image_mobile' ) ) : the_row();
            $backgroundImage_mobile_file = get_sub_field( 'file' );
            $backgroundImage_mobile_horizontal_align = get_sub_field( 'horizontal_align' );
            $backgroundImage_mobile_vertical_align = get_sub_field( 'vertical_align' );
          endwhile; endif;

          // Text content
          $slider_standard_style_title = get_sub_field( 'slider_standard_style_title' );
          $slider_standard_style_subtitle = get_sub_field( 'slider_standard_style_subtitle' );
          $slider_standard_style_description = get_sub_field( 'slider_standard_style_description' );
          $slider_standard_style_link = get_sub_field( 'slider_standard_style_link' );

          ?>


          <div id="header1_<?php echo $idElement; ?>" class="m-header1">
            <?php if ($header_standard_style_overlay == true) : ?>
              <div class="m-header1__overlay"></div>
            <?php endif; ?>
            <div class="<?php echo $header_container; ?>">
              <div class="row">
                <div class="col-12">
                  <div class="m-header1__content">
                    <?php if ($slider_standard_style_title) : ?>
                      <h1 class="m-header1__title">
                        <?php echo $slider_standard_style_title; ?>
                      </h1>
                      <?php
                    endif;
                    if ($slider_standard_style_subtitle) :
                      ?>
                      <p class="m-header1__subtitle">
                        <?php echo $slider_standard_style_subtitle; ?>
                      </p>
                      <?php
                    endif;
                    if ($slider_standard_style_description) :
                      ?>
                      <p class="m-header1__description">
                        <?php echo $slider_standard_style_description; ?>
                      </p>
                      <?php
                    endif;
                    if ($slider_standard_style_link) :
                      ?>
                      <a class="btn btn-primary btn-lg m-header1__button" href="<?php echo esc_url( $slider_standard_style_link['url'] ); ?>" target="<?php echo esc_attr( $slider_standard_style_link['target'] ); ?>">
                        <?php echo esc_html( $slider_standard_style_link['title'] ); ?>
                      </a>
                    <?php endif; ?>
                  </div>

                </div><!-- .col -->
              </div><!-- .row -->
            </div><!-- .container -->

          </div><!-- m-header1 -->

          <style>
          <?php
          if ( $backgroundImage_file ) :
            ?>
            #header1_<?php echo $idElement; ?> {
              background-image: url('<?php echo esc_url( $backgroundImage_file['url'] ); ?>');
              background-position: <?php echo $backgroundImage_horizontal_align . ' ' . $backgroundImage_vertical_align; ?>;
            }
            <?php
          endif;

          if ( $backgroundImage_mobile_file ) :
            ?>
            @media screen and (max-width: 767px) {
              #header1_<?php echo $idElement; ?> {
                background-image: url('<?php echo esc_url( $backgroundImage_mobile_file['url'] ); ?>');
                background-position: <?php echo $backgroundImage_mobile_horizontal_align . ' ' . $backgroundImage_mobile_vertical_align; ?>;
              }
            }
            <?php
          endif;
          ?>
          </style>


        </li>

        <?php
      endwhile; endif;

      if ($header_standard_style_overlay == true) :
        ?>
        <style>
        .m-header1__overlay {
          background-color: <?php echo $header_standard_style_overlay_color; ?>
        }
        </style>
      <?php endif; ?>

    </ul>
  </div>
</div>
