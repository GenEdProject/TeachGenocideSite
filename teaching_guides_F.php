<?php
/*
* Template Name: Teaching Guides
* */

get_header();

$args = array(
  'posts_per_page' => '-1',
  'post_type' => 'teaching_guides',
);
$myItems = new WP_Query( $args );
$i = 0;
$total = $myItems->found_posts;
$category_array = array();
$page_content = '';
?>

<!-- Functions -->
<?php function create_item() { ?>
    <div class="item_container_left col-sm-12 col-md-8">
        <a href=<?php the_permalink() ?>>
          <h2><b> <?php the_title(); ?></b> </h2>
         </a>
       <div class="list_image col-sm-4">
        <?php
               if (has_post_thumbnail()) {
                   the_post_thumbnail('medium', array('class' => "item_container_thumb_right"));
               }
        ?>
      </div>   
      <div class="item_content col-sm-8">
        <?php the_content(); ?>

        <!-- Buttons -->
        <?php if (get_post_custom_values('order')[0]) { ?>
    <?php echo do_shortcode(get_post_custom_values('order')[0]); ?>
        <?php } ?>
        <?php if (get_post_custom_values('download')[0]) { ?>
          <?php if (isset($_COOKIE['registered'])) { ?>
            <button type="button" class="teachguide_button" Onclick="window.location.href='<?php echo get_post_custom_values('download')[0] ?>'">
              Download for free
            </button>
          <?php } else { ?>
            <button type="button" class="teachguide_button" Onclick="window.location.href='<?php echo get_page_link(81) ?>'">
              Register to download
            </button>
          <?php } ?>
        <?php } ?>

      </div>
    </div>
<?php } ?>


<!-- Start making the page -->

<!-- Content -->
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
          if( '' !== get_post()->post_content ) { ?>
              <div class="row">
                  <div class="col-sm-12 col-md-8"><?php the_content(); ?></div>
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
  </section>


<?php
wp_reset_postdata();

get_sidebar();
get_footer(); ?>

