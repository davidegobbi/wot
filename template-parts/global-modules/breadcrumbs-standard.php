<?php
global $post;


/*
creo array elenco link e comincio aggiungendo la home
*/
$breadcrumbsList = [
  'home' => site_url(),
];



/*
se post
*/

// aggiungo link a index blog
if ( is_single() && get_post_type() == 'post' ) {
  $breadcrumbsList['News'] = site_url() . '/news';
}

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



/*
se page con parent page
*/
if ( is_page() && $post->post_parent != 0) {
  $parentPage_object = get_post($post->post_parent);
  $breadcrumbsList[$parentPage_object->post_title] = get_permalink($parentPage_object->ID);
}



/*
se Woocommerce
*/
if ( is_woocommerce() ) {

  // aggiungo link a index shop
  $breadcrumbsList['Shop'] = wc_get_page_permalink( 'shop' );

  /*
  aggiungo link a categoria prodotto
   */

  // recupero oggetto prodotto corrente
  $product = wc_get_product();

  // recupero tutte le categorie del prodotto corrente
  $productCategories_object = $product->category_ids;

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