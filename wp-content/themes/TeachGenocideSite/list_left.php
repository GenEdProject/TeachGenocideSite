<?php
/*
* Template Name: List Left
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

<?php function create_divider() { ?>
    <hr class="item_divider_left">
<?php } ?>


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
                <center> <img src="<?php echo z_taxonomy_image_url($cat[0]->cat_ID); ?>" /> </center>
                <h1> <?php echo $key ?> </h1>
                <hr class="list_divider">
            </div>

            <?php
            while($i < $total) : $currCatItems->the_post();
                create_item();
                if($i != $total - 1)
                {
                    create_divider();
                }
                $i++;
            endwhile;
            ?>

            <div style="clear: both;"> </div>
        <?php } ?>
    </section>
</div>


<?php
wp_reset_postdata();

get_sidebar();
get_footer(); ?>
