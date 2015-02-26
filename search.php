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

      <header class="page-header">
        <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'teachgen' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
      </header><!-- .page-header -->

      <?php /* Start the Loop */ ?>
      <?php while ( have_posts() ) : the_post(); ?>

        <div class="search_result">
            <a href=<?php the_permalink(); ?> ><?php the_title(); ?></a>
            <span><?php the_permalink(); ?></span>
            <p><?php the_content(); ?></span>
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
