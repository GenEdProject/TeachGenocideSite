<?php
/*
* Template Name: Documents and Maps
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

<!-- Get array of categories -->
<?php while($i < $total) : $myItems->the_post(); ?>
    <?php
        if(has_category())
        {
            $category = get_the_category();
            $category_name = (string) $category[0]->cat_name;
            if(!in_array($category_name, $category_array))
            {
                $category_array[$category_name] = $category;
            }
        }
    ?>    
<?php $i++; endwhile;?>


<!-- Functions -->
<?php function create_item() { ?>
    <div class="doc_item">
        <div class="arrow_right"> </div>
        <span> <a href="<?php echo get_the_content(); ?> " target="_blank"> <?php the_title(); ?> </a> </span>
    </div>
<?php } ?>

<?php function create_divider() { ?>
    <hr class="item_divider_left">
<?php } ?>


<!-- Start making the page -->

<!-- Make the list -->
<div class="custom_page_padding">

    <section class="list_half">
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
                <!-- <center> <img src="<?php echo z_taxonomy_image_url($cat[0]->cat_ID); ?>" /> </center> -->
                <div class="doc_title_text"> <?php echo $key ?> </div>
                <div class="list_divider"> </div>
            </div>

            <?php
            while($i < $total) : $currCatItems->the_post();
                create_item();
                $i++;
            endwhile;
            ?>

            <div style="clear: both;"> </div>
        <?php } ?>
    </section>

    <!-- Get the content of the page itself -->
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
            if( '' !== get_post()->post_content ) { ?>
                <div class="custom_page_content" style="float: right; width: 45%;">
                    <?php the_content(); ?>
                </div>
    <?php } endwhile; else:
        // no posts found
    endif;
    ?>
</div>



<?php
wp_reset_postdata();

get_sidebar();
get_footer(); ?>
