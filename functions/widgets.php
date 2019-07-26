<?php
/*
 * Widgets
 */

function core_widgets_init() {
    
  /*
  Hero (one widget area)
  Not developed yet
  Comment out
  register_sidebar( array(
    'name'            => __( 'Hero', 'core' ),
    'id'              => 'hero-widget-area',
    'description'     => __( 'Hero widget area. Make sure to enable Frontpage Hero area in Layout options within Customizer. Widget title will not show up.', 'core' ),
    'before_widget'   => '<div id="%1$s" class="%2$s">',
    'after_widget'    => '</div>',
    'before_title'    => '<div style="display:none;">',
    'after_title'     => '</div>',
  ) );
    */

  /*
  Sidebar (one widget area)
   */
  register_sidebar( array(
    'name'            => __( 'Sidebar', 'core' ),
    'id'              => 'sidebar-widget-area',
    'description'     => __( 'The sidebar widget area', 'core' ),
    'before_widget'   => '<div id="%1$s" class="%2$s card mb-3">',
    'after_widget'    => '</div>',
    'before_title'    => '<div class="card-header"><h4>',
    'after_title'     => '</div></h4>',
  ) );

  /*
  Footer (1, 2, 3, or 4 areas)

  Flexbox `col-sm` gives the correct the column width:

  * If only 1 widget, then this will have full width ...
  * If 2 widgets, then these will each have half width ...
  * If 3 widgets, then these will each have third width ...
  * If 4 widgets, then these will each have quarter width ...
  ... above the Bootstrap `sm` breakpoint.
  */

  register_sidebar( array(
    'name'            => __( 'Footer', 'core' ),
    'id'              => 'footer-widget-area',
    'description'     => __( 'The footer widget area', 'core' ),
    'before_widget'   => '<div id="%1$s" class="%2$s col-sm">',
    'after_widget'    => '</div>',
    'before_title'    => '<h3 class="footer-widget-title">',
    'after_title'     => '</h3>',
  ) );

}
add_action( 'widgets_init', 'core_widgets_init' );