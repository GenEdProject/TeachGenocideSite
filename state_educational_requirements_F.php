<?php
/**
 * Template Name: State educational requirements
 * The Template for displaying state educational requirements.
 *
 * @package teachgen
 */

get_header(); ?>

  <div id="primary" class="content-area row">
    <main id="main" class="site-main state_educational_requirements col-sm-12 col-md-8" role="main">

      <div class="state_edu_left_column col-sm-6">
        <h2>Curriculum Requirements</h2>
        <?php
        $args = array(
            // Change these category SLUGS to suit your use.
            'post_type' => 'state_edu_reqs',
            'posts_per_page' => '-1',
            'orderby' => 'title',
            'order' => 'ASC'
        );

        $i = 0;
        $edu_reqs = new WP_Query( $args );
        $total = $edu_reqs->found_posts;
        ?>

        <p>Among the numerous states that require instruction on genocide, the following specifically note the Armenian Genocide as a primary example. Select a state from the dropdown menu below the list.</p>

        <ul class="first_list state_list">
        <?php
        while($i < $total) : $edu_reqs->the_post();
        ?>
            <li><?php echo get_the_title() ?></li>
        <?php
        $i++;
        endwhile;
        ?>
          <br>
        </ul>

        <section class="state_selector">
          <span class="state_select_label">Select another state:</span>
          <select id="state_select">
            <?php
            $i = 0;
            $edu_reqs = new WP_Query( $args );
            $total = $edu_reqs->found_posts;
            while($i < $total) : $edu_reqs->the_post();
            ?>
                <option value="<?php echo str_replace(' ', '_', get_the_title()) ?>"><?php echo get_the_title() ?></option>
            <?php
            $i++;
            endwhile;
            ?>
          </select>
        </section>
      </div>

      <div class="state_edu_requirements col-sm-6">
        <?php
        $i = 0;
        $edu_reqs = new WP_Query( $args );
        $total = $edu_reqs->found_posts;
        while($i < $total) : $edu_reqs->the_post();
        ?>
          <div class="state_edu_details <?php echo str_replace(' ', '_', get_the_title()) ?>">
          <?php
            the_title();
            the_content();
          ?>
          </div>
        <?php
        $i++;
        endwhile;
        ?>
      </div>
    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

