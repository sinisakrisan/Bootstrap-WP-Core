<?php if ( is_front_page() && is_home() ) : ?>
    <div class="hero">
        <?php if( is_active_sidebar('hero-widget-area') ) {
            core_hero_before();
            dynamic_sidebar('hero-widget-area');
            core_hero_after();
        } ?>
    </div>
<?php endif;?>