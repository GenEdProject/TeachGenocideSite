<?php
/**
 * @package teachgen
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="item_container_left">
  <header class="entry-header">
    <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

    <?php if ( 'post' == get_post_type() ) : ?>
    <div class="entry-meta">
      <?php teachgen_posted_on(); ?>
    </div><!-- .entry-meta -->
    <?php endif; ?>
  </header><!-- .entry-header -->

  <?php if ( is_search() ) : // Only display Excerpts for Search ?>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div><!-- .entry-summary -->
  <?php else : ?>
  <div class="entry-content">
    <?php the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'teachgen' ) ); ?>
  </div><!-- .entry-content -->
  <?php endif; ?>

  <footer class="entry-footer">
    <?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
      <?php
        /* translators: used between list items, there is a space after the comma */
        $categories_list = get_the_category_list( __( ', ', 'teachgen' ) );
        if ( $categories_list && teachgen_categorized_blog() ) :
      ?>
      <span class="cat-links">
        <?php printf( __( 'Posted in %1$s', 'teachgen' ), $categories_list ); ?>
      </span>
      <?php endif; // End if categories ?>

      <?php
        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', __( ', ', 'teachgen' ) );
        if ( $tags_list ) :
      ?>
      <span class="tags-links">
        <?php printf( __( 'Tagged %1$s', 'teachgen' ), $tags_list ); ?>
      </span>
      <?php endif; // End if $tags_list ?>
    <?php endif; // End if 'post' == get_post_type() ?>

    <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
    <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'teachgen' ), __( '1 Comment', 'teachgen' ), __( '% Comments', 'teachgen' ) ); ?></span>
    <?php endif; ?>

    <?php edit_post_link( __( 'Edit', 'teachgen' ), '<span class="edit-link">', '</span>' ); ?>
  </footer><!-- .entry-footer -->
</article><!-- #post-## -->

