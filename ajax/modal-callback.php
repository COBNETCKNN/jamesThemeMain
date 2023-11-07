<?php 

function get_post_content() {
    $post_id = $_POST['post_id'];
    $post_slug = $_POST['post_slug'];

    $args = array(
        'p' => $post_id,
        'post_type' => 'post',
    );

    $singlePostQuery = new WP_Query($args);

    if ($singlePostQuery->have_posts()) {
        while ($singlePostQuery->have_posts()) {
            $singlePostQuery->the_post();
            // Display the post content here
            the_content();
        }
    } else {
        // No posts found
        echo 'No posts found';
    }


    wp_die();

}
add_action('wp_ajax_get_post_content', 'get_post_content');
add_action('wp_ajax_nopriv_get_post_content', 'get_post_content');