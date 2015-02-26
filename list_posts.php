<?php
/*
* Template Name: Specific Posts
* */

get_header(); 

$postIDArray = get_post_custom_values('post_id');
$postTitleArray = get_post_custom_values('post_title');
$i = 0;
?>



<!-- Start making the page -->
<div class="custom_page_padding">

    <!-- Get the content of the page itself -->
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
            if( '' !== get_post()->post_content ) { ?>
                <div class="custom_page_content">
                    <?php the_content(); ?>
                </div>
    <?php } endwhile; else:
        // no posts found
    endif;
    ?>

    <!-- Make the list -->
    <section class="list">

    <?php
    foreach ( $postIDArray as $postID => $id_value ) 
    {
        $currPost = get_post($id_value);
        $postCat  = get_the_category($id_value); /* not used yet */
    ?>
        <div class="title_container">
            <h1> <?php if($i < count($postTitleArray)) { echo $postTitleArray[$i]; } ?> </h1>
            <hr class="list_divider">
        </div>
        <div class="item_container_left">
            <b><?php echo apply_filters( 'the_title', $currPost->post_title ); ?></b>
            <p><?php
               		echo get_the_post_thumbnail($id_value, 'thumbnail', array('class' => "item_container_thumb_left"));
                    echo apply_filters( 'the_content', $currPost->post_content );
            ?></p>
        </div>
    <?php $i++; } ?>

    </section>

</div>



<?php
wp_reset_postdata();

get_sidebar();
get_footer(); ?>