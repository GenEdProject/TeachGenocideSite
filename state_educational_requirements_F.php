<?php
/**
 * Template Name: State educational requirements
 * The Template for displaying state educational requirements.
 *
 * @package teachgen
 */

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main state_educational_requirements" role="main">

      <div class="state_edu_left_column">
        <h2>Curriculum Requirements</h2>

        <p>Currently, the following 11 states require the teaching of the Armenian Genocide.  Select a state from the dropdown menu for the complete text.</p>

        <ul class="first_list state_list">
          <li>California</li>
          <li>Georgia</li>
          <li>Illinois</li>
          <li>Kansas</li>
        </ul>
        <ul class="state_list">
          <li>Massachusetts</li>
          <li>Minnesota</li>
          <li>New Jersey</li>
          <li>New York</li>
        </ul>
        <ul class="state_list">
          <li>Ohio</li>
          <li>Rhode Island</li>
          <li>Virginia</li>
          <br>
        </ul>

        <section class="state_selector">
          <span class="state_select_label">Select another state:</span>
          <select id="state_select">
            <option value="California">California</option>
            <option value="Georgia">Georgia</option>
            <option value="Illinois">Illinois</option>
            <option value="Kansas">Kansas</option>
            <option value="Massachusetts">Massachusetts</option>
            <option value="Minnesota">Minnesota</option>
            <option value="New_Jersey">New Jersey</option>
            <option value="New_York">New York</option>
            <option value="Ohio">Ohio</option>
            <option value="Rhode_Island">Rhode Island</option>
            <option value="Virginia">Virginia</option>
          </select>
        </section>
      </div>
      
      <div class="state_edu_requirements">
        <?php
        $args = array(
            // Change these category SLUGS to suit your use.
            'post_type' => 'state_edu_reqs',
            'posts_per_page' => '-1'
        );

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
