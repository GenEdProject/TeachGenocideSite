<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package teachgen
 */

get_header(); ?>

  <section id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

    <?php if ( have_posts() ) : ?>

      <?php /* Start the Loop */ ?>
      <?php while ( have_posts() ) : the_post(); ?>

        <hr/>
        <div class="search_result">
            <a href=<?php the_permalink(); ?> ><h2><?php the_title(); ?></h2></a>
            <p><?php the_content(); ?></p>
        </div>

      <?php endwhile; ?>

      <?php teachgen_paging_nav(); ?>

    <?php else : ?>

      <?php get_template_part( 'content', 'none' ); ?>

    <?php endif; ?>

    </main><!-- #main -->
  </section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
