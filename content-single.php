<?php
/**
 * @package teachgen
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <b><h1 class="entry-title"><?php the_title(); ?></h1></b>

  </header><!-- .entry-header -->

  <div class="entry-content">
    <?php the_content(); ?>
  </div><!-- .entry-content -->

  <!-- Buttons -->
  <?php if (get_post_custom_values('download')[0]) { ?>
    <button type="button" class="teachguide_button" Onclick="window.location.href='<?php echo get_post_custom_values('download')[0] ?>'">
          Download
    </button>
  <?php } ?>
  <footer class="entry-footer">
    <?php edit_post_link( __( 'Edit', 'teachgen' ), '<span class="edit-link">', '</span>' ); ?>
  </footer><!-- .entry-footer -->
</article><!-- #post-## -->
