<?php
/*
* Template Name: Books
* */

get_header();

$args = array(
  'posts_per_page' => '-1',
  'post_type' => 'books',
);
$myBooks = new WP_Query( $args );
$i = 0;
$total = $myBooks->found_posts;
?>

<span class="custom_page_title"> <?php wp_title('', 'true'); ?> </span>
<?php //echo "<div class='video_container'>" ?>
  <div class="column">
    <?php
    while($i < floor($total / 2)) : $myBooks->the_post(); ?>
      <section class="video">
        <div class='title_container'>
          <h1><?php the_title() ; ?></h1>
        </div>
        <div class="arrow_down"></div>
        <div class="content_container"><?php echo get_the_post_thumbnail($page->ID, 'thumbnail'); ?> <?php the_content() ; ?></div>
      </section> 
    <?php
      $i++;
      endwhile;
    ?>
  </div>

  <div class="column">
    <?php
    while($i < $total) : $myBooks->the_post(); ?>
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
