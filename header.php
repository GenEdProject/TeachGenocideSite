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

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
  <div id="selector"></div>

  <header id="masthead" class="site-header" role="banner">

    <div class="main_banner">
     <h1 class="site_title">The Genocide Education Project</h1>
      <img id="logo" src="/wp-content/themes/teachgen/images/GEPLogoBlack-web.png"></img>

      <div class="social_widgets">
        <a href='https://www.youtube.com/user/Genocideeducation/featured'>
          <img src="/wp-content/themes/teachgen/images/YouTube-icon-full_color.png" class="youtube_widget" >
        </a>
        <a href='https://www.facebook.com/genedpro'>
          <img src="/wp-content/themes/teachgen/images/FB-f-Logo__blue_29.png">
        </a>
    </div>

    </div>

    <nav id="site-navigation" class="main-navigation" role="navigation">
      <!-- <script type="text/javascript" src="\wp-content\themes\teachgen\scripts\sticky_menu.js"></script> -->

      <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'teachgen' ); ?></a>

      <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
    </nav><!-- #site-navigation -->
  </header><!-- #masthead -->

  <div id="content" class="site-content">
