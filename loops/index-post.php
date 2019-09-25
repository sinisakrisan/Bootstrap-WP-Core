<?php
/*
 * The Index Post (or excerpt)
 * ===========================
 * Used by index.php, category.php and author.php
 */
?>

<article role="article" id="post_<?php the_ID()?>" <?php post_class("mb-5"); ?> >
    <!-- Article Card -->
    <div class="card">
      <div class="card-header text-center">
        <h2>
          <a href="<?php the_permalink(); ?>">
          <?php the_title()?>
          </a>
        </h2>
      </div>
      <?php if (get_the_post_thumbnail()):?>
        <a href="<?php the_permalink(); ?>">
          <div class="post-thumbnail"><?php the_post_thumbnail();?></div>
        </a>
      <?php endif;?>
      <div class="card-footer">
        <p class="text-muted">
          <i class="fa fa-calendar"></i>&nbsp;<?php core_post_date(); ?>&nbsp;|
          <i class="fa fa-user"></i>&nbsp; <?php _e('By ', 'core'); the_author_posts_link(); ?>&nbsp;|
          <i class="fa fa-comment"></i>&nbsp;<a href="<?php comments_link(); ?>"><?php printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), '', 'core' ), number_format_i18n( get_comments_number() ) ); ?></a>
        </p>
      </div>
      <div class="card-body">
        <?php if ( has_excerpt( $post->ID ) ) {
          the_excerpt();
        ?>
        <p>
          <a href="<?php the_permalink(); ?>">
            <?php _e( '&hellip; ' . __('Continue reading', 'core' ) . ' <i class="fa fa-arrow-right"></i>', 'core' ) ?>
          </a>
        </p>
        <?php } else {
        // use the_excerpt to show only small portion
        // use the_content to show full blog post
          the_content( __( '&hellip; ' . __('Continue reading', 'core' ) . ' <i class="fa fa-arrow-circle-o-right"></i>', 'core' ) );
        } ?>
      </div>
  </div>
</article>