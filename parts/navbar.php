<?php core_navbar_before();?>

<nav id="navbar" class="navbar fixed-top navbar-expand-md navbar-<?php esc_html_e( get_theme_mod( 'core_navbar_accent' ), 'light' ); ?> navbar-background">
    
  <div class="container<?php esc_html_e( get_theme_mod( 'core_layout' ) ); ?>">

    <?php core_navbar_brand();?>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarDropdown" aria-controls="navbarDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarDropdown">
      <?php
        wp_nav_menu( array(
	       'theme_location'  => 'navbar',
	       'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
	       'container'       => 'div',
	       'container_class' => 'collapse navbar-collapse',
	       'container_id'    => 'navbarDropdown',
	       'menu_class'      => 'navbar-nav mr-auto',
	       'fallback_cb'     => 'core_navwalker::fallback',
	       'walker'          => new core_navwalker(),
        ) );
      ?>

      <!-- Search Widget -->
      <?php if ( is_active_sidebar( 'search-widget-area' ) ) : ?>
		    <div id="search-widget" class="search-widget widget-area" role="complementary">
			   <?php dynamic_sidebar( 'search-widget-area' ); ?>
		    </div>
      <?php endif; ?>
      <!-- Search Widget -->  
    </div>

  </div>
</nav>

<?php core_navbar_after();?>