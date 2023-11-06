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
            
            $arr_response = array(
                'title' => get_the_title(),
                'content' => get_the_content(),
                'link' => get_the_permalink()
            );
        }
        wp_reset_postdata();
    }
    
    echo json_encode($arr_response);
    
    wp_die();
  }
  add_action('wp_ajax_load_post_by_ajax', 'load_post_by_ajax_callback');
  add_action('wp_ajax_nopriv_load_post_by_ajax', 'load_post_by_ajax_callback');