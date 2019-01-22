<?php
/*
 * Widgets
 */

function core_widgets_init() {
    
  /*
  Hero (one widget area)
   */
  register_sidebar( array(
    'name'            => __( 'Hero', 'core' ),
    'id'              => 'hero-widget-area',
    'description'     => __( 'Hero widget area. Make sure to enable Frontpage Hero area in Layout options within Customizer. Widget title will not show up.', 'core' ),
    'before_widget'   => '<section class="%1$s %2$s">',
    'after_widget'    => '</section>',
    'before_title'    => '<h2 style="display:none;">',
    'after_title'     => '</h2>',
  ) );

  /*
  Sidebar (one widget area)
   */
  register_sidebar( array(
    'name'            => __( 'Sidebar', 'core' ),
    'id'              => 'sidebar-widget-area',
    'description'     => __( 'The sidebar widget area', 'core' ),
    'before_widget'   => '<section class="%1$s %2$s">',
    'after_widget'    => '</section>',
    'before_title'    => '<h2 class="h4">',
    'after_title'     => '</h2>',
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
    'before_widget'   => '<div class="%1$s %2$s col-sm">',
    'after_widget'    => '</div>',
    'before_title'    => '<h2 class="h4">',
    'after_title'     => '</h2>',
  ) );

}
add_action( 'widgets_init', 'core_widgets_init' );