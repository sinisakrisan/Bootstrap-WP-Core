<?php
/*
 * Core Hooks
 * Designed to be used by a child theme.
 */

// Navbar (in `/parts`)

function core_navbar_before() {
    do_action('navbar_before');
}

function core_navbar_after() {
    do_action('navbar_after');
}
function core_navbar_brand() {
    if ( ! has_action('navbar_brand') ) { ?>
    <?php
    // check to see if the logo exists and add it to the page
    if ( get_theme_mod( 'core_logo' ) ) : ?>
        <div class="logo">
            <img src="<?php esc_html_e( get_theme_mod( 'core_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" >
        </div>
 
    <?php // add a fallback if the logo doesn't exist
    else : ?>
        <a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo('name'); ?>
        </a>
        <!--<small><?php bloginfo('description'); ?></small>--> <!-- /.tagline not needed -->
    <?php endif; ?>

    <?php
    } else {
		do_action('navbar_brand');
	}
}

function core_navbar_search() {
  if ( ! has_action('navbar_search') ) {
    ?>
    <form class="form-inline ml-auto pt-2 pt-md-0" role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
      <div class="input-group">
        <input class="form-control border-secondary" type="text" value="<?php echo get_search_query(); ?>" placeholder="Search..." name="s" id="s">
        <div class="input-group-append">
          <button type="submit" id="searchsubmit" value="<?php esc_attr_x('Search', 'core') ?>" class="btn btn-outline-secondary">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    <?php
  } else {
		do_action('navbar_search');
	}
}


// Main

function core_main_before() {
    do_action('main_before');
}
function core_main_after() {
    do_action('main_after');
}

// Sidebar (in `sidebar.php` -- only displayed when sidebar has 1 widget or more)

function core_sidebar_before() {
    do_action('sidebar_before');
}
function core_sidebar_after() {
    do_action('sidebar_after');
}

// Footer (in `footer.php`)

function core_footer_before() {
    do_action('footer_before');
}
function core_footer_after() {
    do_action('footer_after');
}
function core_bottomline() {
	if ( ! has_action('bottomline') ) {
		?>
    <div class="container<?php esc_html_e( get_theme_mod( 'core_layout' ) ); ?>">
      <div class="row pt-3">
        <div class="col-sm">
          <p class="text-center text-sm-left">&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></p>
        </div>
        <div class="col-sm">
          <p class="text-center text-sm-right"><a href="https://sinisakrisan.me">Core</a> theme for WordPress 5</p>
        </div>
      </div>
    </div>
		<?php		
	} else {
		do_action('bottomline');
	}
}
