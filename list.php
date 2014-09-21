<?php
/*
* Template Name: List
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
?>

<?php ?>
    <section class="list_item">
    <div class="custom_page_padding">
    <?php
    while($i < $total) : $myItems->the_post(); ?>
      <section class="list_item_container">
        <b><?php the_title() ; ?></b>
        <p><?php
               if (has_post_thumbnail()) {
                   the_post_thumbnail();
               }
               the_content();?>
        </p>
      </section>
    <?php
      $i++;
      endwhile;
    ?>
    </div>
    </section>
<?php ?>

<?php
wp_reset_postdata();

get_sidebar();
get_footer(); ?>
