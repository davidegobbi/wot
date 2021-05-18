<?php
/*
Per cart, checkout e account e qualunque pagina alla quale sia stato associato il breadcumbs "shop" tramite campo ACF
*/

global $post;
if ( is_shop() ) {
  $isShop = true;
} else {
  $isShop = false;
}
if ( is_product_category() ) {
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
HOME
*/
// aggiungo link a index shop da endpoint WooCommerce
// se sono già nella pagina shop, metto link '#'
if ($isShop == true) {
  $breadcrumbsList['Shop'] = '#';
} else {
  $breadcrumbsList['Shop'] = wc_get_page_permalink( 'shop' );
}


if ($isArchive == true) {
  /*
  ARCHIVE
  */
  $currentCategory_object = get_queried_object();
  $breadcrumbsList[$currentCategory_object->name] = '#';
} else {

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
        // aggiungo siamo in shop o archive, metto link '#'
        $breadcrumbsList[$category_object->name] = get_category_link($category_object->term_id);
      }
    }
  }
}


/*
concludo aggiungendo pagina corrente, se non siamo in shop o archive
*/
if ( $isShop == false && $isArchive == false ) {
  $breadcrumbsList[get_the_title()] = '#';
}

?>



<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <?php
    // estraggo tutte le voci; rendo cliccabile solo se non ha link '#'
    foreach($breadcrumbsList as $name => $link) {
      if ($link != '#') {
        echo '<li class="breadcrumb-item">';
      } else {
        echo '<li class="breadcrumb-item active">';
      }
      if ($link != '#') {
        echo '<a href="' . $link . '">';
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
