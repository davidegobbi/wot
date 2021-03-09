<?php
/*
Solo per pagine ecommerce create da page template WP + shortcode WooCommerce: es. cart, checkout e account.
Breadcrumbs selezionabile da campo ACF "blocchi globali".
 */

global $post;


/*
creo array elenco link e comincio aggiungendo la home
*/
$breadcrumbsList = [
  'home' => site_url(),
];


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



/*
concludo aggiungendo pagina corrente
*/
if ( !is_home() || !is_archive() ) {
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
