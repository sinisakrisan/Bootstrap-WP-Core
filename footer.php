<?php core_footer_before();?>

<footer id="footer" class="mt-5 bg-light">

  <div class="footer-background container<?php esc_html_e( get_theme_mod( 'core_layout' ) ); ?>">

    <?php if(is_active_sidebar('footer-widget-area')): ?>
    <div class="row pt-5 pb-4" id="footer" role="navigation">
      <?php dynamic_sidebar('footer-widget-area'); ?>
    </div>
    <?php endif; ?>

  </div>

</footer>

<?php core_footer_after();?>

<?php core_bottomline();?>

<?php wp_footer(); ?>
</body>
</html>
