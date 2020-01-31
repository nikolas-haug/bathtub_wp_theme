<?php 

    include_once('custom/custom-bg-callback.php');

// Add theme support
function bathtub_theme_setup() {
    add_theme_support( 'custom-logo' );
    add_theme_support( 'custom-background', array(
        'default-color' => '#E890AD',
        'wp-head-callback'       => 'my_custom_background_cb'
    ) );

    // Featured image support
    add_theme_support( 'post-thumbnails' );

    // Nav menus
    register_nav_menus(array(
        'primary' => __('Primary Menu')
    ));
}
add_action( 'after_setup_theme', 'bathtub_theme_setup' );

// Enqueue theme stylesheets and scripts
function bathtub_theme_scripts() {
    global $ver_num; // define global variable for the version number
    $ver_num = mt_rand(); // on each call/load of the style the $ver_num will get a different value

    // or: only get the version number associated with the main theme stylesheet (better for browser cacheing essential assets)
    $theme = wp_get_theme(  );
    define('THEME_VERSION', $theme->Version); // gets version written in your style.css

    wp_enqueue_style( 'main-style', get_stylesheet_uri(  ), array(), THEME_VERSION );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'navigation-js', get_template_directory_uri() . '/js/navigation.js', array(), null, true );

}
add_action( 'wp_enqueue_scripts', 'bathtub_theme_scripts' );