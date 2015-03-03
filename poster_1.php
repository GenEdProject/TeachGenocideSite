<?php
/*
* Template Name: Poster 1
* */

get_header();

$page_content = '';
?>

<script> 
    jQuery(".scrollable1").css('opacity','1');
    jQuery(document).ready(function(){
       jQuery(".scrollable1").hover(function() {
          jQuery(".scrollable1").stop().animate({ opacity: 0.7},300);
       }, function() {
          jQuery(".scrollable1").stop().animate({ opacity: 1 },300); 
       });
    })
    jQuery(".scrollable2").css('opacity','1');
    jQuery(document).ready(function(){
       jQuery(".scrollable2").hover(function() {
          jQuery(".scrollable2").stop().animate({ opacity: 0.7},300);
       }, function() {
          jQuery(".scrollable2").stop().animate({ opacity: 1 },300); 
       });
    })
    jQuery(".scrollable3").css('opacity','1');
    jQuery(document).ready(function(){
       jQuery(".scrollable3").hover(function() {
          jQuery(".scrollable3").stop().animate({ opacity: 0.7},300);
       }, function() {
          jQuery(".scrollable3").stop().animate({ opacity: 1 },300); 
       });
    })
    jQuery(".scrollable4").css('opacity','1');
    jQuery(document).ready(function(){
       jQuery(".scrollable4").hover(function() {
          jQuery(".scrollable4").stop().animate({ opacity: 0.7},300);
       }, function() {
          jQuery(".scrollable4").stop().animate({ opacity: 1 },300); 
       });
    })
    jQuery(".scrollable5").css('opacity','1');
    jQuery(document).ready(function(){
       jQuery(".scrollable5").hover(function() {
          jQuery(".scrollable5").stop().animate({ opacity: 0.7},300);
       }, function() {
          jQuery(".scrollable5").stop().animate({ opacity: 1 },300); 
       });
    })
    jQuery(".scrollable6").css('opacity','1');
    jQuery(document).ready(function(){
       jQuery(".scrollable6").hover(function() {
          jQuery(".scrollable6").stop().animate({ opacity: 0.7},300);
       }, function() {
          jQuery(".scrollable6").stop().animate({ opacity: 1 },300); 
       });
    })
</script>

<!-- Get the content of the page itself -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
        if( '' !== get_post()->post_content ) { ?>
            <div class="custom_page_content">
                <div style="width:840px;"> <?php the_content(); ?> </div>

                <table border="0" cellpadding="0" cellspacing="0" style="width:241px; float:left;">
                    <tr>
                        <td>
                            <a href="/wp-content/themes/teachgen/images/posters/poster_1/poster_1_1.jpg">
                            <div class="scrollable1" style="background-image: url(/wp-content/themes/teachgen/images/posters/poster_1/poster_1_1.jpg); background-size:100%; height: 404px; width: 241px;"> </div>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="/wp-content/themes/teachgen/images/posters/poster_1/poster_1_2.jpg"> 
                            <div class="scrollable2" style="background-image: url(/wp-content/themes/teachgen/images/posters/poster_1/poster_1_2.jpg); background-size:100%;height: 370px; width: 241px;"> 
                            </div>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="/wp-content/themes/teachgen/images/posters/poster_1/poster_1_3.jpg"> 
                            <div class="scrollable3" style="background-image: url(/wp-content/themes/teachgen/images/posters/poster_1/poster_1_3.jpg); background-size:100%; height: 356px; width: 241px;"> 
                            </div>
                            </a>
                        </td>
                    </tr>
                </table>
                <table border="0" cellpadding="0" cellspacing="0" style="width:644px; float:left;">
                    <tr>
                        <td>
                            <a href="/wp-content/themes/teachgen/images/posters/poster_1/poster_2_1.jpg">
                            <div class="scrollable4" style="background-image: url(/wp-content/themes/teachgen/images/posters/poster_1/poster_2_1.jpg); background-size:100%; height: 323px; width: 580px;"> 
                            </div>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td> 
                            <a href="/wp-content/themes/teachgen/images/posters/poster_1/poster_2_2.jpg">
                            <div class="scrollable5" style="background-image: url(/wp-content/themes/teachgen/images/posters/poster_1/poster_2_2.jpg); background-size:100%; height: 341px; width: 580px;"> 
                            </div>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="/wp-content/themes/teachgen/images/posters/poster_1/poster_2_3.jpg">
                            <div class="scrollable6" style="background-image: url(/wp-content/themes/teachgen/images/posters/poster_1/poster_2_3.jpg); background-size:100%; height: 465px; width: 580px;"> 
                            </div>
                            </a>
                        </td>
                    </tr>
                </table>

            </div>
<?php } endwhile; else:
    // no posts found
endif;
?>





<?php
wp_reset_postdata();

get_sidebar();
get_footer(); ?>
