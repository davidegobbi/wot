if ($('.m-navbar1').length) {


  /*
  Initial appearance
  */

  if ( $('#wpadminbar' ).length ) {
    var adminbar_height_initial = parseInt( $('#wpadminbar' ).css('height') );
  }
  if ( $('div[class^="m-topbar"], div[class*=" m-topbar"]' ).length ) {
    var topbar_paddingRight_initial = parseInt( $('div[class^="m-topbar"], div[class*=" m-topbar"]' ).css('padding-right') );
  }
  if ( $('div[class^="m-header"], div[class*=" m-header"]' ).length ) {
    var header_paddingTop_initial = parseInt( $('div[class^="m-header"], div[class*=" m-header"]' ).css('padding-top') );
  }
  var navbar_height_initial = $('.m-navbar1').height();
  var navbar_paddingBottom_initial = $('.m-navbar1').css('padding-bottom');
  var main_paddingTop_initial = parseInt( $('main#primary.site-main').css('padding-top') );
  var main_paddingRight_initial = parseInt( $('main#primary.site-main').css('padding-right') );


  // Fixedtop
  if ( $('.m-navbar1.-fixedtop').length ) {
    var hasFixedTop = true;
  } else {
    var hasFixedTop = false;
  }
  // Trasparent
  if ( $('.m-navbar1.-transparent').length ) {
    var hasTransparent = true;
  } else {
    var hasTransparent = false;
  }
  // Fullscreen
  if ( $('.m-navbar1.-fullscreen').length ) {
    var hasFullscreen = true;
  } else {
    var hasFullscreen = false;
  }


  /*
  Context
  */

  // WpAdminBar
  if ( $('#wpadminbar').length ) {
    var hasAdminBar = true;
  } else {
    var hasAdminBar = false;
  }
  // Topbar
  if ( $('div[class^="m-topbar"], div[class*=" m-topbar"]').length ) {
    var hasTopbar = true;
  } else {
    var hasTopbar = false;
  }


  /*
  Se fixedTop, aggiungo anche fullscreen
  */
  if ( hasFixedTop == true ) {
    $('.m-navbar1').addClass('-fullscreen');
    var hasFullscreen = true;
  }


  /*
  Functions
  */


  /**
  * @title: Navbar top offset
  * @description: Calcolo il top offset della navbar nel caso siano presenti Wp Admin Bar e Topbar
  * @return: {integer} navbarOffsetTop
  **/
  function fn_navbarOffsetTop() {

    /*
    elements height
    */

    // wpadminbar_Height
    if (hasAdminBar == true) {
      var wpadminbar_Height = $('#wpadminbar').height();
    } else {
      var wpadminbar_Height = 0;
    }

    // topbar_Height
    if (hasTopbar == true) {
      var topbar_Height = $('div[class^="m-topbar"], div[class*=" m-topbar"]').height();
    } else {
      var topbar_Height = 0;
    }

    // calculate
    navbarOffsetTop = wpadminbar_Height + topbar_Height;

    return navbarOffsetTop;

  }



  /**
  * @title Navbar margin-top
  * @return Applico un margin top alla navbar
  **/
  function fn_navbarMarginTop( marginTop_value ) {
    if ( marginTop_value ) {
      $('.m-navbar1').css('margin-top', marginTop_value);
    } else {
      $('.m-navbar1').css('margin-top', '0');
    }
  }



  /**
  * @title Main margin top
  * @return Applico un margin top alla navbar
  **/
  function fn_mainMarginTop( marginTop_value ) {
    if ( marginTop_value ) {
      $('main#primary.site-main')
      .css('margin-top', marginTop_value)
      .css('transition', 'margin-top .3s ease');
    } else {
      $('main#primary.site-main').css('margin-top', '0');
    }
  }



  /**
  * @title Main padding top
  * @return Applico applico un padding top all'header se esiste oppure al main
  **/
  function fn_mainPaddingTop() {

    if( $('div[class^="m-header"], div[class*=" m-header"]').length ) {

      /*
      to header if exists
      */

      // aggiungo l'altezza della navbar al padding-top iniziale dell'header
      var header_paddingTop_new = header_paddingTop_initial + navbar_height_initial;

      // applico il nuovo padding-top all'header
      $('div[class^="m-header"], div[class*=" m-header"]').first().css('padding-top', header_paddingTop_new + 'px' );

    } else {

      /*
      else to main page
      */

      // aggiungo l'altezza della navbar padding-top iniziale del main page
      var main_paddingTop_new = main_paddingTop_initial + navbar_height_initial;

      $('main#primary.site-main').css('padding-top', main_paddingTop_new + 'px' );

    }

  }



  /**
  * @title Navbar fixed top
  * @return Applico lo stile "fixed top" alla navbar
  **/
  function fn_navbarFixedTop() {

    // navbar margin-top
    fn_navbarMarginTop( fn_navbarOffsetTop() );

    // main margin-top se non è transparent
    if ( hasTransparent == false ) {
      fn_mainMarginTop( navbar_height_initial );
    }

  }



  /**
  * @title Navbar transparent
  * @return Applico lo stile "trasparent" alla navbar
  **/
  function fn_navbarTransparent() {

    // hide collapse (close menu)
    $('#navbarSupportedContent').collapse('hide');

    // restore margin-top to navbar
    fn_navbarMarginTop();

    // add negative margin top to main page
    fn_mainMarginTop(-navbar_height_initial);

    // add padding top to header or main page
    fn_mainPaddingTop();

  }



  /*
  On document load
  */

  if ( hasTransparent == true ) {
    fn_navbarTransparent();
  }

  if ( hasTransparent == false ) {
    $('.m-navbar1').addClass('-bgColor');
  }

  if ( hasFixedTop == true ) {
    fn_navbarFixedTop();
  }

  if ( hasFixedTop == true && hasTransparent == true ) {
    fn_navbarMarginTop( fn_navbarOffsetTop() ); // aggiungo eventuale margin-top a navbar (per WP Admin Bar e/o Topbar)
    fn_mainMarginTop(); // elimino margin-top a main page
  }



  /*
  On window resize
  */
  $(window).on('resize', function(){

    if ( hasFixedTop == true ) {
      fn_navbarFixedTop();
    }

    if ( hasTransparent == true ) {
      fn_navbarTransparent();
    }

    if ( hasFixedTop == true && hasTransparent == true ) {
      fn_navbarMarginTop( fn_navbarOffsetTop() ); // aggiungo eventuale margin-top a navbar (per WP Admin Bar e/o Topbar)
      fn_mainMarginTop(); // elimino margin-top a main page
    }

  });



  /*
  On window scroll
  */
  $(window).on('scroll', function(){

    if (hasFixedTop == true) {

      // modifico il margin-top della navbar per lasciare posto alla topbar nel caso in cui ci si trovi in cima alla pagina

      var window_offsetTop = $(window).scrollTop();

      if (window_offsetTop > 0) {
        $('.m-navbar1').addClass('-bgColor');
        if ( hasAdminBar == true ) {
          fn_navbarMarginTop( adminbar_height_initial );
        } else {
          fn_navbarMarginTop();
        }
      } else {
        if ( hasTransparent == true ) {
          if ( $('.m-navbar1 .collapsing').length ) {
          } else {
            $('.m-navbar1').removeClass('-bgColor');
          }
        }
        fn_navbarFixedTop();
      }

    }

  });



  /*
  On collapse menu show
  */
  $('#navbarSupportedContent').on('show.bs.collapse', function () {


    // body
    if ( hasFullscreen == true ) {
      $('body')
      .css('overflow-y', 'hidden')
      ;
    }
    if ( hasFixedTop == true ) {
      $(window).scrollTop(0);
    }



    // topbar
    if ( hasTopbar == true && hasFullscreen == true) {
      var topbar_paddingRight_initial_new = topbar_paddingRight_initial + 15;
      $('div[class^="m-topbar"], div[class*=" m-tobar"]')
      .css('padding-right', topbar_paddingRight_initial_new + 'px');
      ;
    }


    // navbar
    $('.m-navbar1')
    .addClass('-bgColor')
    ;
    if ( hasFullscreen == true ) {
      $('.m-navbar1')
      .css('min-height', 'calc( 100vh + ' + navbar_height_initial + 'px )')
      .css('overflow-y', 'scroll')
      .css('position', 'absolute')
      ;

      /*
      Aggiungo un padding-bottom per compensare il top offset
      */
      var navbar_paddingBottom_new = navbar_height_initial + fn_navbarOffsetTop();
      $('.m-navbar1')
      .css('padding-bottom', navbar_paddingBottom_new + 'px')
      ;
    }


    if ( hasTransparent == true || hasFullscreen == true ) {
      $('main#primary.site-main')
      .css('margin-top', '0')
      ;
    }


  }) // On mobile menu show



  /*
  On collapse menu hide
  */
  $('#navbarSupportedContent').on('hide.bs.collapse', function () {


    // body
    $('body')
    .css('overflow-y', 'auto')
    .css('padding-right', '0')
    .css('padding-bottom', navbar_paddingBottom_initial + 'px')
    .css('min-height', 'auto' )
    ;


    // topbar
    if ( hasTopbar == true ) {
      $('div[class^="m-topbar"], div[class*=" m-tobar"]')
      .css('padding-right', topbar_paddingRight_initial + 'px');
      ;
    }


    // navbar
    $('.m-navbar1')
    .css('min-height', '0')
    .css('overflow-y', 'hidden')
    .css('padding-bottom', navbar_paddingBottom_initial)
    .css('position', 'relative')
    ;
    if ( hasFixedTop == true ) {
      $('.m-navbar1')
      .css('position', 'fixed')
      ;
    }

    if ( hasTransparent == true ) {

      // remove background color
      setTimeout(function () {
        $('.m-navbar1')
        .removeClass('-bgColor')
        ;
      }, 300);

    }


    // main page
    $('main#primary.site-main')
    .css('padding-right', main_paddingRight_initial + 'px')
    ;
    if ( hasTransparent == true ) {
      fn_mainMarginTop(-navbar_height_initial);
    }
    if ( hasTransparent == true && hasFullscreen == true && hasFixedTop == true ) {
      fn_mainMarginTop();
    }


  }) // On mobile menu hide

}
