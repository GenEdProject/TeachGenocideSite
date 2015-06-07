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
          <select>
            <option value="California">California</option>
            <option value="Georgia">Georgia</option>
            <option value="Illinois">Illinois</option>
            <option value="Kansas">Kansas</option>
            <option value="Massachusetts">Massachusetts</option>
            <option value="Minnesota">Minnesota</option>
            <option value="New Jersey">New Jersey</option>
            <option value="New York">New York</option>
            <option value="Ohio">Ohio</option>
            <option value="Rhode Island">Rhode Island</option>
            <option value="Virginia">Virginia</option>
          </select>
        </section>
      </div>
      <div class="state_edu_requirements">
        <p>California History-Social Science Content Standard 10.5.5 requires that students in the public schools:
        Discuss human rights violations and genocide, including the Ottoman government's actions against Armenian citizens.
        </p>

        <p>History-Social Science Framework for California Public Schools:
        "Within the context of human rights and genocide, students should learn of the Ottoman government's planned mass deportation and systematic annihilation of the Armenian population in 1915. Students should also examine the reactions of other governments, including that of the United States, and world opinion during and after the Armenian genocide. They should examine the effects of the genocide on the remaining Armenian people, who were deprived of their historic homeland, and the ways in which it became a prototype of subsequent genocides."
        (Framework, p.127)
        </p>

        <p>"Genocides, such as that perpetrated on the Armenians, already had demonstrated the human capacity for mass murder. The Nazis perfected the social organization of human evil and provided an efficient and frightening model for future despots such as Pol Pot in Cambodia."
        (Framework, pp.128-129)
        </p>
      </div>
    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
