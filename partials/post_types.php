<?php 
// Creating of Custom Post Types
function james_theme_post_types() {

    // Copywriting Examples post type
    register_post_type('program', array(
        'public' => true,
        'labels' => array( 
            'name' => 'Copywriting Examples',
            'add_new_item' => 'Add New Copywriting Example',
            'edit_item' => 'Edit Copywriting Example',
            'all_items' => 'All Copywriting Examples',
            'singular_name' => 'Copywriting Example',
        ),
        'menu_icon' => 'dashicons-edit-large',
        'rewrite' => array('slug' => 'inspirations'),
        'has_archive' => true,
        'supports' => array('title', 'excerpt'),
    ));
}
add_action('init', 'james_theme_post_types');