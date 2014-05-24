<?php
/*
* Template Name: Videos
* */

get_header();

$args = array(
  'posts_per_page' => '-1',
  'post_type' => 'videos',
);
$myVideos = new WP_Query( $args );
$i = 0;
$total = $myVideos->found_posts;
?>

<?php //echo "<div class='video_container'>" ?>
  <div class="column">
    <?php
    while($i < floor($total / 2)) : $myVideos->the_post(); ?>
      <section class="video">
        <div class='title_container'>
          <h1><?php the_title() ; ?></h1>
        </div>
        <div class="arrow_down"></div>
        <div class="content_container"><?php the_content() ; ?></div>
      </section> 
    <?php
      $i++;
      endwhile;
    ?>
  </div>

  <div class="column">
    <?php
    while($i < $total) : $myVideos->the_post(); ?>
      <section class="video">
        <div class='title_container'>
          <h1><?php the_title() ; ?></h1>
        </div>
        <div class="arrow_down"></div>
        <div class="content_container"><?php the_content() ; ?></div>
      </section>
    <?php
      $i++;
      endwhile;
    ?>
  </div>
<?php //echo "</div>" ?>

<?php
wp_reset_postdata();

get_sidebar();
get_footer(); ?>
