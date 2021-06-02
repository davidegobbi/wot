<!--
Put this code in your WP template
-->

<?php
if (get_field( 'bottombar_container' )) {
  $bottombar_container = get_field( 'bottombar_container' );
} else {
  $bottombar_container = 'container-fluid';
}
?>

<div class="m-bottombar1">
  <div class="<?php echo $bottombar_container; ?>">
    <div class="row">
      <div class="col-12">
        <?php
        dynamic_sidebar( 'bottombar-col-1' ); // registered in inc/register-sidebar.php
        ?>
      </div>
    </div>
  </div>
</div>
