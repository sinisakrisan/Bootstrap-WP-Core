<?php
    get_header(); 
    core_main_before();
?>

<div id="main">
    <div class="container<?php esc_html_e( get_theme_mod( 'core_layout' ) ); ?> mt-5">
        <div class="row">

            <div class="col-sm">
                <div id="content" role="main">
                    <header class="mb-4 border-bottom">
                        <h1><?php _e('Search Results for', 'core'); ?> &ldquo;<?php the_search_query(); ?>&rdquo;
                        </h1>
                    </header>
                    <?php get_template_part('loops/search-results'); ?>
                </div><!-- /#content -->
            </div>

            <?php get_sidebar(); ?>

        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!--/.main -->
<?php 
    core_main_after();
    get_footer(); 
?>
