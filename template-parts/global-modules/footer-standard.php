<?php
if (get_field( 'footer_container' )) {
  $footer_container = get_field( 'footer_container' );
} else {
  $footer_container = 'container-fluid';
}
?>

<footer id="colophon" class="site-footer">
  <div class="m-footer1">
    <div class="<?php echo $footer_container; ?>">
      <div class="row">
        <div class="col-12">
          <?php
          dynamic_sidebar( 'footer-col-1' ); // registered in inc/register-sidebar.php
          ?>
        </div>
      </div>
    </div>
  </div>
</footer><!-- #colophon -->
