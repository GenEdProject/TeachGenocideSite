<?php
/*
* Template Name: Tabs Example
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
$category_array = array();
$page_content = '';
?>

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

<!-- Functions -->
<?php function create_item() { ?>
    <div class="item_container_left">
        <b><?php the_title(); ?></b>
        <p><?php
               if (has_post_thumbnail()) {
                   the_post_thumbnail('thumbnail', array('class' => "item_container_thumb_left"));
               }
               the_content();
        ?></p>
    </div>
<?php } ?>


<!-- Start making the page -->

<!-- Banner -->
<?php if (has_post_thumbnail( $post->ID )) : ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<div class="banner_container" style="background-image: url(' <?php echo $image[0]; ?> ')">
<?php endif; ?>
    <div class="banner_text">
        <h1> <?php echo get_the_title(); ?> </h1>
        <?php if (strlen($page_content)) { ?>
            <p> <?php echo $page_content ?> </p>
        <?php } ?>
    </div>
</div>

<!-- Content -->
<div class="custom_page_padding">

    <!-- Make the list -->
    <section class="list">
            <?php
            while($i < $total) : $myItems->the_post();
                create_item();
                $i++;
            endwhile;
            ?>
    </section>

</div>


<?php
wp_reset_postdata();

get_sidebar();
get_footer(); ?>
