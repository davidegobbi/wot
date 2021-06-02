<div class="splide wrapper_m-slider1" id="slider1__slider1">
  <div class="splide__track">
    <ul class="splide__list">

      <?php
      $header_container = get_field( 'header_container' );
      if ( get_field( 'slider1_activate_overlay' ) == 1 ) {
        $slider1_overlay = true;
      }
      $slider1_overlay_color = get_field( 'slider1_overlay_color' );
      $idElement = 0;
      if ( have_rows( 'slider1_repeater' ) ) :
        while ( have_rows( 'slider1_repeater' ) ) : the_row();
        $idElement++;
        ?>

        <li class="splide__slide">

          <?php

          /*
          Content
          */

          // Background image
          if ( have_rows( 'slider1_background_image' ) ) :
            while ( have_rows( 'slider1_background_image' ) ) : the_row();
            $backgroundImage_file = get_sub_field( 'file' );
            $backgroundImage_horizontal_align = get_sub_field( 'horizontal_align' );
            $backgroundImage_vertical_align = get_sub_field( 'vertical_align' );
          endwhile; endif;

          // Mobile background image
          if ( have_rows( 'slider1_background_image_mobile' ) ) :
            while ( have_rows( 'slider1_background_image_mobile' ) ) : the_row();
            $backgroundImage_mobile_file = get_sub_field( 'file' );
            $backgroundImage_mobile_horizontal_align = get_sub_field( 'horizontal_align' );
            $backgroundImage_mobile_vertical_align = get_sub_field( 'vertical_align' );
          endwhile; endif;

          // Text content
          $slider1_title = get_sub_field( 'slider1_title' );
          $slider1_subtitle = get_sub_field( 'slider1_subtitle' );
          $slider1_description = get_sub_field( 'slider1_description' );
          $slider1_link = get_sub_field( 'slider1_link' );

          ?>


          <div id="slider1_<?php echo $idElement; ?>" class="m-slider1">
            <?php if ($slider1_overlay == true) : ?>
              <div class="m-slider1__overlay"></div>
            <?php endif; ?>
            <div class="<?php echo $header_container; ?>">
              <div class="row">
                <div class="col-12">
                  <div class="m-slider1__content">
                    <?php if ($slider1_title) : ?>
                      <h1 class="m-slider1__title">
                        <?php echo $slider1_title; ?>
                      </h1>
                      <?php
                    endif;
                    if ($slider1_subtitle) :
                      ?>
                      <p class="m-slider1__subtitle">
                        <?php echo $slider1_subtitle; ?>
                      </p>
                      <?php
                    endif;
                    if ($slider1_description) :
                      ?>
                      <p class="m-slider1__description">
                        <?php echo $slider1_description; ?>
                      </p>
                      <?php
                    endif;
                    if ($slider1_link) :
                      ?>
                      <a class="btn btn-primary btn-lg m-slider1__button" href="<?php echo esc_url( $slider1_link['url'] ); ?>" target="<?php echo esc_attr( $slider1_link['target'] ); ?>">
                        <?php echo esc_html( $slider1_link['title'] ); ?>
                      </a>
                    <?php endif; ?>
                  </div>

                </div><!-- .col -->
              </div><!-- .row -->
            </div><!-- .container -->

          </div><!-- m-slider1 -->

          <style>
          <?php
          if ( $backgroundImage_file ) :
            ?>
            #slider1_<?php echo $idElement; ?> {
              background-image: url('<?php echo esc_url( $backgroundImage_file['url'] ); ?>');
              background-position: <?php echo $backgroundImage_horizontal_align . ' ' . $backgroundImage_vertical_align; ?>;
            }
            <?php
          endif;

          if ( $backgroundImage_mobile_file ) :
            ?>
            @media screen and (max-width: 767px) {
              #slider1_<?php echo $idElement; ?> {
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

      if ($slider1_overlay == true) :
        ?>
        <style>
        .m-slider1__overlay {
          background-color: <?php echo $slider1_overlay_color; ?>
        }
        </style>
      <?php endif; ?>

    </ul>
  </div>
</div>
