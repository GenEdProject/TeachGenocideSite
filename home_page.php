<?php
/*
* Template Name: Home Page
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


<!-- Get the content of the page itself -->



 <!-- Get latest press post -->

<!-- Functions -->
<?php function create_item() { ?>
    <div class="home_item">
        <div class="arrow_right"> </div>
        <span> <a href="<?php echo get_the_content(); ?> "> <?php the_title(); ?> </a> </span>
    </div>
<?php } ?>


<!-- Start making the page -->

<!-- Home Title -->
<?php if (has_post_thumbnail( $post->ID )) : ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<div class="home_banner_container row" style="background-image: url(' <?php echo $image[0]; ?> ')">
<?php endif; ?>
    <div class="home_banner col-lg-8 col-sm-12">
        <div class="title_text col-lg-6 col-sm-12">
            <h1> Learning the Past, <br> Building the Future </h1>
        </div>

        <div class="press_window col-lg-6 col-md-12 d-none d-md-block">
            <?php
            $args = $args = array(
                            'posts_per_page'   => 1,
                            'offset'           => 0,
                            'orderby'          => 'date',
                            'order'            => 'DESC', 
                            'post_type'        => 'post',
                            'post_status'      => 'publish',
                          );
            $last = get_posts( $args );

            if(!empty($last)) {
              foreach ( $last as $post ) : setup_postdata( $post ); 
                $cats = get_the_category();
                $title = !in_array('Announcements', $cats) ? '<h1>Recent News</h1>' : '';
                ?>
                <div class="press_window_text">
                  <?php echo $title; ?>
                  <a href="<?php echo get_the_permalink(); ?>"><h1><?php echo get_the_title(); ?></h1>Read More...</a>
                  <?php echo the_excerpt();?>
                </div>
                <?php
              endforeach; 
              wp_reset_postdata();
            } else {
              ?>
              <div class="press_window_text">
                  <h1>GenEd News</h1>
                  <b> <a href="/gened-news/">Read our latest news</a> </b> <br>
              </div>
              <?php
            }
            ?>
        </div>
    </div>
</div>
<div class="press_window_mobile col-sm-12 d-md-none" aria-hidden="true">
  <?php
    $args = $args = array(
                    'posts_per_page'   => 1,
                    'offset'           => 0,
                    'orderby'          => 'date',
                    'order'            => 'DESC', 
                    'post_type'        => 'post',
                    'post_status'      => 'publish',
                  );
    $last = get_posts( $args );

    if(!empty($last)) {
      foreach ( $last as $post ) : setup_postdata( $post ); 
        ?>
        <div class="press_window_text">
          <a href="<?php echo get_the_permalink(); ?>"><h1><?php echo get_the_title(); ?></h1>Read More...</a>
          <?php echo the_excerpt();?>
        </div>
        <?php
      endforeach; 
      wp_reset_postdata();
    } else {
      ?>
      <div class="press_window_text">
          <h1>GenEd News</h1>
          <b> <a href="/gened-news/">Read our latest news</a> </b> <br>
      </div>
      <?php
    }
    ?>
</div>

<!-- Content -->
<div class="home_page_row row">
      <div class="home_page_widgets col-sm-8"><?php dynamic_sidebar( 'homepage' ); ?></div>
      <div class="home_page_content col-sm-8"><?php the_content(); ?></div>
</div>


<?php
wp_reset_postdata();

get_sidebar();
get_footer(); ?>

