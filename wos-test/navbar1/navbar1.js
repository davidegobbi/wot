if ($('.m-navbar1').length) {


  /*
  Status
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
  // Fixedtop
  if ( $('.m-navbar1.-fixedtop').length ) {
    var hasFixedTop = true;
  } else {
    var hasFixedTop = false;
  }
  // Trasparent
  if ( $('.m-navbar1.-transparent').length ) {
    var hasTransparent = true;
    var hasFixedTop = true;
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
  Functions
  */

  // Top Offset
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

    /*
    top offset
    */
    navbarOffsetTop = wpadminbar_Height + topbar_Height

    return navbarOffsetTop;

  }



  // Fixedtop
  function fn_navbarFixedTop() {

    //navbar_Height
    var navbar_Height = $('.m-navbar1').height();

    // add navbar margin top
    $('.m-navbar1').css('margin-top', fn_navbarOffsetTop());

    // add main padding top
    $('main.site-main')
    .css('transition', 'padding-top .3s ease')
    .css('padding-top', navbar_Height);

  } // navbarFixedTop



  // Transparent
  function fn_navbarTransparent() {

    // hide collapse (close menu)
    $('#navbarSupportedContent').collapse('hide');

    // restore navbar margin-top
    $('.m-navbar1').css('margin-top', '0');

    //navbar_Height
    var navbar_Height = $('.m-navbar1').height();

    //add negative margin top to main page
    $('main#primary.site-main').css('margin-top', '-' + navbar_Height + 'px' );

  }



  /*
  On document load
  */
  if (hasFixedTop == true && hasTransparent == false) {
    fn_navbarFixedTop();
  }
  if (hasTransparent == true) {
    fn_navbarTransparent();
  }



  /*
  On window resize
  */
  $(window).on('resize', function(){

    if (hasFixedTop == true) {
      fn_navbarFixedTop();
    }

    if (hasTransparent == true) {
      fn_navbarTransparent();
    }

  });



  /*
  On window scroll
  */
  $(window).on('scroll', function(){
    var window_offsetTop = $(window).scrollTop();

    if (hasFixedTop == true) {
      if (window_offsetTop > 0) {
        $('.m-navbar1').css('margin-top', 0);
      } else {
        if (hasTransparent == false) {
          fn_navbarFixedTop();
        }
      }
    }

  });



  /*
  On mobile menu show
  */
  $('#navbarSupportedContent').on('show.bs.collapse', function () {

    $("html, body").animate({ scrollTop: 0 }, 300);

    $('body').css('overflow', 'hidden');
    var window_offsetTop = $(window).scrollTop();

    // Fullscreen
    if (hasFullscreen == true) {

      // get window height
      var window_height = $(window).height();

      // get eventualy WpAdminBar height
      if (hasAdminBar == true) {
        var wpadminbar_Height = $('#wpadminbar').height();
      } else {
        var wpadminbar_Height = 0;
      }

      // get eventualy topbar height
      if (hasTopbar == true) {
        topbar_Height = $('div[class^="m-topbar"], div[class*=" m-topbar"]').height();
      } else {
        topbar_Height = 0;
      }

      // get eventualy negative pagemain margin-top
      var pagemain_marginTop = parseInt($('main#primary.site-main').css('margin-top'));
      if (pagemain_marginTop >= 0) {
        pagemain_marginTop = 0;
      }

      // calculate navbar height
      var navbar_height = window_height - wpadminbar_Height - topbar_Height - pagemain_marginTop;

      // set navbar height
      $('.m-navbar1').css('min-height', navbar_height + 'px').css('overflow-y', 'auto');
      setTimeout(function () {
        $('.m-navbar1').css('height', navbar_height + 'px')
      }, 300);

    }

    // Padding bottom
    if (hasTopbar == true) {
      var window_offsetTop = $(window).scrollTop();
      var window_height = $(window).height();
      var navbar_height = $('.m-navbar1__nav').height() + parseInt($('.m-navbar1__nav').css('padding-top')) + parseInt($('.m-navbar1__nav').css('padding-bottom'));
      setTimeout(function () {
        if (window_offsetTop == 0 && (navbar_height > window_height)) {
          var navbar_PaddingBottom =  parseInt($('.m-navbar1').css('padding-bottom'));
          var topbar_Height = $('div[class^="m-topbar"], div[class*=" m-topbar"]').height();
          var pagemain_marginTop = parseInt($('main#primary.site-main').css('margin-top'));
          if (pagemain_marginTop >= 0) {
            pagemain_marginTop = 0;
          }
          var navbar_New_PaddingBottom = navbar_PaddingBottom + topbar_Height - pagemain_marginTop;
          $('.m-navbar1').css('padding-bottom', navbar_New_PaddingBottom + 'px');
        }
      }, 400);


      if (navbar_height < window_height) {
        var pagemain_marginTop = parseInt($('main#primary.site-main').css('margin-top'));
        if (pagemain_marginTop >= 0) {
          pagemain_marginTop = 0;
        }
        $('.m-navbar1').css('padding-bottom', Math.abs(pagemain_marginTop) + 'px');
      }
    }

  }) // On mobile menu show



  /*
  On mobile menu hide
  */
  $('#navbarSupportedContent').on('hide.bs.collapse', function () {

    $('body').css('overflow', 'visible');
    var window_offsetTop = $(window).scrollTop();

    // Fixed top
    if (hasFixedTop == true) {
      if (window_offsetTop > 0) {
        $('.m-navbar1').css('margin-top', 0);
      } else {
        setTimeout(function () {
          if (hasTransparent == false) {
            fn_navbarFixedTop();
          }
        }, 400);
      }
    }

    // Fullscreen
    if (hasFullscreen == true) {
      $('.m-navbar1').css('min-height', '0').css('height', 'auto').css('overflow-y', 'hidden');
    }

    // Transparent
    if (hasTransparent == true) {
      $('.m-navbar1').css('padding-bottom', '0');
    }

    // Padding bottom
    if (hasTopbar == true) {
      setTimeout(function () {
        var window_offsetTop = $(window).scrollTop();
        var window_height = $(window).height();
        if (window_offsetTop == 0) {
          var navbar_PaddingBottom =  parseInt($('.m-navbar1').css('padding-bottom'));
          var topbar_Height = $('div[class^="m-topbar"], div[class*=" m-topbar"]').height();
          var pagemain_marginTop = parseInt($('main#primary.site-main').css('margin-top'));
          if (pagemain_marginTop >= 0) {
            pagemain_marginTop = 0;
          }
          var navbar_New_PaddingBottom = navbar_PaddingBottom - topbar_Height + pagemain_marginTop;
          $('.m-navbar1').css('padding-bottom', navbar_New_PaddingBottom + 'px');
        }
      }, 200);
    }

  }) // On mobile menu hide

}
