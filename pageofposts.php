<?php
/*
Template Name: Page Of Posts with Custom Fields
*/

get_header(); ?>
<?php
if ( is_page() ) {
    $category = get_post_meta( $posts[0]->ID, 'category', true );
    $cat = get_cat_ID( $category );
}
if ( $cat ) :
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $post_per_page = 4; // -1 shows all posts
    $do_not_show_stickies = 1; // 0 to show stickies
    $args=array (
      'category__in' => array( $cat ),
      'orderby' => 'date',
      'order' => 'DESC',
      'paged' => $paged,
      'posts_per_page' => $post_per_page,
      'ignore_sticky_posts' => $do_not_show_stickies
    );
    $temp = $wp_query; // assign original query to temp variable for later use  
    global $wp_query;
    $wp_query = null;
    $wp_query = new WP_Query( $args ); 
    if ( $wp_query->have_posts() ) : 
        while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
        <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
            <div class="entry">
            <?php the_content( 'Read the rest of this entry »' ); ?>
            </div>
        </div>
        <?php endwhile; ?>
        <?php endif; // if ( $wp_query->have_posts() ) ?>
        <?php $wp_query = $temp; //reset back to original query ?>

<?php else : ?>
    <h2 class="center">Not Found</h2>
    <p class="center">Sorry, but you are looking for something that isn't here.</p>
    <?php get_search_form(); ?>    
<?php endif; // if ( $cat ) ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
