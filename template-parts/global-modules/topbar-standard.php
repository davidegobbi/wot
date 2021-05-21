<?php
if (get_field( 'topbar_container' )) {
  $topbar_container = get_field( 'topbar_container' );
} else {
  $topbar_container = 'container-fluid';
}
?>

<div class="m-topbar1">
  <div class="<?php echo $topbar_container; ?>">
    <div class="row">
      <div class="col-12">
        <?php
        dynamic_sidebar( 'topbar-col-1' ); // registered in inc/register-sidebar.php
        ?>
      </div>
    </div>
  </div>
</div>
