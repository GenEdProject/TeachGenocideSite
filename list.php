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
$category_array = array();
?>

<?php while($i < $total) : $myItems->the_post(); ?>
    <?php
        $category = get_the_category();
        $category_name = (string) $category[0]->cat_name;
        if(!in_array($category_name, $category_array) && ($category_name != ""))
        {
            $category_array[$category_name] = $category;
            $j++;
        }
    ?>    
<?php $i++; endwhile;?>




<!-- For each category get posts -->


<div class="custom_page_padding">
<?php foreach ($category_array as $key => $cat) { ?>
<section class="list_item">
    <?php
        $args = array(
            'posts_per_page' => '-1',
            'post_type' => $template_type,
            'cat' => $cat[0]->cat_ID,);
        $currCatItems = new WP_Query( $args );
        $i = 0;
        $total = $currCatItems->found_posts;
    ?>
    <?php
        while($i < $total) : $currCatItems->the_post(); ?>
          <?php echo $key ?>
          <section class="list_item_container">
            <b><?php the_title(); ?></b>
            <p><?php
                   if (has_post_thumbnail()) {
                       the_post_thumbnail();
                   }
                   the_content();?>
            </p>
          </section>
    <?php $i++; endwhile;?>
</section>
<?php } ?>
</div>


<?php
wp_reset_postdata();

get_sidebar();
get_footer(); ?>
