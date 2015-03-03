<?php
/*
* Template Name: Posters
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
        <div class="item_title"> <b><?php the_title(); ?></b> </div>
        <a href="<?php echo get_post_custom_values('link')[0]; ?>">
        <?php
               if (has_post_thumbnail()) {
                   the_post_thumbnail('medium', array('class' => "item_container_thumb_right"));
               } 
        ?>
        </a>
        <div class="item_content"> <?php the_content(); ?> </div>
    </div>
<?php } ?>

<?php function create_divider() { ?>
    <hr class="item_divider_left">
<?php } ?>


<!-- Start making the page -->

<!-- Make the list -->
<section class="list">
    <?php
    while($i < $total) : $myItems->the_post();
        create_item();
        if($i != $total - 1)
        {
            create_divider();
        }
        $i++;
    endwhile;
    ?>

    <div style="clear: both;"> </div>
</section>



<?php
wp_reset_postdata();

get_sidebar();
get_footer(); ?>
