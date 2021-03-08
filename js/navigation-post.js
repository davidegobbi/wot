jQuery( document ).ready(function($) {
  $('.js-navigationBar a').each(function() {
    $(this).addClass('btn btn-sm btn-primary')
  });
  $('.js-navigationBar span').each(function() {
    $(this).addClass('btn btn-sm btn-secondary')
  });
});
