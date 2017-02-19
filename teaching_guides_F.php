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
    <div class="item_container_left">
      <div class="item_content">
	<a href=<?php the_permalink() ?>>
          <h2><b> <?php the_title(); ?></b> </h2>
	</a>
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
      <div class="list_image">
        <?php
               if (has_post_thumbnail()) {
                   the_post_thumbnail('medium', array('class' => "item_container_thumb_right"));
               }
        ?>
      </div>
    </div>
<?php } ?>

<?php function create_divider() { ?>
    <div class="item_divider"> </div>
<?php } ?>


<!-- Start making the page -->

<!-- Content -->
<div class="custom_page_padding">

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
      <?php
      while($i < $total) : $myItems->the_post();
          create_item();
          if($i != $total - 1)
          {
              create_divider();
          }
          $i++;
      endwhile;
      ?>

      <div style="clear: both;"> </div>
  </section>

</div>

<?php
wp_reset_postdata();

get_sidebar();
get_footer(); ?>
