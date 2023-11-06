<?php 
// Enquesing custom CSS&JS files
function portfolioTheme_files() {
    //enqueue CSS
    wp_enqueue_style('mainCSS', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_style('fontAwesomeCSS', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');

    //enqueue JS
    wp_enqueue_script('jquery');
    wp_enqueue_script('mainJS', get_stylesheet_directory_uri() . '/js/main.js', array(), 1.0, true);
    wp_enqueue_script('fontAwesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js');

    wp_localize_script('ajaxJS', 'wpAjax',
    array('ajaxUrl' => admin_url('admin-ajax.php'))
  );
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
add_theme_support( 'post-thumbnails' );

// Removing editor from Pages
function remove_editor() {
    remove_post_type_support('page', 'editor');
  }
  add_action('admin_init', 'remove_editor');

// Adding custom image sizes
add_image_size( 'logo-size', 180, 60, true);
add_image_size('social-media-icons', 35, 35, true);


// Ajax filter for taxonomies
function filter_projects() {

  $all_terms = get_terms(array('taxonomy' => 'conversion', 'fields' => 'slugs'));
  $termIds = [7,3,5,4,6];
  $ajaxposts = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => -1,
    'tax_query' => [
       [
          'taxonomy' => 'conversion',
          'field'    => 'slug',
          'terms'    => $all_terms // example of $termIds = [4,5]
       ],
    ]
 ]);
 
  $response = '';

  if($ajaxposts->have_posts()) {
    while($ajaxposts->have_posts()) : $ajaxposts->the_post();
      $response .= the_title();
    endwhile;
  } else {
    $response = 'empty';
  }

  echo $response;
  exit;
}
add_action('wp_ajax_filter_projects', 'filter_projects');
add_action('wp_ajax_nopriv_filter_projects', 'filter_projects');

// Do NOT include the opening PHP tag

// =============================================================
// ENQUEUE AJAX SCRIPTS
// =============================================================
function add_ajax_scripts() {
  wp_enqueue_script( 'ajax_term', get_stylesheet_directory_uri() . '/ajax/acquisition-ajax.js', array('jquery'), NULL, true );
  wp_enqueue_script( 'ajax_term', get_stylesheet_directory_uri() . '/ajax/conversion-ajax.js', array('jquery'), NULL, true );
	wp_localize_script( 'ajax_term', 'wpAjax', array('ajaxUrl' => admin_url('admin-ajax.php')));	
}
add_action( 'wp_enqueue_scripts', 'add_ajax_scripts' );

require_once('ajax/acquisition-callback.php');

require_once('ajax/conversion-callback.php');