<?php 

function load_post_by_ajax_callback() {
    check_ajax_referer('view_post', 'security');
    $args = array(
        'post_type' => 'post',
        'p' => $_POST['id'],
    );
    
    $posts = new WP_Query( $args );
    
    $arr_response = array();
    if ($posts->have_posts()) {
        
        while($posts->have_posts()) {
            
            $posts->the_post();

            // Get the post ID or some way to retrieve the post slug
            $post_id = get_the_ID(); // Example: Assuming you're inside a loop

            // Get the post slug
            $post_slug = get_post_field('post_name', $post_id);
            
            $arr_response = array(
                'title' => get_the_title(),
                'content' => get_the_content(),
                'post_slug' => $post_slug,
            );
        }
        wp_reset_postdata();
    }
    
    echo json_encode($arr_response);
    
    wp_die();
  }
  add_action('wp_ajax_load_post_by_ajax', 'load_post_by_ajax_callback');
  add_action('wp_ajax_nopriv_load_post_by_ajax', 'load_post_by_ajax_callback');