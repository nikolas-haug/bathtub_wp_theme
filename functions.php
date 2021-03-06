<?php

include_once 'custom/custom-bg-callback.php';
include_once 'custom/hide-metaboxes-template-toggle.php';
// Add customizer functionality
require get_template_directory(  ) . '/inc/customizer.php';

// Add theme support
function bathtub_theme_setup()
{
    add_theme_support('custom-logo');
    add_theme_support('custom-background', array(
        'default-color' => '#E890AD',
        'wp-head-callback' => 'my_custom_background_cb',
    ));

    // Featured image support
    add_theme_support('post-thumbnails');

    // Nav menus
    register_nav_menus(array(
        'primary' => __('Primary Menu'),
    ));
}
add_action('after_setup_theme', 'bathtub_theme_setup');

// Enqueue theme stylesheets and scripts
function bathtub_theme_scripts()
{
    global $ver_num; // define global variable for the version number
    $ver_num = mt_rand(); // on each call/load of the style the $ver_num will get a different value

    // or: only get the version number associated with the main theme stylesheet (better for browser cacheing essential assets)
    $theme = wp_get_theme();
    define('THEME_VERSION', $theme->Version); // gets version written in your style.css

    wp_enqueue_style('main-style', get_stylesheet_uri(), array(), THEME_VERSION);
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/inc/font-awesome.css' );
    wp_enqueue_script('jquery');
    wp_enqueue_script('navigation-js', get_template_directory_uri() . '/js/navigation.js', array(), null, true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array(), null, true);

}
add_action('wp_enqueue_scripts', 'bathtub_theme_scripts');

// Widgets
function init_widgets($id) {
    register_sidebar( array(
        'name' => 'Music Widget',
        'id' => 'music_widget',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => ''
    ));
}
add_action( 'widgets_init', 'init_widgets' );

// Custom post types
function bathtub_custom_post_types() {
    $args = array(
        'labels' => array(
            'name' => __( 'Shows', 'shows' ),
            'singular_name' => __( 'Show', 'show' ),
            'add_new_item' => 'Add New Show',
            'edit_item' => 'Edit Show',
            'new_item' => 'New Show',
            'view_item' => 'View Show'
        ),
        'description' => 'Add show date and details.',
        'supports' => array(
            'title',
            'editor'
        ),
        'taxonomies' => array('shows'),
        'public' => true,
        'menu_position' => 50,
        'menu_icon' => 'dashicons-images-alt2',
        'has_archive' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'shows')
    );
    register_post_type( 'shows', $args );
}
add_action( 'init', 'bathtub_custom_post_types' );

// Remove extra p tags in posts (classic editor only)
remove_filter('the_content', 'wpautop');