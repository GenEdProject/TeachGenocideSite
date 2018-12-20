<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package teachgen
 */
?>

  </div><!-- #content -->

  <footer id="colophon" class="site-footer container-fluid" role="contentinfo">
    <div class="row">
      <div class="footer-columns col-sm-8">
        <?php dynamic_sidebar( 'footer_half' ); ?>
      </div>
    </div>
    <div class="row">
      <div class="footer-columns col-sm-8">
       <?php dynamic_sidebar( 'footer_full' ); ?> 
      </div>
    </div>    
  </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

