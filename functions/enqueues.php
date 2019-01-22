<?php
/*
 * Enqueues
 */

if ( ! function_exists('core_enqueues') ) {
	function core_enqueues() {

		/********************************
		**                             **
		**********    STYLES     ********
		**                             **
		********************************/
        
        // Bootstrap 4 2.1
		wp_register_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', false, '4.2.1', null);
		wp_enqueue_style('bootstrap-css');
        
        // Fontawesome 5.6.3
		wp_register_style('fontawesome5', 
        get_template_directory_uri() . '/fonts/fontawesome/css/all.min.css', false, '5.6.3', null);
		wp_enqueue_style('fontawesome5');

		wp_enqueue_style( 'gutenberg-blocks', get_template_directory_uri() . '/css/blocks.css' );

		wp_register_style('theme-css', get_template_directory_uri() . '/css/theme.css', false, null);
		wp_enqueue_style('theme-css');

		/********************************
		**                             **
		*********    SCRIPTS     ********
		**                             **
		********************************/

		wp_register_script('modernizr',  'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', false, '2.8.3', true);
		wp_enqueue_script('modernizr');

		wp_enqueue_script('jquery');

		// Bootstrap 4 with Native jQuery dependency. Bundle contains Popper.js
		wp_register_script('bootstrap-js', get_template_directory_uri() .'/js/bootstrap.bundle.min.js', false, '4.2.1', true);
		wp_enqueue_script('bootstrap-js');

		wp_register_script('theme-js', get_template_directory_uri() . '/js/theme.js', false, null, true);
		wp_enqueue_script('theme-js');

		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}
}
add_action('wp_enqueue_scripts', 'core_enqueues', 100);
