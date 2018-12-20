<?php
/*
Template Name: Page Of Posts
*/

get_header(); ?>

<div id="primary" class="pageofposts content-area row">
    <div class="home_page_content col-md-8">
        <div class="col-md-9">
            <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'posts_per_page'    => 5,
                    'post_type' => 'post',
                    'paged' => $paged,
                );
                $posts = new WP_Query( $args );

                if ( $posts->have_posts() ) {
                    while($posts->have_posts()) { 
                        $posts->the_post(); ?>
                            <div class="post_archive row">
                                <div class="date col-sm-3">
                                    <?php the_date('F j, Y'); ?>
                                    <?php the_date('Y'); ?>
                                </div>
                                <div class="content col-sm-8">
                                    <a href="<?php echo get_permalink(); ?>"><?php the_title( '<h2>', '</h2>' ); ?></a>
                                    <div class="archive_excerpt">
                                        <?php echo strip_tags( get_the_excerpt() ); ?>
                                    </div>
                                </div> 
                            </div>                      
                    <?php } //end while 
                    
                } //end if

                //Pagination
                if ($posts->max_num_pages > 1) {
                    $orig_query = $wp_query; // fix for pagination to work
                    $wp_query = $posts;
                    ?>
                    <nav class="prev-next-posts col-sm-12">
                        <div class="next-posts-link col-sm-3">
                            <?php echo get_previous_posts_link( 'Newer Entries' ); ?>
                        </div>
                        <div class="prev-posts-link col-sm-3 offset-sm-6">
                            <?php echo get_next_posts_link( 'Older Entries', $posts->max_num_pages ); ?>
                        </div>
                    </nav>
                    <?php
                    $wp_query = $orig_query; // fix for pagination to work
                }

                wp_reset_postdata();
            ?>
        </div>
        <div class="archive_annuals col-md-3">
            <h4>News Archives by Year</h4>
            <ul class="col-sm-11 offset-sm-1"><?php wp_get_archives( array('type'=>'yearly') ); ?></ul>
        </div>
    </div><!--row-->
</div><!-- #primary -->

<?php get_footer(); ?>

