<?php if (!defined('ABSPATH')) exit; 

        
// FOR COLLEGE NETWORK SECURITY
// FORCE AUTO-UPDATE EVERYTHING (WP CORE, PLUGINS AND THEMES)
add_filter( 'allow_minor_auto_core_updates', '__return_true' );         // ENABLE MINOR UPDATES
add_filter( 'allow_major_auto_core_updates', '__return_true' );         // ENABLE MAJOR UPDATES
add_filter( 'auto_update_plugin', '__return_true' );                    // UPDATE PLUGINS
add_filter( 'auto_update_theme', '__return_true' );                     // UPDATE THEMES 

/*
* Proper way to enqueue scripts and styles.
*/
function montreal_real_estate_theme_scripts() {
    wp_enqueue_style( 'montreal_real_estate', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'montreal_real_estate_theme_scripts' );

// END STEP 2.9

/*  STEP 2.10 ADD THE MENUS */

function add_my_menus() {
    register_nav_menus(
    array(
        'header-menu' => __( 'Header Menu', 'montreal-real-estate-billy-poppins' ),
        'footer-menu' => __( 'Footer Menu', 'montreal-real-estate-billy-poppins' ),
        'social-menu' => __( 'Social Menu', 'montreal-real-estate-billy-poppins'),
        // YOU CAN ADD AS MANY MENUS AS YOU WANT HERE
    )
    );
}
add_action( 'init', 'add_my_menus' );

// END STEP 2.10 ADD THE MENUS


// START STEP 2.14 ADD ADDITIONAL CUSTOM FEATURES TO THE SITE THEME
// https://developer.wordpress.org/reference%2Ffunctions%2Fadd_theme_support%2F/

function montreal_real_estate_theme_init(){

    add_theme_support('post-thumbnails');
    // Enable featured images and post thumbnails

    add_theme_support( 'automatic-feed-links' );
    // This feature adds RSS feed links to HTML <head>.
    
    add_theme_support('title-tag');
    // Adds a custom <title> tag in the <head>

    add_theme_support( 'custom-logo', array(
        'height'               => 100,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => false,
        ) );
    // Adds a custom logo selector in Appearance > Customize > Site Identity

    add_theme_support( "responsive-embeds" );
    // The embed blocks automatically apply styles to embedded content to reflect the aspect ratio of content that is embedded in an iFrame.

    add_theme_support( "align-wide" );
    // Some blocks such as the image block have the possibility to define a “wide” or “full” alignment

    
    add_theme_support('html5',
    array(
        'comment-list', 
        'comment-form', 
        'search-form', 
        'gallery', 
        'caption', 
        'figure', 
        'figcaption', 
        'nav', 
        'section')
    // Forces WP to use semantic HTML 5 tags such as <figure> and <figcaption>
    );
    }
    
    // ADDS THESE FEATURES TO WP
    add_action('after_setup_theme', 'montreal_real_estate_theme_init');

    // END STEP 2.14 ADD ADDITIONAL CUSTOM FEATURES TO THE SITE THEME

    // START STEP 2.24 ADDING WIDGET SUPPORT

    function montreal_real_estate_widgets_init() {

        register_sidebar( array(
            'name'          => 'Widget sidebar',
            'id'            => 'widget_1',
            'before_widget' => '<section>',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );

    }
    add_action( 'widgets_init', 'montreal_real_estate_widgets_init' );
    // END STEP 2.24 ADDING WIDGET SUPPORT


    // ENQUEUE COMBINED-SCRIPTS.JS FILE
    function montreal_real_estate_combined_scripts() {
        $combined_scripts = get_template_directory() . '/js/combined-scripts.js';
        $combined_scripts_version  = filemtime($combined_scripts);
        wp_enqueue_script( 'montreal_real_estate_combined_scripts', get_template_directory_uri() . '/js/combined-scripts.js', array( 'jquery' ), $combined_scripts_version, true );
    }
    add_action( 'wp_enqueue_scripts', 'montreal_real_estate_combined_scripts' );


    // Control length of excerpt
    function my_excerpt_length($length){ 
        return 80; } 
        add_filter('excerpt_length', 'my_excerpt_length');
