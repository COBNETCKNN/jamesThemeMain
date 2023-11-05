<?php 
// Enquesing custom CSS&JS files
function portfolioTheme_files() {
    //enqueue CSS
    wp_enqueue_style('mainCSS', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_style('fontAwesomeCSS', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');

    //enqueue JS
   wp_enqueue_script('mainJS', get_stylesheet_directory_uri() . '/js/main.js', array(), 1.0, true);
   wp_enqueue_script('fontAwesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js');
}
add_action( 'wp_enqueue_scripts', 'portfolioTheme_files' );

// Registrating Custom Post Types
require_once('partials/post_types.php');

// Custom Taxonomies
require_once('partials/custom-taxonomies.php');

// Removing deafult taxonomies by WordPress for Posts
require_once('partials/remove-taxonomies.php');

// Registration of menus
require_once('partials/menu-registration.php');

// Adding theme supports
add_theme_support( 'custom-logo' );

// Removing editor from Pages
function remove_editor() {
    remove_post_type_support('page', 'editor');
  }
  add_action('admin_init', 'remove_editor');

// Adding custom image sizes
add_image_size( 'logo-size', 180, 60, true);
add_image_size('social-media-icons', 35, 35, true);

