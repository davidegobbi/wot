jQuery( document ).ready(function($) {

  /*
  Bootstrap styling
  */

  // Checkout form
  if ( $('form.woocommerce-checkout').length ) {
    $('form.woocommerce-checkout').addClass('container p-0');
    $('div#customer_details', this).removeClass('col2-set').addClass('row');
    $('div.col-1', this).removeClass('col-1').addClass('col-md-6');
    $('div.col-2', this).removeClass('col-2').addClass('col-md-6');
  }

  // Login form
  if ( $('div#customer_login').length ) {
    $('div#customer_login').removeClass('u-columns col2-set').addClass('row');
    $('div.col-1', this).removeClass('u-column1 col-1').addClass('col-md-6');
    $('div.col-2', this).removeClass('u-column2 col-2').addClass('col-md-6');
  }

  // My account navigation
  if ( $('nav.woocommerce-MyAccount-navigation').length ) {
    $('nav.woocommerce-MyAccount-navigation ul').addClass('list-group');
    $('nav.woocommerce-MyAccount-navigation li').addClass('list-group-item d-flex justify-content-between align-items-center');
  }

  /*
  My account address
  */
  if ( $('div.woocommerce-Addresses').length ) {
    $('div.woocommerce-Addresses').removeClass('u-columns col2-set').addClass('row');
    $('div.woocommerce-Address', this).removeClass('u-column-1 u-column-2 col-1 col-2').addClass('col-md-6');
    $('h3', this).addClass('w-100');
    $('a.edit', this).addClass('float-left btn btn-sm btn-primary mb-3');
  }

});
