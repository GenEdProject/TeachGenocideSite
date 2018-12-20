<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package teachgen
 */
?>

<div class="article_container">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
      <h1 class="entry-title"><?php the_title(); ?></h1>
    </header><!-- .entry-header -->

    <div class="entry-content row">
        <div class="the_content col-sm-12 col-md-8"><?php the_content(); ?></div>
      <?php
        wp_link_pages( array(
          'before' => '<div class="page-links">' . __( 'Pages:', 'teachgen' ),
          'after'  => '</div>',
        ) );
      ?>
    </div><!-- .entry-content -->
    <?php edit_post_link( __( 'Edit', 'teachgen' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>
  </article><!-- #post-## -->
</div>

