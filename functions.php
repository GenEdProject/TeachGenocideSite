<?php
/**
 * teachgen functions and definitions
 *
 * @package teachgen
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
    $content_width = 640; /* pixels */
}

if ( ! function_exists( 'teachgen_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function teachgen_setup() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on teachgen, use a find and replace
         * to change 'teachgen' to the name of your theme in all the template files
         */
        load_theme_textdomain( 'teachgen', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'teachgen' ),
        ) );

        // Enable support for Post Formats.
        add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

        // Setup the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'teachgen_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        add_action('init', 'register_mypost_type');
        function register_mypost_type() {
            register_post_type('home_items',
                    array(
                        'labels' => array('name' => 'Home Items'),
                        'public' => true,
                        'supports' => array('title', 'editor', 'revisions')
                        )
            );            
            register_post_type('documents',
                    array(
                        'labels' => array('name' => 'Documents'),
                        'public' => true,
                        'supports' => array('title', 'editor', 'revisions', 'thumbnail'),
                        'taxonomies' => array('category')
                        )
            );
            register_post_type('books',
                    array(
                        'labels' => array('name' => 'Books'),
                        'public' => true,
                        'supports' => array('title', 'editor', 'revisions', 'thumbnail', 'custom-fields'),
                        'taxonomies' => array('category')
                        )
            );
            register_post_type('videos',
                    array(
                        'labels' => array('name' => 'Videos'),
                        'public' => true,
                        'supports' => array('title', 'editor', 'revisions', 'thumbnail', 'custom-fields'),
                        'taxonomies' => array('category')
                        )
            );
            register_post_type('teaching_guides',
                    array(
                        'labels' => array('name' => 'Teaching Guides'),
                        'public' => true,
                        'supports' => array('title', 'editor', 'revisions', 'thumbnail', 'custom-fields')
                        )
            );
            register_post_type('survivor_accounts',
                    array(
                        'labels' => array('name' => 'Survivor Accounts'),
                        'public' => true,
                        'supports' => array('title', 'editor', 'revisions', 'thumbnail'),
                        'taxonomies' => array('category')
                        )
            );
            register_post_type('websites',
                    array(
                        'labels' => array('name' => 'Websites'),
                        'public' => true,
                        'supports' => array('title', 'editor', 'revisions', 'thumbnail'),
                        'taxonomies' => array('category')
                        )
            );
            register_post_type('posters',
                    array(
                        'labels' => array('name' => 'Posters'),
                        'public' => true,
                        'supports' => array('title', 'editor', 'revisions', 'thumbnail', 'custom-fields'),
                        'taxonomies' => array('category')
                        )
            );
            register_post_type('state_edu_reqs',
                    array(
                        'labels' => array('name' => 'State Educational Requirement'),
                        'public' => true,
                        'supports' => array('title', 'editor', 'revisions', 'thumbnail'),
                        'taxonomies' => array('category')
                        )
            );
            register_post_type('genocides',
                    array(
                        'labels' => array('name' => 'Modern Era Genocides'),
                        'public' => true,
                        'supports' => array('title', 'editor', 'revisions', 'thumbnail'),
                        'taxonomies' => array('category')
                        )
            );
        }
        // Enable support for HTML5 markup.
        add_theme_support( 'html5', array(
            'comment-list',
            'search-form',
            'comment-form',
            'gallery',
        ) );
    }
endif; // teachgen_setup

add_action( 'after_setup_theme', 'teachgen_setup' );
add_theme_support( 'post-thumbnails' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function teachgen_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'teachgen' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
}
add_action( 'widgets_init', 'teachgen_widgets_init' );



function footer_menus() {
    register_sidebar( array(
        'name' => __( 'Footer Menus', 'theme-slug' ),
        'id' => 'footer_half',
        'description' => __( 'Widgets in this area will be shown in the footer of the site in half width columns.', 'theme-slug' ),
        'before_widget' => '<div class="footer_content col-sm-6">',
        'after_widget'  => '</div>',
    ) );
}
add_action( 'widgets_init', 'footer_menus' );



function footer_text() {
    register_sidebar( array(
        'name' => __( 'Footer Text', 'theme-slug' ),
        'id' => 'footer_full',
        'description' => __( 'Widgets in this area will be shown in the footer of the site in full width columns.', 'theme-slug' ),
        'before_widget' => '<div class="footer_full col-sm-12">',
        'after_widget'  => '</div>',
    ) );
}
add_action( 'widgets_init', 'footer_text' );



function homepage_content() {
    register_sidebar( array(
        'name' => __( 'Homepage Content', 'theme-slug' ),
        'id' => 'homepage',
        'description' => __( 'Widgets in this area will be shown in half-width columns above the page content on the homepage.', 'theme-slug' ),
        'before_widget' => '<div class="homepage-widget col-sm-12 col-lg-6">',
        'after_widget'  => '</div>',
    ) );
}
add_action( 'widgets_init', 'homepage_content' );


/**
 * Enqueue scripts and styles.
 */
function teachgen_scripts() {
    
    //bootstrap from CDN
    wp_register_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' );
    wp_enqueue_style('bootstrap');
    wp_register_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js' );
    wp_enqueue_script('bootstrap');

    wp_enqueue_style( 'teachgen-style', get_stylesheet_uri() );

    //wp_enqueue_script( 'teachgen-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20120206', true );
    wp_enqueue_script( 'state_edu_reqs', get_template_directory_uri() . '/js/state_edu_reqs.js', array( 'jquery' ), '20150606', true );
    wp_enqueue_script( 'registration_gate', get_template_directory_uri() . '/js/registration_gate.js', array( 'jquery' ), '20160221', true );

    //wp_enqueue_script( 'menu', get_template_directory_uri() . '/js/menu.js', array(), '20140409', true );

    wp_enqueue_script( 'teachgen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'teachgen_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
*control excerpt length ... put in for press_window on homepage
*/
/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


function youtube_video_filter($content){
    //<div class="embed-responsive embed-responsive-16by9"></div>
    $old = array('<iframe', '</iframe');
    $new = array('<div class="embed-responsive embed-responsive-16by9"><iframe', '</iframe></div>');
    $content = str_replace($old, $new, $content);
    return $content;
}

add_filter( 'the_content', 'youtube_video_filter', 99 );
