<div class="hero">
    <?php if( is_active_sidebar('hero-widget-area') ): ?>
        <?php
            core_hero_before();
            dynamic_sidebar('hero-widget-area');
            core_hero_after();
        ?>
    <?php endif; ?>
</div>