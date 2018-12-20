<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package teachgen
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<?php wp_enqueue_script('jquery'); ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
 <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'teachgen' ); ?></a>

  <header id="masthead" class="site-header" role="banner">

    <div class="main_banner_container">
      <div class="main_banner">
        <?php if(!is_front_page()) _e('<a href="' . site_url() . '"/>'); ?>
          <img id="logo" src="/wp-content/themes/teachgen/images/new_gened_logo.png"></img>
          <div class="site_title"> The Genocide <br> Education Project </div>
        <?php if(!is_front_page()) _e('</a>'); ?>
      </div>
    </div>


    <div class="navigation_container">
      <nav id="site-navigation" class="main-navigation" role="navigation">
        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
        <div class="search_container">
         <form action="/" class="search_form">
            <button class="search_btn"></button>
            <input type="search" name="s" class="search_input" />
          </form>
      </div><!--search-->
           
      </nav>
    </div> 
    <!--/nav container-->

    <!-- Banner -->
    <?php if (has_post_thumbnail( $post->ID ) and !is_front_page()) : ?>
    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
    <div class="banner_container" style="background-image: url(' <?php if (!is_single()) : echo $image[0]; endif; ?> ')">
        <div class="banner_text <?php if (is_single()) : echo 'no_banner_image'; endif; ?>">
            <h1> <?php echo get_the_title(); ?> </h1>
        </div>
    </div>
    <?php endif; ?>


  </header><!-- #masthead -->

  <div id="content" class="site-content container-fluid">

