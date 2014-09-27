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


<!-- Get array of categories -->
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
<section class="list">
<?php foreach ($category_array as $key => $cat) { // for each category?>
    <?php
        $args = array(
            'posts_per_page' => '-1',
            'post_type' => $template_type,
            'cat' => $cat[0]->cat_ID,);
        $currCatItems = new WP_Query( $args );
        $i = 0;
        $total = $currCatItems->found_posts;
    ?>
    <div class="title_container">
        <h1> <?php echo $key ?> </h1>
    </div>
    <!-- <div class="arrow_down"> </div> -->
    <?php
        while($i < $total) : $currCatItems->the_post();  // while there are items of that cat?>
                <?php if($i % 2 == 0) { ?>
                    <div class="item_container" style="float: left;">
                <?php } else { ?>
                    <div class="item_container" style="float: right;">
                <?php }?>
                <b><?php the_title(); ?></b>
                <?php
                       if (has_post_thumbnail()) {
                           the_post_thumbnail();
                       }
                       the_content();
                ?> 
                </div>
    <?php $i++; endwhile;?>
    <div style="clear: both;"> </div>
<?php } ?>
</section>
</div>


<?php
wp_reset_postdata();

get_sidebar();
get_footer(); ?>
