<?php
/*
* Template Name: Home Page
* */

get_header();

$template_type = get_post_custom_values('template_type');
$args = array(
    'posts_per_page' => '-1',
    'post_type' => $template_type,
);
$myItems = new WP_Query( $args );
$i = 0;
$total = $myItems->found_posts;
$page_content = '';
?>


<!-- Get the content of the page itself -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                if( '' !== get_post()->post_content ) { ?>
                                <?php $page_content = get_the_content(); ?>
<?php } endwhile; else:
        // no posts found
endif;
?>


 <!-- Get latest press post -->

<!-- Functions -->
<?php function create_item() { ?>
        <div class="home_item">
                <div class="arrow_right"> </div>
                <span> <a href="<?php echo get_the_content(); ?> "> <?php the_title(); ?> </a> </span>
        </div>
<?php } ?>


<!-- Start making the page -->

<!-- Home Title -->
<?php if (has_post_thumbnail( $post->ID )) : ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<div class="home_banner_container" style="background-image: url(' <?php echo $image[0]; ?> ')">
<?php endif; ?>
        <div class="home_banner">
                <div class="title_text">
                        <h1> Learning the Past, <br> Building the Future </h1>
                </div>

                <div class="press_window">
                        <?php
                        $args = $args = array('posts_per_page' => 1, 'offset' => 0, 'orderby' => 'date', 'order' => 'DESC', 'post_type' => 'post', 'post_status' => 'publish',
                        );
                        $last = get_posts( $args );

                        if(!empty($last)) {
                            foreach ( $last as $post ) : setup_postdata( $post ); 
                                ?>
                                <div class="press_window_text">
                                    <h1><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h1>
                                    <b><?php echo the_content( 'Read More...', $strip_teaser );?> </b> <br>
                                </div>
                                <?php
                            endforeach; 
                            wp_reset_postdata();
                        } else {
                            ?>
                            <div class="press_window_text">
                                    <h1>GenEd News</h1>
                                    <b> <a href="/gened-news/">Read our latest news</a> </b> <br>
                            </div>
                            <?php
                        }
                        ?>
                </div>
        </div>
</div>

<!-- Content -->
<div class="home_page_padding">
    <div class="custom_page_padding">
            <div class="home_items">
                    <div class="home_text_title teaching_resources"> Teaching Resources </div>
                    <div class="home_item_window">
                            <?php
                            while($i < $total) : $myItems->the_post();
                                    create_item();
                                    $i++;
                            endwhile;
                            ?>
                    </div>
            </div>

            <div class="home_text">
                    <div class="home_text_title">The Genocide Education Project</div>
                    <div class="home_text_window"> <p> <?php echo $page_content ?> </p> </div>
                    <div class="learn_more">
                            <div class="arrow_right"> </div>
                            <span> <b> <a href="http://genocideeducation.org/about-us/"> Learn more about who we are </a> </b> </span>
                    </div>
            </div>
            <div class="custom_page_padding">
                <iframe width="990" height="557" src="https://www.youtube.com/embed/AtdmfOipj0o?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
            </div>
    </div>
</div>


<?php
wp_reset_postdata();

get_sidebar();
get_footer(); ?>

