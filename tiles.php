<?php
/*
 * Template Name: Tiles
 * */

get_header();

$template_type = get_post_custom_values('template_type');
$args = array(
    'posts_per_page' => '-1',
    'post_type' => $template_type,
);
$myTiles = new WP_Query( $args );
$i = 0;
$total = $myTiles->found_posts;
?>

<?php function create_tile() { ?>
    <section class="tile">
        <div class='title_container'>
            <h1><?php the_title() ; ?></h1>
        </div>
        <div class="arrow_down"></div>
        <div class="content_container">
        <?php
            if ( has_post_thumbnail() ) {
              the_post_thumbnail();
            }
            the_content();
        ?>
        </div>
    </section>
<?php } ?>

<span class="custom_page_title"> <?php wp_title('', 'true'); ?> </span>
<div class="column">
    <?php
    while($i < floor($total / 2)) : $myTiles->the_post();
        create_tile();
        $i++;
    endwhile;
    ?>
</div>

<div class="column">
    <?php
    while($i < $total) : $myTiles->the_post();
        create_tile();
        $i++;
    endwhile;
    ?>
</div>

<?php
wp_reset_postdata();

get_sidebar();
get_footer(); ?>
