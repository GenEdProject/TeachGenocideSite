<?php
/*
* Template Name: Documents 
* */

get_header();

$args = array(
  'posts_per_page' => '-1',
  'post_type' => 'documents',
);
$myDocuments = new WP_Query( $args );
$i = 0;
$total = $myDocuments->found_posts;
?>

<?php //echo "<div class='documents_container'>" ?>
  <div class="column">
    <?php
    while($i < floor($total)) : $myDocuments ->the_post(); ?>
      <section class="document">
        <div class='title_container'>
          <h1><?php the_title() ; ?></h1>
        </div>
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
