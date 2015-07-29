<?php
/*
* Template Name: Teaching Guides
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

<!-- Functions -->
<?php function create_item() { ?>
    <div class="item_container_left">
        <h3><?php the_title(); ?></h3>
        <p class="item_container_thumb_left" style="border: 0"><?php
               if (has_post_thumbnail()) {
                   the_post_thumbnail('large');
               }
               the_content();
        ?></p>
    </div>
<?php } ?>

<?php function create_divider() { ?>
    <hr class="item_divider_left">
<?php } ?>


<!-- Content -->
<div class="custom_page_padding">

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
    </section>
</div>


<?php
wp_reset_postdata();

get_sidebar();
get_footer(); ?>
