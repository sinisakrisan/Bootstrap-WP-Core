<?php
/*
 * Search form in widget
 */

if ( ! function_exists('core_search_form') ) {

  function core_search_form( $form ) {
    $form = '<form class="form-inline" role="search" method="get" id="searchform" action="' . home_url('/') . '" >
      <div class="input-group">
      <input class="form-control" type="text" value="' . get_search_query() . '" placeholder="' . esc_attr_x('Search', 'core') . '..." name="s" id="s" />
      <div class="input-group-append">
      <button type="submit" id="searchsubmit" value="'. esc_attr_x('Search', 'core') .'" class="btn btn-danger"><i class="fas fa-search"></i></button>
      </div>
      </div>
    </form>';
    return $form;
  }
}
add_filter( 'get_search_form', 'core_search_form' );