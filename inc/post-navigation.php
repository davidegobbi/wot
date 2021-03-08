<?php

/*
Pagination NAV
*/
function pagination_nav() {
  global $wp_query;
  if ( $wp_query->max_num_pages > 1 ) { ?>
    <nav class="pagination row m-0 justify-content-between" role="navigation">
      <div class="nav-previous"><?php next_posts_link( '&larr; Older posts' ); ?></div>
      <div class="nav-next"><?php previous_posts_link( 'Newer posts &rarr;' ); ?></div>
    </nav>
  <?php }
}
// add Bootstrap classes
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');
function posts_link_attributes() {
  return 'class="btn btn-sm btn-primary"';
}



/*
Pagination BAR
*/
function pagination_bar() {
  global $wp_query;
  $total_pages = $wp_query->max_num_pages;
  if ($total_pages > 1){
    $current_page = max(1, get_query_var('paged'));
    echo paginate_links(array(
      'base' => get_pagenum_link(1) . '%_%',
      'format' => '/page/%#%',
      'current' => $current_page,
      'total' => $total_pages,
    ));
  }
}
