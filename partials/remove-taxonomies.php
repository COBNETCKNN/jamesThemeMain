<?php

function wpsnipp_remove_default_taxonomies(){
    global $pagenow;
 
    register_taxonomy( 'post_tag', array() );
    register_taxonomy( 'category', array() );
 
    $tax = array('post_tag','category');
 
    if($pagenow == 'edit-tags.php' && in_array($_GET['taxonomy'],$tax) ){
    wp_die('Invalid taxonomy');
    }
}
add_action('init', 'wpsnipp_remove_default_taxonomies');