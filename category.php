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
                        <h1><?php _e('Category: ', 'core'); echo single_cat_title(); ?></h1>
                    </header>
                    <?php get_template_part('loops/index-loop'); ?>
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
