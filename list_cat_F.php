<?php
/*
* Template Name: List Categorized
* */

get_header();
?>
<div class="custom_page_padding" id="<?php echo get_the_title() ?>">
<?php
$template_type = get_post_meta(get_the_ID(), 'template_type', true);
$args = array(
  'posts_per_page' => '-1',
  'post_type' => $template_type,
);
$myItems = new WP_Query( $args );
$i = 0;
$total = $myItems->found_posts;
$category_array = array();
$page_content = '';
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
      <div class="item_content">
        <h2> <?php the_title(); ?></b> </h2>
        <?php the_content(); ?>
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
              <div class="title_text <?php echo $key?>_title"> <?php echo $key ?> </div>
              <div class="list_divider"> </div>
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
