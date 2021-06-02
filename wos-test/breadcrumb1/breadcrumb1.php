<!--
Put this code in your WP template
-->

<?php
if (get_field( 'breadcrumb_container' )) {
  $breadcrumb_container = get_field( 'breadcrumb_container' );
} else {
  $breadcrumb_container = 'container-fluid';
}

global $post;
if ( is_shop() ) {
  $isShop = true;
} else {
  $isShop = false;
}
if ( is_archive() ) {
  $isArchive = true;
} else {
  $isArchive = false;
}


/*
creo array elenco link e comincio aggiungendo la home
*/
$breadcrumbsList = [
  'Home' => site_url(),
];



/*
se post (articoli)
*/

// aggiungo link a index blog
if ( get_post_type() == 'post' || $isArchive == true ) {
  $breadcrumbsList['News'] = site_url() . '/news';
}



if ($isArchive == true) {
  /*
  ARCHIVE
  */
  $currentCategory_object = get_queried_object();
  $breadcrumbsList[$currentCategory_object->name] = '#';
} else {
  // aggiungo link a categoria post
  $postCategories_object = get_the_category(); // oggetto con tutte le categorie associate
  foreach ($postCategories_object as $category) {
    // recupero campo ACF che permette di escludere categoria dalle breadcrumbs
    $disableBreadcrumbs = get_field('escludi_da_breadcrumbs', 'category_'.$category->term_id);
    // aggiungo se non ha categorie parent e se non è stata disattivata da campo ACF
    if ( $category->category_parent == 0 && $disableBreadcrumbs == 0 ) {
      $breadcrumbsList[$category->name] = get_category_link($category->term_id);
    }
  }
}



/*
se page con parent page
*/
if ( is_page() && $post->post_parent != 0) {
  $parentPage_object = get_post($post->post_parent);
  $breadcrumbsList[$parentPage_object->post_title] = get_permalink($parentPage_object->ID);
}



/*
se Woocommerce (esclusi cart, checkout e account: vedi breadcrumbs-shop.php)
*/
if ( is_woocommerce() ) {

  // aggiungo link a index shop da endpoint WooCommerce
  $breadcrumbsList['Shop'] = wc_get_page_permalink( 'shop' );

  /*
  aggiungo link a categoria prodotto
  */

  // recupero oggetto prodotto corrente
  $product = wc_get_product();

  // recupero tutte le categorie del prodotto corrente
  $productCategories_object = $product->category_ids;

  if ($productCategories_object) {
    foreach ($productCategories_object as $category_id) {

      // recupero oggetto categoria corrente
      $category_object = get_term_by( 'id', $category_id, 'product_cat' );

      // recupero campo ACF che permette di escludere categoria dalle breadcrumbs
      $disableBreadcrumbs = get_field('escludi_da_breadcrumbs', 'product_cat_'.$category_object->term_id);

      // aggiungo se non ha categorie parent e se non è stata disattivata da campo ACF
      if ( $category_object->parent == 0 && $disableBreadcrumbs == 0 ) {
        $breadcrumbsList[$category_object->name] = get_category_link($category_object->term_id);
      }
    }
  }

}


/*
concludo aggiungendo pagina corrente
*/
if ( $isArchive == false && $isShop == false ) {
  $breadcrumbsList[get_the_title()] = '#';
}

?>



<div class="m-breadcrumb1">
  <div class="<?php echo $breadcrumb_container; ?>">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb m-breadcrumb1__list">
        <?php
        // estraggo tutte le voci; rendo cliccabile solo se non ha link '#'
        foreach($breadcrumbsList as $name => $link) {
          if ($link != '#') {
            echo '<li class="breadcrumb-item m-breadcrumb1__item">';
          } else {
            echo '<li class="breadcrumb-item active m-breadcrumb1__item">';
          }
          if ($link != '#') {
            echo '<a class="m-breadcrumb1__link" href="' . $link . '">';
          }

          echo $name;

          if ($link != '#') {
            echo '</a>';
          }
          echo '</li>';
        }
        ?>
      </ol>
    </nav>
  </div>
</div>
