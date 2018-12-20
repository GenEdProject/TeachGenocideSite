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
$page_content = '';
?>

<!-- Functions -->
<?php function create_item() { ?>
  <div class="item_container_left col-sm-12 col-md-8">
     <h2> <?php the_title(); ?></b> </h2>    
      <div class="list_image col-sm-4">
        <a href="<?php echo get_post_custom_values('link')[0]; ?>">
          <?php
                 if (has_post_thumbnail()) {
                     the_post_thumbnail('medium', array('class' => "item_container_thumb_right"));
                 }
          ?>
        </a>
      </div>    
      <div class="item_content col-sm-8">
        <?php the_content(); ?>
      </div>
  </div>
<?php } ?>

<?php function create_divider() { ?>
    <div class="item_divider"> </div>
<?php } ?>



<!-- Start making the page -->

<!-- Content -->
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
          if( '' !== get_post()->post_content ) { ?>
              <div class="row">
                  <div class="item_container_left col-sm-12 col-md-8"><?php the_content(); ?></div>
              </div>
  <?php } endwhile; else:
      // no posts found
  endif;
  ?>

  <!-- Make the list -->
  <section class="list row">
          <?php
          while($i < $total) : $myItems->the_post();
              create_item();
              $i++;
          endwhile;
          ?>
          <div style="clear: both;"> </div>
  </section>


<?php
wp_reset_postdata();
get_sidebar();
get_footer(); ?>

