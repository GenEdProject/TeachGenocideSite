<?php
/*
Template Name: Page Of Posts
*/

get_header(); ?>

    <div id="primary" class="content-area">
        <?php
        /* The loop: the_post retrieves the content
         * of the new Page you created to list the posts,
         * e.g., an intro describing the posts shown listed on this Page..
         */
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();

              // Display content of page
              get_template_part( 'content', get_post_format() );
              wp_reset_postdata();

            endwhile;
        endif;

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $args = array(
            // Change these category SLUGS to suit your use.
            'category_name' => 'press',
            'paged' => $paged
        );

        $list_of_posts = new WP_Query( $args );
        ?>
        <?php if ( $list_of_posts->have_posts() ) : ?>
            <div class="custom_page_padding">
            <?php /* The loop */ ?>
            <?php while ( $list_of_posts->have_posts() ) : $list_of_posts->the_post(); ?>
                <div class="custom_post_container">
                    <div class="custom_post_title"> <?php the_title();?> </div>
                    <hr style="margin-bottom:10px; background-color:#000; height:1px; width:50% float:left">
                    <?php the_content();?>
                </div>
            <?php endwhile; ?>
            </div>
        <?php else : ?>
        <?php endif; ?>

    </div><!-- #primary -->

<?php get_footer(); ?>
