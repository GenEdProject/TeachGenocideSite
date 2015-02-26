<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package teachgen
 */
?>

<!-- Banner -->
<?php if (has_post_thumbnail( $post->ID )) : ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<div class="banner_container" style="background-image: url(' <?php echo $image[0]; ?> ')">
<?php endif; ?>
    <div class="banner_text">
        <h1> <?php echo get_the_title(); ?> </h1>
    </div>
</div>

<div class="custom_page_padding">
  <div class="article_container">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
      </header><!-- .entry-header -->

      <div class="entry-content">
        <?php the_content(); ?>
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
</div>
