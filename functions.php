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

// /**
//  * Add a home link to your menu
//  *
//  * @since 4.0
//  */
// function wpex_add_menu_home_link( $items, $args ) {

// 	// Only used for the main menu
// 	if ( 'primary' != $args->theme_location ) {
// 		return $items;
// 	}

// 	// Create home link
// 	$home_link = '<li><a href="' . esc_url( home_url( '/' ) ) . '">Home</a></li>';

// 	// Add home link to the menu items
// 	$items = $home_link . $items;

// 	// Return menu items
// 	return $items;
	
// }
// add_filter( 'wp_nav_menu_items', 'wpex_add_menu_home_link', 10, 2 );

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

/**
 * Register meta boxes.
 */
function hcf_register_meta_boxes()
{
    add_meta_box('hcf-1', __('text for upper part of two column page layout', 'hcf'), 'hcf_display_callback', 'page');
}
add_action('add_meta_boxes', 'hcf_register_meta_boxes');

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function hcf_display_callback($post)
{
    // echo "Hello Custom Field";
    include plugin_dir_path(__FILE__) . './form.php';
}

/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function hcf_save_meta_box($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if ($parent_id = wp_is_post_revision($post_id)) {
        $post_id = $parent_id;
    }
    $fields = [
        'sub_section'
    ];

    foreach ($fields as $field) {
        if (array_key_exists($field, $_POST)) {

            // Check if date field - then format to unix timestamp
            if ($field == 'show_date') {
                update_post_meta($post_id, $field, strtotime(str_replace('-', '/', $_POST[$field])));
                // If not date - add other fields to post meta
            } else {
                update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
            }
        }
    }
}
add_action('save_post', 'hcf_save_meta_box');