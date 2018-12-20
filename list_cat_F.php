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
  <div class="item_container_left col-sm-12">
      <h2> <?php the_title(); ?></b> </h2>
      <?php 
        if(has_post_thumbnail()) { ?>
          <div class="list_image col-sm-4">
            <?php the_post_thumbnail('medium', array('class' => "item_container_thumb_right")); ?>
          </div> <?php 
        }  
      ?> 
      <div class="item_content <?php echo (has_post_thumbnail() ? 'col-sm-8' : 'col-sm-12'); ?>">
        <?php the_content(); ?>
       </div>
  </div>
<?php } ?>


<!-- Start making the page -->

<!-- Content -->
<div class="row">
  <?php 
    $order_side = 'order-sm-1 order-md-2';
    $order_list = 'order-sm-2 order-md-1';
  if ( have_posts() ) : while ( have_posts() ) : the_post();
          if( '' !== get_post()->post_content ) { ?>
              <div class="the_content order-sm-1 col-sm-12 col-md-5">
                  <?php the_content(); ?>
              </div>
  <?php 
      $order_side = 'order-sm-2 order-md-2';
      $order_list = 'order-sm-3 order-md-3';
  } endwhile; else:
  endif;
  ?>

  <!-- Make the list -->
  <div class="<?php echo $order_side; ?> col-sm-12 col-md-3">
    <?php 
      if(!empty($category_array)){
        ?><ul><?php
        foreach ($category_array as $key => $cat) {
          ?><div class="doc_item">
              <div class="arrow_right"> </div>
              <span> <a href="#<?php echo str_replace(' ', '', $key); ?>"> <?php echo $key; ?> </a> </span>
          </div><?php
        }
        ?></ul><?php
      }
    ?>
  </div>

      <section class="list <?php echo $order_list; ?> col-sm-12 col-md-8">  

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

          <div id="<?php echo str_replace(' ', '', $key); ?>" class="title_container">
              <div class="title_text <?php echo $key; ?>_title"> <?php echo $key; ?> </div>
              <div class="list_divider"> </div>
          </div>

          <?php
          while($i < $total) : $currCatItems->the_post();
              create_item();
              $i++;
          endwhile;
          ?>
      <?php } ?>
  </section>

</div>

</div>


<?php
wp_reset_postdata();

get_sidebar();
get_footer(); ?>

