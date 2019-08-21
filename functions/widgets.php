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
    'description'     => __( 'Sidebar widget area', 'core' ),
    'before_widget'   => '<div class="%1$s %2$s mb-3">',
    'after_widget'    => '</div>',
    'before_title'    => '<h5><div class="card-header">',
    'after_title'     => '</div></h5>',
  ) );
  
  /*
  Search (one widget area)
   */
  register_sidebar( array(
    'name'            => __( 'Search', 'core' ),
    'id'              => 'search-widget-area',
    'description'     => __( 'Search widget area', 'core' ),
    'before_widget'   => '<div class="%1$s %2$s">',
    'after_widget'    => '</div>',
    'before_title'    => '<h5><div class="card-header">',
    'after_title'     => '</div></h5>',
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
    'description'     => __( 'Footer widget area', 'core' ),
    'before_widget'   => '<div class="%1$s %2$s col-sm">',
    'after_widget'    => '</div>',
    'before_title'    => '<h5><div class="card-header">',
    'after_title'     => '</div></h5>',
  ) );

}
add_action( 'widgets_init', 'core_widgets_init' );

//
//  Custom options for widgets
//

function core_in_widget_form($t,$return,$instance){
  
  $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '', 'style' => '') );
  if ( !isset($instance['style']) )
      $instance['style'] = null;
  ?>
  <hr>
  <h3>Widget options:</h3>
  <div style="background:#800; padding:10px; margin-bottom:10px;">
      <label for="<?php echo $t->get_field_id('style'); ?>">Widget style:</label>
      <select id="<?php echo $t->get_field_id('style'); ?>" name="<?php echo $t->get_field_name('style'); ?>">
          <option <?php selected($instance['style'], 'none border-0');?> value="none border-0">--Default--</option>
          <option <?php selected($instance['style'], 'text-white bg-primary');?>value="text-white bg-primary">Blue</option>
          <option <?php selected($instance['style'], 'text-white bg-secondary');?> value="text-white bg-secondary">Gray</option>
          <option <?php selected($instance['style'], 'text-white bg-success');?> value="text-white bg-success">Green</option>
          <option <?php selected($instance['style'], 'text-white bg-danger');?> value="text-white bg-danger">Red</option>
          <option <?php selected($instance['style'], 'text-white bg-warning');?> value="text-white bg-warning">Yellow</option>
          <option <?php selected($instance['style'], 'text-white bg-info');?> value="text-white bg-info">Light Blue</option>
          <option <?php selected($instance['style'], 'bg-light');?> value="bg-light">Light Gray</option>
          <option <?php selected($instance['style'], 'text-white bg-dark');?> value="text-white bg-dark">Dark</option>
      </select>
  </div>
  <?php
  $retrun = null;
  return array($t,$return,$instance);
  
}

function core_in_widget_form_update($instance, $new_instance, $old_instance){
  $instance['style'] = $new_instance['style'];
  return $instance;
}

function core_dynamic_sidebar_params($params){
  global $wp_registered_widgets;
  $widget_id = $params[0]['widget_id'];
  $widget_obj = $wp_registered_widgets[$widget_id];
  $widget_opt = get_option($widget_obj['callback'][0]->option_name);
  $widget_num = $widget_obj['params'][0]['number'];

  if(isset($widget_opt[$widget_num]['style']))
    $style = 'card ' . $widget_opt[$widget_num]['style'];
  else
    $style = '';
    $params[0]['before_widget'] = preg_replace('/class="/', 'class="'.$style.' ',  $params[0]['before_widget'], 1);
  return $params;
}


//Add input fields(priority 5, 3 parameters)
add_action('in_widget_form', 'core_in_widget_form',5,3);
//Callback function for options update (priorität 5, 3 parameters)
add_filter('widget_update_callback', 'core_in_widget_form_update',5,3);
//add class names (default priority, one parameter)
add_filter('dynamic_sidebar_params', 'core_dynamic_sidebar_params');
