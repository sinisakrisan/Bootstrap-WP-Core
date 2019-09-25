<?php
/*
 * The Single Post
 */
?>

<?php /* Single post loop */ if(have_posts()): while(have_posts()): the_post(); ?>
  <article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
    
    <!-- Article Card -->
    <div class="card">
      
      <!-- Article Card Header -->
      <div class="card-header text-center">
        <h1><?php the_title()?></h1>
      </div>
      <!-- Article Card Header -->
      
      <!-- Article Card Featured Image -->
      <?php if (get_the_post_thumbnail()):?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail();?>
        </div>
      <?php endif;?>
      <!-- Article Card Featured Image -->
      
      <!-- Article Card Meta -->
      <?php if (is_singular('post')):?>
      <div class="card-footer">
        <?php
          _e('Author: ', 'core');
          the_author_posts_link();
          _e(' on ', 'core');
          core_post_date();
        ?>
      </div>
      <?php endif;?>
      <!-- Article Card Meta -->
      
      <!-- Article Card Body -->
      <div class="card-body">
        <?php the_content();?>
        <?php wp_link_pages();?>
      </div>
      <!-- Article Card Body -->
      
      <!-- Article Card Footer --> 
      <?php if (is_singular('post')):?>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <?php _e('Categories: ', 'core');?>
				  <span class="badge badge-light badge-pill"><?php the_category( '</span> <span class="badge badge-light badge-pill">' ); ?></span>
        </li>
    
			  <li class="list-group-item">
          <?php _e('Tags: ', 'core');?>
				  <?php the_tags( ' <span class="badge badge-light badge-pill text-muted">#', '</span> <span class="badge badge-light badge-pill text-muted">#', '</span>' ); ?>
        </li>
      
        <li class="list-group-item">
          <?php _e('Comments: ', 'core');?>
          <?php printf( number_format_i18n( get_comments_number() ) ); ?>
        </li>
      </ul>
      <?php endif;?>
      <div class="card-footer">
        <div class="row">
          <div class="col">
            <?php previous_post_link('%link', '<i class="fa fa-fw fa-arrow-left"></i> Previous post: '.'%title'); ?>
          </div>
          <div class="col text-right">
            <?php next_post_link('%link', 'Next post: '.'%title' . ' <i class="fa fa-fw fa-arrow-right"></i>'); ?>
          </div>
        </div>
      </div>
      <!-- Article Card Footer -->
    </div>   
    <!-- Article Card -->
    
    
    <!-- Author Card -->
    <?php if (is_singular('post') ):?>
      <div class="card">
        <div class="card-header text-center">
          <h4><?php _e( 'About Author', 'core' ); ?></h4>
        </div>

        <div class="card-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-2">
                <div class="author-avatar">
                  <?php echo get_avatar( get_the_author_meta( 'user_email' ));?>
                </div><!-- .author-avatar -->
              </div>
              
              <div class="col-md-10">
                <div class="author-description">
                  <p class="author-title border-bottom"><i class="fa fa-user"></i> <?php echo get_the_author(); ?></p>
                  <p class="author-bio"><i class="fa fa-vcard"></i> <?php the_author_meta( 'description' ); ?></p>
                  <!-- .author-bio -->
                </div><!-- .author-description -->
              </div>

            </div> <!-- container fluid-->
          </div> <!-- row -->
        </div><!-- card-body -->

        <div class="card-footer">
          <i class="fa fa-eye"></i> <a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"> <?php printf( __( 'View all posts by %s', 'app' ), get_the_author() ); ?></a>
        </div>
      </div> <!-- card-->
    <?php endif;?>
      
      
    <?php /*
      <div class="author-bio media mt-5">
        <?php core_author_avatar(); ?>
        <div class="media-body ml-3">
          <p class="h4 author-name"><?php _e('Author: ', 'core'); the_author_posts_link(); ?></p>
          <?php if (core_author_description()) {
            ?>
            <div class="author-description"><?php core_author_description(); ?></div>
            <?php
          } ?>
          <p class="author-other-posts mb-0"><?php _e('Other posts by ', 'core'); the_author_posts_link(); ?></p>
        </div>
      </div><!-- /.author-bio -->
*/?>

    
  </article>

<?php
  // This continues in the single post loop
    if ( comments_open() || get_comments_number() ) :
      //comments_template();
      comments_template('/loops/single-post-comments.php');
		endif;
  endwhile; else :
    get_template_part('loops/404');
  endif;
?>