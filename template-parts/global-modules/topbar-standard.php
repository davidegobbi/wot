<?php
$topbar_container = get_field( 'topbar_container' );
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
