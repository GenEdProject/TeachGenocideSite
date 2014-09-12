<?php
/*
* Template Name: Websites
* */

get_header();

$args = array(
  'posts_per_page' => '-1',
  'post_type' => 'websites',
);
$myWebsites = new WP_Query( $args );
$i = 0;
$total = $myWebsites->found_posts;
?>

<?php ?>
    <?php
    while($i < $total) : $myWebsites->the_post(); ?>
      <section class="website_container">
        <b><?php the_title() ; ?></b>
        <p> <?php the_content() ; ?></p>
      </section>
    <?php
      $i++;
      endwhile;
    ?>
  </div>
<?php ?>

<?php
wp_reset_postdata();

get_sidebar();
get_footer(); ?>
